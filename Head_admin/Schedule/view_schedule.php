<?php 
include "../../Connection/connection.php";

class Show_Schedule extends DatabaseConnection{

    public function select_name($id){

        $select_requirements = "SELECT * FROM (SELECT * FROM tbl_schedule WHERE schedule_id = $id ) tbl_schedule JOIN 
        (SELECT * FROM tbl_schedule_day WHERE schedule_id = $id ) tbl_schedule_day on tbl_schedule.schedule_id = tbl_schedule_day.schedule_id";
        $stmt = $this->conn->prepare($select_requirements);
        $stmt->execute(); 

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;

        $this->conn = null;
          
        }


      
    






}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $update_inquiries = new Show_Schedule();
    $result_data = $update_inquiries->select_name($id);
    
    echo json_encode(["data" => $result_data]);



    
}




?>