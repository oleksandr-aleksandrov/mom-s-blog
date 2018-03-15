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
    <div class="uk-related-article">
        <hr>
        <div class="uk-container uk-container-small uk-padding-small">
            <h2><?php _e('Рекомендованi новини', 'mb'); ?></h2>
            <div uk-slider="center: true">

                <div class="uk-position-relative uk-visible-toggle uk-light">

                    <ul class="uk-slider-items uk-child-width-1-3@s uk-grid">
                        <li>
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-media-top">
                                    <img src="../docs/images/photo.jpg" alt="">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title">Headline</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-media-top">
                                    <img src="../docs/images/dark.jpg" alt="">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title">Headline</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-media-top">
                                    <img src="../docs/images/light.jpg" alt="">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title">Headline</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-media-top">
                                    <img src="../docs/images/photo2.jpg" alt="">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title">Headline</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-media-top">
                                    <img src="../docs/images/photo3.jpg" alt="">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title">Headline</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt.</p>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
                       uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                       uk-slider-item="next"></a>

                </div>

                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

            </div>
        </div>
        <hr>
    </div>
    <div class="uk-container uk-container-small">
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
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a
                    href="">
                    <i class=" fa fa-odnoklassniki" aria-hidden="true"></i>
                </a>
            </li>
        </ul>

    </div>
<?php
get_footer();
?>