<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TaskMembers Controller
 *
 * @property \App\Model\Table\TaskMembersTable $TaskMembers
 *
 * @method \App\Model\Entity\TaskMember[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TaskMembersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tasks', 'Users']
        ];
        $taskMembers = $this->paginate($this->TaskMembers);

        $this->set(compact('taskMembers'));
    }

    /**
     * View method
     *
     * @param string|null $id Task Member id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $taskMember = $this->TaskMembers->get($id, [
            'contain' => ['Tasks', 'Users']
        ]);

        $this->set('taskMember', $taskMember);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $taskMember = $this->TaskMembers->newEntity();
        if ($this->request->is('post')) {
            $taskMember = $this->TaskMembers->patchEntity($taskMember, $this->request->getData());
            if ($this->TaskMembers->save($taskMember)) {
                $this->Flash->success(__('The task member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task member could not be saved. Please, try again.'));
        }
        $tasks = $this->TaskMembers->Tasks->find('list', ['limit' => 200]);
        $users = $this->TaskMembers->Users->find('list', ['limit' => 200]);
        $this->set(compact('taskMember', 'tasks', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Task Member id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $taskMember = $this->TaskMembers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $taskMember = $this->TaskMembers->patchEntity($taskMember, $this->request->getData());
            if ($this->TaskMembers->save($taskMember)) {
                $this->Flash->success(__('The task member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task member could not be saved. Please, try again.'));
        }
        $tasks = $this->TaskMembers->Tasks->find('list', ['limit' => 200]);
        $users = $this->TaskMembers->Users->find('list', ['limit' => 200]);
        $this->set(compact('taskMember', 'tasks', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Task Member id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $taskMember = $this->TaskMembers->get($id);
        if ($this->TaskMembers->delete($taskMember)) {
            $this->Flash->success(__('The task member has been deleted.'));
        } else {
            $this->Flash->error(__('The task member could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
