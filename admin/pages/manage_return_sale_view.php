<?php
    $query_result=$obj_admin->select_all_return_sale();
    if(isset($_GET['status']))
    {
        $status=$_GET['status'];
        $id=$_GET['id'];
        if($status=='delete')
        {
            $obj_admin->delete_return_sales($id);
        }                
    }    
?>
<div class="common_wrap">
    <div class="content_title">
        <h4>Manage Return Sale</h4>
    </div>
    <div class="manage_wrap">
        <div class="row">
            <div class="cell_1 bg_color_1 fontsize_12">Id</div>
            <div class="cell_2 bg_color_1 fontsize_12">Sales Detail Id</div>
            <div class="cell_3 bg_color_1 fontsize_12">Purchase Detail Id</div>
            <div class="cell_4 bg_color_1 fontsize_12">Product Id</div>
            <div class="cell_4 bg_color_1 fontsize_12">Qty Return</div>
            <div class="cell_5 bg_color_1 fontsize_12">Action</div>
        </div>
        <?php
            while($row=mysqli_fetch_assoc($query_result))
            {
        ?>
        <div class="row">
            <div class="cell_1 color_1"><?php echo $row['id']?></div>
            <div class="cell_2 color_1"><?php echo $row['sales_detail_id']?></div>
            <div class="cell_3 color_1"><?php echo $row['purchase_detail_id']?></div>
            <div class="cell_3 color_1"><?php echo $row['product_id']?></div>
            <div class="cell_3 color_1"><?php echo $row['qty_return']?></div>
            <div class="cell_5 color_1 manage_link_btn">
                <a class="btn_edit" href="edit_return_sale.php?id=<?php echo $row['id']?>" title="Edit"></a>
                <a class="btn_delete" href="?status=delete&id=<?php echo $row['id']?>" onclick="return check_delete();" title="Delete"></a> 
            </div>
        </div>
        <?php }?>
    </div>
</div>