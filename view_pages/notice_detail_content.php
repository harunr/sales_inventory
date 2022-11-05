<?php
    $query_result=$obj_welcome->select_notice_by_id($notice_id);
    $notice_detail=mysqli_fetch_assoc($query_result);
?>
<div class="notice_detail">
    <div class="common_description">
        <h2><?php echo $notice_detail['notice_title'];?></h2>
        <?php echo $notice_detail['notice_long_description'];?>
    </div>
    <div class="home_link">
        <a href="index.php">Back</a>
    </div>
</div>