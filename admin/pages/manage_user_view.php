<?php
    $query_result=$obj_admin->select_all_admin_user();
    if(isset($_GET['status']))
    {
        $status=$_GET['status'];
        $id=$_GET['id'];
        if($status=='delete')
        {
            $obj_admin->delete_user($id);
        }                
    }    
?>
<div class="common_wrap">
    <div class="content_title">
        <h4>Manage Admin User</h4>
    </div>
    <div class="manage_wrap">
        <div class="row">
            <div class="cell_1 bg_color_1 fontsize_12">Admin Id</div>
            <div class="cell_2 bg_color_1 fontsize_12">Admin Name</div>
            <div class="cell_3 bg_color_1 fontsize_12">Email Address</div>
            <div class="cell_4 bg_color_1 fontsize_12">Access Level</div>
            <div class="cell_5 bg_color_1 fontsize_12">Action</div>
        </div>
        <?php
            while($row=mysqli_fetch_assoc($query_result))
            {
        ?>
        <div class="row">
            <div class="cell_1 color_1"><?php echo $row['admin_id']?></div>
            <div class="cell_2 color_1"><?php echo $row['admin_name']?></div>
            <div class="cell_3 color_1"><?php echo $row['admin_email_address']?></div>
            <div class="cell_3 color_1"><?php echo $row['access_level']?></div>
            <div class="cell_5 color_1 manage_link_btn">
                <a class="btn_edit" href="edit_user.php?id=<?php echo $row['admin_id']?>" title="Edit"></a>
                <a class="btn_delete" href="?status=delete&id=<?php echo $row['admin_id']?>" onclick="return check_delete();" title="Delete"></a> 
            </div>
        </div>
        <?php }?>
    </div>
</div>