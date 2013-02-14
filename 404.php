<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package SemPress
 * @since SemPress 1.0.0
 */

get_header(); ?>

  <div id="primary" class="full-width">
    <div id="content" role="main">

      <article id="post-0" class="post error404 not-found">
        <header class="entry-header">
          <h1 class="entry-title p-entry-title"><?php _e( 'Well this is somewhat embarrassing, isn&rsquo;t it?', 'sempress' ); ?></h1>
        </header>

        <div class="entry-content e-entry-content">
          <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'sempress' ); ?></p>

          <?php get_search_form(); ?>

          <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

          <div class="widget">
            <h2 class="widgettitle"><?php _e( 'Most Used Categories', 'sempress' ); ?></h2>
            <ul>
            <?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
            </ul>
          </div>

          <?php
          /* translators: %1$s: smilie */
          $archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'sempress' ), convert_smilies( ':)' ) ) . '</p>';
          the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
          ?>

          <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

        </div><!-- .entry-content -->
      </article><!-- #post-0 -->

    </div><!-- #content -->
  </div><!-- #primary -->

<?php get_footer(); ?>