<?php
$sales_detail_id=$_GET['text'];
$sales_details=$obj_admin->select_all_sales_detail($sales_detail_id);
?>
<div class="common_wrap">
        <?php include './pages/add_return_sales_content.php';?>
</div>