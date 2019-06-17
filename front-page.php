<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wildtravel
 */

get_header();
if ( class_exists( 'WP_Travel' ) ) {
	?>
	<section class="section_search">
		<div class="container">
			<?php if ( ! empty( wildtravel_theme_options( 'front_search_heading' ) ) ) { ?>
				<h2><?php wildtravel_title_split( wildtravel_theme_options( 'front_search_heading' ) ); ?></h2>
			<?php } ?>
			<?php the_widget( 'WP_Travel_Widget_Search' ); ?>
		</div>
	</section>

	<?php
	$active = array();
	for ( $i = 1; $i <= 6; $i++ ) {
		if ( ! empty( wildtravel_theme_options( 'front_destination_' . $i ) ) ) {
			$active[] = $i;
		}
	}
	if ( 0 !== count( $active ) || ! empty( wildtravel_theme_options( 'front_destination_page' ) ) ) {
		?>

		<section class="section_destination">
			<div class="container">
				<?php
				if ( ! empty( wildtravel_theme_options( 'front_destination_page' ) ) ) {
					$wildtravel_destination_title       = apply_filters( 'the_title', get_post( wildtravel_theme_options( 'front_destination_page' ) )->post_title );
					$wildtravel_destination_description = apply_filters( 'the_content', get_post( wildtravel_theme_options( 'front_destination_page' ) )->post_content );
					?>
					<h2><?php wildtravel_title_split( $wildtravel_destination_title ); ?></h2>
					<?php echo wp_kses_post( $wildtravel_destination_description ); ?>
				<?php } ?>

				<?php if ( ! empty( wildtravel_theme_options( 'front_destination_1' ) ) || ! empty( wildtravel_theme_options( 'front_destination_2' ) ) || ! empty( wildtravel_theme_options( 'front_destination_3' ) ) || ! empty( wildtravel_theme_options( 'front_destination_4' ) ) ) { ?>
					<div class="row top-row">
						<?php if ( ! empty( wildtravel_theme_options( 'front_destination_1' ) ) ) { ?>
							<div class="column col-lg-4 col-md-6">
								<figure>
									<?php
									wildtravel_front_page_destination_image( wildtravel_theme_options( 'front_destination_1' ) );
									wildtravel_front_page_destination_name( wildtravel_theme_options( 'front_destination_1' ) );
									?>
								</figure>
							</div>
						<?php } ?>

						<?php if ( ! empty( wildtravel_theme_options( 'front_destination_2' ) ) || ! empty( wildtravel_theme_options( 'front_destination_3' ) ) ) { ?>
							<div class="column col-lg-4 col-md-6">
								<?php if ( ! empty( wildtravel_theme_options( 'front_destination_2' ) ) ) { ?>
									<figure class="fig-two">
										<?php
										wildtravel_front_page_destination_image( wildtravel_theme_options( 'front_destination_2' ) );
										wildtravel_front_page_destination_name( wildtravel_theme_options( 'front_destination_2' ) );
										?>
									</figure>
								<?php } ?>

								<?php if ( ! empty( wildtravel_theme_options( 'front_destination_3' ) ) ) { ?>
									<figure class="fig-three">
										<?php
										wildtravel_front_page_destination_image( wildtravel_theme_options( 'front_destination_3' ) );
										wildtravel_front_page_destination_name( wildtravel_theme_options( 'front_destination_3' ) );
										?>
									</figure>
								<?php } ?>
							</div>
						<?php } ?>

						<?php if ( ! empty( wildtravel_theme_options( 'front_destination_4' ) ) ) { ?>
							<div class="column column-large col-lg-4 col-md-12">
								<figure>
									<?php
									wildtravel_front_page_destination_image( wildtravel_theme_options( 'front_destination_4' ) );
									wildtravel_front_page_destination_name( wildtravel_theme_options( 'front_destination_4' ) );
									?>
								</figure>
							</div>
						<?php } ?>
					</div>
				<?php } ?>

				<?php if ( ! empty( wildtravel_theme_options( 'front_destination_5' ) ) || ! empty( wildtravel_theme_options( 'front_destination_6' ) ) ) { ?>
					<div class="row last-row">
						<?php if ( ! empty( wildtravel_theme_options( 'front_destination_5' ) ) ) { ?>
							<div class="column col-lg-8 col-sm-6">
								<figure>
									<?php
									wildtravel_front_page_destination_image( wildtravel_theme_options( 'front_destination_5' ) );
									wildtravel_front_page_destination_name( wildtravel_theme_options( 'front_destination_5' ) );
									?>
								</figure>
							</div>
						<?php } ?>

						<?php if ( ! empty( wildtravel_theme_options( 'front_destination_6' ) ) ) { ?>
							<div class="column col-lg-4 col-sm-6">
								<figure>
									<?php
									wildtravel_front_page_destination_image( wildtravel_theme_options( 'front_destination_6' ) );
									wildtravel_front_page_destination_name( wildtravel_theme_options( 'front_destination_6' ) );
									?>
								</figure>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</section>
	<?php } ?>
<?php } ?>

<?php if ( ! empty( wildtravel_theme_options( 'front_about_image_1' ) ) || ! empty( wildtravel_theme_options( 'front_about_image_2' ) ) || ! empty( wildtravel_theme_options( 'front_about_image_3' ) ) || ! empty( wildtravel_theme_options( 'front_about_heading' ) ) || ! empty( wildtravel_theme_options( 'front_about_page' ) ) ) { ?>
	<section class="section_about">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<?php if ( ! empty( wildtravel_theme_options( 'front_about_image_1' ) ) || ! empty( wildtravel_theme_options( 'front_about_image_2' ) ) || ! empty( wildtravel_theme_options( 'front_about_image_3' ) ) ) { ?>
					<div class="col-md-5 column-left">
						<figure>
							<?php if ( ! empty( wildtravel_theme_options( 'front_about_image_1' ) ) ) { ?>
								<img class="main-image" src="<?php echo esc_url( wildtravel_theme_options( 'front_about_image_1' ) ); ?>">
							<?php } ?>
							<?php if ( ! empty( wildtravel_theme_options( 'front_about_image_2' ) ) ) { ?>
								<img class="sub-image" src="<?php echo esc_url( wildtravel_theme_options( 'front_about_image_2' ) ); ?>">
							<?php } ?>
							<?php if ( ! empty( wildtravel_theme_options( 'front_about_image_3' ) ) ) { ?>
								<img class="sub-image" src="<?php echo esc_url( wildtravel_theme_options( 'front_about_image_3' ) ); ?>">
							<?php } ?>
						</figure>
					</div>
				<?php } ?>

				<?php if ( ! empty( wildtravel_theme_options( 'front_about_heading' ) ) || ! empty( wildtravel_theme_options( 'front_about_page' ) ) ) { ?>
					<div class="col-md-7 column-right">
						<h3><?php echo esc_html( wildtravel_theme_options( 'front_about_heading' ) ); ?></h3>
						<?php
						if ( ! empty( wildtravel_theme_options( 'front_about_page' ) ) ) {
							$wildtravel_about_title       = apply_filters( 'the_title', get_post( wildtravel_theme_options( 'front_about_page' ) )->post_title );
							$wildtravel_about_description = apply_filters( 'the_content', get_post( wildtravel_theme_options( 'front_about_page' ) )->post_content );
							?>
							<h1><?php echo wp_kses_post( $wildtravel_about_title ); ?></h1>
							<?php echo wp_kses_post( $wildtravel_about_description ); ?>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>

<?php if ( ! empty( wildtravel_theme_options( 'front_article_heading' ) ) || ! empty( wildtravel_theme_options( 'front_article_post' ) ) ) { ?>
	<section class="section_blog">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<?php if ( ! empty( wildtravel_theme_options( 'front_article_heading' ) ) ) { ?>
					<div class="column col-lg-4">
						<h2><?php wildtravel_title_split( wildtravel_theme_options( 'front_article_heading' ) ); ?></h2>
					</div>
				<?php } ?>

				<?php
				if ( ! empty( wildtravel_theme_options( 'front_article_post' ) ) ) {
					$wildtravel_article_title       = apply_filters( 'the_title', get_post( wildtravel_theme_options( 'front_article_post' ) )->post_title );
					$wildtravel_article_description = apply_filters( 'the_content', get_post( wildtravel_theme_options( 'front_article_post' ) )->post_content );
					?>
					<div class="column col-lg-8">
						<div class="blog">
							<span><?php echo esc_html( get_the_date( 'd F Y', get_post( wildtravel_theme_options( 'front_article_post' ) ) ) ); ?></span>
							<h4><a href="#"><?php echo esc_html( $wildtravel_article_title ); ?></a></h4>
							<?php echo wp_kses_post( $wildtravel_article_description ); ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>


<?php
$active_testimonials = array();
for ( $i = 1; $i <= 6; $i++ ) {
	if ( ! empty( wildtravel_theme_options( 'front_testimonial_slider_' . $i ) ) ) {
		$active_testimonials[] = $i;
	}
}
?>
<?php if ( 0 !== count( $active_testimonials ) || ! empty( wildtravel_theme_options( 'front_testimonial_page' ) ) ) { ?>
<section class="section_testimonial">
	<div class="container">
	<?php
	if ( ! empty( wildtravel_theme_options( 'front_testimonial_page' ) ) ) {
		$wildtravel_testimonial_title = apply_filters( 'the_title', get_post( wildtravel_theme_options( 'front_testimonial_page' ) )->post_title );
		?>
		<h2><?php echo wp_kses_post( $wildtravel_testimonial_title ); ?></h2>
		<?php } ?>
		<?php if ( 0 !== count( $active_testimonials ) ) { ?>
		<div class="testimonialslide">
			<?php foreach ( $active_testimonials as $active_testimonial ) { ?>
				<?php if ( ! empty( wildtravel_theme_options( 'front_testimonial_slider_' . $active_testimonial ) ) ) { ?>
			<div class="test_slide">
					<?php if ( ! empty( wp_get_attachment_url( get_post_thumbnail_id( wildtravel_theme_options( 'front_testimonial_slider_' . $active_testimonial ) ) ) ) ) { ?>
				<img src="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id( wildtravel_theme_options( 'front_testimonial_slider_' . $active_testimonial ) ) ) ); ?>">
					<?php } ?>
					<?php
					if ( ! empty( wildtravel_theme_options( 'front_testimonial_slider_' . $active_testimonial ) ) ) {
						$wildtravel_testimony_title       = apply_filters( 'the_title', get_post( wildtravel_theme_options( 'front_testimonial_slider_' . $active_testimonial ) )->post_title );
						$wildtravel_testimony_description = apply_filters( 'the_content', get_post( wildtravel_theme_options( 'front_testimonial_slider_' . $active_testimonial ) )->post_content );
						?>
						<?php echo wp_kses_post( $wildtravel_testimony_description ); ?>
						<span><?php echo wp_kses_post( $wildtravel_testimony_title ); ?></span>
						<?php } ?>
			</div>
			<?php } ?>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</section>
<?php } ?>


<?php
$active_partners = array();
for ( $i = 1; $i <= 12; $i++ ) {
	if ( ! empty( wildtravel_theme_options( 'front_partner_slider_' . $i ) ) ) {
		$active_partners[] = $i;
	}
}
?>
<?php if ( 0 !== count( $active_partners ) || ! empty( wildtravel_theme_options( 'front_partner_page' ) ) ) { ?>
	<section class="section_partners">
		<div class="container">
			<?php
			if ( ! empty( wildtravel_theme_options( 'front_partner_page' ) ) ) {
				$wildtravel_partner_title       = apply_filters( 'the_title', get_post( wildtravel_theme_options( 'front_partner_page' ) )->post_title );
				$wildtravel_partner_description = apply_filters( 'the_content', get_post( wildtravel_theme_options( 'front_partner_page' ) )->post_content );
				?>
				<h1><?php echo wp_kses_post( $wildtravel_partner_title ); ?></h1>
				<?php echo wp_kses_post( $wildtravel_partner_description ); ?>
			<?php } ?>

			<?php if ( 0 !== count( $active_partners ) ) { ?>
				<div class="clientslide">
					<?php
					foreach ( $active_partners as $active_partner ) {
						if ( ! empty( wp_get_attachment_url( get_post_thumbnail_id( wildtravel_theme_options( 'front_partner_slider_' . $active_partner ) ) ) ) ) {
							?>
							<img src="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id( wildtravel_theme_options( 'front_partner_slider_' . $active_partner ) ) ) ); ?>">
						<?php } ?>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</section>
<?php } ?>

<?php
$active_guides = array();
for ( $i = 1; $i <= 6; $i++ ) {
	if ( ! empty( wildtravel_theme_options( 'front_guide_' . $i ) ) ) {
		$active_guides[] = $i;
	}
}
?>
<?php if ( 0 !== count( $active_guides ) || ! empty( wildtravel_theme_options( 'front_guide_page' ) ) ) { ?>
	<section class="section_guide">
		<div class="container">
			<div class="row">
				<?php
				if ( ! empty( wildtravel_theme_options( 'front_guide_page' ) ) ) {
					$wildtravel_partner_title = apply_filters( 'the_title', get_post( wildtravel_theme_options( 'front_guide_page' ) )->post_title );
					?>
					<div class="column column-left">
						<h2><?php wildtravel_title_split( $wildtravel_partner_title ); ?></h2>
					</div>
				<?php } ?>
				<?php if ( 0 !== count( $active_guides ) ) { ?>
					<div class="column column-right">
						<div class="row">
							<?php
							foreach ( $active_guides as $active_guide ) {
								?>
								<div class="col-sm-6">
									<span><i class="fas fa-calendar-alt"></i></span>
									<div class="content">
										<?php
										if ( ! empty( wildtravel_theme_options( 'front_guide_' . $active_guide ) ) ) {
											$wildtravel_guide_title       = apply_filters( 'the_title', get_post( wildtravel_theme_options( 'front_guide_' . $active_guide ) )->post_title );
											$wildtravel_guide_description = apply_filters( 'the_content', get_post( wildtravel_theme_options( 'front_guide_' . $active_guide ) )->post_content );
											?>
											<h3><?php echo wp_kses_post( $wildtravel_guide_title ); ?></h3>
											<?php echo wp_kses_post( $wildtravel_guide_description ); ?>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>

<?php
get_footer();
