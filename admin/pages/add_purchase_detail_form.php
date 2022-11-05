
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<?php    
    require_once '../classes/database.php';
    $obj_database = new Database();

    $current_purchase_id=$obj_admin->select_max_purchase_id($supplier_id,$user_name);
    $max_purchase_id=mysqli_fetch_assoc($current_purchase_id);
    $purchase_id=implode(",",$max_purchase_id);    
    $product_info=$obj_admin->select_all_product_qty_positive();
    
    $total_supplier_paid=0;
    $paid_amnt=0;
    $purchase_detail_info_by_purchase_id;
    $update_purchase_info='';
    $update_product_current_price='';
    $update_purchase_invoice='';
    $qty_stock=0;    

    if(isset($_POST['btn']))
     {
        $count=count($_POST['purchase_id']);
        $status=1;

        for($i=0;$i<$count;$i++){            
            $unit_cost=($_POST['product_cost'][$i]+$_POST['shipment_cost'][$i]+$_POST['others_cost'][$i])/$_POST['qty_purchased'][$i];
            
            $sql="insert into tbl_purchase_detail_info(purchase_id,product_id,product_cost,shipment_cost,others_cost,vat_rate,qty_purchased,qty_remain,unit_cost,unit_price,status)
	            VALUES (
		                 '{$purchase_id}',
		                 '{$_POST['product_id'][$i]}',
		                 '{$_POST['product_cost'][$i]}', 
                         '{$_POST['shipment_cost'][$i]}',
                         '{$_POST['others_cost'][$i]}',
                         '{$_POST['vat_rate'][$i]}',
                         '{$_POST['qty_purchased'][$i]}',
                         '{$_POST['qty_purchased'][$i]}',
                         '{$unit_cost}',
                         '{$_POST['unit_price'][$i]}',
                         '{$status}'
                         )";
                        $obj_database->connect()->query($sql);
                         
                        $total_supplier_paid=$total_supplier_paid + ($_POST['product_cost'][$i]);
                        $add_qty=$obj_admin->add_product_qty($_POST['product_id'][$i],$_POST['qty_purchased'][$i]);
                        $update_product_current_price=$obj_admin->update_product_current_price($_POST['product_id'][$i],$_POST['unit_price'][$i]);                        
        }
        $invoice_generated='P';
        $invoice_generated=$invoice_generated.''.$purchase_id;
        $paid_amnt=$_POST['paid_amnt'];        
        $update_purchase_invoice=$obj_admin->update_purchase_invoice_no($invoice_generated,$purchase_id);
        
        $purchase_detail_info_by_purchase_id=$obj_admin->select_purchase_detail_by_purchase_id($purchase_id);
        $update_purchase_info=$obj_admin->update_purchase_paid_amnt($total_supplier_paid,$paid_amnt,$purchase_id);
        
     }
?>
<!-- number_format((float)$foo, 2, '.', ''); -->
<div class="common_wrap">
    <div class="common_title"><h4>Add Purchase detail</h4></div>
    <h2>
        <?php
            if(isset($message))
            {   echo $message;
                unset($message);
            }
        ?>        
    </h2>
    <div class="detail_table_wrap">
    <button type="button" id="add_row">Add New Row</button>
        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)" id="add_purchase_detail"> 
            <table class="detail_table_wrap" id="myTable">
                <tr>
                    <th>Purchase ID</th>
                    <th>Select Product</th>
                    <th>Total Product Cost</th>
                    <th>Shipment Cost</th>
                    <th>Other Cost</th>
                    <th>Vat Rate</th>
                    <th>Quantity</th>                    
                    <th>Price Per Unit</th>                    
                    <th>Remove</th>                 
                </tr>                
                <tr class="new_row">
                    <td>
                        <input type="hidden"  name="purchase_id[]" value="<?php echo $purchase_id ?>"></td>
                        <span id="purchase_id" style="display:none"><?php echo $purchase_id ?></span>
                        <div class="display-purchase-id"><?php echo $purchase_id ?></div>                   
                    <td>
                        <select name="product_id[]" required exclude=" ">
                            <option value="" disabled selected>..Product</option>
                            <?php
                                while ($row=mysqli_fetch_assoc($product_info))
                                {                        
                            ?>
                            <option value="<?php echo $row['product_id']?>"><?php echo $row['product_id'].' '.$row['product_name']?></option>
                            <?php }?>
                        </select> 
                    </td>
                    <td>
                        <input type="text" name="product_cost[]" required placeholder="Product Cost" maxlength="8">
                    </td>
                    <td>
                        <input type="text" name="shipment_cost[]" required placeholder="Shipment Cost" maxlength="8">
                    </td>
                    <td>
                        <input type="text" name="others_cost[]" required placeholder="Other Cost" maxlength="8">
                    </td>
                    <td>
                        <input type="text" name="vat_rate[]" required placeholder="VAT Rate" maxlength="5">
                    </td>
                    <td>
                        <input type="text" name="qty_purchased[]" required placeholder="Quantity" maxlength="8">
                    </td>                    
                    <td>
                        <input type="text" name="unit_price[]" required placeholder="Price Per Unit" maxlength="8">
                    </td>                    
                    <td><button type="button" class="remove_row">Delete</button></td>                       
                </tr>
            </table>
            <div class="detail_svae_wrap">
                <label>Paid to Supplier</label>
                <input type="text" name="paid_amnt" required placeholder="Paid Amount" maxlength="8">
            </div>
            <div class="input_wrap " id="detail_save_btn"><input type="submit" name="btn" value="Save"></div> 
        </form>          
    </div> 
    <div class="purchase_parent_wrap">
        <div class="total_supplier_paid">Total Payable to Supplier:<span><?php echo number_format((float)$total_supplier_paid, 2, '.') ?></span></div>
        <div class="paid_amnt">Paid Amount:<span><?php echo number_format((float)$paid_amnt, 2, '.') ?></span></div>
        <div class="due_amnt">Due Amount:<span><?php echo number_format((float)(abs($total_supplier_paid-$paid_amnt)), 2, '.') ?></span></div>
        <a class="print_preview" href="purchase_detail_print_preview.php?id=<?php echo $purchase_id ?>" title="Edit">Print Preview</a>
    </div>    
</div>
<script>
document.addEventListener('DOMContentLoaded', function(){
    //
    $('#add_row').click(function(){
        $('tr.new_row:last-child').clone().appendTo('#myTable')
        $('tr.new_row:last-child').find("input").val("")
        $('tr.new_row:last-child').find("input").eq(0).val(parseInt( $('#purchase_id').text()))
    })

    $(document).on("click", 'button.remove_row' , function(){
        $(this).parents('tr.new_row').remove()
    })    
});
</script>