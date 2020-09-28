<?php
/**
 * Template Name: Category Page
 * description: Category page
 * Page template without sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package das
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'cat-pg' );

			endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();