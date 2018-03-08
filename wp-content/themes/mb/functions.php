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
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'mb'),
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
        add_image_size('300_200', 300, 200, true);
        add_image_size('deputies_thumb', 250, 300, true);
        add_image_size('deputies_thumb_single', 400, 450, true);
        add_image_size('archive-news', 370, 240, true);
        add_image_size('home-news-thumbnail', 425, 240, true);
        add_image_size('single-news', 1200, 600, true);
        add_image_size('small_100', 130, 70);
    }
endif;
add_action('after_setup_theme', 'mb_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
//function mb_content_width()
//{
//    $GLOBALS['content_width'] = apply_filters('mb_content_width', 640);
//}

add_action('after_setup_theme', 'mb_content_width', 0);


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
new \MB\PostType\Deputy();
new \MB\PostType\Albums();
//////////


/**
 * Enqueue scripts and styles.
 */
function mb_scripts()
{
    // wp_enqueue_style( 'mb-style', get_stylesheet_uri() );

    wp_enqueue_style(' font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('uikit-css', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/css/uikit.min.css');
    wp_register_style('main-css', get_template_directory_uri() . '/app/css/main.css');
    wp_enqueue_style('main-css');
    wp_enqueue_script('mb-navigation', get_template_directory_uri() . '/app/js/navigation.js', array(), '20151215', true);

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

///**
// * Implement the Custom Header feature.
// */
//require get_template_directory() . '/inc/custom-header.php';
//
///**
// * Custom template tags for this theme.
// */
//require get_template_directory() . '/inc/template-tags.php';
//
///**
// * Functions which enhance the theme by hooking into WordPress.
// */
//require get_template_directory() . '/inc/template-functions.php';
//
///**
// * Customizer additions.
// */
//require get_template_directory() . '/inc/customizer.php';
//
///**
// * Load Jetpack compatibility file.
// */
//if (defined('JETPACK__VERSION')) {
//    require get_template_directory() . '/inc/jetpack.php';
//}

// Register Custom Post Type
function custom_news_type()
{

    $labels = array(
        'name' => _x('News', 'News General Name', 'mb'),
        'singular_name' => _x('News', 'News Singular Name', 'mb'),
        'menu_name' => __('News', 'mb'),
        'name_admin_bar' => __('News', 'mb'),
        'archives' => __('Item Archives', 'mb'),
        'attributes' => __('Item Attributes', 'mb'),
        'parent_item_colon' => __('Parent Item:', 'mb'),
        'all_items' => __('All Items', 'mb'),
        'add_new_item' => __('Add New Item', 'mb'),
        'add_new' => __('Add New', 'mb'),
        'new_item' => __('New Item', 'mb'),
        'edit_item' => __('Edit Item', 'mb'),
        'update_item' => __('Update Item', 'mb'),
        'view_item' => __('View Item', 'mb'),
        'view_items' => __('View Items', 'mb'),
        'search_items' => __('Search Item', 'mb'),
        'not_found' => __('Not found', 'mb'),
        'not_found_in_trash' => __('Not found in Trash', 'mb'),
        'featured_image' => __('Featured Image', 'mb'),
        'set_featured_image' => __('Set featured image', 'mb'),
        'remove_featured_image' => __('Remove featured image', 'mb'),
        'use_featured_image' => __('Use as featured image', 'mb'),
        'insert_into_item' => __('Insert into item', 'mb'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'mb'),
        'items_list' => __('Items list', 'mb'),
        'items_list_navigation' => __('Items list navigation', 'mb'),
        'filter_items_list' => __('Filter items list', 'mb'),
    );
    $args = array(
        'label' => __('News', 'mb'),
        'description' => __('News Description', 'mb'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'taxonomies' => array('category', 'post_tag'),
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-businessman',
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('news', $args);

}

add_action('init', 'custom_news_type', 0);

function the_truncated_post($symbol_amount)
{
    $filtered = strip_tags(preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_content()))));
    echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}


if (!function_exists('vt_resize')) {
    function vt_resize($attach_id = null, $img_url = null, $width, $height, $crop = false)
    {
        // this is an attachment, so we have the ID
        if ($attach_id) {
            $image_src = wp_get_attachment_image_src($attach_id, 'full');
            $file_path = get_attached_file($attach_id);
            // this is not an attachment, let's use the image url
        } else if ($img_url) {
            $file_path = parse_url($img_url);
            $file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
            // Look for Multisite Path
            if (file_exists($file_path) === false) {
                global $blog_id;
                $file_path = parse_url($img_url);
                if (preg_match("/files/", $file_path['path'])) {
                    $path = explode('/', $file_path['path']);
                    foreach ($path as $k => $v) {
                        if ($v == 'files') {
                            $path[$k - 1] = 'wp-content/blogs.dir/' . $blog_id;
                        }
                    }
                    $path = implode('/', $path);
                }
                $file_path = $_SERVER['DOCUMENT_ROOT'] . $path;
            }
            //$file_path = ltrim( $file_path['path'], '/' );
            //$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
            $orig_size = getimagesize($file_path);
            $image_src[0] = $img_url;
            $image_src[1] = $orig_size[0];
            $image_src[2] = $orig_size[1];
        }
        if (isset($file_path)) {
            $file_info = pathinfo($file_path);
            // check if file exists
            $base_file = $file_info['dirname'] . '/' . $file_info['filename'] . '.' . $file_info['extension'];
            if (!file_exists($base_file)) {
                return;
            }
            $extension = '.' . $file_info['extension'];
            // the image path without the extension
            $no_ext_path = $file_info['dirname'] . '/' . $file_info['filename'];
            $cropped_img_path = $no_ext_path . '-' . $width . 'x' . $height . $extension;
            // checking if the file size is larger than the target size
            // if it is smaller or the same size, stop right here and return
            if ($image_src[1] > $width) {
                // the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
                if (file_exists($cropped_img_path)) {
                    $cropped_img_url = str_replace(basename($image_src[0]), basename($cropped_img_path), $image_src[0]);
                    $vt_image = array(
                        'url' => $cropped_img_url,
                        'width' => $width,
                        'height' => $height
                    );

                    return $vt_image;
                }
                // $crop = false or no height set
                if ($crop == false OR !$height) {
                    // calculate the size proportionaly
                    $proportional_size = wp_constrain_dimensions($image_src[1], $image_src[2], $width, $height);
                    $resized_img_path = $no_ext_path . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $extension;
                    // checking if the file already exists
                    if (file_exists($resized_img_path)) {
                        $resized_img_url = str_replace(basename($image_src[0]), basename($resized_img_path), $image_src[0]);
                        $vt_image = array(
                            'url' => $resized_img_url,
                            'width' => $proportional_size[0],
                            'height' => $proportional_size[1]
                        );

                        return $vt_image;
                    }
                }
                // check if image width is smaller than set width
                $img_size = getimagesize($file_path);
                if ($img_size[0] <= $width) {
                    $width = $img_size[0];
                }
                // Check if GD Library installed
                if (!function_exists('imagecreatetruecolor')) {
                    echo 'GD Library Error: imagecreatetruecolor does not exist - please contact your webhost and ask them to install the GD library';

                    return;
                }
                // no cache files - let's finally resize it
                // $new_img_path = image_resize( $file_path, $width, $height, $crop );
                $new_img_path = wp_get_image_editor($file_path);
                if (!is_wp_error($new_img_path)) {
                    $new_img_path->resize($width, $height, $crop);
                    $new_img_path->save($file_path);
                }
                $new_img_size = getimagesize($file_path);
//				print_r($new_img_path);
                $new_img = str_replace(basename($image_src[0]), basename($file_path), $image_src[0]);
                // resized output
                $vt_image = array(
                    'url' => $new_img,
                    'width' => $new_img_size[0],
                    'height' => $new_img_size[1]
                );

                return $vt_image;
            }
            // default output - without resizing
            $vt_image = array(
                'url' => $image_src[0],
                'width' => $width,
                'height' => $height
            );

            return $vt_image;
        }
    }
}

// function query_post_type($query){
// 	if (is_category() || is_archive() || is_tag() && !is_admin()) {
// 		$query->set('post_type',array('news', 'post'));
// 	}
// }

// add_filter('pre_get_posts','query_post_type');