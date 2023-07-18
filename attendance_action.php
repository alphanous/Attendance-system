<?php
include_once 'config/Database.php';
include_once 'class/Student.php';

$database = new Database();
$db = $database->getConnection();

$student = new Student($db);

if(!empty($_POST['action']) && $_POST['action'] == 'getStudents') {
	$student->classId = $_POST["classid"];
	$student->getClassStudents();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateAttendance') {
	$student->updateAttendance();
}
if(!empty($_POST['action']) && $_POST['action'] == 'attendanceStatus') {
	$student->classId = $_POST["classid"];
	$student->attendanceStatus();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getStudentsAttendance') {
	$student->classId = $_POST["classid"];
	$student->attendanceDate = $_POST["attendanceDate"];
	$student->getStudentsAttendance();
}
?>