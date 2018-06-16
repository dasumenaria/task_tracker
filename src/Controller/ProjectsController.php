<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
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
        $this->set('li','Projects');
        $condition2 = [];

        $data = $this->request->getData();

        if(!empty($data['client_id']))
            $condition['MasterClients.id'] =  $data['client_id'];

        if(!empty($data['date_from']))
            if($data['date_filter'] == 'created')
                $condition1['Projects.created_on >='] = date('Y-m-d',strtotime($data['date_from']));
            else
                $condition1['Projects.deadline >='] = date('Y-m-d',strtotime($data['date_from']));
        
        if(!empty($data['date_to']))
            if($data['date_filter'] == 'created')
                $condition1['Projects.created_on <='] = date('Y-m-d',strtotime($data['date_to']));
            else
                $condition1['Projects.deadline <='] = date('Y-m-d',strtotime($data['date_to']));

        if(!empty($data['status']))
        {
            if($data['status'] == 3)
                $condition1['Projects.completed_status'] = 0;
            else
                $condition1['Projects.completed_status'] = $data['status'];
        }

        if(!empty($data['user_id']))
            $condition2['ProjectMembers.user_id'] = $data['user_id'];

        $condition['MasterClients.is_deleted'] = 0;
        $condition1['Projects.is_deleted'] = 0;
        unset($data);

        $data = $this->Projects->MasterClients->find('all');
        $data->select(['MasterClients.id','MasterClients.client_name','total_project'=>$data->func()->count('Projects.id')])
        ->innerJoinWith('Projects',function($q)use($condition1,$condition2){
            return $q->select(['Projects.id'])->innerJoinWith('ProjectMembers',function($p)use($condition1,$condition2){
                return $p->where([$condition2]);
            })
            ->order(['Projects.created_on'=>'DESC'])
            ->where([$condition1]);
        })
        ->group('Projects.master_client_id')
        ->order(['MasterClients.client_name'=>'ASC'])
        ->contain(['Projects'=>function($s)use($condition1,$condition2){
            return $s->contain('ProjectMembers',function($p)use($condition1,$condition2){
                return $p->where([$condition2]);
            })
            ->where([$condition1])
            ->contain(['ProjectMembers'=>['Users'=>function($r){return $r->select(['name']);}]])
            ->order(['Projects.created_on'=>'DESC']);
        }])
        ->where([$condition]);

        $data = $data->toArray();

        foreach ($data as $k => $client) {
            foreach ($client->projects as $key => $project) {
                    if(empty($project->project_members))
                        unset($data[$k]['projects'][$key]);          
            }
        }

        //pr($data);exit;
		 
        $clients = $this->Projects->MasterClients->find('list')->where(['MasterClients.is_deleted'=>0])->order(['client_name'=>'ASC']);
		$users = $this->Projects->Users->find('list')->where(['Users.is_deleted'=>0])->order(['name'=>'ASC']);
		 
        $this->set(compact('clients','users','data'));
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('li','Projects');
        $project = $this->Projects->get($id, [
            'contain' => ['MasterClients', 'Users', 'ProjectMembers'=>['Users'], 'ProjectStatuses', 'Tasks'=>['TaskMembers'=>'Users']]
        ]);

        $this->set(compact('project','id'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->set('li','Projects');
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
			$project->deadline=date('Y-m-d',strtotime($this->request->getData('deadline')));
			$project->created_by=$this->Auth->User('id');
			
            if ($data=$this->Projects->save($project)) {
				$projectmenbers=$this->request->getData('projectmenbers');
				foreach($projectmenbers as $users)
				{
					$projectMembers = $this->Projects->ProjectMembers->newEntity();
					$projectMembers = $this->Projects->ProjectMembers->patchEntity($projectMembers, $this->request->getData());
					$projectMembers->project_id = $data->id;
					$projectMembers->user_id = $users;
					//pr($projectMembers); exit;
					$this->Projects->ProjectMembers->save($projectMembers);
				}
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $masterClients = $this->Projects->MasterClients->find('list', ['limit' => 200])->order(['client_name'=>'ASC']);
        $users = $this->Projects->Users->find('list', ['limit' => 200])->order(['name'=>'ASC']);
        $this->set(compact('project', 'masterClients', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->set('li','Projects');
        $project_old = $this->Projects->get($id, [
            'contain' => ['ProjectMembers']
        ]);

        $project = $this->Projects->get($id, [
            'contain' => ['ProjectMembers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projects = $this->Projects->patchEntity($project, $this->request->getData());
			$projects->deadline=date('Y-m-d',strtotime($this->request->getData('deadline')));
			//pr($project); exit;
            if ($this->Projects->save($projects)) {
				$projectmenbers=$this->request->getData('projectmenbers');

                    $status = $this->Projects->ProjectStatuses->newEntity();
                    $status->project_id = $id;
                    $status->deadline = $project_old->deadline;
                    $status->created_by = $this->Auth->User('id');
                    $status = $this->Projects->ProjectStatuses->patchEntity($status,$status->toArray());
                    $this->Projects->ProjectStatuses->save($status);

				$this->Projects->ProjectMembers->deleteAll(["project_id"=>$id]);
				foreach($projectmenbers as $users)
				{
					$projectMembers = $this->Projects->ProjectMembers->newEntity();
					$projectMembers = $this->Projects->ProjectMembers->patchEntity($projectMembers, $this->request->getData());
					$projectMembers->project_id = $id;
					$projectMembers->user_id = $users;
					//pr($projectMembers); exit;
                    $this->Projects->ProjectMembers->save($projectMembers);
				}
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $masterClients = $this->Projects->MasterClients->find('list', ['limit' => 200]);
        $users = $this->Projects->Users->find('list', ['limit' => 200]);
        $this->set(compact('project', 'masterClients', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $project = $this->Tasks->get($id, [
            'contain' => []
        ]);
        $project = $this->Projects->patchEntity($project, $this->request->getData());
        $project->is_deleted=1;
        if ($this->Projects->save($project)) { 
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function undodelete($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        $project = $this->Projects->patchEntity($project, $this->request->getData());
        $project->is_deleted=0;
        $project->completed_status=0;
        if ($this->Projectojects->save($project)) { 
            $this->Flash->success(__('The project has been undone.'));
        } else {
            $this->Flash->error(__('The project could not be undone. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function overdue()
    {
        $query = $this->Projects->query();
        $query->update()
        ->set(['completed_status' => 2])
        ->where(['Projects.deadline <' => date('Y-m-d'),'Projects.completed_status'=>0])
        ->execute();
        exit;
    }
}
