<?php
    $result=$obj_admin->select_purchase_by_id($purchase_id);
    $purchase_info= mysqli_fetch_assoc($result);
    $supplier_list=$obj_admin->select_all_supplier();
    if(isset($_POST['btn']))
    {
        $obj_admin->update_purchase_info($_POST);        
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Edit Purchase</h4>
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
    <form name="edit_purchase" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>Select Supplier:<span class="required_field">*</span></label>
            <select name="supplier_id" id="supplier_id" required exclude=" ">
                <option value="" disabled selected>Select Supplier Info.....</option>
                <?php
                    while ($row=mysqli_fetch_assoc($supplier_list))
                    {                        
                ?>
                <option value="<?php echo $row['supplier_id']?>"><?php echo $row['supplier_id'].' '.$row['first_name'].' '.$row['last_name']?></option>
                <?php }?>
            </select>
        </div>
        <div class="input_wrap">
            <label>Date:<span class="required_field">*</span></label>
            <input type="date" name="date" value="<?php echo $purchase_info['date']?>" required regexp="JSVAL_RX_DATE" err="Please Enter Valid Date" maxlength="8">
        </div>
        <div class="input_wrap">
            <label>Paid Amount:<span class="required_field">*</span></label>
            <input type="text" name="paid_amnt" value="<?php echo $purchase_info['paid_amnt']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC" err="Please Enter Valid Paid Amount" maxlength="100" placeholder="Paid Amount">
            <input type="hidden" name="purchase_id" value="<?php echo $purchase_info['purchase_id']?>">
        </div>
        <div class="input_wrap">
            <label>Due Amount:</label>            
            <input type="text" name="due_amnt" value="<?php echo $purchase_info['due_amnt']?>">
        </div>
        <div class="input_wrap">
            <label>Total Payable:</label>            
            <input type="text" name="total_supplier_paid" value="<?php echo $purchase_info['total_supplier_paid']?>">
        </div>
        <div class="input_wrap">
            <label>Remarks:</label>
            <textarea name="remarks"><?php echo $purchase_info['remarks']?></textarea>
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
    document.forms['edit_purchase'].elements['status'].value = '<?php echo $purchase_info['status'] ?>';
    document.forms['edit_purchase'].elements['supplier_id'].value = '<?php echo $purchase_info['supplier_id'] ?>';
</script>