<?php
get_header(); ?>


 <!-- Main Page Content and Sidebar -->

   
  <div class="row">
   
   <div class="nine columns">
       <!-- Post -->
<?php if ( have_posts() ) { while ( have_posts() ) : the_post(); ?>
<?php
  if(!get_post_format()) {
  $format = 'standard';
  } else {
  $format = get_post_format();
  }
  ?>  
       <div class="row">
       <div class="twelve columns">
       <div class="row">
       <div class="two columns">
        <div class="row">
        <div class="twelve columns">
        
        <div class="info">
        <p class="text-right day"><?php the_time('l') ?></p>
        <h3 class="text-right"><?php the_time('j') ?></h3>
        <p class="text-right month"><?php the_time('F Y') ?></p>
        </div>

         <div class="info">
        <h3 class="text-right"><a href="<?php the_permalink(); ?>/#comments"><?php comments_number(__('0','aude'),__('1','aude'),__( '%','aude') );?></a></h3>
        <p class="text-right"><?php _e('COMMENTS','aude'); ?></p>
        </div>
   
             </div>
             </div>
             </div>

    <div class="ten columns">

      <article>
      <div <?php post_class(); ?>>
      <h2 class="post_title"><span><?php the_title(); ?></span></h2>
<p class="written"><?php _e('Bài viết của','aude'); ?> <?php the_author_posts_link(); ?>, <?php _e(' được đăng trong mục ', 'aude'); the_category(', ') ?></p>

      <?php
      get_template_part('format', esc_attr( $format ));
      ?> 

      <div class="row">
      <div class="maincontent">  
      <div class="twelve columns">
      <?php 
	the_content();
       wp_link_pages('before=<div id="postpaging">Pages:&after=</div>&pagelink=%' );
       if (get_the_tags()) {
      ?>
      <p class="tags"><?php  the_tags('', ' ', ''); ?></p> 
      <?php } ?> 
      
      <div class="prevnext">
        <div class="row">
       <div class="six columns">
       <?php previous_post_link(); ?>
       </div>
       <div class="six columns text-right">
       <?php next_post_link(); ?>
       </div>
       </div>
       </div> 
      </div>

      </div>
      </div>

      </div>
      </article>

      <div class="comments">
      <?php comments_template(); ?>
      </div>

    </div>
       </div>
        
           </div>
         </div>
           <?php endwhile;?>
         <!-- End Post -->

  <?php } else { ?> 
<p><?php _e('Sorry, no posts matched your criteria.','aude'); ?></p>
<?php } ?> 



  </div>


<!-- SIDEBAR -->
<?php get_sidebar(); ?>

</div>
<?php get_footer(); ?>
