<?php $posts = get_field('homepage_events');
if( $posts ): ?>

<section class="bg-primary-light pt-5 pb-5" id="section-formacion">	
    <div class="container">
        
        <div class="row mb-2">
            <div class="col-xs-12 col-md-7">
                <h2><?php the_field('homepage_title_events');?></h2>
                <p><?php the_field('homepage_description_events');?></p>
            </div>
            <div class="col-xs end-md">
                <a href="/formacion-y-cursos/" class="btn btn--primary btn--md"><?php esc_html_e( 'Ir a formación', 'coiiar' ); ?></a>
            </div>
        </div>	
        
        <div class="row">
            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT)
                setup_postdata($post);
                
                    get_template_part( 'template-parts/loop', 'agenda' );
                
                endforeach;
				wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>		
        </div>

        <div class="row center-xs">
            <div class="col-xs-12 mt-3">
                <a href="/agenda/" class="btn btn--secondary btn--lg"><?php esc_html_e( 'Ver todo en la agenda', 'coiiar' ); ?></a>
            </div>
        </div>        


    </div>
</section>
<?php endif; ?>
        
