<?php
    $result=$obj_admin->select_all_manufacturer();
    if(isset($_POST['btn']))
    {$message=$obj_admin->save_product_category_info($_POST);}
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Add Product Category</h4>
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
            <label>Product Category Name:<span class="required_field">*</span></label>
            <input type="text" name="product_cat_name" required err="Please Enter Valid Product Category Name" maxlength="100" placeholder="Product Category Name">
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