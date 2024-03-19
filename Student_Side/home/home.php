<?php 
session_start();

if(!isset($_SESSION['Student_name'])){
    header("Location: ../../Client_Side/Student_Entry/student_login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Layout/Layout.css">
    <title>BPC Student System</title>
    <link rel="stylesheet" href="../../Server_Side/sidebar/sidebar.css">
<body>
    <div class="main-container">
        <div class="sidebar">
            <?php require_once "../sidebar/sidebar.php" ?>
        </div>
        <div class="header-content">
            <div class="header">
                <p>BPC Student System</p>
            </div>
            <div class="content">
                <p>content</p>
            </div>
        </div>
    </div>
</body>
    <script src="../../Server_Side/sidebar/sidebar.js"></script>
</html>