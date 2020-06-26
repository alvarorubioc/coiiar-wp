<?php

/**
 * Card Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'card-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'card';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.

$title = get_field('block_card_title') ?: 'Título card';
$text = get_field('block_card_text') ?: 'Aquí el aviso';
$image = get_field('block_card_image') ?: 'Imagen de card';
$price = get_field('block_card_price') ?: 'Precio';
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="card-img">
        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
    </div>
    <div class="card-content">
        <h3 class="text-h4"><?php echo $title; ?></h3>
        <div class="card-content__info dflex">
            <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#info" />
            </svg>
            <span><?php echo $text; ?></span>
        </div>	
    </div>
    <div class="card-footer dflex between-xs">
        <div class="dflex middle-xs">
            <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#map-marker" />
            </svg>
            <span><?php echo $price; ?></span>
        </div>
        <div class="dflex middle-xs">
            <span><?php the_field('event_start_date');?></span>
        </div>
    </div>
</div>