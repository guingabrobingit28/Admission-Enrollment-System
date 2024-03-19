<?php 
require_once 'report-backend.php';


// create


// update
if (isset($_POST['submit-report'])) {

    $report = $_POST['report'];
    $year = $_POST['year'];
    $sem = $_POST['sem'];
    $gender = $_POST['gender'];
    $section = $_POST['section'];

    $generate_report = new Report();
    $result_report = $generate_report ->Insert_Report($report,$year,$sem,$gender,$section);

    
    if($result_report == 200){
        echo "
        <script>
            alert('The Data is already Generated')
            window.location.href = 'report.php'
        </script>";
    }
    
    
}

// // delete

if(isset($_GET['delete_id'])){
    $id= $_GET['delete_id'];
    $delete_report = new Report();
    $delete_result  = $delete_report->Delete_Report($id);

    if($delete_result == 200){
        echo "
        <script>
            alert('The Data is already Delete')
            window.location.href = 'report.php'
        </script>";
    }
}

$show_report = new Report();
$result_report = $show_report->Show_Report();

$show_section = new Report();
$result_section = $show_section->Show_Section();

?>

<div class="admission-application-container">
    <div class="sub-admission-container">
        <div class="admission-header">
            <label for=""><a href="#" onclick="open_report()">Generate Reports</a>
   
        </div>
        <div class="admission-content">
            <div class="admission-content-header">
                <div class="label-container">
                    <label for="">Reports</label>
                </div> 
                <form action="inquiry.php" method="POST">
                    <input type="text" name="search_name" placeholder="Search Title: ">
                    <button type="submit" name="src-submit">Filter</button>
                </form>
            </div>
            <div class="admission-content-body">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5em;">ID</th>
                            <th>Report</th>
                            <th>Date</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php foreach($result_report as $data){ ?>
                    <tbody>
                        <tr>
                            <td><?php echo $data['report_id']; ?></td>
                            <?php if($data['report_title'] == 'Enrolled Student'){ ?>
                                <td><?php echo $data['report_title'] . " " . $data['year'] . " " . $data['Semester']; if($data['gender'] == 'ALL' ) { echo " " . "All gender"; } else { echo " " . $data['gender']; } if($data['section'] == 'ALL' ) { echo " " . "All Section"; }else { echo " " . $data['section_name']; }; ?></td>
                            <?php } else { ?>
                                <td><?php echo $data['report_title']; if($data['gender'] == 'ALL' ) { echo " " . "All Gender"; } else { echo " " . $data['gender']; }; ?></td>
                            <?php } ?>
                            <td><?php echo  date('M-d-Y',strtotime($data['date'])); ?></td>
                            <?php if($data['report_title'] == 'Admission Student'){ ?>
                            <td>
                                <a href="report-admission.php?type=<?php echo $data['report_title']; ?>&gender=<?php echo $data['gender']; ?>"><img class="act-icons" src="../../Icons/show.png" alt="" srcset=""></a>
                                <a href="report-download-admission.php?type=<?php echo $data['report_title']; ?>&gender=<?php echo $data['gender']; ?>"><img class="act-icons" src="../../Icons/download" alt="" srcset=""></a>
                                <a href="report.php?delete_id=<?php echo $data['report_id']; ?>"><img class="act-icons" src="../../Icons/delete.png" alt="" srcset=""></a>
                            </td>
                            <?php }else{  ?>
                                <td>
                                    <a href="report-enrollment.php?type=<?php echo $data['report_title'];?>&year=<?php echo $data['year']?>&semester=<?php echo $data['Semester'];?>&gen=<?php echo $data['gender']; ?>&section=<?php echo $data['section'];?>"><img class="act-icons" src="../../Icons/show.png" alt="" srcset=""></a>
                                    <a href="report-download-enrollment.php?type=<?php echo $data['report_title'];?>&year=<?php echo $data['year']?>&semester=<?php echo $data['Semester'];?>&gen=<?php echo $data['gender']; ?>&section=<?php echo $data['section'];?>"><img class="act-icons" src="../../Icons/download" alt="" srcset=""></a>
                                    <a href="report.php?delete_id=<?php echo $data['report_id']; ?>"><img class="act-icons" src="../../Icons/delete.png" alt="" srcset=""></a>
                                </td>
                        </tr>
                    </tbody>
                    <?php } }?>
           
                   
                </table>
            </div>
        </div> 
    </div> 
</div>
<!-- CREATE MODAL -->
<div class="modal">
   <div class="report-container">
        <div class="header-report">
            <label for="">Generate Report</label>
            <a href="javascript: close_report()"><img class="close-report" src="../../icons/close.png" alt="" srcset=""></a>
        </div>
        <div class="body-report">
            <form action="report.php" method="post">
            <div class="report-header-row">
           
            </div>
            <div class="report-row">
                <select name="report" id="report-list" onchange="report_list()">
                    <option value="Admission Student">Admission Student</option>
                    <option value="Enrolled Student">Enrolled Student</option>
                </select>
                <select name="year" id="year">
                    <option disabled >Select Year</option>
                    <option value="First Year">First Year</option>
                    <option value="Second Year">Second Year</option>
                    <option value="Third Year">Third Year</option>
                    <option value="Fourth Year">Fourth Year</option>
                </select>
                <select name="sem" id="sem">
                    <option disabled >Select Semester</option>
                    <option value="First Semester">First Semester</option>
                    <option value="Second Semester">Second Semester</option>
                </select>
                <select name="section" id="section">
                    <option disabled >Select Section</option>
                    <option value="ALL">ALL</option>
                    <?php foreach($result_section as $section){ ?>
                    <option value="<?php echo $section['section_id']; ?>"><?php echo $section['section_name']; ?></option>
                    <?php } ?>
                </select>
                <select name="gender" id="gender">
                    <option disabled >Select Gender</option>
                    <option value="ALL">ALL</option>
                    <option value="Male">MALE</option>
                    <option value="Female">FEMALE</option>
                </select>
            </div>
            <div class="report-row">
               
            </div>
            <div class="report-btn-row">
                <button type="submit" name="submit-report">Generate</button>
            </div>
            </form>
        </div>
   </div>
</div>


<script>
    // create
    let openModal = document.querySelector('.modal');
    function open_report(){
        openModal.style.display ="Flex";
    
    
    }

    function close_report(){
        openModal.style.display ="None";
    } 

    function report_list(){

        let list = document.querySelector('#report-list').value;
        let year = document.querySelector('#year');
        let sem = document.querySelector('#sem');
        let section = document.querySelector('#section');
        // let gender = document.querySelector('#gender');

        if(list == 'Admission Student'){
            year.style.display="NONE";
            sem.style.display="NONE";
            section.style.display="NONE";

        }else if(list == 'Enrolled Student'){
           
            year.style.display="FLEX";
            sem.style.display="FLEX";
            section.style.display="FLEX";

        }

    }

</script>




