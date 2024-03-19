<?php 
include "../../Connection/connection.php";

class Public_Content extends DatabaseConnection{
    public function Insert_Content($title,$message,$fileDestination){

        $insert_post = "INSERT INTO `tbl_public`(`public_img`,`public_content`, `title`) VALUES (:fileDestination,:message,:title)";
        $stmt = $this->conn->prepare($insert_post);
        $stmt->bindParam(':fileDestination', $fileDestination);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':title', $title);
        
        $stmt->execute();
        return 200;
        $this->conn = null;
          
    }

    public function Show_Public(){

        $show_post = "SELECT * FROM `tbl_public`  ORDER BY posted_date ASC";
        $stmt = $this->conn->prepare($show_post);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
        $this->conn = null;
          
        }

    



    
}






?>