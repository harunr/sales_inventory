<?php
    if(isset($_POST['btn']))
    {$message=$obj_admin->save_manufacturer($_POST);}
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Add Manufacturer</h4>
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
            <label>Manufacturer Name:<span class="required_field">*</span></label>
            <input type="text" name="manufact_name" required maxlength="100" placeholder="Manufacturer Name">
        </div>       
        <div class="input_wrap text_wrap">
            <label>Adress:</label>
            <textarea name="manufact_address"></textarea>
        </div>        
        <div class="input_wrap">
            <label>Contact Number:<span class="required_field">*</span></label>
            <input type="text" name="contact_no" required regexp="JSVAL_RX_NUMERIC" err="Please Enter Valid Contact Number" placeholder="Contact No" maxlength="11">
        </div>
        <div class="input_wrap">
            <label>Manufacturer Email Address:<span class="required_field">*</span></label>
            <input type="text" name="manufact_email" required regexp="JSVAL_RX_EMAIL" err="Please Enter Valid Manufacturer Email Address" maxlength="100" placeholder="Manufacturer Email Address">
        </div>
        <div class="input_wrap">
            <label>&nbsp;</label>
            <input type="submit" name="btn" value="Save">
        </div>
    </form>
</div>
