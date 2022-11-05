<?php
require_once './classes/welcome.php';
$obj_welcome=new Welcome();
$class_id=$_GET['text'];
$education_year=$obj_welcome->select_education_year();
$education_year_id= mysqli_fetch_array($education_year);
$exam_roll_info=$obj_welcome->select_all_exam_roll($class_id);
?>
<select name="exam_roll_id">
    <option value="0">Select Exam Roll.....</option>
    <?php
        while ($row=  mysqli_fetch_assoc($exam_roll_info))
        {
    ?>
    <option value="<?php echo $row['exam_roll_id']?>"><?php echo 'Roll'.' '.'--'.' '.$row['exam_roll_id'].' '.'--'.' '.' '.$row['first_name'].' '.$row['last_name']?></option>
    <?php }?>
</select>