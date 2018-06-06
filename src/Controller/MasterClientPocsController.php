<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MasterClientPocs Controller
 *
 * @property \App\Model\Table\MasterClientPocsTable $MasterClientPocs
 *
 * @method \App\Model\Entity\MasterClientPoc[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MasterClientPocsController extends AppController
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
            'contain' => ['MasterClients']
        ];
        $masterClientPocs = $this->paginate($this->MasterClientPocs);

        $this->set(compact('masterClientPocs'));
    }

    /**
     * View method
     *
     * @param string|null $id Master Client Poc id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $masterClientPoc = $this->MasterClientPocs->get($id, [
            'contain' => ['MasterClients']
        ]);

        $this->set('masterClientPoc', $masterClientPoc);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $masterClientPoc = $this->MasterClientPocs->newEntity();
        if ($this->request->is('post')) {
            $masterClientPoc = $this->MasterClientPocs->patchEntity($masterClientPoc, $this->request->getData());
            if ($this->MasterClientPocs->save($masterClientPoc)) {
                $this->Flash->success(__('The master client poc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master client poc could not be saved. Please, try again.'));
        }
        $masterClients = $this->MasterClientPocs->MasterClients->find('list', ['limit' => 200]);
        $this->set(compact('masterClientPoc', 'masterClients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Master Client Poc id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $masterClientPoc = $this->MasterClientPocs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $masterClientPoc = $this->MasterClientPocs->patchEntity($masterClientPoc, $this->request->getData());
            if ($this->MasterClientPocs->save($masterClientPoc)) {
                $this->Flash->success(__('The master client poc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master client poc could not be saved. Please, try again.'));
        }
        $masterClients = $this->MasterClientPocs->MasterClients->find('list', ['limit' => 200]);
        $this->set(compact('masterClientPoc', 'masterClients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Master Client Poc id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $masterClientPoc = $this->MasterClientPocs->get($id, [
            'contain' => []
        ]);
		$masterClientPoc = $this->MasterClientPocs->patchEntity($masterClientPoc, $this->request->getData());
		$masterClientPoc->is_deleted=1;
        if ($this->MasterClientPocs->save($masterClientPoc)) { 
            $this->Flash->success(__('The client poc has been deleted.'));
        } else {
            $this->Flash->error(__('The client poc could not be deleted. Please, try again.'));
        } 
        return $this->redirect(['controller'=>'MasterClients','action' => 'index']);
    }
}
