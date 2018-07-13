<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ClientVisites Controller
 *
 * @property \App\Model\Table\ClientVisitesTable $ClientVisites
 *
 * @method \App\Model\Entity\ClientVisite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientVisitesController extends AppController
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

        $query = $this->ClientVisites->query();
        $client_count = $this->ClientVisites->find()->select(['ClientVisites.master_client_id', 'count'=>$query->func()->count('ClientVisites.master_client_id')])
            ->group(['ClientVisites.master_client_id'])
            ->where(['ClientVisites.is_deleted'=>0]);

        $i = 0;
        foreach ($client_count as $client) {
            $i++;
            $meetings = $this->ClientVisites->find()->where(['ClientVisites.master_client_id'=>$client->master_client_id,'ClientVisites.is_deleted'=>0])->contain(['Users','MasterClients'])->toArray();

            $data[$i]['master_client_id'] = $client->master_client_id;
            $data[$i]['client_name'] = $meetings[0]->master_client->client_name;
            $data[$i]['total_meetings'] = $client->count;

            $j = 0;
            foreach ($meetings as $meeting) {
                $j++;
                $data[$i]['meeting_data'][$j]['id'] = $meeting->id;
                $data[$i]['meeting_data'][$j]['user'] = $meeting->user->name;
                $data[$i]['meeting_data'][$j]['reason'] = $meeting->reason;
                $data[$i]['meeting_data'][$j]['vehicle_type'] = $meeting->vehicle_type;
                $data[$i]['meeting_data'][$j]['visit_date'] = $meeting->visit_date;
            }
            
        }
        //pr($data);exit;

        $users = $this->ClientVisites->Users->find('list')->where(['Users.is_deleted'=>0]);
        $masterClients = $this->ClientVisites->MasterClients->find('list')->where(['MasterClients.is_deleted'=>0]);
        if ($this->request->is('post')) 
        {
            $data = $this->request->getData();
            //pr($data);exit;

            if(!empty($data['user_id']))
            {
                $condition['ClientVisites.user_id']  = $data['user_id'];
                $condition2['ClientVisites.user_id']  = $data['user_id'];
            }

            if(!empty($data['master_client_id']))
            {
                $condition['ClientVisites.master_client_id']  = $data['master_client_id'];
            }

            if(!empty($data['date_from']))
            {
                $condition['ClientVisites.visit_date >=']  = date('Y-m-d',strtotime($data['date_from']));

                $condition2['ClientVisites.visit_date >=']  = date('Y-m-d',strtotime($data['date_from']));
            }

            if(!empty($data['date_to']))
            {
                $condition['ClientVisites.visit_date <=']  = date('Y-m-d',strtotime($data['date_to']));

                $condition2['ClientVisites.visit_date <=']  = date('Y-m-d',strtotime($data['date_to']));
            }
            
            $condition['ClientVisites.is_deleted'] = 0;
            $condition['ClientVisites.is_deleted'] = 0;
            unset($data);

            //pr($condition);exit;

            $query = $this->ClientVisites->query();
            $client_count = $this->ClientVisites->find()->select(['ClientVisites.master_client_id', 'count'=>$query->func()->count('ClientVisites.master_client_id')])
                ->group(['ClientVisites.master_client_id'])
                ->where([$condition]);

            $i = 0;
            foreach ($client_count as $client) {
                $i++;
                $condition2['ClientVisites.master_client_id'] = $client->master_client_id;

                $meetings = $this->ClientVisites->find()->where([$condition2])->contain(['Users','MasterClients'])->toArray();

                $data[$i]['master_client_id'] = $client->master_client_id;
                $data[$i]['client_name'] = $meetings[0]->master_client->client_name;
                $data[$i]['total_meetings'] = $client->count;

                $j = 0;
                foreach ($meetings as $meeting) {
                    $j++;
                    $data[$i]['meeting_data'][$j]['id'] = $meeting->id;
                    $data[$i]['meeting_data'][$j]['user'] = $meeting->user->name;
                    $data[$i]['meeting_data'][$j]['reason'] = $meeting->reason;
                    $data[$i]['meeting_data'][$j]['vehicle_type'] = $meeting->vehicle_type;
                    $data[$i]['meeting_data'][$j]['visit_date'] = $meeting->visit_date;
                }
                
            }
        }

        $this->set(compact('data','users','masterClients'));
    }


    /**
     * View method
     *
     * @param string|null $id Client Visite id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clientVisite = $this->ClientVisites->get($id, [
            'contain' => ['MasterClients', 'Users']
        ]);

        $this->set('clientVisite', $clientVisite);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clientVisite = $this->ClientVisites->newEntity();
        if ($this->request->is('post')) {
            $clientVisite = $this->ClientVisites->patchEntity($clientVisite, $this->request->getData());
            if ($this->ClientVisites->save($clientVisite)) {
                $this->Flash->success(__('The client visite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client visite could not be saved. Please, try again.'));
        }
        $masterClients = $this->ClientVisites->MasterClients->find('list', ['limit' => 200]);
        $users = $this->ClientVisites->Users->find('list', ['limit' => 200]);
        $this->set(compact('clientVisite', 'masterClients', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client Visite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clientVisite = $this->ClientVisites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clientVisite = $this->ClientVisites->patchEntity($clientVisite, $this->request->getData());
            if ($this->ClientVisites->save($clientVisite)) {
                $this->Flash->success(__('The client visite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client visite could not be saved. Please, try again.'));
        }
        $masterClients = $this->ClientVisites->MasterClients->find('list', ['limit' => 200]);
        $users = $this->ClientVisites->Users->find('list', ['limit' => 200]);
        $this->set(compact('clientVisite', 'masterClients', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client Visite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clientVisite = $this->ClientVisites->get($id);
        if ($this->ClientVisites->delete($clientVisite)) {
            $this->Flash->success(__('The client visite has been deleted.'));
        } else {
            $this->Flash->error(__('The client visite could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
