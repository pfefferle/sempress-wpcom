<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package sempress
 * @since sempress 1.0
 */
?>

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'sempress_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A semantic Personal Publishing Platform', 'sempress' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'sempress' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'sempress' ), 'SemPress', '<a href="http://notizblog.org/projects/sempress/" rel="designer">Matthias Pfefferle</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>