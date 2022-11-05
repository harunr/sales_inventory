<?php
require_once './classes/welcome.php';
$obj_welcome=new Welcome();
$product_cat_id =$_GET['text'];
$product_cat_info=$obj_welcome->select_product_cat_info_by_id($product_cat_id);
?>
<select name="product_cat_id" required exclude=" ">
    <option value=" ">Select Category.....</option>
    <?php
        while ($row=  mysqli_fetch_assoc($product_cat_info))
        {
    ?>
    <option value="<?php echo $row['product_cat_id']?>"><?php echo $row['product_cat_id'].' '.$row['product_cat_name']?></option>
    <?php }?>
</select>