<?php 
session_start();
if(isset($_GET['id'])){
    unset($_SESSION['Student_name']);
    unset($_SESSION['account_id']);
    header("Location: student_login.php");
}
?>