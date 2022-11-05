<div class="page_content">
    <?php 
        if($view_content){
        $data = mysqli_fetch_assoc($view_content);
        echo $data['page_content'];}
    ?>
</div>