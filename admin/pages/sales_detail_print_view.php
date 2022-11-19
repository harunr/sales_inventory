<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style type="text/css">
    .print_button{
        float: right;
        width: 20%;
        padding: 10px 0;
        text-align: center;
        font-size: 18px;
    }
</style>
<?php
    $company_info=$obj_admin->select_company_info();
    $company_data=mysqli_fetch_assoc($company_info);
    $sales_detail_info=$obj_admin->select_sales_detail_by_sales_id($sales_id);
    $sales_info=$obj_admin->select_sales_by_id($sales_id);
    $sales_data=mysqli_fetch_assoc($sales_info);
    $customer_id=$sales_data['customer_id'];    
    $customer_info=$obj_admin->select_customer_info_by_id($customer_id);
    $customer_name=mysqli_fetch_assoc($customer_info);
    $total_payable_price=0;    
?>
<div class="report_wrap">
    <div class="content_title">
        <h4>Print Preview Sales Detail</h4>
    </div>
    <button type="button" class="print_button">PRINT &#128424;</button>
    <div id="print_page_content">
        <div class="company_title"><?php echo $company_data['company_name']?><br>ঠিকানা:<?php echo $company_data['company_address']?><br>মোবাইল: <?php echo $company_data['company_contact']?></div>
        <div class="row_parent padding_5">
            <div class="parent_info">বিক্রয় রশিদ: <span class="bold_font"><?php echo $sales_data['s_invoice']?></span></div>
            <div class="parent_info right_align">তারিখ: <span class="bold_font"><?php echo date("d-M-Y", strtotime( $sales_data['date']))?></span></div>        
            <div class="parent_info left_align">কাস্টোমার নাম: <span class="bold_font"><?php echo $customer_name['first_name'].' '.$customer_name['last_name']?></span></div>
            <div class="parent_info right_align">মোট মূল্য:Tk. <span class="bold_font"><?php echo round((float)$sales_data['total_customer_paid'], 2)?></span></div>
            <div class="parent_info  left_align">পরিশোদ:Tk. <span class="bold_font"><?php echo round((float)$sales_data['paid_amnt'], 2)?></span></div>
            <div class="parent_info right_align">বকেয়া:Tk. <span class="bold_font color_4"><?php echo round((float)$sales_data['due_amnt'], 2)?></span></div>
            <div class="parent_info left_align">ডিসকাউন্ট:Tk. <span class="bold_font color_4"><?php echo round((float)$sales_data['discount_amnt'], 2)?></span></div>        
        </div>
        <div class="row_detail padding_5 bg_color_1">
            <div class="detail_info_5  fontsize_12 bold_font">ক্রমিক</div>
            <div class="detail_info_15 fontsize_12 bold_font">পণ্য কোড</div>
            <div class="detail_info_40 fontsize_12 bold_font">বিবরণ</div>
            <div class="detail_info_10 fontsize_12 bold_font">পরিমান</div>
            <div class="detail_info_10 fontsize_12 bold_font right_align">হার</div>
            <div class="detail_info_10 fontsize_12 bold_font right_align">মূল্য</div>
            <div class="detail_info_10 fontsize_12 bold_font right_align">ভ্যাট</div>
        </div>
            <?php
                $cnt=1;
                $total_price=0;
                $vat_amnt=0;
           
                while($row=mysqli_fetch_assoc($sales_detail_info))
                {   $product_name_info=$obj_admin->select_product_name_by_id($row['product_id']);
                    $product_name=implode(",",mysqli_fetch_assoc($product_name_info));
            ?>
        <div class="row_detail">
            <div class="detail_info_5"><?php echo $cnt;?></div>
            <div class="detail_info_15"><?php echo $row['product_id']?></div>
            <div class="detail_info_40"><?php echo $product_name?></div>
            <div class="detail_info_10"><?php echo $row['qty_sold']?></div>
            <div class="detail_info_10 right_align"><?php echo round((float)$row['unit_price'], 2)?></div>
            <div class="detail_info_10 right_align"><?php echo round((float)$row['total_amnt'], 2)?></div>
            <div class="detail_info_10 right_align"><?php echo round((float)$row['vat_amnt'], 2)?></div> 
        </div>        
            <?php 
                $total_price=$total_price + $row['total_amnt'];
                $vat_amnt=$vat_amnt + $row['vat_amnt'];
                $cnt=$cnt+1;
                $total_payable_price=$total_price+$vat_amnt;
             }?>
             <div class="row_detail">
                <div class="summation-wrap">
                    <div class="total-price"><em>মূল্য:</em><span><?php echo round((float)$total_price, 2) ?></span></div>
                    <div class="vat-price"><em>ভ্যাট:</em><span><?php echo round((float)$vat_amnt, 2) ?></span></div>
                    <div class="aggregate-value"><em>মোট মূল্য:</em><span><?php echo round((float)$total_payable_price, 2) ?></span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", '.print_button' , function(){
        printDiv('print_page_content');
    })
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>