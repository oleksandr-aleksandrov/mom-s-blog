<?php if (isset($post->ID)): ?>
    <article class="uk-my-article">

        <h2 class="uk-margin-remove">
            <a href="<?php echo get_permalink($post) ?>"> <?php echo $post->post_title; ?></a>
        </h2>
        <?php echo render_template_part('article_post_meta'); ?>
        <a class="uk-inline-clip uk-transition-toggle uk-display-block" href="<?php the_permalink(); ?>">
            <img class="uk-transition-scale-up uk-transition-opaque"
                 src="<?php the_post_thumbnail_url('archive_news_thumbnails'); ?>"
                 alt="<?php get_the_post_thumbnail_caption(); ?>"/>
        </a>
        <p>
            <?php echo get_the_excerpt($post->ID); ?>
        </p>
        <a class="uk-button-more" href="<?php the_permalink(); ?>"><?php _e('Читати далi →', 'mb'); ?>
        </a>
    </article>
<?php endif; ?>