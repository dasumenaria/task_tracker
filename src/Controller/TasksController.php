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

        $data = $this->Tasks->Projects->find()->select(['id','title'])->order(['title'=>'ASC'])->contain(['Tasks'=>function($p) use($condition2){return $p->order(['created_on'=>'DESC'])->contain(['TaskStatuses'=>'Users','Users'=>function($q){return $q->select(['name']);}])->where([$condition2]);}])->where([$condition]);
        //pr($data->toArray());exit;

        $projects = $this->Tasks->projects->find('list')->where(['is_deleted'=>0])->order(['title'=>'ASC']);
        $users = $this->Tasks->Users->find('list')->where(['is_deleted'=>0])->order(['name'=>'ASC']);

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
        $this->set('li','Tasks');
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
        $this->set('li','Tasks');
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
