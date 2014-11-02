<?php
get_header(); ?>


    <!-- Main Page Content and Sidebar -->
    <div class="main-feature">
        <div class="row">
            <div class="nine columns">
                <div class="row">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('left_sidebar')) :

                    endif; ?>
                </div>

            </div>
            <div class="three columns">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('top_right_sidebar')) :

                endif; ?>
            </div>
        </div>
    </div>
    <div class="row">

    <div class="nine columns">
    <div class="row">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('bottom_slider')) :

        endif; ?>
    </div>
    <!-- Post -->
    <!--            --><?php //if (have_posts()) {
    //                $i = 0;
    //                while (have_posts()) : the_post();
    ?>
    <!--                    --><?php
    //                    if (!get_post_format()) {
    //                        $format = 'standard';
    //                    } else {
    //                        $format = get_post_format();
    //                    }
    ?>
    <?php
    $root_categories = get_categories(array(
        'parent' => 0,
        'exclude' => array(1),
        'orderby' => 'id',
        'order' => 'ASC',
    ));
    ?>
    <?php foreach ($root_categories as $cat_name) { ?>
        <div class="row">
            <div class="twelve columns margin-bottom">
                <div class="section-head">
                    <div class="row">
                        <div class="twelve columns">
                            <div class="six columns">
                                <?php
                                echo $cat_name->name;
                                ?>
                            </div>
                            <div class="six columns">
                                <?php
                                $child_cat = (array(
                                    'child_of' => $cat_name->term_id,
                                    'order_by' => 'id',
                                    'order' => 'ASC',
//                                                    'exclude' => array(1),
                                    'number' => 2,
                                    'hide_empty' => 1
                                ));
                                ?>
                                <ul class="subcat_section">
                                    <?php foreach (get_categories($child_cat) as $key => $child) { ?>
                                        <?php if($child->count > 0) {?>
                                        <?php if ($key == 0) { ?>
                                            <li>
                                                <a rel="#tab-category-<?php echo $child->term_id; ?>"
                                                   class="tab-active-text tab-text">
                                                    <?php echo $child->cat_name; ?>
                                                </a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a rel="#tab-category-<?php echo $child->term_id; ?>"
                                                   class="tab-text">
                                                    <?php echo $child->cat_name; ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $lastest_posts = get_posts(array('category' => $cat_name->term_id, 'posts_per_page' => 1)); ?>
                <?php foreach ($lastest_posts as $posts) { ?>
                    <div class="six columns border-right">
                        <div class="row">
                            <div class="twelve columns">
                                <div class="image-feature">
                                    <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>

                                        <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($posts->ID), 'small-thumb'); ?>

                                        <img width="" height="242" class="lazy" src="<?php echo $thumb['0']; ?>"
                                             data-original="<?php echo $thumb['0']; ?>"/>



                                    <?php } ?>
                                </div>
                                <div class="section-author">
                                    <div class="row">
                                        <div class="six columns">
                                            <div class="time">
                                                <?php echo date("d/m/Y", strtotime($posts->post_date)); ?>
                                            </div>
                                        </div>
                                        <div class="six columns">
                                            <div class="author">
                                                <?php echo the_author_meta('first_name', $posts->post_author); ?>
                                                <?php echo the_author_meta('last_name', $posts->post_author); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="twelve columns">
                                <h2 class="section-widget-title">
                                    <a href="<?php echo get_permalink($posts->ID); ?>">
                                        <?php echo $posts->post_title; ?>
                                    </a>
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="twelve columns">
                                <div class="content-posts">
                                    <p>
                                        <?php echo fr_excerpt_by_id($posts->ID, 60, FALSE); ?>
                                    </p>

                                </div>


                            </div>
                        </div>

                    </div>
                <?php } ?>
                <div class="six columns post-category-ctn">
                <?php foreach (get_categories($child_cat) as $nb => $child_post) { ?>
                    <?php if($child_post->count > 0) { ?>
                <div id="tab-category-<?php echo $child_post->term_id; ?>"
                     class="<?php if ($nb == 0) echo 'tab-active'; ?> post-category-tab">
                    <?php $post_with_cat = get_posts(array(
                        'category' => $child_post->term_id,
                        'posts_per_page' => 5,
                        'orderby' => 'id',
                        'order' => 'DESC'
                    )); ?>

                    <?php foreach ($post_with_cat as $details) { ?>
                            <div class="row post-category">

                                <div class="four columns">
                                    <div class="image-feature-subcat">
                                        <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>

                                            <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($details->ID), 'small-thumb'); ?>

                                            <img class="lazy" src="<?php echo $thumb['0']; ?>"
                                                 data-original="<?php echo $thumb['0']; ?>"/>



                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="eight columns border-bottom">
                                    <div class="date-sub-cat">
                                        <div class="time-subcat six columns">
                                            <p>
                                                <?php echo date("d/m/Y", strtotime($details->post_date)); ?>
                                            </p>
                                        </div>
                                        <div class="author-subcat six columns">
                                            <p>
                                                <?php echo the_author_meta('first_name', $details->post_author); ?>
                                                <?php echo the_author_meta('last_name', $details->post_author); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="title-sub-cat">
                                        <p>
                                            <a href="<?php echo get_permalink($details->ID); ?>">
                                                <?php echo $details->post_title; ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>

                            </div>


                    <?php } ?>
                </div>
                    <?php } ?>
                <?php } ?>
                </div>
            </div>
        </div>

    <?php } ?>
    <!-- End Post -->
    <div class="row paging collapse">
        <div class="ten columns offset-by-two">
            <?php if (function_exists('wp_pagenavi')) { ?>
                <?php wp_pagenavi(); ?>
            <?php } else { ?>

                <div class="six columns">
                    <div
                        class="moreprevious"><?php next_posts_link(__('&larr; Older Entries', 'aude')) ?></div>
                </div>
                <div class="six columns">
                    <div
                        class="morenext"><?php previous_posts_link(__('Newer Entries &rarr;', 'aude')) ?></div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!--            --><?php //} else { ?>
    <!--                <p>--><?php //_e('Sorry, no posts matched your criteria.', 'aude'); ?><!--</p>-->
    <!--            --><?php //} ?>
    </div>

    <!-- SIDEBAR -->
    <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>