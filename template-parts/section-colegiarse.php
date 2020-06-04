<section class="pt-5" id="section-colegiarse">	
    <div class="container">
        
        <div class="row mb-2 center-xs">
            <div class="col-xs-12 col-md-7">
                <div class="divider aligncenter"></div>
                <h2>Si eres Ingenierio Industrial colegiate en 3 pasos</h2>
                <p>Todo lo que necesitas saber para estar al día en Ingeniería e Industria 4.0.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-5">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cta-img')) : 
					endif; ?>
            </div>
            <div class="col-xs-12 col-md-5 col-md-offset-2">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cta-text')) : 
                    endif; ?>
                <div class="mb-3"><a class="btn btn--primary btn--md"><?php esc_html_e( 'Descubre como unirte', 'coiiar' ); ?></a></div>    
            </div>
        </div>
    </div>
</section>       