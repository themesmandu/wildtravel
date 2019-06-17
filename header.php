<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wildtravel
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<header class="site-header">
			<nav id="site-navigation" class="main-navigation">
				<div class="container">
					<div class="navbar navbar-expand-lg top-navigation">
						<div class="site-branding">
							<?php
							if ( has_custom_logo() ) :
								the_custom_logo();
							else :
								the_custom_logo();
								$wildtravel_site_title            = get_bloginfo( 'name' );
								$wildtravel_site_title_letter     = substr( $wildtravel_site_title, -2, 1 );
								$wildtravel_site_title_first_part = substr( $wildtravel_site_title, 0, -2 );
								$wildtravel_site_title_last_part  = substr( $wildtravel_site_title, -1 );
								if ( is_front_page() && is_home() ) :
									?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><strong><?php echo esc_html( $wildtravel_site_title_first_part ); ?></strong><span><?php echo esc_html( $wildtravel_site_title_letter ); ?></span><strong><?php echo esc_html( $wildtravel_site_title_last_part ); ?></strong></a></h1>
									<?php
							else :
								?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><strong><?php echo esc_html( $wildtravel_site_title_first_part ); ?></strong><span><?php echo esc_html( $wildtravel_site_title_letter ); ?></span><strong><?php echo esc_html( $wildtravel_site_title_last_part ); ?></strong></a></p>

								<?php
							endif;
							$wildtravel_description = get_bloginfo( 'description', 'display' );
							if ( $wildtravel_description || is_customize_preview() ) :
								?>
									<p class="site-description"><?php echo $wildtravel_description; /* WPCS: xss ok. */ ?></p>
								<?php
							endif;
						endif;
							?>
						</div><!-- .site-branding -->

						<button id="menu" class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmenus">
							<span></span>
							<span></span>
							<span></span>
						</button>
						
						<div class="collapse navbar-collapse" id="navbarmenus">
						<button id="menu" class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmenus">
							<span></span>
							<span></span>
						</button>
							<?php
							if ( has_nav_menu( 'menu-1' ) ) :
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
										'menu_class'     => 'navbar-nav',
									)
								);
							endif;
							?>
						</div>
					</div><!-- .navbar-wrap -->
				</div><!-- .container -->
			</nav><!-- #site-navigation -->

			<div class="container header-wrap">
				<?php wildtravel_header_page_title(); ?>
			</div><!-- .container -->
		</header><!-- #masthead -->

		<div id="content" class="site-content">
