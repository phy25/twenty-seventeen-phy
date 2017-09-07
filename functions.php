<?php
function phy_theme_enqueue_styles() {

    // $parent_style = 'twentyseventeen-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    // wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'twentyseventeen-style',
        get_stylesheet_directory_uri() . '/style.min.css',
        array( /*$parent_style*/ ),
        wp_get_theme()->get('Version')
    );

    wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );
}
function phy_theme_setup(){
	add_image_size( 'twentyseventeen-featured-image', 1000, 600, true );
}
add_action( 'wp_enqueue_scripts', 'phy_theme_enqueue_styles' );
add_action( 'after_setup_theme', 'phy_theme_setup' );
/*
function phy_theme_mod_hue($a){
	return 190;
}
function phy_theme_mod_colorscheme($a){
	return 'custom';
}
add_filter( 'theme_mod_colorscheme_hue', 'phy_theme_mod_hue');
add_filter( 'theme_mod_colorscheme', 'phy_theme_mod_colorscheme');
*/
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function twentyseventeen_posted_on() {

	// Get the author name; wrap it in a link.
	$byline = sprintf(
		/* translators: %s: post author */
		'%s',
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
	);

	// Finally, let's write all of this to the page.
	echo '<span class="posted-on">' . twentyseventeen_time_link() . '</span><span class="byline"> ' . $byline . '</span>';
}
?>