<?php
    $result=$obj_admin->select_all_return_sale_by_id($id);        
    $sale_return_info= mysqli_fetch_assoc($result);
    if(isset($_POST['btn']))
    {
        $obj_admin->update_return_sale_info($_POST);        
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Edit Return Sale</h4>
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
    <form name="edit_return_sale" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">                       
            <input type="hidden" name="id" value="<?php echo $sale_return_info['id']?>">
        </div>        
        <div class="input_wrap">
            <label>Sales Detail Id:<span class="required_field">*</span></label>
            <input type="text" name="sales_detail_id" value="<?php echo $sale_return_info['sales_detail_id']?>" maxlength="8" required>
        </div>
        <div class="input_wrap">
            <label>Product Id</label>
            <input type="text" name="product_id" value="<?php echo $sale_return_info['product_id']?>" maxlength="100" required>
        </div>        
        <div class="input_wrap">
            <label>Purchase Detail _id:<span class="required_field">*</span></label>
            <input type="text" name="purchase_detail_id" value="<?php echo $sale_return_info['purchase_detail_id']?>" maxlength="8" required>
        </div>
        <div class="input_wrap">
            <label>Qty Returned:<span class="required_field">*</span></label>
            <input type="text" name="qty_return" value="<?php echo $sale_return_info['qty_return']?>" maxlength="100" required>
        </div>
        <div class="input_wrap">
            <label>&nbsp;</label>
            <input type="submit" name="btn" value="Update">
        </div>
    </form>
</div>
<script type="text/javascript">
    document.forms['edit_return_sale'].elements['id'].value = '<?php echo $sale_return_info['id'] ?>';
</script>