<div class="view_content">
    <div class="common_title"><h3>Home</h3></div>
    <?php
        if(isset($view_content))
        {include 'page_content.php';}
    ?>
</div>
<?php
    $menu_id='1';
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