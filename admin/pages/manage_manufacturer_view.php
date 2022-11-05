<?php
    $query_result=$obj_admin->select_all_manufacturer();
    if(isset($_GET['status']))
    {
        $status=$_GET['status'];
        $id=$_GET['id'];
        if($status=='active')
         {
             $obj_admin->active_manufacturer($id);
         }
        else if($status=='inactive')
         {
             $obj_admin->inactive_manufacturer($id);
         }
        else if($status=='delete')
        {
            $obj_admin->delete_manufacturer($id);
        }               
    }   
?>
<div class="common_wrap">
    <div class="content_title">
        <h4>Manage Manufacturer</h4>
    </div>
    <div class="manage_wrap">
        <div class="row">
            <div class="cell_1 bg_color_1 fontsize_12">Manufacturer Id</div>
            <div class="cell_2 bg_color_1 fontsize_12">Manufacturer Name</div>
            <div class="cell_3 bg_color_1 fontsize_12">Manufacturer Address</div>
            <div class="cell_3 bg_color_1 fontsize_12">Contact No.</div>
            <div class="cell_3 bg_color_1 fontsize_12">Email</div>
            <div class="cell_5 bg_color_1 fontsize_12">Action</div>
        </div>
        <?php
            while($row=mysqli_fetch_assoc($query_result))
            {
        ?>
        <div class="row">
            <div class="cell_1 color_1"><?php echo $row['manufact_id']?></div>
            <div class="cell_2 color_1"><?php echo $row['manufact_name']?></div>
            <div class="cell_3 color_1"><?php echo $row['manufact_address']?></div>
            <div class="cell_3 color_1"><?php echo $row['contact_no']?></div> 
            <div class="cell_3 color_1"><?php echo $row['manufact_email']?></div> 
            <div class="cell_5 color_1 manage_link_btn">
            <?php
                if($row['status']==0)
                {
            ?>
                <a class="btn_active" href="?status=active&id=<?php echo $row['manufact_id']?>" title="Inactive"></a>
            <?php } else{?>
                <a class="btn_inactive" href="?status=inactive&id=<?php echo $row['manufact_id']?>" title="Active"></a>
            <?php } ?>
                <a class="btn_edit" href="edit_manufacturer.php?id=<?php echo $row['manufact_id']?>" title="Edit"></a>
                <a class="btn_delete" href="?status=delete&id=<?php echo $row['manufact_id']?>" onclick="return check_delete();" title="Delete"></a> 
            </div>
        </div>
        <?php }?>
    </div>
</div>