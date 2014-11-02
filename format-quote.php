<div class="quote">
<?php 
if ( get_post_meta($post->ID, 'quote', true) ) {  
?> 
<p><?php echo get_post_meta($post->ID, 'quote', true); ?></p>
<?php } ?>
<?php if ( get_post_meta($post->ID, 'cite', true) ) { ?>
<cite>
<?php echo get_post_meta($post->ID, 'cite', true) ?>
</cite>
<?php } ?> 
       
</div>