<?php
/**
 * Template part for displaying card normativa
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coiiar
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12'); ?>>
	
		<div class="card"> 	
			<div class="card-content">
                <?php $terms = get_the_terms( $post->ID , 'sectors-normativa' ); 
					if  ($terms) {
						foreach ( $terms as $term ) {
						echo '<span class="text-caption">' . $term->name . ' </span>';
						}
					}
				?>
				<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<h3 class="text-h4"><?php the_title(); ?></h3>
				</a>
				<div class="entry-meta">
                    <?php coiiar_posted_on(); ?>
                    <div class="dflex middle-xs">
                        <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#map-marker" />
                        </svg>
                        <?php $terms = get_the_terms( $post->ID , 'location-normativa' ); 
                            if  ($terms) {
                                foreach ( $terms as $term ) {
                                echo '<span>' . $term->name . '</span>';
                                }
                            }
                        ?>
                    </div>
                    <div class="dflex middle-xs">
                        <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#tag" />
                        </svg>
                        <?php $terms = get_the_terms( $post->ID , 'tags-normativa' ); 
                            if  ($terms) {
                                foreach ( $terms as $term ) {
                                echo '<span>' . $term->name . '</span>';
                                }
                            }
                        ?>
                    </div>
                    
                </div><!-- .entry-meta -->	
                <?php echo the_excerpt(); ?>
			</div>		
		</div><!-- end card -->

	</article><!-- #post-<?php the_ID(); ?> -->