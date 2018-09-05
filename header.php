<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width" />
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <?php wp_head(); ?>
    </head>
    <body>
        <header>
            <nav class="navbar fixed-top navbar-expand-md navbar-dark header-navbar">
                <a class="navbar-brand mb-0 h1" href="<?php echo get_site_url(); ?>"><?php bloginfo('name'); ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarHeader">
                    <?php wp_nav_menu(['theme_location' => 'header-menu', 'container' => false, 'menu_class' => 'navbar-nav mr-auto', 'add_li_class' => 'navbar-nav mr-auto', 'add_li_a_class' => 'nav-link' ]); ?>
                    <!--<ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>-->
                </div>
            </nav>
            <nav class="navbar navbar-expand-md navbar-dark header-navbar">
                <span class="navbar-brand mb-0 h1">-</span>
            </nav>
        </header>