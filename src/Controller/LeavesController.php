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
        $data = $this->request->getData();

        if(!empty($data['user_id']))
            $condition['id'] = $data['user_id'];

        if(!empty($data['date_from']))
            $date_from = date('Y-m-d',strtotime($data['date_from']));

        if(!empty($data['date_to']))
            $date_to = date('Y-m-d',strtotime($data['date_to']));

        if(!empty($data['leave_status']))
        {
            if($data['leave_status'] == 3)
                $status = 0;
            else
                $status = $data['leave_status'];
        }

        $condition['is_deleted'] = 0;
        unset($data);

        $data = $this->Leaves->Users->find()->select(['Users.id','Users.name'])->order(['Users.name' => 'ASC'])->contain(['Leaves'=>function($q){
            return $q->where(['Leaves.date_from >='=>date('Y-01-01'),'Leaves.date_to <='=>date('Y-12-31')])->contain(['LeaveTypes']);
        }])->where([$condition]);

        foreach ($data as $value) 
        {
            $value['total_leaves'] = 0;
            foreach ($value->leaves as $key => $leave)
            {
                if($leave->leave_status == 1)
                {
                    $datetime1 = new \DateTime($leave->date_from);

                    $datetime2 = new \DateTime($leave->date_to);

                    $difference = $datetime2->diff($datetime1);
                    $days = $difference->days+1;

                    $value['total_leaves'] += $days;
                }

                if(date('Y-m-d',strtotime($leave->date_from)) >= (isset($date_from)?$date_from:date('Y-m-01')) && date('Y-m-d',strtotime($leave->date_from)) <= (isset($date_to)?$date_to:date('Y-m-t')))
                {}
                else
                {
                    unset($value->leaves[$key]);
                }

                if(isset($status))
                    if($leave->leave_status == $status)
                    {}
                    else
                    {
                        unset($value->leaves[$key]);
                    }

            }
        }

        $users = $this->Leaves->Users->find('list')->order(['name'=>'ASC']);

        $this->set(compact('data','users'));
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
        $this->set('li','Reports');
        $leave = $this->Leaves->get($id, [
            'contain' => []
        ]);

        $leave->date_from = date('d-m-Y',strtotime($leave->date_from));
        $leave->date_to = date('d-m-Y',strtotime($leave->date_to));

        if ($this->request->is(['patch', 'post', 'put'])) {
            $leave = $this->Leaves->patchEntity($leave, $this->request->getData());

            $leave->date_from = date('Y-m-d',strtotime($this->request->getData('date_from')));
            $leave->date_to = date('Y-m-d',strtotime($this->request->getData('date_to')));
            if ($this->Leaves->save($leave)) {
                $this->Flash->success(__('The leave has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error(__('The leave could not be saved. Please, try again.'));
            }
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
