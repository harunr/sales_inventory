<div class="reports_detail_wrap">
    <div class="report_title">
        <h2>Product Information</h2>
    </div>
<?php
    $total_due=0;    
?>
    <div class="row_detail padding_5 bg_color_1">
        <div class="detail_info_5  fontsize_12 bold_font center_align">Sl. No</div>
        <div class="detail_info_5 fontsize_12 bold_font center_align">P Id</div>
        <div class="detail_info_30 fontsize_12 bold_font left_align">P Name</div>
        <div class="detail_info_5 fontsize_12 bold_font center_align">PCode</div>
        <div class="detail_info_10 fontsize_12 bold_font right_align ">Stock</div>
        <div class="detail_info_10 fontsize_12 bold_font right_align ">Price</div>
        <div class="detail_info_5 fontsize_12 bold_font right_align ">CatId</div>
        <div class="detail_info_30 fontsize_12 bold_font center_align ">CatName</div>
    </div>
        <?php
            $cnt=1;
            
            if($product_info!=NULL)
            {
                while($row=mysqli_fetch_assoc($product_info))
            {
                if($row['PCode']==NULL)                
               {$row['PCode']='NULL';} 
        ?>
    <div class="row_detail">
        <div class="detail_info_5 center_align"><?php echo $cnt;?></div>
        <div class="detail_info_5 center_align"><?php echo $row['PId']?></div>
        <div class="detail_info_30 left_align"><?php echo $row['PName']?></div>        
        <div class="detail_info_5 center_align"><?php echo $row['PCode']?></div>
        <div class="detail_info_10 right_align"><?php echo $row['Stock']?></div>
        <div class="detail_info_10 right_align"><?php echo number_format((float)$row['Price'], 2, '.')?></div>
        <div class="detail_info_5 center_align"><?php echo $row['CatId']?></div>
        <div class="detail_info_30 center_align"><?php echo $row['CatName']?></div>
    </div>        
        <?php 
            $cnt=$cnt+1;        
        } }?>
        <div class="ruler_line"></div>
    </div>    
</div>