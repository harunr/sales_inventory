<?php
    $result=$obj_admin->select_all_supplier();    
    if(isset($_POST['btn']))
    {$message=$obj_admin->save_supplier_payment($_POST);}
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Add Supplier Payment</h4>
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
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>Suuplier:<span class="required_field">*</span></label>
            <select name="supplier_id" required exclude=" ">
                <option value=" ">Select Supplier.....</option>
                <?php
                    while ($row=  mysqli_fetch_assoc($result))
                    {
                ?>
                <option value="<?php echo $row['supplier_id']?>"><?php echo $row['supplier_id'].' '.$row['first_name'].' '.$row['last_name']?></option>
                <?php }?>
            </select>
        </div>
        <div class="input_wrap">
            <label>Date:<span class="required_field">*</span></label>
            <input type="date" name="date" placeholder="Date" required err="Please Enter Valid Date">
        </div>
        <div class="input_wrap">
            <label>Amount Paid:<span class="required_field">*</span></label>
            <input type="text" name="amnt_paid" placeholder="Amount" required>
        </div>
        <div class="input_wrap">
            <label>Remarks:<span class="required_field">*</span></label>
            <input type="text" name="remarks" placeholder="Remarks" required>
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
            <input type="submit" name="btn" value="Save">
        </div>
    </form>
</div>