<?php
    $product_list=$obj_admin->select_all_product();    
    if(isset($_POST['btn'])){
        if(!empty($_POST['product_id'])) {           
            $message=$obj_admin->save_open_stock($_POST);                      
        } else {
            echo 'Please select the value.';
        }
    }
?>
<div class="common_wrap">
    <div class="common_title">
        <h4>Add Open Stock</h4>
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
    <form name="add_open_stock_form" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)" id="add_open_stock">
        <div class="input_wrap">
            <label>Select Product:<span class="required_field">*</span></label>
            <select name="product_id" id="product_id" required exclude=" ">
                <option value="" disabled selected>Select Product .....</option>
                <?php
                    while ($row=mysqli_fetch_assoc($product_list))
                    {                        
                ?>
                <option value="<?php echo $row['product_id']?>"><?php echo $row['product_id'].' '.$row['product_name']?></option>
                <?php }?>
            </select> 
          
        </div>        
        <div class="input_wrap">
            <label>Date:<span class="required_field">*</span></label>
            <input type="text" name="mon_yyyy" required placeholder="MON-YYYY" maxlength="8">
        </div>
        <div class="input_wrap">
            <label>Stock In Hand:<span class="required_field">*</span></label>
            <input type="text" name="stock_in_hand" required placeholder="Stock In Hand" maxlength="8">
        </div>
        <div class="input_wrap">
            <label>Remarks:</label>
            <input type="text" name="remarks" maxlength="100" placeholder="Remarks">
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
            <input type="submit" name="btn" id="btn" value="Save">                       
        </div>
    </form>
</div>