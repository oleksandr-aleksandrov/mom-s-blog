<?php

namespace MB\PostType;


class Templates
{
    /**
     *
     */
    public function __construct()
    {
        /**
         *
         */
        add_action('acf/init', [$this, 'register_fields_useful_link']);
        /**
         *
         */

    }

    /**
     * @return mixed
     */
    public function register_post_type()
    {

    }

    /**
     *
     */
    public function register_fields_useful_link()
    {
        acf_add_local_field_group(array(
            'key' => 'new_content',
            'title' => 'Додатковий контент',
            'fields' => array(
                [
                    'key' => 'useful_link',
                    'label' => __('Кориснi посилання', 'mb'),
                    'name' => 'useful_link',
                    'type' => 'repeater',
                    'layout' => 'table',
                    'max' => '0',
                    'sub_fields' => [
                        [
                            'key' => 'useful_link_image',
                            'label' => __('Зображення', 'mb'),
                            'name' => 'useful_link_image',
                            'type' => 'image',
                        ],
                        [
                            'key' => 'useful_link_name',
                            'label' => __('Опис', 'mb'),
                            'name' => 'useful_link_name',
                            'type' => 'text',
                        ],
                        [
                            'key' => 'useful_link_url',
                            'label' => __('Cайт', 'mb'),
                            'name' => 'useful_link_url',
                            'type' => 'url',
                        ],
                    ],
                ],
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'templates/template-useful-link.php',
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

}