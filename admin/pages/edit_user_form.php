<?php
    $result=$obj_admin->select_user_by_id($user_id);
    $user_info=mysqli_fetch_assoc($result);

    if(isset($_POST['btn']))
    {
        $obj_admin->update_user($_POST);        
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Edit Admin User</h4>
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
    <form name="edit_user" action="" method="post" enctype="multipart/form-data">
        <div class="input_wrap">
            <label>Admin Name:<span class="required_field">*</span></label>
            <input type="text" name="admin_name" value="<?php echo $user_info['admin_name']?>">
            <input type="hidden" name="admin_id" value="<?php echo $user_info['admin_id']?>">
        </div>
        <div class="input_wrap">
            <label>Admin Email Address:<span class="required_field">*</span></label>
            <input type="text" name="admin_email_address" value="<?php echo $user_info['admin_email_address']?>" required required regexp="JSVAL_RX_EMAIL" err="Please Enter Valid Admin Email Address" maxlength="100" placeholder="Admin Email Address">
        </div>
        <div class="input_wrap">
            <label>Admin Password:<span class="required_field">*</span></label>
            <input type="password" name="admin_password" value="<?php echo $user_info['admin_password']?>" required maxlength="5" placeholder="Admin Password">
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
            <input type="submit" name="btn" value="Update">
        </div>
    </form>
</div>
<script type="text/javascript">
    document.forms['edit_user'].elements['access_level'].value = '<?php echo $user_info['access_level'] ?>';
</script>