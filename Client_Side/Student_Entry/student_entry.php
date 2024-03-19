<?php 
session_start();
include "../../Connection/connection.php";
error_reporting(0);

class Login extends DatabaseConnection{
    public function UserLogin($userInput,$passInput){

    $sql = "SELECT * FROM tbl_account WHERE username = :userInput AND password = :passInput AND user_type <> 'Admin'";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':userInput', $userInput);
    $stmt->bindParam(':passInput', $passInput);
    $stmt->execute(); 
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
   
    if($user['status'] == 'Enable'){
        $_SESSION['Student_name'] = $user['username'];
        $_SESSION['account_id'] = $user['id'];
        return 200;
    }
    else if($user['status'] == 'Disable'){
        return 400;
    }else{
        return 404;
    }

    $this->conn = null;
      
    }
}

class Register extends DatabaseConnection{
    public function UserRegister($userInput,$passInput,$repassword,$userType,$status,$admission_status){

    if($passInput == $repassword){
    
    
    $stmt = $this->conn->prepare("INSERT INTO tbl_account (username,password,user_type,status,admission_status) VALUES (:userInput, :passInput, :userType, :status,:admission_status)");
    $stmt->bindParam(':userInput', $userInput);
    $stmt->bindParam(':passInput', $passInput);
    $stmt->bindParam(':userType', $userType);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':admission_status', $admission_status);
    $inserted = $stmt->execute();

    if ($inserted) {
        return 200;
    } else {
        return 400;
    }

    }else{
        return 404;
    }


$this->conn = null;
      
    }
}






?>