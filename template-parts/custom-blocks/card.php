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
$imagecard = get_field('block_card_image') ?: 'Imagen de card';
$price = get_field('block_card_price') ;
$button = get_field('block_card_button');

if( $button ): 
    $link_url = $button['url'];
    $link_title = $button['title'];
    $link_target = $button['target'];
endif;

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="card-img">
        <?php echo wp_get_attachment_image( $imagecard, 'img-card' ); ?>
    </div>
    <div class="card-content">
        <h3 class="text-h4"><?php echo $title; ?></h3>
        <div class="card-content__info dflex">
            <span><?php echo $text; ?></span>
        </div>	
    </div>
    <div class="card-footer dflex between-xs">
        <div class="dflex middle-xs">
            <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#info" />
            </svg>
            <span><?php echo $price; ?></span>
        </div>
        <div class="dflex middle-xs">
        <?php if( $button ): ?>
            <a class="btn btn--sm btn--secondary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
        </div>
    </div>
    <style type="text/css">
        #<?php echo $id; ?> {
            background-color: #F7F4F9;
        }
    </style>
</div>