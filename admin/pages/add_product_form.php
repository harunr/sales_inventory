<?php
    $result=$obj_admin->select_all_product_category();
    if(isset($_POST['btn']))
    {$message=$obj_admin->save_product_info($_POST,$_FILES);}
    if(!isset($_POST['btn']))
    {$message='Enter valid data';}    

?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Add Product List</h4>
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
            <label>Product Category:<span class="required_field">*</span></label>
            <select name="product_cat_id" required exclude=" ">
                <option value=" ">Select Product Category.....</option>
                <?php
                    while ($row=  mysqli_fetch_assoc($result))
                    {
                ?>
                <option value="<?php echo $row['product_cat_id']?>"><?php echo $row['product_cat_id'].' '.$row['product_cat_name']?></option>
                <?php }?>
            </select>
        </div>
        <div class="input_wrap">
            <label>Product Code:<span class="required_field">*</span></label>
            <input type="text" name="product_code" required  maxlength="100" placeholder="Product Code">
        </div>
        <div class="input_wrap">
            <label>Product Name:<span class="required_field">*</span></label>
            <input type="text" name="product_name" required  maxlength="100" placeholder="Product Name">
        </div>
        <div class="input_wrap">
            <label>Reorder Level:<span class="required_field">*</span></label>
            <input type="text" name="rol_qty" required regexp="JSVAL_RX_NUMERIC" err="Please Enter Valid Number" placeholder="Reorder Level" maxlength="5">
        </div>
        <div class="input_wrap">
            <label>Quantity Stock:<span class="required_field">*</span></label>
            <input type="text" name="qty_stock" required regexp="JSVAL_RX_NUMERIC" err="Please Enter Valid Number" placeholder="Stock in Hand" maxlength="10">
        </div>
        <div class="input_wrap image_display_wrap">
            <label>Product Image:<span class="required_field">*</span></label>
            <input type="file" name="product_image" id="files">
            <output id="list"></output>
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