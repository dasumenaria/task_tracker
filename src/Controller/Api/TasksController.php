<?php
namespace App\Controller\Api;

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
	
    public function CreateTask()
    {	 
		$project_id=$this->request->getData('project_id');
		$title=$this->request->getData('title');
		$login_id=$this->request->getData('login_id');
		$user_ids=$this->request->getData('user_id');
		$deadline=$this->request->getData('deadline');
		
        if ($this->request->is('post')) {
            foreach($user_ids as $userid){
				$query = $this->Tasks->query();
						$query->insert(['project_id', 'title', 'user_id', 'deadline','created_user_id'])
						->values([
						'project_id' => $project_id,
						'title' => $title,
						'user_id' => $userid,
						'deadline' => date('Y-m-d',strtotime($deadline)),
						'created_user_id'=>$login_id,
						]);
						
				if($query->execute()){
					if($login_id == 1){
						$message = "Task Created By Admin";
					}else{
						$user_name = $this->Tasks->Users->get($login_id);
						$userNames =  $user_name->name;
						$message = "Task Created By".$userNames;
					}
					
					$this->chatsOfUsers($login_id,$userid,$project_id,$message);
					$success=true;
					$error='Task Created Successfully';
				}else{
					$success=false;
					$error='Something Went Wrong'; 
				}
			}
        } 
        $this->set(compact('success','error'));
        $this->set('_serialize', ['success','error']);
    }
	 
    public function TaskAction()
    {
		$task_id=$this->request->getData('task_id'); 
        $task = $this->Tasks->get($task_id, [
            'contain' => []
        ]);
		$task = $this->Tasks->patchEntity($task, $this->request->getData());
		$task->completed_on=date('Y-m-d');
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
        $this->paginate = [
            'contain' => ['Users', 'Projects']
        ];
		$project_id=$this->request->getData('project_id');
		$user_id=$this->request->getData('user_id');
		if($user_id!=1){
			$count=$this->Tasks->find()->where(['status'=>1,'project_id'=>$project_id,'user_id'=>$user_id])->count();
		}
		else{
			$count=$this->Tasks->find()->where(['status'=>1,'project_id'=>$project_id])->count();
		}
		if($count>0){
			if($user_id!=1){
				$Response = $this->paginate($this->Tasks->find()->where(['Tasks.status'=>1,'Tasks.project_id'=>$project_id,'Tasks.user_id'=>$user_id]));
			}
			else{
				$Response = $this->paginate($this->Tasks->find()->where(['Tasks.status'=>1,'Tasks.project_id'=>$project_id]));
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
						'contain' => []
					]);
					
					$task = $this->Tasks->patchEntity($task, $this->request->getData());
					$deadline=$this->request->getData('deadline');
					$task->deadline=date('Y-m-d',strtotime($deadline));								
					 
					if ($this->Tasks->save($task)) {
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
        $this->set(compact('success','error'));
        $this->set('_serialize', ['success','error']);
    }

}
