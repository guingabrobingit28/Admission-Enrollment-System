<?php 
include "view_schedule.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $name = $_GET['name'];
    $select_schedule = new Schedule();
    $result_schedule  = $select_schedule->View_Schedule($id);

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
        <label ><?php echo $name; ?> Schedule </label>
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
            </tr>
        </tbody>
        <?php } ?>
        </div>
    </table> 
</div>
</body>
</html>