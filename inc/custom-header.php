<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * @package sempress
 * @since sempress 1.0
 */

/**
 * Setup the WordPress core custom header feature.
 *
 *
 * @uses sempress_header_style()
 * @uses sempress_admin_header_style()
 * @uses sempress_admin_header_image()
 *
 * @package sempress
 */
function sempress_custom_header_setup() {
	$args = array(
		'default-image'          => '',
		'default-text-color'     => '333333',
		'header-text'            => true,
		'width'                  => 950,
		'height'                 => 200,
		'flex-height'            => true,
		'wp-head-callback'       => 'sempress_header_style',
		'admin-head-callback'    => 'sempress_admin_header_style',
		'admin-preview-callback' => 'sempress_admin_header_image',
	);

	$args = apply_filters( 'sempress_custom_header_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-header', $args );
	} else {
		// Compat: Versions of WordPress prior to 3.4.
		define( 'HEADER_TEXTCOLOR',    $args['default-text-color'] );
		define( 'HEADER_IMAGE',        $args['default-image'] );
		define( 'HEADER_IMAGE_WIDTH',  $args['width'] );
		define( 'HEADER_IMAGE_HEIGHT', $args['height'] );
		add_custom_image_header( $args['wp-head-callback'], $args['admin-head-callback'], $args['admin-preview-callback'] );
	}
}
add_action( 'after_setup_theme', 'sempress_custom_header_setup' );

/**
 * Shiv for get_custom_header().
 *
 * get_custom_header() was introduced to WordPress
 * in version 3.4. To provide backward compatibility
 * with previous versions, we will define our own version
 * of this function.
 *
 * @todo Remove this function when WordPress 3.6 is released.
 * @return stdClass All properties represent attributes of the curent header image.
 *
 * @package sempress
 * @since sempress 1.1
 */

if ( ! function_exists( 'get_custom_header' ) ) {
	function get_custom_header() {
		return (object) array(
			'url'           => get_header_image(),
			'thumbnail_url' => get_header_image(),
			'width'         => HEADER_IMAGE_WIDTH,
			'height'        => HEADER_IMAGE_HEIGHT,
		);
	}
}

if ( ! function_exists( 'sempress_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see sempress_custom_header_setup().
 *
 * @since sempress 1.0
 */
function sempress_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		.site-title,
		.site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // sempress_header_style

if ( ! function_exists( 'sempress_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see sempress_custom_header_setup().
 *
 * @since sempress 1.0
 */
function sempress_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg h1,
	#desc {
	}
	#headimg h1 {
		clear: both;
		font-weight: 200;
		color: #444;
		line-height:1.8;
		font-size: 4em;
		letter-spacing: -2px;
		margin: 0;
	}
	#headimg h1 a {
		color: #444;
		text-decoration: none;
	}
	#desc {
		color: #777;
		font-size: 1.7em;
		height: auto;
		line-height: 120%;
		margin: 0 0 1em;
		width: 100%;
		font-weight: 100;
	}
	#headimg img {
		width:100%;
	}
	</style>
<?php
}
endif; // sempress_admin_header_style

if ( ! function_exists( 'sempress_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see sempress_custom_header_setup().
 *
 * @since sempress 1.0
 */
function sempress_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_header_textcolor() || '' == get_header_textcolor() )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_header_textcolor() . ';"';
		?>
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // sempress_admin_header_image