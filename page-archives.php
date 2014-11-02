<?php
/*
Template Name: Archives Page
*/
?>

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
<ul class="accordion">

     <li class="active">
    <div class="title">
       <h5><?php _e('Latest Posts','aude'); ?></h5>
    </div>
    <div class="content">
      <ul><?php wp_get_archives('type=postbypost&limit=20'); ?></ul>
    </div>
  </li>


  <li>
    <div class="title">
      <h5><?php _e('Daily Archives','aude'); ?></h5>
    </div>
    <div class="content">
      <ul class="disc"><?php wp_get_archives('type=daily&limit=20'); ?></ul>
    </div>
  </li>
  
    <li>
    <div class="title">
       <h5><?php _e('Monthly Archives','aude'); ?></h5>
    </div>
    <div class="content">
      <ul class="disc"><?php wp_get_archives('type=monthly&limit=12'); ?></ul>
    </div>
  </li>

   <li>
    <div class="title">
       <h5><?php _e('Yearly Archives','aude'); ?></h5>
    </div>
    <div class="content">
      <ul class="disc"><?php wp_get_archives('type=yearly&limit=5'); ?></ul>
    </div>
  </li>

    
    <li>
    <div class="title">
       <h5><?php _e('Categories','aude'); ?></h5>
    </div>
    <div class="content">
      <ul class="disc"><?php wp_list_categories('orderby=name&title_li='); ?> </ul>
    </div>
  </li>

    <li>
    <div class="title">
       <h5><?php _e('Pages','aude'); ?></h5>
    </div>
    <div class="content">
      <ul class="disc"><?php wp_list_pages('sort_column=menu_order&title_li='); ?> </ul>
    </div>
  </li>

</ul>
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