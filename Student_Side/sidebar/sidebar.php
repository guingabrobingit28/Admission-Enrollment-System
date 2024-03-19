<div class="sidebar-container">
    <div class="sidebar-header">
        <img id="user-icons" src="../../Icons/student.png" alt="">
        <p id="user_email"><?php echo $_SESSION['Student_name'] ?></p>
    </div>
    <div class="sidebar-content">
        <ul >
            <li><a href=""><img class="nav-icons" src="../../icons/dashboard.png" >Dashboard</a></li>
            <!-- <li><a href="#" id="admission"><img class="nav-icons" src="../../icons/transaction.png" >Admission<img class="right-arrow" src="../../icons/right-arrow.svg" ></a>
                <ul  class="sub-admission">
                    <li style="border: none;"><a href="../Admission/admission.php">Admission Form</a></li>
                    <li  style="border: none;" ><a href="">History</a></li>
                </ul>
            </li> -->
            <li><a href="../Admission/admission.php"><img class="nav-icons" src="../../icons/setting.png" >Admission</a></li>
            <!-- <li><a href="#" id="transaction"><img class="nav-icons" style="margin: 0 .5em 0 .8em;" src="../../icons/transaction.png" >Enrollment<img class="right-arrow" src="../../icons/right-arrow.svg" ></a>
                <ul  class="sub-transaction">
                    <li style="border: none;"><a href="../Admission/admission.php">Enrollment Form</a></li>
                    <li  style="border: none;" ><a href="">History</a></li>
                </ul>
            </li> -->
            <li><a href="../Admission/admission.php"><img class="nav-icons" src="../../icons/setting.png" >Enrollment</a></li>
            <li><a href="../Setting/setting.php"><img class="nav-icons" src="../../icons/setting.png" >Settings</a></li>
            <li><a href="../../Client_Side/Student_Entry/student_logout.php?id=<?php echo $_SESSION['Student_name'] ?>" ><img class="nav-icons" src="../../icons/exit.png" >Logout</a></li>
        </ul>
    </div>
  
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


