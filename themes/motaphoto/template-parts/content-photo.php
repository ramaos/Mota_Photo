<?php
if (is_single()) {

    $taxonomie = 'categorie';
    $terme = get_the_term_list(get_the_ID(), $taxonomie);
    $args = array(
        'post_type' => 'cif_photo',
        'posts_per_page' => 2,
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'post__not_in' => array(get_the_ID()),
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomie,
                'field'    => 'slug',
                'terms'    => $terme,
            ),
        ),
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/box-photo');
        endwhile;
    else :
        echo "Aucun post trouvé avec cette taxonomie.";
    endif;
    wp_reset_postdata();
} else {
    //$order = strtoupper($_POST['order']);
    $args = [
        'post_type' => 'cif_photo',
        'posts_per_page' => 8,
        'paged' => 1,
        'orderby' => 'date',
        'order' => 'ASC',
    ];
    // Affichage du portofolio sur la page.
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/box-photo');
        endwhile;
    // Réinitialiser la requête post
    else :
        echo "Aucun post trouvé avec cette taxonomie.lol";
    endif;
    wp_reset_postdata();
};
