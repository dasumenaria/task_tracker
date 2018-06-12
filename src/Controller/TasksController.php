<?php
namespace App\Controller;

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
		$this->Auth->allow(['logout']);
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

        $data = $this->request->getData();

        if(!empty($data['project_id']))
            $condition['Projects.id'] =  $data['project_id'];

        if(!empty($data['user_id']))
            $condition2['Tasks.user_id'] =  $data['user_id'];

        if(!empty($data['date_from']))
            if($data['date_filter'] == 'created')
                $condition2['Tasks.created_on >='] = date('Y-m-d',strtotime($data['date_from']));
            else
                $condition2['Tasks.deadline >='] = date('Y-m-d',strtotime($data['date_from']));
        
        if(!empty($data['date_to']))
            if($data['date_filter'] == 'created')
                $condition2['Tasks.created_on <='] = date('Y-m-d',strtotime($data['date_to']));
            else
                $condition2['Tasks.deadline <='] = date('Y-m-d',strtotime($data['date_to']));
        if(!empty($data['status']))
        {
            if($data['status'] == 2)
                $condition2['Tasks.status'] = 0;
            else
                $condition2['Tasks.status'] = 1;
        }

        $condition['Projects.is_deleted'] = 0;
        $condition2['Tasks.is_deleted'] = 0;

        unset($data);

        $data = $this->Tasks->Projects->find()->select(['id','title'])->order(['title'=>'ASC'])->contain(['Tasks'=>function($p) use($condition2){return $p->order(['created_on'=>'DESC'])->contain(['TaskMembers'=>'Users','TaskStatuses'=>'Users'])->where([$condition2]);}])->where([$condition]);

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

                return $this->redirect(['action' => 'index']);
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
    public function edit($id = null)
    {
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
    public function delete($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => []
        ]);
		$task = $this->Tasks->patchEntity($task, $this->request->getData());
		$task->is_deleted=1;
		if ($this->Tasks->save($task)) { 
            $this->Flash->success(__('The task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
    public function undodelete($id = null)
    {
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
        return $this->redirect(['action' => 'index']);
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
}
