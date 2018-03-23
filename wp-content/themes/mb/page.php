<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MB
 */

get_header(); ?>


    <section class="uk-section">
        <div class="uk-container">
            <h1 class="uk-text-center">
                <?php the_title(); ?>
            </h1>

        </div>
    </section>
    <div class="uk-container uk-container-small">
        <div uk-grid>
            <?php
            while (have_posts()) : the_post();
                the_content();

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>
        </div>
    </div>

<?php
get_sidebar();
get_footer();
