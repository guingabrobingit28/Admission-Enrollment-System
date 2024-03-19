<?PHP 
require_once "admission_entry.php";

$ClientData = new admission();

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST['id'];
    $first_name = $_POST['firstName'];
    $middle_name = $_POST['middleName'];
    $lastname = $_POST['lastName'];
    $suffix = $_POST['suffix'];
    $bod = $_POST['dob'];
    $phone = $_POST['phone'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $g_firstname = $_POST['guardian_firstname'];
    $g_lastname = $_POST['guardian_lastname'];
    $g_middle = $_POST['guardian_middlename'];
    $g_suffix = $_POST['guardian_suffix'];
    $guardian_number = $_POST['guardian_phone'];
    $gender = $_POST['gender'];
    $civil_status = $_POST['civil-status'];

    echo $result = $ClientData->admission_data($id,$first_name,$middle_name,$lastname,$suffix,$bod,$phone,$street,$city,$province,$zipcode,$country,$email,$g_firstname,$g_middle,$g_lastname,$g_suffix,$guardian_number,$gender,$civil_status);

    if($result == 200){
    	echo '<script> 
    	alert("Successfully Inserted wait for the admin response") 
    	window.location.href = "admission.php";
    	</script>';
    }
    else if($result == 400) {
    	echo '<script> 
    	alert("Error") 
    	window.location.href = "admission.php";
    	</script>';
    }
    else if($result == 404) {
    	echo '<script> 
    	alert("Passwords did not match")
    	window.location.href = "register.php";
    	</script>';
    }
}

$client_id = $_SESSION['account_id'];
$status_check = new admission_status();
$status_result = $status_check->admission_status_check($client_id);
$status_result['admission_status'];

?>
<?php if($status_result['admission_status'] == 'On'){ ?> 
<div class="admission-container">
    <div class="sub-admission-container">
       <div class="admission-header">
            <label for="">Admission Application Form</label>
       </div>
       <div class="admission-content">
            <form action="admission_content.php" method="post">
                <!-- CLIENT NAME -->
                <div class="student-input-con">
                    <div class="student-label">
                        <label for="">Student Name </label>
                    </div>
                    <div class="studen-input">
                        <label for="">First Name</label>
                        <input type="text" name="id" value ="<?php echo $_SESSION['account_id'] ?>" hidden>
                        <input type="text" name="firstName" placeholder="First Name: ">
                    </div>
                    <div class="studen-input">
                        <label for="">Last Name</label>
                        <input type="text" name="lastName" placeholder="Last Name:" >
                    </div>
                </div>
                <!-- 2 -->
                <div class="student-input-con">
                    <div class="student-label">
                        <label for=""></label>
                    </div>
                    <div class="studen-input">
                        <label for="">Middle Name</label>
                        <input type="text" name="middleName" placeholder="Middle Name: ">
                    </div>
                    <div class="studen-input">
                        <label for="">Suffix</label>
                        <input type="text" name="suffix" placeholder="Suffix(optional)" >
                    </div>
                </div>
                <!-- GENDER CIVIL STATUS -->
                <div class="student-input-con">
                    <div class="student-label">
                        <label for=""></label>
                    </div>
                    <div class="studen-input">
                        <label for="">GENDER</label>
                        <SELECT name="gender">
                            <OPTION value="male">MALE</OPTION>
                            <OPTION value="female">FEMALE</OPTION>
                        </SELECT>
                    </div>
                    <div class="studen-input">
                        <label for="">CIVIL STATUS</label>
                        <SELECT name="civil-status">
                            <OPTION value="single">SINGLE</OPTION>
                            <OPTION value="married">MARRIED</OPTION>
                            <OPTION value="devorced">DEVORCED</OPTION>
                            <OPTION value="widowed">WIDOWED</OPTION>
                        </SELECT>
                    </div>
                </div>
                <!-- DATE OF BIRTH -->
                <div class="student-input-con">
                    <div class="student-label">
                        <label for="">Date of Birth</label>
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input style="width: 34em;" type="date" name="dob" >
                    </div>
                </div>
                <!-- PHONE NUMBER -->
                <div class="student-input-con">
                    <div class="student-label">
                        <label for="">Phone</label>
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input style="width: 34em;" type="text" name="phone" placeholder="Contact Number: "  >
                    </div> 
                </div>
                <!-- 1 Home address -->
                <div class="student-input-con" >
                    <div class="student-label">
                        <label for="">Home Address</label>
                    </div>
                    <div class="studen-input sub-input">
                        <label for=""></label>
                        <input style="width: 34em;" type="text" name="street" placeholder="Street:"  >
                    </div> 
                </div>
                <!-- 2 -->
                <div class="student-input-con">
                    <div class="student-label">
                        <label for=""></label>
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input type="text" name="city" placeholder="City: ">
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input type="text" name="province" placeholder="Province:" >
                    </div>
                </div>
                  <!-- 3 -->
                <div class="student-input-con">
                    <div class="student-label">
                        <label for=""></label>
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input type="text" name="zipcode" placeholder="Zip Code: ">
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input type="text" name="country" placeholder="Country:" >
                    </div>
                </div>
                <!-- Email -->
                <div class="student-input-con">
                    <div class="student-label">
                        <label for="">Email</label>
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input style="width: 34em;" type="email" name="email" placeholder="Email: "  >
                    </div> 
                </div>
                <!-- Guardia name -->
                <div class="student-input-con">
                    <div class="student-label">
                        <label for="">Guardian Name</label>
                    </div>
                    <div class="studen-input">
                        <label for="">First Name</label>
                        <input type="text" name="guardian_firstname" placeholder="First Name: ">
                    </div>
                    <div class="studen-input">
                        <label for="">Last Name</label>
                        <input type="text" name="guardian_lastname" placeholder="Last Name:" >
                    </div>
                </div>
                <!-- 2 -->
                <div class="student-input-con">
                    <div class="student-label">
                        <label for=""></label>
                    </div>
                    <div class="studen-input">
                        <label for="">Middle Name</label>
                        <input type="text" name="guardian_middlename" placeholder="Middle Name: ">
                    </div>
                    <div class="studen-input">
                        <label for="">Suffix</label>
                        <input type="text" name="guardian_suffix" placeholder="Suffix(optional)" >
                    </div>
                </div>
                <!-- Guardian Contact Number -->
                <div class="student-input-con">
                    <div class="student-label">
                        <label for="">Phone</label>
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input style="width: 34em;" type="text" name="guardian_phone" placeholder="Contact Number: "  >
                    </div> 
                </div>
                <div class="admission-btn">
                    <button type="submit">SUBMIT</button>
                </div>
                
              
               
                
                
            </form>
       </div>
    </div>
</div>
<?php }else{
    echo "<div class='close-submission-container'>
            <div class='sub-close-container' >
           <p> Your application is already submitted </P>
            </div>
        </div>";
} ?>