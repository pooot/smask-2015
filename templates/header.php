<div class="navbar navbar-sites">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sites-nav">
            <span class="sr-only">Visa meny</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <nav class="collapse navbar-collapse" id="sites-nav" role="navigation">
        <ul class="nav navbar-nav">
            <li><a href="/">Riks-SMASK</a>
            <li><a href="/pitea/">SMASK Piteå</a>
            <li><a href="/ingesund/">SMASK Ingesund</a>
            <li><a href="/orebro/">SMASK Örebro</a>
            <li><a href="/stockholm/">SMASK Stockholm</a>
            <li><a href="/goteborg/">SMASK Göteborg</a>
            <li><a href="/malmo/">SMASK Malmö</a>
        </ul>
    </nav>
</div>

<header class="banner" role="banner">
    <div class="wrap container">
        <?php if (get_header_image()) : ?>
            <img src="<?php header_image(); ?>" alt="" class="img-responsive"/>
        <?php endif; ?>
        <div class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Visa meny</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <nav class="collapse navbar-collapse" id="main-nav" role="navigation">
                <?php
                if (has_nav_menu('primary_navigation')) :
                    wp_nav_menu(array(
                        'theme_location' => 'primary_navigation',
                        'walker'         => new Roots_Nav_Walker(),
                        'menu_class'     => 'nav navbar-nav'
                    ));
                endif;
                ?>
            </nav>
        </div>
    </div>
</header>
