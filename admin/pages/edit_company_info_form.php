<?php
    $result=$obj_admin->select_company_by_id($id);
    $company_info= mysqli_fetch_assoc($result);
    if(isset($_POST['btn']))
    {
        $obj_admin->update_company_info($_POST);        
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Edit Company Info</h4>
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
    <form name="edit_company_info" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>Company Name:<span class="required_field">*</span></label>
            <input type="text" name="company_name" value="<?php echo $company_info['company_name']?>" required>
            <input type="hidden" name="id" value="<?php echo $company_info['id']?>">
        </div>
        <div class="input_wrap">
            <label>Address:<span class="required_field">*</span></label>
            <input type="text" name="company_address" value="<?php echo $company_info['company_address']?>"  required>
        </div>
        <div class="input_wrap">
            <label>Contact No.:<span class="required_field">*</span></label>
            <input type="text" name="company_contact" value="<?php echo $company_info['company_contact']?>" required>
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
    document.forms['edit_company_info'].elements['status'].value = '<?php echo $company_info['status'] ?>';
</script>