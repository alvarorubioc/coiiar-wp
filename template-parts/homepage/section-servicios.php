<section class="bg-primary-light pt-5 pb-5" id="section-servicios">	
    <div class="container">
        
        <div class="row mb-2">
            <div class="col-xs-12 col-md-7">
                <h2><?php the_field('homepage_title_services');?></h2>
                <p><?php the_field('homepage_description_services');?></p>
            </div>
            <div class="col-xs end-md">
                <a class="btn btn--primary btn--md"><?php esc_html_e( 'Ir a servicios', 'coiiar' ); ?></a>
            </div>
        </div>	
        
        <div class="row">
        <?php $posts = get_field('homepage_services'); ?>
        
        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT)
                setup_postdata($post);
                
                    get_template_part( 'template-parts/loop', 'servicios' );
                
                endforeach;
				wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>		

        </div>      

    </div>
</section>
        
