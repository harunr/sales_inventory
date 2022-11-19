
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<style type="text/css">
    .inputFieldDesign{
        padding: 3px;
        border-radius: 9999em;
    }
    .bg_gradient{
        background: linear-gradient(90deg, rgb(231 229 255) 0%, rgb(25 255 194 / 88%) 35%, rgb(231 251 255) 100%);
    }
    .quantity_input{
        padding: 0px; border: 1px solid #b7b7b7 !important;
        border-radius: 5px !important;
        font: normal 17px/normal "Times New Roman", Times, serif !important;
        background: rgba(252,252,252,1) !important;
    }
</style>
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
        <input type="hidden" class="com_sales_id" value="<?php echo $sales_id;?>">
        <select exclude="" class="product_list js-states form-control" id="select">
            <option value="" disabled selected>Choose one</option>
            <?php while ($row=mysqli_fetch_assoc($product_info)){ ?>
            <option data-pid=<?php echo $row['product_id'];?> data-pname="<?php echo $row['product_name'];?>" data-price="<?php echo $row['unit_price'];?>" data-vat= <?php echo $row['vat_rate'];?>>
                <?php echo $row['product_id'];?>
                <?php echo $row['product_name'];?>
            </option>
            <?php } ?>
        </select>
            
        <button type="button" id="add_row" style="float: none !important">Add New Product</button>
        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)" id="add_sale_detail"> 
            <table class="detail_table_wrap" id="myTable">
                <tr>
                    <th style="width:20%;">Product Name</th>
                    <th>Sales ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                    <th>VAT</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
                
            </table>

            <div class="purchase_parent_wrap" style="float: right !important; margin-right: 12.5% !important; width: 30% !important;">
                <div>Total Amount<span><input type="text" class="grand_total inputFieldDesign bg_gradient" readonly placeholder="0"></span></div><hr>
                <div>Discount<span><input type="text" class="discount_amount inputFieldDesign" name="discount_amnt" required placeholder="0" maxlength="8"></span></div><hr>
                <div>Grand Total:<span><input type="text" class="after_discount inputFieldDesign bg_gradient" name="discount_amnt" required placeholder="0" maxlength="8"></span></div><hr>
                <div>Paid Amount:<span><input type="text" class="paid_by_customer inputFieldDesign" name="paid_amnt" required placeholder="0" maxlength="8"></span></div><hr>      
                <div>Return Amount:<span><input type="text" class="return_amount inputFieldDesign bg_gradient" readonly placeholder="0"></span></div><hr>
                <div class="input_wrap" id="detail_sale_save_btn" style="float: right !important; width: 50%; !important"><input type="submit" name="btn" value="Save"></div> 
            </div>
        </form>
    </div>
    <div class="purchase_parent_wrap">
        <div class="total_supplier_paid">Payable From Customer:<span><?php echo round((float)$total_customer_paid, 2) ?></span></div>
        <div class="paid_amnt">Paid Amount:<span><?php echo round((float)$paid_amnt, 2) ?></span></div>        
        <div class="due_amnt">Discount:<span><?php echo round((float)(abs($discount_amnt)), 2) ?></span></div>
        <div class="due_amnt">Due Amount:<span><?php echo round((float)(abs($due_amnt)), 2) ?></span></div>
        <a class="print_preview" href="sales_detail_print_preview.php?id=<?php echo $sales_id ?>" title="Preview">Print Preview</a>
    </div>    
</div>
<script>
document.addEventListener('DOMContentLoaded', function(){
    $('#add_row').click(function(){
        var sales_id = $('.com_sales_id').val();
        var product_id = $('.product_list').find(':selected').attr('data-pid');
        var pname = $('.product_list').find(':selected').attr('data-pname');
        if(pname == undefined) {
            alert("Please, select product..."); return false;
        }
        var unit_price = $('.product_list').find(':selected').attr('data-price');
        var vat = $('.product_list').find(':selected').attr('data-vat');
        var default_qty = 1;
        var total_amnt = unit_price * default_qty;
        var vat_cal = (total_amnt * vat) / 100;
        var sub_total = total_amnt + vat_cal;

        if($('.qty_sold_'+product_id).length == 0){
            var html = `<tr class="new_row">                                                            
                <td style="width:20%;">
                    <input type="hidden" name="purchase_detail_id[]" class="purchase_detail_id" value="${product_id}" readonly>
                    <input type="text" name="product_name[]" class="product_name" value="${pname}" readonly></td> 
                <td><input type="text" name="sales_id[]" class="sales_id" value="${sales_id}" readonly></td> 
                <td><input type="text" name="product_id[]" class="product_id" required value="${product_id}" readonly></td>
                <td><input type="text" name="qty_sold[]" class="qty_sold qty_change qty_sold_${product_id} quantity_input" value="${default_qty}" required maxlength="8" data-unit_price="${unit_price}"  data-vat="${vat}"></td>
                <td><input type="text" name="unit_price[]" class="unit_price" value="${unit_price}" maxlength="8" readonly></td>
                <td><input type="text" name="total_amnt[]" class="total_amnt" value="${total_amnt}" maxlength="12" readonly></td>
                <td><input type="text" name="vat_amnt[]" class="vat_amnt" value="${vat_cal}" maxlength="8" readonly></td>
                <td><input type="text" name="sub_total[]" class="sub_total" value="${sub_total}" maxlength="12" readonly></td>                    
                <td><button type="button" class="remove_row">Delete</button></td>                       
            </tr>`;
            $('#myTable').append(html)
        }else{
            $('.qty_sold_'+product_id).val(parseInt($('.qty_sold_'+product_id).val()) + 1).trigger('change');
        }

        grandTotalCalculation();
    })

    $("#select").select2({
          placeholder: "Select product",
          allowClear: true
      });

    $(document).on("click", 'button.remove_row' , function(){
        $(this).parents('tr.new_row').remove();
        grandTotalCalculation();
    })

    $(document).on("keyup change",".qty_change", function(){
        var qty = $(this).val();
        var unit_price = $(this).attr('data-unit_price');
        var vat = $(this).attr('data-vat');

        var total_amnt = unit_price * qty;
        var vat_cal = (total_amnt * vat) / 100;
        var sub_total = total_amnt + vat_cal;

        $(this).closest('td').next('td').next('td').find('input').val(total_amnt);
        $(this).closest('td').next('td').next('td').next('td').find('input').val(vat_cal);
        $(this).closest('td').next('td').next('td').next('td').next('td').find('input').val(sub_total);

        grandTotalCalculation();
    })  

    $(document).on("keyup",".discount_amount", function(){
        var total = $('.grand_total').val();
        var discount = parseFloat($(this).val());
        var m_discount = (discount == '') ? 0 : parseFloat(discount);
        var after_discount = total - m_discount;
        $('.after_discount').val(after_discount.toFixed(2));
        var paid = $('.paid_by_customer').val();
        var m_paid = (paid == '') ? 0 : parseFloat(paid);
        var returnAmount = 0;
        if(paid > 0){
            returnAmount = m_paid - after_discount;
        }
        $('.return_amount').val(returnAmount.toFixed(2));

    })

    $(document).on("keyup",".paid_by_customer", function(){
        var total = $('.after_discount').val();
        var paid = parseFloat($(this).val());
        var m_paid = (paid == '') ? 0 : parseFloat(paid);
        var returnAmount = 0;
        if(paid > 0){
            returnAmount = m_paid - total;
        }
        $('.return_amount').val(returnAmount.toFixed(2));
    })
});
</script>
<script>
    function copyTextValue(){
        var e = document.getElementById("select");
        var val = e.options[e.selectedIndex].value;
        document.getElementById("destination").value = val;
    }

    function grandTotalCalculation(){
        var discount = $('.discount_amount').val();
        var paid = $('.paid_by_customer').val();
        var m_discount = (discount == '') ? 0 : parseFloat(discount);
        var m_paid = (paid == '') ? 0 : parseFloat(paid);
        var total = 0;
        $(".sub_total").each(function(){
            total += parseFloat($(this).val());
        });
        $('.grand_total').val(total.toFixed(2));
        var after_discount = total - m_discount;
        $('.after_discount').val(after_discount.toFixed(2));
        var returnAmount = 0;
        if(paid > 0){
            returnAmount = m_paid - after_discount;
        }
        $('.return_amount').val(returnAmount.toFixed(2));
    }
</script>