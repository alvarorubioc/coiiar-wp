<?php

// let's create the function for the custom type - Agenda
function custom_post_agenda() { 
    // creating (registering) the custom type 
    register_post_type( 'agenda', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array('labels' => array(
            'name' => __('Agenda', 'coiiar'), /* This is the Title of the Group */
            'singular_name' => __('Eventos', 'coiiar'), /* This is the individual type */
            'all_items' => __('Todos los eventos', 'coiiar'), /* the all items menu item */
            'add_new' => __('Añadir nuevo', 'coiiar'), /* The add new menu item */
            'add_new_item' => __('Añadir nuevo evento', 'coiiar'), /* Add New Display Title */
            'edit' => __( 'Editar', 'coiiar' ), /* Edit Dialog */
            'edit_item' => __('Editar evento', 'coiiar'), /* Edit Display Title */
            'new_item' => __('Nuevo evento', 'coiiar'), /* New Display Title */
            'view_item' => __('Ver evento', 'coiiar'), /* View Display Title */
            'search_items' => __('Buscar evento', 'coiiar'), /* Search Custom Type Title */ 
            'not_found' =>  __('Nada encontrado en base de datos.', 'coiiar'), /* This displays if there are no entries yet */ 
            'not_found_in_trash' => __('Nada econtrado en papelera', 'coiiar'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
            'public' => true,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 10, /* this is what order you want it to appear in on the left hand side menu */ 
            'menu_icon' => 'dashicons-calendar', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
            'rewrite'   => array( 'slug' => 'agenda', 'coiiar' , 'with_front' => true ), /* you can specify its url slug */
            'has_archive' => __('agenda', 'coiiar'), /* you can rename the slug here */
            'capability_type' => 'post',
            'hierarchical' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail')
        ) /* end of options */
    ); /* end of register post type */
    
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_agenda');

// now let's add custom Product categories 
register_taxonomy( 'events-category', 
array('agenda'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
array('hierarchical' => true,     /* if this is true, it acts like categories */             
    'labels' => array(
        'name' => __( 'Categorías agenda', 'coiiar' ), /* name of the custom taxonomy */
        'singular_name' => __( 'Categoría eventos', 'coiiar' ), /* single taxonomy name */
        'search_items' =>  __( 'Search categories', 'coiiar' ), /* search title for taxomony */
        'all_items' => __( 'All categories', 'coiiar' ), /* all title for taxonomies */
        'parent_item' => __( 'Parent category', 'coiiar' ), /* parent title for taxonomy */
        'parent_item_colon' => __( 'Parent category:', 'coiiar' ), /* parent taxonomy title */
        'edit_item' => __( 'Edit Category', 'coiiar' ), /* edit custom taxonomy title */
        'update_item' => __( 'Update Category', 'coiiar' ), /* update title for taxonomy */
        'add_new_item' => __( 'Add new Category', 'coiiar' ), /* add new title for taxonomy */
        'new_item_name' => __( 'New Category', 'coiiar' ) /* name title for taxonomy */
    ),
    'show_admin_column' => true,
    'show_in_rest' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite'   => array( 'slug' => 'product-category', 'coiiar' , 'with_front' => true ), /* you can specify its url slug */
    'has_archive' => true, /* you can rename the slug here */
    )
);