<?php
    require_once './classes/welcome.php';
    $obj_welcome = new Welcome();
    $query_result=$obj_welcome->select_menu_items();
    $query_result_1=$obj_welcome->select_menu_items();
    $logo_info=$obj_welcome->select_logo();
    $logo=  mysqli_fetch_assoc($logo_info);
    $id='';
    if(isset($_GET['id']))
        {   session_start();
            $_SESSION['menu_id']=$_GET['id'];
        }
    else {$_SESSION['menu_id']='1';}
    $view_content=$obj_welcome->select_page_content_by_id($_SESSION['menu_id']);