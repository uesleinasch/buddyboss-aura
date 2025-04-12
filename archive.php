<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuddyBoss_Theme
 */

use const Avifinfo\UNDEFINED;

get_header();

$blog_type = 'standard'; // standard, grid, masonry.
$blog_type = apply_filters('bb_blog_type', $blog_type);
$blog_aura = 'aura_blog';
$aura_single_content = 'aura_archive';

$class = '';

if ('masonry' === $blog_type) {
	$class = 'bb-masonry';
} elseif ('grid' === $blog_type) {
	$class = 'bb-grid';
} else {
	$class = 'bb-standard';
}
if (is_single() ) {
	$aura_single_content = 'aura_single_post';
} elseif ( is_singular('post') ) {
}

?>

<div id="primary" class="content-area <?php echo $aura_single_content; ?>">
	<main id="main" class="site-main">

		<?php if (have_posts()) : ?>
			<header class="page-header">
				<!-- get wordpres archive title -->
				<h1 class="page-title">
					<?php echo single_term_title(); ?>
				</h1>
				<?php
				the_archive_description('<div class="archive-description">', '</div>');
				?>
			</header><!-- .page-header -->


			<div class="post-grid <?php echo $blog_aura; ?> <?php echo esc_attr($class); ?>">

				<?php if ('masonry' === $blog_type) { ?>
					<div class="bb-masonry-sizer"></div>
				<?php } ?>

				<?php
				/* Start the Loop */
				while (have_posts()) :
					the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part('template-parts/content', apply_filters('bb_blog_content', get_post_format()));

				endwhile;
				?>
			</div>

		<?php
			buddyboss_pagination();

		else :
			get_template_part('template-parts/content', 'none');
		?>

		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php
get_footer();
