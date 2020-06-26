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
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<main id="primary" class="site-main">

	<?php get_template_part( 'template-parts/hero/hero', 'agenda' );


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
	$html_content .= "No post found ";
	}

	$lugaresk = array_keys ( $lugares );
	sort($lugaresk);


	get_template_part( 'template-parts/filters-agenda' ); ?>

<div id='eventos'></div>

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
  slidesToScroll: 1
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
