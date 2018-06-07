<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MasterClients Controller
 *
 * @property \App\Model\Table\MasterClientsTable $MasterClients
 *
 * @method \App\Model\Entity\MasterClient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MasterClientsController extends AppController
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
    public function index($id=null)
    {
        $this->set('li','Master Clients');
		$this->paginate = [
            'contain' => ['MasterClientPocs'=>function($q){
				return $q->where(['MasterClientPocs.is_deleted'=>0]);
			}, 'Projects'=>['Users']]
        ];
		if(!empty($id)){
			$masterClients = $this->paginate($this->MasterClients->find()->where(['MasterClients.is_deleted'=>0,'id'=>$id]));
		}
		else{
			$masterClients = $this->paginate($this->MasterClients->find()->where(['MasterClients.is_deleted'=>0]));
		}
        $this->set(compact('masterClients'));
    } 
	
    public function view($id = null)
    {
        $this->set('li','Master Clients');
        $masterClient = $this->MasterClients->get($id, [
            'contain' => ['ClientVisites', 'MasterClientPocs', 'Projects']
        ]);

        $this->set('masterClient', $masterClient);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->set('li','Master Clients');
        $masterClient = $this->MasterClients->newEntity();
        if ($this->request->is('post')) {
            $masterClient = $this->MasterClients->patchEntity($masterClient, $this->request->getData());
			//pr($masterClient); exit;
            if ($data=$this->MasterClients->save($masterClient)) {
				$this->MasterClients->MasterClientPocs->deleteAll(["MasterClientPocs.master_client_id"=>$data->id,'MasterClientPocs.contact_person_name'=>'']);
                $this->Flash->success(__('The Client has been saved.'));
               return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Client could not be saved. Please, try again.'));
        }
        $this->set(compact('masterClient'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Master Client id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->set('li','Master Clients');
        $masterClient = $this->MasterClients->get($id, [
            'contain' => ['MasterClientPocs']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $masterClient = $this->MasterClients->patchEntity($masterClient, $this->request->getData());
            if ($this->MasterClients->save($masterClient)) {
				$this->MasterClients->MasterClientPocs->deleteAll(["MasterClientPocs.master_client_id"=>$id,'MasterClientPocs.contact_person_name'=>'']);
                $this->Flash->success(__('The Client has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Client could not be saved. Please, try again.'));
        }
        $this->set(compact('masterClient'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Master Client id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $masterClient = $this->MasterClients->get($id, [
            'contain' => []
        ]); 
		$masterClient = $this->MasterClients->patchEntity($masterClient, $this->request->getData());
		$masterClient->is_deleted=1;
		if ($this->MasterClients->save($masterClient)) {
            $this->Flash->success(__('The Client has been deleted.'));
        } else {
            $this->Flash->error(__('The Client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
