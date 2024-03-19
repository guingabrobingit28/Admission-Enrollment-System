<?PHP 
include "User-Entry.php";

$userData = new Login();

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $userInput = $_POST["username"];
    $passInput = $_POST["password"];
    
    $result = $userData->UserLogin($userInput,$passInput);
    echo $user_type = $_SESSION['user_type'];
    echo $id = $_SESSION['id'];


    if($result == 200){
        if($_SESSION['user_type'] == "Head_Admin"){
            echo
                '<script> 
                    alert("Welcome Back Head Admin! ") 
                    window.location.href = "../Head_admin/Schedule/schedule.php";
                 </script>';
        }else if($_SESSION['user_type'] == "Admin"){
    	    echo 
                '<script> 
    	            alert("Welcome Back Admin! ") 
    	            window.location.href = "../Server_Side/home/home.php";
    	        </script>';
        }else{
            echo 
                '<script> 
    	            alert("No Type of User ") 
    	            window.location.href = "Login.php";
    	        </script>';
        }
    }
    else if($result == 400) {
    	echo '<script> 
    	alert("Your account has been disabled") 
    	window.location.href = "Login.php";
    	</script>';
    }else{
    	echo '<script> 
    	alert("Incorrect Username or Password") 
    	window.location.href = "Login.php";
    	</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>User Login</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="Login.php" method="post">
                <div class="header">
                    <label for="">Admin Login</label>
                </div>
                <div class="user-input">
                    <label for="username">
                        <img class="login-icon" src="../icons/user.png" alt="username">
                        <input type="text" name="username" placeholder="Username" id="username" required>
                    </label>
                </div>
                <div class="user-input">
                    <label for="password">
                        <img class="login-icon" src="../icons/lock.png" alt="password">
                        <input type="password" name="password" placeholder="Password" id="password" required>
                    </label>
                </div>
                <div class="login-btn">
                    <button type="submit">LOGIN</button>
                </div>

            </form>
        </div>
    </div>
</body>
</html>