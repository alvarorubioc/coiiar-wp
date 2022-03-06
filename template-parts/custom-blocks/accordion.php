<?php

/**
 * Accordion Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'accordion-block--' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
?>


<?php if( have_rows('accordion') ): ?>
    <div id="<?php echo esc_attr($id); ?>" class="accordion-block mt-2 mb-2">
        <?php while( have_rows('accordion') ): the_row(); ?>
            <button class="accordion-btn">
              <div><span><?php the_sub_field('accordion_title'); ?></span></div>
            </button>
            <div class="panel">  
                <div><?php the_sub_field('accordion_content'); ?></div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<script>
var acc = document.getElementsByClassName("accordion-btn");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>