<?php
    $query_result=$obj_admin->select_all_open_stock();
    if(isset($_GET['status']))
    {
        $status=$_GET['status'];
        $id=$_GET['id'];
        if($status=='active')
         {
             $obj_admin->active_open_stock($id);
         }
        else if($status=='inactive')
         {
             $obj_admin->inactive_open_stock($id);
         }
        else if($status=='delete')
        {
            $obj_admin->delete_open_stock($id);
        }                
    }
?>
<div class="common_wrap">
    <div class="content_title">
        <h4>Manage Open Stock</h4>
    </div>
    <div class="manage_wrap">
        <div class="row">
            <div class="purchse_cell_1 bg_color_1 fontsize_12">Sl. No</div>
            <div class="purchse_cell_1 bg_color_1 fontsize_12">Open Stock Id</div>
            <div class="cell_1 bg_color_1 fontsize_12">Month Year</div>
            <div class="cell_1 bg_color_1 fontsize_12">Product Id</div>
            <div class="cell_1 bg_color_1 fontsize_12">Product Name</div>
            <div class="cell_1 bg_color_1 fontsize_12">Stock In Month</div>
            <div class="cell_1 bg_color_1 fontsize_12">Remarks</div>
            <div class="cell_1 bg_color_1 fontsize_12">Status</div>            
            <div class="cell_1 bg_color_1 fontsize_12">Action</div>
        </div>
        <?php
            $cnt=1;
            while($row=mysqli_fetch_assoc($query_result))
            {
        ?>
        <div class="row">
            <div class="purchse_cell_1 color_1"><?php echo $cnt;?></div>
            <div class="purchse_cell_1 color_1"><?php echo $row['opn_stck_id']?></div>
            <div class="cell_1 color_1"><?php echo $row['mon_yyyy']?></div>
            <div class="cell_1 color_1"><?php echo $row['product_id']?></div>
            <div class="cell_1 color_2"><?php echo $row['product_name']?></div>
            <div class="cell_1 color_4"><?php echo $row['stock_in_hand']?></div>
            <div class="cell_1 color_1"><?php echo $row['remarks']?></div>          
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
                <a class="btn_active" href="?status=active&id=<?php echo $row['opn_stck_id']?>" title="Inactive"></a>
                <?php } else{?>
                <a class="btn_inactive" href="?status=inactive&id=<?php echo $row['opn_stck_id']?>" title="Active"></a>
                <?php } ?>
                <a class="btn_edit" href="edit_open_stock.php?id=<?php echo $row['opn_stck_id']?>" title="Edit"></a>
                <a class="btn_delete" href="?status=delete&id=<?php echo $row['opn_stck_id']?>" onclick="return check_delete();" title="Delete"></a> 
            </div>
        </div>        
        <?php $cnt=$cnt+1; }?>
    </div>
</div>