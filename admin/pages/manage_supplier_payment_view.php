<?php
    $query_result=$obj_admin->select_all_supplier_payment();
    if(isset($_GET['status']))
    {
        $status=$_GET['status'];
        $id=$_GET['id'];
        if($status=='active')
         {
             $obj_admin->active_supplier_payment($id);
         }
        else if($status=='inactive')
         {
             $obj_admin->inactive_supplier_payment($id);
         }
        else if($status=='delete')
        {
            $obj_admin->delete_supplier_payment($id);
        }                
    } 
?>
<div class="common_wrap">
    <div class="content_title">
        <h4>Manage Supplier Payment</h4>
    </div>
    <div class="manage_wrap">
        <div class="row">
            <div class="purchse_cell_1 bg_color_1 fontsize_12">Sl. No</div>            
            <div class="purchse_cell_1 bg_color_1 fontsize_12">Payment Id</div>
            <div class="cell_25 bg_color_1 fontsize_12">Supplier</div>
            <div class="cell_1 bg_color_1 fontsize_12">Date</div>
            <div class="cell_1 bg_color_1 fontsize_12">Amount Paid</div>
            <div class="cell_25 bg_color_1 fontsize_12">Remarks</div>
            <div class="cell_1 bg_color_1 fontsize_12">Status</div>            
            <div class="cell_1 bg_color_1 fontsize_12">Action</div>
        </div>
        <?php
            $cnt=1;
            while($row=mysqli_fetch_assoc($query_result))
            {
                $supplier_info=$obj_admin->select_supplier_info_by_id($row['supplier_id']);
                $supplier_name=mysqli_fetch_assoc($supplier_info);
        ?>
        <div class="row">
            <div class="purchse_cell_1 color_1"><?php echo $cnt;?></div>
            <div class="purchse_cell_1 color_1"><?php echo $row['supplier_payment_id']?></div>
            <div class="cell_25 color_1"><?php echo $supplier_name['first_name'].' '.$supplier_name['last_name']?></div>
            <div class="cell_1 color_1"><?php echo $row['date']?></div>
            <div class="cell_1 color_2"><?php echo number_format((float)$row['amnt_paid'], 2, '.')?></div>            
            <div class="cell_25 color_1"><?php echo $row['remarks']?></div>          
            <?php
                if($row['status']==1)
                {
            ?>
            <div class="cell_1 color_1"><?php echo 'Active'; ?>
            </div>
            <?php } else{?>
            <div class="cell_1 color_1"><?php echo 'Inactive'; ?>
            </div>
            <?php } ?>
            <div class="cell_1 color_1 manage_link_btn">
                <?php
                    if($row['status']==0)
                    {
                ?>
                <a class="btn_active" href="?status=active&id=<?php echo $row['supplier_payment_id']?>" title="Inactive"></a>
                <?php } else{?>
                <a class="btn_inactive" href="?status=inactive&id=<?php echo $row['supplier_payment_id']?>" title="Active"></a>
                <?php } ?>
                <a class="btn_edit" href="edit_supplier_payment.php?id=<?php echo $row['supplier_payment_id']?>" title="Edit"></a>
                <a class="btn_delete" href="?status=delete&id=<?php echo $row['supplier_payment_id']?>" onclick="return check_delete();" title="Delete"></a> 
            </div>
        </div>        
        <?php $cnt=$cnt+1; }?>
    </div>
</div>
