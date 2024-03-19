<?php 
require_once 'student-backend.php';

if(isset($_POST['src-submit'])){
    $search_name = $_POST['search_name'];
    $admission_list = new Student_Record();
    $result_pending = $admission_list->Search_Requirements($search_name);
}else{
    $admission_list = new Student_Record();
    $result_pending = $admission_list->Show_Requirements();
}

if(isset($_POST['submit-update'])){
    $items = $_POST['requirements'];
    $id = $_POST['id'];
    $remark = $_POST['remark'];
    $update = new Student_Record();
    $result_update = $update->update_requirements($id,$items,$remark);

    if($result_update == 200){
        echo "
        <script>alert('Requirement Updated Successfully')
            window.location.href='requirement.php';
        </script>";
    }else{
        echo "
        <script>alert('ERROR')
            window.location.href='requirement.php';
        </script>";
    }
    

}


?>
<div class="admission-application-container">
    <div class="sub-admission-container">
        <div class="admission-header">
            <label for="">Student Requirements</label>
            
        </div>
        <div class="admission-content">
            <div class="admission-content-header">
                <div class="label-container">
          
             
                </div> 
                <form action="requirement.php" method="POST">
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
                            <th>Date Update</th>
                            <th>Action</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <?php foreach($result_pending  as $data){?>
                    <tbody>
                        <tr>
                            <td><?php echo $data['student_id']; ?></td>
                            <td><?php echo $data['firstName'] . " " . $data['lastName']  ?></td>
                            <td><?php echo $data['date']; ?></td>
                            <td><a href="javascript: view_requirements('<?php echo $data['student_id'] ?>');"><img class="view" src="../../Icons/view.png"></a><a href="javascript: add_requirements('<?php echo $data['student_id']; ?>'); " ><img class="add" src="../../Icons/add.png" ></a></td>
                            <td><?php echo $data['Remark']; ?></td>
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
<!-- view -->
<div class="modal">
    <div class="modal-container"> 
        <div class="header-course">
            <label for="">Requirements Submitted</label>
             <a href="javascript: close_course()"><img class="close-course" src="../../Icons/close.png" alt="" srcset=""></a>
        </div>
        <div class="body-course">  
        </div>
    </div>
</div>
<!-- add requirments -->

<div class="modal" id="add-requirements">
    <div class="modal-container" id="modal-requirements"> 
        <div class="header-course" id="head-requirements">
            <label for="">Add Requirements</label>
             <a href="javascript: close_requirements()"><img class="close-course" src="../../Icons/close.png" alt="" srcset=""></a>
        </div>
        <div class="body-course" id="requirement-body">
            <form action="requirement.php" method="post">
                        <div class="req-row">
                            <input type="checkbox" name="requirements[]" value="Form 138 (Report Card)">
                            <label for="">Form 138 (Report Card)</label>
                        </div>
                        <div class="req-row">
                            <input type="checkbox" name="requirements[]" value="Form 137">
                            <label for="">Form 137</label>
                        </div>
                        <div class="req-row">   
                            <input type="checkbox" name="requirements[]" value="Certificate of Good Moral">
                            <label for="">Certificate of Good Moral</label>
                        </div>
                        <div class="req-row">   
                            <input type="checkbox" name="requirements[]" value="PSA Authenticated Birth Certificate">
                            <label for="">PSA Authenticated Birth Certificate</label>
                        </div>
                        <div class="req-row">   
                            <input type="checkbox" name="requirements[]" value="Passport Size ID Picture">
                            <label for="">Passport Size ID Picture</label>
                        </div>
                        <div class="req-row">   
                            <input type="checkbox" name="requirements[]" value="Barangay Clearance">
                            <label for="">Barangay Clearance</label>
                        </div>
                        <div class="req-row">   
                            <input type="checkbox" name="requirements[]" value="Transcript of Records from Previous School">
                            <label for="">Transcript of Records from Previous School</label>
                        </div>
                        <div class="req-row">    
                            <input type="checkbox" name="requirements[]" value="Honorable Dismissal">
                            <label for="">Honorable Dismissal</label>
                        </div>
                        <div class="req-remark">
                            <input type="text" value="" name="id" id="update-req" hidden>
                            <textarea name="remark" id=""  cols="30" rows="5" placeholder="Update Remark: "></textarea>
                        </div>
                        <div class="req-btn">
                            <button type="submit" name="submit-update">UPDATE</button>
                        </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
     // create

     let openModal = document.querySelector('.modal');
    function view_requirements(id){
        
        console.log(id);
        user_id = id; 
       
        $.ajax({
            type: "GET",
            url: "view_requirement.php",
            data:{id:user_id},
            dataType: "json",
            success:function(data){

            console.log(data);
            
            const responseData = data;

            // Access the 'data' array
            const dataArray = responseData.data;

            // Loop through the array and log each 'requirement_name'
            dataArray.forEach(item => {
                console.log(item.requirement_name);
                list = document.createElement("label");
                list.innerHTML = `${item.requirement_name}`;
                document.querySelector('.body-course').append(list);
            });
        }
        
        });
        
        openModal.style.display ="Flex";
    }

    function close_course(){
        document.querySelector('.body-course').innerHTML = ' ';
        openModal.style.display = "None";
    }


    // ADD REQUIREMENTS
    let addmodal = document.querySelector('#add-requirements');
    function add_requirements(id){

        document.querySelector('#update-req').value = id;


       addmodal.style.display="FLEX";
    }

    function close_requirements(){
        addmodal.style.display="NONE";
    }
</script>