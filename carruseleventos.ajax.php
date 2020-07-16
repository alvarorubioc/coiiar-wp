<?php

function sumarMes($meses)
{
  $meses = $meses + 1;
  if ($meses % 100 > 12)
    {
      $meses = $meses + 100 - 12;
    }
    return $meses;
}

$fechaini = isset($_GET['fi']) ? $_GET['fi'] : '-1';
if ($fechaini < 201000 )
{
  $fechaini = date("Ym");
}

$fechafin = sumarMes($fechaini);
$fechafin = sumarMes($fechafin);
$fechafin = sumarMes($fechafin);
$fechafin = sumarMes($fechafin);
$fechafin = sumarMes($fechafin);

if (isset($_GET['tipo']))
{
  if ($_GET['tipo'] == "true")
  {
    $fechaini = date("Ymd");
  } else
  {
    $fechaini = $fechaini."00";
  }
}

$mesesN = [ "ERROR", "Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

if ( ! defined('ABSPATH') )
{
  // No es lo ideal
  require_once('../../../wp-load.php' );
}

$the_query = new WP_Query(
  array(
    'post_type' => 'agenda',
    'meta_key' => 'event_start_date',
    'orderby'    => 'meta_value_num',
    'order'      => 'ASC',
    'meta_query'  =>
    array(
      array(
          'key'     => 'event_start_date',
          'value'   => array( $fechaini, $fechafin."31" ),
          'type'    => 'numeric',
          'compare' => 'BETWEEN',
      ),
    )
  )
);

$html_content = "";
$contador = 0;
$meses = [];
if ( $the_query->have_posts() )
{
  $html_content .= '';
  while ( $the_query->have_posts() )
  {
      //$the_query->the_post();
      //echo '<li>' . get_the_title() . ' -> <pre>'.json_encode($the_query->the_post()).'</pre></li>';
      $the_query->the_post();
      $fecha = get_metadata( "post", get_the_ID(), 'event_start_date',true);
      $mes = substr($fecha, 0, 6);
      $ancla = "";
      if (!array_key_exists($mes, $meses)) $ancla = '<a id="'.$mes.'"></a><div name="'.$mes.'" class="mes'.$mes.' separadorMesesExt col-xs-12 mt-3 mb-1"> <strong class="separadorMeses" >'.$mesesN[substr($fecha, 4, 2)+0].' '.substr($fecha, 0, 4).'</strong></div>';
      $meses [$mes] = true;
    $html_content .= $ancla.'

<article data-mes="mes'.$mes.'" data-lugarev="ev'.md5(get_metadata( "post", get_the_ID(), 'event_place',true)).'" id="post-'.get_the_ID().'" class="evento "';

ob_start();
post_class('col-xs-12');
$html_content .= ob_get_clean();

$html_content .= '>

<div class="card--horizontal">
  <div class="card-img">';

  ob_start();
  coiiar_post_thumbnail('full');
  $html_content .= ob_get_clean();

    $html_content .= '
        <span class="card-img__tag bagde">'.get_metadata( "post", get_the_ID(), 'event_tag',true).'</span>
  </div>
  <div class="card-content">';

  $terms = get_the_terms( $post->ID , 'category-events' );
  if  ($terms)
  {
    foreach ( $terms as $term )
    {
      $html_content .= '<div class="text-caption">' . $term->name . '</div>';
    }
  }

  $html_content .= '
  <a id="id-'.get_the_ID().'" href="'.get_the_permalink().'" title="'.get_the_title().'">
    <h3 class="text-h5">'.get_the_title().'</h3>
  </a>
  <div class="card-content__info dflex">
    <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
      <use xlink:href="'.get_template_directory_uri().'/assets/icons/sprite-icons.svg#info" />
    </svg>
    <span>'.get_metadata( "post", get_the_ID(), 'event_extra_info',true).'</span>
  </div>
</div>
<div class="card-footer aligncenter">
          <div class="center-xs">
    <svg class="icon" width="48" height="48" viewBox="0 0 24 24">
      <use xlink:href="'.get_template_directory_uri().'/assets/icons/sprite-icons.svg#calendar" />
    </svg>
    <span>'.date("d/m/Y", strtotime(get_metadata( "post", get_the_ID(), 'event_start_date',true))).'</span>
  </div>
          <div class="mt-2 dflex center-xs">
              <div class="dflex middle-xs">
                  <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="'.get_template_directory_uri().'/assets/icons/sprite-icons.svg#map-marker" />
                  </svg>
                  <span>'.get_metadata( "post", get_the_ID(), 'event_place',true).'</span>
              </div>
          <div>';
  $html_content .= '
  </div>
</div><!-- end card -->

</article><!-- #post-'.get_the_ID().' -->

';
      $html_content .= '';

      $contador++;
  }
}

$json_array=array(
  'fechaini'=> $fechaini,
  'fechafin'=> $fechafin."31",
  'meses'=> join(",",$meses),
  'contador'=>$contador,
  'html_content'=>$html_content
  );
  echo json_encode($json_array);
