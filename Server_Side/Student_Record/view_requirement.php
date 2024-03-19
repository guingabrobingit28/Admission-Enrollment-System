<?php 
include "../../Connection/connection.php";

class Show_Requirements extends DatabaseConnection{

    public function select_name($id){

        $select_requirements = "SELECT `requirement_name` FROM `tbl_requirements` WHERE student_id = $id ";
        $stmt = $this->conn->prepare($select_requirements);
        $stmt->execute(); 

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;

        $this->conn = null;
          
        }


      
    






}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $update_inquiries = new Show_Requirements();
    $result_data = $update_inquiries->select_name($id);
    
    echo json_encode(["data" => $result_data]);



    

    
}




?>