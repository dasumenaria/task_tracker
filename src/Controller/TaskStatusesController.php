<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TaskStatuses Controller
 *
 * @property \App\Model\Table\TaskStatusesTable $TaskStatuses
 *
 * @method \App\Model\Entity\TaskStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TaskStatusesController extends AppController
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
            'contain' => ['Users']
        ];
        $taskStatuses = $this->paginate($this->TaskStatuses);

        $this->set(compact('taskStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Task Status id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $taskStatus = $this->TaskStatuses->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('taskStatus', $taskStatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $taskStatus = $this->TaskStatuses->newEntity();
        if ($this->request->is('post')) {
            $taskStatus = $this->TaskStatuses->patchEntity($taskStatus, $this->request->getData());
            if ($this->TaskStatuses->save($taskStatus)) {
                $this->Flash->success(__('The task status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task status could not be saved. Please, try again.'));
        }
        $users = $this->TaskStatuses->Users->find('list', ['limit' => 200]);
        $this->set(compact('taskStatus', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Task Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $taskStatus = $this->TaskStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $taskStatus = $this->TaskStatuses->patchEntity($taskStatus, $this->request->getData());
            if ($this->TaskStatuses->save($taskStatus)) {
                $this->Flash->success(__('The task status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task status could not be saved. Please, try again.'));
        }
        $users = $this->TaskStatuses->Users->find('list', ['limit' => 200]);
        $this->set(compact('taskStatus', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Task Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $taskStatus = $this->TaskStatuses->get($id);
        if ($this->TaskStatuses->delete($taskStatus)) {
            $this->Flash->success(__('The task status has been deleted.'));
        } else {
            $this->Flash->error(__('The task status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
