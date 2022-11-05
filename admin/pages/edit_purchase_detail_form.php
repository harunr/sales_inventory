<?php
    $result=$obj_admin->select_purchase_detail_by_id($purchase_detail_id);
    $purchase_detail_info= mysqli_fetch_assoc($result);    
    if(isset($_POST['btn']))
    {
        $obj_admin->update_purchase_detail_info($_POST);        
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Edit Purchase Detail</h4>
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
    <form name="edit_purchase_detail" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        
        <div class="input_wrap">
            <label>Purchase Id:<span class="required_field">*</span></label>
            <input type="text" name="purchase_id" value="<?php echo $purchase_detail_info['purchase_id']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC">
            <input type="hidden" name="purchase_detail_id" value="<?php echo $purchase_detail_info['purchase_detail_id']?>">
        </div>
        <div class="input_wrap">
            <label>Product Id:<span class="required_field">*</span></label>
            <input type="text" name="product_id" value="<?php echo $purchase_detail_info['product_id']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC">
        </div>
        <div class="input_wrap">
            <label>Shipment Cost:<span class="required_field">*</span></label>
            <input type="text" name="shipment_cost" value="<?php echo $purchase_detail_info['shipment_cost']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC">            
        </div>
        <div class="input_wrap">
            <label>Other Cost:<span class="required_field">*</span></label>
            <input type="text" name="others_cost" value="<?php echo $purchase_detail_info['others_cost']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC">
        </div>
        <div class="input_wrap">
            <label>Total Amount:<span class="required_field">*</span></label>
            <input type="text" name="product_cost" value="<?php echo $purchase_detail_info['product_cost']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC">            
        </div>
        <div class="input_wrap">
            <label>Vat Rate:</label>            
            <input type="text" name="vat_rate" value="<?php echo $purchase_detail_info['vat_rate']?>">
        </div>
        <div class="input_wrap">
            <label>Qty Purchased:</label>            
            <input type="text" name="qty_purchased" value="<?php echo $purchase_detail_info['qty_purchased']?>">
        </div>
        <div class="input_wrap">
            <label>Qty Remaining:</label>            
            <input type="text" name="qty_remain" value="<?php echo $purchase_detail_info['qty_remain']?>">
        </div>
        <div class="input_wrap">
            <label>Unit Cost:</label>            
            <input type="text" name="unit_cost" value="<?php echo $purchase_detail_info['unit_cost']?>">
        </div>
        <div class="input_wrap">
            <label>Unit Price:</label>            
            <input type="text" name="unit_price" value="<?php echo $purchase_detail_info['unit_price']?>">
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
    document.forms['edit_purchase_detail'].elements['status'].value = '<?php echo $purchase_detail_info['status'] ?>';    
</script>