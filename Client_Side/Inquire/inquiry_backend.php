<?php 

include "../../Connection/connection.php";

class Inquiry extends DatabaseConnection{
    public function data_inquire($uName,$email,$contact,$message,$inquiry_status){


    
    $stmt = $this->conn->prepare("INSERT INTO `tbl_inquiry`(`name`, `email`, `messages`, `contact`, `inquiry_status`) VALUES (:uName,:email,:message,:contact,:inquiry_status)");
    $stmt->bindParam(':uName', $uName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':contact', $contact);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':inquiry_status', $inquiry_status);
    $inserted = $stmt->execute();

    if ($inserted) {
        return 200;
    } else {
        return 400;
    }

$this->conn = null;
      
    }
}

?>