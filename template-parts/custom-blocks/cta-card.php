<?php

/**
 * CTA Card Block Template.
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

$title = get_field('block_ctacard_title') ?: 'Título card';
$text = get_field('block_ctacard_text') ?: 'Aquí el texto';
$image = get_field('block_ctacard_image') ?: 295;

$button = get_field('block_ctacard_button');
if( $button ): 
    $link_url = $button['url'];
    $link_title = $button['title'];
    $link_target = $button['target'] ? $link['target'] : '_self';
endif;

if( get_field('block_ctacard_color') == 'primary' ) :
    $color = '#663399';
    $btn_color = 'primary';
endif;

if( get_field('block_ctacard_color') == 'secondary' ) :
    $color = '#c2185b';
    $btn_color = 'secondary';
endif;

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div>
        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
    </div>
    <div class="card-content">
        <h3 class="text-h4"><?php echo $title; ?></h3>
        <p><?php echo $text; ?></p>
        <div class="mt-2">
            <a class="btn btn--sm btn--<?php echo $btn_color; ?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        </div>
    </div>
    <style type="text/css">
        #<?php echo $id; ?> {
            border-left: 8px solid <?php echo $color; ?>;
            background-color: #F7F4F9;
        }
    </style>
</div>