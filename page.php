<?php
get_header(); ?>

<div class="row">

<div class="nine columns">

 <!-- POSTS LOOP -->
<?php if ( have_posts() ) { while ( have_posts() ) : the_post(); ?>
 
<div class="row"> 
<div class="twelve columns">

<article> 
<div <?php post_class(); ?>>
<h2 class="post_title"><span><?php the_title(); ?></span></h2> 
<?php if ( has_post_thumbnail() ) { ?>     
<div class="featuredimage"><?php the_post_thumbnail( 'large' ); ?></div>
<?php } ?>   
<?php the_content();
wp_link_pages('before=<div id="postpaging">Pages:&after=</div>&pagelink=%' ); ?>
 </div> 
</article>

</div>
        
</div>  
 <?php
  endwhile;  
 }
  ?>

<!-- POSTS LOOP END --> 

</div>  

<!-- SIDEBAR -->
<?php get_sidebar(); ?>

</div>

</div>

<?php get_footer(); ?>