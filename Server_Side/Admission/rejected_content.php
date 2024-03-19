<?php 
require_once 'admission_backend.php';

if(isset($_POST['src-submit'])){
    $search_name = $_POST['search_name'];
    $admission_list = new Show_admission();
    $result_pending = $admission_list->Search_rejected_admission($search_name);
}else{
    $admission_list = new Show_admission();
    $result_pending = $admission_list->Show_rejected_admission();
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
                        <select id="destinationSelect" onchange="redirect()">
                            <option value="" selected disabled>FILTER</option>
                            <option value="admission.php">Pending</option>
                            <option value="accepted.php">Accepted</option>
                            <option value="rejected.php">Rejected</option>
                        </select> 
                </div> 
                <form action="rejected.php" method="POST">
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
                            <th colspan="1" >Update</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php foreach($result_pending  as $data){?>
                    <tbody>
                        <tr>
                            <td><?php echo $data['admission_id']; ?></td>
                            <td><?php echo $data['first_name'] . " " . $data['last_name']  ?></td>
                            <td><?php echo $data['bod']; ?></td>
                            <td><a href="admission_view.php?id=<?php echo $data['id'] ?>" target="_blank"><img class="action-icons" src="../../Icons/view.png"></a></td>
                            <td>
                                <a href="admission_update.php?update_accept=<?php echo $data['admission_id'] ?>"><img class="action-icons cross" src="../../Icons/done.png"></a>
                            </td>
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
<script>
    function redirect() {
      var selectedOption = document.getElementById('destinationSelect').value;
      if (selectedOption) {
        window.location.href = selectedOption;
      }
    }
  </script>
