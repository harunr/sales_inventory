<?php
require_once '../classes/admin.php';
$obj_admin=new Admin();
$supplier_id=$_GET['text'];
$result=$obj_admin->supplier_id_ajax_search($supplier_id);
$query_result= mysqli_fetch_assoc($result);

if($query_result)
{
    echo 'Alredy Exists';
}
else{
    echo 'Avilable';
}