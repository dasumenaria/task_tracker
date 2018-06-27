<?php
namespace App\Controller;
use Cake\Mailer\Email;
use App\Controller\AppController;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 *
 * @method \App\Model\Entity\Task[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TasksController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['logout','TaskOverdueUpdate','TodayReport','PendingReport']);
		$loginId=$this->Auth->User('id');
		if($loginId!=1){ $this->Flash->error(__('You are not authorized user!'));  return $this->redirect(['controller'=>'Users','action' => 'login']); }
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->set('li','Tasks');
        $condition2 = [];
        $data = $this->request->getQuery();

        if(isset($data['send_email'])){
            if(!empty($data['project_id'])){
                $project_id = $data['project_id'];
                $this->sendEmailToClient($project_id);
            }

        }

        if(!empty($data['project_id']))
            $condition['Projects.id'] =  $data['project_id'];

        if(!empty($data['user_id']))
            $condition2['TaskMembers.user_id'] =  $data['user_id'];

        if(!empty($data['date_from']))
            if($data['date_filter'] == 'created')
                $condition1['Tasks.created_on >='] = date('Y-m-d',strtotime($data['date_from']));
            else
                $condition1['Tasks.deadline >='] = date('Y-m-d',strtotime($data['date_from']));
        
        if(!empty($data['date_to']))
            if($data['date_filter'] == 'created')
                $condition1['Tasks.created_on <='] = date('Y-m-d',strtotime($data['date_to']));
            else
                $condition1['Tasks.deadline <='] = date('Y-m-d',strtotime($data['date_to']));
        if(!empty($data['status']))
        {
            if($data['status'] == 3)
                $condition1['Tasks.status'] = 0;
            else
                $condition1['Tasks.status'] = $data['status'];
        }

        $condition['Projects.is_deleted'] = 0;
        $condition1['Tasks.is_deleted'] = 0;

        unset($data);
        //pr($condition2);

        $data = $this->Tasks->Projects->find('all');
        $data->select(['Projects.id','Projects.title','total_task'=>$data->func()->count('Tasks.id')])
        ->innerJoinWith('Tasks',function($q)use($condition1,$condition2){
            return $q->select(['Tasks.id'])->innerJoinWith('TaskMembers',function($p)use($condition2){
                return $p->where([$condition2]);
            })
            ->order(['Tasks.created_on'=>'DESC'])
            ->where([$condition1]);
        })
        ->group('Tasks.project_id')
        ->order(['Projects.title'=>'ASC'])
        ->contain(['Tasks'=>function($s)use($condition1,$condition2){
            return $s->contain(['TaskMembers'=>function($p)use($condition1,$condition2){
                return $p->where([$condition2]);
            }])
            ->where([$condition1])
            ->contain(['TaskStatuses'=>['Users'=>function($r){return $r->select(['name']);}],'TaskMembers'=>['Users'=>function($r){return $r->select(['name']);}]])
            ->order(['Tasks.created_on'=>'DESC']);
        }])
        ->where([$condition]);

        $data = $data->toArray();

        //pr($data);exit;

        foreach ($data as $k => $project) {
            foreach ($project->tasks as $key => $task) {
                    if(empty($task->task_members))
                        unset($data[$k]['tasks'][$key]);          
            }
        }

        //pr($data);exit;
        $projects = $this->Tasks->projects->find('list')->where(['is_deleted'=>0])->order(['title'=>'ASC']);
        $users = $this->Tasks->TaskStatuses->Users->find('list')->where(['is_deleted'=>0])->order(['name'=>'ASC']);
        $this->set(compact('data','projects','users'));
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('li','Tasks');
        $task = $this->Tasks->get($id, [
            'contain' => ['Projects']
        ]);
        $this->set('task', $task);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $this->set('li','Tasks');
        $task = $this->Tasks->newEntity();

        if ($this->request->is('post')) {
            $i = 0;
            foreach ($this->request->getData('user_id') as $user_id) 
            {
                $task_members[$i]['user_id'] = $user_id;  
                $i++;
            }

            $data = $this->request->getData();
            $data['task_members']=$task_members;
            
            $task = $this->Tasks->patchEntity($task,$data);
            unset($task->user_id);
			$task->deadline=date('Y-m-d',strtotime($this->request->getData('deadline')));	 

            //pr($task);exit;

            if ($this->Tasks->save($task)) {
               
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $users = $this->Tasks->TaskStatuses->Users->find('list', ['limit' => 200])->where(['is_deleted'=>0])->order(['name'=>'ASC']);
        $projects = $this->Tasks->Projects->find('list', ['limit' => 200])->where(['is_deleted'=>0])->order(['title'=>'ASC']);
		$this->set(compact('task','users','projects','id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null,$url = null)
    {
        $url = str_replace('-','%',$url);
        $url = urldecode($url);

        $this->set('li','Tasks');

        $task_old = $this->Tasks->get($id, [
            'contain' => ['TaskMembers','Projects']
        ]);

        $task = $this->Tasks->get($id, [
            'contain' => ['TaskMembers','Projects']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
			$task->deadline=date('Y-m-d',strtotime($this->request->getData('deadline')));
            if ($this->Tasks->save($task)) {

				$status = $this->Tasks->TaskStatuses->newEntity();
                    $status->task_id = $id;
                    $status->deadline = $task_old->deadline;
                    $status->user_id = $this->Auth->User('id');
                    $status = $this->Tasks->TaskStatuses->patchEntity($status,$status->toArray());
                    $this->Tasks->TaskStatuses->save($status);

                $this->Tasks->TaskMembers->deleteAll(["task_id"=>$id]);

                foreach ($this->request->getData('user_id') as $user_id) 
                {
                    $taskMembers = $this->Tasks->TaskMembers->newEntity();
                    $taskMembers = $this->Tasks->TaskMembers->patchEntity($taskMembers, $this->request->getData());
                    $taskMembers->task_id = $id;
                    $taskMembers->user_id = $user_id;
                    $this->Tasks->TaskMembers->save($taskMembers);
                }  
                echo '<meta http-equiv=REFRESH CONTENT=0;url='.$url.'>';
                exit;

                $this->Flash->success(__('The task has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $users = $this->Tasks->TaskStatuses->Users->find('list', ['limit' => 200])->where(['is_deleted'=>0]);
        $projects = $this->Tasks->Projects->find('list', ['limit' => 200])->where(['is_deleted'=>0]); 
		$this->set(compact('task','users','projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$url = null)
    {
        $url = str_replace('-','%',$url);
        $url = urldecode($url);

        $query = $this->Tasks->query();
        $query->update()
        ->set(['Tasks.is_deleted'=>1,'Tasks.deleted_on'=>date('Y-m-d')])
        ->where(['Tasks.id'=>$id])
        ->execute();

        $this->Flash->success(__('The task has been deleted.'));
        
        echo '<meta http-equiv=REFRESH CONTENT=0;url='.$url.'>';
                exit;
    }
	
    public function undodelete($id = null,$url = null)
    {
        $url = str_replace('-','%',$url);
        $url = urldecode($url);

        $task = $this->Tasks->get($id, [
            'contain' => []
        ]);
		$task = $this->Tasks->patchEntity($task, $this->request->getData());
		$task->is_deleted=0;
		$task->status=0;
		if ($this->Tasks->save($task)) { 
            $this->Flash->success(__('The task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }
        echo '<meta http-equiv=REFRESH CONTENT=0;url='.$url.'>';
                exit;
    }

    public function dublicate()
    {
        $data = $this->Tasks->find()->select(['id','user_id']);
        foreach ($data as $value) {
            $member = $this->Tasks->TaskMembers->newEntity();
            $a['user_id'] = $value->user_id;
            $a['task_id'] = $value->id;
            $member = $this->Tasks->TaskMembers->patchEntity($member,$a);
            $this->Tasks->TaskMembers->save($member);
        }
        pr("done");exit;
    }

    public function TaskOverdueUpdate()
    {
        $query = $this->Tasks->query();
        $query->update()
        ->set(['status' => 2])
        ->where(['Tasks.deadline <' => date('Y-m-d'),'Tasks.status'=>0])
        ->execute();
        exit;
    }

    public function TodayReport()
    {
        $users = [];
        $data = $this->Tasks->find('all');
        $data->contain(['Users'])
        ->order(['Tasks.completed_by'=>'ASC'])
        ->where(['Tasks.is_deleted'=>0,'Tasks.completed_on'=> date('Y-m-d'),'Tasks.status'=>1,'Tasks.task_email_status'=>0])->toArray();
        $i = 0;
        $j = 0;
        $usr = @$data->toArray()[0]['user']['name'];
        foreach ($data as $value) {
            if($value['user']['name'] != $usr)
            {
                $j=0;
                $usr = $value['user']['name'];
                $i++;
            }
            if($j == 0)
            {
                $users[$i]['name'] = $value['user']['name'];
                $users[$i]['email'] = $value['user']['email'];
            }

            unset($value->user);
            $users[$i]['tasks'][$j] = $value;
            $j++;
        }

        foreach ($users as $user) 
        {    
            $mailto = "vivekbhatt119@gmail.com";
            ///start code for send email
            if(!empty($mailto))
            {
                $email = new Email();
                $email->setTransport('SendGrid');
                $email->setProfile('default')
                ->setTemplate('send_email_for_tasks')
                ->setEmailFormat('html');
                $email->setFrom([$user['email'] => $user['name']])
                ->setTo($mailto)
                ->setSubject('Today\'s Completed Task')
                ->setViewVars(['user' => $user]);

                if($email->send())
                {
                   foreach ($user['tasks'] as $task)
                   {
                        $query = $this->Tasks->query();
                        $query->update()
                        ->set(['Tasks.task_email_status'=>1])
                        ->where(['Tasks.id'=> $task['id']])
                        ->execute();
                   }
                }
            }
        }
        exit;
    }

    public function PendingReport()
    {
        $users = [];
        $data = $this->Tasks->Projects->find('all');
        $data->select(['Projects.id','Projects.title','total_task'=>$data->func()->count('Tasks.id')])
        ->innerJoinWith('Tasks',function($q){
            return $q->select(['Tasks.id'])
            ->order(['Tasks.deadline'=>'ASC'])
            ->where(['Tasks.is_deleted'=>0,'Tasks.status'=>2]);
        })
        ->group('Tasks.project_id')
        ->contain(['Tasks'=>function($q){
            return $q->order(['Tasks.deadline'=>'DESC'])
            ->where(['Tasks.is_deleted'=>0,'Tasks.status'=>2,'Tasks.pending_email_status'=>0]);
        }])
        ->where(['Projects.is_deleted'=>0]);

        $data = $data->toArray();

        //pr($data);exit;

        foreach ($data as $k => $project) {
            if(empty($project->tasks))
                unset($data[$k]);
        }

        if(!empty($data))
        {
            $mailto = "vivekbhatt119@gmail.com";
            ///start code for send email
            if(!empty($mailto))
            {
                $email = new Email();
                $email->setTransport('SendGrid');
                $email->setProfile('default')
                ->setTemplate('send_email_for_pending')
                ->setEmailFormat('html');
                $email->setFrom(['info@phppoets.com' => 'PhpPoets IT Solution Pvt Ltd'])
                ->setTo($mailto)
                ->setSubject('Today\'s Completed Task')
                ->setViewVars(['projects' => $data]);

                if($email->send())
                {
                   foreach ($data as $project)
                   {
                        foreach($project['tasks'] as $task)
                        {
                            $query = $this->Tasks->query();
                            $query->update()
                            ->set(['Tasks.pending_email_status'=>1])
                            ->where(['Tasks.id'=> $task['id']])
                            ->execute();
                        }
                   }
                }
            }
        }
        exit;
    }

    public function sendEmailToClient($project_id=null){
        $projects_data = $this->Tasks->Projects->find()->contain(['Tasks'=>function($q){
                    return $q->where(['status'=>1,'is_deleted'=>0])->contain(['TaskMembers'=>'Users','TaskStatuses'=>'Users']);
                }])->contain(['MasterClients'=>['MasterClientPocs']])->where(['Projects.id'=>$project_id])->toArray();
            
            $cc_email=[];
            $data=[];
            $mailto='';     
            foreach($projects_data as $value){
                
                $mailto =$value->master_client->master_client_pocs[0]->email;
                foreach($value->tasks as $task){
                    $data[]=$task;
                    foreach($task->task_members as $taskmember){
                        $cc_email = $taskmember->user->email;
                    }
                }
            }
        $mailto = "vivekbhatt119@gmail.com";
        $cc_email = ["vivek@phppoets.in"];
        ///start code for send email
        if(!empty($mailto)){
            $email = new Email();
            $email->setTransport('SendGrid');
            $email->setProfile('default')
            ->setTemplate('send_email_for_clients')
            ->setEmailFormat('html');
            $email->setFrom(['ankit@phppoets.com' => 'PhpPoets IT Solution Pvt Ltd'])
            ->setTo($mailto)
            ->setCC($cc_email)
            ->setSubject($projects_data[0]->title.'-'.'Completed Task')
            ->setViewVars(['projects_data' => $data]);

            $email->send();
        }
    }
}
