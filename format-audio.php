<?php 
if ( get_post_meta($post->ID, 'audio', true) ) {   
echo get_post_meta($post->ID, 'audio', true);
}
?>