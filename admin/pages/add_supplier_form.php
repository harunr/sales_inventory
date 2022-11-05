<?php
    $result=$obj_admin->select_all_manufacturer();    
    if(isset($_POST['btn']))
    {$message=$obj_admin->save_supplier_info($_POST,$_FILES);}
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Add Supplier</h4>
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
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>Manufacturer:<span class="required_field">*</span></label>
            <select name="manufact_id" required exclude=" ">
                <option value=" ">Select Manufacturer.....</option>
                <?php
                    while ($row=  mysqli_fetch_assoc($result))
                    {
                ?>
                <option value="<?php echo $row['manufact_id']?>"><?php echo $row['manufact_id'].' '.$row['manufact_name']?></option>
                <?php }?>
            </select>
        </div>
        <div class="input_wrap">
            <label>First Name:<span class="required_field">*</span></label>
            <input type="text" name="first_name" placeholder="First Name" maxlength="50" required>
        </div>
        <div class="input_wrap">
            <label>Last Name:<span class="required_field">*</span></label>
            <input type="text" name="last_name" placeholder="Last Name" maxlength="50" required>
        </div>
        <div class="input_wrap">
            <label>Email Address:<span class="required_field">*</span></label>
            <input type="email" name="email_address" placeholder="Email Address" maxlength="100" required regexp="JSVAL_RX_EMAIL" err="Please Enter Valid Email Address">
        </div>
        <div class="input_wrap">
            <label>Address:</label>
            <textarea name="address"></textarea>
        </div>
        <div class="input_wrap">
            <label>Date of Birth:<span class="required_field">*</span></label>
            <input type="date" name="date_of_birth" required regexp="JSVAL_RX_DATE" err="Please Enter Valid Date of Birth">
        </div>
        <div class="input_wrap">
            <label>Contact Number:<span class="required_field">*</span></label>
            <input type="text" name="contact_no" required regexp="JSVAL_RX_NUMERIC" err="Please Enter Valid Contact Number" placeholder="Contact No" maxlength="11">
        </div>
        <div class="input_wrap image_display_wrap">
            <label>Supplier Image:<span class="required_field">*</span></label>
            <input type="file" name="supplier_image" id="files">
            <output id="list"></output>
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
            <input type="text" name="city" maxlength="50" placeholder="City">
        </div>
        <div class="input_wrap">
            <label>Country:</label>
            <input type="text" name="country" maxlength="50" placeholder="Country">
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
            <input type="submit" name="btn" value="Save">
        </div>
    </form>
</div>
<script>
    document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>