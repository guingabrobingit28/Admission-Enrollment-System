<?php 
require_once 'public_backend.php';

error_reporting(0);
// create
if (isset($_POST['submit-post'])) {
    
    $file = $_FILES['file'];
			
    $fileName = $_FILES['file']['name'];
	$fileTmp = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg','jpeg','png', 'svg');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
		    if ($fileSize < 1000000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = '../../Image-Container/'.$fileNameNew;
				move_uploaded_file($fileTmp, $fileDestination);
				}
			}
		}

    $title = $_POST['title'];
    $message = $_POST['pub-message'];
    $public_post= new Public_Content();
    $result_post = $public_post->Insert_Content($title,$message,$fileDestination);

    if($result_post == 200){
        echo "
        <script>
            alert('The Data is already Posted')
            window.location.href = 'public.php'
        </script>";
    }
}

// update
if (isset($_POST['update-post'])) {
    
    $file = $_FILES['file'];
			
    $fileName = $_FILES['file']['name'];
	$fileTmp = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg','jpeg','png', 'svg');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
		    if ($fileSize < 1000000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = '../../Image-Container/'.$fileNameNew;
				move_uploaded_file($fileTmp, $fileDestination);
				}
			}
		}
   
    $current_img = $_POST['currentImage'];
    if($fileDestination == NULL){
        $update_img = $current_img;
    }else{
        $update_img  = $fileDestination;
    }
    
  
    $id = $_POST['id'];
    $title = $_POST['title'];
    $message = $_POST['pub-message'];
    $public_post= new Public_Content();
    $result_post = $public_post->update_Content($id,$title,$message,$update_img);

    if($result_post == 200){
        echo "
        <script>
            alert('Your Post is already updated')
            window.location.href = 'public.php'
        </script>";
    }
}

// delete

if(isset($_GET['post_id'])){
    $post_id= $_GET['post_id'];
    $delete_list = new Public_Content();
    $delete_result  = $delete_list-> delete_Post($post_id);

    if($delete_result == 200){
        echo "
        <script>
            alert('The Data is already Delete')
            window.location.href = 'public.php'
        </script>";
    }
}

// display data

$public_list = new Public_Content();
$result_list  = $public_list ->Show_Public();


?>

<div class="admission-application-container">
    <div class="sub-admission-container">
        <div class="admission-header">
            <label for=""><a href="#" onclick="open_messages()">Create Post</a>
   
        </div>
        <div class="admission-content">
            <div class="admission-content-header">
                <div class="label-container">
                    <label for="">Public Notices</label>
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
                            <th>Title</th>
                            <th>Date TIME</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php foreach($result_list as $data){?>
                    <tbody>
                        <tr>
                            <td><?php echo $data['public_id']; ?></td>
                            <td><?php echo $data['title']; ?></td>
                            <td><?php 
                            date_default_timezone_set('Asia/Manila');
                            echo date('m-d-y H:s A',strtotime($data['posted_date'])); ?></td>
                            <td>
                                <a href="#" onclick="update_messages(
                                '<?php echo $data['public_id']; ?>',
                                '<?php echo $data['public_img']; ?>',
                                '<?php echo $data['title']; ?>',
                                '<?php echo $data['public_content']; ?>')">
                                <img class="act-icons" src="../../Icons/edit.png" alt="" srcset=""></a>
                                <a href="public.php?post_id=<?php echo $data['public_id']; ?>"><img class="act-icons" src="../../Icons/delete.png" alt="" srcset=""></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php  } ?>
                   
                </table>
            </div>
        </div> 
    </div> 
</div>
<!-- CREATE MODAL -->
<div class="modal">
    <div class="modal-container">
        <div class="modal-header">
            <label for="">NEW POST</label>
            <a href="javascript: close_message()"><img src="../../Icons/close.png" ></a>
        </div>
        <div class="modal-body">
            <div class="public-content">
                    <form action="public.php" method="post" enctype="multipart/form-data">
                        <div class="pub-image" id="imageContainer">      
                        </div>
                        <div class="pub-content">
                            <input type="text" name="title" placeholder="Put Your Title here: ">
                            <textarea name="pub-message" id="" cols="30" rows="10" placeholder="Type Text here:"></textarea>
                        </div>      
            </div>
            <div class="public-footer">
                <div class="upload-input">
                    <input type="file" name="file" id="imageInput" accept="image/*" onchange="displayImage()">
                </div>
                <div class="submit-post">
                    <button type="submit" name="submit-post">SUBMIT</button>
                </div>
            </div>
                 </form>
        </div>
    </div>
</div>

<!-- EDIT MODAL -->
<div class="modal" id="update">
    <div class="modal-container">
        <div class="modal-header">
            <label for="">NEW POST</label>
            <a href="javascript: close_update()"><img src="../../Icons/close.png" ></a>
        </div>
        <div class="modal-body">
            <div class="public-content">
                    <form action="public.php" method="post" enctype="multipart/form-data">
                        <div class="pub-image" id="updateContainer">
                            <img src="" alt="" id="con-image">  
                        </div>
                        <div class="pub-content">
                            <input type="text" name="title" placeholder="Put Your Title here: " id="con-title">
                            <textarea name="pub-message" id="con-content" cols="30" rows="10" placeholder="Type Text here:"   ></textarea>
                            
                            <input type="text" name="currentImage" id="current_img" hidden>
                            <input type="text" name="id" id="update_id" hidden>
                        </div>      
            </div>
            <div class="public-footer">
                <div class="upload-input">
           
                    <input type="file" name="file" id="updateInput" accept="image/*" onchange="updateImage(this)">
                </div>
                <div class="submit-post">
                    <button type="submit" name="update-post">SUBMIT</button>
                </div>
            </div>
                 </form>
        </div>
    </div>
</div>
<script>
    // create
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
    
    }

    function close_message(){
        openModal.style.display ="None";
    } 

    function displayImage() {
    var input = document.getElementById('imageInput');
    var imageContainer = document.getElementById('imageContainer');

    // Check if a file is selected
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var imageElement = document.createElement('img');
            imageElement.src = e.target.result;
            imageElement.alt = 'Uploaded Image';
            imageElement.style.width = '100%'; 
            imageElement.style.height = '100%'; 
            imageContainer.innerHTML = '';
            imageContainer.appendChild(imageElement);
        };
        reader.readAsDataURL(input.files[0]);
    }
}



    // update
    let updateModal = document.querySelector('#update');
    function update_messages(Userid,Userimg,Usertitle,Usercontent){
        updateModal.style.display ="Flex";
      
        let id = Userid;
        let img = Userimg;
        let title = Usertitle;
        let content = Usercontent;
        let update_id = document.getElementById('update_id');
        let conImage = document.getElementById('con-image');
        let conContent = document.getElementById('con-content');
        let conTitle = document.getElementById('con-title');
        let current_img = document.getElementById('current_img');

        current_img.value = img;
        update_id.value = id;
        conTitle.value = title;
        conContent.value = content;
        conImage.src=img;
        conImage.style.width = '100%'; 
        conImage.style.height = '100%'; 
        console.log(id);
       
    }

    function updateImage(url) {
    var input = url;
    var imageContainer = document.getElementById('con-image');

    // Check if a file is selected
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            imageContainer.src = e.target.result;
            imageContainer.alt = 'Uploaded Image';
            imageContainer.style.width = '100%'; 
            imageContainer.style.height = '100%'; 
        };
        reader.readAsDataURL(input.files[0]);
    }
}


    function close_update(){
        updateModal.style.display ="None";
    }
</script>




