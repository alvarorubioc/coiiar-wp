<div id="section-filters">
    <div class="filters-bar">
        <div class="container dflex">
            <div class="filter-by"><?php esc_html_e( 'Filtrar por:', 'coiiar' ); ?></div>
            <button class="dropdown categories"><?php esc_html_e( 'Mes', 'coiiar' ); ?>
                <span>
                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#chevron-bottom" />
                    </svg>
                </span>
            </button>
            <button class="dropdown tags"><?php esc_html_e( 'Ubicación', 'coiiar' ); ?>
                <span>
                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#chevron-bottom" />
                    </svg>
                </span>
            </button>
            <button class="dropdown"><?php esc_html_e( 'Formación', 'coiiar' ); ?>
            <button class="dropdown"><?php esc_html_e( 'Jornadas', 'coiiar' ); ?>
            <button class="dropdown"><?php esc_html_e( 'Eventos', 'coiiar' ); ?>
        </div>
    </div> <!-- .filters-bar -->

    <div class="filters-wrapper container mt-2">    
        <div class="categories">
            
        </div>
        <div class="tags">
            <?php
                function output_product_list() {
                    global $wpdb;
                    $custom_post_type = 'agenda'; 
                    $results = $wpdb->get_results( $wpdb->prepare( "SELECT ID, post_title FROM {$wpdb->posts} WHERE post_type = %s and post_status = 'publish'", $custom_post_type ), ARRAY_A );
                    if ( ! $results )
                            return;
                            $output = '<ul id="products">';
                            foreach( $results as $index => $post ) {
                                    $output .= '<li id="' . $post['ID'] . '">' . get_field('event_tag',$post['ID']) . '</li>';
                                }
                            $output .= '</ul>'; // end of select element
                            return $output;
                } ?>
        </div>
    </div>
         
</div><!-- #section-filters -->