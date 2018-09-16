<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width" />
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <?php wp_head(); ?>
    </head>
    <body>
        <?php
            $styleStr = "";
            $topOffset = 0;
            $scriptStr = '';
            $style = [];
            if(is_user_logged_in())
            {
                $topOffset += 32;
                $scriptStr .= 'var wordpressOffsetTop = 32;';
            }
            else
            {
                $scriptStr .= 'var wordpressOffsetTop = 0;';
            }

            switch(get_option('hosting'))
            {
                case 1:
                    $topOffset += 177;
                    break;
            }
            $style[':root']['--generated-topOffset'] = $topOffset.'px';

            $style['.fixed-top']['top'] = 'var(--generated-topOffset)';
            $style['.offsetTop']['height'] = 'var(--generated-topOffset)';
            $style['.offsetTop']['background'] = 'var(--color-bg)';

            foreach($style as $selector => $rules)
            {
                $ruleStr = "";
                foreach($rules as $key => $value)
                {
                    $ruleStr .= "$key: $value;".PHP_EOL;
                }
                $styleStr .= "$selector {".PHP_EOL.$ruleStr."}";
            }

            $tag = '<style type="text/css">'.$styleStr.'</style>';
            if( strlen($styleStr) > 0 )
            {
                echo $tag;
            }
            $scriptStr .= 'var themeOffsetTop = '.($topOffset-32).';';
            $tag = '<script type="text/javascript">'.$scriptStr.'</script>';
            if( strlen($scriptStr) > 0 )
            {
                echo $tag;
            }
        ?>
        <div class="offsetTop">
        </div>
        <header class="header">
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