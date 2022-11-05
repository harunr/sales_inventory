<?php
    $result=$obj_admin->select_manufacturer_by_id($manufact_id);
    $manufact_info= mysqli_fetch_assoc($result);
    if(isset($_POST['btn']))
    {
        $obj_admin->update_manufacturer_info($_POST);        
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Edit Manufacturer</h4>
    </div>
    <h2>
        <?php
            if(isset($message))
            {
                echo $message;
                unset($message);
            }
        ?>
    </h2>
    <form name="edit_manufacturer" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>Manufacturer Name:<span class="required_field">*</span></label>
            <input type="text" name="manufact_name" value="<?php echo $manufact_info['manufact_name']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC" err="Please Enter Valid Manufacturer Name" maxlength="100" placeholder="Manufacturer Nmae">
            <input type="hidden" name="manufact_id" value="<?php echo $manufact_info['manufact_id']?>">
        </div>
        <div class="input_wrap">
            <label>Manufacturer Address:</label>
            <textarea name="manufact_address"><?php echo $manufact_info['manufact_address']?></textarea>
        </div>
        <div class="input_wrap">
            <label>Contact No.:<span class="required_field">*</span></label>
            <input type="text" name="contact_no" value="<?php echo $manufact_info['contact_no']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC" err="Please Enter Valid Contact No." maxlength="100" placeholder="Contact No">
        </div>
        <div class="input_wrap">
            <label>Manufacturer Email:<span class="required_field">*</span></label>
            <input type="text" name="manufact_email" value="<?php echo $manufact_info['manufact_email']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC" err="Please Enter Valid Email address." maxlength="100" placeholder="Email Address">
        </div>
        <div class="input_wrap">
            <label>Status:<span class="required_field">*</span></label>
            <select name="status" required exclude=" ">
                <option value=" ">Select status...</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <div class="input_wrap">
            <label>&nbsp;</label>
            <input type="submit" name="btn" value="Update">
        </div>
        
    </form>
</div>
<script type="text/javascript">
    document.forms['edit_manufacturer'].elements['status'].value = '<?php echo $manufact_info['status'] ?>';
</script>