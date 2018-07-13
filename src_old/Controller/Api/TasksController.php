<?php
namespace App\Controller\Api;
use App\Controller\Api;
use App\Controller\Api\AppController;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 *
 * @method \App\Model\Entity\Task[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TasksController extends AppController
{
	public function initialize()
	{
		parent::initialize();
 	} 
    public function CreateTask()
    {	 
		$project_id=$this->request->getData('project_id');
		$title=$this->request->getData('title');
		$login_id=$this->request->getData('login_id');
		$user_ids=$this->request->getData('user_id');
		$deadline=$this->request->getData('deadline');
		 $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
           
           
             
            $i = 0;
            foreach ($this->request->getData('user_id') as $user_id) 
            {
                $task_members[$i]['user_id'] = $user_id;  
                $i++;
            }
             $data = $this->request->getData();
             $data['task_members']=$task_members;
           
            
				$query = $this->Tasks->query();
						$query->insert(['project_id', 'title', 'deadline','created_user_id'])
						->values([
						'project_id' => $project_id,
						'title' => $title,
						'deadline' => date('Y-m-d',strtotime($deadline)),
						'created_user_id'=>$login_id,
						]);
						
				if($query->execute()){
				   $last_insert_id =  $this->Tasks->find()->select('id')->order(['id'=>'DESC'])->first();
				  // pr();exit;
				    foreach ($this->request->getData('user_id') as $user_id) 
                       {
				               $query1 = $this->Tasks->TaskMembers->query();
					                	$query1->insert(['task_id','user_id'])
					             	->values([
					                     	'task_id' => $last_insert_id->id,
					                      	'user_id' => $user_id
					           	]);
					           	$query1->execute();
                       }
				    if($login_id == 1){
						$message = "Task Created By Admin";
					}else{
						$user_name = $this->Tasks->TaskMembers->Users->get($login_id);
						$userNames =  $user_name->name;
						$message = "Task Created By".''.$userNames;
					}
					
					//$this->chatsOfUsers($login_id,$user_ids,$project_id,$message);
					$success=true;
					$error='Task Created Successfully';
				}else{
					$success=false;
					$error='Something Went Wrong'; 
				}
			
        } 
        $this->set(compact('success','error'));
        $this->set('_serialize', ['success','error']);
    }
	 
    public function TaskAction()
    {
		$task_id=$this->request->getData('task_id'); 
		$user_id=$this->request->getData('user_id'); 
        $task = $this->Tasks->get($task_id, [
            'contain' => []
        ]);
		$task = $this->Tasks->patchEntity($task, $this->request->getData());
		$task->completed_on=date('Y-m-d');
		$task->completed_by =$user_id;
		if ($this->Tasks->save($task)) {
				$success=true;
			$error='Task Updated Successfully'; 
		}
		else{
			$success=false;
			$error='Something Went Wrong'; 
		}
        $this->set(compact('success','error'));
        $this->set('_serialize', ['success','error']);
        
    }
	public function CompletedList()
    {
        
		$project_id=$this->request->getData('project_id');
		$user_id=$this->request->getData('user_id');
		if($user_id!=1){
			$count=$this->Tasks->find()->where(['status'=>1,'project_id'=>$project_id])->contain(['TaskMembers'=>function($q) use($user_id) 
			{
			    return $q->where(['TaskMembers.user_id'=>$user_id]);
			}])->count();
			//pr($count);exit;
		}
		else{
			$count=$this->Tasks->find()->where(['status'=>1,'project_id'=>$project_id])->contain(['TaskMembers'=>['Users']])->count();
		}
		if($count>0){
			if($user_id!=1){
				$Response = $this->paginate($this->Tasks->find()->where(['Tasks.status'=>1,'Tasks.project_id'=>$project_id])->contain(['Projects','TaskMembers'=>
				function ($q) use($user_id){
				    return $q->where(['TaskMembers.user_id'=>$user_id])->contain(['Users']);
				}]));
			}
			else{
				$Response = $this->paginate($this->Tasks->find()->where(['Tasks.status'=>1,'Tasks.project_id'=>$project_id])->contain(['Projects','TaskMembers'=>['Users']]));
			}
			$success=true;
			$error=''; 
		}
		else{
			$success=false;
			$error='No data found';
			$Response=array();
		}
        $this->set(compact('success','error','Response'));
        $this->set('_serialize', ['success','error','Response']);
    }
	
	
	public function TaskEdit()
    {
		$task_id=$this->request->getData('task_id'); 
		$user_ids=$this->request->getData('login_id'); 
		$type=$this->request->getData('type'); 
		if($type == 1){
			if($user_ids == 1){ 
				$count = $this->Tasks->find()->where(['id'=>$task_id])->contain(['TaskMembers'=>['Users']])->count();
			}else{
				$count = $this->Tasks->find()->contain(['TaskMembers'=>function($q) use($user_ids,$task_id){
				    return $q->where(['user_id'=>$user_ids,'id'=>$task_id])->contain(['Users']);
				}])->count();
			}
			
			if($count > 0){
				if($user_ids != 1){ 
					$response_object = $this->Tasks->get($task_id,[
				
					'contain'=>['TaskMembers'=>function ($q) use($user_ids){
					    return $q->where(['user_id'=>$user_ids])->contain(['Users']);
					},'Projects'],
					    'order'=> ['Tasks.deadline'=>'ASC']
					 ]);
				}else{
					$response_object = $this->Tasks->get($task_id,[
					 'contain'=>['TaskMembers'=>['Users']] ,
					    'order'=> ['Tasks.deadline'=>'ASC']
					 ]);
				}
				$success=true;
				$error=''; 	
			}else{
				$success=false;
				$error='No data found';
				$response_object=array();
			}
			
		}else if($type == 2){
			$Tasks = $this->Tasks->find()->where(['id'=>$task_id])->toArray();
			if(!empty($Tasks))
			{
				foreach($Tasks as $Task)
				{
					$TaskStatuses = $this->Tasks->TaskStatuses->newEntity();
					$TaskStatuses->user_id = $Task->user_id;
					$TaskStatuses->deadline = $Task->deadline; 
					$TaskStatuses->task_id = $Task->id; 
					//
					if ($this->Tasks->TaskStatuses->save($TaskStatuses))
					{
						$task = $this->Tasks->get($task_id, [
							'contain' => ['TaskMembers','Projects']
						]);
						
						$task = $this->Tasks->patchEntity($task, $this->request->getData());
						$deadline=$this->request->getData('deadline');
						$task->deadline=date('Y-m-d',strtotime($deadline));								
						 
						if ($this->Tasks->save($task)) { 
						    
						   if(!empty($this->request->getData('user_id'))){ 
						     $this->Tasks->TaskMembers->deleteAll(["task_id"=>$task_id]);
                                 foreach ($this->request->getData('user_id') as $user_id) 
                                {
                                     $query1 = $this->Tasks->TaskMembers->query();
    					                	$query1->insert(['task_id','user_id'])
    					             	->values([
    					                     	'task_id' => $task_id,
    					                      	'user_id' => $user_id
    					           	]);
    					           	$query1->execute();
                                    
                                     
                                } 
						}    
                            //exit;
							$success=true;
							$error='Task Updated Successfully'; 
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
		}
		
        $this->set(compact('success','error','response_object'));
        $this->set('_serialize', ['success','error','response_object']);
    }
}
