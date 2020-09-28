<?php
/**
 * Template part for displaying page content in cat page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package das
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('category-page'); ?>>
	<div class="das-breadcrumbs">
		<?php
			$args = array(
					'delimiter' => '&nbsp/&nbsp;',
					'before' => '<span class="breadcrumb-title">' . '</span>'
			);
		?>
		<?php woocommerce_breadcrumb( $args ); ?>
	</div><!-- breadcrumbs -->
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'das2021' ),
					'after'  => '</div>',
				)
			);
		?>
		<!-- Avatar columns: extra small --> 
		<div class="avatar-container">
				<div class="avatar-wrapper-content">
					<h2>Extra Small</h2>
				</div>
				<div class="avatar-wrapper">
					<div class="avatar-builder">
						<h3>Avatar Builder</h3>
						<?php echo do_shortcode("[products limit='1' columns='1' category='avatars, xs' ]"); ?>
					</div>
					<div class="avatars">
						<?php echo do_shortcode("[products limit='3' columns='3' category='avatars, xs']"); ?>
					</div>
				</div>
			</div>
		<!-- Avatar columns: extra small -->

		<!-- Avatar columns: small --> 
		<div class="avatar-container">
				<div class="avatar-wrapper-content">
					<h2>Small</h2>
				</div>
				<div class="avatar-wrapper">
					<div class="avatar-builder">
						<h3>Avatar Builder</h3>
						<?php echo do_shortcode("[products limit='1' columns='1' category='avatars, sm' cat_operator='IN']"); ?>
					</div>
					<div class="avatars">
						<?php echo do_shortcode("[products limit='3' columns='3' category='avatars, sm' cat_operator='IN']"); ?>
					</div>
				</div>
			</div>
		<!-- Avatar columns: small-->

		<!-- Avatar columns: meduim --> 
		<div class="avatar-container">
				<div class="avatar-wrapper-content">
					<h2>Meduim</h2>
				</div>
				<div class="avatar-wrapper">
					<div class="avatar-builder">
						<h3>Avatar Builder</h3>
						<?php echo do_shortcode("[products limit='1' columns='1' category='avatars, md' cat_operator='IN']"); ?>
					</div>
					<div class="avatars">
						<?php echo do_shortcode("[products limit='3' columns='3' category='avatars, md' cat_operator='IN']"); ?>
					</div>
				</div>
			</div>
		<!-- Avatar columns: medium -->

		<!-- Avatar columns: large --> 
		<div class="avatar-container">
				<div class="avatar-wrapper-content">
					<h2>Large</h2>
				</div>
				<div class="avatar-wrapper">
					<div class="avatar-builder">
						<h3>Avatar Builder</h3>
						<?php echo do_shortcode("[products limit='1' columns='1' category='avatars, lg' cat_operator='IN']"); ?>
					</div>
					<div class="avatars">
						<?php echo do_shortcode("[products limit='3' columns='3' category='avatars, lg' cat_operator='IN']"); ?>
					</div>
				</div>
			</div>
		<!-- Avatar columns: large -->
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'das2021' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
