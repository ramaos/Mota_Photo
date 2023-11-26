<?php
define('MOTAPHOTO_VERSION', '2.0.0');
function motaphoto_register_assets() // fonction de chargement des styles et scripts
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css', [], MOTAPHOTO_VERSION, 'all');
    wp_enqueue_style('animate-style', get_template_directory_uri() . '/assets/css/animate.min.css', [], '4.1.1');
    wp_enqueue_style('motaphoto-style', get_stylesheet_directory_uri() . '/assets/css/theme.css', ['animate-style'], filemtime(get_stylesheet_directory() . '/assets/css/theme.css'), 'all');
    wp_enqueue_script('lightbox-script', get_template_directory_uri() . '/assets/js/lightbox.js', ['jquery'], filemtime(get_stylesheet_directory() . '/assets/js/lightbox.js'), true); // script affichage plus
    wp_enqueue_script('motaphoto-script', get_template_directory_uri() . '/assets/js/theme-script.js', ['jquery'], filemtime(get_stylesheet_directory() . '/assets/js/theme-script.js'), true);
    // script ajax
    if (is_front_page()) {
        wp_enqueue_script('ajax-script', get_template_directory_uri() . '/assets/js/ajax-affichage-plus.js', ['jquery'], filemtime(get_stylesheet_directory() . '/assets/js/ajax-affichage-plus.js'), true);
    } // script affichage plus
    wp_localize_script('ajax-script', 'ajaxVars', ['url' => admin_url('admin-ajax.php')]); // methode-2- chargement ajax url

} // fin de la fonction de chargement des styles et scripts

function motaphoto_supports() // fonction du theme supports
{
    add_theme_support('title-tag'); // affichage de la balise titre
    require_once('includes/class-wp-bootstrap-navwalker.php'); // ajout de la bibliotheque navwalker de bootstrap
    add_theme_support('menus');
    register_nav_menus(['header' => 'menu en-tete', 'footer' => 'menu pied de page']);
    //register_nav_menu('footer', 'menu pied de page');
    add_theme_support('post-thumbnails');
    add_image_size('card-post', 564, 495, true);
    add_image_size('header_image', 1440, 962, true);
    add_image_size('single_image', 563, 844, true);
    remove_action('wp_head', 'wp_generator'); // suppression du générateur de version wordpress
    remove_filter('the_content', 'wptexturize'); // suppression des guillemets a la francaise
} // fin de la fonction du theme supports

function motaphoto_image_sizes($sizes) //fonction de chargement dans l'administration de la taille d'image enregistrée
{
    return array_merge($sizes, array(
        'card-post' => __('taille des photo', 'motaphoto'),
    ));
}

function contact_motaphoto($items, $args) // fonction d'affichage de contact dans le menu
{
    if ($args->theme_location == 'header') {
        $items .= '<li class= "navbar__nav--item contact__motaphoto">CONTACT</li>';
    }
    return $items;
}

function motaphoto_menu_class($classes) // ajout de class aux balises li
{
    $classes[] = 'navbar__nav--item';
    return $classes;
}
function motaphoto_menu_link_class($attrs) // ajout de class aux liens
{
    $attrs['class'] = 'navbar__nav--link';
    return $attrs;
}

add_action('wp_enqueue_scripts', 'motaphoto_register_assets'); // chargement des styles et scripts
add_action('after_setup_theme', 'motaphoto_supports'); // supports du theme
add_filter('wp_nav_menu_items', 'contact_motaphoto', 10, 2); // affichage de "contact" dans le menu
add_filter('image_size_names_choose', 'motaphoto_image_sizes'); // affichage de la taille personnalisée "card-post"
add_filter('nav_menu_css_class', 'motaphoto_menu_class'); // ajout des class des "li"
add_filter('nav_menu_link_attributes', 'motaphoto_menu_link_class'); // ajout des class des liens 

//=================================================
//         fonctions Ajax
//=================================================
include('includes/ajax-functions.php');

//=================================================
//           post type et taxonomie
//=================================================
include('includes/cpt-taxonomie-function.php');
