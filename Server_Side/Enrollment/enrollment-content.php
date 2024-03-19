<?php 
require_once 'enrollment-backend.php';

if(isset($_POST['src-submit'])){
    $search_name = $_POST['search_name'];
    $admission_list = new Show_admission();
    $result_pending = $admission_list->Search_Pending_admission($search_name);
}else{
    $admission_list = new Show_admission();
    $result_pending = $admission_list->Show_Pending_admission();
}


// RETURNEE

if(isset($_POST['submit-returnee'])){

    $student_id = $_POST['returnee_id'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $section = $_POST['section'];
    // $payment = $_POST['payment'];
    // $voucher = $_POST['voucher'];
   
    $enrollment = new  Enrollment();
    $enrollment_result = $enrollment->returnee_enrollment($student_id,$year,$semester,$section);


    if($enrollment_result == 200){
    	echo '<script> 
    	alert("Successfully Submitted") 
    	window.location.href = "enrollment.php";
    	</script>';
    }
    else if($enrollment_result == 400) {
    	echo '<script> 
    	alert("Error") 
    	window.location.href = "enrollment.php";
    	</script>';
    }

}


// TRANSFER OR FRESHMEN


if(isset($_POST['submit-enrollment'])){

    $items = $_POST['requirements'];
    $student_id = $_POST['student_id'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $section = $_POST['section'];
    $remark = $_POST['remark'];
    // $payment = $_POST['payment'];
    // $voucher = $_POST['voucher'];
   
    $enrollment = new  Enrollment();
    $enrollment_result = $enrollment->enrollment($student_id,$items,$year,$semester,$section,$remark);


    if($enrollment_result == 200){
    	echo '<script> 
    	alert("Successfully Submitted") 
    	window.location.href = "enrollment.php";
    	</script>';
    }
    else if($enrollment_result == 400) {
    	echo '<script> 
    	alert("Error") 
    	window.location.href = "enrollment.php";
    	</script>';
    }
    
}

    $section = new Enrollment();
    $result_section = $section->Show_Section();

?>
<div class="admission-application-container">
    <div class="sub-admission-container">
        <div class="admission-header">
            <label for="">Enrollment list</label>
            
        </div>
        <div class="admission-content">
            <div class="admission-content-header">
                <div class="label-container">
          
             
                </div> 
                <form action="enrollment.php" method="POST">
                    <input type="text" name="search_name" placeholder="Search Name: ">
                    <button type="submit" name="src-submit">Filter</button>
                </form>
            </div>
            <div class="admission-content-body">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5em;">Student ID</th>
                            <th>Name</th>
                            <th>Admission Type</th>
                            <th>Date</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php foreach($result_pending  as $data){?>
                    <tbody>
                        <tr>
                            <td><?php echo $data['student_id']; ?></td>
                            <td><?php echo $data['firstName'] . " " . $data['lastName']  ?></td>
                            <td><?php echo $data['admissionType']; ?></td>
                            <td><?php echo $data['date']; ?></td>
                            <td>
                                <?php if($data['admissionType'] == 'Transferee' || $data['admissionType'] == 'Freshmen' ){ ?>
                                    <a href="javascript: open_enroll(<?php echo $data['student_id']; ?>);" >Enroll</a>
                                <?php }else if($data['admissionType'] == 'Returnee'){ ?>
                                    <a href="javascript: open_returnee(<?php echo $data['student_id']; ?>);" >Enroll</a>
                                <?php } ?>
                            </td>
                            <td><?php  if($data['Student_Type'] == 'NE'){
                                ECHO "NOT ENROLLED";
                            }else{
                                ECHO "ENROLLED ";
                            } ; ?></td>
                        </tr>
                    </tbody>
                    
                    <?php  } ?>
                </table>
            </div>
        </div>

    </div>
    <!-- modal -->
    <div class="modal-containe">

    </div>
</div>
<!-- new student -->
<div class="modal">
    <div class="modal-container">
        <div class="modal-header">
            <label for="">Freshmen/Transferee Enrollment</label>
            <a href="javascript: close_message()"><img src="../../Icons/close.png" ></a>
        </div>
        <div class="modal-body">
            <form action="enrollment.php" method="POST">
                <div class="requirements">
                    <div class="checklist">
                        <div class="row">
                            <input type="checkbox" name="requirements[]" value="Form 138 (Report Card)">
                            <label for="">Form 138 (Report Card)</label>
                        </div>
                        <div class="row">
                            <input type="checkbox" name="requirements[]" value="Form 137">
                            <label for="">Form 137</label>
                        </div>
                        <div class="row">   
                            <input type="checkbox" name="requirements[]" value="Certificate of Good Moral">
                            <label for="">Certificate of Good Moral</label>
                        </div>
                        <div class="row">   
                            <input type="checkbox" name="requirements[]" value="PSA Authenticated Birth Certificate">
                            <label for="">PSA Authenticated Birth Certificate</label>
                        </div>
                        <div class="row">   
                            <input type="checkbox" name="requirements[]" value="Passport Size ID Picture">
                            <label for="">Passport Size ID Picture</label>
                        </div>
                        <div class="row">   
                            <input type="checkbox" name="requirements[]" value="Barangay Clearance">
                            <label for="">Barangay Clearance</label>
                        </div>
                        <div class="row">   
                            <input type="checkbox" name="requirements[]" value="Transcript of Records from Previous School">
                            <label for="">Transcript of Records from Previous School</label>
                        </div>
                        <div class="row">    
                            <input type="checkbox" name="requirements[]" value="Honorable Dismissal">
                            <label for="">Honorable Dismissal</label>
                            <input type="text" name="student_id" id="student_id" hidden>
                        </div>                      
                    </div>
                    <div class="remark">
                        <select name="year" id="">
                            <option disabled>Year</option>
                            <option value="First Year">First Year</option>
                            <option value="Second Year">Second Year</option>
                            <option value="Third Year">Third Year</option>
                            <option value="Fourth Year">Fourth Year</option>
                        </select>
                        <select name="semester" id="">
                            <option disabled>Semester</option>
                            <option value="First Semester">First Sem</option>
                            <option value="Second Semester">Second Sem</option>
                        </select>
                        <select name="section" id="">
                            <option disabled>Section</option>
                            <?php foreach($result_section as $data_section){ ?>
                            <option value="<?php echo $data_section['section_id']; ?>"><?php echo $data_section['section_name']; ?></option>
                          
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="bal-remark">
                        <textarea id="myTextarea" name="remark" cols="20" rows="3" placeholder="Remark: "></textarea>
                        <button type="submit" name="submit-enrollment">ENROLLED</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- returnee -->

<div class="modal-returnee">
    <div class="returnee-container">
        <div class="head-returnee">
            <label for="">Returnee Enrollment</label>
            <a href="javascript: close_returnee();"><img class="icons" src="../../Icons/close.png" alt="" srcset=""></a>
        </div>
        <div class="body-returnee">
            <form action="enrollment.php" method="POST">

                <div class="row-returnee">

                    <div class="returnee-info">
                            <label for="">Year</label>
                        <select name="year" id="">
                            <option value="First Year">First Year</option>
                            <option value="Second Year">Second Year</option>
                            <option value="Third Year">Third Year</option>
                            <option value="Fourth Year">Fourth Year</option>
                        </select>
                    </div>
                    <div class="returnee-info">
                            <label for="">Semester</label>
                        <select name="semester" id="">
                            <option value="First Semester">First Sem</option>
                            <option value="Second Semester">Second Sem</option>
                        </select>
                        <input type="text" id="returnee_id" name="returnee_id" hidden>
                    </div>
                    <div class="returnee-info">
                                <label for="">Section</label>
                            <select name="section" id="">
                            <?php foreach($result_section as $data_section){ ?>
                            <option value="<?php echo $data_section['section_id']; ?>"><?php echo $data_section['section_name']; ?></option>
                            <?php  } ?>
                        </select>
                    </div>


                </div>

           

                <div class="row-returnee" id="btn-returnee">
                    <button type="submit" name="submit-returnee" >SUBMIT</button>
                </div>
            </form>
        </div>

    </div>
</div>



<script>

    let modalreturnee = document.querySelector('.modal-returnee');

    function open_returnee(id){
        document.querySelector('#returnee_id').value = id;
        modalreturnee.style.display="FLEX";
    }

    function close_returnee(){
        modalreturnee.style.display="NONE";



    }









// 
      let openModal = document.querySelector('.modal');
    function open_enroll(id){
        
        document.querySelector('#student_id').value = id;
        openModal.style.display ="Flex";
    
    }

    function close_message(){
        openModal.style.display ="None";
    } 


    function hello(){
       document.getElementById("bill").textContent = '4975';
        let voucher = document.getElementById("voucher").value;
        let bill = document.getElementById("bill").textContent;

        let result =  parseFloat(bill) - parseFloat(voucher);
        document.getElementById("bill").textContent = result;

    }


    function hi(){
       document.getElementById("r-bill").textContent = '4975';
        let voucher = document.getElementById("r-voucher").value;
        let bill = document.getElementById("r-bill").textContent;
        console.log(voucher);

        let result =  parseFloat(bill) - parseFloat(voucher);
        console.log(result);
        document.getElementById("r-bill").textContent = result;

    }
</script>