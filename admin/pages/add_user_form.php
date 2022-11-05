<?php
    if(isset($_POST['btn']))
    {$message=$obj_admin->save_user($_POST);}
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Add Admin User</h4>
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
            <label>Admin Name:<span class="required_field">*</span></label>
            <input type="text" name="admin_name" required regexp="JSVAL_RX_ALPHA" err="Please Enter Valide Admin Name" maxlength="100" placeholder="Admin Name">
        </div>
        <div class="input_wrap">
            <label>Admin Email Address:<span class="required_field">*</span></label>
            <input type="text" name="admin_email_address" required regexp="JSVAL_RX_EMAIL" err="Please Enter Valid Admin Email Address" maxlength="100" placeholder="Admin Email Address">
        </div>
        <div class="input_wrap">
            <label>Admin Password:<span class="required_field">*</span></label>
            <input type="password" name="admin_password" required maxlength="5" placeholder="Admin Password">
        </div>
        <div class="input_wrap">
            <label>Access Level:<span class="required_field">*</span></label>
            <select name="access_level" required exclude=" ">
                <option value=" ">Select Access Level...</option>
                <option value="1">Super Admin</option>
                <option value="2">Admin</option>
            </select>
        </div>
        <div class="input_wrap">
            <label>&nbsp;</label>
            <input type="submit" name="btn" value="Save">
        </div>
    </form>
</div>