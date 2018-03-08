<?php
/*
 * =============================================================================
 * Template Name: Builder Template
 * Template Post Type: post, page, article, company,interview, advertising
 * =============================================================================
 */

get_header();
if (have_rows('content_builder')): ?>
    <div id="content_builder">
        <div class="container">
            <?php
            while (have_rows('content_builder')): the_row(); ?>
                <?php if (get_sub_field('title_block_top')): ?>
                    <h2 class="t-2"><?php the_sub_field('title_block_top'); ?>
                    </h2>
                <?php endif; ?>
                <div class="row row-flex">
                    <?php
                    if (have_rows('row_builder')): ?>
                        <?php
                        while (have_rows('row_builder')): the_row(); ?>

                            <?php
                            if (have_rows('post_list')) {
                                $posts = array();
                                while (have_rows('post_list')): the_row();
                                    $posts[] = get_sub_field('posts_builder');
                                endwhile;
                                render_partial('parts/' . get_sub_field('template_builder'), ['posts' => $posts]);
                            }
                            if (get_sub_field('post_builder')) {
                                render_partial('parts/' . get_sub_field('template_builder'), ['post' => get_sub_field('post_builder')]);
                            }
                            ?>
                        <?php endwhile; ?>
                    <?php endif; //if( get_sub_field('items') ): ?>
                </div>
            <?php endwhile; // while( has_sub_field('to-do_lists') ): ?>
        </div>
    </div>
<?php endif; // if( get_field('to-do_lists') ): ?>
<?php get_footer(); ?>