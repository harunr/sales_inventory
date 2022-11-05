<?php
    $result=$obj_admin->select_sales_by_id($sales_id);
    $sales_info= mysqli_fetch_assoc($result);
    $customer_list=$obj_admin->select_all_customer();
    if(isset($_POST['btn']))
    {
        $obj_admin->update_sale_info($_POST);        
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Edit Sale</h4>
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
    <form name="edit_sale" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>Select Customer:<span class="required_field">*</span></label>
            <select name="customer_id" id="customer_id" required exclude=" ">
                <option value="" disabled selected>Select Customer Info.....</option>
                <?php
                    while ($row=mysqli_fetch_assoc($customer_list))
                    {                        
                ?>
                <option value="<?php echo $row['customer_id']?>"><?php echo $row['customer_id'].' '.$row['first_name'].' '.$row['last_name']?></option>
                <?php }?>
            </select>
        </div>
        <div class="input_wrap">
            <label>Date:<span class="required_field">*</span></label>
            <input type="date" name="date" value="<?php echo $sales_info['date']?>" required regexp="JSVAL_RX_DATE" err="Please Enter Valid Date" maxlength="8">
        </div>
        <div class="input_wrap">
            <label>Paid Amount:<span class="required_field">*</span></label>
            <input type="text" name="paid_amnt" value="<?php echo $sales_info['paid_amnt']?>" required regexp="JSVAL_RX_ALPHA_NUMERIC" err="Please Enter Valid Paid Amount" maxlength="100" placeholder="Paid Amount">
            <input type="hidden" name="sales_id" value="<?php echo $sales_info['sales_id']?>">
        </div>
        <div class="input_wrap">
            <label>Due Amount:</label>            
            <input type="text" name="due_amnt" value="<?php echo $sales_info['due_amnt']?>">
        </div>
        <div class="input_wrap">
            <label>Discount:</label>            
            <input type="text" name="discount_amnt" value="<?php echo $sales_info['discount_amnt']?>">
        </div>
        <div class="input_wrap">
            <label>Total Payable:</label>            
            <input type="text" name="total_customer_paid" value="<?php echo $sales_info['total_customer_paid']?>">
        </div>
        <div class="input_wrap">
            <label>Remarks:</label>
            <textarea name="remarks"><?php echo $sales_info['remarks']?></textarea>
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
    document.forms['edit_sale'].elements['status'].value = '<?php echo $sales_info['status'] ?>';
    document.forms['edit_sale'].elements['customer_id'].value = '<?php echo $sales_info['customer_id'] ?>';
</script>