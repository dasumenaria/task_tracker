<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectMembers Controller
 *
 * @property \App\Model\Table\ProjectMembersTable $ProjectMembers
 *
 * @method \App\Model\Entity\ProjectMember[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectMembersController extends AppController
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
        $this->paginate = [
            'contain' => ['Projects', 'Users']
        ];
        $projectMembers = $this->paginate($this->ProjectMembers);

        $this->set(compact('projectMembers'));
    }

    /**
     * View method
     *
     * @param string|null $id Project Member id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectMember = $this->ProjectMembers->get($id, [
            'contain' => ['Projects', 'Users']
        ]);

        $this->set('projectMember', $projectMember);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectMember = $this->ProjectMembers->newEntity();
        if ($this->request->is('post')) {
            $projectMember = $this->ProjectMembers->patchEntity($projectMember, $this->request->getData());
            if ($this->ProjectMembers->save($projectMember)) {
                $this->Flash->success(__('The project member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project member could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectMembers->Projects->find('list', ['limit' => 200]);
        $users = $this->ProjectMembers->Users->find('list', ['limit' => 200]);
        $this->set(compact('projectMember', 'projects', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Member id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectMember = $this->ProjectMembers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectMember = $this->ProjectMembers->patchEntity($projectMember, $this->request->getData());
            if ($this->ProjectMembers->save($projectMember)) {
                $this->Flash->success(__('The project member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project member could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectMembers->Projects->find('list', ['limit' => 200]);
        $users = $this->ProjectMembers->Users->find('list', ['limit' => 200]);
        $this->set(compact('projectMember', 'projects', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Member id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectMember = $this->ProjectMembers->get($id);
		$user_id=$projectMember->user_id;
		$project_id=$projectMember->project_id;
		$Projects = $this->ProjectMembers->Projects->find()->where(['id'=>$project_id])->first();;
		$POCID=$Projects->user_id;
		$this->loadModel('Tasks');
		$this->Tasks->updateAll(['Tasks.user_id' => $POCID], ['Tasks.user_id' => $user_id,'status'=>0,'project_id'=>$project_id]);
        if ($this->ProjectMembers->delete($projectMember)) {
            $this->Flash->success(__('The project member has been deleted.'));
        } else {
            $this->Flash->error(__('The project member could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller'=>'Projects','action' => 'view/'.$project_id]);
    }
}
