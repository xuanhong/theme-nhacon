<?php
/*
YARPP Template: Simple
Author: mitcho (Michael Yoshitaka Erlewine)
Description: A simple example YARPP template.
*/
?><h3 class="p_related_post_title">Có thể bạn quan tâm?</h3>
<?php if (have_posts()):?>
<div class="yarpp-thumbnails-horizontal">
        <?php while (have_posts()) : the_post(); ?>
       
		
		<a class="yarpp-thumbnail" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
		<span class="yarpp-thumbnail-default"><?php the_post_thumbnail(); ?></span><span class="yarpp-thumbnail-title"><?php the_title(); ?></span></a>		
		
        <?php endwhile; ?>
</div>
<?php else: ?>
<p>No related posts.</p>
<?php endif; ?>

