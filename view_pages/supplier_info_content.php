<?php
    if($_POST!=NULL)
    {
        $supplier_info=$obj_welcome->select_supplier_name($_POST);
        $supplier_name=mysqli_fetch_assoc($supplier_info);
        $supplier_payment_info=$obj_welcome->select_supplier_payment($_POST);
        $supplier_payment_sum=mysqli_fetch_assoc($supplier_payment_info);        
    }
    else 
    {
        return FALSE;
    }   
?>
<div class="reports_detail_wrap">
    <div class="report_title">
        <h2>Supplier Information</h2>
    </div>
<?php
    $total_due=0;
    $remaining_due=0;
?>
    <div class="parent_info">Supplier ID: <span class="bold_font"><?php echo $supplier_name['supplier_id']?></span></div>
    <div class="parent_info">Supplier Name: <span class="bold_font"><?php echo $supplier_name['first_name'].' '.$supplier_name['last_name']?></span></div>
    <div class="row_detail padding_5 bg_color_1">
        <div class="detail_info_5  fontsize_12 bold_font">Sl. No</div>
        <div class="detail_info_10 fontsize_12 bold_font">P Invoice</div>
        <div class="detail_info_10 fontsize_12 bold_font">Date</div>
        <div class="detail_info_10 fontsize_12 bold_font right_align">Paid Amount</div>
        <div class="detail_info_10 fontsize_12 bold_font right_align ">Due Amount</div>
        <div class="detail_info_10 fontsize_12 bold_font right_align ">Total Payable</div>
    </div>
        <?php
            $cnt=1;
            
            if($supplier_details!=NULL)
            {
                while($row=mysqli_fetch_assoc($supplier_details))
                
            {
        ?>
    <div class="row_detail">
        <div class="detail_info_5"><?php echo $cnt;?></div>
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
        <div class="parent_info">Total Due:<span class="bold_font"><?php echo number_format((float)$total_due, 2, '.')?></span></div>
        <div class="parent_info">Paid to Supplier (Tk.):<span class="bold_font">
            <?php echo number_format((float)(implode(" ",$supplier_payment_sum)), 2, '.')?></span>
        </div>
        <?php            
            $remaining_due=($total_due-implode(" ",$supplier_payment_sum));
        ?>
        <div class="parent_info">Remaining Due:<span class="bold_font color_4"><?php echo number_format((float)$remaining_due, 2, '.')?>
        </span></div>
    </div>    
</div>