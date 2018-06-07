<?php
namespace MB\PostType;


class Albums implements IPostType
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
        add_action('init', [$this, 'add_photo_taxonomy']);
    }

    /**
     * @return mixed
     */
    public function register_post_type()
    {
        $labels = array(
            'name' => __('Фотоальбоми', 'vodolaha-info'),
            'singular_name' => __('Фотоальбоми', 'vodolaha-info'),
            'add_new' => __('Додати фотоальбом', 'vodolaha-info'),
            'add_new_item' => __('Додати фотоальбом', 'vodolaha-info'),
            'edit_item' => __('Редагувати фотоальбом', 'vodolaha-info'),
            'new_item' => __('Додати фотоальбом', 'vodolaha-info'),
            'all_items' => __('Всі фотоальбоми', 'vodolaha-info'),
            'view_item' => __('Переглянути фотоальбом', 'vodolaha-info'),
            'search_items' => __('Пошук фотоальбомів', 'vodolaha-info'),
            'not_found' => __('Фотоальбомів не знайдено', 'vodolaha-info'),
            'not_found_in_trash' => __('Фотоальбомів не знайдено в Корзині', 'vodolaha-info'),
            'menu_name' => __('Фотоальбоми', 'vodolaha-info')
        );

        register_post_type('photo', [
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
    public function add_photo_taxonomy()
    {
        \register_taxonomy('photo_category', 'photo', [
            'hierarchical' => true,
            'label' => __('Категорії фото', 'mb'),
            'query_var' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'rewrite' => ['slug' => 'photo-category']
        ]);
    }
}