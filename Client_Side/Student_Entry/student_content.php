<?PHP 
require_once "student_entry.php";

$StudentData = new Login();

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $userInput = $_POST["username"];
    $passInput = $_POST["password"];
    
    $result = $StudentData->UserLogin($userInput,$passInput);

    if($result == 200){
    	echo '<script> 
    	alert("Welcome To Bestlink ") 
    	window.location.href = "../../Student_Side/home/home.php";
    	</script>';
    }
    else if($result == 400) {
    	echo '<script> 
    	alert("Your account has been disabled") 
    	window.location.href = "student_login.php";
    	</script>';
    }else{
    	echo '<script> 
    	alert("Incorrect Username or Password") 
    	window.location.href = "student_login.php";
    	</script>';
    }
}

?>
<div class="student_container_entry">
    <form action="student_content.php" method="post">
        <div class="lab-login">
            <label for="">BCP Login</label>
        </div>
        <div class="con-input">
            <label for=""><img class="student_login_icons" src="../../Icons/user.png" alt="" srcset=""><input type="text" name="username" placeholder="Email"></label>
        </div>
        <div class="con-input">
        <label for=""><img class="student_login_icons" src="../../Icons/lock.png" alt="" srcset=""><input type="password" name="password" placeholder="Password"></label>
        </div>
        <div class="btn-login-container">
            <button type="submit">LOGIN</button>
            <a href="register.php">Register</a>
        </div>
        
        
        
    </form>
</div>