<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vodolaha-info
 */

get_header(); ?>
    <div class="uk-container">
        <div uk-grid>
            <?php
            if (have_posts()) :


            the_archive_title('<h1 class="page-title">', '</h1>');
            ?>
        </div>
        <div class="uk-grid-small uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-margin-medium-bottom"
             uk-grid>
            <?php
            /* Start the Loop */
            while (have_posts()) : the_post(); ?>
                <div class="uk-height-medium">
                    <div class="uk-photoalbum-item uk-position-relative uk-flex uk-flex-middle uk-flex-center"
                         style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'home-news-thumbnail'); ?>')">
                        <a href="<?php echo get_permalink($post) ?>" class="uk-position-cover">
                            <h2 class="uk-margin-remove"><?php the_title(); ?></h2>
                        </a>
                    </div>
                </div>


            <?php endwhile;
            ?>
        </div>
        <?php

        //custom_paginate_links();
        else :

            get_template_part('template-parts/content', 'none');

        endif; ?>


    </div>
<?php
get_footer();