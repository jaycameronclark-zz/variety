<?php 
/*
	Template Name: VPF:: Story
*/
get_header();
?>

<div class="outer-container">
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<section class="story">
		<div class="content--story">
			<?php the_content(); ?>
			<?php edit_post_link(); ?>
			<?php endwhile; else: ?>
				<h2><?php _e( 'Sorry, nothing to display.', 'varietypetfoods' ); ?></h2>
			<?php endif; ?>
		</div>
		<div class="page-bottom"></div>
		
		<?php if (!empty($sidebar_content)) : ?>
		<aside class="page-sidebar" style="background-image:url(<?= $sidebar_background; ?>)">
			<?= $sidebar_content; ?>
		</aside>
		<?php endif; ?>
	</section>
</div>

<?php get_footer(); ?>