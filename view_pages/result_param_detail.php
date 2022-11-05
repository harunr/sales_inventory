<?php
    $education_year=$obj_welcome->select_education_year();
    $row_1=mysqli_fetch_assoc($education_year);
?>
<div class="common_wrap result_detail">
    <div class="common_title">
        <h2>Result Details of Education Year <?php echo $row_1['education_year']; ?></h2>
    </div>
    <table>
        <tr>
            <th class="th_0">Sl. No.</th>
            <th class="th_1">Exam Roll</th>
            <th class="th_2">Full Name</th>
            <th class="th_6">Class</th>
            <th class="th_3">Bangla</th>
            <th class="th_3">English</th>
            <th class="th_3">Math</th>            
            <th class="th_4">Total Marks</th>
            <th class="th_5">Grade</th>
        </tr>
        <?php
            $i=0;
            while ($row=  mysqli_fetch_assoc($result_details))
            {$i++;
        ?>
        <tr>
            <td class="td_0"><?php echo $i;?></td>
            <td class="td_1"><?php echo $row['exam_roll_id']?></td>
            <td class="td_2"><?php echo $row['first_name'].' '.$row['last_name']?></td>
            <td class="td_6"><?php echo $row['class_name']?></td>
            <td class="td_3"><?php echo $row['bangla']?></td>
            <td class="td_3"><?php echo $row['english']?></td>
            <td class="td_3"><?php echo $row['math']?></td>
            <td class="td_4">
                <?php
                    $total_marks=floatval($row['bangla'])+floatval($row['english'])+floatval($row['math']);
                    echo $total_marks;
                ?>
            </td>
            <td class="td_5">
                <?php
                    $average_marks=$total_marks/3;
                    $average_marks;
                    if($average_marks>79)
                    {
                        Echo 'A';
                    }
                    if ($average_marks>69 && $average_marks<80)
                    {
                        Echo 'B';
                    }
                    if ($average_marks>59 && $average_marks<70)
                    {
                        Echo 'C';
                    }
                    if ($average_marks>49 && $average_marks<60)
                    {
                        Echo 'D';
                    }
                    if ($average_marks<50)
                    {
                        Echo 'F';
                    }                   
                ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>