<?php
    $query_result=$obj_admin->select_company_info();
    if(isset($_GET['status']))
    {
        $status=$_GET['status'];
        $id=$_GET['id'];
        if($status=='active')
         {
             $obj_admin->active_company_info($id);
         }
        else if($status=='inactive')
         {
             $obj_admin->inactive_company_info($id);
         }
        else if($status=='delete')
        {
            $obj_admin->delete_company_by_id($id);
        }             
    }
?>
<div class="common_wrap">
    <div class="content_title">
        <h4>Manage Company Info</h4>
    </div>
    <div class="manage_wrap">
        <div class="row">
            <div class="cell_1 bg_color_1 fontsize_12">Sl. No</div>
            <div class="cell_1 bg_color_1 fontsize_12">Id</div>
            <div class="cell_25 bg_color_1 fontsize_12">Company Name</div>
            <div class="cell_25 bg_color_1 fontsize_12">Address</div>
            <div class="cell_1 bg_color_1 fontsize_12">Contact No.</div>            
            <div class="cell_1 bg_color_1 fontsize_12">Status</div>            
            <div class="cell_1 bg_color_1 fontsize_12">Action</div>
        </div>
        <?php
            $cnt=1;
            while($row=mysqli_fetch_assoc($query_result))
            {
        ?>
        <div class="row">
            <div class="cell_1 color_1"><?php echo $cnt;?></div>
            <div class="cell_1 color_1"><?php echo $row['id']?></div>
            <div class="cell_25 color_1"><?php echo $row['company_name']?></div>
            <div class="cell_25 color_1"><?php echo $row['company_address']?></div>
            <div class="cell_1 color_2"><?php echo $row['company_contact']?></div>                  
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
                <a class="btn_active" href="?status=active&id=<?php echo $row['id']?>" title="Inactive"></a>
                <?php } else{?>
                <a class="btn_inactive" href="?status=inactive&id=<?php echo $row['id']?>" title="Active"></a>
                <?php } ?>
                <a class="btn_edit" href="edit_company_info.php?id=<?php echo $row['id']?>" title="Edit"></a>
                <a class="btn_delete" href="?status=delete&id=<?php echo $row['id']?>" onclick="return check_delete();" title="Delete"></a> 
            </div>
        </div>        
        <?php $cnt=$cnt+1; }?>
    </div>
</div>