<?php
	require_once('../../../../wp-blog-header.php');
	$requested = $_GET['id'];
  $product = get_single_product_details($requested);
  $product = $product[0];
  
	if ( !empty($product) ) :
?>

<section class="product--details">
	<div class="details--left <?= $product['color_scheme']; ?>">
		<img src="<?= $product['featured_image']; ?>" alt="">
		<div class="details--info"><?php if(!empty($product['product_guaranteed_analysis'])){?><strong>Guaranteed Analysis: </strong><?php } ?><?= wpautop($product['product_guaranteed_analysis']); ?></div>
		<div class="details--info"><?php if(!empty($product['product_calorie_content_one'])){?><strong>Calorie Content: </strong><?php } ?><?= wpautop($product['product_calorie_content_one']); ?></div>
		<div class="details--info"><?= wpautop($product['product_calorie_content_two']); ?></div>
	</div>

	<div class="details--right <?= $product['color_scheme']; ?>">
		<h2><?= $product['title']; ?></h2>
		<span class="sub-title"><?= $product['sub_title']; ?></span>
		<p><?= $product['small_description']; ?></p>
		<hr class="detail-border">
		<?php if(!empty($product['main_description'])){?><p class="primary-description <?= $product['color_scheme']; ?>"><?= $product['main_description']; ?></p>
		<hr class="detail-border"><?php } ?>
		<div class="natural-text"><?= $product['natural_text']; ?></div>
		<div class="ingredients"><?php if(!empty($product['ingredients'])){?><strong>Ingredients: </strong><?php } ?><?= wpautop($product['ingredients']); ?></div>
		<div class="vitamins"><?php if(!empty($product['vitamins'])){?><strong>Vitamins: </strong><?php } ?><?= wpautop($product['vitamins']); ?></div>
		<div class="minerals"><?php if(!empty($product['minerals'])){?><strong>Minerals: </strong><?php } ?><?= wpautop($product['minerals']); ?></div>
		<div class="feeding-guide"><?php if(!empty($product['feeding_guide'])){?><strong>Feeding Guide: </strong><?php } ?><?= wpautop($product['feeding_guide']); ?></div>
	</div>
</section>

<?php endif; ?>