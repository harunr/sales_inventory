<?php
    $result=$obj_admin->select_customer_info_by_id($customer_id);
    $customer_info= mysqli_fetch_assoc($result);
    if(isset($_POST['btn']))
    {
        $obj_admin->update_customer_info($_POST);        
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Edit Customer</h4>
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
    <form name="edit_customer" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>First Name:<span class="required_field">*</span></label>
            <input type="text" name="first_name" value="<?php echo $customer_info['first_name']?>" maxlength="50" required>
            <input type="hidden" name="customer_id" value="<?php echo $customer_info['customer_id']?>">
        </div>
        <div class="input_wrap">
            <label>Last Name:<span class="required_field">*</span></label>
            <input type="text" name="last_name" value="<?php echo $customer_info['last_name']?>" maxlength="50" required>
        </div>
        <div class="input_wrap">
            <label>Email Address:<span class="required_field">*</span></label>
            <input type="email" name="email_address" value="<?php echo $customer_info['email_address']?>" maxlength="100" required regexp="JSVAL_RX_EMAIL" err="Please Enter Valid Email Address">
        </div>
        <div class="input_wrap">
            <label>Address:</label>
            <textarea name="address"><?php echo $customer_info['address']?></textarea>
        </div>
        <div class="input_wrap">
            <label>Date of Birth:<span class="required_field">*</span></label>
            <input type="date" name="date_of_birth" value="<?php echo $customer_info['date_of_birth']?>" required regexp="JSVAL_RX_DATE" err="Please Enter Valid Date of Birth">
        </div>
        <div class="input_wrap">
            <label>Contact Number:<span class="required_field">*</span></label>
            <input type="text" name="contact_no" value="<?php echo $customer_info['contact_no']?>" required regexp="JSVAL_RX_NUMERIC" err="Please Enter Valid Contact Number" maxlength="11">
        </div>
        <div class="input_wrap">
            <label>Customer Image:</label>        
            <div class="image_wrap">
                <img src="<?php echo $customer_info['customer_image']?>" alt="Image">
            </div>
        </div>
        <div class="input_wrap">
            <label>Gender:<span class="required_field">*</span></label>
            <select name="gender" required exclude=" ">
                <option value=" ">Select Gender...</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="input_wrap">
            <label>City:</label>
            <input type="text" name="city" value="<?php echo $customer_info['city']?>" maxlength="50">
        </div>
        <div class="input_wrap">
            <label>Country:</label>
            <input type="text" name="country" value="<?php echo $customer_info['country']?>" maxlength="50">
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
    document.forms['edit_customer'].elements['gender'].value = '<?php echo $customer_info['gender'] ?>';
    document.forms['edit_customer'].elements['status'].value = '<?php echo $customer_info['status'] ?>';
</script>