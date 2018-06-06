<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Leaves Controller
 *
 * @property \App\Model\Table\LeavesTable $Leaves
 *
 * @method \App\Model\Entity\Leave[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LeavesController extends AppController
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
        $this->set('li','Reports');
        $this->paginate = [
            'contain' => ['Users', 'LeaveTypes']
        ];
        $leaves = $this->paginate($this->Leaves);
        $users = $this->Leaves->Users->find('list')->where(['Users.is_deleted'=>0]);
        $leaveTypes = $this->Leaves->LeaveTypes->find('list')->where(['LeaveTypes.is_deleted'=>0]);
        if ($this->request->is('post')) 
        {
            $data = $this->request->getData();
            //pr($data);exit;

            if(!empty($data['user_id']))
            {
                $condition['Leaves.user_id']  = $data['user_id'];
            }

            if(!empty($data['leave_type_id']))
            {
                    $condition['Leaves.leave_type_id']  = $data['leave_type_id'];
            }

            if(!empty($data['leave_status']))
            {
                if($data['leave_status'] == 3)
                    $condition['Leaves.leave_status']  = 0;
                else
                    $condition['Leaves.leave_status']  = $data['leave_status'];
            }

            if(!empty($data['date_from']))
            {
                $condition['Leaves.date_from >=']  = date('Y-m-d',strtotime($data['date_from']));
            }

            if(!empty($data['date_to']))
            {
                $condition['Leaves.date_to <=']  = date('Y-m-d',strtotime($data['date_to']));
            }
            
            $condition['Leaves.is_deleted'] = 0;

            //pr($condition);exit;
            $leaves = $this->Leaves->find()->where($condition)->contain(['Users','LeaveTypes']);
        }

        $this->set(compact('leaves','users','leaveTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Leave id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $leave = $this->Leaves->get($id, [
            'contain' => ['Users', 'LeaveTypes']
        ]);

        $this->set('leave', $leave);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $leave = $this->Leaves->newEntity();
        if ($this->request->is('post')) {
            $leave = $this->Leaves->patchEntity($leave, $this->request->getData());
            if ($this->Leaves->save($leave)) {
                $this->Flash->success(__('The leave has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The leave could not be saved. Please, try again.'));
        }
        $users = $this->Leaves->Users->find('list', ['limit' => 200]);
        $leaveTypes = $this->Leaves->LeaveTypes->find('list', ['limit' => 200]);
        $this->set(compact('leave', 'users', 'leaveTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Leave id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $leave = $this->Leaves->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leave = $this->Leaves->patchEntity($leave, $this->request->getData());
            if ($this->Leaves->save($leave)) {
                $this->Flash->success(__('The leave has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The leave could not be saved. Please, try again.'));
        }
        $users = $this->Leaves->Users->find('list', ['limit' => 200]);
        $leaveTypes = $this->Leaves->LeaveTypes->find('list', ['limit' => 200]);
        $this->set(compact('leave', 'users', 'leaveTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Leave id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leave = $this->Leaves->get($id);
        if ($this->Leaves->delete($leave)) {
            $this->Flash->success(__('The leave has been deleted.'));
        } else {
            $this->Flash->error(__('The leave could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function approve(int $id = null)
    {
        $query = $this->Leaves->query();
        $query->update()
        ->set(['leave_status' => 1])
        ->where(['id' => $id])
        ->execute();

        return $this->redirect(['action' => 'index']);
    }

    public function reject(int $id = null)
    {
        $query = $this->Leaves->query();
        $query->update()
        ->set(['leave_status' => 2])
        ->where(['id' => $id])
        ->execute();

        return $this->redirect(['action' => 'index']);
    }
}
