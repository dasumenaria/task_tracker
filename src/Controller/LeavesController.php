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

        $query = $this->Leaves->query();
        $user_count = $this->Leaves->find()->select(['Leaves.user_id', 'count'=>$query->func()->count('Leaves.user_id')])
            ->group(['Leaves.user_id'])
            ->where(['Leaves.is_deleted'=>0]);

        $i = 0;
        foreach ($user_count as $user) {
            $i++;
            $leaves = $this->Leaves->find()->where(['Leaves.user_id'=>$user->user_id,'Leaves.is_deleted'=>0])->contain(['Users','LeaveTypes'])->toArray();

            $data[$i]['user_id'] = $user->user_id;
            $data[$i]['user_name'] = $leaves[0]->user->name;
            $data[$i]['total_leaves'] = $user->count;

            $j = 0;
            foreach ($leaves as $leave) {
                $j++;
                $data[$i]['leave_data'][$j]['id'] = $leave->id;
                $data[$i]['leave_data'][$j]['leave_type'] = $leave->leave_type->type;
                $data[$i]['leave_data'][$j]['leave_status'] = $leave->leave_status;
                $data[$i]['leave_data'][$j]['leave_reason'] = $leave->leave_reason;
                $data[$i]['leave_data'][$j]['date_from'] = $leave->date_from;
                $data[$i]['leave_data'][$j]['date_to'] = $leave->date_to;
            }
            
        }
        //  pr($data);exit;

        $users = $this->Leaves->Users->find('list')->where(['Users.is_deleted'=>0]);

        if ($this->request->is('post')) 
        {
            $data = $this->request->getData();
            //pr($data);exit;

            if(!empty($data['user_id']))
            {
                $condition['Leaves.user_id']  = $data['user_id'];
            }

            if(!empty($data['leave_status']))
            {
                if($data['leave_status'] == 3)
                {
                    $condition['Leaves.leave_status']  = 0;
                    $condition2['Leaves.leave_status']  = 0;
                }
                else
                {
                    $condition['Leaves.leave_status']  = $data['leave_status'];
                    $condition2['Leaves.leave_status']  = $data['leave_status'];
                }
            }

            if(!empty($data['date_from']))
            {
                $condition['Leaves.date_from >=']  = date('Y-m-d',strtotime($data['date_from']));

                $condition2['Leaves.date_from >=']  = date('Y-m-d',strtotime($data['date_from']));
            }

            if(!empty($data['date_to']))
            {
                $condition['Leaves.date_to <=']  = date('Y-m-d',strtotime($data['date_to']));

                $condition2['Leaves.date_to <=']  = date('Y-m-d',strtotime($data['date_to']));
            }
            
            $condition['Leaves.is_deleted'] = 0;
            $condition2['Leaves.is_deleted'] = 0;
            unset($data);

            //pr($condition);exit;
            $query = $this->Leaves->query();
            $user_count = $this->Leaves->find()->select(['Leaves.user_id', 'count'=>$query->func()->count('Leaves.user_id')])
                ->group(['Leaves.user_id'])
                ->where([$condition]);

            $i = 0;
            foreach ($user_count as $user) {
                $i++;
                $condition2['Leaves.user_id'] = $user->user_id;
                $leaves = $this->Leaves->find()->where($condition2)->contain(['Users','LeaveTypes'])->toArray();

                $data[$i]['user_id'] = $user->user_id;
                $data[$i]['user_name'] = $leaves[0]->user->name;
                $data[$i]['total_leaves'] = $user->count;

                $j = 0;
                foreach ($leaves as $leave) {
                    $j++;
                    $data[$i]['leave_data'][$j]['id'] = $leave->id;
                    $data[$i]['leave_data'][$j]['leave_type'] = $leave->leave_type->type;
                    $data[$i]['leave_data'][$j]['leave_status'] = $leave->leave_status;
                    $data[$i]['leave_data'][$j]['leave_reason'] = $leave->leave_reason;
                    $data[$i]['leave_data'][$j]['date_from'] = $leave->date_from;
                    $data[$i]['leave_data'][$j]['date_to'] = $leave->date_to;
                }
                
            }
            //pr($data);exit;
        }

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

        $leave->date_from = date('d/m/Y',strtotime($leave->date_from));
        $leave->date_to = date('d/m/Y',strtotime($leave->date_to));

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
