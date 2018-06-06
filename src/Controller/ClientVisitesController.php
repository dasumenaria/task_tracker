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
        $this->paginate = [
            'contain' => ['MasterClients', 'Users']
        ];
        $clientVisites = $this->paginate($this->ClientVisites);

        $this->set(compact('clientVisites'));
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
