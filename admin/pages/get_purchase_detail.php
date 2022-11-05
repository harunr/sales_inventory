<?php
$purchase_detail_id=$_GET['text'];
$result=$obj_admin->purchase_detail_by_ajax($purchase_detail_id);
$purchase_detail_info=mysqli_fetch_assoc($result);
?>