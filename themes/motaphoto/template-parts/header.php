<header class="site__header">
    <nav class="navbar">
        <a href="<?php echo esc_url(home_url()); ?>">
            <img src="<?php echo get_template_directory_uri();
                        ?>/assets/images/Nathalie-Mota.png" class="navbar__logo" alt="logo Nathalie Mota">
        </a>
        <?php wp_nav_menu([
            'theme_location' => 'header',
            'container' => false,
            'menu_class' => 'navbar__nav'
        ]);
        ?>
    </nav>
    <div class="burger">
        <button id="btn__burger" class="burger__btn" aria-label="Menu portable">
            <span class="line line_1"></span>
            <span class="line line_2"></span>
            <span class="line line_3"></span>
        </button>
        <?php wp_nav_menu([
            'theme_location' => 'header',
            'container' => false,
            'menu_class' => 'burger__menu'
        ]);
        ?>
    </div>
    <?php get_template_part('template-parts/contact'); ?>
</header>