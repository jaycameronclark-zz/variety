<?php get_header(); ?>
<section class="main">
	<div class="outer-container">
		<div class="blog">
			<div class="blog--content">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post() ?>
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
					<?php if (function_exists('sharethis_button')) { sharethis_button(); } ?>
					
					<?php the_content(); ?>

					<div class="blog--divider">
						<img src="/wp-content/themes/vpf/assets/images/detail-border.png" />
					</div>
				<?php endwhile; endif; ?>
				<?php comments_template(); ?>

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