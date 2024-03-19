<?php 
require_once "setting_backend.php";
$id = $_SESSION['id']; 

$account_data = new Password();
$data = $account_data->Show_password($id);

if(isset($_POST['submit-password'])){

    $id = $_POST['id'];
    $np = $_POST['np'];
    $rnp = $_POST['rnp'];
    $update_data = new Password();
    $res_update_data =  $update_data->Update_password($id,$np,$rnp);

    if($res_update_data == 401){
        echo   
        '<script> 
            alert("Password doesnt match ") 
            window.location.href = "setting.php";
        </script>';
    }else if($res_update_data == 200){
        echo   '<script> 
        alert("Succesfully Change ") 
        window.location.href = "setting.php";
         </script>';
    }else{
        echo   '<script> 
        alert("error") 
        window.location.href = "setting.php";
     </script>';
    }
}

?>

<div class="setting-container">
    <div class="sub-setting">
        <div class="setting-head">
            <label for="">Change Password</label>
        </div>
        <div class="setting-body">
            <form action="setting.php" method="POST">
                <label for="">Username</label>
                <p><?php echo $data['username']; ?></p>
                <label for="">Current Password</label>
                <input type="text" name="id" id="" placeholder="current Password" value="<?php echo $data['id']; ?>" hidden>
                <input type="text" name="cp" id="" placeholder="current Password" value="<?php echo $data['password']; ?>">
                <label for="">New password</label>
                <input type="password" name="np" id="" placeholder="new password: ">
                <label for="">Re-Password</label>
                <input type="password" name="rnp" placeholder="re password: " >
                <button type="submit" name="submit-password">Submit</button>
            </form>
        </div>
    </div>
</div>