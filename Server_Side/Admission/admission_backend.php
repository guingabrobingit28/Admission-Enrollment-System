<?php 
include "../../Connection/connection.php";

class Show_admission extends DatabaseConnection{
    public function Show_Pending_admission(){

    $admissiom_list = "SELECT * FROM (SELECT * FROM tbl_admission order by date ASC ) tbl_admission 
    JOIN (SELECT * FROM tbl_student_info WHERE Student_Type = 'NE') tbl_student_info on tbl_admission.id = tbl_student_info.student_id GROUP BY tbl_admission.id";
    $stmt = $this->conn->prepare($admissiom_list);
    $stmt->execute(); 
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


    
    return $data;
    $this->conn = null;
      
    }

    public function Search_Pending_admission($search_name){

        $admissiom_list = "SELECT * FROM (SELECT * FROM tbl_admission ) tbl_admission 
        JOIN (SELECT * FROM tbl_student_info WHERE firstName LIKE '$search_name%' AND Student_Type = 'NE' or lastName LIKE '$search_name%' AND Student_Type = 'NE' ) tbl_student_info on tbl_admission.id = tbl_student_info.student_id GROUP BY tbl_admission.id";

        $stmt = $this->conn->prepare($admissiom_list);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;

    
        $this->conn = null;
          
    }


    


    
}




?>