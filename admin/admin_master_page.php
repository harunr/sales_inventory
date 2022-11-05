<?php
ob_start();
require_once '../classes/admin.php';
$obj_admin = new Admin();
session_start();
if ($_SESSION['admin_id'] == NULL) {
    header("Location:index.php");
}
if (isset($_GET['l_id'])) {
    if ($_GET['l_id'] == 'logout') {
        $obj_admin->logout();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include './header_admin_master.php'; ?>
    </head>
    <body>
        <div class="page_wrap admin_page box">
            <div class="header_wrap">
                <h1>Admin Panel</h1>
                <div class="user_info">
                    <h3><?php echo $_SESSION['admin_name'] ?></h3>
                    <a href="?l_id=logout">Logout</a>
                </div>
            </div>
            <div class="content_wrap">
                <div class="sidebar">
                    <h4>Controls</h4>
                    <ul>                        
                        <?php
                            if($_SESSION['access_level']=='1')
                                {include './admin_menu_content.php';}
                            else
                                {include './admin_menu_2.php';}
                        ?>
                    </ul>
                </div>
                <div class="content">
                    <?php include './admin_page_content.php'; ?>
                </div>
            </div>
            <div class="footer_wrap">
                <p>&copy;&nbsp;Copyright:Webtricker Web Design and Development Agency</p>
            </div>
        </div>
    </body>
</html>