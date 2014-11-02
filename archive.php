<?php
get_header(); ?>


 <!-- Main Page Content and Sidebar -->

<div class="row"> 
<div class="twelve columns">
    <h1 class="archive_title">
            <?php if (is_category()) { ?>
              <span><?php single_cat_title(); ?></span>
            <?php } elseif (is_tag()) { ?> 
              <span><?php single_tag_title(); ?></span>
            <?php } elseif (is_author()) { ?>
              <span><?php _e("Author Archive", "aude"); ?></span> 
            <?php } elseif (is_day()) { ?>
              <span><?php _e("Daily Archive:", "aude"); ?> <?php the_time(get_option('date_format')); ?></span>
            <?php } elseif (is_month()) { ?>
              <span><?php _e("Monthly Archive:", "aude"); ?> <?php the_time('F Y'); ?></span>
            <?php } elseif (is_year()) { ?>
              <span><?php _e("Yearly Archive:", "aude"); ?> <?php the_time('Y'); ?></span>
            <?php } ?>
</h1>
</div>
</div>

   
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
      <h2 class="post_title"><span><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span></h2>
<p class="written"><?php _e('Bài viết của','aude'); ?> <?php the_author_posts_link(); ?>, <?php _e(' được đăng trong mục ', 'aude'); the_category(', ') ?></p>

      <?php
      get_template_part('format', esc_attr( $format ));
      ?> 

      <div class="row">
      <div class="maincontent">  
      <div class="twelve columns">
      <?php 
      $content_or_excerpt = get_theme_mod( 'content_or_excerpt' );
      if ($content_or_excerpt=='content') {
      the_content();
      } else {
      the_excerpt(); 
      ?>
      <div class="more"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_theme_mod( 'read_more' ); ?></a></div>
      <?php } ?>
      

      </div>
      </div>
      </div>
      </div>
      </article>

    </div>
       </div>
        
           </div>
         </div>
           <?php endwhile;?>
         <!-- End Post -->
<div class="row paging">
<div class="ten columns offset-by-two">
<?php if(function_exists('wp_pagenavi')) {?>
<?php wp_pagenavi(); ?>  
<?php } else {  ?>
   <div class="six columns">
     <div class="morenext"><?php previous_posts_link(__('Newer Entries &rarr;', 'aude')) ?></div>    
     </div>
     <div class="six columns">
     <div class="moreprevious"><?php next_posts_link(__('&larr; Older Entries', 'aude')) ?></div>           
</div>
<?php } ?> 
</div>
</div>   

  <?php } else { ?> 
<p><?php _e('Sorry, no posts matched your criteria.','aude'); ?></p>
<?php } ?>      
  </div>

<!-- SIDEBAR -->
<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
