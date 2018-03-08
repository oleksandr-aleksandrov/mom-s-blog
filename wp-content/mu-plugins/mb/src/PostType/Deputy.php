<?php

namespace MB\PostType;


class Deputy implements IPostType
{
    /**
     *
     */
    public function __construct()
    {
        /**
         *
         */
        add_action('init', [$this, 'register_post_type']);
        /**
         *
         */
        add_action('acf/init', [$this, 'register_fields_deputies']);
        /**
         *
         */
        add_action('init', [$this, 'add_taxonomy_district']);
        /**
         *
         */
        add_action('pre_get_posts', [$this, 'archive_deputies_custom_order']);
    }

    /**
     * @return mixed
     */
    public function register_post_type()
    {
        $labels = array(
            'name' => __('Депутати', 'vodolaha-info'),
            'singular_name' => __('Депутати', 'vodolaha-info'),
            'add_new' => __('Додати депутата', 'vodolaha-info'),
            'add_new_item' => __('Додати депутата', 'vodolaha-info'),
            'edit_item' => __('Редагувати депутата', 'vodolaha-info'),
            'new_item' => __('Додати депутата', 'vodolaha-info'),
            'all_items' => __('Всі депутати', 'vodolaha-info'),
            'view_item' => __('Переглянути депутата', 'vodolaha-info'),
            'search_items' => __('Пошук депутатів', 'vodolaha-info'),
            'not_found' => __('Депутатів не знайдено', 'vodolaha-info'),
            'not_found_in_trash' => __('Депутатів не знайдено в Корзині', 'vodolaha-info'),
            'menu_name' => __('Депутати', 'vodolaha-info')
        );

        register_post_type('deputies', [
            'label' => __('', 'vodolaha-info'),
            'labels' => $labels,
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'author'],
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        ]);
    }

    /**
     *
     */
    public function register_fields_deputies()
    {
        acf_add_local_field_group(array(
            'key' => 'group_5a02fffbd3ad79',
            'title' => 'Додатковий контент',
            'fields' => array(
                array(
                    'key' => 'consignment_logo',
                    'label' => 'Логотип партії',
                    'name' => 'consignment_logo',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'preview_size' => 'small_100',
                    'library' => 'all',
                    'return_format' => 'array',
                    'min_width' => 0,
                    'min_height' => 0,
                    'min_size' => 0,
                    'max_width' => 0,
                    'max_height' => 0,
                    'max_size' => 0,
                    'mime_types' => '',
                ),
                array(
                    'key' => 'deputies_district',
                    'label' => 'Вулиці',
                    'name' => 'deputies_district',
                    'type' => 'wysiwyg',
                    'instructions' => '',
                ),
                array(
                    'key'           => 'deputies_district_id',
                    'name'          => 'district_id',
                    'label'         => 'Округ',
                    'type'          => 'number',
                    'step'          => 1,
                    'default_value' => 0
                )
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'deputies',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',

            'active' => 1,
            'description' => '',
        ));

    }

    /**
     *
     */
    public function add_taxonomy_district()
    {
        \register_taxonomy('district', 'deputies', [
            'hierarchical' => true,
            'label' => __('Округ', 'vodolaha-info'),
            'query_var' => true,
            'rewrite' => ['slug' => 'district']
        ]);
    }

    /**
     * @param \WP_Query $query
     */
    public function archive_deputies_custom_order($query)
    {
        if (is_post_type_archive('deputies')) {
            // Set the order ASC or DESC
            $query->set('order', 'ASC');
            //
            $query->set('meta_key', 'district_id');
            // Set the orderby
            $query->set('orderby', 'meta_value_num');
        }
    }
}