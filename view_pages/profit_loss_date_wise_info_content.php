<div class="reports_detail_wrap">
    <div class="report_title">
        <h2>Profit Loss Date Wise</h2>        
        <h4>
            <?php                
                echo date("d-M-Y", strtotime($date_from)).'  <span>To</span>  '.date("d-M-Y", strtotime($date_to)); 
            ?>
        </h4>
    </div>
<?php
    $total_profit_loss=0;
    $remaining_due=0;
?>
    <div class="row_detail padding_5 bg_color_1">
        <div class="detail_info_5  fontsize_12 bold_font">Sl. No</div>
        <div class="detail_info_10 fontsize_12 bold_font">Sales Id</div>
        <div class="detail_info_10 fontsize_12 bold_font">P Detail Id</div>
        <div class="detail_info_10 fontsize_12 bold_font">Product Id</div>
        <div class="detail_info_10 fontsize_12 bold_font">Unit Cost</div>
        <div class="detail_info_10 fontsize_12 bold_font">Unit Price</div>
        <div class="detail_info_10 fontsize_12 bold_font">Qty</div>
        <div class="detail_info_10 fontsize_12 bold_font">Cost</div>
        <div class="detail_info_10 fontsize_12 bold_font">Revenue</div>
        <div class="detail_info_10 fontsize_12 bold_font">Profit/Loss</div>
    </div>
        <?php
            $cnt=1;            
            if($profit_loss_date_wise!=NULL)
            {
                while($row=mysqli_fetch_assoc($profit_loss_date_wise))                
            {
        ?>
    <div class="row_detail">
        <div class="detail_info_5"><?php echo $cnt;?></div>
        <div class="detail_info_10"><?php echo $row['S_id']?></div>
        <div class="detail_info_10"><?php echo $row['D_id']?></div>
        <div class="detail_info_10"><?php echo $row['Product']?></div>
        <div class="detail_info_10"><?php echo number_format((float)$row['Cost'], 2, '.')?></div>
        <div class="detail_info_10"><?php echo number_format((float)$row['Price'], 2, '.')?></div>
        <div class="detail_info_10"><?php echo $row['Qty']?></div>
        <div class="detail_info_10"><?php echo ($row['Qty']*$row['Cost'])?></div> 
        <div class="detail_info_10"><?php echo number_format((float)($row['Qty']*$row['Price']), 2, '.')?></div>
        <div class="detail_info_10"><?php echo number_format((float)(($row['Qty']*$row['Price'])-($row['Qty']*$row['Cost'])), 2, '.')?></div>
    </div>        
        <?php 
            $cnt=$cnt+1;
            $total_profit_loss=$total_profit_loss+(($row['Qty']*$row['Price'])-($row['Qty']*$row['Cost']));
        } }?>
        <div class="ruler_line"></div>
        <div class="profit_loss bold_font color_4">Total Profit / Loss (Taka): <?php echo number_format(($total_profit_loss), 2, '.')?></div> 
    </div>
</div>