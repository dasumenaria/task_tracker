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

        $data = $this->request->getQuery();

        if(!empty($data['user_id']))
            $condition['Users.id'] = $data['user_id'];

        if(!empty($data['date_from']))
            $condition2['Leaves.date_from >='] = date('Y-m-d',strtotime($data['date_from']));

        else
            $condition2['Leaves.date_from >='] = date('Y-m-01');

        if(!empty($data['date_to']))
            $condition2['Leaves.date_from <='] = date('Y-m-d',strtotime($data['date_to']));
        else
            $condition2['Leaves.date_from <='] = date('Y-m-t');

        if(!empty($data['leave_status']))
        {
            if($data['leave_status'] == 3)
                $condition2['Leaves.leave_status'] = 0;
            else
                $condition2['Leaves.leave_status'] = $data['leave_status'];
        }

        $condition['Users.is_deleted'] = 0;
        $condition2['Leaves.is_deleted'] = 0;
        unset($data);
        //pr($condition2);exit;

        $data = $this->Leaves->Users->find();
        $data->select(['id','name'])
        ->innerJoinWith('Leaves',function($q)use($condition2){
            return $q->where([$condition2]);
        })
        ->contain(['Leaves'=>function($p)use($condition2){
            return $p->contain(['LeaveTypes'])->where([$condition2]);
        }])
        ->enableAutoFields(true)
        ->order(['Users.name' => 'ASC'])
        ->group(['Leaves.user_id'])
        ->where([$condition]);

        $data = $data->toArray();
        foreach ($data as $key => $user) {
            $total = 0;
            $year = date("Y");
            $month = date('m');

            if($month > 03)
            {
                $start_date = date('Y-04-01');
                $end_date = date(($year+1).'-03-31');
            }
            else
            {
                $start_date = date(($year-1).'-04-01');
                $end_date = date('Y-03-31');
            }    
            $leaves = $this->Leaves->find('All')->where(['Leaves.user_id'=>$user->id,'Leaves.leave_status'=>1,'Leaves.date_from >='=>$start_date,'Leaves.date_from <='=>$end_date]);

            foreach ($leaves as $leave) {
                $datetime1 = new \DateTime($leave->date_from);
                $datetime2 = new \DateTime($leave->date_to);

                $difference = $datetime2->diff($datetime1);
                if($leave->half_day == 'yes')
                    $c = ($difference->days+1)*0.5;
                else
                    $c = $difference->days+1;

                $total+=$c;
            }
            $data[$key]['total_leaves'] = $total;
        }
       //pr($data);exit;

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
    public function edit($id = null,$url = null)
    {
        $url = str_replace('-','%',$url);
        $url = urldecode($url);

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
                
                echo '<meta http-equiv=REFRESH CONTENT=0;url='.$url.'>';
                exit;
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

    public function approve($id = null,$url = null)
    {
        $url = str_replace('-','%',$url);
        $url = urldecode($url);
       // echo $url;exit;

        $query = $this->Leaves->query();
        $query->update()
        ->set(['leave_status' => 1])
        ->where(['id' => $id])
        ->execute();

        //return $this->redirect($url);
        echo '<meta http-equiv=REFRESH CONTENT=0;url='.$url.'>';
        exit;
    }

    public function reject($id = null,$url = null)
    {
        $url = str_replace('-','%',$url);
        $url = urldecode($url);

        $query = $this->Leaves->query();
        $query->update()
        ->set(['leave_status' => 2])
        ->where(['id' => $id])
        ->execute();

        //return $this->redirect(['action' => 'index']);
        echo '<meta http-equiv=REFRESH CONTENT=0;url='.$url.'>';
        exit;
    }

    
}
