<div id="section-filters">
    <div class="filters-bar">
        <div class="container dflex">
            <div class="filter-by"><?php esc_html_e( 'Filtrar por:', 'coiiar' ); ?></div>
            <button class="dropdown categories active"><?php esc_html_e( 'Mes', 'coiiar' ); ?>
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

    <div class="filters-wrapper container mt-2 mb-2">    
        <div class="categories">
            <div class="single-item slick-initialized slick-slider dflex">
                <div class="slick-slide coneventos slick-current slick-active">
                    <div class="box-month center-xs this-month">
                        <p class="text-h2">JUN</p>
                        <strong>2020</strong>
                    </div>
                    <div class="box-month center-xs has-events">
                        <p class="text-h2">JUL</p>
                        <strong>2020</strong>
                    </div>
                    <div class="box-month center-xs">
                        <p class="text-h2">AGO</p>
                        <strong>2020</strong>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="tags">
            Aquí los tags de ubicación, cuando pinchas los filtra y hace scroll hacia el primer mes.
        </div>
    </div>
         
</div><!-- #section-filters -->