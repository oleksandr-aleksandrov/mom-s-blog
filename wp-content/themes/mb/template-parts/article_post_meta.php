<ul class="uk-article-meta uk-subnav uk-custom-subnav uk-subnav-divider uk-custom-subnav-divider uk-archive-meta">
    <?php $taxonomies = get_the_terms(get_the_ID(), 'news-category');
    if (!empty($taxonomies)) :
        $taxonomies = get_the_terms(get_the_ID(), 'news-category');
        foreach ($taxonomies as $taxonomy) :
            ?>
            <li class="uk-taxonomy-news-item">
                <a href="<?php echo get_term_link($taxonomy); ?>">
                    #<?php echo $taxonomy->name; ?>
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