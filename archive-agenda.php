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

    <?php get_template_part( 'template-parts/hero/hero', 'agenda' ); ?>

	<?php
	$mesestxt["01"] = "ENE";
	$mesestxt["02"] = "FEB";
	$mesestxt["03"] = "MAR";
	$mesestxt["04"] = "ABR";
	$mesestxt["05"] = "MAY";
	$mesestxt["06"] = "JUN";
	$mesestxt["07"] = "JUL";
	$mesestxt["08"] = "AGO";
	$mesestxt["09"] = "SEP";
	$mesestxt["10"] = "OCT";
	$mesestxt["11"] = "NOV";
	$mesestxt["12"] = "DIC";


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
				'value'   => '20200101',//date("Ymd"),
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
			$lugares[ucwords(strtolower(trim($lugar)))]=true;
			$meses [$mes] = true;
			$contador++;
		}
	}
	else {
	$html_content .= "No post found ";
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
					<button class="dropdown" onclick="location.href='/formacion/'" ><?php esc_html_e( 'Formación', 'coiiar' ); ?>
					<button class="dropdown" onclick="location.href='/jornadas-tecnicas/'"><?php esc_html_e( 'Jornadas', 'coiiar' ); ?>
					<button class="dropdown" onclick="location.href='/eventos/'"><?php esc_html_e( 'Eventos', 'coiiar' ); ?>
				
			</div>
		</div> <!-- .filters-bar -->

		<div class="filters-wrapper mt-2 mb-2">   
			<div class="categories">
				<div class="container">
					<div class="single-item" id="carruselmeses">
					
					<?php
						$mesactual = $fechamenor;
						$pasos = 1;
						$arrancar = 0;
						while ($mesactual<=$fechamayor)
						//while ($pasos < 7)
							{
							$salta = "";
							if (array_key_exists($mesactual, $meses)) 
							{
								$clases = " has-events";
								$salta = 'onclick="recarga(\''.$mesactual.'01\',1)"';
							} else
							{
								$clases = " no-events";
							}
							if (date('Ym') == $mesactual)
							{
								$arrancar = ($pasos-1);
								$clases .= " mesactual";
								//data-paso=\"".($pasos-1)."\" data-tema=\".$tema.\"
							}
							echo "<div ".$salta." class=\" entradaSlider\" id=\"mes".substr($mesactual, 0,4).substr($mesactual, -2,2)."\" data-y=\"".substr($mesactual, 0,4)."\" data-m=\"".substr($mesactual, -2,2)."\"><div class=\"box-month center-xs ".$clases."\"><p class=\"text-h2\">".$mesestxt[substr($mesactual, -2,2)]."</p><strong>".substr($mesactual, 0,4)."</strong></div></div>";
							$mesactual++;
							if ($mesactual % 100 == 13)
							{
								$mesactual = (substr($mesactual, 0,4)+1)*100 + 1;
							}
							$pasos++;
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
							if (strlen(trim($sitio))>0) 
							{
								echo "<div class=\"lugarEvento bagde\" id=\"ev".md5($sitio)."\" >$sitio</div>"; //style=\"display: none;\"
							}	
						}
						echo "<div class=\"lugarEvento bagde\" style=\"\" id=\"evTodas\" >Todas</div>";
					?>
				</div>
			</div>

		</div><!-- .filters-wrapper -->
	</div><!-- #section-filters -->


<div class="bg-primary-light pt-3 pb-3">
	<div class="container">
		<div>
			<div id="eventos" class="row"></div>
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
  num = Number(num).toString();
  return num>9?num:("0"+num);
}

function scrollToAnchor(aid){
    var aTag = $("div[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}

function recarga(fecha,tipo)
{
  fetch('<?php echo get_bloginfo('template_url') ?>/carruseleventos.ajax.php?fi='+	fecha+"&tipo="+tipo)
  .then(function(response) {
    return response.json();
  })
  .then(function(json) 
  {
    // if (tipo) $("#carruselmeses").hide();
//	$(".lugarEvento").hide();
	$("#evTodas").show();
    document.querySelector("#eventos").innerHTML = json.html_content;
    document.querySelectorAll('.evento').forEach(function(e) 
    {
//      $("#"+e.dataset.lugarev).show();
    });
/*	if (tipo)
	{
		var f = document.querySelector("#mes"+fecha).dataset;
		f.salto = 1;
		$("#carruselmeses").slick('slickGoTo', parseInt(f.slickIndex));
		//$("#carruselmeses").show();
	}*/
  });
}

  document.addEventListener("DOMContentLoaded", function(event) 
  {
    $('.lugarEvento').on('click', function(e)
    {
      $(".separadorMesesExt").hide();
      var lugar = $(this).attr('id');
		document.querySelectorAll('.evento').forEach(function(e) 
		{
			if ((e.dataset.lugarev != lugar) && (lugar != "evTodas"))
			{
			$(e).hide("slow");
			} else
			{
			$("."+e.dataset.mes).show();
			$(e).show("slow");
			}
		});
    });


$("#carruselmeses").slick({
	infinite: false,
	slidesToShow: 6,
	slidesToScroll: 1,
	arrows: true,
	dots: false,
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


n = <?php echo $arrancar; ?>;
do
{
	$('#carruselmeses').slick('slickGoTo', n);
	x = $('#carruselmeses').slick('slickCurrentSlide');
	n = n - 1;
}	while (x < n + 1)

//$('#carruselmeses').slick('slickGoTo', <?php echo $arrancar; ?>);
$('#carruselmeses').on('afterChange', function(event, slick, currentSlide, nextSlide)
{
/*  var f = document.querySelector(".slick-current").dataset;
debugger; 
  if (f.salto != "1")
    recarga(f.y + "" + f.m,false);
	f.salto = 0;*/
});

function yyyymmdd() 
{
    function twoDigit(n) { return (n < 10 ? '0' : '') + n; }
    var now = new Date();
    return '' + now.getFullYear() + twoDigit(now.getMonth() + 1) + twoDigit(now.getDate());
}

recarga(yyyymmdd(),0);
});
</script>

</main><!-- .site-main -->

<?php
get_footer();