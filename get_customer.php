<?php
require_once './classes/welcome.php';
$obj_welcome=new Welcome();
$customer_id=$_GET['text'];
$customer_info=$obj_welcome->select_customer_info_by_id_name($customer_id);
?>
<select name="customer_id" required exclude=" ">
    <option value=" ">Select Customer.....</option>
    <?php
        while ($row=  mysqli_fetch_assoc($customer_info))
        {
    ?>
    <option value="<?php echo $row['customer_id']?>"><?php echo $row['customer_id'].' '.$row['first_name'].' '.$row['last_name']?></option>
    <?php }?>
</select>