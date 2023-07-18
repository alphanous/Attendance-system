<?php
class Student {	
   
	private $studentTable = 'sas_students';
	private $classTable = 'sas_classes';
	private $attendanceTable = 'sas_attendance';
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function listStudents(){
		
		$sqlQuery = "SELECT s.id, s.name, s.roll_no, c.name as class_name
		FROM ".$this->studentTable." as s 
		LEFT JOIN ".$this->classTable." as c ON s.class = c.id ";
		
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'WHERE (s.id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR s.name LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR s.roll_no LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR c.name LIKE "%'.$_POST["search"]["value"].'%") ';								
		}
		
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY s.id DESC ';
		}
		
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();	
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->studentTable);
		$stmtTotal->execute();
		$allResult = $stmtTotal->get_result();
		$allRecords = $allResult->num_rows;
		
		$displayRecords = $result->num_rows;
		$records = array();		
		while ($student = $result->fetch_assoc()) { 				
			$rows = array();			
			$rows[] = $student['id'];
			$rows[] = ucfirst($student['name']);
			$rows[] = $student['roll_no'];		
			$rows[] = $student['class_name'];				
			$rows[] = '<button type="button" name="view" id="'.$student["id"].'" class="btn btn-info btn-xs view"><span class="glyphicon glyphicon-file" title="View"></span></button>';
			$rows[] = '<button type="button" name="update" id="'.$student["id"].'" class="btn btn-warning btn-xs update">Edit</button>';
			if(!empty($_SESSION["role"]) && $_SESSION["role"] == 'administrator') {
				$rows[] = '<button type="button" name="delete" id="'.$student["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
			} else {
				$rows[] = 'Delete';
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
	
	
	public function getStudent(){
		if($this->id) {
			$sqlQuery = "SELECT s.id, s.name, s.email, s.mobile, s.father_name, s.father_mobile, s.mother_name, s.mother_mobile, s.current_address, s.roll_no, c.name as class_name
				FROM ".$this->studentTable." as s 
				LEFT JOIN ".$this->classTable." as c ON s.class = c.id
				WHERE s.id = ?";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$record = $result->fetch_assoc();
			echo json_encode($record);
		}
	}

	public function getClassStudents(){	
	
		if($this->classId) {
			$attendanceYear = date('Y'); 
			$attendanceMonth = date('m'); 
			$attendanceDay = date('d'); 
			$attendanceDate = $attendanceYear."/".$attendanceMonth."/".$attendanceDay;	
			
			$sqlQueryCheck = "SELECT * FROM ".$this->attendanceTable." 
				WHERE class_id = '".$this->classId."' AND attendance_date = '".$attendanceDate."'";	
				
			$stmtCheck = $this->conn->prepare($sqlQueryCheck);
			$stmtCheck->execute();
			$resultCheck = $stmtCheck->get_result();	
			$attendanceDone = $resultCheck->num_rows;
			
			$query = '';
			if($attendanceDone) {
				$query = " AND a.attendance_date = '".$attendanceDate."'";
			}
		
			$sqlQuery = "SELECT s.id, s.name, s.photo, s.gender, s.dob, s.mobile, s.email, s.current_address, s.father_name, s.mother_name,s.admission_no, s.roll_no, s.admission_date, s.academic_year, a.status, a.attendance_date
				FROM ".$this->studentTable." as s
				LEFT JOIN ".$this->attendanceTable." as a ON s.id = a.student_id
				WHERE s.class = '".$this->classId."' $query ";
				
			$sqlQuery .= "GROUP BY a.student_id ";	
			if(!empty($_POST["search"]["value"])){
				$sqlQuery .= ' AND (s.id LIKE "%'.$_POST["search"]["value"].'%" ';
				$sqlQuery .= ' OR s.name LIKE "%'.$_POST["search"]["value"].'%" ';
				$sqlQuery .= ' OR s.admission_no LIKE "%'.$_POST["search"]["value"].'%" ';	
				$sqlQuery .= ' OR s.roll_no LIKE "%'.$_POST["search"]["value"].'%" )';			
			}
			if(!empty($_POST["order"])){
				$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
			} else {
				$sqlQuery .= 'ORDER BY s.id DESC ';
			}
			if($_POST["length"] != -1){
				$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
			}
			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();
			$result = $stmt->get_result();	
						
			$stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->attendanceTable);
			$stmtTotal->execute();
			$allResult = $stmtTotal->get_result();
			$allRecords = $allResult->num_rows;
		
			$displayRecords = $result->num_rows;
			$studentData = array();	
			
			while ($student = $result->fetch_assoc()) { 					
				$checked = array();
				$checked[1] = '';
				$checked[2] = '';
				$checked[3] = '';
				$checked[4] = '';
				if($student['attendance_date'] == $attendanceDate) {
					if($student['status'] == 'present') {
						$checked[1] = 'checked';
					} else if($student['status'] == 'absent') {
						$checked[2] = 'checked';
					} else if($student['status'] == 'late') {
						$checked[3] = 'checked';
					} else if($student['status'] == 'half_day') {
						$checked[4] = 'checked';
					}	
				}				
				$studentRows = array();			
				$studentRows[] = $student['id'];				
				$studentRows[] = $student['roll_no'];
				$studentRows[] = $student['name'];	
				$studentRows[] = '
				<input type="radio" id="attendencetype1_'.$student['id'].'" value="present" name="attendencetype_'.$student['id'].'" autocomplete="off" '.$checked['1'].'>
				<label for="attendencetype_'.$student['id'].'">Present</label>
				<input type="radio" id="attendencetype2_'.$student['id'].'" value="absent" name="attendencetype_'.$student['id'].'" autocomplete="off" '.$checked['2'].'>
				<label for="attendencetype'.$student['id'].'">Absent</label>
				<input type="radio" id="attendencetype3_'.$student['id'].'" value="late" name="attendencetype_'.$student['id'].'" autocomplete="off" '.$checked['3'].'>
				<label for="attendencetype3_'.$student['id'].'"> Late </label>
				<input type="radio" id="attendencetype4_'.$student['id'].'" value="half_day" name="attendencetype_'.$student['id'].'" autocomplete="off" '.$checked['4'].'>
				<label for="attendencetype_'.$student['id'].'"> Half Day </label>';					
				$studentData[] = $studentRows;
			}			
			
			$output = array(
				"draw"	=>	intval($_POST["draw"]),			
				"iTotalRecords"	=> 	$displayRecords,
				"iTotalDisplayRecords"	=>  $allRecords,
				"data"	=> 	$studentData
			);
		
			echo json_encode($output);
			
		}
	}
	
	
	public function attendanceStatus(){	
		if($this->classId) {
			$attendanceYear = date('Y'); 
			$attendanceMonth = date('m'); 
			$attendanceDay = date('d'); 
			$attendanceDate = $attendanceYear."/".$attendanceMonth."/".$attendanceDay;		
			$sqlQuery = "SELECT * FROM ".$this->attendanceTable." 
				WHERE class_id = '".$this->classId."' AND attendance_date = '".$attendanceDate."'";			
			$stmtTotal = $this->conn->prepare($sqlQuery);
			$stmtTotal->execute();
			$allResult = $stmtTotal->get_result();
			$attendanceDone = $allResult->num_rows;			
			if($attendanceDone) {
				echo "Attendance already submitted!";
			} 
		}
	}
	
	public function updateAttendance(){	
		$attendanceYear = date('Y'); 
		$attendanceMonth = date('m'); 
		$attendanceDay = date('d'); 
		$attendanceDate = $attendanceYear."/".$attendanceMonth."/".$attendanceDay;	
		
		$sqlQuery = "SELECT * FROM ".$this->attendanceTable." 
			WHERE class_id = '".$_POST["att_classid"]."' AND attendance_date = '".$attendanceDate."'";			
		
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();
		$attendanceDone = $result->num_rows;		
		
		if($attendanceDone) {
			foreach($_POST as $key => $value) {				
				if (strpos($key, "attendencetype_") !== false) {
					$student_id = str_replace("attendencetype_","", $key);
					$attendanceStatus = $value;					
					if($student_id) {
						$updateQuery = "UPDATE ".$this->attendanceTable." SET status = '".$attendanceStatus."'
						WHERE student_id = '".$student_id."' AND class_id = '".$_POST["att_classid"]."' AND attendance_date = '".$attendanceDate."'";						
						
						$stmt = $this->conn->prepare($updateQuery);							
						$stmt->execute();
						
					}
				}				
			}	
			echo "Attendance updated successfully!";			
		} else {
			foreach($_POST as $key => $value) {				
				if (strpos($key, "attendencetype_") !== false) {
					$student_id = str_replace("attendencetype_","", $key);
					$attendanceStatus = $value;					
					if($student_id) {
						$insertQuery = "INSERT INTO ".$this->attendanceTable."(student_id, class_id, status, attendance_date) 
						VALUES ('".$student_id."', '".$_POST["att_classid"]."', '".$attendanceStatus."', '".$attendanceDate."')";
						
						$stmt = $this->conn->prepare($insertQuery);							
						$stmt->execute();
					}
				}
				
			}
			echo "Attendance save successfully!";
		}	
	}
	
	public function getStudentsAttendance(){		
		if($this->classId && $this->attendanceDate) {
			$sqlQuery = "SELECT s.id, s.name, s.photo, s.gender, s.dob, s.mobile, s.email, s.current_address, s.father_name, s.mother_name,s.admission_no, s.roll_no, s.admission_date, s.academic_year, a.status
				FROM ".$this->studentTable." as s
				LEFT JOIN ".$this->attendanceTable." as a ON s.id = a.student_id
				WHERE s.class = '".$this->classId."' AND a.attendance_date = '".$this->attendanceDate."'";
			if(!empty($_POST["search"]["value"])){
				$sqlQuery .= ' AND (s.id LIKE "%'.$_POST["search"]["value"].'%" ';
				$sqlQuery .= ' OR s.name LIKE "%'.$_POST["search"]["value"].'%" ';
				$sqlQuery .= ' OR s.admission_no LIKE "%'.$_POST["search"]["value"].'%" ';	
				$sqlQuery .= ' OR s.roll_no LIKE "%'.$_POST["search"]["value"].'%" ';	
				$sqlQuery .= ' OR a.attendance_date LIKE "%'.$_POST["search"]["value"].'%" )';
			}
			if(!empty($_POST["order"])){
				$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
			} else {
				$sqlQuery .= 'ORDER BY s.id DESC ';
			}
			if($_POST["length"] != -1){
				$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
			}	
			
			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();
			$result = $stmt->get_result();	
						
			$stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->attendanceTable);
			$stmtTotal->execute();
			$allResult = $stmtTotal->get_result();
			$allRecords = $allResult->num_rows;
		
			$displayRecords = $result->num_rows;		
			
			$studentData = array();				
			while ($student = $result->fetch_assoc()) {			
				$attendance = '';
				if($student['status'] == 'present') {
					$attendance = '<small class="label label-success">Present</small>';
				} else if($student['status'] == 'late') {
					$attendance = '<small class="label label-warning">Late</small>';
				} else if($student['status'] == 'absent') {
					$attendance = '<small class="label label-danger">Absent</small>';
				} else if($student['status'] == 'half_day') {
					$attendance = '<small class="label label-info">Half Day</small>';
				}				
				$studentRows = array();			
				$studentRows[] = $student['id'];				
				$studentRows[] = $student['roll_no'];
				$studentRows[] = $student['name'];		
				$studentRows[] = $attendance;					
				$studentData[] = $studentRows;
			}
			
			$output = array(
				"draw"	=>	intval($_POST["draw"]),			
				"iTotalRecords"	=> 	$displayRecords,
				"iTotalDisplayRecords"	=>  $allRecords,
				"data"	=> 	$studentData
			);
			echo json_encode($output);
			
		}
	}
	
	public function getStudentDetails(){		
		if($this->studentId) {		
			$sqlQuery = "
				SELECT *
				FROM ".$this->studentTable." 
				WHERE id = ?";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->studentId);	
			$stmt->execute();
			$result = $stmt->get_result();			
			$row = $result->fetch_assoc();
			echo json_encode($row);
		}		
	}
	
	public function insert() {      
		if($this->name) {		              
			$queryInsert = "
				INSERT INTO ".$this->studentTable."(`name`, `gender`, `dob`, `mobile`, `email`, `current_address`, `permanent_address`, `father_name`, `mother_name`, `academic_year`, `class`, `roll_no`) 
				VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";				
			$stmt = $this->conn->prepare($queryInsert);			
			$stmt->bind_param("sssssssssiii", $this->name, $this->gender, $this->dob, $this->mobile, $this->email, $this->currentAddress, $this->permanentAddress, $this->fatherName, $this->motherName, $this->acamedicYear, $this->classid, $this->rollNo);	
			$stmt->execute();				
		}
	}
	
	public function update() {      
		if($this->studentId && $this->name) { 				
			$queryUpdate = "
				UPDATE ".$this->studentTable." 
				SET name = ?, gender = ?, dob = ?, mobile = ?, email = ?, current_address = ?, permanent_address = ?, father_name = ?, mother_name = ?, academic_year = ?, class = ?, roll_no = ?
				WHERE id = ?";				
			$stmt = $this->conn->prepare($queryUpdate);
			$stmt->bind_param("sssssssssiiii", $this->name, $this->gender, $this->dob, $this->mobile, $this->email, $this->currentAddress, $this->permanentAddress, $this->fatherName, $this->motherName, $this->acamedicYear, $this->classid, $this->rollNo, $this->studentId);
			$stmt->execute();			
		}
	}
	
	public function delete() {      
		if($this->studentId) {		          
			$queryDelete = "
				DELETE FROM ".$this->studentTable." 
				WHERE id = ?";				
			$stmt = $this->conn->prepare($queryDelete);
			$stmt->bind_param("i", $this->studentId);	
			$stmt->execute();		
		}
	}
}
?>
