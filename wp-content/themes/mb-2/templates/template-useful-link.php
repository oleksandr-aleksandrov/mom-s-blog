<?php

/*
Template Name: Кориснi посилання
*/
get_header();
?>

    <div class="container-fluid p-0">
        <div class="mb-4 position-relative">
            <div class="col-md-3 uk-title-background d-flex flex-column align-items-center
    justify-content-center">
                <h1 class="text-center uk-h2 position-z-index">
                    <?php the_title(); ?>
                </h1>
                <p class="text-center position-z-index">
                    <?php _e('Слоган на цю сторiнку', 'mb'); ?>
                </p>
                <span></span>
            </div>
            <div class="col-md-9 offset-md-3 mb-section">
                <div class="row p-0">
                    <?php if (have_rows('useful_link')): ?>
                        <?php while (have_rows('useful_link')): the_row(); ?>
                            <div class="col-md-3 uk-text-center">
                                <a target="_blank"
                                   href="<?php the_sub_field('useful_link_url'); ?>">
                                    <figure class="position-relative uk-useful-item">
                                        <?php $useful_link_image = get_sub_field('useful_link_image'); ?>
                                        <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                                            <img class="uk-transition-scale-up uk-transition-opaque"
                                                 src="<?php echo $useful_link_image['sizes']['useful_image']; ?>"
                                                 alt="<?php echo $useful_link_image['alt']; ?>">
                                        </div>
                                        <figcaption
                                            class="uk-h6 uk-margin-remove"><?php the_sub_field('useful_link_name'); ?>
                                        </figcaption>
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