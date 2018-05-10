http://stxavier.co.in/task_tractor/api/users/login.json
Method : Post
Parameter :--
	email:dasumenaria@gmail.com
	password:123
--------------------------------------------------------------
http://stxavier.co.in/task_tractor/api/users/userList.json
Method: GET
--------------------------------------------------------------
http://stxavier.co.in/task_tractor/api/projects/ClientList.json
Method: GET
--------------------------------------------------------------
http://stxavier.co.in/task_tractor/api/projects/CreateProject.json
Method: Post
Paramerer:--
	master_client_id:1
	deadline:04-05-2018
	user_id:2 (Point of Contact)
	title:Family function
	login_id:2 (Admin Id )
	project_members[0][user_id]:2 (team Members)
	project_members[1][user_id]:2 (team Members)
--------------------------------------------------------------
http://stxavier.co.in/task_tractor/api/projects/projectList.json
Method: GET
--------------------------------------------------------------
http://stxavier.co.in/task_tractor/api/projects/projectListbyUser.json?user_id=2
Method: GET
--------------------------------------------------------------
http://stxavier.co.in/task_tractor/api/projects/projectDetails.json?project_id=1
Method: GET
--------------------------------------------------------------
http://stxavier.co.in/task_tractor/api/leaves/LeaveTypesList.json
Method: GET
--------------------------------------------------------------
http://stxavier.co.in/task_tractor/api/leaves/LeavesList.json?user_id=1
Method: GET
--------------------------------------------------------------
http://stxavier.co.in/task_tractor/api/leaves/LeaveRequest.json
Method: POST
Parameter :--
	date_from:03-05-2018
	date_to:04-05-2018
	duration:1
	leave_reason:Family function
	user_id:2
	leave_type_id:1
	half_day:yes/no
--------------------------------------------------------------
http://stxavier.co.in/task_tractor/api/tasks/CreateTask.json
Method: POST
Parameter :--
	project_id:3
	deadline:04-05-2018
	user_id:2 (assign to User)
	title:Create Database
	login_id:2 (Login user Id)
--------------------------------------------------------------
http://stxavier.co.in/task_tractor/api/client_visites/AddClientVisit.json
Method: POST
Parameter :--
	master_client_id:1
	visit_date:04-05-2018
	user_id:2
	reason:Create Database
	vehicle_type:own
--------------------------------------------------------------

http://stxavier.co.in/task_tractor/api/master_clients/AddClient.json
Method: POST
Parameter :--
client_name:St. Xavier School
location:PALI
address:Pali Rajasthan
master_client_pocs[0][contact_person_name]:Ramesh sir
master_client_pocs[0][email]:Ramesh@123.com
master_client_pocs[0][mobile]:9999999999
master_client_pocs[1][contact_person_name]:Piyush sir
master_client_pocs[1][email]:Piyush@123.com
master_client_pocs[1][mobile]:99999999999















http://stxavier.co.in/task_tractor/api/leaves/LeaveAction.json
Method : POST
Parameters: 
	leave_id:1
	leave_status:1( for Approve ), 2( for Rejected) 
	action_reason:rejected (if any remarks required blank submit also submitted)



http://stxavier.co.in/task_tractor/api/tasks/TaskAction.json
Method: POST
Parameters:-=-
task_id:1
status:1 




http://stxavier.co.in/task_tractor/api/projects/ProjectCompleted.json
Method: POST
Parameters:--
project_id:1
completed_status:1 