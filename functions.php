<?php

add_action('after_setup_theme', 'aude_theme_setup');

function aude_theme_setup()
{

// ENQUEUE NECESSARY JAVASCRIPT FILES

    function aude_add_my_scripts()
    {
        if (!is_admin()) {
            wp_enqueue_script('modernizr', get_template_directory_uri() . '/javascripts/modernizr.foundation.js', array(), '', false);
            wp_enqueue_script("jquery", false);
            wp_enqueue_script('foundation', get_template_directory_uri() . '/javascripts/foundation.min.js', array(), '', true);
            wp_enqueue_script('hoverIntent', get_template_directory_uri() . '/javascripts/hoverIntent.js', array(), '', true);
            wp_enqueue_script('superfish', get_template_directory_uri() . '/javascripts/superfish.js', array(), '', true);
            wp_enqueue_script('flexslider', get_template_directory_uri() . '/javascripts/jquery.flexslider.js', array('jquery'), '', true);
            wp_enqueue_script('fancybox', get_template_directory_uri() . '/javascripts/source/jquery.fancybox.js', array('jquery'), '', true);
            wp_enqueue_script('fancyboxmedia', get_template_directory_uri() . '/javascripts/source/helpers/jquery.fancybox-media.js', array('jquery'), '', true);
            wp_enqueue_script('app', get_template_directory_uri() . '/javascripts/app.js', array('foundation', 'jquery'), '', true);
            wp_enqueue_script('dropdown', get_template_directory_uri() . '/javascripts/jquery.foundation.buttons.js', array('foundation', 'app', 'jquery'), '', true);
            if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply');
        }
    }

    add_action('wp_enqueue_scripts', 'aude_add_my_scripts');

// ENQUEUE CSS FILES

    function aude_theme_styles()
    {
        wp_register_style('foundation', get_template_directory_uri() . '/stylesheets/foundation.css');
        wp_register_style('aude-layout', get_template_directory_uri() . '/style.css');
        wp_register_style('superfishcss', get_template_directory_uri() . '/stylesheets/superfish.css');
        wp_register_style('flexslider', get_template_directory_uri() . '/stylesheets/flexslider.css');
        wp_register_style('fancybox', get_template_directory_uri() . '/javascripts/source/jquery.fancybox.css');

        wp_enqueue_style('fancybox');
        wp_enqueue_style('foundation');
        wp_enqueue_style('aude-layout');
        wp_enqueue_style('superfishcss');
        wp_enqueue_style('flexslider');
    }

    add_action('wp_enqueue_scripts', 'aude_theme_styles');

// TRANSLATION - LOCALIZATION

    load_theme_textdomain('aude', get_template_directory() . '/languages');

    $locale = get_locale();
    $locale_file = get_template_directory() . "/languages/$locale.php";
    if (is_readable($locale_file))
        require_once($locale_file);

// CONTENT WIDTH

    $content_width = 745;

// REGISTER MENUS

    add_theme_support('menus');
    register_nav_menu('header', 'Main Menu');

// POST FORMATS

    add_theme_support('post-formats', array('image', 'video', 'gallery', 'audio', 'quote'));

// LOAD WP THEME CUSTOMIZER 

    require_once(dirname(__FILE__) . "/lib/wp_customizer.php");

// EXCERPT LENGTH

    function aude_excerpt_length($length)
    {
        $length = get_theme_mod('excerpt_length');
        return $length;
    }

    add_filter('excerpt_length', 'aude_excerpt_length');

// FEED LINKS

    add_theme_support('automatic-feed-links');


// DYNAMIC SIDEBAR

    if (function_exists('register_sidebars'))

        register_sidebar(array(
            'name' => 'Sidebar',
            'id' => 'right_sidebar',
            'description' => 'Widgets in this area will be shown on the sidebar of all pages.',
            'before_widget' => '<div class="row sidebar"><div class="twelve columns">',
            'after_widget' => '</div></div>',
            'before_title' => '<h4>',
            'after_title' => "</h4>"
        ));
    register_sidebar(array(
            'name' => 'Bottom Slider',
            'id' => 'bottom_slider',
            'description' => 'Left position bottom slider',
            'before_widget' => '<div class="twelve columns">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => "</h4>"
        ));
    register_sidebar(array(
        'name' => 'Left sidebar',
        'id' => 'left_sidebar',
        'description' => 'Widgets in this area will be shown on the sidebar of all pages.',
        'before_widget' => '<div class="twelve columns"> ',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => "</h4>"
    ));
    register_sidebar(array(
        'name' => 'Top Right sidebar',
        'id' => 'top_right_sidebar',
        'description' => 'Widgets in this area will be shown on the sidebar of all pages.',
        'before_widget' => '<div class="row sidebar"><div class="twelve columns">',
        'after_widget' => '</div></div>',
        'before_title' => '<h4>',
        'after_title' => "</h4>"
    ));


// POST THUMBNAILS

    add_theme_support('post-thumbnails');

// POST IMAGE ATTACHMENTS TO FLEXSLIDER

    function aude_attachment_box($audesize = large)
    {

        if ($audeimages = get_children(array(
            'post_parent' => get_the_ID(),
            'post_type' => 'attachment',
            'numberposts' => -1, // show all
            'post_status' => null,
            'post_mime_type' => 'image',
            'orderby' => 'menu_order'
        ))
        ) {
            foreach ($audeimages as $audeimage) {
                $audeimg = wp_get_attachment_image($audeimage->ID, $audesize);
                $audeurl = wp_get_attachment_url($audeimage->ID);
                $audeid = get_the_ID($audeimage->post_parent);
                echo '<li><a href="' . $audeurl . '" class="fancybox" data-fancybox-group="gallery' . $audeid . '">' . $audeimg . '</a></li>';
            }
        }
    }

// CUSTOM COMMENTS TEMPLATE

    function aude_comment($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
    <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
        <div class="comment-author vcard">
            <?php echo get_avatar($comment->comment_author_email, 48); ?>
            <?php printf(__('<cite class="fn">%s</cite>', 'aude'), get_comment_author_link()) ?>
        </div>
        <div class="comment-time"><a
                href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>"><?php comment_date(get_option('date_format')); ?>
                - <?php comment_time('H:i:s'); ?></a></div>
        <?php if ($comment->comment_approved == '0') : ?>
            <p><em><?php _e('Your comment is awaiting moderation.', 'aude') ?></em></p>
        <?php endif; ?>
        <div class="comment-meta commentmetadata">
            <?php comment_text() ?>
            <div class="reply">
                <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
        </div>


    <?php
    }


// NEXT / PREVIOUS LINKS NOFOLLOW

    function pagination_add_nofollow($content)
    {
        return 'rel="nofollow"';
    }

    add_filter('next_posts_link_attributes', 'pagination_add_nofollow');
    add_filter('previous_posts_link_attributes', 'pagination_add_nofollow');


// CATEGORY LINKS NOFOLLOW

    add_filter('the_category', 'nofollow_category');
    function nofollow_category($text)
    {
        $text = str_replace('rel="category tag"', 'rel="nofollow"', $text);
        return $text;
    }

// AUTHOR LINKS NOFOLLOW

    add_filter('the_author_posts_link', 'aude_nofollow_author');
    function aude_nofollow_author($link)
    {
        return str_replace('<a rel="author" href=', '<a rel="nofollow" href=', $link);
    }


// REDIRECT FEED TO FEEDBURNER

    if (get_theme_mod('feedburner_url')) {
        function aude_rss_redirect()
        {

            global $rssfeed;
            $feedburner_feed = get_theme_mod('feedburner_url');

            if (!is_feed()) {
                return;
            }
            if (preg_match('/feedburner/i', $_SERVER['HTTP_USER_AGENT'])) {
                return;
            }

            if ($rssfeed != 'comments-rss2') {
                if (function_exists('status_header')) status_header(302);
                header("Location:" . $feedburner_feed);
                header("HTTP/1.1 302 Temporary Redirect");
                exit();
            }
        }

        add_action('aude_template_redirect', 'aude_rss_redirect');
    }

    function new_excerpt_length($length) {
        return 70;
    }
    function excerpt_ellipse($text) {
        return str_replace('[...]', ' <a href="'.get_permalink().'">Read More</a>', $text);
    }
//    Return the excerpt by post ID
    function fr_excerpt_by_id($post_id, $excerpt_length = 35, $line_breaks = TRUE){
        $the_post = get_post($post_id); //Gets post ID
        $the_excerpt = $the_post->post_excerpt ? $the_post->post_excerpt : $the_post->post_content; //Gets post_excerpt or post_content to be used as a basis for the excerpt
        $the_excerpt = apply_filters('the_excerpt', $the_excerpt);
        $the_excerpt = $line_breaks ? strip_tags(strip_shortcodes($the_excerpt), '<p><br>') : strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
        $words = explode(' ', $the_excerpt, $excerpt_length + 1);
        if(count($words) > $excerpt_length) :
            array_pop($words);
            array_push($words, '…');
            $the_excerpt = implode(' ', $words);
            $the_excerpt = $line_breaks ? $the_excerpt . '</p>' : $the_excerpt;
        endif;
        $the_excerpt = trim($the_excerpt);
        return $the_excerpt;
    }
    add_filter('the_excerpt', 'excerpt_ellipse');
    add_filter('excerpt_length', 'new_excerpt_length');
}

?>