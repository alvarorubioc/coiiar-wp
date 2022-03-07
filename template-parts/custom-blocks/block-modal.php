<?php
/**
 * Block Name: Team Modal
*
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'modal-' . $block['id'];
$idCard = 'card-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

?>

<div class="card--modal" id="<?php echo esc_attr($idCard); ?>">
    
    <?php 
        $image = get_field('img_team');
        $size = 'post-thumbnail'; // (thumbnail, medium, large, full or custom size)
        if( $image ) {
            echo '<div class="card-img">';
            echo wp_get_attachment_image( $image, $size );
            echo '</div>';
        }
    ;?>

    <div class="card-content">
        <p><strong><?php the_field ('name_team'); ?></strong></p>
        <p><?php the_field ('cargo_team'); ?></p>
    </div>
    <div class="card-footer">
        <?php if( get_field ('content_team')): ;?>    
                <a href="#<?php echo esc_attr($id); ?>" rel="modal:open" class="open-modal btn"><?php esc_html_e( 'Saber más', 'coiiar' );?></a>
            <?php endif ;
                $link = get_field('link_team');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'];    
                    ?>    
                    <a class="btn btn--primary btn--sm" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?> 
    </div>
</div>

<div id="<?php echo esc_attr($id); ?>" class="modal card screen-reader-text">
    <div class="card-content">
        <?php 
            $image = get_field('img_team');
            $size = 'medium'; // (thumbnail, medium, large, full or custom size)
            if( $image ) {
                echo '<div class="mb-2">';
                echo wp_get_attachment_image( $image, $size );
                echo '</div>';
            }
        ;?>
        <p class="text-h4"><?php the_field ('name_team'); ?></p>
        <p><?php the_field ('cargo_team'); ?></p>
        <?php the_field ('content_team'); ?>
    </div>
</div>

<script>
    document.getElementById("<?php echo esc_attr($idCard); ?>").parentElement.classList.add('with--modal');
</script>


