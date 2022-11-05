<?php
    $result=$obj_admin->select_product_info_by_id($product_id);
    $cat_list=$obj_admin->select_all_product_category();    
    $product_info= mysqli_fetch_assoc($result);
    if(isset($_POST['btn']))
    {
        $obj_admin->update_product_info($_POST);        
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Edit Product List</h4>
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
    <form name="edit_product_list" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>Product Name:<span class="required_field">*</span></label>
            <input type="text" name="product_name" value="<?php echo $product_info['product_name']?>" maxlength="200" required>
            <input type="hidden" name="product_id" value="<?php echo $product_info['product_id']?>">
        </div>
        <div class="input_wrap">
        <label>Product Category:</label>
            <select name="product_cat_id" required exclude=" ">            
                <?php
                    while ($row=  mysqli_fetch_assoc($cat_list))
                    {
                ?>
                <option value="<?php echo $row['product_cat_id']?>"><?php echo $row['product_cat_id'].' '.$row['product_cat_name']?></option>                
                <?php }?>                
            </select>            
        </div>
        <div class="input_wrap">
            <label>Reorder Level:<span class="required_field">*</span></label>
            <input type="text" name="rol_qty" value="<?php echo $product_info['rol_qty']?>" maxlength="4" required regexp="JSVAL_RX_NUMERIC" err="Please Enter Valid ROL Number">
        </div>
        <div class="input_wrap">
            <label>Quantity Stock:<span class="required_field">*</span></label>
            <input type="text" name="qty_stock" value="<?php echo $product_info['qty_stock']?>" maxlength="11" required regexp="JSVAL_RX_NUMERIC" err="Please Enter Valid Stock Number">
        </div>        
        <div class="input_wrap">
            <label>Product Image:</label>        
            <div class="image_wrap">
                <img src="<?php echo $product_info['product_image']?>" alt="Image">
            </div>
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
    document.forms['edit_product_list'].elements['product_cat_id'].value = '<?php echo $product_info['product_cat_id'] ?>';
    document.forms['edit_product_list'].elements['status'].value = '<?php echo $product_info['status'] ?>';
</script>