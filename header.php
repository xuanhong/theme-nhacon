<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width"/>
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>"/>
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link rel="shortcut icon" href="<?php echo get_theme_mod('upload_favicon'); ?>"/>
    <title><?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;

        wp_title('-', true, 'right');

        // Add the blog name.
        bloginfo('name');

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            echo " | $site_description";

        // Add a page number if necessary:
        if ($paged >= 2 || $page >= 2)
            echo ' | ' . sprintf(__('Page %s', 'aude'), max($paged, $page));

        ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

    <!-- GOOGLE WEB FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300italic,400italic,700italic'
          rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Vidaloka' rel='stylesheet' type='text/css'>

    <!-- IE Fix for HTML5 Tags -->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<!-- Top Bar -->
<div class="top">
    <div class="row">
        <div class="ten columns">
            <ul class="social">
                <?php if (get_theme_mod('facebook')) { ?>
                    <li>
                        <a href="<?php echo get_theme_mod('facebook'); ?>" title="facebook" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/facebook.png"
                                 alt="facebook">
                        </a>
                    </li>
                <?php } ?>
                <?php if (get_theme_mod('twitter')) { ?>
                    <li>
                        <a href="<?php echo get_theme_mod('twitter'); ?>" title="twitter" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/twitter.png"
                                 alt="twitter">
                        </a>
                    </li>
                <?php } ?>
                <?php if (get_theme_mod('pinterest')) { ?>
                    <li>
                        <a href="<?php echo get_theme_mod('pinterest'); ?>" title="pinterest" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/pinterest.png"
                                 alt="pinterest">
                        </a>
                    </li>
                <?php } ?>
                <?php if (get_theme_mod('googleplus')) { ?>
                    <li>
                        <a href="<?php echo get_theme_mod('googleplus'); ?>" title="googleplus" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/googleplus.png"
                                 alt="googleplus">
                        </a>
                    </li>
                <?php } ?>
                <?php if (get_theme_mod('flickr')) { ?>
                    <li>
                        <a href="<?php echo get_theme_mod('flickr'); ?>" title="flickr" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/flickr.png" alt="flickr">
                        </a>
                    </li>
                <?php } ?>
                <?php if (get_theme_mod('rss')) { ?>
                    <li>
                        <a href="<?php echo get_theme_mod('rss'); ?>" title="rss" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/rss.png" alt="rss">
                        </a>
                    </li>
                <?php } ?>
                <?php if (get_theme_mod('vimeo')) { ?>
                    <li>
                        <a href="<?php echo get_theme_mod('vimeo'); ?>" title="vimeo" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/vimeo.png" alt="vimeo">
                        </a>
                    </li>
                <?php } ?>
                <?php if (get_theme_mod('dribbble')) { ?>
                    <li>
                        <a href="<?php echo get_theme_mod('dribbble'); ?>" title="dribbble" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/dribbble.png"
                                 alt="dribbble">
                        </a>
                    </li>
                <?php } ?>
                <?php if (get_theme_mod('linkedin')) { ?>
                    <li>
                        <a href="<?php echo get_theme_mod('linkedin'); ?>" title="linkedin" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/linkedin.png"
                                 alt="linkedin">
                        </a>
                    </li>
                <?php } ?>
                <?php if (get_theme_mod('soundcloud')) { ?>
                    <li>
                        <a href="<?php echo get_theme_mod('soundcloud'); ?>" title="soundcloud" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/soundcloud.png"
                                 alt="soundcloud">
                        </a>
                    </li>
                <?php } ?>
                <?php if (get_theme_mod('behance')) { ?>
                    <li>
                        <a href="<?php echo get_theme_mod('behance'); ?>" title="behance" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/behance.png"
                                 alt="behance">
                        </a>
                    </li>
                <?php } ?>
                <?php if (get_theme_mod('youtube')) { ?>
                    <li>
                        <a href="<?php echo get_theme_mod('youtube'); ?>" title="youtube" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/youtube.png"
                                 alt="youtube">
                        </a>
                    </li>
                <?php } ?>
                <?php if (get_theme_mod('instagram')) { ?>
                    <li>
                        <a href="<?php echo get_theme_mod('instagram'); ?>" title="instagram" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/instagram.png"
                                 alt="instagram">
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <div class="two columns">
            <div class="row">
                <div class="eleven columns">
                    <?php get_template_part('searchform'); ?>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- End Top Bar -->


<!-- Header -->

<div class="row">
            <a href="<?php echo home_url('/'); ?>">
                <h1 class="text-center logo">
                    <?php if (get_theme_mod('upload_logo')) { ?>
                        <img src="<?php echo get_theme_mod('upload_logo'); ?>" alt="<?php bloginfo('name'); ?>"/>
                    <?php } else { ?>
                        <?php echo bloginfo('name'); ?>
                    <?php } ?>
                </h1></a>

            <p class="text-center motto"><?php bloginfo('description'); ?></p>
</div>
<!-- End Header -->


<!-- NAVIGATION -->
<div class="row">
    <div class="twelve columns">
        <nav>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header',
                'container' => '',
                'menu_id' => 'themenu',
                'menu_class' => 'sf-menu navigation'
            ));
            ?>


            <!-- DROPDOWN SELECT MENU FOR SMALL SCREENS -->
            <div class="medium button dropdown">
                Select
                <?php
                $menu_name = 'header';
                if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
                $menu = wp_get_nav_menu_object($locations[$menu_name]);
                $items = wp_get_nav_menu_items($menu->term_id);
                ?>
                <ul>
                    <?php foreach ($items as $list) {
                        if ($list->menu_item_parent != "0") { ?>
                            <li><a href="<?php echo esc_url($list->url); ?>">- <?php echo esc_attr($list->title); ?></a>
                            </li>
                        <?php } else { ?>
                            <li><a href="<?php echo esc_url($list->url); ?>"><?php echo esc_attr($list->title); ?></a>
                            </li>
                        <?php }
                    }
                    } ?>
                </ul>
            </div>
            <!-- END OF DROPDOWN SELECT MENU FOR SMALL SCREENS -->
        </nav>
    </div>
</div>

<!-- END OF NAVIGATION --> 