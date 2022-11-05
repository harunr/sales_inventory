<?php
    $result=$obj_admin->select_product_cat_by_id($product_cat_id);
    $product_cat_info= mysqli_fetch_assoc($result);
    if(isset($_POST['btn']))
    {
        $obj_admin->update_product_cat_info($_POST);        
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Edit Product Category</h4>
    </div>
    <h2>
        <?php
            if(isset($message))
            {   echo $message;
                unset($message);
            }
        ?>
    </h2>
    <form name="edit_product_category" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>Product Category Name:<span class="required_field">*</span></label>
            <input type="text" name="product_cat_name" value="<?php echo $product_cat_info['product_cat_name']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC" err="Please Enter Valid Manufacturer Name" maxlength="100" placeholder="Manufacturer Nmae">
            <input type="hidden" name="product_cat_id" value="<?php echo $product_cat_info['product_cat_id']?>">
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
    document.forms['edit_product_category'].elements['status'].value = '<?php echo $product_cat_info['status'] ?>';
</script>