<?php

$fechaini = isset($_GET['fi']) ? $_GET['fi'] : '-1';
if ($fechaini < 20100000 )
{
  $fechaini = date("Ymd");
}

$meses = 5;
if (isset($_GET['tipo']))
  if ($_GET['tipo'] === '1')
    $meses = 0;

error_log ($fechaini);
$fechafin = date('Ymd', strtotime('+'.$meses.' month', strtotime($fechaini)));
error_log ($fechafin);
$fechafin = date("Ymt", strtotime($fechafin));
error_log ($fechafin);

$tax = $_GET['tax'] + 0;

$mesesN = [ "ERROR", "Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

if ( ! defined('ABSPATH') )
{
  // No es lo ideal
  require_once('../../../wp-load.php' );
}

$query_en_si = 
  array(
    'post_type' => 'agenda',
    'meta_key' => 'event_start_date',
    'orderby'    => 'meta_value_num',
    'order'      => 'ASC',
    'meta_query'  =>
    array(
      array(
          'key'     => 'event_start_date',
          'value'   => array( $fechaini, $fechafin),
          'type'    => 'numeric',
          'compare' => 'BETWEEN',
      ),
    )
);

if ($tax > 0)
{
  error_log ("TAX = ".$tax);
  $query_en_si['tax_query'] = 
    array(
      array (
        'taxonomy' => 'category-events',
      'terms' => "".$tax
    )
    );
}

error_log (json_encode($query_en_si));
$the_query = new WP_Query($query_en_si);

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

<article data-mes="mes'.$mes.'" data-tagev="ev'.md5(ucwords(strtolower(trim(get_metadata( "post", get_the_ID(), 'event_tag',true))))).'" data-lugarev="ev'.md5(ucwords(strtolower(trim(get_metadata( "post", get_the_ID(), 'event_place',true))))).'" id="post-'.get_the_ID().'" class="evento col-xs-12"';

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
  <div class="card-footer">
    <div class="card-footer--item">
      <div class="dflex">
        <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
          <use xlink:href="'.get_template_directory_uri().'/assets/icons/sprite-icons.svg#calendar" />
        </svg>
        <span>'.date("d/m/Y", strtotime(get_metadata( "post", get_the_ID(), 'event_start_date',true))).'</span>
      </div>
    </div>
    <div class="card-footer--item">
      <div class="dflex">
        <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
            <use xlink:href="'.get_template_directory_uri().'/assets/icons/sprite-icons.svg#map-marker" />
        </svg>
        <span>'.get_metadata( "post", get_the_ID(), 'event_place',true).'</span>
      </div>
    </div>';
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
  'fechafin'=> $fechafin,
  'meses'=> join(",",$meses),
  'contador'=>$contador,
  'html_content'=>$html_content
  );
  echo json_encode($json_array);
