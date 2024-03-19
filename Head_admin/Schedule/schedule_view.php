<?php 
include "schedule-backend.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $select_schedule = new Schedule();
    $result_schedule  = $select_schedule->View_Schedule($id);

}

if(isset($_POST['submit'])){



    $id = $_POST['id'];
    $time_in = $_POST['time_in'];
    $time_out = $_POST['time_out'];

    
    $update_schedule = new Schedule();
    $result_update  = $update_schedule->Update_Schedule($id,$time_in,$time_out);

    if($result_update == 200){
        echo "
        <script>
            alert('The Data is already updated')
            window.location.href = 'schedule.php'
        </script>";
    }else{
        echo "
        <script>
            alert('ERROR')
            window.location.href = 'schedule.php'
        </script>";
    }


}





?>
<link rel="stylesheet" href="schedule_view.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule View</title>
</head>
<body>
    <div class="sched-label">
        <label ></label>
    </div>
    <div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Subject </th>
                <th>Subject Description</th>
                <th>Day</th>
                <th>Time Start</th>
                <th>Time End</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php foreach($result_schedule as $subject){ ?>
        <tbody>
            <tr>
                <td><?php echo $subject['subject_name'] ?></td>
                <td><?php echo $subject['subject_description'] ?></td>
                <td><?php echo $subject['day'] ?></td>
                <td><?php echo date('h:i A',strtotime($subject['time_in'])) ?></td>
                <td><?php echo date('h:i A',strtotime($subject['time_out'])) ?></td>
                <td><a href="javascript: open_course('<?php echo $subject['schedule_day_id'] ?>','<?php echo $subject['subject_code'] ?>','<?php echo date('H:i',strtotime($subject['time_in'])) ?>','<?php echo date('H:i',strtotime($subject['time_out'])) ?>');"><img class="edit" src="../../Icons/edit.png" alt="" srcset=""></a></td>
            </tr>
        </tbody>
        <?php } ?>
        </div>




    </table> 

    <div class="modal" >
    <div class="modal-container" > 
        <div class="header-schedule" >
            <label for="">Update Schedule</label>
             <a href="javascript: close_course()"><img class="close-course" src="../../Icons/close.png" alt="" srcset=""></a>
        </div>
        <div class="body-schedule">
            <form action="schedule_view.php" method="POST" >
                <div class="row-schedule">
                    <label for="" id="subject">Subject: </label>
                </div>
                <div class="row-schedule">
                    <p>Time In:</p>
                    <input type="text" name="id" id="id" hidden>
                    <input type="time" name="time_in" id="timein"> 
                </div>
                <div class="row-schedule">
                    <p>Time Out:</p>
                    <input type="time" name="time_out" id="timeout" >
                </div>
                <div class="btn-sub" >
                    <button type="submit" name="submit">Submit</button>
                </div> 
              
                
              
            </form>
        </div>
    </div>
</div>
</body>
<script>
      let openModal = document.querySelector('.modal');
    function open_course(id,code,timein,timeout){
        document.querySelector("#subject").textContent = code;
        document.querySelector("#timein").value = timein;
        document.querySelector("#timeout").value = timeout;
        document.querySelector("#id").value = id;
        openModal.style.display = "FLEX";

        console.log(timeout)
      
    
    }

    function close_course(){
        openModal.style.display ="None";
    } 
</script>
</html>