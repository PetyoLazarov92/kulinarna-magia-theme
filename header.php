<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header class="site-header">
        <div class="header-container">
            <div class="site-branding">
                <?php if ( has_custom_logo() ) : ?>
                    <div class="custom-logo-link">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <div class="site-logo-fallback">
                        <svg viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#fbbf24;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#f59e0b;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <circle cx="25" cy="25" r="24" fill="url(#logoGradient)"/>
                            <text x="25" y="35" font-size="30" fill="white" text-anchor="middle" font-weight="bold">✨</text>
                        </svg>
                    </div>
                <?php endif; ?>
                
                <div class="site-branding-text">
                    <h1 class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    </h1>
                    <?php
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) :
                        ?>
                        <p class="site-description"><?php echo $description; ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                ☰ <?php esc_html_e( 'Menu', 'kulinarna-magia' ); ?>
            </button>

            <nav class="main-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                    )
                );
                ?>
            </nav>
        </div>
    </header>

    <div id="content" class="site-content">
