<div class="sidebar-container">
    <div class="sidebar-header">
        <img id="user-icons" src="../../Icons/admin.png" alt="">
        <p id="user_email">Head Admin</p>
    </div>
    <div class="sidebar-content">
        <ul >
            <!-- <li><a href=""><img class="nav-icons" src="../../icons/dashboard.png" >Dashboard</a></li> -->
            <!-- <li><a href="#" id="transaction"><img class="nav-icons" src="../../icons/transaction.png" >Admission<img class="right-arrow" src="../../icons/right-arrow.svg" ></a>
                <ul  class="sub-transaction" id="sub-transaction">
                    <li style="border: none;"><a href="../Admission/admission.php">Pending</a></li>
                    <li style="border: none;"><a href="../Admission/accepted.php">Accepted</a></li>
                    <li style="border: none;"><a href="../Admission/rejected.php">Rejected</a></li>
                    
                </ul>
            </li> -->
            <!-- <li><a href="#" id="Maintinance"><img id="sub-transaction-img" class="nav-icons" src="../../icons/transaction.png" >Maintinance<img class="right-arrow " id="arr-maintinance"  src="../../icons/right-arrow.svg" ></a>
                <ul  class="sub-transaction" id="sub-maintinance">
              
                    <li style="border: none;"><a href="../Course/course.php">Course</a></li>
                    <li style="border: none;"><a href="../Subject/subject.php">Subject</a></li>
                    <li style="border: none;"><a href="../Admission/rejected.php">Schedule</a></li>
                </ul>
            </li> -->
            
            <li><a href="../Schedule/schedule.php"><img class="nav-icons" src="../../Icons/conversation.png" >Schedule</a></li>
            <li><a href="../Section/section.php"><img class="nav-icons" src="../../Icons/skills.png" >Section</a></li>
            <li><a href="../Course/course.php"><img class="nav-icons" src="../../Icons/copy-writing.png" >Course</a></li>
            <li><a href="../Subject/subject.php"><img class="nav-icons" src="../../Icons/copy-writing.png" >Subject</a></li>
            <li><a href="../Setting/setting.php"><img class="nav-icons" src="../../Icons/setting.png" >Settings</a></li>
            <li><a href="../../User_Entry/Logout.php?id=<?php echo $_SESSION['id'] ?>"><img class="nav-icons" src="../../Icons/exit.png" >Logout</a></li>
        </ul>
    </div>
  
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src='sidebar.js'></script>

