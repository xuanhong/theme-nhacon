<?php
 
// DO NOT DELETE
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
 
if ( post_password_required() ) { ?>
<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
return;
}
?>

<!-- START EDITING -->

<?php if ( have_comments() ) { ?>
<div id="comments">
<h2 class="post_title"><span><?php comments_number(__('No Comments','aude'),__('1 Comment','aude'),__( '% Comments','aude') );?><span></h2> 

<ol class="commentlist">

<?php wp_list_comments('type=comment&callback=aude_comment'); ?>
 
</ol>
<div class="commentspagination">
    <?php paginate_comments_links(); ?>
</div>
</div>
<?php } else { ?>
 
<?php if ('open' == $post->comment_status) { ?>

<?php } else { ?>
<p class="nocomments"></p>
 
<?php } } ?>
<?php if ('open' == $post->comment_status) { ?>
<div id="addcomments">
<div id="respond">
<?php comment_form(); ?>
</div>
</div>
<?php } ?>