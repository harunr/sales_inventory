<?php
    $result=$obj_admin->select_supplier_payment_by_id($supplier_payment_id);
    $supplier_payment_info= mysqli_fetch_assoc($result);
    if(isset($_POST['btn']))
    {
        $obj_admin->update_supplier_payment_info($_POST);        
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Edit Supplier Payment</h4>
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
    <form name="edit_supplier_payment" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">            
            <input type="hidden" name="supplier_payment_id" value="<?php echo $supplier_payment_info['supplier_payment_id']?>">
        </div>        
        <div class="input_wrap">
            <label>Date:<span class="required_field">*</span></label>
            <input type="date" name="date" value="<?php echo $supplier_payment_info['date']?>" required>
        </div>
        <div class="input_wrap">
            <label>Suuplier:<span class="required_field">*</span></label>
            <select name="supplier_id" required exclude=" ">
                <option value=" ">Select Supplier.....</option>
                <?php
                    $supplier_info=$obj_admin->select_all_supplier();
                    while ($supplier_name=  mysqli_fetch_assoc($supplier_info))
                    {
                ?>
                <option value="<?php echo $supplier_name['supplier_id']?>"><?php echo $supplier_name['supplier_id'].' '.$supplier_name['first_name'].' '.$supplier_name['last_name']?></option>
                <?php }?>
            </select>
        </div>
        <div class="input_wrap">
            <label>Amount:<span class="required_field">*</span></label>
            <input type="number" name="amnt_paid" value="<?php echo $supplier_payment_info['amnt_paid']?>" required>
        </div>
        <div class="input_wrap">
            <label>Remarks:<span class="required_field">*</span></label>
            <input type="text" name="remarks" value="<?php echo $supplier_payment_info['remarks']?>" required>
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
    document.forms['edit_supplier_payment'].elements['supplier_id'].value = '<?php echo $supplier_payment_info['supplier_id'] ?>';
    document.forms['edit_supplier_payment'].elements['status'].value = '<?php echo $supplier_payment_info['status'] ?>';
</script>