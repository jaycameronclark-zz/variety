<?php 
get_header();

$slideshow = get_vpf_slideshow();
$meta = get_post_meta(get_the_ID());

$view['color_class'] = $meta['_cmb_product_color_scheme'][0];
$view['layout_type'] = $meta['_cmb_product_layout'][0];
$view['product_category'] = $meta['_cmb_product_detail_category'][0];
$view['page_title'] = !empty($meta['_cmb_product_page_title'][0]) ? $meta['_cmb_product_page_title'][0] : get_the_title(get_the_ID());
$view['tagline'] = !empty($meta['_cmb_title_tagline_text'][0]) ? $meta['_cmb_title_tagline_text'][0] : '';
$view['sticky_note'] = !empty($meta['_cmb_sticky_note'][0]) ? $meta['_cmb_sticky_note'][0] : '';
$view['flag_text'] = !empty($meta['_cmb_usa_flag_text'][0]) ? $meta['_cmb_usa_flag_text'][0] : '';
$view['available_size'] = !empty($meta['_cmb_product_available_size_text'][0]) ? $meta['_cmb_product_available_size_text'][0] : '';
?>

<?php if (!empty($slideshow['group_images'])) : ?>
<script type="text/javascript">
$(document).ready(function() {
	var count = 0;
<?php foreach($slideshow['group_images'] as $group_image) : ?>
		count++;
    $(".slide-"+count).cycle({
    		fx: 'fade',
    		speed: <?= $group_image['speed']; ?>,
    		delay: <?= $group_image['delay']; ?>
    });
<?php endforeach; ?>
});
</script>
<?php endif; ?>

<div class="outer-container">
	<section class="products--slider" style="background-image: url(<?= $slideshow['background']; ?>);">
		<?php $index = 0; ?>
		<?php foreach($slideshow['group_images'] as $group_image) : ?>
			<?php $index++; ?>
			<div class="image-group slide-<?= $index; ?>" style="z-index:<?= $group_image['z-index']; ?>;top:<?= $group_image['top']; ?>; left:<?= $group_image['left']; ?>; bottom: <?= $group_image['bottom']; ?>;right:<?= $group_image['right']; ?>;">
			<?php foreach($group_image['images'] as $image) : ?>
				<img src="<?= $image; ?>">
			<?php endforeach; ?>
			</div>
		<?php endforeach; ?>

		<?php foreach($slideshow['static_images'] as $static_image) : ?>
			<div class="static-image" style="z-index:<?= $static_image['z-index']; ?>;top:<?= $static_image['top']; ?>; left:<?= $static_image['left']; ?>; bottom: <?= $static_image['bottom']; ?>;right:<?= $static_image['right']; ?>;">
				<img src="<?= $static_image['image']; ?>">
			</div>
		<?php endforeach; ?>
	</section>
</div>

<section class="product <?= $view['color_class']; ?>">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<div class="outer-container">
			<div class="product--intro <?= $view['color_class']; ?>">
				<article>
					<h1 class="main--title"><?= $view['page_title']; ?> | <i class="tagline"><?= $view['tagline']; ?></i></h1>
					<?php the_content(); ?>
					<?php if( !empty($view['available_size']) ) : ?>
						<p class="available-size">
							<?= $view['available_size']; ?>
						</p>
					<?php endif; ?>
					<?php edit_post_link(); ?>
				</article>

				<div class="sticky">
					<img src="<?= $view['sticky_note']; ?>" alt="Sticky Note">
					<div class="usa-flag">
						<?= $view['flag_text']; ?>
					</div>
				</div>
			</div>
		
	<?php endwhile; ?>

	<?php else: ?>
		<article>
			<h2 class="main--title"><?php _e( 'Sorry, nothing to display.', 'varietypetfoods' ); ?></h2>
		</article>
	</div>
	<?php endif; ?>
</section>

<section class="products--list">
	<?php 
		$products = get_product_details();
		if ( !empty($products) ) :
		foreach($products as $product) :
	?>
	<?= $product['title']; ?>
	<?php endforeach; endif; ?>
</section>

<?php get_footer(); ?>