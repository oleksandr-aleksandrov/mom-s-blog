<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MB
 */

get_header(); ?>

    <section class="mb-section">
        <div class="container">
            <h1 class="text-center">
                Welcome to the Albums!
            </h1>
            <p class="text-center">
                Слоган про Альбоми
            </p>
        </div>
    </section>

    <div class="container mb-3">
    <div class="row">
        <div class="col-md-3">
            <?php echo render_template_part('archive-small-menu_part'); ?>
        </div>
        <div class="col-md-9">
            <div class="mb-archive-page">
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
