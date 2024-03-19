<?php 
session_start();

if(!isset($_SESSION['account_id'])){
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
    <link rel="stylesheet" href="../../Server_Side/sidebar/sidebar.css">
    <link rel="stylesheet" href="setting.css">
    <title>Public Notice</title>
<body>
    <div class="main-container">
        <div class="sidebar">
            <?php include "../sidebar/sidebar.php"; ?>
        </div>
        <div class="header-content">
            <div class="header">
                <p>Enrollment Management System</p>
            </div>
            <div class="content">
                <?php include "setting-content.php"; ?>
            </div>
        </div>
    </div>
    
</body>
    <script src="../sidebar/sidebar.js"></script>
   
</html>