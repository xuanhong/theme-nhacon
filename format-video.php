<?php if ( get_post_meta($post->ID, 'video', true) ) { ?>
<div class="flex-video widescreen">     
<?php echo get_post_meta($post->ID, 'video', true) ?>
</div>    
<?php } ?>