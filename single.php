<?php
/**
 * The Template for displaying all single posts.
 *
 * @package SemPress
 * @since SemPress 1.0.0
 */

get_header(); ?>

    <div id="primary">
      <div id="content" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <?php sempress_content_nav( 'nav-above' ); ?>

        <?php get_template_part( 'content', 'single' ); ?>

        <?php sempress_content_nav( 'nav-below' ); ?>

        <?php
          // If comments are open or we have at least one comment, load up the comment template
          if ( comments_open() || '0' != get_comments_number() )
            comments_template( '', true );
        ?>

      <?php endwhile; // end of the loop. ?>

      </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>