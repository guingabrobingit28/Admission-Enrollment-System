<?php 
require_once 'account_backend.php';

if(isset($_POST['src-submit'])){
    $search_name = $_POST['search_name'];
    $admission_list = new Show_Inquiries();
    $result_pending = $admission_list->Search_Pending_Inquiries($search_name);
}else{
    $admission_list = new Show_Inquiries();
    $result_pending = $admission_list->Show_Pending_Inquiries();
}


?>

<div class="admission-application-container">
    <div class="sub-admission-container">
        <div class="admission-header">
            <label for="">Student Account</label>
   
        </div>
        <div class="admission-content">
            <div class="admission-content-header">
                <div class="label-container">
                    <label for="">Account List</label>
                </div> 
                <form action="account.php" method="POST">
                    <input type="text" name="search_name" placeholder="Search Name: ">
                    <button type="submit" name="src-submit">Filter</button>
                </form>
            </div>
            <div class="admission-content-body">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5em;">ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>User Type</th>
                            <th>Action</th>
                            <th>Status</th>
                          
                        </tr>
                    </thead>
                    <?php foreach($result_pending  as $data){?>
                    <tbody>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['password']; ?></td>
                            <td><?php echo $data['user_type']; ?></td>
                            <td><a href=""><img class="switch" src="../../Icons/switch-on.png" alt="" srcset=""></a></td>
                            <td><?php echo $data['status']; ?></td>
                         

                        </tr>
                    </tbody>
                    <?php  } ?>
                </table>
            </div>
        </div> 
    </div> 
</div>
<!-- MODAL -->
<div class="modal">
    <div class="modal-container">
        <div class="modal-header">
            <label for="">INQUIRE</label>
            <a href="javascript: close_message()"><img src="../../Icons/close.png" ></a>
        </div>
        <div class="modal-body">
            <label id="name">Ejhay Gofredo</label>
            <p id="message-content"></p>
        </div>
    </div>
</div>

<script>
    let openModal = document.querySelector('.modal');
    function open_messages(name,messages,id){
        
        let a = document.querySelector('#message-content');
        let b = document.querySelector('#name');
        let message = messages;
        let Uname = name;
        openModal.style.display ="Flex";
        a.textContent = message;
        b.textContent = Uname;
        console.log(id);

        // UPDATE STATUS USING AJAX

        $.ajax({
        type: "GET",
        url: "update_inquiry.php",
        data: {
         idd : id,
        },dataType: "json",
        success:function(data){

       
        }
    });


    
    }



    function close_message(){
        openModal.style.display ="None";
    } 
</script>




