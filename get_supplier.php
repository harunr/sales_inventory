<?php
require_once './classes/welcome.php';
$obj_welcome=new Welcome();
$supplier_id=$_GET['text'];
$supplier_info=$obj_welcome->select_supplier_info_by_id_name($supplier_id);
?>
<select name="supplier_id" required exclude=" ">
    <option value=" ">Select Supplier.....</option>
    <?php
        while ($row=  mysqli_fetch_assoc($supplier_info))
        {
    ?>
    <option value="<?php echo $row['supplier_id']?>"><?php echo $row['supplier_id'].' '.$row['first_name'].' '.$row['last_name']?></option>
    <?php }?>
</select>