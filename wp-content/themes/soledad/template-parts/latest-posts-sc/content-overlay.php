<?php
/**
 * Template loop for overlay style
 */
?>
<section class="grid-style grid-overlay">
	<article id="post-<?php the_ID(); ?>" class="item overlay-layout hentry">
		<div class="penci-overlay-over">
			<div class="thumbnail">
				<?php
				/* Display Review Piechart  */
				if( function_exists('penci_display_piechart_review_html') ) {
					penci_display_piechart_review_html( get_the_ID() );
				}
				?>
				<?php if( ! get_theme_mod( 'penci_disable_lazyload_layout' ) ) { ?>
				<a class="penci-image-holder penci-lazy" data-src="<?php echo penci_get_featured_image_size( get_the_ID(), 'penci-full-thumb' ); ?>" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
				</a>
				<?php } else { ?>
				<a class="penci-image-holder" style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), 'penci-full-thumb' ); ?>');" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
				</a>
				<?php } ?>
			</div>

			<a class="overlay-border" href="<?php the_permalink() ?>"></a>

			<div class="overlay-header-box">
				<?php if ( 'yes' != $grid_cat ) : ?>
					<span class="cat"><?php penci_category( '' ); ?></span>
				<?php endif; ?>

				<h2 class="penci-entry-title entry-title overlay-title"><a href="<?php the_permalink(); ?>"><?php penci_trim_post_title( get_the_ID(), $grid_title_length ); ?></a></h2>
				<?php penci_soledad_meta_schema(); ?>
				<?php if ( 'yes' != $grid_author ) : ?>
					<div class="penci-meta-author overlay-author byline"><span class="author-italic author vcard"><?php echo penci_get_setting( 'penci_trans_written_by' ); ?> <a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span></div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( 'yes' != $grid_date || 'yes' != $grid_comment || 'yes' != $grid_share_box || 'yes' == $grid_viewscount ) : ?>
			<div class="penci-post-box-meta grid-post-box-meta overlay-post-box-meta">
				<?php if ( 'yes' != $grid_date ) : ?>
					<div class="overlay-share overlay-style-date"><?php penci_fawesome_icon('far fa-clock'); ?><?php penci_soledad_time_link(); ?></div>
				<?php endif; ?>
				<?php if ( 'yes' != $grid_comment ) : ?>
					<div class="overlay-share overlay-style-comment"><a href="<?php comments_link(); ?> "><?php penci_fawesome_icon('far fa-comment'); ?><?php comments_number( '0 ' . penci_get_setting( 'penci_trans_comment' ), '1 '. penci_get_setting( 'penci_trans_comment' ), '% ' . penci_get_setting( 'penci_trans_comments' ) ); ?></a></div>
				<?php endif; ?>
				<?php
				if ( 'yes' == $grid_viewscount ) {
					echo '<span>';
					echo penci_get_post_views( get_the_ID() );
					echo ' ' . penci_get_setting( 'penci_trans_countviews' );
					echo '</span>';
				}
				?>

				<?php if ( 'yes' != $grid_share_box ) : ?>
					<div class="penci-post-share-box">
						<?php echo penci_getPostLikeLink( get_the_ID() ); ?>
						<?php penci_soledad_social_share( );  ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</article>
</section>