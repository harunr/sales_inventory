
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<?php      
    require_once '../classes/database.php';    
    $obj_database = new Database(); 

    $current_sales_id=$obj_admin->select_max_sales_id($customer_id,$user_name);
    $max_sales_id=mysqli_fetch_assoc($current_sales_id);
    $sales_id=implode(",",$max_sales_id);    
    $product_info=$obj_admin->select_all_product_purchased();    
    
    $total_customer_paid=0;
    $paid_amnt=0;
    $purchase_detail_info_by_sales_id;
    $update_sales_info='';
    $update_product_qty_remain='';
    $update_sales_invoice='';
    $qty_stock=0;
    $unit_price=0;
    $product_id=0;
    $discount_amnt=0;
    $due_amnt=0;

    if(isset($_POST['btn']))
     {
        $count=count($_POST['sales_id']);

        for($i=0;$i<$count;$i++){ 
            $status=1;
            $sql="insert into tbl_sales_detail_info(sales_id,purchase_detail_id,product_id,qty_sold,unit_price,vat_amnt,total_amnt,status)
	            VALUES (
		                 '{$sales_id}',
                         '{$_POST['purchase_detail_id'][$i]}',
		                 '{$_POST['product_id'][$i]}',
		                 '{$_POST['qty_sold'][$i]}', 
                         '{$_POST['unit_price'][$i]}',
                         '{$_POST['vat_amnt'][$i]}',
                         '{$_POST['total_amnt'][$i]}',
                         '{$status}'
                         )";
                $obj_database->connect()->query($sql);                        
                $total_customer_paid=$total_customer_paid + ($_POST['total_amnt'][$i]) + ($_POST['vat_amnt'][$i]);
                $minus_qty=$obj_admin->minus_product_qty($_POST['product_id'][$i],$_POST['qty_sold'][$i]);
                $update_purchase_qty_remain=$obj_admin->update_purchase_detail_qty_remain($_POST['purchase_detail_id'][$i],$_POST['qty_sold'][$i]);
        }
        $invoice_generated='S';
        $invoice_generated=$invoice_generated.''.$sales_id;
        $paid_amnt=$_POST['paid_amnt'];
        $discount_amnt=$_POST['discount_amnt'];
        $due_amnt=$total_customer_paid-$paid_amnt-$discount_amnt;
        $update_sales_invoice=$obj_admin->update_sales_invoice_no($invoice_generated,$sales_id);        
        $purchase_detail_info_by_sales_id=$obj_admin->select_purchase_detail_by_sales_id($sales_id);
        $update_sales_info=$obj_admin->update_sales_paid_amnt($total_customer_paid,$paid_amnt,$discount_amnt,$sales_id);        
     }
?>
<div class="common_wrap">
    <div class="common_title"><h4>Add Sales Detail</h4></div>
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
        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)" id="add_sale_detail"> 
            <table class="detail_table_wrap" id="myTable">
                <tr>
                    <th>Select Product</th>
                    <th>Sales ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                    <th>Vat</th>
                    <th>Total Taka</th>
                    <th>Remove</th>
                </tr>
                <tr class="new_row">                                                            
                    <td>
                        <select name="purchase_detail_id[]" required exclude=" " onchange="copyTextValue()" id="select">
                            <option value="" disabled selected>..Product</option>
                            <?php
                                while ($row=mysqli_fetch_assoc($product_info))
                                { 
                            ?>
                            <option value="">
                               <em><?php echo $row['purchase_detail_id'];?></em>
                                   <?php echo $sales_id ?>
                                    <?php echo $row['product_id'];?>
                                    <?php echo $row['unit_price'];?>
                                    <?php echo $row['vat_rate'];?>
                                    <?php echo $row['product_id'];?>
                                    <?php echo $row['product_name'];?>
                                    <?php echo $row['qty_remain'];?>
                                </ul>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="text"  name="sales_id[]" value="<?php echo $sales_id ?>">
                    </td> 
                    <td>
                        <input type="text" name="product_id[]" required value="" >
                    </td>
                    <td>
                        <input type="text" name="qty_sold[]" required maxlength="8">
                    </td>
                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $qty_sold=htmlspecialchars($_REQUEST['qty_sold']);
                            $amount=$qty_sold*$row['unit_price'];
                            $vat_amount=($amount*$row['vat_rate'])/100;
                            $total_amnt_with_vat=$amount+$vat_amount;
                        }
                    ?> 
                    <td>
                        <input type="text" name="unit_price[]" value="<?php echo $row['unit_price'] ?>" maxlength="8" >
                    </td>
                    <td>
                        <input type="text" name="total_amnt[]" value="<?php echo $amount ?>" maxlength="12" >
                    </td>
                    <td>
                        <input type="text" name="vat_amnt[]" value="<?php echo $vat_amount ?>" maxlength="8" >
                    </td>
                    <td>
                        <input type="text" name="sub_total[]" value="<?php echo $total_amnt_with_vat ?>" maxlength="12" >
                    </td>                    
                    <td><button type="button" class="remove_row">Delete</button></td>                       
                </tr>
            </table>
            <div class="detail_svae_wrap">
                <label>Paid by Customer</label>
                <input type="text" name="paid_amnt" required placeholder="Paid Amount" maxlength="8">
            </div>
            <div class="detail_svae_wrap">
                <label>Discounted</label>
                <input type="text" name="discount_amnt" required placeholder="Discount" maxlength="8">
            </div>
            <div class="input_wrap" id="detail_sale_save_btn"><input type="submit" name="btn" value="Save"></div> 
        </form>          
    </div>
    <div class="purchase_parent_wrap">
        <div class="total_supplier_paid">Payable From Customer:<span><?php echo number_format((float)$total_customer_paid, 2, '.') ?></span></div>
        <div class="paid_amnt">Paid Amount:<span><?php echo number_format((float)$paid_amnt, 2, '.') ?></span></div>        
        <div class="due_amnt">Discount:<span><?php echo number_format((float)(abs($discount_amnt)), 2, '.') ?></span></div>
        <div class="due_amnt">Due Amount:<span><?php echo number_format((float)(abs($due_amnt)), 2, '.') ?></span></div>
        <a class="print_preview" href="sales_detail_print_preview.php?id=<?php echo $sales_id ?>" title="Preview">Print Preview</a>
    </div>    
</div>
<script>
document.addEventListener('DOMContentLoaded', function(){
    //
    $('#add_row').click(function(){
        $('tr.new_row:last-child').clone().appendTo('#myTable')
        $('tr.new_row:last-child').find("input").val("")
        $('tr.new_row:last-child').find("input").eq(0).val(parseInt( $('#sale_id').text()))
    })

    $(document).on("click", 'button.remove_row' , function(){
        $(this).parents('tr.new_row').remove()
    })      
    
});
</script>
<script>
    function copyTextValue(){
        var e = document.getElementById("select");
        var val = e.options[e.selectedIndex].value;
        document.getElementById("destination").value = val;
    }
</script>