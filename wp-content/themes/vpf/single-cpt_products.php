<?php 
get_header();

$meta = get_post_meta(get_the_ID());

$view = [
	'color_class' => $meta['_cmb_product_color_scheme'],
	'layout_type' => $meta['_cmb_product_layout'],
	'product_category' => $meta['_cmb_product_detail_category']
]; 
var_dump($view);
?>

<section class="products--slider">
	
</section>

<section class="product">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<div class="outer-container">
			<div class="product--intro">
				<article>
					<?php the_content(); ?>
					<?php edit_post_link(); ?>
				</article>
			</div>
		</div>
	<?php endwhile; ?>

	<?php else: ?>
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<?php endif; ?>
</section>
<?php get_footer(); ?>