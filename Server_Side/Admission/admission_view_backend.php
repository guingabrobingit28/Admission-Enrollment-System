<?php 
include "../../Connection/connection.php";

class Show_Student extends DatabaseConnection{
    
    public function Show_Student_details($id,$id_admission){

        $admissiom_list = "SELECT * FROM `tbl_student_info` WHERE student_id = :id ";
        $stmt = $this->conn->prepare($admissiom_list);
        $stmt->bindParam(':id', $id);
        $stmt->execute(); 
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        
        $admissiom_update = "UPDATE `tbl_admission` SET `status`='Read' WHERE admission_id = :id_admission";
        $stmt1 = $this->conn->prepare($admissiom_update);
        $stmt1->bindParam(':id_admission', $id_admission);
        $stmt1->execute(); 

        return $data;
        $this->conn = null;
          

    
        
            }

    
}




?>