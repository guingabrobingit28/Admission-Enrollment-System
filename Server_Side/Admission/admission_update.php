<?php 
include "../../Connection/connection.php";

class update extends DatabaseConnection{
    public function status_accept($id){

    $admissiom_update = "UPDATE `tbl_admission` SET `status`='Accepted' WHERE admission_id = :id";
    $stmt = $this->conn->prepare($admissiom_update);
    $stmt->bindParam(':id', $id);
    $stmt->execute(); 
    $this->conn = null;
    header("Location: admission.php");
    }

    public function status_reject($id){

        $admissiom_update = "UPDATE `tbl_admission` SET `status`='Rejected' WHERE admission_id = :id";
        $stmt = $this->conn->prepare($admissiom_update);
        $stmt->bindParam(':id', $id);
        $stmt->execute();     
        $this->conn = null;
        header("Location: admission.php");      
        }

    public function update_reject($id){

            $admissiom_update = "UPDATE `tbl_admission` SET `status`='Rejected' WHERE admission_id = :id";
            $stmt = $this->conn->prepare($admissiom_update);
            $stmt->bindParam(':id', $id);
            $stmt->execute();     
            $this->conn = null;
            header("Location: accepted.php");      
    }

    public function update_accept($id){

        $admissiom_update = "UPDATE `tbl_admission` SET `status`='Accepted' WHERE admission_id = :id";
        $stmt = $this->conn->prepare($admissiom_update);
        $stmt->bindParam(':id', $id);
        $stmt->execute();     
        $this->conn = null;
        header("Location: rejected.php");      
}
}

if(isset($_GET['accept'])){
    $id_accept = $_GET['accept'];
    $update = new update();
    $result_accept = $update->status_accept($id_accept);
}else if(isset($_GET['reject'])){
    $id_reject = $_GET['reject'];
    $update = new update();
    $result_reject = $update->status_reject($id_reject);
}
else if(isset($_GET['update_reject'])){
    $id_reject = $_GET['update_reject'];
    $update = new update();
    $result_reject = $update->update_reject($id_reject);
}
else if(isset($_GET['update_accept'])){
    $id_accept = $_GET['update_accept'];
    $update = new update();
    $result_reject = $update->update_accept($id_accept);
}

?>
