<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <meta name="description" content="Student Management System">
        <meta name="keywords" content="HTML, CSS, JavaScript, PHP">
        <meta name="author" content="Md. Monjoor Khayer">  
        <title>Admin Panel</title>
        <link type="text/css" href="../asset/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <script type="text/javascript" src="../asset/js/image_preview.js"></script>
        <script type="text/javascript">
            function check_delete()
            {
                var chk = confirm('Are You Sure To Delete This ?');
                if (chk) {
                    return true;
                }
                else {
                    return false;
                }
            }
        </script>
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="ckeditor/config.js"></script>
        <script type="text/javascript" src="../asset/js/jsval.js"></script>
        <?php include './ajax_validation_script.php'; ?>