<?php
class Teacher {	   
	
	private $classTable = 'sas_classes';
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function classList(){
		$whereSql = '';
		if($this->teacher_id) {
			$whereSql = " WHERE teacher_id = '".$this->teacher_id."'";
		}
		$sqlQuery = "SELECT * FROM ".$this->classTable." $whereSql";	
		$stmt = $this->conn->prepare($sqlQuery);		
		$stmt->execute();
		$result = $stmt->get_result();	
		$classHTML = '';
		while ($class = $result->fetch_assoc()) { 
			$classHTML .= '<option value="'.$class["id"].'">'.$class["name"].'</option>';	
		}
		return $classHTML;		
	}	
}
?>