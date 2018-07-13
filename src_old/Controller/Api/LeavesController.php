<?php
namespace App\Controller\Api;
use App\Controller\Api;
use App\Controller\Api\AppController;
/**
 * Leaves Controller
 * 
 * @property \App\Model\Table\LeavesTable $Leaves
 *
 * @method \App\Model\Entity\Leave[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LeavesController extends AppController
{

    public function LeaveTypesList()
    {
        $response_object = $this->Leaves->LeaveTypes->find()
			->where(['is_deleted'=>0]);
        $success=true;
		$error='';
		$this->set(compact('success','error','response_object'));
        $this->set('_serialize', ['success','error','response_object']);
    }
	
    public function LeavesList($user_id=null)
    {
        $user_id=$this->request->getQuery('user_id');  
        if($user_id==1){
            $count = $this->Leaves->find() 
			    ->count();
        }
        else
        {
            $count = $this->Leaves->find()
			    ->where(['Leaves.user_id'=>$user_id])
			    ->count();
        }
		if($count>0){
		    if($user_id==1){
               	$response_object = $this->Leaves->find()
    				->contain(['Users','LeaveTypes'])->order(['Leaves.id'=>'DESC']);
    		  $count_data = (object) array();		
            }
            else
            {
                 $year = date("Y");
                $month = date('m');
                
                if($month > 03)
                {
                  $start_date = date('Y-04-01');
                  $end_date = date(($year+1).'-03-31');
                }
                else
                {
                  $start_date = date(($year-1).'-04-01');
                  $end_date = date('Y-03-31');
                }  
                
                $response_object = $this->Leaves->find()
    				->contain(['Users','LeaveTypes'])
    				->where(['Leaves.user_id'=>$user_id,'Leaves.is_deleted'=>0,'Leaves.date_from >='=>$start_date,'Leaves.date_from <='=>$end_date])
    				->order(['Leaves.id'=>'DESC']);
    				$response_object=$response_object->toArray();
//pr(); exit;
    			$seakCount= 0.0;
    			$casualCount=0.0;
    			$shortCount=0.0;
    			$otherCount=0.0;
               
    			foreach($response_object as $leave){
                   
    			    if($leave->leave_type_id == 1 && $leave->leave_status == 1){
                        $datetime1 = new \DateTime($leave->date_from);
                        $datetime2 = new \DateTime($leave->date_to);
                        
                        $difference = $datetime2->diff($datetime1);
                        $c = $difference->days+1;
    			        if($leave->half_day == 'yes'){
    			             //$seakCount =  $seakCount+.5;
    			             $seakCount=$seakCount+$c*.5;
    			        }else{
    			            $seakCount=$seakCount+$c;
    			        }
    			    }
    			    if($leave->leave_type_id == 2 && $leave->leave_status == 1){
    			        $datetime1 = new \DateTime($leave->date_from);
                        $datetime2 = new \DateTime($leave->date_to);
                        
                        $difference = $datetime2->diff($datetime1);
                        $d = $difference->days+1;
    			         if($leave->half_day == 'yes'){
    			           //$casualCount = $casualCount+.5;
    			            $casualCount = $casualCount+$d*.5;
    			        }else{
    			            $casualCount = $casualCount+$d;
    			        }
    			    }
    			    if($leave->leave_type_id == 3 && $leave->leave_status == 1){
    			        $datetime1 = new \DateTime($leave->date_from);
                        $datetime2 = new \DateTime($leave->date_to);
                        
                        $difference = $datetime2->diff($datetime1);
                        $e = $difference->days+1;       
    			         if($leave->half_day == 'yes'){
    			           // $shortCount =  $shortCount+.5;
    			           $shortCount=$shortCount+$e*.5;
    			        }else{
    			            $shortCount=$shortCount+$e;
    			        }
    			    }
    			    if($leave->leave_type_id == 4 && $leave->leave_status == 1){
    			        $datetime1 = new \DateTime($leave->date_from);
                        $datetime2 = new \DateTime($leave->date_to);
                        
                        $difference = $datetime2->diff($datetime1);
                        $f = $difference->days+1;
    			         if($leave->half_day == 'yes'){
    			             //$otherCount =  $otherCount+.5;
    			              $otherCount=$otherCount+$f*.5;
    			        }else{
    			             $otherCount=$otherCount+$f;

    			        }
    			    }
    			   
    			}
    		
    			$array=[];$a=[];
    			$array=  ['seakCount'=>$seakCount,'casualLeaveCount'=>$casualCount,'shortLeaveCount'=>$shortCount,'otherLeaveCount'=>$otherCount];
    			$a= (object) $array;
    			//array_push($response_object,$a);
    			//pr($response_object); exit;
    		    //$a =['response_object'=>$response_object->toArray()];
    			//$data =  (array) array_merge((array)$response_object,$array);
    			//pr($data);exit;
    			//$data['response_object']=  $array;
    			//$response_object = (array)$response_object;
    			//$response_object['response_object'] = (object)$array;
    		    //$response_object= (object)$response_object;
               $count_data=$a;
    		    
            }
			 
			$success=true;
			$error='';
			
		}
		else{
			$success=false;
			$error='No data found';
			$response_object=array();
		}
		$this->set(compact('success','error','response_object', 'count_data'));
		$this->set('_serialize', ['success','error','response_object', 'count_data']);
    }
	
    public function LeaveRequest()
    {
        $leave = $this->Leaves->newEntity();
        if ($this->request->is('post')) {
			$date_from=$this->request->getData('date_from');
			$date_to=$this->request->getData('date_to');
			$leave = $this->Leaves->patchEntity($leave, $this->request->getData());
			$leave->date_from=date('Y-m-d',strtotime($date_from));
			$leave->date_to=date('Y-m-d',strtotime($date_to));
 			//pr($leave);exit;
            if ($this->Leaves->save($leave)) {
				$success=true;
				$error='Leave submit successfully';		
            }
			else{
				$success=false;
				$error='Something Went Wrong.';
			}
        }
        $this->set(compact('success','error'));
        $this->set('_serialize', ['success','error']);
    }

    public function LeaveAction()
    {
		$leave_id=$this->request->getData('leave_id'); 
		$leave_status=$this->request->getData('leave_status'); 
        $leave = $this->Leaves->get($leave_id, [
            'contain' => []
        ]);

		$leave = $this->Leaves->patchEntity($leave, $this->request->getData());
		if ($this->Leaves->save($leave)) {
			$success=true;
			if($leave_status==1){
				$error='Leave approve successfully';	
			}
			if($leave_status==2){
				$error='Leave reject successfully';	
			}	
		}
		else{
			$success=false;
			$error='Something Went Wrong.';
		}
        $this->set(compact('success','error'));
        $this->set('_serialize', ['success','error']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Leave id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leave = $this->Leaves->get($id);
        if ($this->Leaves->delete($leave)) {
            $this->Flash->success(__('The leave has been deleted.'));
        } else {
            $this->Flash->error(__('The leave could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
