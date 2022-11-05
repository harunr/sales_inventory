<?php
    if($_POST!=NULL)    
    {
        // $sales_report_info_array=$sales_report_details;
        // $sales_report_info=mysqli_fetch_assoc($sales_report_info_array);
    }
    else 
    {
        return FALSE;
    }   
?>
<div class="reports_detail_wrap">
<div class="report_title">
    <h2>Sales Report</h2>
</div>
<?php
    $total_due=0;
    $remaining_due=0;

    if($sales_report_parent!=NULL)
    {
        $row=mysqli_fetch_assoc($sales_report_parent);
        $sales_report_details_info=$obj_welcome->select_sales_report_details_info($row['sales_id']);
    {
?>
    <div class="row_parent">        
        <div class="detail_info_50 left_align">S Invoice: <?php echo $row['s_invoice']?></div>
        <div class="detail_info_50 right_align">Date: <?php echo date("d-M-Y", strtotime($row['date']))?></div>
        <div class="detail_info_50 left_align">Paid Amount: <?php echo number_format((float)$row['paid_amnt'], 2, '.')?></div>
        <div class="detail_info_50 right_align color_4 bold_font">Due Amount: <?php echo number_format((float)$row['due_amnt'], 2, '.')?></div>
        <div class="detail_info_50 left_align">Discount: <?php echo number_format((float)$row['discount_amnt'], 2, '.')?></div>
        <div class="detail_info_50 right_align">Total Payable: <?php echo number_format((float)$row['total_customer_paid'], 2, '.')?></div>
    </div>        
    <?php
        $total_due=$total_due+$row['due_amnt'];    
    } }?>
        <div class="ruler_line"></div>        
        <div class="row_detail padding_5 bg_color_1">
            <div class="detail_info_5  fontsize_12 bold_font">Sl. No</div>
            <div class="detail_info_10 fontsize_12 bold_font">S Id</div>
            <div class="detail_info_10 fontsize_12 bold_font">S Detail Id</div>
            <div class="detail_info_10 fontsize_12 bold_font">P Detail Id</div>
            <div class="detail_info_10 fontsize_12 bold_font right_align">P Id</div>
            <div class="detail_info_10 fontsize_12 bold_font right_align ">Rate</div>
            <div class="detail_info_10 fontsize_12 bold_font right_align ">Qty</div>
            <div class="detail_info_10 fontsize_12 bold_font right_align ">Total</div>
        </div>
        <?php
            $cnt=1;
            if($sales_report_details_info!=NULL)
            {
                $sales_report_details_info=$obj_welcome->select_sales_report_details_info($row['sales_id']);
                while ($row_detail=mysqli_fetch_assoc($sales_report_details_info))                    
            {
        ?>        
        <div class="row_detail">
            <div class="detail_info_5"><?php echo $cnt;?></div>
            <div class="detail_info_10"><?php echo $row_detail['sales_id']?></div>
            <div class="detail_info_10"><?php echo $row_detail['sales_detail_id']?></div>
            <div class="detail_info_10"><?php echo $row_detail['purchase_detail_id']?></div>
            <div class="detail_info_10 right_align"><?php echo $row_detail['product_id']?></div>
            <div class="detail_info_10 right_align color_4 bold_font"><?php echo number_format((float)$row_detail['unit_price'], 2, '.')?></div>
            <div class="detail_info_10 right_align"><?php echo $row_detail['qty_sold']?></div>
            <div class="detail_info_10 right_align"><?php echo number_format((float)($row_detail['qty_sold']*$row_detail['unit_price']), 2, '.')?></div>
        </div>
        <?php 
            $cnt=$cnt+1;
            $total_due=$total_due+$row['due_amnt'];        
        } }?>  
    </div>
</div>