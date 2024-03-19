<?PHP 
require_once "student_entry.php";

$StudentData = new Register();

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $userInput = $_POST["username"];
    $passInput = $_POST["password"];
    $repassword = $_POST['re-password'];
    $userType = 'Client';
    $status = 'Enable';
    $admission_status = 'On';
    
    $result = $StudentData->UserRegister($userInput,$passInput,$repassword,$userType,$status,$admission_status);

    if($result == 200){
    	echo '<script> 
    	alert("Successfully Inserted") 
    	window.location.href = "register.php";
    	</script>';
    }
    else if($result == 400) {
    	echo '<script> 
    	alert("Error") 
    	window.location.href = "register.php";
    	</script>';
    }
    else if($result == 404) {
    	echo '<script> 
    	alert("Passwords did not match")
    	window.location.href = "register.php";
    	</script>';
    }
}

?>
<div class="student_container_entry">
    <form action="register_content.php" method="post">
        <div class="lab-login">
            <label for="">BCP Register</label>
        </div>
        <div class="con-input">
            <label for=""><img class="student_login_icons" src="../../Icons/user.png" alt="" srcset="">
            <input type="email" name="username" placeholder="Email" required autocomplete="on"></label>
        </div>
        <div class="con-input">
        <label for=""><img class="student_login_icons" src="../../Icons/lock.png" alt="" srcset="">
            <input type="password" id="password" name="password" placeholder="Password" required></label>
        </div>
        <div class="con-input">
        <label for=""><img class="student_login_icons" src="../../Icons/lock.png" alt="" srcset="">
            <input type="password" id="re-password" name="re-password" placeholder="Re-Password" required></label>
        </div>
        <div class="btn-login-container">
            <a href="student_login.php" style="background-color: #5AA5D1 ;" >Login</a>
            <button style="background-color: crimson;" type="submit">Register</button>
        </div>
    </form>
</div>