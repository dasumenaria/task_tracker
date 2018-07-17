<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MasterRoles Controller
 *
 * @property \App\Model\Table\MasterRolesTable $MasterRoles
 *
 * @method \App\Model\Entity\MasterRole[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MasterRolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $masterRoles = $this->paginate($this->MasterRoles);

        $this->set(compact('masterRoles'));
    }

    /**
     * View method
     *
     * @param string|null $id Master Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $masterRole = $this->MasterRoles->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('masterRole', $masterRole);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $masterRole = $this->MasterRoles->newEntity();
        if ($this->request->is('post')) {
            $masterRole = $this->MasterRoles->patchEntity($masterRole, $this->request->getData());
            if ($this->MasterRoles->save($masterRole)) {
                $this->Flash->success(__('The master role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master role could not be saved. Please, try again.'));
        }
        $this->set(compact('masterRole'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Master Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $masterRole = $this->MasterRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $masterRole = $this->MasterRoles->patchEntity($masterRole, $this->request->getData());
            if ($this->MasterRoles->save($masterRole)) {
                $this->Flash->success(__('The master role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master role could not be saved. Please, try again.'));
        }
        $this->set(compact('masterRole'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Master Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $masterRole = $this->MasterRoles->get($id);
        if ($this->MasterRoles->delete($masterRole)) {
            $this->Flash->success(__('The master role has been deleted.'));
        } else {
            $this->Flash->error(__('The master role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
