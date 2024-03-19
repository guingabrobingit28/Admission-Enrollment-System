<?php 

include 'home-backend.php';


$display_student_count = new Count();
$result_student  = $display_student_count ->Count_Student();

$display_course = new Count();
$result_course  = $display_course ->Count_Course();


?>




<div class="header-content">
    <div class="header-content-container">
        <div class="sub-header" >
            <h1 class="headline" data-aos="fade-left">Welcome to Bestlink College of the Philippines</h1>
            <p data-aos="fade-up" data-aos-anchor=".other-element">At Bestlink College of the Philippines, We provide and promote quality education with modern and unique techniques to able to enhance the skill and the knowledge of our dear students to make them globally competitive and productive citizens.</p>
    </div>
    </div>
</div>
<div class="main-content" >
    <!-- 1 -->
    <div class="count">
        <!-- student enrolled -->
        <div class="box">
           <div class="box-head">
                <img class="box-icons" src="../../Icons/students.png" alt="">
                <p class="num"><?php echo $result_student;  ?></p>
           </div>
           <div class="box-body">
                <p>Total of students enrolled in Bestlink College of the Philippines</p>
           </div>
        </div>
        <!-- courses -->
        <div class="box">
           <div class="box-head">
                <img class="box-icons" src="../../Icons/homework.png" alt="">
                <p class="num"><?php echo $result_course; ?></p>
           </div>
           <div class="box-body">
                <p>Total of courses offer in Bestlink College of the Philippines</p>
           </div>
        </div>

        <div class="box">
           <div class="box-head">
                <img class="box-icons" src="../../Icons/homework.png" alt="">
                <p class="num">K to 12 Program Ready</p>
           </div>
           <div class="box-body">
                <p>Bestlink College of the Philippines offers K to 12 Program</p>
           </div>
        </div>
        
    </div>
    <!-- 2 -->
    <div class="vision-mision">
        <div class="img-container">
            <div class="img-border">
                <img src="../../Background/mission-vission.jpg" alt="">
            </div>
        </div>
        <div class="mission-vision-content">
            <div class="mv-content">
                   <h5>BCP MISSION & VISION</h5>
                   <p>Bestlink College of the Philippines’s mission and vision is committed in providing quality education to our youth. BCP meets and provides adequate facilities and services not to mention the competent and qualified instructors eagerly and enthusiastically extending and sharing their help for the welfare of the studentry.BCP vision aspires students to be a synergy of diverse and highly qualified students interacting with dedicated scholars, teachers and practitioners in a dynamic and student-centered environment. BCP mission offers students a vibrant and dynamic environment from which to enter the legal professional. They encourage students to be lifelong professionals who are actively engaged in the development of our society. Also they provide a strong foundation to fulfil the dreams of their students. Bestlink College of the Philippines give students the opportunities to concentrate on specialty areas in order to come up their skills, hands-on experienced in the classroom and through public service.</p>
            </div>
        </div>
    </div>
    <!-- 3 -->
    <div class="req-container">
        <h5>Requirements for Enrollment</h5>
        <p>1. Click here for <a href="../Admission/admission.php"> Admission Registration. </a></p>
        <p>2. Once registered, visit the Admission office of Bestlink Collge of Philippines Bulacan for the submission of requirements.<br> The said office is open from Monday to Friday, 8am-5pm (except Holidays).</p>
        <p>*No need to wait for an email or text message, you may visit the admission office to <br> submit your requirements once done with the registration for as long as you have <br> your registration key.</p>
        <p>**Requirements for Freshman:</p>
        <p>1. Form 138 (Report Card)</p>
        <p>2. Good Moral Certificate</p>
        <p>3. Two (2) photo copies of PSA Birth certificate colored</p>
        <p>4. Two (2) pcs. Passport Size ID picture with white background.</p>
        <p>**Requirements for Transfer students</p>
        <p>Transcript of Records (TOR)</p>
        <p>Honorable Dismissal</p>
        <p>Good Moral Certificate</p>
        <p>PSA Birth Certificate</p>
        <p>Barangay Clearance</p>
        <p>Passport Size ID Picture (WHITE BACKGROUND, FORMAL ATTIRE)</p>
        <p>for more details message us: Bliss- Bestlink Library and Information Science Society </p>
    </div>
</div>
