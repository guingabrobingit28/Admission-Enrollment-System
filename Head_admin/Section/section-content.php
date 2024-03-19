<?php 
include "section-backend.php";
// select schedule

$select_schedule = new Section();
$result_schedule  = $select_schedule->Show_Schedule();

//  insert section
if(isset($_POST['submit-section'])){

    $name = $_POST['section-name'];
    $sched = $_POST['schedule'];
    $room = $_POST['room'];

    
    $insert_section = new Section();
    $insert_result = $insert_section->Insert_Section($name,$sched,$room);

  
       
    if($insert_result == 200){
        echo "
        <script>
            alert('The Data is already inserted')
            window.location.href = 'section.php'
        </script>";
    }else{
        echo "
        <script>
            alert('ERROR')
            window.location.href = 'section.php'
        </script>";
    }

}

// update 

if(isset($_POST['update-section'])){

    $id = $_POST['id'];
    $name = $_POST['section-name'];
    $sched = $_POST['schedule'];
    $room = $_POST['room'];

    
    $update_section = new Section();
    $update_result = $update_section->Update_Section($name,$sched,$id,$room);

  
       
    if($update_result == 200){
        echo "
        <script>
            alert('The Data is already updated')
            window.location.href = 'section.php'
        </script>";
    }else{
        echo "
        <script>
            alert('ERROR')
            window.location.href = 'section.php'
        </script>";
    }

}

if(isset($_POST['src-submit'])){

    $name = $_POST['search_name'];
    $section_section = new Section();
    $result_section  = $section_section->Search_Section($name);
}else{
    // select section 
    $select_section = new Section();
    $result_section  = $select_section->Show_Section();

}


// delete section

if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    $delete_section = new Section();
    $result_delete  = $delete_section->Delete_Section( $id);

    if($result_delete == 200){
        echo "
        <script>
            alert('The Data is already deleted')
            window.location.href = 'section.php'
        </script>";
    }else{
        echo "
        <script>
            alert('ERROR')
            window.location.href = 'section.php'
        </script>";
    }

}

?>

<div class="admission-application-container">
    <div class="sub-admission-container">
        <div class="admission-header">
            <label for=""><a href="#" onclick="open_course()">New Section</a>
   
        </div>
        <div class="admission-content">
            <div class="admission-content-header">
                <div class="label-container">
                    <label for="">List of Section</label>
                </div> 
                <form action="section.php" method="POST">
                    <input type="text" name="search_name" placeholder="Search Name: ">
                    <button type="submit" name="src-submit">Filter</button>
                </form>
            </div>
            <div class="admission-content-body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th >Section</th>
                            <th>Room</th>
                            <th >Schedule</th>
                            <th>Action</th>
                        </tr>
                    </thead>
        
                    <?php foreach($result_section as $section){ ?>
                    <tbody>
                        <tr>
                            <td><?php echo $section['section_id'] ?></td>
                            <td><?php echo $section['section_name'] ?></td>
                            <td><?php echo $section['room'] ?></td>
                            <td><?php echo $section['schedule_name'] ?></td>
                            <td>                              
                                <a href="javascript: update_section('<?php echo $section['section_id'] ?>','<?php echo $section['schedule_id'] ?>','<?php echo $section['section_name'] ?>','<?php echo $section['room'] ?>');"><img class="act-icons" src="../../Icons/edit.png" alt="" srcset=""></a>
                                <a href="section.php?delete=<?php echo $section['section_id'];  ?>"><img class="act-icons" src="../../Icons/delete.png" alt="" srcset=""></a>                     
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                
                   
                </table>
            </div>
        </div> 
    </div> 
</div>
<!-- CREATE MODAL -->
<div class="modal">
    <div class="modal-container"> 
        <div class="header-course">
            <label for="">Add Section</label>
             <a href="javascript: close_course()"><img class="close-course" src="../../Icons/close.png" alt="" srcset=""></a>
        </div>
        <div class="body-course">
            <form action="section.php" method="POST">
                    <input type="text" name="section-name" placeholder="Section Name: ">
                    <input type="text" name="room" placeholder="Room: ">
                    <label for="">Choose Schedule</label>
                    <select name="schedule" id="">
                        <?php foreach($result_schedule as $sched_data){ ?>
                        <option value="<?php echo $sched_data['schedule_id'] ?>"><?php echo $sched_data['schedule_name'] ?></option>
                        <?php } ?>
                    </select>
                    <button type="submit" name="submit-section">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- UPDATE -->
<div class="modal" id="update-section">
    <div class="modal-container"> 
        <div class="header-course">
            <label for="">Add Section</label>
             <a href="javascript: close_section_update()"><img class="close-course" src="../../Icons/close.png" alt="" srcset=""></a>
        </div>
        <div class="body-course">
            <form action="section.php" method="POST">
                    <input type="text" name="section-name" placeholder="Section Name: " id="sec-name">
                    <input type="text" name="room" placeholder="Room: " id="room">
                    <input type="text" name="id" placeholder="Section Name: " id="sec-id" hidden>
                    <label for="">Choose Schedule</label>
                    <select name="schedule" id="">
                        <?php foreach($result_schedule as $sched_data){ ?>
                        <option value="<?php echo $sched_data['schedule_id'] ?>"><?php echo $sched_data['schedule_name'] ?></option>
                        <?php } ?>
                    </select>
                    <button type="submit" name="update-section">Submit</button>
            </form>
        </div>
    </div>
</div>


<script>
    // create
    let openModal = document.querySelector('.modal');
    function open_course(){
        openModal.style.display ="FLEX";
        
    }

    function close_course(){
        openModal.style.display ="None";
    } 



    // update modal
    let updateModal = document.querySelector('#update-section');
    function update_section(sec_id,sched_id,name,room){

        console.log(sec_id,sched_id,name);
        document.querySelector('#sec-name').value = name;
        document.querySelector('#room').value = room;
        document.querySelector('#sec-id').value = sec_id;
        updateModal.style.display = "FLEX";

    }

    function close_section_update(){
        updateModal.style.display = "NONE";
    }

</script>




