<?php
namespace MB\PostType;
/**
 *
 * @package VodolahaInfo\PostType
 */
class News implements IPostType
{
    /**
     *
     */
    public function __construct()
    {
        /**
         *
         */
        add_action( 'init', [$this, 'register_post_type'] );
        /**
         *
         */
        add_action( 'init', [$this, 'add_theme_support'] );
        /**
         *
         */
        add_action( 'init', [$this, 'add_taxonomy'] );
        /**
         *
         */
        add_action( 'acf/init', [$this, 'fields'] );
    }
    /**
     *
     */
    public function register_post_type()
    {
        register_post_type( 'vi_news', [
            'labels' => [
                'name'              => __( 'Новини', 'vodolaha-info' ),
                'singular_name'     => __( 'Новини', 'vodolaha-info' ),
                'add_new'           => __( 'Додати новину', 'vodolaha-info' ),
                'add_new_item'      => __( 'Додати новину', 'vodolaha-info' ),
                'edit_item'         => __( 'Редагувати новину', 'vodolaha-info' ),
                'new_item'          => __( 'Додати новину', 'vodolaha-info' ),
                'all_items'         => __( 'Всі новини', 'vodolaha-info' ),
                'view_item'         => __( 'Переглянути новину', 'vodolaha-info' ),
                'search_items'      => __( 'Пошук новин', 'vodolaha-info' ),
                'not_found'         => __( 'Новин не знайдено', 'vodolaha-info' ),
                'not_found_in_trash'=> __( 'Новин не знайдено в Корзині', 'vodolaha-info' ),
                'menu_name'         => __( 'Новини', 'vodolaha-info' )
            ],
            'can_export'          => true,
            'exclude_from_search' => false,
            'public'              => true,
            'hierarchical'        => false,
            'publicly_queryable'  => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_ui'             => true,
            'has_archive'         => true,
            'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'comments' ],
            'rewrite'             => [ 'slug' => 'news' ]
        ] );

    }

    /**
     *
     */
    public function add_taxonomy()
    {
        \register_taxonomy( 'news-category', 'vi_news', [
            'hierarchical'  => true,
            'label'         => __( 'Категорії', 'vodolaha-info' ),
            'query_var'     => true,
            'rewrite'       => ['slug' => 'news-category']
        ] );
    }
        /**
     *
     */
    public function add_theme_support()
    {
        add_theme_support( 'post-thumbnails', array( 'vi_news' ) );
    }
    /**
     *
     */
    public function fields()
    {
        /**
         *
         */
        acf_add_local_field_group( [
            'key'   => 'group_news',
            'title' => __('Додаткові поля', 'vodolaha-info'),
            'fields' => [
                [
                    'key'           => 'field_is_highlighted',
                    'label'         => __('Обрана новина', 'vodolaha-info'),
                    'name'          => 'is_highlighted',
                    'type'          => 'true_false',
                    'message'       => __('Додати до обраних новин', 'vodolaha-info'),
                ],
            ],
            'location' => [
                [
                    [
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'vi_news',
                    ],
                ],
            ],
            'position' => 'side',
        ] );
    }
}