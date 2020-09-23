<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package das
 */

?>

	<footer id="colophon" class="site-footer">

		<div class="site-info">
			<nav></nav>
			<div class="column-right">
				<section class=""></section>
				<section class="social-media-links"><?php get_template_part( 'components/features/social', 'list' ); ?></section>
			</div>
		</div><!-- .site-info -->

		<div class="site-legal-info">
			<ul class="legal">
				<li><a href="" title="Terms of Use">Terms of Use</a></li>
				<li><a href="" title="Privacy Policy">Privacy Policy</a></li>
			</ul>
			<span class="sep"> |  &nbsp; &nbsp;</span>
			<section class="site-copyright">
				<p>&copy; <?php echo date("Y"); ?> U.S. Domestic and Foreign Patents Pending Diversity Avatar Stickers <span>(By: <a href="https://koalescedesigns.com" target="_blank">Koalesce Designs</a>)</span>, All Rights Reserved.</p>
			</section>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
