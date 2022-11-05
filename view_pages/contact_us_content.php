<div class="view_content">
    <div class="common_title"><h3>Contact Us</h3></div>
    <?php
        if(isset($view_content))
        {include 'page_content.php';}
    ?>
</div>
<?php
    if(isset($_POST['btn']))
    {$message=$obj_welcome->save_contact($_POST);}
?>
<div class="home_detail_wrap box">
    <div class="common_title">
        <h4>Contact Information</h4>
    </div>
    <h2>
        <?php
            if(isset($message))
            {
                echo $message;
                unset($message);
            }
        ?>
    </h2>
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
        <div class="input_wrap">
            <label>Full Name:<span class="required_field">*</span></label>
            <input type="text" name="full_name" placeholder="Full Name" maxlength="100" required regexp="JSVAL_RX_ALPHA" err="Please Enter Valide Full Name">
        </div>
        <div class="input_wrap">
            <label>Email Address:<span class="required_field">*</span></label>
            <input type="email" name="email_address" placeholder="Email Address" maxlength="100" required regexp="JSVAL_RX_EMAIL" err="Please Enter Valide Email Address">
        </div>
        <div class="input_wrap">
            <label>Contact Number:<span class="required_field">*</span></label>
            <input type="text" name="contact_no" required regexp="JSVAL_RX_NUMERIC" err="Please Enter Valide Contact Number" placeholder="Contact No" maxlength="11">
        </div>
        <div class="input_wrap text_wrap">
            <label>Comments:</label>
            <textarea name="comments"></textarea>
        </div>
        <div class="input_wrap">
            <label>&nbsp;</label>
            <input type="submit" name="btn" value="Submit">
        </div>
    </form>
</div>
<?php
    $menu_id='6';
    $query_result=$obj_welcome->select_front_content_by_menu_id($menu_id);
    $front_content_view=mysqli_fetch_assoc($query_result);
?>
<div class="front_content_wrap box">
    <div class="common_title">
        <h4><?php echo $front_content_view['front_content_title']; ?></h4>
    </div>
    <div class="common_description">
        <div class="front_image">
            <img src="./admin/<?php echo $front_content_view['front_content_image'];?>" alt="image">
        </div>
        <div class="front_description">
            <p><?php echo $front_content_view['front_content_description'];?></p>
        </div>
    </div>
</div>
<div class="home_link margin_bottom">
    <a href="index.php">Back</a>
</div>