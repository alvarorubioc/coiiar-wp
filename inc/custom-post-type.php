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
register_taxonomy( 'category-events', 
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
    'rewrite'   => array( 'slug' => 'agenda', 'coiiar' , 'with_front' => false ), /* you can specify its url slug */
    'has_archive' => true, /* you can rename the slug here */
    )
);


// let's create the function for the custom type - Bolsa de Trabajo
function custom_post_bolsa_trabajo() { 
    // creating (registering) the custom type 
    register_post_type( 'bolsa-trabajo', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array('labels' => array(
            'name' => __('Bolsa de Trabajo', 'coiiar'), /* This is the Title of the Group */
            'singular_name' => __('Ofertas', 'coiiar'), /* This is the individual type */
            'all_items' => __('Todos las ofertas', 'coiiar'), /* the all items menu item */
            'add_new' => __('Añadir nuevo', 'coiiar'), /* The add new menu item */
            'add_new_item' => __('Añadir nueva oferta', 'coiiar'), /* Add New Display Title */
            'edit' => __( 'Editar', 'coiiar' ), /* Edit Dialog */
            'edit_item' => __('Editar oferta', 'coiiar'), /* Edit Display Title */
            'new_item' => __('Nueva oferta', 'coiiar'), /* New Display Title */
            'view_item' => __('Ver oferta', 'coiiar'), /* View Display Title */
            'search_items' => __('Buscar oferta', 'coiiar'), /* Search Custom Type Title */ 
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
            'menu_position' => 11, /* this is what order you want it to appear in on the left hand side menu */ 
            'menu_icon' => 'dashicons-hammer', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
            'rewrite'   => array( 'slug' => 'ofertas-de-empleo', 'coiiar' , 'with_front' => true ), /* you can specify its url slug */
            'has_archive' => __('ofertas-de-empleo', 'coiiar'), /* you can rename the slug here */
            'capability_type' => 'post',
            'hierarchical' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail')
        ) /* end of options */
    ); /* end of register post type */
    
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_bolsa_trabajo');

// now let's add custom Sector categories 
register_taxonomy( 'category-sectors', 
array('bolsa-trabajo'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
array('hierarchical' => true,     /* if this is true, it acts like categories */             
    'labels' => array(
        'name' => __( 'Sectores ofertas', 'coiiar' ), /* name of the custom taxonomy */
        'singular_name' => __( 'Sector oferta', 'coiiar' ), /* single taxonomy name */
        'search_items' =>  __( 'Buscar sector', 'coiiar' ), /* search title for taxomony */
        'all_items' => __( 'Todos los sectores', 'coiiar' ), /* all title for taxonomies */
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
    'rewrite'   => array( 'slug' => 'ofertas-de-empleo/sector', 'coiiar' , 'with_front' => true ), /* you can specify its url slug */
    'has_archive' => true, /* you can rename the slug here */
    )
);

// now let's add custom Sector categories 
register_taxonomy( 'category-location', 
array('bolsa-trabajo'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
array('hierarchical' => true,     /* if this is true, it acts like categories */             
    'labels' => array(
        'name' => __( 'Ubicaciones ofertas', 'coiiar' ), /* name of the custom taxonomy */
        'singular_name' => __( 'Ubicación oferta', 'coiiar' ), /* single taxonomy name */
        'search_items' =>  __( 'Buscar ubicación', 'coiiar' ), /* search title for taxomony */
        'all_items' => __( 'Todas las ubicaciones', 'coiiar' ), /* all title for taxonomies */
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
    'rewrite'   => array( 'slug' => 'ofertas-de-empleo/ubicacion', 'coiiar' , 'with_front' => false ), /* you can specify its url slug */
    'has_archive' => true, /* you can rename the slug here */
    )
);


// let's create the function for the custom type - Normativas
function custom_post_normativas() { 
    // creating (registering) the custom type 
    register_post_type( 'normativas', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array('labels' => array(
            'name' => __('Normativas', 'coiiar'), /* This is the Title of the Group */
            'singular_name' => __('Normativa', 'coiiar'), /* This is the individual type */
            'all_items' => __('Todas las normativas', 'coiiar'), /* the all items menu item */
            'add_new' => __('Añadir nueva', 'coiiar'), /* The add new menu item */
            'add_new_item' => __('Añadir nueva normativa', 'coiiar'), /* Add New Display Title */
            'edit' => __( 'Editar', 'coiiar' ), /* Edit Dialog */
            'edit_item' => __('Editar normativa', 'coiiar'), /* Edit Display Title */
            'new_item' => __('Nueva normativa', 'coiiar'), /* New Display Title */
            'view_item' => __('Ver normativa', 'coiiar'), /* View Display Title */
            'search_items' => __('Buscar normativa', 'coiiar'), /* Search Custom Type Title */ 
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
            'menu_position' => 11, /* this is what order you want it to appear in on the left hand side menu */ 
            'menu_icon' => 'dashicons-clipboard', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
            //'rewrite'   => array( 'slug' => 'normativa', 'coiiar' , 'with_front' => true ), /* you can specify its url slug */
            'has_archive' => false, //__('normativas', 'coiiar'), /* you can rename the slug here */
            'capability_type' => 'post',
            'hierarchical' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail')
        ) /* end of options */
    ); /* end of register post type */
    
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_normativas');

// now let's add custom Sector categories 
register_taxonomy( 'sectors-normativa', 
array('normativas'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
array('hierarchical' => true,     /* if this is true, it acts like categories */             
    'labels' => array(
        'name' => __( 'Sectores normativas', 'coiiar' ), /* name of the custom taxonomy */
        'singular_name' => __( 'Sector normativa', 'coiiar' ), /* single taxonomy name */
        'search_items' =>  __( 'Buscar sector', 'coiiar' ), /* search title for taxomony */
        'all_items' => __( 'Todos los sectores', 'coiiar' ), /* all title for taxonomies */
        'parent_item' => __( 'Sector padre', 'coiiar' ), /* parent title for taxonomy */
        'parent_item_colon' => __( 'Parent category:', 'coiiar' ), /* parent taxonomy title */
        'edit_item' => __( 'Editar sector', 'coiiar' ), /* edit custom taxonomy title */
        'update_item' => __( 'Actualizar sector', 'coiiar' ), /* update title for taxonomy */
        'add_new_item' => __( 'Añadir nuevo sector', 'coiiar' ), /* add new title for taxonomy */
        'new_item_name' => __( 'Nuevo sector', 'coiiar' ) /* name title for taxonomy */
    ),
    'show_admin_column' => true,
    'show_in_rest' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite'   => array( 'slug' => 'normativa/sector', 'coiiar' , 'with_front' => false ), /* you can specify its url slug */
    'has_archive' => true, /* you can rename the slug here */
    )
);

// now let's add custom Sector categories 
register_taxonomy( 'location-normativa', 
array('normativas'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
array('hierarchical' => true,     /* if this is true, it acts like categories */             
    'labels' => array(
        'name' => __( 'Ubicaciones normativas', 'coiiar' ), /* name of the custom taxonomy */
        'singular_name' => __( 'Ubicación normativa', 'coiiar' ), /* single taxonomy name */
        'search_items' =>  __( 'Buscar ubicación', 'coiiar' ), /* search title for taxomony */
        'all_items' => __( 'Todas las ubicaciones', 'coiiar' ), /* all title for taxonomies */
        'parent_item' => __( 'Ubicación padre', 'coiiar' ), /* parent title for taxonomy */
        'parent_item_colon' => __( 'Parent category:', 'coiiar' ), /* parent taxonomy title */
        'edit_item' => __( 'Editar ubicación', 'coiiar' ), /* edit custom taxonomy title */
        'update_item' => __( 'Actualizar ubicación', 'coiiar' ), /* update title for taxonomy */
        'add_new_item' => __( 'Añadir nueva ubicación', 'coiiar' ), /* add new title for taxonomy */
        'new_item_name' => __( 'Nueva ubicación', 'coiiar' ) /* name title for taxonomy */
    ),
    'show_admin_column' => true,
    'show_in_rest' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite'   => array( 'slug' => 'normativa/ubicacion', 'coiiar' , 'with_front' => false ), /* you can specify its url slug */
    'has_archive' => true, /* you can rename the slug here */
    )
);

// now let's add custom Normativa Tags 
register_taxonomy( 'tags-normativa', 
array('normativas'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
array('hierarchical' => false,     /* if this is true, it acts like categories */             
    'labels' => array(
        'name' => __( 'Etiquetas normativas', 'coiiar' ), /* name of the custom taxonomy */
        'singular_name' => __( 'Etiqueta normativa', 'coiiar' ), /* single taxonomy name */
        'search_items' =>  __( 'Buscar etiqueta', 'coiiar' ), /* search title for taxomony */
        'all_items' => __( 'Todas las etiquetas', 'coiiar' ), /* all title for taxonomies */
        'edit_item' => __( 'Editar etiqueta', 'coiiar' ), /* edit custom taxonomy title */
        'update_item' => __( 'Actualizar etiquetas', 'coiiar' ), /* update title for taxonomy */
        'add_new_item' => __( 'Añadir nueva etiqueta', 'coiiar' ), /* add new title for taxonomy */
        'new_item_name' => __( 'Nueva etiqueta', 'coiiar' ) /* name title for taxonomy */
    ),
    'show_admin_column' => true,
    'show_in_rest' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite'   => array( 'slug' => 'normativa/etiqueta', 'coiiar' , 'with_front' => false ), /* you can specify its url slug */
    'has_archive' => true, /* you can rename the slug here */
    )
);