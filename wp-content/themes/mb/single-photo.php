<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vodolaha-info
 */

get_header(); ?>

    <div class="uk-container">
        <div class="uk-margin-medium-bottom" uk-grid>
            <div class="uk-width-1-1@m">
                <?php
                while (have_posts()) : the_post();

                    get_template_part('template-parts/content', 'page');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>

            </div>
        </div>
    </div>

<?php
get_footer();
?>