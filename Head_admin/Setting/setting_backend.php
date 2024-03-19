<?php 
include "../../Connection/connection.php";

class Password extends DatabaseConnection{
    
    public function Show_password($id){

        $password = "SELECT * FROM `tbl_account` WHERE id = :id ";
        $stmt = $this->conn->prepare($password);
        $stmt->bindParam(':id', $id);
        $stmt->execute(); 
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data;
        $this->conn = null;
          

        }

    public function Update_password($id,$np,$rnp){

            if($np != $rnp){
                return 401;
            }else{

            $password = "UPDATE `tbl_account` SET `password`= :np WHERE id = :id";
            $stmt = $this->conn->prepare($password);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':np', $np);
            $stmt->execute(); 
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return 200;
            $this->conn = null;
            }
        }

    
}




?>