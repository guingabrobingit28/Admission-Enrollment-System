<?php 
require_once 'student-backend.php';

// SELECT RECORD

if(isset($_POST['src-submit'])){
    $search_name = $_POST['search_name'];
    $fetch_student = new Student_Record();
    $result_student = $fetch_student->Search_Records($search_name);
   

}


$cor = new Student_Record();
$result_cor = $cor->Select_Cor();
 








?>
<div class="admission-application-container">
    <div class="sub-admission-container">
        <div class="admission-header">
            <label for="">Certificate of Registration</label>
            
        </div>
        <div class="admission-content">
            <div class="admission-content-header">
             
                  
            </div>
            <div class="admission-content-body">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5em;">ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Semester</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php foreach($result_cor as $data){ ?>
                    <tbody>
                        <tr>
                            <td><?php echo $data['enrollment_id'] ?></td>
                            <td><?php echo $data['firstName'] . " " . $data['lastName'] ?></td>
                            <td><?php echo $data['course'] ?></td>
                            <td><?php echo $data['Year'] ?></td>
                            <td><?php echo $data['Sem'] ?></td>
                            <td><?php echo $data['Cor'] ?></td>
                            <th><a href="cor-generate.php?id=<?php echo $data['schedule_id'] ?>&&id_enroll=<?php echo $data['enrollment_id'] ?>&&name=<?php echo $data['firstName'] . " " . $data['lastName'] ?>&&course=<?php echo $data['course'] ?>&&sem=<?php echo $data['Sem'] ?>&&year=<?php echo $data['Year'] ?>&&section=<?php echo $data['section_name']; ?> ">Generate</a></th>
                        </tr>
                    <tbody>
                        <?php } ?>
                </table>
            </div>
        </div>

    </div>
  
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</script>