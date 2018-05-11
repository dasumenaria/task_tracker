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
        $response_object = $this->Projects->find()->where(['completed_status'=>0])->contain(['Tasks'=>function ($q){
			return $q->order(['Tasks.deadline'=>'ASC']);
		}])->order(['deadline'=>'ASC']);
		//start code for get deadline date
			$tasks=[];
			foreach($response_object as $projects){ 
				$tasks[$projects->id]=$projects->tasks;
			}
			
			$task_dates=[];
			foreach($tasks as $task){  
				foreach($task as $tasks_deadline){
					$task_dates[$tasks_deadline->project_id][] = date('Y-m-d',strtotime($tasks_deadline->deadline));
				}
			}
			$totalSizeOf=0;
			foreach($response_object as $projectss){
				if(!empty($projectss->tasks)){				
					$totalSizeOf=sizeof($task_dates[$projectss->id]);
					//pr($projectss); exit;
					//exit;
					$noFoSize=$totalSizeOf-1;
					$LastDateOfTask=$task_dates[$projectss->id][$noFoSize];
					$projectss['LastDateOfTask']=$LastDateOfTask;
				}
				else{
					$projectss['LastDateOfTask']='0000-00-00';
				}
			}
		 
		//ends code for get deadline date

        $success=true;
		$error='';
		$this->set(compact('success','error','response_object'));	
        $this->set('_serialize', ['success','error','response_object']);
    }
    public function projectListbyUser($user_id=null)
    {
        $user_id=$this->request->getQuery('user_id');
		if($user_id!=1){ 
			$count=$response_object = $this->Projects->find()
				->innerJoinWith('ProjectMembers',function($q)use($user_id){
					return $q->where(['ProjectMembers.user_id'=>$user_id]);
				})->contain(['Users','Tasks'=>function ($q) use($user_id){
					return $q->where(['user_id'=>$user_id])->order(['Tasks.deadline'=>'ASC']);
				}])->where(['Projects.completed_status'=>0])->count();
				
		}
		else{ 
			$count=$this->Projects->find()
					->contain(['Users','Tasks'=>function ($q) {
						return $q->order(['Tasks.deadline'=>'ASC']);
					}])->where(['Projects.completed_status'=>0])->count();
		}
		//pr($count);exit;
		if($count > 0){
			if($user_id!=1){
			$response_object = $this->Projects->find()
				->innerJoinWith('ProjectMembers',function($q)use($user_id){
					return $q->where(['ProjectMembers.user_id'=>$user_id]);
				})->contain(['Users','Tasks'=>function ($q) use($user_id){
					return $q->where(['user_id'=>$user_id])->order(['Tasks.deadline'=>'ASC']);
				}])->where(['Projects.completed_status'=>0]);

			}
			else{
				$response_object = $this->Projects->find()
					->contain(['Users','Tasks'=>function ($q) {
						return $q->order(['Tasks.deadline'=>'ASC']);
					}])->where(['Projects.completed_status'=>0]);
			}
			//start code for get deadline date
			$tasks=[];
			foreach($response_object as $projects){ 
				$tasks[$projects->id]=$projects->tasks;
			}
			
			$task_dates=[];
			foreach($tasks as $task){  
				foreach($task as $tasks_deadline){
					$task_dates[$tasks_deadline->project_id][] = date('Y-m-d',strtotime($tasks_deadline->deadline));
				}
			}
			$totalSizeOf=0;
			foreach($response_object as $projectss){
				if(!empty($projectss->tasks)){				
					$totalSizeOf=sizeof($task_dates[$projectss->id]);
					//pr($projectss); exit;
					//exit;
					$noFoSize=$totalSizeOf-1;
					$LastDateOfTask=$task_dates[$projectss->id][$noFoSize];
					$projectss['LastDateOfTask']=$LastDateOfTask;
				}
				else{
					$projectss['LastDateOfTask']='0000-00-00';
				}
			}
		 
		//ends code for get deadline date	
			$success=true;
			$error='';
		}else{ 
			$success=false;
			$error='No data found';
			$Response=array();
		}
		$this->set(compact('success','error','response_object'));
        $this->set('_serialize', ['success','error','response_object']);
    }
	
	public function projectDetails($project_id=null,$user_id=null)
    {
        $project_id=$this->request->getQuery('project_id');  
        $user_id=$this->request->getQuery('user_id');  
       
		if($user_id!=1){ 
			$count=$this->Projects->find()
				->innerJoinWith('ProjectMembers',function($q)use($user_id){
					return $q->where(['ProjectMembers.user_id'=>$user_id]);
				})
				->contain(['MasterClients'=>['MasterClientPocs'],'Users','ProjectMembers','Tasks'=>function($q){
					return $q->where(['Tasks.status'=>0])->order(['Tasks.deadline'=>'ASC']);
				}])
				->where(['Projects.id'=>$project_id,'Projects.completed_status'=>0])->count();
				
		}
		else{ 
			$count=$this->Projects->find()
				->contain(['MasterClients'=>['MasterClientPocs'],'Users','ProjectMembers'=>
					['Users'],'Tasks'=>function($q){
					return $q->where(['Tasks.status'=>0])->order(['Tasks.deadline'=>'ASC']);
				}])
				->where(['Projects.id'=>$project_id,'Projects.completed_status'=>0])->count();
		}
		if($count>0){ 
			if($user_id == 1){
				$response_object = $this->Projects->get($project_id,[
					'contain'=>['MasterClients'=>['MasterClientPocs'],'Users','ProjectMembers'=>['Users'],'Tasks'=>function($q){
						return $q->where(['Tasks.status'=>0])->order(['Tasks.deadline'=>'ASC']);
					}],
					'conditions' => ['Projects.completed_status' => 0],
				]);
			}else{
				$response_object = $this->Projects->find()
					->innerJoinWith('ProjectMembers',function($q)use($user_id){
						return $q->where(['ProjectMembers.user_id'=>$user_id]);
					})
					->contain(['MasterClients'=>['MasterClientPocs'],'Users','ProjectMembers','Tasks'=>function($q){
						return $q->where(['Tasks.status'=>0])->order(['Tasks.deadline'=>'ASC']);
					}])
					->where(['Projects.id'=>$project_id,'Projects.completed_status'=>0])->first();
			}
				//start code for get deadline date
			$tasks=[];
			$tasks[$response_object->id]=$response_object->tasks;
				
			
			$task_dates=[];
			foreach($tasks as $task){  
				foreach($task as $tasks_deadline){
					$task_dates[$tasks_deadline->project_id][] = date('Y-m-d',strtotime($tasks_deadline->deadline));
				}
			}
			$totalSizeOf=0;
				if(!empty($response_object->tasks)){				
					$totalSizeOf=sizeof($task_dates[$response_object->id]);
					//pr($projectss); exit;
					//exit;
					$noFoSize=$totalSizeOf-1;
					$LastDateOfTask=$task_dates[$response_object->id][$noFoSize];
					$response_object['LastDateOfTask']=$LastDateOfTask;
				}
				else{
					$response_object['LastDateOfTask']='0000-00-00';
				}
		 
		//ends code for get deadline date
			$success=true;
			$error=''; 
		}else{ 
			$success=false;
			$error='No data found';
			$Response=array();
		}
			//pr($response_object);exit;
			
        
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
