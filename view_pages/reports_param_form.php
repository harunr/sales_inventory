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

    function find_supplier(given_text, objID)
    {
        //alert(given_text);
        //var obj = document.getElementById(objID);
        serverPage = 'supplier_info.php?text=' + given_text;
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
    require_once './classes/welcome.php';    
    $obj_welcome=new Welcome();
    $supplier_info=$obj_welcome->select_all_supplier(); 

    if(isset($_POST['btn']))
        { 
            $supplier_payments_detail=$obj_welcome->supplier_payments($_POST);
        }
?>
<div class="common_wrap front_form_wrap">
    <div class="common_title">
        <h2>Supplier Payments</h2>
    </div>
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>Supplier:<span class="required_field">*</span></label>
            <select name="supplier_id" required exclude=" " onchange="return find_supplier(this.value,'res1')">
                <option value=" ">Select Supplier.....</option>
                <?php
                    while ($row=mysqli_fetch_assoc($supplier_info))
                    {
                ?>
                <option value="<?php echo $row['supplier_id']?>"><?php echo $row['first_name']?></option>
                <?php }?>
            </select>
        </div>
        <div class="input_wrap">
            <label>Supplier ID:</label>
            <div id="res1"></div>
        </div>
        <div class="input_wrap">
            <label>&nbsp;</label>
            <input type="submit" name="btn" value="Result">
        </div>
    </form>    
</div>
<?php
    if(!isset($_POST['supplier_id']))
    {
        return FALSE;
    }
    else 
    {
        include 'reports_param_form.php';
    }