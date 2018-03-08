<?php
/**
 * MB functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MB
 */

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
//        add_image_size('300_200', 300, 200, true);
//        add_image_size('deputies_thumb', 250, 300, true);
//        add_image_size('deputies_thumb_single', 400, 450, true);
//        add_image_size('archive-news', 370, 240, true);
//        add_image_size('home-news-thumbnail', 425, 240, true);
//        add_image_size('single-news', 1200, 600, true);
//        add_image_size('small_100', 130, 70);
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
//new \MB\PostType\Deputy();
new \MB\PostType\Albums();
//////////


/**
 * Enqueue scripts and styles.
 */
function mb_scripts()
{
    // wp_enqueue_style( 'mb-style', get_stylesheet_uri() );
    wp_enqueue_style('PTSans', 'https://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=cyrillic,latin-ext');
    wp_enqueue_style('OpenSans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic');
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('uikit-css', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/css/uikit.min.css');
    wp_register_style('main-css', get_template_directory_uri() . '/app/css/main.css');
    wp_enqueue_style('main-css');
    wp_enqueue_script('mb-navigation', get_template_directory_uri() . '/app/js/navigation.js', array(), '20151215', true);
    wp_register_script('main-js', get_template_directory_uri() . '/app/js/main.js');
    wp_enqueue_script('main-js');
    wp_enqueue_script('uikit-js', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit.min.js', true);
    wp_enqueue_script('html5shiv', 'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js');
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
    wp_enqueue_script('respond', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js');
    wp_script_add_data('respond', 'conditional', 'lt IE 9');
    wp_enqueue_script('mb-skip-link-focus-fix', get_template_directory_uri() . '/app/js/skip-link-focus-fix.js', array(), '20151215', true);

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
