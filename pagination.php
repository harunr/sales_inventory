<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == ' ' || $page == '1') {
        $page_one = 0;
    } else {
        $page_one = ($page * 5) - 5;
    }
}

$sql = "SELECT * FROM tbl_student LIMIT $page_one,5";
$query_result = mysql_query($sql);
?>
<html>
    <head>

    </head>
    <body>
        <table border="1" width="500" align="center">
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Mobile Number</th>
            </tr>
            <?php while ($student_info = mysql_fetch_assoc($query_result)) { ?>
                <tr>
                    <td><?php echo $student_info['student_id']; ?></td>
                    <td><?php echo $student_info['student_name']; ?></td>
                    <td><?php echo $student_info['mobile_number']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <?php
        $sql = "SELECT * FROM tbl_student";
        $query_result = mysql_query($sql);

        $total_row = mysql_num_rows($query_result);
        echo $total_row . '<br/>';
        $per_page = $total_row / 5;
        echo $per_page . '<br/>';
        $n = ceil($per_page);
        echo $n . '<br/>';

        for ($i = 1; $i <= $n; $i++) {
            ?><a href="?page=<?php echo $i; ?>" style="text-decoration: none;"><?php echo $i . ' '; ?></a><?php
        }
        ?>
    </body>
</html>