<?php 
require_once "public_backend.php";

$public_list = new Public_Content();
$result_list  = $public_list ->Show_Public();

?>
<div class="courses-container">
    <div class="bg-courses">
        <label for="" data-aos="fade-left">Public Notice</label>
    </div>
    <div class="courses-content">
        <div class="label-notice">
            <label for="">All Notices</label>
        </div>

        <?php foreach($result_list as $data){?>
        <div class="public-container">
            <div class="pub-img-container">
                <img src="<?php echo $data['public_img']; ?>" alt="">
            </div>
            <div class="pub-con-container">
                <label class="title-pub"><?php echo $data['title']; ?></label>
                <p><?php 
                     date_default_timezone_set('Asia/Manila');
                    echo date('m-d-y H:s A',strtotime($data['posted_date']));
                    ?></p>
                <p class="content-pub"><?php echo $data['public_content']; ?></p>
            </div>
        </div>
        <?php  } ?>

    </div>
</div>