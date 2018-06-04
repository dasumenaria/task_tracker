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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id=null)
    {
        $this->paginate = [
            'contain' => ['MasterClients', 'Users']
        ];
		 
		if(!empty($id)){
			$projects = $this->paginate($this->Projects->find()->where(['Projects.is_deleted'=>0,'Projects.id'=>$id]));
		}
		else {
			$projects = $this->paginate($this->Projects->find()->where(['Projects.is_deleted'=>0]));
		}
		 
        $this->set(compact('projects'));
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
        $masterClients = $this->Projects->MasterClients->find('list', ['limit' => 200]);
        $users = $this->Projects->Users->find('list', ['limit' => 200]);
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
        $project = $this->Projects->get($id, [
            'contain' => ['ProjectMembers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
			$project->deadline=date('Y-m-d',strtotime($this->request->getData('deadline')));
			//pr($project); exit;
            if ($this->Projects->save($project)) {
				$projectmenbers=$this->request->getData('projectmenbers');
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
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
