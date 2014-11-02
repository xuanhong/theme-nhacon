<?php 
if (strpos($post->post_content,'[gallery') === false){
?>
<div class="flexslider">
  <ul class="slides">
    <?php aude_attachment_box('full'); ?>
  </ul>
</div>
<?php }  ?>