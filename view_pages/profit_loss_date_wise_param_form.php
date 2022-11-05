<?php
    require_once './classes/welcome.php';
    $obj_welcome=new Welcome();   
    $profit_loss_date_wise='';
    $date_from='';
    $date_to='';
    $row='';
    if(isset($_POST['btn']))
    {
        $profit_loss_date_wise=$obj_welcome->select_profit_loss_date_wise($_POST);
        $date_from=$_POST['date_from'];
        $date_to=$_POST['date_to'];        
    }
    
?>
<div class="common_wrap front_form_wrap" id="report_param_wrap">
    <div class="common_title">
        <h2>Profit Loss Date Wise</h2>
    </div>
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>Date From:<span class="required_field">*</span></label>
            <input type="date" name="date_from" required>
        </div>
        <div class="input_wrap">
            <label>Date To:<span class="required_field">*</span></label>
            <input type="date" name="date_to" required >
        </div>        
        <div class="input_wrap">
            <label>&nbsp;</label>
            <input type="submit" name="btn" value="Search">
        </div>
    </form>
    <div class="home_link">
        <a href="index.php">Back</a>
    </div>
</div>
<div class="common_wrap">
    <?php include './view_pages/profit_loss_date_wise_info_content.php';?>
</div>