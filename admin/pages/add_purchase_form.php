<?php
    $supplier_list=$obj_admin->select_all_supplier();
    $supplier_id=0; 
    if(isset($_POST['btn'])){
        if(!empty($_POST['supplier_id'])) {
            $selected_id = $_POST['supplier_id'];
            $message=$obj_admin->save_purchase($_POST);
            $user_name=$_SESSION['admin_name'];
        } else {
            echo 'Please select the value.';
        }
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Add Purchase</h4>
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
    <form name="add_purchase_form" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)" id="add_purchase">        
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
            <input type="date" name="date" required regexp="JSVAL_RX_DATE" err="Please Enter Valid Date" maxlength="8" class="purchase-date-wrap">            
        </div> 
        <div class="input_wrap">
            <label>&nbsp;</label>
            <input type="submit" name="btn" id="btn" value="Save">
            <a class="btn_purchase_detail" href="add_purchase_detail.php?id=<?php echo $selected_id ?>&user_name=<?php echo $_SESSION['admin_name']?>" title="Edit">Add Detail Purchase</a>
            <input type="hidden" name="user_name" value="<?php echo $_SESSION['admin_name']?>"> 
        </div>
    </form>
</div>