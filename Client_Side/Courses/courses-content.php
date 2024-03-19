<?php 

require_once "course_backend.php";

$select_course = new Course();
$result_list  = $select_course->Show_Course();

?>
<div class="courses-container">
    <div class="bg-courses">
        <label for="" data-aos="fade-left">Bestlink Courses Offer</label>
    </div>
  
    <div class="courses-content">
    <?php foreach($result_list as $data){?>
        <div class="course-box" >
            <div class="sub-course-box" data-aos="fade-down">
                <div class="box-header">
                    <label for=""><?php echo $data['course_name']; ?></label>
                </div>
                <div class="box-body">
                    <p><?php echo $data['course_description']; ?></p>
                </div>
            </div>
        </div>
        <?php  } ?>
    
        
      
       
      
    </div>
 
</div>