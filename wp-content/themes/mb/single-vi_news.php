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
        endif; ?>
    </div>

    <div id="shareList" class="uk-container uk-share-list uk-visible@m">
        <ul>
            <li><span>Подiлитися:</span></li>
            <li>
                <a onClick="window.open('https://www.facebook.com/sharer.php?s=100&p[url]=http://mb.test/news/news-31/');"
                   href="javascript: void(0)">
                    <i uk-icon="icon:  facebook; ratio: 1.2"></i>
                </a>
            </li>
            <li>
                <a href="">
                    <i uk-icon="icon: google-plus; ratio: 1.2"></i>
                </a>
            </li>
            <li>
                <a
                    href="">
                    <i uk-icon="icon: twitter; ratio: 1.2"></i>
                </a>
            </li>
        </ul>

    </div>
<?php
get_footer();
?>