<?php 
session_start();
if(isset($_GET['id'])){
    unset($_SESSION['user_type']);
    unset($_SESSION['id']);
    header("Location: Login.php");
}
?>