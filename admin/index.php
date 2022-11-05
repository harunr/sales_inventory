<?php
require_once '../classes/login.php';
$obj_login = new Login();
if (isset($_POST['btn'])) {
    $message = $obj_login->admin_login_check($_POST);
}
if (isset($_SESSION['admin_id'])) {
    header("Location:admin_master_page.php");
}
if (isset($_POST['btn_back'])) {
    header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <meta name="description" content="Student Management System">
        <meta name="keywords" content="HTML, CSS, JavaScript, PHP">
        <meta name="author" content="Md. Monjoor Khayer">  
        <title>Login Page</title>        
        <link type="text/css" href="../asset/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body class="login_body">
        <div class="page_wrap box">
            <div class="login_page">
                <h1>Login</h1>
                <div class="message_wrap">
                    <h2 style="color: red">
                        <?php
                        if (isset($message)) {
                            echo $message;
                            unset($message);
                        }
                        ?>
                    </h2>
                    <h2 style="color: red">
                        <?php
                        if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                        ?>
                    </h2>
                </div>
                <form action="" method="post">
                    <div class="input_wrap">
                        <label>User Id:</label>
                        <input type="text" name="admin_email_address" value="" maxlength="100">
                    </div>
                    <div class="input_wrap">
                        <label>Password:</label>
                        <input type="password" name="admin_password" value="" maxlength="5">
                    </div>
                    <div class="input_wrap">
                        <label>&nbsp;</label>
                        <input type="submit" name="btn" value="Login">
                    </div>
                    <div class="input_wrap">
                        <label>&nbsp;</label>
                        <input type="submit" name="btn_back" value="Back">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>