<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MB
 */

?>
<!doctype html>
<html lang="uk">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header uk-sticky="animation: uk-animation-slide-top; cls-active:sticky-nav header-sticky">
    <nav class="uk-container" uk-navbar>
        <?php $logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'logo'); ?>
        <div class="uk-navbar-left@m uk-navbar-center@s">
            <a class="uk-navbar-item uk-logo" href="<?php bloginfo('url'); ?>">
                <img src="<?php echo $logo[0]; ?>" alt="<?php bloginfo('name'); ?>"/>
            </a>
        </div>
        <div class="uk-navbar-right uk-visible@m">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main_menu',
                'container' => false,
                'menu_class' => 'uk-navbar-nav uk-header-menu uk-header-menu-current',
            ));

            ?>
        </div>

        <a class="uk-navbar-toggle uk-visible@m" href="#modal-full-search" uk-search-icon uk-toggle></a>
        <a href="#modal-full-mobile-menu" class="uk-hidden@m uk-navbar-right uk-text-muted uk-padding-large" uk-toggle>
            <span uk-navbar-toggle-icon></span>
            <span class="uk-margin-small-left"></span>
        </a>
        <div id="modal-full-mobile-menu" class="uk-modal-full uk-modal" uk-modal>
            <button class="uk-modal-close-full uk-modal-close-full-custom uk-padding-large uk-close-large" type="button"
                    uk-close></button>
            <div class="uk-modal-dialog uk-modal-dialog-custom-color uk-flex uk-flex-center uk-flex-middle"
                 uk-height-viewport>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                    'container' => false,
                    'menu_class' => 'uk-navbar-nav uk-header-mobile-menu uk-header-menu-current uk-hidden@m uk-flex-column uk-width-1-1',
                ));
                ?>
            </div>
        </div>
    </nav>
    <div id="modal-full-search" class="uk-modal-full uk-modal" uk-modal>
        <div class="uk-modal-dialog  uk-modal-dialog-custom-color uk-flex uk-flex-center uk-flex-middle"
             uk-height-viewport>
            <button class="uk-modal-close-full uk-modal-close-full-custom uk-padding-large uk-close-large" type="button"
                    uk-close></button>
            <form role="search" method="get" class="search-form uk-text-center uk-search uk-search-large uk-visible@m"
                  action="<?php echo home_url('/'); ?>">
                <p class="mb-search-description-header uk-margin-remove"><?php _e('Введiть пошуковий запит', 'mb'); ?></p>
                <i class="fa fa-angle-double-down mb-small-icon-arrow" aria-hidden="true"></i>
                <input type="search" autofocus
                       class="search-field uk-header-search-field uk-search-input uk-margin-small-bottom uk-text-center"
                       placeholder="<?php echo esc_attr_x('', 'placeholder') ?>"
                       value="<?php echo get_search_query() ?>" name="s">
                <input type="submit" class="search-submit mb-button-search uk-round-3px"
                       value="<?php _e('Пошук', 'mb'); ?>"/>
            </form>
        </div>
    </div>
</header>

<main>