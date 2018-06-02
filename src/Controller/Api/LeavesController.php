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
    				->contain(['Users','LeaveTypes']);
            }
            else
            {
                $response_object = $this->Leaves->find()
    				->contain(['Users','LeaveTypes'])
    				->where(['Leaves.user_id'=>$user_id]);
            }
			 
			$success=true;
			$error='';
		}
		else{
			$success=false;
			$error='No data found';
			$response_object=array();
		}
		$this->set(compact('success','error','response_object'));
		$this->set('_serialize', ['success','error','response_object']);
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
