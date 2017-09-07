<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<?php
	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		$object_id = get_queried_object_id();
		global $phy_object_title;
		$phy_object_title = get_the_title($object_id);
		$image_id = get_post_thumbnail_id($object_id);
		$image = wp_get_attachment_image_src($image_id, 'twentyseventeen-featured-image');
	endif;
	?>

	<header id="masthead" class="site-header<?php if($image) echo ' with-featured-image'; ?>" role="banner"<?php if($image) echo ' style="background-image: url('.esc_attr($image[0]).')"'; ?>>

		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>


		<?php if(!empty($phy_object_title)){ ?>
			<div class="title-at-header">
				<div class="wrap">
					<h1 class="entry-title"><?php echo esc_html($phy_object_title); ?></h1>
				</div>
			</div>
		<?php } ?>

		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<div class="wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<div class="site-content-contain">
		<div id="content" class="site-content">
