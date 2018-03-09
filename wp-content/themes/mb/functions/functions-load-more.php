<?php

function load_more_js()
{

    global $wp_query;


//    wp_enqueue_script('jquery');

    wp_register_script('load-more', get_stylesheet_directory_uri() . '/app/js/load-more.js', array('jquery'));

    wp_localize_script('load-more', 'MAIN', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode($wp_query->query_vars), // everything about your loop is here
        'current_page' => get_query_var('paged') ? get_query_var('paged') : 1
    ));

    wp_enqueue_script('load-more');
}

add_action('wp_enqueue_scripts', 'load_more_js');


function true_load_posts()
{
    // prepare our arguments for the query
    $args = json_decode(stripslashes($_POST['query']), true);
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';


    query_posts($args);
    if (have_posts()) :

        while (have_posts()): the_post();

            switch (get_post_type()) {
                case 'vi_news':
                    render_partial('template-parts/news_content', ['post' => get_post()]);
                    break;
            }
        endwhile;

    endif;
    die();
}


add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');