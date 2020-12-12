<div id="section-filters">
    <div class="filters-bar">
        <div class="container dflex">
            <div class="filter-by"><?php esc_html_e( 'Filtrar por:', 'coiiar' ); ?></div>
            <button class="dropdown categories"><?php esc_html_e( 'Sector', 'coiiar' ); ?>
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
        </div>
    </div> <!-- .filters-bar -->

    <div class="filters-wrapper container">    
        <div class="categories pt-2 pb-2">
            <?php
                // Get the category terms
                $categories = get_terms(
                    array(
                        'taxonomy'   => 'category-sectors',
                        'hide_empty' => true,
                    )
                );

                // Check if any term exists
                if ( ! empty( $categories ) && is_array( $categories ) ) {
                    // Run a loop and print them all
                    foreach ( $categories as $category ) { ?>
                        <a class="bagde" href="<?php echo esc_url( get_term_link( $category ) ) ?>" title="<?php echo $category->name; ?>">
                            <?php echo $category->name; ?>
                        </a><?php
                    }
                } 
            ?>
        </div>
        <div class="tags pt-2 pb-2">
        <?php
                // Get the tags terms
                $tags = get_terms(
                    array(
                        'taxonomy'   => 'category-location',
                        'hide_empty' => true,
                    )
                );

                // Check if any term exists
                if ( ! empty( $tags ) && is_array( $tags ) ) {
                    // Run a loop and print them all
                    foreach ( $tags as $tag ) { ?>
                        <a class="bagde"  href="<?php echo esc_url( get_term_link( $tag ) ) ?>" title="<?php echo $tag->name; ?>">
                            <?php echo $tag->name; ?>
                        </a><?php
                    }
                } 
            ?>
        </div>
    </div>
         
</div><!-- #section-filters -->