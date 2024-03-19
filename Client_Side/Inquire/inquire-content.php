<?PHP 
require_once "inquiry_backend.php";

$InquireData = new Inquiry();

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $uName = $_POST["fullname"];
    $email = $_POST["email"];
    $contact = $_POST['contact'];
    $message = $_POST['message'];
    $inquiry_status = 'Pending';
    
    $result_inquire = $InquireData->data_inquire($uName,$email,$contact,$message,$inquiry_status);

    if($result_inquire == 200){
    	echo '<script> 
    	alert("Successfully Send to the Admin") 
    	window.location.href = "inquire.php";
    	</script>';
    }
    else if($result_inquire == 400) {
    	echo '<script> 
    	alert("The Server is Error") 
    	window.location.href = "inquire.php";
    	</script>';
    }
  
}

?>









<div class="courses-container">
    <div class="bg-courses">
        <label for="" data-aos="fade-left">Contact Us</label>
    </div>
    <div class="courses-content">
        <div class="inquire-container">
            <div class="inquire-contact">
                    <div class="sub-inquire-contact">
                        <div class="box-contact">
                            <label for="">Address:</label>
                            <p>IPO Road, Barangay Minuyan Proper City of San Jose Del Monte, Bulacan<img class="contact-icons" src="../../Icons/placeholder.png"></p>
                        </div>
                        <div class="box-contact">
                            <label for="">Email:</label>
                            <p>bestlink@gmail.com<img class="contact-icons" src="../../Icons/gmail.png"></p>
                        </div>
                        <div class="box-contact">
                            <label for="">Contact:</label>
                            <p>0926-234-1234<img class="contact-icons" src="../../Icons/phone.png"></p>
                        </div>
                    </div>
            </div>
            <div class="inquire-data">
                <form action="inquire-content.php" method="post">
                    <div class="box-data">
                        <input type="text" name="fullname" placeholder="Name ">
                        <input type="email" name="email" placeholder="Email ">
                    </div>
                    <div class="box-data">
                        <input type="text" class="phone" name="contact" placeholder="Contact Number ">
                    </div>
                    <div class="box-data-message">
                        <textarea name="message" placeholder="Message" ></textarea>
                    </div>
                    <div class="box-data btn-inquire">
                        <button type="submit">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>