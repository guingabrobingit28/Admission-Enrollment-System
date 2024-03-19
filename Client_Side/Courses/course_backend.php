<?php 
include "../../Connection/connection.php";

class Course extends DatabaseConnection{

    public function Show_Course(){

        $show_course = "SELECT * FROM `tbl_course`";
        $stmt = $this->conn->prepare($show_course);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
        $this->conn = null;
          
    }
    

 


    
}








?>