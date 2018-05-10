<?php
namespace App\Controller\Api;
use App\Controller\AppController;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
{

    public function projectList()
    {
        /*$this->paginate = [
            'contain' => ['MasterClients', 'Users']
        ];*/
        $response_object = $this->Projects->find()->where(['completed_status'=>0]);
        $success=true;
		$error='';
		$this->set(compact('success','error','response_object'));	
        $this->set('_serialize', ['success','error','response_object']);
    }
    public function projectListbyUser($user_id=null)
    {
        $user_id=$this->request->getQuery('user_id');
		if($user_id!=1){
			$response_object = $this->Projects->find()
				->innerJoinWith('ProjectMembers',function($q)use($user_id){
					return $q->where(['ProjectMembers.user_id'=>$user_id]);
				})
				->where(['Projects.completed_status'=>0]);
		}
		else{
				$response_object = $this->Projects->find()->where(['Projects.completed_status'=>0]);
		}
        $success=true;
		$error='';
		$this->set(compact('success','error','response_object'));
        $this->set('_serialize', ['success','error','response_object']);
    }
	
	public function projectDetails($project_id=null)
    {
        $project_id=$this->request->getQuery('project_id');  
        $response_object = $this->Projects->find()
			->contain(['MasterClients'=>['MasterClientPocs'],'Users','ProjectMembers'=>['Users'],'Tasks'=>function($q){
				return $q->where(['Tasks.status'=>0]);
			}])
			->where(['Projects.id'=>$project_id,'Projects.completed_status'=>0]);
        $success=true;
		$error='';
		$this->set(compact('success','error','response_object'));
        $this->set('_serialize', ['success','error','response_object']);
    }
    
    public function CreateProject()
    {
        $project = $this->Projects->newEntity(); 
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData(),[ 'associated' => ['ProjectMembers']]); 
			$deadline=$this->request->getData('deadline');
			$login_id=$this->request->getData('login_id');
			$project->deadline=date('Y-m-d',strtotime($deadline));
			$project->created_by=$login_id;
			
            if ($this->Projects->save($project)) {
                $success=true;
				$error='Project create Successfully'; 
            }
			else{
 				$success=false;
				$error='Something Went Wrong'; 
			}
        }
		$this->set(compact('success','error'));
        $this->set('_serialize', ['success','error']); 
    }
	public function ClientList()
    {
        $response_object = $this->Projects->MasterClients->find()->where(['MasterClients.is_deleted'=>0]);
        $success=true;
		$error='';
		$this->set(compact('success','error','response_object'));
        $this->set('_serialize', ['success','error','response_object']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function ProjectCompleted()
    {
        $project_id=$this->request->getData('project_id');
		$project = $this->Projects->get($project_id, [
            'contain' => []
        ]);
    
            $project = $this->Projects->patchEntity($project, $this->request->getData());
			$project->completed_date=date('Y-m-d');
            if ($this->Projects->save($project)) {
                $success=true;
				$error='Project Completed Successfully'; 
            }
			else{
 				$success=false;
				$error='Something Went Wrong'; 
			}
		$this->set(compact('success','error'));
        $this->set('_serialize', ['success','error']); 
    }
	
    public function ProjectEdit()
    {
		$project_id=$this->request->getData('project_id'); 
		
		$Projects = $this->Projects->find()->where(['id'=>$project_id])->toArray();
		if(!empty($Projects))
		{
			foreach($Projects as $Project)
			{
				$TaskStatuses = $this->Projects->ProjectStatuses->newEntity();
				$TaskStatuses->created_by = $Project->created_by;
				$TaskStatuses->deadline = $Project->deadline; 
				$TaskStatuses->project_id = $Project->id; 
				//
				//pr($TaskStatuses); exit;
				if ($this->Projects->ProjectStatuses->save($TaskStatuses))
				{
					$project = $this->Projects->get($project_id, [
						'contain' => []
					]);
 					$this->Projects->ProjectMembers->deleteAll(['ProjectStatuses.project_id'=>$project_id]);
					$project = $this->Projects->patchEntity($project, $this->request->getData(),[ 'associated' => ['ProjectMembers']]); 
					$deadline=$this->request->getData('deadline');
					$login_id=$this->request->getData('login_id');
					$project->deadline=date('Y-m-d',strtotime($deadline));
					$project->created_by=$login_id;
					//pr($project); exit;
					if ($this->Projects->save($project)) {
						$success=true;
						$error='Project Update Successfully'; 
					}
					else{
						$success=false;
						$error='Something Went Wrong'; 
					}					
				}else
				{
					$success=false;
					$error='Not Updated'; 				
				}
			}
		}
        $this->set(compact('success','error'));
        $this->set('_serialize', ['success','error']);
    }
    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
