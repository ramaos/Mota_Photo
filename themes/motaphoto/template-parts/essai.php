<section class="container__posts">
    <?php
    $args = [
        'post_type' => 'cif_photo',
        'categorie' => 'mariage',
        'posts_per_page' => 8,

        'order' => 'ASC',
        'orderby' => 'menu_order',

    ];

    $motaphoto_query = new WP_Query($args);
    if ($motaphoto_query->have_posts()) :

        while ($motaphoto_query->have_posts()) :
            $motaphoto_query->the_post();
            $thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'header_image');
            $thumbnail_src = $thumbnail_html['0'];
            $alt_array = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt');
            $alt = $alt_array['0'];
            $name = get_the_title();
            $final_array = [$name, $thumbnail_src, $alt];
            $response = $final_array;

    ?>
    <?php
        endwhile;
    endif;
    ?>
</section>
<section class="container__posts">


    <?php
    $args = [
        'post_type' => 'cif_photo',
        'posts_per_page' => 8,
        'order' => 'ASC',
        'orderby' => 'menu_order',
    ];

    $my_query = new WP_Query($args);
    //$i = 1;

    if ($my_query->have_posts()) :
        while ($my_query->have_posts()) :
            $my_query->the_post();
            $thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'card-post');
            $thumbnail_src = $thumbnail_html['0'];
            $alt_array = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt');
            $alt = $alt_array['0'];
            $name = get_the_title();
            $taxonomies = get_the_taxonomies();
            $taxonomie = $taxonomies['catégorie_de_photo'];

            $final_array = [$name, $thumbnail_src, $alt];
            $response = $final_array;
    ?>
            <article class="posts">
                <img src="<?php echo $thumbnail_src; ?>" alt="<?php echo $alt; ?> ">
                <h2><?php the_title() ?></h2>
            </article>
        <?php endwhile;
    else : ?>
        <p><?php esc_html_e('Nous sommes aux regrets de ne pas pouvoir répondre a votre requette, il n y pas de photo dans notre base de données.', 'motaphoto'); ?></p>
    <?php endif;

    wp_reset_postdata();
    ?>


</section>

<? php //====================================================================================================================================
?>

*/
<!-- <div class="filter__container">
    <form class="filter__form" method="post"> -->
<!-- -->
<!-- $terms->term_id :  -->
<!-- $terms->taxonomy : nom de la taxonomie -->
<!-- $terms->name : nom de l'élément de la taxonomie -->
<!-- $terms->term_taxonomy_id : n° de l'élément de la taxonomie -->
<!-- <div class="filter__select">
            <div id="filter-categorie" class="select-filter flexcolumn">
                <span class="categorie_id-downx dashiconsx dashicons-arrow-downx select-close"></span>
                <label for="categorie_id">
                    <p>catégories</p>
                </label>
                <select class="option-filter" name="categorie_id" id="categorie_id"> -->
<!-- Génération automatique de la liste des catégories en fonction de ce qu'il y a dans WP -->
<!-- <option id="categorie_0" value=""></option>
                    <option id="categorie_47" value="47">Anniversaire</option>
                    <option id="categorie_112" value="112">Essais</option>
                    <option id="categorie_48" value="48">Evènement</option>
                    <option id="categorie_49" value="49">Mariage</option>
                    <option id="categorie_50" value="50">Soirée entreprise</option>
                </select>
            </div>
            <div id="filter-format" class="select-filter flexcolumn">
                <span class="format_id-downx dashiconsx dashicons-arrow-downx select-close"></span>
                <label for="format_id">
                    <p>formats</p>
                </label>
                <select class="option-filter" name="format_id" id="format_id"> -->
<!-- Génération automatique de la liste des formats en fonction de ce qu'il y a dans WP -->
<!-- <option id="format_0" value=""></option>
                    <option id="format_54" value="54">1/1</option>
                    <option id="format_53" value="53">A4</option>
                    <option id="format_52" value="52">Paysage</option>
                    <option id="format_111" value="111">Personnel</option>
                    <option id="format_51" value="51">Portrait</option>
                </select>
            </div>
        </div>
        <div class="filterright swiper-slide flexrow">
            <div id="filtre-date" class="select-filter flexcolumn">
                <span class="date-downx dashiconsx dashicons-arrow-downx select-close"></span>
                <label for="date">
                    <p>trier par</p>
                </label>
                <select class="option-filter" name="date" id="date">
                    <option value=""></option>
                    <option value="desc">nouveauté</option>
                    <option value="asc">Les plus anciens</option>
                </select>
            </div>
        </div>
    </form>
</div> -->