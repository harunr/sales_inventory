<script type="text/javascript">
//Create a boolean variable to check for a valid Internet Explorer instance.
    var xmlhttp = false;
//Check if we are using IE.
    try {
//If the Javascript version is greater than 5.
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//alert(xmlhttp);
//alert ("You are using Microsoft Internet Explorer.");
    } catch (e) {
        // alert(e);

//If not, then use the older active x object.
        try {
//If we are using Internet Explorer.
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer");
        } catch (E) {
//Else we must be using a non-IE browser.
            xmlhttp = false;
        }
    }
//If we are using a non-IE browser, create a javascript instance of the object.
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
//alert ("You are not using Microsoft Internet Explorer");
    }
    
    function find_sales_report(given_text, objID)
    {
        //alert(given_text);
        //var obj = document.getElementById(objID);
        serverPage = 'get_sales_report.php?text=' + given_text;
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function ()
        {
            //alert(xmlhttp.readyState);
            //alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                //alert(xmlhttp.responseText);
                document.getElementById(objID).innerHTML = xmlhttp.responseText;
                document.getElementById(objcw).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }
</script>

<?php    
    $sales_report_parent='';
    $customer_id='';
    $row='';

    if(isset($_POST['btn']))
    {
        $sales_report_parent=$obj_welcome->sales_report_parent_info($_POST);
    }
    
?>
<div class="common_wrap front_form_wrap" id="report_param_wrap">
    <div class="common_title">
        <h2>Sales Report Information</h2>
    </div>
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>Search Sales ID:<span class="required_field">*</span></label>
            <input type="text" name="search" required onchange="return find_sales_report(this.value,'res1')">
        </div>
        <div class="input_wrap">
            <label>Sales ID:<span class="required_field">*</span></label>
            <div id="res1"></div>
        </div>
        <div class="input_wrap">
            <label>&nbsp;</label>
            <input type="submit" name="btn" value="Search">
        </div>
    </form>
    <div class="home_link">
        <a href="index.php">Back</a>
    </div>
</div>
<div class="common_wrap">
    <?php include './view_pages/sales_report_info_content.php';?>
</div>