<?php 
include "schedule-backend.php";

error_reporting(0);

// select schedule

$select_subject = new Schedule();
$result_subject  = $select_subject->Show_Subject();


// select schedule

$select_schedule = new Schedule();
$result_schedule  = $select_schedule->Show_Schedule();


if(isset($_POST['new-sched-set'])){

    $name = $_POST['schedule_name'];
    $day = $_POST['day'];
    $subject = $_POST['subject'];
    $time_in = $_POST['time_in'];
    $time_out = $_POST['time_out'];

    $insert_schedule = new Schedule();
    $result_schedule  = $insert_schedule->Insert_Schedule($name,$day,$subject,$time_in,$time_out);

    if($result_schedule == 200){
        echo "
        <script>
            alert('The Data is already Inserted')
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

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $delete_schedule = new Schedule();
    $result_delete = $delete_schedule->Delete_Schedule($id);

    if($result_delete == 200){
        echo "
        <script>
            alert('The Data is already delete')
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

<div class="admission-application-container">
    <div class="sub-admission-container">
        <div class="admission-header">
            <label for=""><a href="#" onclick="open_course()">New Schedule</a>
   
        </div>
        <div class="admission-content">
            <div class="admission-content-header">
                <div class="label-container">
                    <label for="">List of Schedule</label>
                </div> 
                <form action="inquiry.php" method="POST">
                    <input type="text" name="search_name" placeholder="Search Schedule: ">
                    <button type="submit" name="src-submit">Filter</button>
                </form>
            </div>
            <div class="admission-content-body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th >Schedule Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php foreach($result_schedule as $data){?>
                    <tbody>
                        <tr>
                            <td><?php echo $data['schedule_id']; ?></td>
                            <td><?php echo $data['schedule_name']; ?></td> 
                            <td>
                                <!-- <a href="javascript: view_schedule('<?php echo $data['schedule_id']; ?>');"><img class="act-icons" src="../../Icons/show.png" alt="" srcset=""></a> -->
                                <a href="schedule_view.php?id=<?php echo $data['schedule_id']; ?>&&schedule_name=<?php echo $data['schedule_name']; ?>" target="_blank"><img class="act-icons" src="../../Icons/show.png" alt="" srcset=""></a>
                                <a href="schedule.php?id=<?php echo $data['schedule_id']; ?>" target="_blank"><img class="act-icons" src="../../Icons/delete.png" alt="" srcset=""></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php  } ?>
                
                   
                </table>
            </div>
        </div> 
    </div> 
</div>
<!-- CREATE MODAL -->
<div class="modal" id="modal-create">
    <div class="modal-container" id="create-container"> 
        <div class="header-course" id="head-schedule">
            <label for="">Set New Schedule</label>
             <a href="javascript: close_course()"><img class="close-course" src="../../Icons/close.png" alt="" srcset=""></a>
        </div>
        <div class="body-schedule">
            <form action="schedule.php" method="POST" >
                <div class="sched-set" id="form-sched">
                    <div class="schedule_name">
                        <input type="text" name="schedule_name"  placeholder="Schedule Name: ">
                    </div>
                    <div class="sched-input">
                        <input type="text" name="day[]" placeholder="Day: ">
                        <select name="subject[]" style="width:200px;">
                            <option >Select Option</option>
                            <option value="Lunch Break">Lunch Break</option>
                            <option value="Recess">Recess</option>
                            <?PHP foreach($result_subject as $subject){ ?>
                            <option value="<?php echo $subject['subject_id'] ?>" ><?php echo $subject['subject_name'] ?></option>
                        <?php } ?>
                              <!-- <input type="text" name="subject[]" placeholder="Subject: "> -->
                        <input type="time" name="time_in[]">
                        <input type="time" name="time_out[]">
                    </div>
                </div>
                <div class="btn-req-div">
                    <button type="submit" name="new-sched-set">SUBMIT</button>
                    <a href="javascript: add_row();">ADD NEW </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- VIEW SCHEDULE -->
<div class="modal" id="view-schedule">
    <div class="modal-container"> 
        <div class="header-course">
            <label for="">View Schedule</label>
             <a href="javascript: close_view_schedule()"><img class="close-course" src="../../Icons/close.png" alt="" srcset=""></a>
        </div>
        <div class="body-course" id="schedule-container">
        <table id="table">
                    <thead id="td-head">
                        <tr>
                           
                            <th style="width: 50px ;">Day</th>
                            <th>Subject</th>
                            <th>Time Start - Time End</th>
                        </tr>
                    </thead>
         
              
          
                   
                </table>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // create
    let openModal = document.querySelector('.modal');
    function open_course(){
        openModal.style.display = "FLEX";


      
        
    
    
    }

    function add_row(){
    alert('add row');
    let form = document.querySelector('#form-sched');
    let container = document.createElement("div");
    container.className = "sched-input";
    container.innerHTML = ` 
                        <input type="text" name="day[]" placeholder="Day: ">  
                        <select name="subject[]" style="width:200px;">
                            <option >Select Option</option>
                            <option value="Lunch Break">Lunch Break</option>
                            <option value="Recess">Recess</option>
                        <?PHP foreach($result_subject as $subject){ ?>  
                            <option value="<?php echo $subject['subject_id'] ?>" ><?php echo $subject['subject_name'] ?></option>
                        <?php } ?>   
                        <input type="time" name="time_in[]">      
                        <input type="time" name="time_out[]">
                        `;

    form.append(container);

}

    function close_course(){
        openModal.style.display ="None";
    } 











    // view schedule 
    let viewModal = document.querySelector('#view-schedule');

    function view_schedule(id){
        viewModal.style.display="flex";

        $.ajax({
            type: "GET",
            url: "view_schedule.php",
            data:{id:id},
            dataType: "json",
            success:function(data){

            console.log(data);
            
            const responseData = data;

            // Access the 'data' array
            const dataArray = responseData.data;

            // Loop through the array and log each 'requirement_name'
            dataArray.forEach(item => {
                const timeIn = item.time_in;
                const timeOut = item.time_out;

                // Function to convert time string to formatted time with AM/PM
                function formatTimeWithAMPM(inputTime) {
                    const [hours, minutes, seconds] = inputTime.split(":").map(Number);
                    const period = hours >= 12 ? 'PM' : 'AM';
                    const hours12 = hours % 12 || 12;
                    return `${hours12}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')} ${period}`;
                }

                // Format time in and time out
                const formattedTimeIn = formatTimeWithAMPM(timeIn);
                const formattedTimeOut = formatTimeWithAMPM(timeOut);



            let table  =  document.querySelector('#table');
            let data  = `
                       <tbody id="data-row" >
                            <tr>
                                <td>${item.day}</td>
                                <td>${item.subject}</td>
                                <td>${formattedTimeIn  + " - " + formattedTimeOut}</td>     
                            </tr>
                        </tbody> 
                        `;
             table.innerHTML += data;
            });
          
        }
        
        });
    
    
    }

    function close_view_schedule(){
        window.location.href = 'schedule.php';
        viewModal.style.display="none";
    }




    


</script>




