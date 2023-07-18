<?php
include_once 'config/Database.php';
include_once 'class/Student.php';

$database = new Database();
$db = $database->getConnection();

$student = new Student($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listStudents') {
	$student->listStudents();
}

if(!empty($_POST['action']) && $_POST['action'] == 'getStudent') {
	$student->id = $_POST["id"];
	$student->getStudent();
}

if(!empty($_POST['action']) && $_POST['action'] == 'getStudentDetails') {
	$student->studentId = $_POST["studentId"];
	$student->getStudentDetails();
}

if(!empty($_POST['action']) && $_POST['action'] == 'addStudent') {
	$student->name = $_POST["name"];
	$student->email = $_POST["email"];
	$student->mobile = $_POST["mobile"];
	$student->dob = $_POST["dob"];
	$student->gender = $_POST["gender"];
	$student->currentAddress = $_POST["currentAddress"];
	$student->permanentAddress = $_POST["permanentAddress"];   
    $student->fatherName = $_POST["fatherName"];   
    $student->motherName = $_POST["motherName"];
	$student->acamedicYear = $_POST["acamedicYear"];
	$student->classid = $_POST["classid"];
	$student->rollNo = $_POST["rollNo"];	
	$student->insert();
}

if(!empty($_POST['action']) && $_POST['action'] == 'updateStudent') {
	$student->studentId = $_POST["studentId"];
	$student->name = $_POST["name"];
	$student->email = $_POST["email"];
	$student->mobile = $_POST["mobile"];
	$student->dob = $_POST["dob"];
	$student->gender = $_POST["gender"];
	$student->currentAddress = $_POST["currentAddress"];
	$student->permanentAddress = $_POST["permanentAddress"];   
    $student->fatherName = $_POST["fatherName"];   
    $student->motherName = $_POST["motherName"];
	$student->acamedicYear = $_POST["acamedicYear"];
	$student->classid = $_POST["classid"];
	$student->rollNo = $_POST["rollNo"];	
	$student->update();
}

if(!empty($_POST['action']) && $_POST['action'] == 'deleteStudent') {
	$student->studentId = $_POST["studentId"];
	$student->delete();
}

?>