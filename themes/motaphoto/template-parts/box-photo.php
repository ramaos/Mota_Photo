<article class="container__posts">
    <?php
    $thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium_large');
    $thumbnail_src = $thumbnail_html['0'];
    ?>
    <p class="categorie">
        <?php
        $categories = get_the_terms(get_the_ID(), 'categorie');
        if ($categories && !is_wp_error($tcategories)) {

            foreach ($categories as $categorie) {

                echo '<a href="' . esc_url(get_term_link($categorie)) . '" class="terme">' . esc_html($categorie->name) . '</a> ';
            }
        }
        ?>
    </p>
    <p class="reference">
        <?php the_field('reference'); ?>
    </p>
    <a href="<?php the_permalink(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.png" class="icon_eye" alt="icon eye">
    </a>
    <a href="<?= $thumbnail_src; ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_fullscreen.png" class="icon_fullscreen" alt="icon fullscreen">
    </a>
    <?php the_post_thumbnail('card-post'); ?>
</article>