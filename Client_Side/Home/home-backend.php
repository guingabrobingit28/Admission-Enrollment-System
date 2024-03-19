<?php 

include "../../Connection/connection.php";

class Count extends DatabaseConnection{

    public function Count_Course(){

        $show_course = "SELECT * FROM `tbl_course`";
        $stmt = $this->conn->prepare($show_course);
        $stmt->execute(); 
        $data = $stmt->rowCount();
        
        
        return $data;
        $this->conn = null;
          
    }

    public function Count_Student(){

        $show_Student = "SELECT * FROM `tbl_student_info` WHERE Student_Type = 'E'";
        $stmt = $this->conn->prepare($show_Student);
        $stmt->execute(); 
        $data = $stmt->rowCount();
        
        
        return $data;
        $this->conn = null;
          
    }
    

 


}



?>



