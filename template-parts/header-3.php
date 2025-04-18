<?php
$show_buddypanel = buddyboss_theme_get_option( 'buddypanel' );
$buddypanel_logo = buddyboss_theme_get_option( 'buddypanel_show_logo' ) && $show_buddypanel;
?>
<div class="container site-header-container flex default-header header-3">
	<a href="#" class="bb-toggle-panel"><i class="bb-icon-l bb-icon-sidebar"></i></a>
	<?php
	if ( buddyboss_is_learndash_inner() && ! buddyboss_theme_ld_focus_mode() ) {
		get_template_part( 'template-parts/site-logo' );
		get_template_part( 'template-parts/site-navigation' );
	} elseif ( buddyboss_is_learndash_inner() && buddyboss_theme_ld_focus_mode() ) {
		if ( buddyboss_is_learndash_brand_logo() && !$buddypanel_logo ) { ?>
		<div id="site-logo" class="site-branding">
			<div class="ld-brand-logo ld-focus-custom-logo site-title">
				<img src="<?php echo esc_url( wp_get_attachment_url( buddyboss_is_learndash_brand_logo() ) ); ?>" alt="<?php echo esc_attr( get_post_meta( buddyboss_is_learndash_brand_logo(), '_wp_attachment_image_alt', true ) ); ?>" class="bb-logo">
			</div>
		</div>
			<?php
		} elseif ( buddyboss_is_learndash_brand_logo() && $buddypanel_logo ) {
			return;
		} else {
			get_template_part( 'template-parts/site-logo' );
		}
	} elseif ( buddyboss_theme_is_tutorlms_inner() && buddyboss_theme_is_tutorlms_spotlight_mode() ) {
		get_template_part( 'template-parts/site-logo' );
	} elseif ( ! buddyboss_is_learndash_inner() ) {
		get_template_part( 'template-parts/site-logo' );
		get_template_part( 'template-parts/site-navigation' );
	}
	?>
	<?php get_template_part( 'template-parts/header-aside' ); ?>
</div>
