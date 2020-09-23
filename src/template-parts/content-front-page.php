<?php
/**
 * Template part for displaying page content in front page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package das
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('front-page'); ?>>
	<header class="entry-header">
	<!-- [hero graphic] -->
		<?php
			$args = array(  
				'post_type'         => 'post',
				'post_status'       => array( 'publish' ),
				'posts_per_page'    => 1,   
				'orderby'           => 'title',
				'order'             => 'ASC', 
				'tag'               => 'hero+featured',
				'category_name'     => 'Featured, Hero'
			);
			$loop = new WP_Query( $args ); 
			$more = 0;
		?>  
		<?php $the_query = new WP_Query( $args ); ?>
			<?php if ( is_front_page() && $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
					<section class="home-pg hero is-medium" style="background: linear-gradient(to left, rgba(255,103,79,0), rgba(255,103,79,1)), url('<?php echo $backgroundImg[0]; ?>')no-repeat;">
						<div class="hero-body is-info is-large">
							<div class="content">
								<h1 class="title">
									<?php the_excerpt(); ?>
									<button class="button is-medium is-primary is-inverted is-outlined">Build your DAS now!</button>
								</h1> 
							</div>
						</div>
					</section>
				<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif ?>

		<section class="site-device-filter">
			<ul>
				<li>
					<div class="device-image">
						<img src="https://bulma.io/images/placeholders/128x128.png">
					</div>
					<div class="content">
						<span>Extra Small</span> is a great solution for small mobile devices and more.
						<div class="device-learn-more-button">
							<button class="button is-small">Learn more...</button>
						</div> 
					</div>
				</li>

				<li>
					<div class="device-image">
						<img src="https://bulma.io/images/placeholders/128x128.png">
					</div>
					<div class="content">
						<span>Small</span> is the perfect solution for large size mobile devices and more. 
						<div class="device-learn-more-button">
							<button class="button is-small">Learn more...</button>
						</div>
					</div>
				</li>

				<li>
					<div class="device-image">
						<img src="https://bulma.io/images/placeholders/128x128.png">
					</div>
					<div class="content">
						<span>Medium</span> is an awesome solution for small tablet devices and more. 
						<div class="device-learn-more-button">
							<button class="button is-small">Learn more...</button>
						</div>
					</div>
				</li>

				<li>
					<div class="device-image">
						<img src="https://bulma.io/images/placeholders/128x128.png">
					</div>
					<div class="content">
						<span>Large</span> is excellent for laptops, vehicles, water bottles, and more.
						<div class="device-learn-more-button">
							<button class="button is-small">Learn more...</button>
						</div>
					</div>
				</li>

				<li class="ad">
					<img src="https://bulma.io/images/placeholders/256x256.png">
				</li>
			</ul>

		</section>
	<!-- //[hero graphic] -->
	</header><!-- .entry-header -->

	<div class="entry-content">

		<!-- [why we are unique] -->
		<div class="content-unique">
			<div class="section-title-wrapper">
				<h2>WE ARE UNIQUE</h2>
				<h3 class="sub-title">We create products for the human experience. Representation does matter. <button class="button is-black">Black Lives Matter</button> </h3>
			</div>

			<div class="tile is-ancestor">
				<div class="tile is-parent">
					<article class="tile is-child">
						<p class="title">Representation</p>
						<div class="content">
							<p>In the midst of promoting your company at your next event, conference, or business gathering, you also have an opportunity to speak to the value of each diverse member of your audience. Everyone deserves an opportunity to feel represented. Which is why we want to share the gift of Diversity Avatar Stickers.</p>
						</div>
					</article>
				</div>

				<div class="tile is-parent">
					<article class="tile is-child">
						<p class="title">Sustainability</p>
						<div class="content">
							<p>We provide packaging that is 100% plantable, biodegradable, and recyclable. Want to learn more about our unique packaging solutions? Click here to discover the joy of planting your Diversity Avatar Sticker packaging material and watching it grow. </p>
						</div>
					</article>
				</div>
			</div>
			
		</div>
	<!-- //[why we are unique] -->

	<!-- [steps] -->
	<div class="content-steps">
		<ul class="steps has-content-above">
          <li class="steps-segment">
            <span class="steps-marker"></span>
            <div class="steps-content is-divider-content">
              <p class="is-size-4">Step 1</p>
            </div>
          </li>
          <li class="steps-segment">
            <span class="steps-marker"></span>
            <div class="steps-content is-divider-content">
              <p class="is-size-4">Step 2</p>
            </div>
          </li>
          <li class="steps-segment is-active">
            <span class="steps-marker"></span>
            <div class="steps-content is-divider-content">
              <p class="is-size-4">Step 3</p>
            </div>
          </li>
          <li class="steps-segment">
            <span class="steps-marker"></span>
            <div class="steps-content is-divider-content">
              <p class="is-size-4">Step 4</p>
            </div>
          </li>
          <li class="steps-segment">
            <span class="steps-marker"></span>
            <div class="steps-content is-divider-content">
              <p class="is-size-4">Step 5</p>
            </div>
          </li>
          <li class="steps-segment">
            <span class="steps-marker"></span>
          </li>
		</ul>
	</div>
	<!-- //[steps] -->

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