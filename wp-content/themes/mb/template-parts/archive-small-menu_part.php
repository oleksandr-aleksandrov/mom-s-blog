<?php
if (is_post_type_archive('vi_news') || (is_tax('news-category'))) : ?>
    <div id="sidemenu" uk-sticky="offset: 110;bottom: uk-copyright">
        <?php wp_nav_menu(array(
            'theme_location' => 'news_menu',
            'container' => false,
//            'menu_id' => 'sidemenu',
            'menu_class' => 'uk-visible@m',
            'link_before' => '#'
        ));
        ?>
    </div>
<?php elseif (is_post_type_archive('photo') || (is_tax('photo_category'))) : ?>
    <div id="sidemenu" uk-sticky="offset: 110;bottom: uk-copyright">
        <?php wp_nav_menu(array(
            'theme_location' => 'photoalbums_menu',
            'container' => false,
//            'menu_id' => 'sidemenu',
            'menu_class' => 'uk-visible@m',
            'link_before' => '#'
        ));
        ?>
    </div>
<?php endif; ?>