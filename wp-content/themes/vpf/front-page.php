<?php get_header(); ?>

<section class="main">
	<div class="outer-container">
		<article class="front-page--intro">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_content(); ?></h1>
		<?php endwhile; endif; ?>
		</article>

		<div class="front-page--slider">
			
		</div>
	</div>
</section>

<?php get_footer(); ?>