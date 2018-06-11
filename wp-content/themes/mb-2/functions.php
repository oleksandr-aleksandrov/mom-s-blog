<?php
/**
 * MB functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MB
 */

require_once "functions/functions-patrial.php";
require_once "functions/functions-load-more.php";

if (!function_exists('mb_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function mb_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on MB, use a find and replace
         * to change 'mb' to the name of your theme in all the template files.
         */
        load_theme_textdomain('mb', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
//        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(

            'main_menu' => esc_html__('Header', 'mb'),
            'footer_menu' => esc_html__('Footer', 'mb'),
            'photoalbums_menu' => esc_html__('Photoalbums Nav', 'mb'),
            'news_menu' => esc_html__('News Nav', 'mb'),


        ));
        add_theme_support('post-thumbnails');
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('mb_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));


// Register new size img
        add_image_size('logo', 70, 70);
        add_image_size('archive_news_thumbnails', 1100, 500, true);
        add_image_size('archive_photo_thumbnails', 600, 500, true);
        add_image_size('single_photo_thumbnails', 900, 500, true);
        add_image_size('useful_image', 200, 200);
    }
endif;
add_action('after_setup_theme', 'mb_setup');

/**
 * @param $template
 * @param array $params
 * @return string
 */
function render_template_part($template, $params = [])
{
    ob_start();

    extract($params);
    include(locate_template('template-parts/' . $template . '.php'));

    if (isset($_SESSION['errors']))
        unset($_SESSION['errors']);

    return ob_get_clean();
}

remove_filter('the_excerpt', 'wpautop');
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mb_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'mb'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'mb'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'mb_widgets_init');


/**
 * Register CPT area
 */
//////////

new \MB\PostType\News();
new \MB\PostType\Albums();
new \MB\PostType\Templates();
//////////


add_action('wp_enqueue_scripts', 'my_scripts_method');
function my_scripts_method()
{

    wp_deregister_script('jquery-core');
    wp_register_script('jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', null, null, true);
    wp_enqueue_script('jquery');
}

/**
 * Enqueue scripts and styles.
 */
function mb_scripts()
{


    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    wp_enqueue_style('PTSans', 'https://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=cyrillic,latin-ext');

    wp_enqueue_style('OpenSans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic');

    wp_enqueue_style('bootstrap-css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css');

    wp_register_style('main-css', get_template_directory_uri() . '/app/css/main.css');
    wp_enqueue_style('main-css');


    wp_register_script('main-js', get_template_directory_uri() . '/app/js/main.js', array('jquery'), null, true);
    wp_enqueue_script('main-js');

    wp_enqueue_script('bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('picturefill', 'https://cdnjs.cloudflare.com/ajax/libs/picturefill/3.0.3/picturefill.min.js', array('jquery'), null, false);

    wp_enqueue_script('html5shiv', 'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js', null, true);

    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');

    wp_enqueue_script('respond', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', array(), '20151215', true);

    wp_script_add_data('respond', 'conditional', 'lt IE 9');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'mb_scripts');


function the_truncated_post($symbol_amount)
{
    $filtered = strip_tags(preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_content()))));
    echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}

// deleting attribute type in scripts and styles
add_filter('style_loader_tag', 'sj_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'sj_remove_type_attr', 10, 2);
function sj_remove_type_attr($tag)
{
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}


/*
 *
 */

class dropdown_walker_nav_menu extends Walker_Nav_menu
{

    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $li_attributes = '';
        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array)$item->classes;
        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_anchestor) ? 'active' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-menu';
        }
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $attributes .= ($args->walker->has_children) ? ' class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link"';
        $item_output = $args->before;
        $item_output .= ($depth > 0) ? '<a class="dropdown-item"' . $attributes . '>' : '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
