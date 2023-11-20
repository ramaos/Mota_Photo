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
            //$thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'header_image');
            // $thumbnail_src = $thumbnail_html['0'];
            // $alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt');
            // $alt = $alt[0];
            // if ($active) {
            //     $class = ' active';
            // } else {
            //     $class = '';
            // }
        ?>

            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('header_image', ['class' => 'header__header']); ?>
                <!-- <img src="<?php echo $thumbnail_src; ?>" alt="<?php echo $alt; ?> "> -->
                <h1 class="header__title animate__animated animate__zoomIn">PHOTOGRAPHE EVENT</h1>
            </a>
            <!-- </div> -->

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
        <?php get_template_part('template-parts/content-photo');

        ?>
    </div>
    <div class="container__btn">
        <button id="ajax_call_1" type="button" class="btn">
            <?php _e('Charger plus', 'cookinfamily'); ?>
        </button>
    </div>

</section>

<?php get_footer(); ?>