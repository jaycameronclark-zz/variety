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
		<p><?= $product['product_guaranteed_analysis']; ?></p>
		<p><?= $product['product_calorie_content_one']; ?></p>
		<p><?= $product['product_calorie_content_two']; ?></p>
	</div>

	<div class="details--right <?= $product['color_scheme']; ?>">
		<h2><?= $product['title']; ?></h2>
		<span class="sub-title"><?= $product['sub_title']; ?></span>
		<p><?= $product['small_description']; ?></p>
		<hr class="detail-border">
		<p class="primary-description <?= $product['color_scheme']; ?>"><?= $product['main_description']; ?></p>
		<hr class="detail-border">
		<p class="natural-text"><?= $product['natural_text']; ?></p>
		<p class="ingredients"><?= $product['ingredients']; ?></p>
		<p class="feeding-guide"><?= $product['feeding_guide']; ?></p>
	</div>
</section>

<?php endif; ?>