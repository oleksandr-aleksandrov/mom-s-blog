<?php if (isset($post->ID)): ?>
    <div class="uk-width-1-2@m">
        <div
            class="mb-album uk-height-medium uk-position-relative uk-inline-clip uk-transition-toggle uk-width-1-1 uk-light"
            tabindex="0"
            style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'archive_photo_thumbnails'); ?>')">
            <h2 class="mb-album-photo"><?php echo $post->post_title; ?></h2>
            <div
                class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle">
                <span uk-overlay-icon></span>
            </div>
            <a class="uk-position-cover" href="<?php echo get_post_permalink($post); ?>"></a>
        </div>
    </div>
<?php endif; ?>