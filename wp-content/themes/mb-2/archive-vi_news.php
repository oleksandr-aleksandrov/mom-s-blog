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
                Welcome to the Blog
            </h1>
            <p class="text-center">
                Слоган про свiй БЛОГ
            </p>
        </div>
    </section>

    <div class="container mb-4">
    <div class="row">
        <div class="col-md-3 uk-visible@m">
            <?php echo render_template_part('archive-small-menu_part'); ?>
        </div>
        <div class="mb-archive-page col-md-9">
            <?php
            if (have_posts()) : ?>

                <?php
                /* Start the Loop */
                while (have_posts()) : the_post();

                    render_partial('template-parts/news_content', ['post' => get_post()]);

                endwhile; ?>

                <?php
            else :

                get_template_part('template-parts/content', 'none');

            endif; ?>
        </div>


    </div>
<?php echo render_template_part('spinner_3_4'); ?>
<?php
get_footer();
