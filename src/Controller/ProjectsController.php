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

        $data = $this->request->getData();
        if(!empty($data['client_id']))
            $condition['MasterClients.id'] =  $data['client_id'];

        if(!empty($data['date_from']))
            if($data['date_filter'] == 'created')
                $condition2['Projects.created_on >='] = date('Y-m-d',strtotime($data['date_from']));
            else
                $condition2['Projects.deadline >='] = date('Y-m-d',strtotime($data['date_from']));
        
        if(!empty($data['date_to']))
            if($data['date_filter'] == 'created')
                $condition2['Projects.created_on <='] = date('Y-m-d',strtotime($data['date_to']));
            else
                $condition2['Projects.deadline <='] = date('Y-m-d',strtotime($data['date_to']));

        if(!empty($data['status']))
        {
            if($data['status'] == 2)
                $condition2['Projects.completed_status'] = 0;
            else
                $condition2['Projects.completed_status'] = 1;
        }

        $condition['MasterClients.is_deleted'] = 0;
        $condition2['Projects.is_deleted'] = 0;

        if(isset($data['user_id']))
        {
            $user_id = $data['user_id'];
            unset($data);
            $data = $this->Projects->MasterClients->find()->select(['MasterClients.id','MasterClients.client_name'])->contain(['Projects'=>function($q)use($condition2,$user_id){return $q->order(['created_on'=>'DESC'])->contain(['ProjectMembers'=>function($r)use($user_id){return $r->where(['ProjectMembers.user_id'=>$user_id])->contain(['Users']);},'ProjectStatuses'=>'Projects','Users'=>function($p){return $p->select(['name']);}])->where([$condition2]);}])->where([$condition]);

            foreach ($data as $client) {
                foreach ($client->projects as $key => $project) {
                    if(empty($project->project_members))
                        unset($client->projects[$key]);
                }
            }
            //pr($data->toArray());exit;
        }
        else
        {
            unset($data);
            $data = $this->Projects->MasterClients->find()->select(['MasterClients.id','MasterClients.client_name'])->contain(['Projects'=>function($q)use($condition2){return $q->order(['created_on'=>'DESC'])->contain(['ProjectMembers'=>['Users'=>function($r){return $r->select(['name']);}],'ProjectStatuses'=>'Projects','Users'=>function($p){return $p->select(['name']);}])->where([$condition2]);}])->where([$condition]);
        }

        //pr($data->toArray());exit;
		 
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
            'contain' => ['MasterClients', 'Users', 'ProjectMembers'=>['Users'], 'ProjectStatuses', 'Tasks'=>['Users']]
        ]);

        $this->set('project', $project);
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

                return $this->redirect(['action' => 'index']);
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
        $project = $this->Tasks->get($id, [
            'contain' => []
        ]);
        $project = $this->Tasks->patchEntity($project, $this->request->getData());
        $project->is_deleted=0;
        $project->completed_status=0;
        if ($this->Tasks->save($project)) { 
            $this->Flash->success(__('The project has been undone.'));
        } else {
            $this->Flash->error(__('The project could not be undone. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
