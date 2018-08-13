<?php
if (is_post_type_archive('vi_news') || (is_tax('news-category'))) : ?>
    <div id="sidemenu">
        <?php wp_nav_menu(array(
            'theme_location' => 'news_menu',
            'container' => false,
            'link_before' => '#'
        ));
        ?>
    </div>
<?php elseif (is_post_type_archive('photo') || (is_tax('photo_category'))) : ?>
    <div id="sidemenu">
        <?php wp_nav_menu(array(
            'theme_location' => 'photoalbums_menu',
            'container' => false,
            'link_before' => '#'
        ));
        ?>
    </div>
<?php endif; ?>