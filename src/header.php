<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package das
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
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'das2021' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$das2021_description = get_bloginfo( 'description', 'display' );
			if ( $das2021_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $das2021_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' 	=> 'main-menu',
					'menu_id'        	=> 'mega-menu',
					'depth'             => "0", // (int) How many levels of the hierarchy are to be included. 0 means all. Default 0.
					//'walker'			=> new megaMenu(), // (object) Instance of a custom walker class.
				)
			);
			?>
		</nav><!-- #site-navigation -->

		<div class="site-right">
			<div class="signin"><button class="button is-primary">Sign-in</button></div>
			<div class="cart-container">
				<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
						<div class="das-cart-icon">
							<figure class="wp-block-image size-small is-resized">
								<img src="https://diversityavatarstickers.com/wp-content/uploads/2020/01/cart-icon-white.svg" alt="" class="cart-icon" width="20" height="20">
							</figure>
							<span>
								<?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
							</span>	
						</div>
					</a>
			</div>
		</div>
	</header><!-- #masthead -->
