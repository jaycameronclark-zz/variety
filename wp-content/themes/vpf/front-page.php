<?php 
	get_header();
	$slideshow = get_vpf_slideshow();
?>

<script type="text/javascript">
$(document).ready(function() {
    $(".slide-1").cycle({
    		fx: 'fade',
    		speed: 2000,
    		delay: 0
    });
    $(".slide-2").cycle({
    		fx: 'fade',
    		speed: 2000,
    		delay: 10000
    });
    $(".slide-3").cycle({
    		fx: 'fade',
    		speed: 2000,
    		delay: 14000
    });
});
</script>

<section class="main">
	<div class="outer-container">
		<article class="front-page--intro">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif; ?>
		</article>

		<div class="front-page--slider" style="background-image: url(<?= $slideshow['background']; ?>);">
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

		</div>
	</div>
</section>

<?php get_footer(); ?>