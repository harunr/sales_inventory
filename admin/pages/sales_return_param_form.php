<?php
require_once '../classes/admin.php';
$obj_admin=new Admin();
$sales_detail_id=0;
$purchase_detail_id=0;
$product_id=0;
    
    if(isset($_GET['sales_detail_id']))   {
        $query_result=$obj_admin->select_sales_detail_by_sales_id($_GET['sales_detail_id']);
        $row=mysqli_fetch_assoc($query_result);
        $sales_detail_id=$row['sales_detail_id'];
        $purchase_detail_id=$row['purchase_detail_id'];
        $product_id=$row['product_id'];
    }    
?>
<div class="common_wrap">
    <div class="common_title center_align">
        <h2>Return Sales Information</h2>
    </div>
    <form action="" method="get" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>Search Sales Detail Id:<span class="required_field">*</span></label>
            <input type="text" name="sales_detail_id" required>
        </div>        
        <div class="input_wrap">
            <label>&nbsp;</label>
            <input type="submit" name="btn" value="Search">
        </div>
    </form>
    <?php include './pages/sales_return_info_content.php';?>    