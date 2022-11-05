<?php
require_once './classes/welcome.php';
$obj_welcome=new Welcome();
$sales_id=$_GET['text'];
$sales_info=$obj_welcome->select_sales_id($sales_id);
?>
<select name="sales_id" required exclude=" ">
    <option value=" ">Select Sales ID.....</option>
    <?php
        while ($row=  mysqli_fetch_assoc($sales_info))
        {
    ?>
    <option value="<?php echo $row['sales_id']?>"><?php echo $row['s_invoice'].' '.$row['date'].' '.$row['customer_id']?></option>
    <?php }?>
</select>