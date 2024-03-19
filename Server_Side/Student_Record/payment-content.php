<?php 
require_once 'student-backend.php';

if(isset($_POST['src-submit'])){
    $search_name = $_POST['search_name'];
    $admission_list = new Student_Record();
    $result_pending = $admission_list->Search_Show_Payment($search_name);
}else{
    $admission_list = new Student_Record();
    $result_pending = $admission_list->Show_Payment();
}

if(isset($_POST['submit-update'])){
    $items = $_POST['requirements'];
    $id = $_POST['id'];
    $remark = $_POST['remark'];
    $update = new Student_Record();
    $result_update = $update->update_requirements($id,$items,$remark);

    if($result_update == 200){
        echo "
        <script>alert('Requirement Updated Successfully')
            window.location.href='requirement.php';
        </script>";
    }else{
        echo "
        <script>alert('ERROR')
            window.location.href='requirement.php';
        </script>";
    }
}



if(isset($_POST['sub-update'])){

    $id = $_POST['id'];
    $paid = $_POST['paid'];
    $amount = $_POST['amount']; 

    $update = new Student_Record();
    $result_update = $update->Update_Payment($id,$paid,$amount);

    if($result_update == 200){
        echo "
        <script>alert('Payment Updated Successfully')
            window.location.href='payment.php';
        </script>";
    }else{
        echo "
        <script>alert('ERROR')
            window.location.href='payment.php';
        </script>";
    }

}


?>
<div class="admission-application-container">
    <div class="sub-admission-container">
        <div class="admission-header">
            <label for="">Student Payment</label>
            
        </div>
        <div class="admission-content">
            <div class="admission-content-header">
                <div class="label-container">
          
             
                </div> 
                <form action="payment.php" method="POST">
                    <input type="text" name="search_name" placeholder="Search Name: ">
                    <button type="submit" name="src-submit">Filter</button>
                </form>
            </div>
            <div class="admission-content-body">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5em;">Transaction ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Semester</th>
                            <th>Year</th>
                            <th>Amount</th>
                            <th>Balance</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php foreach($result_pending  as $data){?>
                    <tbody>
                        <tr>
                            <td><?php echo $data['payment_id']; ?></td>
                            <td><?php echo $data['firstName'] . " " . $data['lastName']  ?></td>
                            <td><?php echo $data['date']; ?></td>
                            <td><?php echo $data['Sem']; ?></td>
                            <td><?php echo $data['Year']; ?></td>
                            <td><?php echo $data['payment']; ?></td>
                            <td><?php echo $data['balance']; ?></td>
                            <td><a href="javascript: view_requirements('<?php echo $data['payment_id'] ?>','<?php echo $data['balance']; ?>','<?php echo $data['payment']; ?>');"><img class="view" src="../../Icons/add.png"></a></td>
                            <td><?php echo $data['status']; ?></td>
                        </tr>
                    </tbody>
                    
                    <?php  } ?>
                </table>
            </div>
        </div>

    </div>
  
</div>
<!-- view -->
<div class="modal">
    <div class="modal-container"> 
        <div class="header-course">
            <label for="">ADD PAYMENT</label>
             <a href="javascript: close_course()"><img class="close-course" src="../../Icons/close.png" alt="" srcset=""></a>
        </div>
        <div class="body-course">  
            <form action="payment.php" method="post">
                    <label for="">Balance: <span id="balance">500</span></label>
                    <input type="text" name="id" id="user_id" hidden>
                    <input type="text" name="paid" id="paid" hidden> 
                    <input type="text" placeholder="Enter Amount: " name="amount">
                    <button type="submit" name="sub-update">UPDATE</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
     

     let openModal = document.querySelector('.modal');
    function view_requirements(id,balance,paid){

        document.querySelector('#user_id').value = id;
        document.querySelector('#balance').innerHTML = balance;
        document.querySelector('#paid').value = paid;



        
        openModal.style.display ="Flex";
    }

    function close_course(){
        openModal.style.display = "None";
    }


</script>