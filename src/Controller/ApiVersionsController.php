<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ApiVersions Controller
 *
 * @property \App\Model\Table\ApiVersionsTable $ApiVersions
 *
 * @method \App\Model\Entity\ApiVersion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApiVersionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $apiVersions = $this->paginate($this->ApiVersions);

        $this->set(compact('apiVersions'));
    }

    /**
     * View method
     *
     * @param string|null $id Api Version id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $apiVersion = $this->ApiVersions->get($id, [
            'contain' => []
        ]);

        $this->set('apiVersion', $apiVersion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $apiVersion = $this->ApiVersions->newEntity();
        if ($this->request->is('post')) {
            $apiVersion = $this->ApiVersions->patchEntity($apiVersion, $this->request->getData());
            if ($this->ApiVersions->save($apiVersion)) {
                $this->Flash->success(__('The api version has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The api version could not be saved. Please, try again.'));
        }
        $this->set(compact('apiVersion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Api Version id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $apiVersion = $this->ApiVersions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $apiVersion = $this->ApiVersions->patchEntity($apiVersion, $this->request->getData());
            if ($this->ApiVersions->save($apiVersion)) {
                $this->Flash->success(__('The api version has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The api version could not be saved. Please, try again.'));
        }
        $this->set(compact('apiVersion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Api Version id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $apiVersion = $this->ApiVersions->get($id);
        if ($this->ApiVersions->delete($apiVersion)) {
            $this->Flash->success(__('The api version has been deleted.'));
        } else {
            $this->Flash->error(__('The api version could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
