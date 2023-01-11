<?php
/**
 * Block Name: Read More
*
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'readmore-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

?>

<div class="wp-block mt-1 mb-3">
	<input type="checkbox" class="read-more-state" id="<?php echo esc_attr($id); ?>">

	<div class="read-more dflex">
		<label for="<?php echo esc_attr($id); ?>" class="read-more-trigger">Leer más</label>
	</div>

	<div class="read-more-target">
		<InnerBlocks />
	</div>
</div>


