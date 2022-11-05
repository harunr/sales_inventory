<?php
    $query_result=$obj_admin->select_all_supplier();
    if(isset($_GET['status']))
    {
        $status=$_GET['status'];
        $id=$_GET['id'];
        if($status=='active')
         {
             $obj_admin->active_supplier($id);
         }
        else if($status=='inactive')
         {
             $obj_admin->inactive_supplier($id);
         }
        else if($status=='delete')
        {
            $obj_admin->delete_supplier($id);
        }                
    } 
    $page_one=0;
    if (isset($_GET['pages'])) {
        $page = $_GET['pages'];
        if ($page == ' ' || $page == '1') {
            $page_one = 0;
        } else {
            $page_one = ($page * 5) - 5;
        }
    }
    
    $sql="SELECT * FROM tbl_supplier_info WHERE deletion_status='0' LIMIT $page_one,5";
    $query_result=  $obj_admin->connect()->query($sql);
?>
<div class="common_wrap">
    <div class="content_title">
        <h4>Manage Supplier</h4>
    </div>
    <div class="manage_wrap">
        <div class="row">
            <div class="cell_1 bg_color_1 fontsize_12">Sl. No</div>
            <div class="cell_1 bg_color_1 fontsize_12">Supplier Id</div>
            <div class="cell_2 bg_color_1 fontsize_12">Supplier Name</div>
            <div class="cell_3 bg_color_1 fontsize_12">Supplier Address</div>
            <div class="cell_1 bg_color_1 fontsize_12">Contact No.</div>
            <div class="cell_1 bg_color_1 fontsize_12">Email Address</div>
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
            <div class="cell_1 color_1"><?php echo $row['supplier_id']?></div>
            <div class="cell_2 color_1"><?php echo $row['first_name'].' '.$row['last_name']?></div>
            <div class="cell_3 color_1"><?php echo $row['address']?></div>
            <div class="cell_1 color_1"><?php echo $row['contact_no']?></div>
            <div class="cell_1 color_1"><?php echo $row['email_address']?></div>
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
                <a class="btn_active" href="?status=active&id=<?php echo $row['supplier_id']?>" title="Inactive"></a>
                <?php } else{?>
                <a class="btn_inactive" href="?status=inactive&id=<?php echo $row['supplier_id']?>" title="Active"></a>
                <?php } ?>
                <a class="btn_edit" href="edit_supplier.php?id=<?php echo $row['supplier_id']?>" title="Edit"></a>
                <a class="btn_delete" href="?status=delete&id=<?php echo $row['supplier_id']?>" onclick="return check_delete();" title="Delete"></a> 
            </div>
        </div>        
        <?php $cnt=$cnt+1; }?>
    </div>
</div>
<div id="pagination">
    <ul>
    <?php
        $sql = "SELECT * FROM tbl_supplier_info WHERE deletion_status='0'";
        $query_result = $obj_admin->connect()->query($sql);
        $total_row = mysqli_num_rows($query_result);        
        $per_page = $total_row / 5;        
        $n = ceil($per_page);
        
        for ($i = 1; $i <= $n; $i++)
        { ?>    
            <li><a href="?pages=<?php echo $i; ?>" ><?php echo $i . ' '; ?></a></li>    
    <?php } ?>  
    </ul>  
</div>