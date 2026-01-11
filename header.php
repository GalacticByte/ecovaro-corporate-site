<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-TileColor" content="#ffffff">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ecovaro' ); ?></a>


	<header id="masthead" class="gbyte-header fixed-top">
		<nav id="gbyte-navbar" class="navbar navbar-expand-lg gbyte-header__nav">
			<div class="container-fluid gbyte-header__container">
				<div class="gbyte-header__brand navbar-brand">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php
						$logo_white_id = carbon_get_theme_option( 'global_logo_white' );
						$logo_color_id = carbon_get_theme_option( 'global_logo_color' );

						$logo_white_url = $logo_white_id
							? wp_get_attachment_image_url( $logo_white_id, 'full' )
							: get_stylesheet_directory_uri() . '/assets/images/strona-glowna/logo-top.svg';

						$logo_color_url = $logo_color_id
							? wp_get_attachment_image_url( $logo_color_id, 'full' )
							: get_stylesheet_directory_uri() . '/assets/images/strona-glowna/logo-color.svg';
						?>
						<img src="<?php echo esc_url( $logo_white_url ); ?>" alt="<?php bloginfo( 'name' ); ?> Logo White" class="gbyte-header__logo gbyte-header__logo--white">
						<img src="<?php echo esc_url( $logo_color_url ); ?>" alt="<?php bloginfo( 'name' ); ?> Logo Color" class="gbyte-header__logo gbyte-header__logo--color">
					</a>
				</div>

				<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gbyte-navbar-collapse" aria-controls="gbyte-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</button>

				<div class="collapse navbar-collapse" id="gbyte-navbar-collapse">
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary_menu',
							'menu_class'      => 'navbar-nav mb-2 mb-lg-0 gbyte-header__menu',
							'container'       => false,
							'depth'			  => 3,
							'walker'          => new bootstrap_5_wp_nav_menu_walker(),
						)
					);
					?>
				</div>
			</div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
