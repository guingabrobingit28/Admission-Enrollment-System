<?php 

include "../../Connection/connection.php";

class Count extends DatabaseConnection{

    public function Show_Course(){

        $show_course = "SELECT * FROM `tbl_course`";
        $stmt = $this->conn->prepare($show_course);
        $stmt->execute(); 
        $data = $stmt->rowCount();
        
        
        return $data;
        $this->conn = null;
          
    }


    
    public function Count_Inquiries(){

        $show_inquiry = "SELECT * FROM `tbl_inquiry` WHERE inquiry_status = 'Pending'";
        $stmt = $this->conn->prepare($show_inquiry);
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

    public function Count_admission(){

        $show_admission = "SELECT * FROM `tbl_admission` WHERE status = 'Pending'";
        $stmt = $this->conn->prepare($show_admission);
        $stmt->execute(); 
        $data = $stmt->rowCount();
        
        
        return $data;
        $this->conn = null;
          
    }

    
    



}





?>



