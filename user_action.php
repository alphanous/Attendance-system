<?php
include_once 'config/Database.php';
include_once 'class/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listUser') {
	$user->listUser();
}

if(!empty($_POST['action']) && $_POST['action'] == 'getUserDetails') {
	$user->id = $_POST["userId"];
	$user->getUserDetails();
}

if(!empty($_POST['action']) && $_POST['action'] == 'addUser') {
	$user->firstName = $_POST["firstName"];
	$user->lastName = $_POST["lastName"];
	$user->email = $_POST["email"];
	$user->mobile = $_POST["mobile"];
	$user->role = $_POST["role"];
	$user->status = $_POST["status"];
	$user->newPassword = $_POST["newPassword"];       
	$user->insert();
}

if(!empty($_POST['action']) && $_POST['action'] == 'updateUser') {
	$user->updateUserId = $_POST["userId"]; 
	$user->firstName = $_POST["firstName"];
	$user->lastName = $_POST["lastName"];
	$user->email = $_POST["email"];
	$user->mobile = $_POST["mobile"];
	$user->role = $_POST["role"];
	$user->status = $_POST["status"];
	$user->newPassword = $_POST["newPassword"]; 
	$user->update();
}

if(!empty($_POST['action']) && $_POST['action'] == 'deleteUser') {
	$user->deleteUserId = $_POST["userId"];
	$user->delete();
}

?>