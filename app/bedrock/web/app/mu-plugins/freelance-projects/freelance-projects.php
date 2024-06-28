<?php
/**
 * Plugin Name: Freelance Projects
 * Description: Showcases my Freelance Projects
 * Version: 1.0
 * Author: Your Name
 */

namespace FreelanceProjects;

function register_freelance_projects() {
    $labels = [
        'name'                  => _x('Freelance Projects', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Freelance Project', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Freelance Projects', 'text_domain'),
        'name_admin_bar'        => __('Freelance Project', 'text_domain'),
        'archives'              => __('Item Archives', 'text_domain'),
        'attributes'            => __('Item Attributes', 'text_domain'),
        'parent_item_colon'     => __('Parent Item:', 'text_domain'),
        'all_items'             => __('All Items', 'text_domain'),
        'add_new_item'          => __('Add New Item', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New Item', 'text_domain'),
        'edit_item'             => __('Edit Item', 'text_domain'),
        'update_item'           => __('Update Item', 'text_domain'),
        'view_item'             => __('View Item', 'text_domain'),
        'view_items'            => __('View Items', 'text_domain'),
        'search_items'          => __('Search Item', 'text_domain'),
        'not_found'             => __('Not found', 'text_domain'),
        'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
        'featured_image'        => __('Featured Image', 'text_domain'),
        'set_featured_image'    => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image'    => __('Use as featured image', 'text_domain'),
        'insert_into_item'      => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list'            => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list'     => __('Filter items list', 'text_domain'),
    ];
    $args = [
        'label'                 => __('Freelance Project', 'text_domain'),
        'description'           => __('Showcases my Freelance Projects', 'text_domain'),
        'labels'                => $labels,
        'supports'              => ['title', 'editor', 'thumbnail'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    ];
    register_post_type('freelance_project', $args);
}

add_action('init', __NAMESPACE__ . '\\register_freelance_projects');

function add_acf_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_freelance_projects',
            'title' => 'Freelance Projects Fields',
            'fields' => array(
                array(
                    'key' => 'field_description',
                    'label' => 'Description',
                    'name' => 'description',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'field_image_gallery',
                    'label' => 'Image Gallery',
                    'name' => 'image_gallery',
                    'type' => 'gallery',
                ),
                array(
                    'key' => 'field_link',
                    'label' => 'Link',
                    'name' => 'link',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_date_started',
                    'label' => 'Date Started',
                    'name' => 'date_started',
                    'type' => 'date_picker',
                ),
                array(
                    'key' => 'field_duration',
                    'label' => 'Duration',
                    'name' => 'duration',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_technologies_used',
                    'label' => 'Technologies Used',
                    'name' => 'technologies_used',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_role',
                    'label' => 'Role',
                    'name' => 'role',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_team_size',
                    'label' => 'Team Size',
                    'name' => 'team_size',
                    'type' => 'number',
                ),
                array(
                    'key' => 'field_org_size',
                    'label' => 'Org Size',
                    'name' => 'org_size',
                    'type' => 'number',
                ),
                array(
                    'key' => 'field_client',
                    'label' => 'Client',
                    'name' => 'client',
                    'type' => 'text',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'freelance_project',
                    ),
                ),
            ),
        ));
    }
}

add_action('acf/init', __NAMESPACE__ . '\\add_acf_fields');