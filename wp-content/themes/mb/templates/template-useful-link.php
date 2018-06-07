<?php

/*
Template Name: Кориснi посилання
*/
get_header();
?>

    <div class="uk-container-expand uk-container">
        <div class="uk-margin-medium-bottom uk-position-relative" uk-grid>
            <div class="uk-width-1-3@m uk-title-background uk-flex uk-flex-center uk-flex-middle uk-flex-column test">
                <h1 class="uk-text-center uk-h2 uk-position-z-index">
                    <?php the_title(); ?>
                </h1>
                <p class="uk-position-z-index">
                    <?php _e('Слоган на цю сторiнку', 'mb'); ?>
                </p>
                <span></span>
            </div>
            <div class="uk-width-1-3"></div>
            <div class="uk-width-1-1 uk-width-2-3@m us-section">
                <div class="uk-grid-small uk-grid-divider" uk-grid>
                    <?php if (have_rows('useful_link')): ?>
                        <?php while (have_rows('useful_link')): the_row(); ?>
                            <div class="uk-width-1-1 uk-width-1-2@s uk-width-1-4@m uk-text-center">
                                <a target="_blank"
                                   href="<?php the_sub_field('useful_link_url'); ?>">
                                    <figure class="uk-position-relative uk-useful-item">
                                        <?php $useful_link_image = get_sub_field('useful_link_image'); ?>
                                        <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                                            <img class="uk-transition-scale-up uk-transition-opaque"
                                                 src="<?php echo $useful_link_image['sizes']['useful_image']; ?>"
                                                 alt="<?php echo $useful_link_image['alt']; ?>">
                                        </div>
                                        <figcaption
                                            class="uk-h6 uk-margin-remove"><?php the_sub_field('useful_link_name'); ?></figcaption>

                                    </figure>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
?>