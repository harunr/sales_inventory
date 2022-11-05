<?php
require_once '../classes/admin.php';
$obj_admin=new Admin();

if(isset($_POST['btn'])){ 
    {  
        if( empty($_POST['date']) || empty($_POST['sales_detail_id']) || 
            empty($_POST['purchase_detail_id']) || empty($_POST['product_id']) || empty($_POST['qty_return']) || 
            empty($_POST['remarks']))
            {echo "Please Fill all the requirement field";}
            else{
                $message=$obj_admin->save_sale_return($_POST);
                $_POST['date']='';
                $_POST['sales_detail_id']='';
            }
        
        $sales_detail_id=$_POST['sales_detail_id'];
        $purchase_detail_id=$_POST['purchase_detail_id'];
        $product_id=$_POST['product_id'];
        // echo "<pre>";
        // print_r($sales_detail_id);
        // exit();
    }   
}
?>
    <div class="common_title center_align">
        <h2>
            <?php
                if(isset($message))
                {   
                    echo $message;               
                    unset($message);                
                }
            ?>
        </h2>
    </div>
    <form name="add_return_sale_form" action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>Date:<span class="required_field">*</span></label>
            <input type="date" name="date" required value="<?php echo $date_today;?>">
        </div>
        <div class="input_wrap">
            <label>Sales Detail Id:<span class="required_field">*</span></label>
            <input type="text" name="sales_detail_id" required value="<?php echo $sales_detail_id;?>" readonly="readonly" class="input_read_only_bgcolor">
        </div>
        <div class="input_wrap">
            <label>Purchase Detail Id:<span class="required_field">*</span></label>
            <input type="text" name="purchase_detail_id" required value="<?php echo $purchase_detail_id;?>" readonly="readonly" class="input_read_only_bgcolor">
        </div>
        <div class="input_wrap">
            <label>Product Id:<span class="required_field">*</span></label>
            <input type="text" name="product_id" required value="<?php echo $product_id;?>" readonly="readonly" class="input_read_only_bgcolor">
        </div>
        <div class="input_wrap">
            <label>Qty Return:<span class="required_field">*</span></label>
            <input type="text" name="qty_return" required value="<?php echo 0;?>">
        </div>
        <div class="input_wrap">
            <label>Remarks:</label>
            <input type="text" name="remarks" maxlength="100" placeholder="Remarks">
        </div>
        <div class="input_wrap">
            <label>&nbsp;</label>
            <input type="submit" name="btn" id="btn" value="Save">                       
        </div> 
    </form>
</div>