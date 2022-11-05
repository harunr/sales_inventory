<?php
    $query_result=$obj_admin->select_all_product_category();
    if(isset($_GET['status']))
    {
        $status=$_GET['status'];
        $id=$_GET['id'];
        if($status=='active')
         {
             $obj_admin->active_product_category($id);
         }
        else if($status=='inactive')
         {
             $obj_admin->inactive_product_category($id);
         }
        else if($status=='delete')
        {
            $obj_admin->delete_product_category($id);
        }               
    }    
?>
<div class="common_wrap">
    <div class="content_title">
        <h4>Manage Product Category</h4>
    </div>
    <div class="manage_wrap">
        <div class="row">
            <div class="cell_1 bg_color_1 fontsize_12">Product Category Id</div>
            <div class="cell_2 bg_color_1 fontsize_12">Product  Category Name</div>
            <div class="cell_5 bg_color_1 fontsize_12">Action</div>
        </div>
        <?php
            while($row=mysqli_fetch_assoc($query_result))
            {
        ?>
        <div class="row">
            <div class="cell_1 color_1"><?php echo $row['product_cat_id']?></div>
            <div class="cell_2 color_1"><?php echo $row['product_cat_name']?></div>            
            <div class="cell_5 color_1 manage_link_btn">
            <?php
                if($row['status']==0)
                {
            ?>
            <a class="btn_active" href="?status=active&id=<?php echo $row['product_cat_id']?>" title="Inactive"></a>
            <?php } else{?>
            <a class="btn_inactive" href="?status=inactive&id=<?php echo $row['product_cat_id']?>" title="Active"></a>
            <?php } ?>
            <a class="btn_edit" href="edit_product_category.php?id=<?php echo $row['product_cat_id']?>" title="Edit"></a>
            <a class="btn_delete" href="?status=delete&id=<?php echo $row['product_cat_id']?>" onclick="return check_delete();" title="Delete"></a> 
            </div>
        </div>
        <?php }?>
    </div>
</div>