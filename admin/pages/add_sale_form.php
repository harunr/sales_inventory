<?php
    $customer_list=$obj_admin->select_all_customer();    
    $customer_id=0;
    if(isset($_POST['btn'])){
        if(!empty($_POST['customer_id'])) {
            $selected_id = $_POST['customer_id'];
            $message=$obj_admin->save_sale($_POST);
            $user_name=$_SESSION['admin_name'];
        } else {
            echo 'Please select the value.';
        }
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Add Sale</h4>
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
    <form name="add_sale_form" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)" id="add_sale">        
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
            <input type="date" name="date" required regexp="JSVAL_RX_DATE" err="Please Enter Valid Date" maxlength="8" class="sale-date-wrap">            
        </div>
        <div class="input_wrap">
            <label>&nbsp;</label>
            <input type="submit" name="btn" id="btn" value="Save">
            <a class="btn_sale_detail" href="add_sale_detail.php?id=<?php echo $selected_id ?>&user_name=<?php echo $_SESSION['admin_name']?>">Add Detail Sale</a>
            <input type="hidden" name="user_name" value="<?php echo $_SESSION['admin_name']?>"> 
        </div>
    </form>
</div>