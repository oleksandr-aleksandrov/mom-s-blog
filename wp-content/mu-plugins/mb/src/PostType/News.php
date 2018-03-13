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
                'name'              => __( 'Новини', 'mb' ),
                'singular_name'     => __( 'Новини', 'mb' ),
                'add_new'           => __( 'Додати новину', 'mb' ),
                'add_new_item'      => __( 'Додати новину', 'mb' ),
                'edit_item'         => __( 'Редагувати новину', 'mb' ),
                'new_item'          => __( 'Додати новину', 'mb' ),
                'all_items'         => __( 'Всі новини', 'mb' ),
                'view_item'         => __( 'Переглянути новину', 'mb' ),
                'search_items'      => __( 'Пошук новин', 'mb' ),
                'not_found'         => __( 'Новин не знайдено', 'mb' ),
                'not_found_in_trash'=> __( 'Новин не знайдено в Корзині', 'mb' ),
                'menu_name'         => __( 'Новини', 'mb' )
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
            'label'         => __( 'Категорії', 'mb' ),
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
            'title' => __('Додаткові поля', 'mb'),
            'fields' => [
                [
                    'key'           => 'field_is_highlighted',
                    'label'         => __('Обрана новина', 'mb'),
                    'name'          => 'is_highlighted',
                    'type'          => 'true_false',
                    'message'       => __('Додати до обраних новин', 'mb'),
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