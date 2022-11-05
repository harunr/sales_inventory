<?php
    $footer_info=$obj_welcome->select_footer_info();
    $footer_content= mysqli_fetch_assoc($footer_info);
?>
<div class="footer_wrap">
    <p>&copy;&nbsp;<?php echo $footer_content['footer_content'];?></p>
</div>
 </div>
</body>
</html>