<?php

/**
 * Notes and Documentation for a better color annotation.
 *
 * ## Contrast
 *
 * Always check for contrast when you are styling an element that needs to be read.
 * You can always pass a solid color or a  as the third argument
 * and it will be used as the contrast reference.
 *
 * The following rule makes sure 'heading' is readable against white:
 * add_color_rule( 'heading', 'color', '#fff' )
 *
 * Contrast ratio goes from 0 to 16.
 *
 * ## Opacity and Brightness
 *
 * Take advantage of opacity and brightness to style border colors that are
 * greyscale on the original theme.
 * array( 'element', 'border-color', '-1' )
 *
 * ## Extra
 *
 * The 'extra' category is very useful for adding additional static colors
 * whenever you need to have white text on top of a dynamic color, or when
 * you need to add an alpha value to a solid element on the orignal theme.
 * add_color_rule( 'extra', '#ffffff', array( array( 'some-text', 'color', .5 ) ) );
 *
 * That will give you a 0.5 transparent white text.
 *
 * ## Labels
 *
 * Remember to add labels like __( 'Menu' ) as the fourth argument of add_color_rule.
 *
 * ## CSS callback
 *
 * You can add additional CSS rules when the color annotation is loaded.
 * This is useful for turning solid text-shadow values into rgba, or adding content
 * wrappers around your main body. (At the bottom of this file is the code you need.)
 *
 * Have fun.
 */

add_color_rule( 'bg', '#F0F0F0', array(
	array( 'body', 'background-color' ),
	array( '.main-navigation ul ul', 'background-color' ),
), __( 'Background' ) );

/**
 * Site Title
 */

add_color_rule( 'link', '#333333', array(
    array( '#masthead .site-title a', 'color' ),
), __( 'Logo' ) );

/**
 * Site Description
 */

add_color_rule( 'txt', '#777777', array(
    array( '.site-description', 'color' ),
), __( 'Site Description' ) );

/**
 * Links
 */

add_color_rule( 'fg1', '#210e10', array(
    array( '#content a, .entry-title a, #secondary ul li a, .main-navigation a, .site-info a', 'color' ),
), __( 'Links' ) ); 



add_color_rule( 'fg2', '#cccccc', array(
	array( '.main-navigation, .widget', 'border-color' ),
), __( 'Border Color' ) );



/* Adding extra CSS...

add_theme_support( 'custom_colors_extra_css', 'themename_extra_css' );
function themename_extra_css() { ?>
	Your CSS code.
<?php
}

*/