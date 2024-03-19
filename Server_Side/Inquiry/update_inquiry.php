<?php 
include "../../Connection/connection.php";

class Show_Inquiries extends DatabaseConnection{

    public function update_Inquiries($id){

        $update_inquire = "UPDATE `tbl_inquiry` SET `inquiry_status`='Read' WHERE id_inquiry = $id ";
        $stmt = $this->conn->prepare($update_inquire);
        $stmt->execute(); 
        $this->conn = null;
          
        }
}

   if(isset($_GET['idd'])){
    $id = $_GET['idd'];
    $update_inquiries = new Show_Inquiries();
    $result_update = $update_inquiries->update_Inquiries($id);
}

