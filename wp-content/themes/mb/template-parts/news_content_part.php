<?php if (isset($post->ID)): ?>
    <article class="uk-article">

        <h2 class="uk-margin-remove">
            <a href="<?php echo get_permalink($post) ?>"> <?php echo $post->post_title; ?></a>
        </h2>
        <ul class="uk-article-meta uk-subnav uk-subnav-divider uk-custom-subnav-divider uk-archive-meta">
            <li>
            <span>
                <time>
                    <?php echo get_the_date('d/m/y'); ?>
                </time>
            </span>
            </li>
            <li>
                <span>
                    <?php
                    $comments_count = get_comments_number();

                    if ($comments_count == 0) {
                        _e(' <i class="fa fa-comments"></i> 0', 'mb');
                    } else {
                        printf(_n('%d <i class="fa fa-comments"></i>', '%d <i class="fa fa-comments"></i>', get_comments_number(), 'mb'), get_comments_number());
                    }
                    ?>
                </span>
            </li>
            <li>
            <span>
            <i class="fa fa-eye"></i> <?php if (function_exists('the_views')) {
                    the_views();
                } ?>
            </span>
            </li>
        </ul>
        <a href="<?php the_permalink(); ?>">
            <img src="<?php the_post_thumbnail_url('archive_news_thumbnails'); ?>"
                 alt="<?php get_the_post_thumbnail_caption(); ?>"/>
        </a>
        <p>
            <?php echo $post->post_excerpt; ?>
        </p>
        <a class="uk-button-more" href="<?php the_permalink(); ?>"><?php _e('Читати далi →', 'mb'); ?>
        </a>
    </article>
<?php endif; ?>