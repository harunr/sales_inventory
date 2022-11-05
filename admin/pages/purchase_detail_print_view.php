<?php
    $company_info=$obj_admin->select_company_info();
    $company_data=mysqli_fetch_assoc($company_info);
    $purchase_detail_info=$obj_admin->select_purchase_detail_by_purchase_id($purchase_id);
    $purchase_info=$obj_admin->select_purchase_by_id($purchase_id);
    $purchase_data=mysqli_fetch_assoc($purchase_info);
    $supplier_id=$purchase_data['supplier_id'];    
    $supplier_info=$obj_admin->select_supplier_info_by_id($supplier_id);
    $supplier_name=mysqli_fetch_assoc($supplier_info);    
?>
<div class="report_wrap">
    <div class="content_title">
        <h4>Print Preview Purchase Detail</h4>
    </div>
    <div class="company_title"><?php echo $company_data['company_name']?><br>ঠিকানা:<?php echo $company_data['company_address']?><br>মোবাইল: <?php echo $company_data['company_contact']?></div>
    <div class="row_parent padding_5">
        <div class="parent_info">Purchase Invoice: <span class="bold_font"><?php echo $purchase_data['p_invoice']?></span></div>
        <div class="parent_info right_align">Date: <span class="bold_font"><?php echo date("d-M-Y", strtotime( $purchase_data['date']))?></span></div>        
        <div class="parent_info">Supplier Name: <span class="bold_font"><?php echo $supplier_name['first_name'].' '.$supplier_name['last_name']?></span></div>
        <div class="parent_info right_align">Amount Paid:Tk. <span class="bold_font"><?php echo number_format((float)$purchase_data['paid_amnt'], 2, '.')?></span></div>
        <div class="parent_info">Amount Due:Tk. <span class="bold_font color_4"><?php echo number_format((float)$purchase_data['due_amnt'], 2, '.')?></span></div>
        <div class="parent_info right_align">Total Payable:Tk. <span class="bold_font"><?php echo number_format((float)$purchase_data['total_supplier_paid'], 2, '.')?></span></div>
    </div>
    <div class="row_detail padding_5 bg_color_1">
        <div class="detail_info_5  fontsize_12 bold_font">Sl. No</div>
        <div class="detail_info_15 fontsize_12 bold_font">P Code</div>
        <div class="detail_info_40 fontsize_12 bold_font">P Description</div>
        <div class="detail_info_10 fontsize_12 bold_font">Qty</div>
        <div class="detail_info_10 fontsize_12 bold_font right_align ">Rate</div>
        <div class="detail_info_20 fontsize_12 bold_font right_align ">Total Amount</div>
    </div>
        <?php
            $cnt=1;       
            while($row=mysqli_fetch_assoc($purchase_detail_info))
            { $product_name_info=$obj_admin->select_product_name_by_id($row['product_id']);
                $product_name=implode(",",mysqli_fetch_assoc($product_name_info));        
        ?>
    <div class="row_detail">
        <div class="detail_info_5"><?php echo $cnt;?></div>
        <div class="detail_info_15"><?php echo $row['product_id']?></div>
        <div class="detail_info_40"><?php echo $product_name?></div>
        <div class="detail_info_10"><?php echo $row['qty_purchased']?></div>
        <div class="detail_info_10 right_align"><?php echo number_format((float)$row['product_cost']/$row['qty_purchased'], 2, '.')?></div>
        <div class="detail_info_20 right_align"><?php echo number_format((float)$row['product_cost'], 2, '.')?></div>
    </div>        
        <?php $cnt=$cnt+1; }?>
    </div>
</div>