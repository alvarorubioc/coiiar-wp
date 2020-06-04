<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coiiar
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text">Buscar:</span>
        <input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Buscar...', 'coiiar' ); ?>" value="" name="s">
    </label>
    <input type="submit" class="search-submit" value="Buscar">
</form>