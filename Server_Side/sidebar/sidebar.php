<div class="sidebar-container">
    <div class="sidebar-header">
        <img id="user-icons" src="../../Icons/admin.png" alt="">
        <p id="user_email">Admin</p>
    </div>
    <div class="sidebar-content">
        <ul >
            <li><a href="../home/home.php"><img class="nav-icons" src="../../icons/dashboard.png" >Dashboard</a></li>
            <li><a href="#" id="transaction"><img class="nav-icons" src="../../icons/transaction.png" >Application<img class="right-arrow" id="arr-ryt" src="../../icons/right-arrow.svg" ></a>
                <ul  class="sub-transaction" id="sub-transaction">
                    <li style="border: none;"><a href="../Admission/admission.php">Admission</a></li>
                    <li style="border: none;"><a href="../Enrollment/enrollment.php">Enrollment</a></li>
                    
                </ul>
            </li>
            <li><a href="#" id="Maintinance"><img id="sub-transaction-img" class="nav-icons" src="../../icons/transaction.png" >Student Record<img class="right-arrow " id="arr-maintinance"  src="../../icons/right-arrow.svg" ></a>
                <ul  class="sub-transaction" id="sub-maintinance">
                    <li style="border: none;"><a href="../../Server_Side/Student_Record/student.php">Student</a></li>
                    <!-- <li style="border: none;"><a href="../../Server_Side/Student_Record/payment.php">Payment</a></li> -->
                    <li style="border: none;"><a href="../../Server_Side/Student_Record/requirement.php">Requirement</a></li>
                    <!-- <li style="border: none;"><a href="../../Server_Side/Student_Record/cor.php">COR</a></li> -->
                </ul>
            </li>
            <li><a href="../Inquiry/inquiry.php"><img class="nav-icons" src="../../icons/conversation.png" >Inquiry</a></li>
            <li><a href="../Public/public.php"><img class="nav-icons" src="../../icons/copy-writing.png" >Public</a></li>
            <li><a href="../Report/report.php"><img class="nav-icons" src="../../icons/report.png" >Reports</a></li>
            <li><a href="../Setting/setting.php"><img class="nav-icons" src="../../icons/setting.png" >Settings</a></li>
            <li><a href="../../User_Entry/Logout.php?id=<?php echo $_SESSION['id'] ?>"><img class="nav-icons" src="../../icons/exit.png" >Logout</a></li>
        </ul>
    </div>
  
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src='sidebar.js'></script>

