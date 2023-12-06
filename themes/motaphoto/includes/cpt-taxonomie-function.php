<?php
function motaphoto_register_custom_post_types() // fonction post type
{
    $labels_photos =
        [
            'menu_name' => __('Photos', 'motaphoto'),
            'name_admin_bar' => __('Photo', 'motaphoto'),
            'add_new_item' => __('Ajouter une nouvelle photo', 'motaphoto'),
            'new_item' => __('Nouvelle photo', 'motaphoto'),
            'edit_item' => __('Modifier la photo', 'motaphoto'),
        ];
    $args_photos =
        [
            'label' => __('Photos', 'motaphoto'),
            'description'       => __('Photos', 'motaphoto'),
            'labels'            => $labels_photos,
            'supports'          => ['title', 'editor', 'author', 'page-attributes', 'thumbnail', 'excerpt',],
            'hierarchical'      => false,
            'public'            => true,
            'show_ui'           => true,
            'show_in_menu'      => true,
            'menu_position'     => 40,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export'        => true,
            'has_archive'       => true,
            'exclude_from_search'   => false,
            'publicly_queryable'  => true,
            'capability_type'   => 'post',
            'rewrite'           => ['sleug' => 'photo'],
            'menu_icon'  => 'dashicons-images-alt2',
        ];
    register_post_type('cif_photo', $args_photos);
} // fin de la fonction post type

function motaphoto_register_taxonomies_categorie_photo() // fontion taxonomie categorie
{

    $labels = array(
        'name'              => __('Catégorie de photo'),
        'singular_name'     => __('Catégorie de photo'),
        'search_items'      => __('Rechercher une catégorie de photo'),
        'all_items'         => __('Toutes les catégories de photos'),
        'parent_item'       => __('Parent Catégorie de photo'),
        'parent_item_colon' => __('Parent Catégorie de photo:'),
        'edit_item'         => __('Modifier une catégorie de photo'),
        'update_item'       => __('Mettre à jour une catégorie de photo'),
        'add_new_item'      => __('Ajouter la nouvelle catégorie'),
        'new_item_name'     => __('Nouvelle catégorie de photo'),
        'menu_name'         => __('Catégorie de photo')
    );

    $args = array(

        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'categorie')
    );
    register_taxonomy('categorie', 'cif_photo', $args);
} // fin de la fonction taxonomie categorie 

function motaphoto_register_taxonomies_format_photo() // fonction taxonomie format
{
    $labels = array(
        'name'              => __('Format de photo'),
        'singular_name'     => __('Format de photo'),
        'search_items'      => __('Rechercher un format de photo'),
        'all_items'         => __('Tous les formats de photos'),
        'parent_item'       => __('Parent format de photo'),
        'parent_item_colon' => __('Parent format de photo:'),
        'edit_item'         => __('Modifier un format de photo'),
        'update_item'       => __('Mettre à jour un format de photo'),
        'add_new_item'      => __('Ajouter le nouveau format'),
        'new_item_name'     => __('Nouveau format de photo'),
        'menu_name'         => __('Format de photo')
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'format')
    );
    register_taxonomy('format', 'cif_photo', $args);
} // fin de la fonction taxonomie format

function motaphoto_register_taxonomies_type_photo() // fonction de la taxonomie type
{
    $labels = array(
        'name'              => __('Type de photo'),
        'singular_name'     => __('Type de photo'),
        'search_items'      => __('Rechercher un type de photo'),
        'all_items'         => __('Tous les types de photos'),
        'parent_item'       => __('Parent type de photo'),
        'parent_item_colon' => __('Parent type de photo:'),
        'edit_item'         => __('Modifier un type de photo'),
        'update_item'       => __('Mettre à jour un type de photo'),
        'add_new_item'      => __('Ajouter le nouveau type'),
        'new_item_name'     => __('Nouveau type de photo'),
        'menu_name'         => __('Type de photo'),
        'type'              => 'text',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'format'),
        'capabilities'      => ['edit_terms']
    );
    register_taxonomy('type', 'cif_photo', $args);
} // fin de la fonction de la taxonomie type

function motaphoto_col_change($columns)  //  ordre et image affichée dans l'administration post type "photo" 
{
    $columns['motaphoto_photo_image_order'] = 'Ordre';
    $columns['motaphoto_photo_image'] = 'Image affichée';
    return $columns;
}
function motaphoto_content_show($column, $post_id) // affichage de l'ordre et de l'image dans l'administration post type "photo"
{
    global $post;
    if ($column == 'motaphoto_photo_image') {
        echo the_post_thumbnail([150, 150]);
    }
    if ($column == 'motaphoto_photo_image_order') {
        echo $post->menu_order;
    }
}
function motaphoto_change_order_photo($columns) // changement d'ordre des posts sur l'administration post type "photo"
{
    $columns['motaphoto_photo_image_order'] = 'menu-order';
    return $columns;
}


add_action('init', 'motaphoto_register_custom_post_types', 11); // enregistrement de custom post type "photos"
add_action('init', 'motaphoto_register_taxonomies_categorie_photo');  // enregistrement de la taxonomie custum post type "type de photos"
add_action('init', 'motaphoto_register_taxonomies_format_photo');  // enregistrement de la taxonomie custum post type "format de photos"
add_action('init', 'motaphoto_register_taxonomies_type_photo');  // enregistrement de la taxonomie custum post type "type de photos"
add_filter('manage_edit-cif_photo_columns', 'motaphoto_col_change'); // ordre et image affichée dans l'administration post type "photo"
add_action('manage_cif_photo_posts_custom_column', 'motaphoto_content_show', 10, 2); // affichage de l'ordre et de l'image dans l'administration post type "photo"
add_filter('manage_edit-cif_photo_sortable_columns', 'motaphoto_change_order_photo'); // cargement changement d'ordre des posts sur l'administration post type "photo"