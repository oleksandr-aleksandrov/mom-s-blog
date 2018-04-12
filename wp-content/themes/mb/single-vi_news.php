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
    <div class="uk-container uk-container-small">
        <div class="uk-margin-medium-bottom" uk-grid>
            <div class="uk-width-1-1@m">
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

                        <img src="<?php the_post_thumbnail_url('single_photo_thumbnails'); ?>"
                             alt="<?php the_post_thumbnail_caption(); ?>">
                        <?php the_content(); ?>
                    </article>
                    <?php

                endwhile; // End of the loop.
                ?>

            </div>
        </div>
    </div>
    <div class="uk-container uk-position-relative uk-navigation-single-news">
        <?php
        $post_nav = get_the_post_navigation(array(
            'screen_reader_text' => ' ',
            'prev_text' => '<span class="uk-prev-post" uk-icon="chevron-left"></span>' .
                '<span class="post-title">%title</span>' .
                '<span class="mobile-post-title">Попередній пост</span>',
            'next_text' => '<span class="uk-next-post" uk-icon="chevron-right"></span>' .
                '<span class="post-title">%title</span>' .
                '<span class="mobile-post-title">Наступний пост</span>',
        ));

        echo $post_nav;
        ?>
    </div>
<?php echo render_template_part('sharelist_item_part'); ?>
<?php
global $post;
$news = get_posts([
    'numberposts' => 6,
    'post_type' => 'vi_news',
    'orderby' => 'rand',
    'exclude' => $post->ID
]);
?>
    <div class="uk-related-article">
        <hr>
        <div class="uk-container uk-container-small uk-padding-small">
            <h2 class="uk-width-1-1"><?php _e('Схожi новини', 'mb'); ?></h2>
            <ul>
                <?php
                foreach ($news as $post) :
                    setup_postdata($post);
                    ?>
                    <li>
                        <a href="<?php the_permalink(); ?>" class="link-hover"> <?php the_title(); ?></a>
                    </li>
                    <?php
                endforeach;
                wp_reset_postdata();
                ?>
            </ul>
        </div>
        <hr>
    </div>
    <div class=" uk-container uk-container-small">
        <?php // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    </div>


<?php
get_footer();
?>