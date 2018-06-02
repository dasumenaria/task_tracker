<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
	public function index()
    {
		$this->paginate = [
             'contain' => ['ProjectMembers'=>['Projects']]
        ];
        $users = $this->paginate($this->Users->find()->where(['Users.is_deleted'=>0]));
        $this->set(compact('users'));
    } 
 	public function dashboard()
	{
		$loginId=$this->Auth->User('id');
	}
 	public function changePassword()
    {
 		$loginId=$this->Auth->User('id');
		if ($this->request->is('post')) {
			$Users = $this->Users->find()->where(['id' => $loginId])->first();
 			$verify = (new \Cake\Auth\DefaultPasswordHasher)->check($this->request->data['old_password'], $Users->password);
			if($verify) {
				$result = $this->Users->patchEntity($Users, ['password' => $this->request->data['password']]);
 				if ($this->Users->save($result)) {
					$this->Flash->success(__('Your password has been changed successfully.'));
					return $this->redirect(['action' => 'changePassword']);
 				}
			} else {
 				$this->Flash->error(__('Current Password does not matched.'));
				return $this->redirect(['action' => 'changePassword']);
			}
		}		
    }
 	public function profileedit()
    {
		
		$loginId=$this->Auth->User('id');
		$Users = $this->Users->find()->where(['id' => $loginId])->first();
		$this->set('user',$Users); 
		if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($Users, $this->request->getData());
			$user->date_of_birth=date('Y-m-d',strtotime($this->request->getData('date_of_birth')));
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'profileedit']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }	
    }
    
	public function login()
    {
       $this->viewBuilder()->setLayout(''); 
	   if ($this->request->is('post')) {			
			$user = $this->Auth->identify();			
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect(['action' => 'dashboard']);
			}		
			$this->Flash->error('Either Password or username is not correct!');
		}
	}
	 
	public function logout()
	{
		$this->Flash->success('You are now logged out.');
		return $this->redirect($this->Auth->logout());
	}

    public function view($id = null)
    {
        $admin = $this->Users->get($id, [
            //'contain' => ['AdminRole']
        ]);
        $this->set('admin', $admin);
        $this->set('_serialize', ['admin']);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
			$user->date_of_birth=date('Y-m-d',strtotime($this->request->getData('date_of_birth')));
              if ($insert=$this->Users->save($user)) {
                 $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else { 
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user','Users'));
        $this->set('_serialize', ['user','Users']);
    }
	
	public function UserRights()
	{
		$user_id=$this->Auth->User('id');
		$role_id=$this->Auth->User('role_id');
 		$conditions=array("user_id" => $user_id);
		$fetch_user_right1='';
		$fetch_user_right2='';
		
		$fetch_user_rights = $this->Users->UserRights->find()->where($conditions)->toArray();
		
		foreach($fetch_user_rights as $data){
			$fetch_user_right1 = $data->module_id;
		}
		$conditions=array("role_id" => $role_id);
				
		$fetch_user_roles = $this->Users->UserRights->find()->where($conditions)->toArray();
		
		foreach($fetch_user_roles as $data2){
			$fetch_user_right2 = $data2->module_id;
		}
		$fetch_user_right1_array = explode(',',$fetch_user_right1);
		$fetch_user_right2_array = explode(',',$fetch_user_right2);
		$fetch_user_right_array = array_merge($fetch_user_right1_array,$fetch_user_right2_array);
		$fetch_user_right_array = array_unique($fetch_user_right_array);
		$fetch_user_right = implode(',',$fetch_user_right_array);
		$this->response->body($fetch_user_right);
		return $this->response;
	}
	public function menu()
	{
		$user_id=$this->Auth->User('id');
		$fetch_menu = $this->Users->Modules->find()->order(['preferance'=>'ASC'])->toArray();
		$this->response->body($fetch_menu);
		return $this->response;
	}
	
	public function MenuSubmenu($main_menu)
	{
		$user_id=$this->Auth->User('id');
		$conditions=array("main_menu" => $main_menu);
		
		$fetch_menu_submenu = $this->Users->Modules->find()->where($conditions)->toArray();
		
		$this->response->body($fetch_menu_submenu);
		return $this->response;
	}
	public function submenu($sub_menu)
	{ 
		$user_id=$this->Auth->User('id');
		$conditions=array("sub_menu" => $sub_menu);
		$fetch_submenu = $this->Users->Modules->find()->where($conditions)->toArray();
		
		$this->response->body($fetch_submenu);
		return $this->response;
	}
	

    /**
     * Edit method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
			$user->date_of_birth=date('Y-m-d',strtotime($this->request->getData('date_of_birth')));
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
 
    public function delete($id = null)
    {
       $admin = $this->Users->get($id, [
            'contain' => []
        ]);
		$admin = $this->Users->patchEntity($admin, $this->request->getData());
		$admin->is_deleted=1;
		if ($this->Users->save($admin)) {
            $this->Flash->success(__('The User has been deleted.'));
        } else {
            $this->Flash->error(__('The User could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function broadcast()
    {
		
		$admin = $this->Users->UserChats->newEntity();
		if ($this->request->is('post')) {
			
			$broadcast_msg=$this->request->data['broadcast_msg'];
			$Users=$this->Users->find()->where(['device_id !='=>'0'])->toArray();
 			foreach($Users as $user){
				$admin = $this->Users->UserChats->newEntity();
 				$admin->request_id = '0';
				$admin->user_id = 1;
				$admin->send_to_user_id = $user["id"];
				$admin['type'] = 'Announcement';
				$admin->message = $broadcast_msg;
				$admin->created = date("Y-m-d h:i:s");
				$admin->notification = 1;

				if ($this->Users->UserChats->save($admin)) {
					$id = $admin->id;
					$message_data='';
					$this->Users->UserChats->updateAll(['type' => 'Announcement'], ['id' => $id]);
					$this->sendpushnotification($user["id"],$admin->message,$message_data);
				}
			}
			return $this->redirect(['action' => 'broadcast']);
		}
		
		$this->set(compact('admin'));
        $this->set('_serialize', ['admin']);
	}
	
	public function sendpushnotification($userid,$message,$message_data)
	{
		$Users=$this->Users->find()->where(['id'=>$userid])->toArray();
		 
		$deviceid=$Users[0]['device_id'];
 		if(!empty($deviceid)){

		/* $sql1 = "Select count(*) as countchat FROM user_chats as c 
		INNER JOIN users as u on u.id=c.user_id
		where c.is_read='0' AND c.send_to_user_id='".$userid."'
		order by c.created DESC ";
		$stmt1 = $conn->execute($sql1);
		$countchat = $stmt1 ->fetch('assoc');
		 */
		$API_ACCESS_KEY='AIzaSyBMQtE5umATnqJkV4edMYQ_fR8263Zm21E';

		$registrationIds =  $deviceid;
		$msg = array
		(
		'body' 	=> $message,
		'title'	=> 'Travelb2bhub Notification',
		'icon'	=> 'myicon',/*Default Icon*/
		'sound' => 'mySound',/*Default sound*/
		'unread_count' => 0,
		'message' => $message,
		'type'=>"Announcement"
		);
		$data = array
		(

		"unread_count" => 0
		);
		$fields = array('to'=> $registrationIds,
		'notification'=> $msg,
		'data' => $msg
		);
		$headers = array(
		'Authorization: key='.$API_ACCESS_KEY,
		'Content-Type: application/json'
		);

		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		//print_r($result); die();
		return $result;
		}
	}	
	
}
