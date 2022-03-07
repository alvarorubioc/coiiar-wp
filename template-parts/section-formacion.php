<?php $posts = get_field('featured_formacion');
if( $posts ): ?>

<div class="container">
    
    <div class="row">
        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT)
            setup_postdata($post);
            
                get_template_part( 'template-parts/loop', 'formacion-vertical' );
            
            endforeach;
            wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>		
    </div>

</div>

<?php endif; ?>
        
