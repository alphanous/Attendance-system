<?php
class User {	
   
	private $userTable = 'sas_user';	
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function login(){
		if($this->email && $this->password) {
			$sqlQuery = "
				SELECT * FROM ".$this->userTable." 
				WHERE email = ? AND password = ?";			
			$stmt = $this->conn->prepare($sqlQuery);
			$password = md5($this->password);
			$stmt->bind_param("ss", $this->email, $password);	
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0){
				$user = $result->fetch_assoc();
				$_SESSION["userid"] = $user['id'];
				$_SESSION["role"] = $user['role'];
				$_SESSION["name"] = $user['first_name']." ".$user['last_name'];					
				return 1;		
			} else {
				return 0;		
			}			
		} else {
			return 0;
		}
	}
	
	public function loggedIn (){
		if(!empty($_SESSION["userid"])) {
			return 1;
		} else {
			return 0;
		}
	}
	
	public function isAdmin (){
		if(!empty($_SESSION["role"]) && $_SESSION["role"] == 'administrator') {
			return 1;
		} else {
			return 0;
		}
	}
	
	public function listUser(){			
		$sqlQuery = "
			SELECT id, first_name, last_name, gender, email, mobile, role, status
			FROM ".$this->userTable." ";
				
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id ASC ';
		}
		
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();	
		
		$stmtTotal = $this->conn->prepare($sqlQuery);
		$stmtTotal->execute();
		$allResult = $stmtTotal->get_result();
		$allRecords = $allResult->num_rows;
		
		$displayRecords = $result->num_rows;
		$records = array();	
	
		while ($user = $result->fetch_assoc()) { 				
			$rows = array();			
			$rows[] = $user['id'];
			$rows[] = ucfirst($user['first_name']." ".$user['last_name']);
			$rows[] = $user['email'];
			$rows[] = $user['gender'];
			$rows[] = $user['mobile'];
			$userRole = '';
			if($user['role'] == 'administrator')	{
				$userRole = '<span class="label label-danger">Admin</span>';
			} else if($user['role'] == 'teacher') {
				$userRole = '<span class="label label-warning">Teacher</span>';
			}	
			
			$userStatus = '';
			if($user['status'] == 'deleted')	{
				$userStatus = '<span class="label label-danger">Deleted</span>';
			} else if($user['status'] == 'pending') {
				$userStatus = '<span class="label label-warning">Pending</span>';
			} else if($user['status'] == 'active') {
				$userStatus = '<span class="label label-success">Active</span>';
			}
			
			$rows[] = $userRole;	
			$rows[] = $userStatus;				
			$rows[] = '<button type="button" name="update" id="'.$user["id"].'" class="btn btn-warning btn-xs update">Edit</button>';
			if($this->isAdmin()) { 
				$rows[] = '<button type="button" name="delete" id="'.$user["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
			} else {
				$rows[] = '';
			}
			$records[] = $rows;
		}
		
		$output = array(
			"draw"	=>	intval($_POST["draw"]),			
			"iTotalRecords"	=> 	$displayRecords,
			"iTotalDisplayRecords"	=>  $allRecords,
			"data"	=> 	$records
		);
		
		echo json_encode($output);
	}
	
	public function getUserDetails(){		
		if($this->id) {		
			$sqlQuery = "
				SELECT id, first_name, last_name, gender, email, mobile, role, status
				FROM ".$this->userTable." 
				WHERE id = ?";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->id);	
			$stmt->execute();
			$result = $stmt->get_result();			
			$row = $result->fetch_assoc();
			echo json_encode($row);
		}		
	}
	
	public function insert() {      
		if($this->email) {		              
			$this->newPassword = md5($this->newPassword);			
			$queryInsert = "
				INSERT INTO ".$this->userTable."(`first_name`, `last_name`, `email`, `password`, `gender`, `mobile`, `status`, `role`) 
				VALUES(?, ?, ?, ?, ?, ?, ?, ?)";				
			$stmt = $this->conn->prepare($queryInsert);			
			$stmt->bind_param("ssssssss", $this->firstName, $this->lastName, $this->email, $this->newPassword, $this->gender, $this->mobile, $this->status, $this->role);	
			$stmt->execute();				
		}
	}

	public function update() {      
		if($this->updateUserId && $this->email) {		              
			
			$changePassword = '';
			if($this->newPassword) {
				$this->newPassword = md5($this->newPassword);
				$changePassword = ", password = '".$this->newPassword."'";
			}
			
			$queryUpdate = "
				UPDATE ".$this->userTable." 
				SET first_name = ?, last_name = ?, gender = ?, mobile = ?, email = ?, role = ?, status = ? $changePassword
				WHERE id = '".$this->updateUserId."'";				
			$stmt = $this->conn->prepare($queryUpdate);
			$stmt->bind_param("sssssss", $this->firstName, $this->lastName, $this->gender, $this->mobile, $this->email, $this->role, $this->status);	
			$stmt->execute();			
		}
	}
	
	public function delete() {      
		if($this->deleteUserId) {		          
			$queryDelete = "
				DELETE FROM ".$this->userTable." 
				WHERE id = ?";				
			$stmt = $this->conn->prepare($queryDelete);
			$stmt->bind_param("i", $this->deleteUserId);	
			$stmt->execute();		
		}
	}
}
?>