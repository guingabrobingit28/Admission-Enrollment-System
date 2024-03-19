<?php 
require_once 'inquiry_backend.php';

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
            <label for="">List of Inquiries</label>
   
        </div>
        <div class="admission-content">
            <div class="admission-content-header">
                <div class="label-container">
                    <label for="">Inquiries</label>
                </div> 
                <form action="inquiry.php" method="POST">
                    <input type="text" name="search_name" placeholder="Search Name: ">
                    <button type="submit" name="src-submit">Filter</button>
                </form>
            </div>
            <div class="admission-content-body">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5em;">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Date</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php foreach($result_pending  as $data){?>
                    <tbody>
                        <tr>
                            <td><?php echo $data['id_inquiry']; ?></td>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo $data['contact']; ?></td>
                            <td><?php echo $data['date_inquiry']; ?></td>
                            <td><a href="#" onclick="open_messages('<?php echo $data['name']; ?>','<?php echo $data['messages']; ?>',<?php echo $data['id_inquiry']; ?>)">
                            <?php if($data['inquiry_status'] == 'Pending'){ ?>
                            <img id="view"  src="../../Icons/view.png" alt="" srcset="">
                                <?php }ELSE { ?>
                                    <img id="view"  src="../../Icons/open_email.png" alt="" srcset="">
                                    <?PHP } ?>
                            </a></td>
                            <td><?php echo $data['inquiry_status']; ?></td>
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




