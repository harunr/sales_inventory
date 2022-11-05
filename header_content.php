<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <meta name="description" content="Sales Inventory System">
        <meta name="keywords" content="HTML, CSS, JavaScript, PHP">
        <meta name="author" content="Webtricker">       
        <title>
            <?php
                while($row=mysqli_fetch_assoc($query_result_1))
                {
                    if($row['menu_id']==$_SESSION['menu_id'])
                    echo $row['menu_title'];
                }
            ?>
        </title>
        <link type="text/css" href="asset/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="asset/js/jsapi.js"></script>
        <script type="text/javascript" src="asset/js/jsval.js"></script>
        </head>
            <body>
                <div class="page_wrap box">
                    <div class="header_wrap">
                        <div class="logo">
                            <a href="<?php echo 'index.php'; ?>?id=1">
                                <img src="admin/<?php echo $logo['logo_image'];?>" alt="Logo" height="150">
                            </a></div>
                        <div class="banner"></div>
                    </div>
                    <div class="menu">
                        <ul>
                            <?php  while($row=mysqli_fetch_assoc($query_result)) { ?>
                                <li><a href="<?php echo $row['menu_link']?>?id=<?php echo $row['menu_id']?>"><?php echo $row['menu_title']?></a></li>
                            <?php } ?>
                        </ul>
                    </div>