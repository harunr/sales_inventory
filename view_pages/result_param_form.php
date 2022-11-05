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

    function exam_roll_student(given_text, objID)
    {
        //alert(given_text);
        //var obj = document.getElementById(objID);
        serverPage = 'find_exam_roll_student.php?text=' + given_text;
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
    $class_info=$obj_welcome->select_all_class();
    $education_year_info=$obj_welcome->select_education_year();
    $result_details='';
    $row='';
    $class_id='';
    $total_marks=0;
    $average_marks=0;    
if(isset($_POST['btn']))
{ 
    $result_details=$obj_welcome->result_details($_POST);
}
?>
<div class="common_wrap front_form_wrap">
    <div class="common_title">
        <h2>Result Search</h2>
    </div>
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>Education year:<span class="required_field">*</span></label>
            <select name="education_year_id" required exclude=" ">
                <option value=" ">Select Education Year.....</option>
                <?php
                    while ($row=  mysqli_fetch_assoc($education_year_info))
                    {
                ?>
                <option value="<?php echo $row['education_year_id']?>"><?php echo $row['education_year']?></option>
                <?php }?>
            </select>
        </div>
        <div class="input_wrap">
            <label>Class:<span class="required_field">*</span></label>
            <select name="class_id" required exclude=" " onchange="return exam_roll_student(this.value,'res1')">
                <option value=" ">Select Class.....</option>
                <?php
                    while ($row=  mysqli_fetch_assoc($class_info))
                    {
                ?>
                <option value="<?php echo $row['class_id']?>"><?php echo $row['class_id'].' '.$row['class_name']?></option>
                <?php }?>
            </select>
        </div>
        <div class="input_wrap">
            <label>Roll and Student:</label>
            <div id="res1"></div>
        </div>
        <div class="input_wrap">
            <label>&nbsp;</label>
            <input type="submit" name="btn" value="Result">
        </div>
    </form>
    <div class="home_link">
        <a href="index.php">Back</a>
    </div>
</div>
<?php
    if(!isset($_POST['class_id']))
    {
        return FALSE;
    }
    else 
    {
        include 'result_param_detail.php';
    }
