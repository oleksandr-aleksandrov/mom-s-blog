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
        <div class="container uk-container-small">
            <h1 class="text-center">
                <?php $taxonomies = get_the_terms(get_the_ID(), 'news-category');
                $taxonomies_photo = get_the_terms(get_the_ID(), 'photo_category');
                if (!empty($taxonomies)) :
                    $taxonomies = get_the_terms(get_the_ID(), 'news-category');
                    foreach ($taxonomies as $taxonomy) :
                        ?>
                        #<?php echo $taxonomy->name; ?>
                        <?php
                    endforeach;
                endif;
                if (!empty($taxonomies_photo)) :
                    $taxonomies_photo = get_the_terms(get_the_ID(), 'photo_category');
                    foreach ($taxonomies_photo as $taxonomy_photo) :
                        ?>
                        #<?php echo $taxonomy_photo->name; ?>
                        <?php
                    endforeach;
                endif; ?>
            </h1>
        </div>
    </section>

    <div class="container mb-3">
    <div class="row">
    <div class="col-md-3">
        <?php echo render_template_part('archive-small-menu_part'); ?>
    </div>
<?php if ((is_tax('news-category'))): ?>
    <div class="mb-archive-page col-12 col-md-9">
    <?php elseif ((is_tax('photo_category'))): ?>
    <div class="col-12 col-md-9">
    <div class="uk-grid-small mb-archive-page">
<?php endif; ?>
<?php
if (have_posts()) : ?>

    <?php
    /* Start the Loop */
    while (have_posts()) : the_post();

        switch (get_post_type()) {
            case 'vi_news':
                render_partial('template-parts/news_content', ['post' => get_post()]);
                break;
            case 'photo':
                render_partial('template-parts/1_4_album', ['post' => get_post()]);
                break;

        }

    endwhile; ?>

    <?php
else :

    echo '<p>' . 'Постiв не знайдено' . '</p>';

endif; ?>
    </div>
<?php if ((is_tax('photo_category'))): ?>
    </div>
<?php endif; ?>
    </div>
<?php echo render_template_part('spinner_3_4'); ?>
<?php
get_footer();