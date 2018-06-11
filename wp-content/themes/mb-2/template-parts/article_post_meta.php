<ul class="uk-custom-subnav uk-custom-subnav-divider uk-archive-meta">
    <?php $taxonomies = get_the_terms(get_the_ID(), 'news-category');
    if (!empty($taxonomies)) :
        $taxonomies = get_the_terms(get_the_ID(), 'news-category');
        $sep = ', ';
        foreach ($taxonomies as $taxonomy) :
            ?>
            <li class="uk-taxonomy-news-item">
                <a class="link-hover" href="<?php echo get_term_link($taxonomy); ?>">
                    #<?php echo $taxonomy->name;
                    echo $sep;
                    ?>
                </a>
            </li>
            <?php
        endforeach;
    endif; ?>
    <li>
     <span>
          <time>
                <?php echo get_the_date('d/m/y'); ?>
          </time>
     </span>
    </li>
    <li>
        <a class="link-hover" href="<?php the_permalink(); ?>#comments">
            <?php
            $comments_count = get_comments_number();
            if ($comments_count == 0) {
                _e('<i class="fa fa-comments-o" aria-hidden="true"></i> 0', 'mb');
            } else {
                printf(_n('%d <i class="fa fa-comments-o" aria-hidden="true"></i>', '%d <i class="fa fa-comments-o" aria-hidden="true"></i>', get_comments_number(), 'mb'), get_comments_number());
            }
            ?>
        </a>
    </li>
    <li>
        <span class="uk-icon-eye">
            <?php if (function_exists('the_views')) {
                the_views();
            } ?>
            <i class="uk-icon uk-icon-image"
               style="background-image: url(https://image.flaticon.com/icons/svg/64/64873.svg);"></i>
        </span>
    </li>
</ul>