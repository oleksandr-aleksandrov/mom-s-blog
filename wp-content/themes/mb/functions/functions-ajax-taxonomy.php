<?php
add_action('wp_ajax_get_cat', 'ajax_show_posts_in_cat');
add_action('wp_ajax_nopriv_get_cat', 'ajax_show_posts_in_cat');
function ajax_show_posts_in_cat()
{

    $link = !empty($_POST['link']) ? esc_attr($_POST['link']) : false;
    $slug = $link ? wp_basename($link) : false;
//    $cat = get_category_by_slug($slug);
    $cat = get_term_by('slug', $slug, 'news-category');
    echo $cat;
//    echo $slug;
    if (!$cat) {
        die('Постiв не знайдено!');
    }

    query_posts(array(
        'posts_per_page' => get_option('posts_per_page'),
        'post_status' => 'publish',
        'category_name' => $cat->slug
    ));

    require plugin_dir_path(__FILE__) . 'tpl-cat.php';

    wp_die();
}

add_action('wp_enqueue_scripts', 'my_assets');
function my_assets()
{
    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/app/js/custom.js', array('jquery'));
    wp_localize_script('custom', 'myPlugin', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}