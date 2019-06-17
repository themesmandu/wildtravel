<?php
/**
 * Footer copyright
 *
 * @package Wildtravel
 */

?>
<footer id="last-footer">
	<div class="container">
		<div id="colophon" class="site-footer">
			<?php
			$copyright_text = wildtravel_theme_options( 'footer_copyright_text' );
			/* translators: %s: Wildtravel. */
			$powered_by_text = sprintf( esc_html__( '&copy; %1$s %2$s by %3$s', 'wildtravel' ), date( 'Y' ), esc_html( wp_get_theme()->get( 'Name' ) ), '&nbsp;<a target="_blank" href="' . esc_url( wp_get_theme()->get( 'AuthorURI' ) ) . '">' . esc_html( ucwords( wp_get_theme()->get( 'Author' ) ) ) . '</a>' );
			?>
			<?php if ( ! empty( $copyright_text ) || ! empty( $powered_by_text ) ) : ?>
			<div class="colophon-bottom">
				<?php if ( ! empty( $copyright_text ) ) : ?>
				<div class="copyright">
					<?php echo wp_kses_post( wpautop( $copyright_text ) ); ?>
				</div><!-- .copyright -->
				<?php endif; ?>

				<?php if ( ! empty( $powered_by_text ) ) : ?>
				<div class="site-info">
					<?php echo wp_kses_post( wpautop( $powered_by_text ) ); ?>
				</div><!-- .site-info -->
				<?php endif; ?>
			</div><!-- .colophon-bottom -->
			<?php endif; ?>
		</div><!-- #colophon -->
	</div>
</footer>
