<?php 
session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../../User_Entry/login.php");
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Layout/Layout.css">
    <title>Enrollment Management System</title>
    <link rel="stylesheet" href="../sidebar/sidebar.css">
    <link rel="stylesheet" href="account.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<body>
    <div class="main-container">
        <div class="sidebar">
            <?php require_once "../sidebar/sidebar.php" ?>
        </div>
        <div class="header-content">
            <div class="header">
                <p>Enrollment Management System</p>
            </div>
            <div class="content">
                <?php include "account-content.php"; ?>
            </div>
        </div>
    </div>
    
</body>
    <script src="../sidebar/sidebar.js"></script>
   
</html>