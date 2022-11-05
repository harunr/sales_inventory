<?php
    if($_POST!=NULL)
    {
        $customer_info=$obj_welcome->select_customer_name($_POST);
        $customer_name=mysqli_fetch_assoc($customer_info);
        $customer_payment_info=$obj_welcome->select_customer_payment($_POST);
        $customer_payment_sum=mysqli_fetch_assoc($customer_payment_info);
    }
    else 
    {
        return FALSE;
    }   
?>
<div class="reports_detail_wrap">
    <div class="report_title">
        <h2>Customer Information</h2>
    </div>
<?php
    $total_due=0;
    $remaining_due=0;
?>
    <div class="parent_info">Customer ID: <span class="bold_font"><?php echo $customer_name['customer_id']?></span></div>
    <div class="parent_info">Customer Name: <span class="bold_font"><?php echo $customer_name['first_name'].' '.$customer_name['last_name']?></span></div>
    <div class="row_detail padding_5 bg_color_1">
        <div class="detail_info_5  fontsize_12 bold_font">Sl. No</div>
        <div class="detail_info_10 fontsize_12 bold_font">S Invoice</div>
        <div class="detail_info_10 fontsize_12 bold_font">Date</div>
        <div class="detail_info_10 fontsize_12 bold_font right_align">Paid Amount</div>
        <div class="detail_info_10 fontsize_12 bold_font right_align ">Due Amount</div>
        <div class="detail_info_10 fontsize_12 bold_font right_align ">Total Payable</div>
        <div class="detail_info_10 fontsize_12 bold_font right_align ">Discount</div>
    </div>
        <?php
            $cnt=1;
            
            if($customer_details!=NULL)
            {
                while($row=mysqli_fetch_assoc($customer_details))
                
            {
        ?>
    <div class="row_detail">
        <div class="detail_info_5"><?php echo $cnt;?></div>
        <div class="detail_info_10"><?php echo $row['s_invoice']?></div>
        <div class="detail_info_10"><?php echo date("d-M-Y", strtotime($row['date']))?></div>
        <div class="detail_info_10 right_align"><?php echo number_format((float)$row['paid_amnt'], 2, '.')?></div>
        <div class="detail_info_10 right_align color_4 bold_font"><?php echo number_format((float)$row['due_amnt'], 2, '.')?></div>
        <div class="detail_info_10 right_align"><?php echo number_format((float)$row['total_customer_paid'], 2, '.')?></div>
        <div class="detail_info_10 right_align"><?php echo number_format((float)$row['discount_amnt'], 2, '.')?></div>            
    </div>        
        <?php 
            $cnt=$cnt+1;
            $total_due=$total_due+$row['due_amnt'];        
        } }?>
        <div class="ruler_line"></div>
        <div class="parent_info">Total Due:<span class="bold_font"><?php echo number_format((float)$total_due, 2, '.')?></span></div>
        <div class="parent_info">Paid by Customer (Tk.):<span class="bold_font">
            <?php echo number_format((float)(implode(" ",$customer_payment_sum)), 2, '.')?></span>
        </div>
        <?php            
            $remaining_due=($total_due-implode(" ",$customer_payment_sum));
        ?>
        <div class="parent_info">Remaining Due:<span class="bold_font color_4"><?php echo number_format((float)$remaining_due, 2, '.')?>
        </span></div>
    </div>    
</div>