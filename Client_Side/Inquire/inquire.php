<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Layout/index.css">
    <link rel="stylesheet" href="../Nav-Bar/nav.css">
    <link rel="stylesheet" href="../Footer/footer.css">
    <link rel="stylesheet" href="inquire.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Inquire</title>
</head>
<body>
    <div class="main-container">
        <div class="nav-bar">
            <?php include "../Nav-Bar/nav.php" ?>
        </div>
        <div class="content">          
            <?php include "inquire-content.php" ?>
        </div>
        <div class="footer">
            <?php 
                include "../Footer/footer.php"
            ?>
        </div>
    </div>
</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</html>