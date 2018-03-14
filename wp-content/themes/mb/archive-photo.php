<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MB
 */

get_header(); ?>

    <section class="uk-section">
        <div class="uk-container">
            <h1 class="uk-text-center">
                Welcome to the Albums!
            </h1>
            <p class="uk-text-center">
                Слоган про Альбоми
            </p>
        </div>
    </section>

    <div class="uk-container uk-margin-medium-bottom">
    <div uk-grid>
        <div class="uk-width-1-1 uk-width-1-4@m">
            <?php echo render_template_part('archive-small-menu_part'); ?>
        </div>
        <div class="uk-width-1-1 uk-width-3-4@m">
            <div class="uk-grid-small mb-archive-page" uk-grid>
                <?php
                if (have_posts()) : ?>
                    <?php
                    /* Start the Loop */
                    while (have_posts()) : the_post();

                        {
                            render_partial('template-parts/1_4_album', ['post' => get_post()]);
                            
                        }
                    endwhile; ?>

                    <?php
                else :

                    get_template_part('template-parts/content', 'none');

                endif; ?>

            </div>

        </div>

    </div>
<?php echo render_template_part('spinner_3_4'); ?>
<?php
get_footer();
