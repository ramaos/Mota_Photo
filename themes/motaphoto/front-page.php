<?php get_header(); ?>

<section class="header">
    <?php
    $args = [
        'post_type' => 'cif_photo',
        'posts_per_page' => 1,
        'order' => 'ASC',
        'orderby' => 'rand',
    ];
    $motaphoto_query = new WP_Query($args);
    if ($motaphoto_query->have_posts()) :
    ?>
        <?php
        while ($motaphoto_query->have_posts()) :
            $motaphoto_query->the_post();
        ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('header-image', ['class' => 'header__header']); ?>
                <h1 class="header__title animate__animated animate__zoomIn">PHOTOGRAPHE EVENT</h1>
            </a>
        <?php
        endwhile; ?>
    <?php endif;

    wp_reset_postdata();

    ?>
</section>
<section class="section">

    <?php get_template_part('template-parts/filters');
    ?>

    <div class="container" id="container">
        <?php
        get_template_part('template-parts/content-photo');
        ?>
    </div>
    <div class="ajaxBtn">
        <div class="ajaxBtn__container">
            <button id="ajax_call" type="button" class="ajaxBtn__container--btn">
                <?php _e('Charger plus', 'cookinfamily'); ?>
            </button>
        </div>
    </div>

</section>

<?php get_footer(); ?>