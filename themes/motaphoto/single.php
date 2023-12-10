<?php get_header();
// récupération des terms de taxonomies
$categories = get_the_terms(get_the_ID(), 'categorie');
$formats = get_the_terms(get_the_ID(), 'format');
$types = get_the_terms(get_the_ID(), 'type');

//  affichage des détails de la photo
if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section class="content-single">
            <article class="post-single__card">
                <div class="post-single__card--info">
                    <h2><?php the_title(); ?></h2>

                    <p>
                        RÉFÉRENCE: <span class="ref__photo"><?php the_field('reference'); ?></span>
                    </p>
                    <p>
                        <?php
                        if ($categories && !is_wp_error($tcategories)) {
                            echo 'CATÉGORIE: ';
                            foreach ($categories as $categorie) {
                                echo  esc_html($categorie->name);
                            }
                        } ?>

                    </p>
                    <p>
                        <?php
                        if ($formats && !is_wp_error($formats)) {
                            echo 'FORMAT : ';
                            foreach ($formats as $format) {
                                echo esc_html($format->name);
                            }
                        }
                        ?>
                    </p>
                    <p>
                        <?php
                        if ($types && !is_wp_error($types)) {
                            echo 'TYPE : ';
                            foreach ($types as $type) {
                                echo esc_html($type->name);
                            }
                        }
                        ?>
                    </p>
                    <p>
                        ANNÉE: <?php the_field('annee'); ?>
                    </p>
                </div>
                <?php the_post_thumbnail('single-image'); ?>
            </article>
            <!-- contact -->
            <div class="contact-single">
                <div class="contact-single__form">
                    <p>Cette photo vous intéresse ?</p>
                    <button class="contact-single__form--btn contact__ref" type="button">Contact</button>
                    <?php
                    get_template_part('template-parts/contact');
                    ?>
                </div>
                <!-- suivant précédent des miniatures -->
                <div class="contact-single__thumbnail">
                    <?php
                    $precedent = get_previous_post();
                    $suivant = get_next_post();

                    if ($suivant) {
                        the_post_navigation(
                            [
                                'next_text' => get_the_post_thumbnail($suivant->ID, 'thumbnail') . '<img class="precedent" src="' . get_template_directory_uri() . '/assets/images/Line_7.png">',
                                'prev_text' =>  '<img class="suivant" src= "' . get_template_directory_uri() . '/assets/images/Line_6.png">'
                            ]

                        );
                    } else {

                        the_post_navigation(array(
                            'prev_text' => get_the_post_thumbnail($precedent->ID, 'thumbnail') . '<img class="precedent" src="' . get_template_directory_uri() . '/assets/images/Line_6.png">',
                        ));
                    }
                    ?>
                </div>
            </div>
            <!-- affichage des photos en plus -->
            <div class="post-single__photos">
                <h3>VOUS AIMEREZ AUSSI </h3>

                <div class="post-single__photos--other">
                    <?php
                    get_template_part('template-parts/content-photo');
                    ?>
                </div>
                <!-- toutes les photos -->
                <div class="post-single__photos--btn">
                    <a href="<?php echo esc_url(home_url()); ?>"><button class="bouton" type="button">Toutes les photos</button></a>
                </div>

            </div>
        </section>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>