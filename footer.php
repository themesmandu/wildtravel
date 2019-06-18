<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wildtravel
 */

?>

</div><!-- #content -->

<?php get_template_part( 'template-parts/footer/widgets' ); ?>

<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>



<?php wp_footer(); ?>
</div><!-- #page -->
</body>

</html>
