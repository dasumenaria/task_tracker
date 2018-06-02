<?php
namespace App\Controller\Api;
use App\Controller\Api;
use App\Controller\Api\AppController;

/**
 * ClientVisites Controller
 *
 * @property \App\Model\Table\ClientVisitesTable $ClientVisites
 *
 * @method \App\Model\Entity\ClientVisite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientVisitesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function clientVisitList($user_id=null)
    {
		$user_id=$this->request->getQuery('user_id'); 
        if($user_id==1){
            $count = $this->ClientVisites->find()->contain(['MasterClients','Users'])->count();
        }
        else
        { 
            $count = $this->ClientVisites->find()->where(['ClientVisites.user_id'=>$user_id])->contain(['MasterClients','Users'])->count();
        }
		if($count>0){
			 if($user_id==1){ 
				$response_object = $this->ClientVisites->find()->contain(['MasterClients','Users']);
			}
			else
			{  
				$response_object = $this->ClientVisites->find()->where(['ClientVisites.user_id'=>$user_id])->contain(['MasterClients','Users']);
			}
			$success=true;
			$error='';
		}
		else{
			$success=false;
			$response_object=array();
			$error='';
		}
        
		$this->set(compact('success','error','response_object'));	
        $this->set('_serialize', ['success','error','response_object']);
    }
	
    public function AddClientVisit()
    {
        $clientVisite = $this->ClientVisites->newEntity();
        if ($this->request->is('post')) {
            $clientVisite = $this->ClientVisites->patchEntity($clientVisite, $this->request->getData());
			$visit_date=$this->request->getData('visit_date'); 
			$clientVisite->visit_date=date('Y-m-d',strtotime($visit_date));
			 
            if ($this->ClientVisites->save($clientVisite)) {
                $success=true;
				$error='Successfully Submitted'; 
            }
			else{
 				$success=false;
				$error='Something Went Wrong'; 
			}
            $this->set(compact('success','error'));
			$this->set('_serialize', ['success','error']);
        }
        
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
