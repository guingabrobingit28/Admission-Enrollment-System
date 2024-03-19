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
    <link rel="stylesheet" href="admission.css">
    
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
                <?php include "rejected_content.php"; ?>
            </div>
        </div>
    </div>
</body>

    <script src="../sidebar/sidebar.js"></script>
</html>