<?php get_header(); ?>
<h1>Le Blog de Nathalie MOTA</h1>
<section class="container">
    <?php

    $args = [
        'post_type' => 'cif_photo',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'date',
        'page' => 2,
    ];

    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) :
        while ($my_query->have_posts()) :
            $my_query->the_post();
    ?>

            <article class="post">
                <h2 class="post__title"><?php the_title(); ?></h2>
                <?php the_post_thumbnail('card-post'); ?>
                <div class="post__excerpt">
                    <?php the_excerpt(); ?>
                </div>
                <div class="post__meta">
                    <p>Publié le: <?php the_time(get_option('date_format')); ?> à: <?php the_time(get_option('thumbnail')); ?></p>
                    <p> par: <?php the_author(); ?></p>
                    <p>Commentaire: <?php comments_number(); ?></p>
                </div>
                <p>
                    <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite...</a>
                </p>
            </article>

    <?php endwhile;
    endif; ?>
</section>
<?php get_footer(); ?>