<?php if (isset($post->ID)): ?>
    <div class="row position-relative photo-album-item align-items-center mb-5">
        <div class="col-md-6 p-0 position-relative">
            <h2><?php echo $post->post_title; ?></h2>
            <a class="position-cover photo-album-item_link" href="<?php echo get_post_permalink($post); ?>"></a>
        </div>
        <div class="col-md-6 p-0">
            <a class="d-block image-link" href="<?php the_permalink(); ?>">
                <picture>
                    <source srcset="<?php the_post_thumbnail_url('archive_photo_thumbnails'); ?>"
                            media="(max-width: 580px)">
                    <source srcset="<?php the_post_thumbnail_url('archive_photo_thumbnails'); ?>">
                    <img class="img-fluid"
                         src="<?php the_post_thumbnail_url('archive_photo_thumbnails'); ?>"
                         alt="<?php get_the_post_thumbnail_caption(); ?>">
                </picture>
            </a>
        </div>
    </div>

<?php endif; ?>