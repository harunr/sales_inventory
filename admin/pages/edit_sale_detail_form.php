<?php
    $result=$obj_admin->select_sales_detail_by_sales_id($sales_detail_id);
    $sales_detail_info= mysqli_fetch_assoc($result);    
    if(isset($_POST['btn']))
    {
        $obj_admin->update_sale_detail_info($_POST);        
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Edit Sale Detail</h4>
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
    <form name="edit_sale_detail" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        
        <div class="input_wrap">
            <label>Sales Id:<span class="required_field">*</span></label>
            <input type="text" name="sales_id" value="<?php echo $sales_detail_info['sales_id']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC">
            <input type="hidden" name="sales_detail_id" value="<?php echo $sales_detail_info['sales_detail_id']?>">
        </div>
        <div class="input_wrap">
            <label>Product Id:<span class="required_field">*</span></label>
            <input type="text" name="product_id" value="<?php echo $sales_detail_info['product_id']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC">
            <input type="hidden" name="sales_id" value="<?php echo $sales_detail_info['sales_id']?>">
        </div>
        <div class="input_wrap">
            <label>Unite Price:<span class="required_field">*</span></label>
            <input type="text" name="unit_price" value="<?php echo $sales_detail_info['unit_price']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC">
            <input type="hidden" name="qty_sold" value="<?php echo $sales_detail_info['qty_sold']?>">
        </div>
        </div>
        <div class="input_wrap">
            <label>Qty Sold:<span class="required_field">*</span></label>
            <input type="text" name="qty_sold" value="<?php echo $sales_detail_info['qty_sold']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC">            
        </div>
        <div class="input_wrap">
            <label>Total Amount:<span class="required_field">*</span></label>
            <input type="text" name="total_amnt" value="<?php echo $sales_detail_info['total_amnt']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC">
        </div>
        <div class="input_wrap">
            <label>Vat Amount:</label>            
            <input type="text" name="vat_amnt" value="<?php echo $sales_detail_info['vat_amnt']?>">
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
    document.forms['edit_sale_detail'].elements['status'].value = '<?php echo $sales_detail_info['status'] ?>';    
</script>