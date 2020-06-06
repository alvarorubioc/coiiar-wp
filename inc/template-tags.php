<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package coiiar
 */

if ( ! function_exists( 'coiiar_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function coiiar_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			$time_icon = '<svg class="icon" width="24" height="24" viewBox="0 0 24 24"><use xlink:href="'.get_template_directory_uri().'/assets/icons/sprite-icons.svg#calendar" /></svg>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		echo '<div class="posted-on dflex center-xs"> ' .$time_icon. ' ' . $time_string . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'coiiar_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function coiiar_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		$autor_icon = '<svg class="icon" width="24" height="24" viewBox="0 0 24 24"><use xlink:href="'.get_template_directory_uri().'/assets/icons/sprite-icons.svg#person" /></svg>';

		echo '<div class="byline dflex center-xs"> ' .$autor_icon. ' ' . $byline . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'coiiar_posted_category' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function coiiar_posted_category() {
		//$categories_list = get_the_category_list( esc_html__( ', ', 'coiiar' ) );
		$categories_list = preg_replace('/<a /', '<a class="bagde"', get_the_category_list( ' ' ));
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<div class="category-links">' .$categories_list. '</div>' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
endif;


if ( ! function_exists( 'coiiar_posted_tag' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function coiiar_posted_tag() {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = preg_replace('/<a /', '<a class="bagde"', get_the_tag_list(' '));
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<div class="tags-links">' . $tags_list . '</div>' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
endif;

if ( ! function_exists( 'coiiar_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for comments.
	 */
	function coiiar_entry_footer() {
		

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'coiiar' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'coiiar' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'coiiar_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function coiiar_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_single() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'img-card',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;


/** 
 * Modify “Category: & Tags:” from the_archive_title 
 */  
add_filter( 'get_the_archive_title', function ($title) {  
  
    if ( is_category() ) {  
      
        $title = single_cat_title( 'Noticias por temática: ', false );  
  
        } elseif ( is_tag() ) {  
  
            $title = single_tag_title( 'Noticias por perfil: ', false );  
  
        } 
  
    return $title;  
  
}); 
