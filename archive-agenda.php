<?php
/**
 * The template for displaying archive agenda
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coiiar
 */

get_header();
?>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<main id="primary" class="site-main">

	<?php get_template_part( 'template-parts/hero/hero', 'agenda' );

	$mesestxt["01"] = "Ene";
	$mesestxt["02"] = "Feb";
	$mesestxt["03"] = "Mar";
	$mesestxt["04"] = "Abr";
	$mesestxt["05"] = "May";
	$mesestxt["06"] = "Jun";
	$mesestxt["07"] = "Jul";
	$mesestxt["08"] = "Ago";
	$mesestxt["09"] = "Sep";
	$mesestxt["10"] = "Oct";
	$mesestxt["11"] = "Nov";
	$mesestxt["12"] = "Dic";


	$the_query = new WP_Query( 
	array( 
		'posts_per_page' => '-1', 
		'post_type' => 'agenda', 
		'meta_key' => 'event_start_date', 
		'orderby'    => 'meta_value_num',
		'order'      => 'ASC',
		'meta_query'  => 
		array(
		array(
			'key'     => 'event_start_date',
			'value'   => date("Ymd"),
			'type'    => 'numeric',
			'compare' => '>',      
		),
		)
	)
	);

	$fechamenor = 999999;
	$fechamayor = 000000;
	$lugares = [];

	$html_content = "";
	$contador = 0;
	$meses = [];

	$html_content = '';

	if ( $the_query->have_posts() ) 
	{
		while ( $the_query->have_posts() ) 
			{
				$the_query->the_post();
				$fecha = get_metadata( "post", get_the_ID(), 'event_start_date',true);
				$lugar = get_metadata( "post", get_the_ID(), 'event_place',true);
				$mes = substr($fecha, 0, 6);
				if ($fechamenor>$mes) $fechamenor=$mes;
				if ($fechamayor<$mes) $fechamayor=$mes;
				$lugares[$lugar]=true;
				$meses [$mes] = true;
				$contador++;
			}
	}
	else {
		$html_content .= "No post found";
	}
	?>

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
				<?php
					$lugaresk = array_keys ( $lugares );
					sort($lugaresk); ?>

				<div id="botonesLugar" class="container">
					<?php
						$lugaresk = array_keys ( $lugares );
						sort($lugaresk);
						foreach ($lugaresk as $sitio)
						{
						echo "<a class=\"bagde\">$sitio</a>";
						}
					?>
				</div>
			</div>

		</div><!-- .filters-wrapper -->
	</div><!-- #section-filters -->


<div class="bg-primary-light pt-3 pb-3">
	<div class="container">
		<div class="row">
			<div id='eventos'></div>
		</div>
	</div>
</div>		

<script>
	function addHTML (objeto, html)
	{
		objeto.innerHTML = objeto.innerHTML + html;
	}

	function lz(num)
	{
	return num>9?num:("0"+num);
	}

	function scrollToAnchor(aid){
		var aTag = $("a[name='"+ aid +"']");
		$('html,body').animate({scrollTop: aTag.offset().top},'slow');
	}

	function recarga(fecha)
	{
	fetch('<?php echo get_bloginfo('template_url') ?>/carruseleventos.ajax.php?fi='+	fecha)
	.then(function(response) {
		return response.json();
	})
	.then(function(json) 
	{
		document.querySelector("#eventos").innerHTML = json.html_content;
	});
	}

	document.addEventListener("DOMContentLoaded", function(event) 
	{
		var d1 = new Date("<?php echo substr($fechamenor, 0,4)."-".substr($fechamenor, -2,2) ?>");

	$("#carruselmeses").slick({
	infinite: false,
	slidesToShow: 6,
	slidesToScroll: 1,
	responsive: [
		{
		breakpoint: 480,
		settings: {
			slidesToShow: 2,
		}
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
	]
	});

	$('#carruselmeses').on('afterChange', function(event, slick, currentSlide, nextSlide)
	{
	var f = document.querySelector(".slick-current").dataset;
		recarga(f.y + "" + f.m);
	});

	recarga((d1.getYear() + 1900) + lz(d1.getMonth()+1));
	});
</script>

</main><!-- .site-main -->

<?php
get_footer();