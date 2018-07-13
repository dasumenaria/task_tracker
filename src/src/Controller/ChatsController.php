<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Chats Controller
 *
 * @property \App\Model\Table\ChatsTable $Chats
 *
 * @method \App\Model\Entity\Chat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChatsController extends AppController
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
            'contain' => ['UserFroms', 'UserTos', 'Projects']
        ];
        $chats = $this->paginate($this->Chats);

        $this->set(compact('chats'));
    }

    /**
     * View method
     *
     * @param string|null $id Chat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chat = $this->Chats->get($id, [
            'contain' => ['UserFroms', 'UserTos', 'Projects']
        ]);

        $this->set('chat', $chat);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chat = $this->Chats->newEntity();
        if ($this->request->is('post')) {
            $chat = $this->Chats->patchEntity($chat, $this->request->getData());
            if ($this->Chats->save($chat)) {
                $this->Flash->success(__('The chat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chat could not be saved. Please, try again.'));
        }
        $userFroms = $this->Chats->UserFroms->find('list', ['limit' => 200]);
        $userTos = $this->Chats->UserTos->find('list', ['limit' => 200]);
        $projects = $this->Chats->Projects->find('list', ['limit' => 200]);
        $this->set(compact('chat', 'userFroms', 'userTos', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chat id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chat = $this->Chats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chat = $this->Chats->patchEntity($chat, $this->request->getData());
            if ($this->Chats->save($chat)) {
                $this->Flash->success(__('The chat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chat could not be saved. Please, try again.'));
        }
        $userFroms = $this->Chats->UserFroms->find('list', ['limit' => 200]);
        $userTos = $this->Chats->UserTos->find('list', ['limit' => 200]);
        $projects = $this->Chats->Projects->find('list', ['limit' => 200]);
        $this->set(compact('chat', 'userFroms', 'userTos', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chat id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chat = $this->Chats->get($id);
        if ($this->Chats->delete($chat)) {
            $this->Flash->success(__('The chat has been deleted.'));
        } else {
            $this->Flash->error(__('The chat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
