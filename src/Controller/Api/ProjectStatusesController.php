<?php
namespace App\Controller\Api;
use App\Controller\Api;
use App\Controller\Api\AppController;

/**
 * ProjectStatuses Controller
 *
 * @property \App\Model\Table\ProjectStatusesTable $ProjectStatuses
 *
 * @method \App\Model\Entity\ProjectStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectStatusesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects']
        ];
        $projectStatuses = $this->paginate($this->ProjectStatuses);

        $this->set(compact('projectStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Project Status id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectStatus = $this->ProjectStatuses->get($id, [
            'contain' => ['Projects']
        ]);

        $this->set('projectStatus', $projectStatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectStatus = $this->ProjectStatuses->newEntity();
        if ($this->request->is('post')) {
            $projectStatus = $this->ProjectStatuses->patchEntity($projectStatus, $this->request->getData());
            if ($this->ProjectStatuses->save($projectStatus)) {
                $this->Flash->success(__('The project status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project status could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectStatuses->Projects->find('list', ['limit' => 200]);
        $this->set(compact('projectStatus', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectStatus = $this->ProjectStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectStatus = $this->ProjectStatuses->patchEntity($projectStatus, $this->request->getData());
            if ($this->ProjectStatuses->save($projectStatus)) {
                $this->Flash->success(__('The project status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project status could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectStatuses->Projects->find('list', ['limit' => 200]);
        $this->set(compact('projectStatus', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectStatus = $this->ProjectStatuses->get($id);
        if ($this->ProjectStatuses->delete($projectStatus)) {
            $this->Flash->success(__('The project status has been deleted.'));
        } else {
            $this->Flash->error(__('The project status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
