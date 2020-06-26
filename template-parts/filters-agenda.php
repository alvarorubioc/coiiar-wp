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

    <div class="filters-wrapper mt-2 mb-2">    
        <div class="categories">
            <div class='container'>
                <div class='single-item' id="carruselmeses">
                
                <?php
                $mesactual = $fechamenor;
                while ($mesactual<=$fechamayor)
                {
                    $salta = "";
                    if (array_key_exists($mesactual, $meses)) 
                    {
                    $clases = "entradaSlider has-events";
                    $salta = 'onclick="scrollToAnchor(\''.$mesactual.'\')"';
                    } else
                    {
                    $clases = "no-events";
                    }
                    echo "<div ".$salta." class=\" ".$clases."\" id=\"mes".substr($mesactual, 0,4).substr($mesactual, -2,2)."\" data-y=\"".substr($mesactual, 0,4)."\" data-m=\"".substr($mesactual, -2,2)."\"><div class=\"box-month center-xs\"><p class=\"text-h2\">".$mesestxt[substr($mesactual, -2,2)]."</p><strong>".substr($mesactual, 0,4)."</strong></div></div>";
                    $mesactual++;
                    if ($mesactual % 100 == 13)
                    {
                    $mesactual = (substr($mesactual, 0,4)+1)*100 + 1;
                    }
                }
                ?>
                
                </div>
            </div>
            
        </div>
        <div class="tags">
            <div id="botonesLugar">
            <?php
                $lugaresk = array_keys ( $lugares );
                sort($lugaresk);
                foreach ($lugaresk as $sitio)
                {
                echo "<div class=\"lugarEvento\">$sitio</div>";
                }
            ?>
            </div>
        </div>
    </div>
         
</div><!-- #section-filters -->