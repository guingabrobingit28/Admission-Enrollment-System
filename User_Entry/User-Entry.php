<?php 
session_start();
include "../Connection/connection.php";

class Login extends DatabaseConnection{
    public function UserLogin($userInput,$passInput){

    $sql = "SELECT * FROM tbl_account WHERE username = :userInput AND password = :passInput";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':userInput', $userInput);
    $stmt->bindParam(':passInput', $passInput);
    $stmt->execute(); 
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['id'] = $user['id'];
    $_SESSION['user_type'] = $user['user_type'];

  
    if($user['status'] == 'Enable'){
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







?>