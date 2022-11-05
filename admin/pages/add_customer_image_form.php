<?php
    $result=$obj_admin->select_all_customer();    
    if(isset($_POST['btn']))
    {$message=$obj_admin->update_customer_image_file($_POST,$_FILES);}
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Add Customer Image</h4>
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
            <label>Customer:<span class="required_field">*</span></label>
            <select name="customer_id" required exclude=" ">
                <option value=" ">Select Customer.....</option>
                <?php
                    while ($row=  mysqli_fetch_assoc($result))
                    {
                ?>
                <option value="<?php echo $row['customer_id']?>"><?php echo $row['customer_id'].' '.$row['first_name'].' '.$row['last_name']?></option>
                <?php }?>
            </select>
        </div>        
        <div class="input_wrap image_display_wrap">
            <label>Customer Image:<span class="required_field">*</span></label>
            <input type="file" name="customer_image" id="files">
            <output id="list"></output>
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