<?php get_header(); ?>

<section class="main">
	<div class="outer-container">
		<article class="front-page--intro">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_content(); ?></h1>
		<?php endwhile; endif; ?>
		</article>

		<?php
			$slide_background = get_post_meta( get_the_ID(), 'slideshow_background_image', true );
			$static = get_post_meta( get_the_ID(), '_cmb_slide_images_static_settings', true );
			$group = get_post_meta( get_the_ID(), '_cmb_slide_images_group_settings', true );
			$group_images = [];
			$static_images = [];

			foreach ($static as $item) {
	    	$temp_static = [
	    		'top' => $item['static_pos_top'] . 'px',
	    		'left' => $item['static_pos_left'] . 'px',
	    		'bottom' => $item['static_pos_bottom'] . 'px',
	    		'right' => $item['static_pos_right'] . 'px',
	    		'image' => $item['slideshow_static_image']
	    	];
	    	$static_images[] = $temp_static;
			}

			foreach ($group as $item){
	    	$temp_group = [
	    		'top' => $item['group_pos_top'] . 'px',
	    		'left' => $item['group_pos_left'] . 'px',
	    		'bottom' => $item['group_pos_bottom'] . 'px',
	    		'right' => $item['group_pos_right'] . 'px',
	    		'images' => $item['slideshow_group_images']
	    	];
	    	$group_images[] = $temp_group;
			}

		?>

		<div class="front-page--slider" style="background-image: url(<?= $slide_background; ?>)">
		<?php foreach($group_images as $group_image) : ?>
			<div class="image-group" style="top:<?= $group_image['top']; ?>; left:<?= $group_image['left']; ?>; bottom: <?= $group_image['bottom']; ?>;right:<?= $group_image['right']; ?>;">
			<?php foreach($group_image['images'] as $image) : ?>
			<img src="<?= $image; ?>">
			<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>