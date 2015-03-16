<?php 
get_header();

$meta = get_post_meta(get_the_ID());
$view['color_class'] = $meta['_cmb_wtb_color_scheme'][0];
$view['sub_text'] = $meta['_cmb_wtb_sub_text'][0];
$link_groups = get_vpf_wheretobuy_links();
//var_dump($meta);
?>

<section class="where-to-buy">
	<div class="outer-container">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="featured--image">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail(); ?>
		<?php endif; ?>
	</div>
	<div class="where-to-buy-content <?= $view['color_class']; ?>">
		<?php the_content(); ?>
		<p class="sub-text"><?= $view['sub_text']; ?></p>
		<?php edit_post_link(); ?>
	</div>
	<?php endwhile; ?>
	<?php else: ?>
	<div class="where-to-buy-content">
		<h2 class="main--title"><?php _e( 'Sorry, nothing to display.', 'varietypetfoods' ); ?></h2>
	<div class="where-to-buy-content">
	<?php endif; ?>
	</div>
</section>

<section class="where-to-buy-links">
	<div class="outer-container">
		<?php foreach($link_groups as $group) : ?>
			
			<div class="link-group <?= $view['color_class']; ?>">
				<div class="link-group-heading">
					<h4><?= $group['group_title']; ?></h4>
				</div>
				<ul>
					<?= $group['group_links']; ?>
				</ul>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<?php get_footer(); ?>