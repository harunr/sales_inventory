<?php
    $result=$obj_admin->select_customer_payment_by_id($customer_payment_id);
    $customer_payment_info= mysqli_fetch_assoc($result);   
    if(isset($_POST['btn']))
    {
        $obj_admin->update_customer_payment_info($_POST);        
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Edit Customer Payment</h4>
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
    <form name="edit_customer_payment" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">            
            <input type="hidden" name="customer_payment_id" value="<?php echo $customer_payment_info['customer_payment_id']?>">
        </div>        
        <div class="input_wrap">
            <label>Date:<span class="required_field">*</span></label>
            <input type="date" name="date" value="<?php echo $customer_payment_info['date']?>" required>
        </div>
        <div class="input_wrap">
            <label>Customer:<span class="required_field">*</span></label>
            <select name="customer_id" required exclude=" ">
                <option value=" ">Select Customer.....</option>
                <?php
                    $customer_info=$obj_admin->select_all_customer();
                    while ($customer_name=  mysqli_fetch_assoc($customer_info))
                    {
                ?>
                <option value="<?php echo $customer_name['customer_id']?>"><?php echo $customer_name['customer_id'].' '.$customer_name['first_name'].' '.$customer_name['last_name']?></option>
                <?php }?>
            </select>
        </div>
        <div class="input_wrap">
            <label>Amount:<span class="required_field">*</span></label>
            <input type="number" name="amnt_paid" value="<?php echo $customer_payment_info['amnt_paid']?>" required>
        </div>
        <div class="input_wrap">
            <label>Remarks:<span class="required_field">*</span></label>
            <input type="text" name="remarks" value="<?php echo $customer_payment_info['remarks']?>" required>
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
    document.forms['edit_customer_payment'].elements['customer_id'].value = '<?php echo $customer_payment_info['customer_id'] ?>';
    document.forms['edit_customer_payment'].elements['status'].value = '<?php echo $customer_payment_info['status'] ?>';
</script>