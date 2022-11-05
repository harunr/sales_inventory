<?php    
    if(isset($_GET['status']))
    {
        $status=$_GET['status'];
        $id=$_GET['id'];
        if($status=='active')
         {
             $obj_admin->active_sale_detail($id);
         }
        else if($status=='inactive')
         {
             $obj_admin->inactive_sale_detail($id);
         }
        else if($status=='delete')
        {
            $obj_admin->delete_sale_detail($id);
        }                
    }
    $page_one=0;
    if (isset($_GET['pages'])) {
        $page = $_GET['pages'];
        if ($page == ' ' || $page == '1') {
            $page_one = 0;
        } else {
            $page_one = ($page * 25) - 25;
        }
    }    
    $sql="SELECT * FROM tbl_sales_detail_info WHERE deletion_status='0' LIMIT $page_one,25";
    $query_result=  $obj_admin->connect()->query($sql);
?>
<div class="common_wrap">
    <div class="content_title">
        <h4>Manage Sale Detail</h4>
    </div>
    <div class="manage_wrap">
        <div class="row">
            <div class="purchse_cell_1 bg_color_1 fontsize_12">Sl. No</div>
            <div class="purchse_cell_1 bg_color_1 fontsize_12">Purchase Detail Id</div>
            <div class="purchse_cell_1 bg_color_1 fontsize_12">Sales Detail Id</div>
            <div class="purchse_cell_1 bg_color_1 fontsize_12">Sales ID</div>
            <div class="cell_1 bg_color_1 fontsize_12">Product Id</div>
            <div class="cell_1 bg_color_1 fontsize_12">Unit Price</div>
            <div class="cell_1 bg_color_1 fontsize_12">Qty Sold</div>
            <div class="cell_1 bg_color_1 fontsize_12">Total Amount</div>
            <div class="cell_1 bg_color_1 fontsize_12">Vat Amount</div>
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
            <div class="purchse_cell_1 color_1"><?php echo $row['purchase_detail_id']?></div>
            <div class="purchse_cell_1 color_1"><?php echo $row['sales_detail_id']?></div>
            <div class="purchse_cell_1 color_1"><?php echo $row['sales_id']?></div>
            <div class="cell_1 color_1"><?php echo $row['product_id']?></div>
            <div class="cell_1 color_1"><?php echo number_format((float)$row['unit_price'], 2, '.')?></div>            
            <div class="cell_1 color_2"><?php echo $row['qty_sold']?></div>
            <div class="cell_1 color_4"><?php echo  number_format((float)$row['total_amnt'], 2, '.')?></div>
            <div class="cell_1 color_4"><?php echo  number_format((float)$row['vat_amnt'], 2, '.')?></div>
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
                <a class="btn_active" href="?status=active&id=<?php echo $row['sales_detail_id']?>" title="Inactive"></a>
                <?php } else{?>
                <a class="btn_inactive" href="?status=inactive&id=<?php echo $row['sales_detail_id']?>" title="Active"></a>
                <?php } ?>
                <a class="btn_edit" href="edit_sale_detail.php?id=<?php echo $row['sales_detail_id']?>" title="Edit"></a>
                <a class="btn_delete" href="?status=delete&id=<?php echo $row['sales_detail_id']?>" onclick="return check_delete();" title="Delete"></a> 
            </div>
        </div>        
        <?php $cnt=$cnt+1; }?>
    </div>
</div>
<div id="pagination">
    <ul>
    <?php
        $sql = "SELECT * FROM tbl_sales_detail_info WHERE deletion_status='0'";
        $query_result = $obj_admin->connect()->query($sql);
        $total_row = mysqli_num_rows($query_result);        
        $per_page = $total_row / 25;        
        $n = ceil($per_page);        
        for ($i = 1; $i <= $n; $i++)
        { ?>    
            <li><a href="?pages=<?php echo $i; ?>" ><?php echo $i . ' '; ?></a></li>    
    <?php } ?>  
    </ul>  
</div>