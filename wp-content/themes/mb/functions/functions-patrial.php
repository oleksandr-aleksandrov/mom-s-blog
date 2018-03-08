<?php

// function for render partial
function render_partial($path, $args = [], $echo = true)
{
    if (!empty($args)) {
        extract($args);
    }

    if ($echo) {
        include(locate_template($path . '_part.php'));

        return;
    }
    ob_start();
    include(locate_template($path . '_part.php'));

    return ob_get_clean();
}


add_shortcode('ad_banner', function ($atts, $content = null) {
    return render_partial('parts/new_ad_banner', ['id' => $atts['id']], false);
});


function register_fields()
{
    if (function_exists('register_field_group')) {
        register_field_group(array(
            'key' => 'partials',
            'title' => 'Partials',
            'fields' => array(
                array(
                    'key' => 'content_builder',
                    'label' => 'Content',
                    'name' => 'content_builder',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => 'Add Content Block',
                    'sub_fields' => array(
                        array(
                            'key' => 'title_block_top',
                            'label' => __('Title Block', ''),
                            'name' => 'title_block_top',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'row_builder',
                            'label' => 'Row',
                            'name' => 'row_builder',
                            'type' => 'repeater',
                            'layout' => 'table',
                            'button_label' => 'Add Row',
                            'sub_fields' => array(
                                array(
                                    'key' => 'template_builder',
                                    'label' => 'Template',
                                    'name' => 'template_builder',
                                    'type' => 'select',

                                    'layout' => 'table',
                                    'choices' => array(
                                        'Front-page Items' => array(
                                            'full_home' => '1/1 home',
                                            '2_3_home' => '2/3 home',
                                            '1_3_home' => '1/3 home',
//                                            '1_3_home_article' => '1/3 art home'
                                        ),
                                        'Items' => array(
                                            '1_3' => '1/3',
                                            '1_4' => '1/4',
                                            '1_6' => '1/6',
                                            '2_3_big' => '2/3 big',
                                            '1_2_half' => '1/2 half',
                                            '1_2_big' => '1/2 big',
                                            '1_4_half' => '1/4 half',
                                            '1_4_tall' => '1/4 tall',
                                            'article' => '1/3 article',
//                                            'big_full_top' => 'top image',
                                            'ad_banner' => 'ad banner',
                                            'ad_box' => 'ad box',
                                            'video_bg' => 'video/image background',
                                            'sub_navigation' => 'sub-navigation',
                                            'video_masthead' => 'video masthead',
                                            '1_4_interviews' => '1/4 interviews',
                                            'download_block' => 'download block new',
                                        ),
                                        'Rows' => array(
                                            '1_3_block' => '1/3 block',
                                            '1_4_block' => '1/4 block',
                                            '1_4_half_block' => '1/4 half block',
                                            '1_2_accordeon' => '1/2 accordeon',
                                            '4_4_row' => '1/3 row',
                                            '4_4_accordeon_row' => '4/4 accordeon row',
                                            '4_4_big_row' => '4/4 big row',
                                            '4_4_tight_row' => '4/4 tight row',
                                            '3_3_row' => '3/3 row',
                                            '6_6_row' => '6/6 row',
                                            '4_4_featured_row' => 'featured row',
                                            '3_3_featured_row' => '3-3 featured row',
                                            'carousel_row' => 'carousel',
                                        ),
                                    ),
                                ),
                                array(
                                    'key' => 'post_list',
                                    'label' => 'Posts',
                                    'name' => 'post_list',
                                    'type' => 'repeater',
                                    'layout' => 'table',

                                    'button_label' => 'Add Post',
                                    'sub_fields' => array(
                                        array(
                                            'key' => 'posts_builder',
                                            'label' => 'Post',
                                            'required' => 1,
                                            'name' => 'posts_builder',
                                            'type' => 'post_object',
                                            'layout' => 'table',
                                            'post_type' => array('article', 'company', 'interview', 'post', 'page', 'advertising', 'sectors'),
                                            'taxonomy' => '',
                                        ),
                                    ),
                                    'conditional_logic' => array(
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => 'row_4',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '1_2_accordeon',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '4_4_row',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '4_4_featured_row',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '4_4_accordeon_row',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '4_4_big_row',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '4_4_tight_row',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '3_3_row',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '3_3_featured_row',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => 'test_tasha',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => 'carousel_row',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '6_6_row',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '1_4_block',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '1_4_half_block',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '1_3_block',
                                            ),
                                        ),
                                    ),
                                ),
                                array(
                                    'key' => 'post_builder',
                                    'label' => 'Post',
                                    'name' => 'post_builder',
                                    'type' => 'post_object',
                                    'required' => 1,
                                    'layout' => 'table',
                                    'post_type' => array('article', 'company', 'interview', 'post', 'page', 'advertising', 'sectors'),
                                    'taxonomy' => '',
                                    'conditional_logic' => array(
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => 'video_bg',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => 'video_masthead',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '2_3_big',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => 'sub_navigation',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '1_3',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => 'full_home',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '2_3_home',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '1_3_home',
                                            ),
                                        ),
//                                        array(
//                                            array(
//                                                'field' => 'template_builder',
//                                                'operator' => '==',
//                                                'value' => 'big_full_top',
//                                            ),
//                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => 'hero',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '1_2_half',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '1_2_big',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '1_4',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '1_4_half',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '1_4_tall',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '1_6',
                                            ),
                                        ),
//                                        array(
//                                            array(
//                                                'field' => 'template_builder',
//                                                'operator' => '==',
//                                                'value' => 'big_full_top',
//                                            ),
//                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => 'ad_banner',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => 'ad_box',
                                            ),
                                        ),

                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => 'download_block',
                                            ),
                                        ),
                                        // array(
                                        // 	array (
                                        // 		'field' => 'template_builder',
                                        // 		'operator' => '==',
                                        // 		'value' => 'test_tasha',
                                        // 	),
                                        // ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => 'article',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '1_4_interviews',
                                            ),
                                        ),
                                        array(
                                            array(
                                                'field' => 'template_builder',
                                                'operator' => '==',
                                                'value' => '1_3_home_article',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'templates/builder-template.php',
                    ),
                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'templates/sector-template.php',
                    )
                )
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
        ));
    }
}

add_action('init', 'register_fields');


/* --==  register_fields_row   ==-- */


function register_fields_row()
{
    if (function_exists('register_field_group')) {
        register_field_group(array(
            'key' => 'partials_row',
            'title' => 'Content',
            'fields' => array(
                array(
                    'key' => 'content_builder_row',
                    'label' => 'Content',
                    'name' => 'content_builder_row',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => ' Add Row',
                    'sub_fields' => array(
                        array(
                            'key' => 'title_row_top',
                            'label' => __('Title Block', ''),
                            'name' => 'title_row_top',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'row_builder_row',
                            'label' => 'Block',
                            'name' => 'row_builder',
                            'type' => 'repeater',
                            'layout' => 'table',
                            'button_label' => 'Add Content Block',
                            'sub_fields' => array(
                                array(
                                    'key' => 'template_builder_row',
                                    'label' => 'Template',
                                    'name' => 'template_builder_row',
                                    'type' => 'select',
                                    'layout' => 'table',
                                    'choices' => array(
                                        'big_full_top' => 'top image',
                                        '4_4_row' => '4-4 row',
                                        '4_4_featured_row' => '4-4 featured row',
                                        '4_4_accordeon_row' => '4-4 accordeon row',
                                        '4_4_big_row' => '4-4 big row',
                                        '4_4_tight_row' => '4-4 tight row',
                                        '3_3_row' => '3-3 row',
                                        '3_3_featured_row' => '3-3 featured row',
                                        '6_6_row' => '6/6 row',
                                        '1_4_half_block' => '1/4 half block',
                                        '1_4_block' => '1/4 block',
                                        '1_4_interviews' => '1/4 interviews',
                                        'test_tasha' => 'Test Tasha 1/3 new',
                                        'download_block' => 'download block new',
                                        'row_4' => 'Row 4',
                                    ),
                                ),
                                array(
                                    'key' => 'post_list_row',
                                    'label' => 'Posts',
                                    'name' => 'post_list_row',
                                    'type' => 'repeater',
                                    'layout' => 'table',
                                    'button_label' => 'Add Post',
                                    'sub_fields' => array(
                                        array(
                                            'key' => 'posts_builder_row',
                                            'label' => 'Post',
                                            'name' => 'posts_builder_row',
                                            'type' => 'post_object',
                                            'layout' => 'table',
                                            'post_type' => array('article', 'company', 'interview', 'post', 'page', 'advertising'),
                                            'taxonomy' => '',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'location' => array(
//                array(
//                    array(
//                        'param' => 'post_type',
//                        'operator' => '==',
//                        'value' => 'article',
//                    ),
//                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'templates/page-template.php',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
        ));
    }
}


add_action('init', 'register_fields_row');