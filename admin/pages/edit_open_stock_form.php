<?php
    $result=$obj_admin->select_open_stock_info_by_id($opn_stck_id);        
    $open_stock_info= mysqli_fetch_assoc($result);
    if(isset($_POST['btn']))
    {
        $obj_admin->update_open_stock_info($_POST);        
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
    <form name="edit_open_stock" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">                       
            <input type="hidden" name="opn_stck_id" value="<?php echo $open_stock_info['opn_stck_id']?>">
        </div>        
        <div class="input_wrap">
            <label>Month Year:<span class="required_field">*</span></label>
            <input type="text" name="mon_yyyy" value="<?php echo $open_stock_info['mon_yyyy']?>" maxlength="8" required err="Please Enter Valid Mon Year Number">
        </div>
        <div class="input_wrap">
            <label>Product Id</label>
            <input type="text" name="product_id" value="<?php echo $open_stock_info['product_id']?>" maxlength="100" required err="Please Enter Valid Stock Number">
        </div>        
        <div class="input_wrap">
            <label>Stock in Month:<span class="required_field">*</span></label>
            <input type="text" name="stock_in_hand" value="<?php echo $open_stock_info['stock_in_hand']?>" maxlength="8" required err="Please Enter Valid Stock in Month">
        </div>
        <div class="input_wrap">
            <label>Remarks:<span class="required_field">*</span></label>
            <input type="text" name="remarks" value="<?php echo $open_stock_info['remarks']?>" maxlength="100" required  err="Please Enter Valid Stock in Month">
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
    document.forms['edit_open_stock'].elements['opn_stck_id'].value = '<?php echo $open_stock_info['opn_stck_id'] ?>';
    document.forms['edit_open_stock'].elements['status'].value = '<?php echo $open_stock_info['status'] ?>';
</script>