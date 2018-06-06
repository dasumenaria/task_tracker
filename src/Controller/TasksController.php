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
        $this->paginate = [
            'contain' => ['Users', 'Projects','TaskStatuses'=>['Users']],
			'limit'=>40
        ];
        $tasks = $this->paginate($this->Tasks->find()->where(['Tasks.is_deleted'=>0]));

        $this->set(compact('tasks'));
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
        $task = $this->Tasks->get($id, [
            'contain' => ['Users', 'Projects']
        ]);
        $this->set('task', $task);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
			$task->deadline=date('Y-m-d',strtotime($this->request->getData('deadline')));			 
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $users = $this->Tasks->Users->find('list', ['limit' => 200])->where(['is_deleted'=>0]);
        $projects = $this->Tasks->Projects->find('list', ['limit' => 200])->where(['is_deleted'=>0]);
		$this->set(compact('task','users','projects'));
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
		$TaskStatuses = $this->Tasks->TaskStatuses->newEntity();
        $task = $this->Tasks->get($id, [
            'contain' => ['TaskStatuses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
			$task->deadline=date('Y-m-d',strtotime($this->request->getData('deadline')));
            if ($this->Tasks->save($task)) {
				$TaskStatuses = $this->Tasks->TaskStatuses->patchEntity($TaskStatuses, $this->request->getData());
				$TaskStatuses->deadline=$this->request->getData('TaskStatusesDeadline');
				$TaskStatuses->user_id=$this->Auth->User('id');
				$TaskStatuses->task_id=$id;
				$this->Tasks->TaskStatuses->save($TaskStatuses);				
                $this->Flash->success(__('The task has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $users = $this->Tasks->Users->find('list', ['limit' => 200])->where(['is_deleted'=>0]);
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
}
