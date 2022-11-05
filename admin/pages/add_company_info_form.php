<?php
    if(isset($_POST['btn'])){                  
            $message=$obj_admin->save_company_info($_POST);            
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Add Company Info</h4>
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
    <form name="add_company_info_form" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">                
        <div class="input_wrap">
            <label>Company Name<span class="required_field">*</span></label>
            <input type="text" name="company_name" required placeholder="Company Name">
        </div>
        <div class="input_wrap">
            <label>Company Address:<span class="required_field">*</span></label>
            <input type="text" name="company_address" required placeholder="Company Address">
        </div>
        <div class="input_wrap">
            <label>Company Contact No.:</label>
            <input type="text" name="company_contact" required placeholder="Contact No.">
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