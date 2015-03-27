<?php get_header(); ?>
<section class="main">
	<div class="outer-container">
		<div class="blog">
			<h1>Your pet’s with you for the best parts of life…<br />
				don’t they deserve the best life has to offer.</h1>
			<div class="blog--content">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post() ?>
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

					<?php the_excerpt(); ?>
					<strong>Read more about &rarr;</strong> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

					<div class="blog--divider">
						<img src="/wp-content/themes/vpf/assets/images/detail-border.png" />
					</div>
				<?php endwhile; endif; ?>

			</div>

			<div class="blog--sidebar">
				<div class="blog--sidebar-image">
					<img src="/wp-content/themes/vpf/assets/images/divider_sidebar.gif" />
				</div>
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1') ) : ?>
				<?php endif; ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</section>
<?php get_footer(); ?>