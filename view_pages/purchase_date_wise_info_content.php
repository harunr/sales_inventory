<div class="reports_detail_wrap">
    <div class="report_title">
        <h2>Purchase Date Wise</h2>
        <h4>
            <?php                
                echo date("d-M-Y", strtotime($date_from)).'  <span>To</span>  '.date("d-M-Y", strtotime($date_to)); 
            ?>
        </h4>
    </div>
<?php
    $total_due=0;
    $remaining_due=0;
?>
    <div class="row_detail padding_5 bg_color_1">
        <div class="detail_info_5  fontsize_12 bold_font">Sl. No</div>
        <div class="detail_info_10  fontsize_12 bold_font">Supplier Id</div>
        <div class="detail_info_10 fontsize_12 bold_font">S Invoice</div>
        <div class="detail_info_10 fontsize_12 bold_font">Date</div>
        <div class="detail_info_10 fontsize_12 bold_font right_align">Paid Amount</div>
        <div class="detail_info_10 fontsize_12 bold_font right_align ">Due Amount</div>
        <div class="detail_info_10 fontsize_12 bold_font right_align ">Total Payable</div>        
    </div>
        <?php
            $cnt=1;
            
            if($purchase_date_wise!=NULL)
            {
                while($row=mysqli_fetch_assoc($purchase_date_wise))                
            {
        ?>
    <div class="row_detail">
        <div class="detail_info_5"><?php echo $cnt;?></div>
        <div class="detail_info_10"><?php echo $row['supplier_id']?></div>
        <div class="detail_info_10"><?php echo $row['p_invoice']?></div>
        <div class="detail_info_10"><?php echo date("d-M-Y", strtotime($row['date']))?></div>
        <div class="detail_info_10 right_align"><?php echo number_format((float)$row['paid_amnt'], 2, '.')?></div>
        <div class="detail_info_10 right_align color_4 bold_font"><?php echo number_format((float)$row['due_amnt'], 2, '.')?></div>
        <div class="detail_info_10 right_align"><?php echo number_format((float)$row['total_supplier_paid'], 2, '.')?></div>                    
    </div>        
        <?php 
            $cnt=$cnt+1;
            $total_due=$total_due+$row['due_amnt'];
        
        } }?>
        <div class="ruler_line"></div>        
    </div>
</div>