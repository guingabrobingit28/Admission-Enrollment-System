<?php 
require_once 'admission_backend.php';

if(isset($_POST['src-submit'])){
    $search_name = $_POST['search_name'];
    $admission_list = new Show_admission();
    $result_pending = $admission_list->Search_Pending_admission($search_name);
}else{
    $admission_list = new Show_admission();
    $result_pending = $admission_list->Show_Pending_admission();
}


?>
<div class="admission-application-container">
    <div class="sub-admission-container">
        <div class="admission-header">
            <label for="">List of Admission Application</label>
            
        </div>
        <div class="admission-content">
            <div class="admission-content-header">
                <div class="label-container">
          
             
                </div> 
                <form action="admission.php" method="POST">
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
                            <th>Date</th>
                            <th>Content</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php foreach($result_pending  as $data){?>
                    <tbody>
                        <tr>
                            <td><?php echo $data['admission_id']; ?></td>
                            <td><?php echo $data['firstName'] . " " . $data['lastName']  ?></td>
                            <td><?php echo $data['Bod']; ?></td>
                            <td><a href="admission_view.php?id=<?php echo $data['id'] ?>&&admission_id=<?php echo $data['admission_id'] ?>" target="_blank">
                            <?php if($data['status'] == 'Pending'){ ?>
                            <img class="action-icons" src="../../Icons/view.png"></a></td>
                            <?php }else{ ?>
                            <img class="action-icons" src="../../Icons/open_email.png"></a></td>
                            <?php } ?>
                            <td><?php echo $data['status']; ?></td>
                        </tr>
                    </tbody>
                    
                    <?php  } ?>
                </table>
            </div>
        </div>

    </div>
    <!-- modal -->
    <div class="modal-containe">

    </div>
</div>
