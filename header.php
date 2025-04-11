<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BuddyBoss_Theme
 */
?>
<?php
// is archive

if(is_single()){
	$aura_view = get_post_type() ? 'aura-single-' . get_post_type() : '';
}elseif(is_archive()){
	$aura_view = get_post_type() ? 'aura-archive-' . get_post_type() : '';
}else{
	$aura_view = get_post_type() ? 'aura-' . get_post_type() : '';
}
$aura_body = get_post_type() ? 'aura-body-' . get_post_type() : '';

if(is_single()){
	$aura_body = get_post_type() ? 'aura-body-single-' . get_post_type() : '';
}else if(is_archive()){
	$aura_body = get_post_type() ? 'aura-body-archive-' . get_post_type() : '';
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>

</head>


<body auraClass="<?php echo $aura_body ?>" <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<?php if (!is_singular('llms_my_certificate')):

		do_action(THEME_HOOK_PREFIX . 'before_page');

	endif; ?>

	<div id="page" class="site <?php echo $aura_view ?>">

		<?php do_action(THEME_HOOK_PREFIX . 'before_header'); ?>

		<header aura-header id="masthead" class="<?php echo apply_filters('buddyboss_site_header_class', 'site-header site-header--bb'); ?>  <?php echo $aura_view . '-header' ?>">
			<?php do_action(THEME_HOOK_PREFIX . 'header'); ?>
		</header>

		<?php do_action(THEME_HOOK_PREFIX . 'after_header'); ?>

		<?php do_action(THEME_HOOK_PREFIX . 'before_content'); ?>

		<div id="content" class="site-content <?php echo $aura_view . '-content' ?>">

			<?php do_action(THEME_HOOK_PREFIX . 'begin_content'); ?>

			<div class="container">
				<div class="<?php echo apply_filters('buddyboss_site_content_grid_class', 'bb-grid site-content-grid'); ?>">