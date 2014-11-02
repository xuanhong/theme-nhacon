<?php if ( has_post_thumbnail() ) { 
      if (is_single()) { 
      $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );    ?>         
<div class="featuredimage"><a href="<?php echo $url; ?>"  title="<?php the_title(); ?>" class="fancybox"><?php the_post_thumbnail( 'large' ); ?></a></div>
<?php } else { ?>
<div class="featuredimage"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'large' ); ?></a></div>
<?php } } ?>