<?php
/**
 * Footer copyright
 *
 * @package Wildtravel
 */

?>
<div id="colophon" class="site-footer">
	<?php
	$copyright_text = wildtravel_theme_options('footer_copyright_text');
	/* translators: %s: Wildtravel. */
	$powered_by_text = sprintf(esc_html__('&copy; %1$s %2$s by %3$s', 'wildtravel'), date('Y'), esc_html(wp_get_theme()->get('Name')), '&nbsp;<a target="_blank" href="' . esc_url(wp_get_theme()->get('AuthorURI')) . '">' . esc_html(ucwords(wp_get_theme()->get('Author'))) . '</a>');
	?>
	<?php if (!empty($copyright_text) || !empty($powered_by_text)) : ?>
		<div class="colophon-bottom">
			<?php if (!empty($copyright_text)) : ?>
				<div class="copyright">
					<p><?php echo wp_kses_post($copyright_text); ?><?php echo wp_kses_post($powered_by_text); ?></p>
				</div><!-- .copyright -->
			<?php endif; ?>
		</div><!-- .colophon-bottom -->
	<?php endif; ?>
</div><!-- #colophon -->