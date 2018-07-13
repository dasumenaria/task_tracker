<?php
namespace App\Controller\Api;
use App\Controller\Api;
use App\Controller\Api\AppController;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function userList()
    { 
        $response_object = $this->Users->find();
		$success=true;
		$error='';
		$this->set(compact('success','error','response_object'));
        $this->set('_serialize', ['success','error','response_object']);
    }
	
	public function login()
	{
		if ($this->request->is('post')) {
 			$email=$this->request->getData('email');
			$password=$this->request->getData('password');
			$hasher = new DefaultPasswordHasher();
			//pr($email); exit;
			$user=$this->Users->find()->where(['email'=>$email])->first();
  			if(!empty($user))
			{
				$user->password;
				$is_valid_password=$hasher->check($password,$user->password); 
 				if($is_valid_password){
					$success=true;
					$error='';
					unset($user->password);
				}else{
					$success=false;
					$error="Wrong password";
					$user=array();
				}
			}
			else
			{
				$success=false;
				$error="Wrong username and password";
				$user=array();
			}
			$response_object=$user;
			$this->set(compact('success', 'error', 'response_object'));
        	$this->set('_serialize', ['success', 'error', 'response_object']);
		}
	}
    
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $masterRoles = $this->Users->MasterRoles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'masterRoles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
