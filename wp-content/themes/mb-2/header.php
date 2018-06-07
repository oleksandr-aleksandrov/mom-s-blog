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
    <!--    <meta name="robots" content="index, follow">-->
    <meta name="robots" content="noindex, nofollow"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>

<header class="main-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <?php $logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'logo'); ?>
            <a class="d-block" href="<?php bloginfo('url'); ?>">
                <img class="img-fluid" src="<?php echo $logo[0]; ?>" alt="<?php bloginfo('name'); ?>"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                    'menu_id' => 'primary-menu',
                    'menu_class' => 'header-main-menu d-flex flex-column flex-lg-row justify-content-end navbar-nav ml-auto',
                    'container' => false
                ));
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="search-icon" href="#search">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div id="search" class="modal-search">
    <button type="button" class="close">×</button>
    <form role="search" method="get" id="searchform" action="<?php echo home_url('/') ?>">
        <input type="search" autofocus
               class="search-field uk-header-search-field uk-search-input uk-margin-small-bottom uk-text-center"
               placeholder="<?php echo esc_attr_x('', 'placeholder') ?>"
               value="<?php echo get_search_query() ?>" name="s">
        <input type="submit" id="searchsubmit" class="search-submit mb-button-search"
               value="<?php echo esc_attr_x('Search', 'submit button'); ?>"/>
    </form>
</div>
<main>