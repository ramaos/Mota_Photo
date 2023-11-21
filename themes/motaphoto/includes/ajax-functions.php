<?php

//==============  fonction pour afficher plus de photos  ===========//
function afficher_plus()
{
    //     $args = [
    //         'post_type' => 'cif_photo',
    //         'orderby' => 'date',
    //         'posts_per_page' => 8,
    //         'offset' => 8,
    //         'order' => 'ASC',
    //     ];
    //     $query = new WP_Query($args);
    //     if ($query->have_posts()) :
    //         while ($query->have_posts()) :
    //             $query->the_post();
    //             $response = $query;
    //         endwhile;
    //     else :
    //         $response = false;
    //     endif;
    //     wp_send_json($response);
    //     wp_die();
    //============================
    // check_ajax_referer('load_more_posts', 'security');
    $page = $_POST['page'];
    $args = [
        'post_type' => 'cif_photo',
        'posts_per_page' => 4,
        'paged' => $page,
        'orderby' => 'date',
        'order' => 'ASC',
    ];
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/box-photo');
        endwhile;
    else :
        echo 'Oups! Aucun résultat à votre requette.';
    endif;
    wp_reset_postdata();
    wp_die();
} //  fin de la fonction afficher plus de photos

add_action('wp_ajax_affichage_plus', 'afficher_plus'); // appel ajax
add_action('wp_ajax_nopriv_affichage_plus', 'afficher_plus'); // appel ajax nopriv 

//================== fonction filtres  ================================ //

function filtre_des_posts()
{

    $categorie =  strtoupper($_POST['category']);
    $format = strtoupper($_POST['format']);
    $order = strtoupper($_POST['order']);

    if ($categorie && $format) {
        $args = array(
            'post_type' => 'cif_photo',
            'orderby' => 'date',
            'order' => $order,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'categorie',
                    'field' => 'slug',
                    'terms' => $categorie,
                ),
                array(
                    'taxonomy' => 'format',
                    'field' => 'slug',
                    'terms' => $format,
                ),
            ),
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                get_template_part('template-parts/box-photo');
            endwhile;
        else :
            echo "Oups ! Pas de photos correspondant a votre recherche.";
        endif;
        wp_reset_postdata();
    } elseif ($categorie) {
        $args = array(
            'post_type' => 'cif_photo',
            'orderby' => 'date',
            'order' => $order,
            'tax_query' => array(
                array(
                    'taxonomy' => 'categorie',
                    'field'    => 'slug',
                    'terms'    =>  $categorie,
                ),
            ),
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                get_template_part('template-parts/box-photo');
            endwhile;
        else :
            echo "Oups ! Pas de photos correspondant a votre recherche.";

        endif;
        wp_reset_postdata();
    } elseif ($format) {
        $args = array(
            'post_type' => 'cif_photo',
            'orderby' => 'date',
            'order' => $order,
            'tax_query' => array(
                array(
                    'taxonomy' => 'format',
                    'field'    => 'slug',
                    'terms'    =>  $format,
                ),
            ),
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                get_template_part('template-parts/box-photo');
            endwhile;
        else :
            echo "Oups ! Pas de photos correspondant a votre recherche.";
        endif;
        wp_reset_postdata();
    } elseif ($order) {
        $args = array(
            'post_type' => 'cif_photo',
            'posts_per_page' => 8,
            'orderby' => 'date',
            'order' => $order,
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                get_template_part('template-parts/box-photo');
            endwhile;
        else :
            echo "Oups ! Pas de photos correspondant a votre recherche.";
        endif;
        wp_reset_postdata();
    }
    die();
}

add_action('wp_ajax_filtre_des_posts', 'filtre_des__posts');
add_action('wp_ajax_nopriv_filtre_des_posts', 'filtre_des_posts');
