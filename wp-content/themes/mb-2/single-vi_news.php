<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vodolaha-info
 */

get_header(); ?>


<?php
//require_once("social.php");
//?>
    <div class="container uk-container-small">
        <div class="row mb-3">
            <div class="col-md-12">
                <?php
                while (have_posts()) :
                    the_post(); ?>
                    <article>
                        <header class="uk-article-header">
                            <div class="uk-title-wrapper">
                                <h1><?php the_title(); ?></h1>
                                <?php echo render_template_part('article_post_meta'); ?>
                            </div>
                        </header>
                        <picture>
                            <source srcset="<?php the_post_thumbnail_url('archive_photo_thumbnails'); ?>"
                                    media="(max-width: 580px)">
                            <source srcset="<?php the_post_thumbnail_url('single_photo_thumbnails'); ?>">
                            <img class="img-fluid mb-4"
                                 src="<?php the_post_thumbnail_url('single_photo_thumbnails'); ?>"
                                 alt="<?php the_post_thumbnail_caption(); ?>">
                            <?php the_content(); ?>
                    </article>
                    </picture>
                    <?php

                endwhile; // End of the loop.
                ?>

            </div>
        </div>
    </div>
    <div class="container position-relative uk-navigation-single-news">
        <?php
        $post_nav = get_the_post_navigation(array(
            'screen_reader_text' => ' ',
            'prev_text' => '<span class="uk-prev-post"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>' .
                '<span class="post-title">%title</span>' .
                '<span class="mobile-post-title">Попередній пост</span>',
            'next_text' => '<span class="uk-next-post"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>' .
                '<span class="post-title">%title</span>' .
                '<span class="mobile-post-title">Наступний пост</span>',
        ));

        echo $post_nav;
        ?>
    </div>
<?php echo render_template_part('sharelist_item_part'); ?>
<?php
global $post;
//$news = get_posts([
//    'numberposts' => 6,
//    'post_type' => 'vi_news',
//    'orderby' => 'rand',
//    'exclude' => $post->ID
//]);

$news_categories = wp_get_post_terms(get_the_ID(), 'news-category');

if ($news_categories) {
    $news_categories_ids = array();
    foreach ($news_categories as $news_category) $news_categories_ids = $news_category->term_id;

    $news_posts = get_posts(
        array(
            'numberposts' => 6,
            'taq_query' => array(
                'taxonomy' => 'news-category',
                'terms' => $news_categories_ids,
                'field' => 'term_id'
            ),
            'post__not_in' => array(get_the_ID()),
            'post_type' => 'vi_news',
            'orderby' => 'rand'
        )
    );

};

?>
    <div class="uk-related-article">
        <hr>
        <div class="container uk-container-small uk-padding-small">
            <h2 class="col-md-12"><?php _e('Схожi новини', 'mb'); ?></h2>
            <ul>
                <?php
                foreach ($news_posts as $post) :
//                    setup_postdata($post);
                    ?>
                    <li>
                        <a href="<?php the_permalink(); ?>" class="link-hover">
                            <?php the_title(); ?>
                        </a>
                    </li>
                    <?php
                endforeach;
                //                wp_reset_postdata();
                //                ?>
            </ul>
        </div>
        <hr>
    </div>
    <div class="container uk-container-small">
        <?php // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    </div>


<?php
get_footer();
?>