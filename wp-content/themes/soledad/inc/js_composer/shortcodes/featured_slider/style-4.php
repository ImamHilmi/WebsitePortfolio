<?php
/**
 * Template part for Slider Style 4
 */

$post_thumb_size = $post_thumb_size ? $post_thumb_size : 'penci-magazine-slider';
?>
<?php if ( $feat_query->have_posts() ) : while ( $feat_query->have_posts() ) : $feat_query->the_post(); ?>
	<div class="item">
		<?php if( ! $disable_lazyload ) { ?>
			<a class="penci-image-holder owl-lazy" data-src="<?php echo penci_get_featured_image_size( get_the_ID(), $post_thumb_size ); ?>" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
		<?php } else { ?>
			<a class="penci-image-holder" style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), $post_thumb_size ); ?>');" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
		<?php }?>
		<div class="penci-slider4-overlay">
			<a class="overlay-link" href="<?php the_permalink(); ?>"></a>
			<div class="penci-featured-content">
				<div class="feat-text<?php if ( $meta_date_hide ): echo ' slider-hide-date'; endif;?>">
					<div class="featured-slider-overlay"></div>
					<?php if ( ! $hide_categories ): ?>
						<div class="cat featured-cat"><?php penci_category( '' ); ?></div>
					<?php endif; ?>
					<h3><a title="<?php echo wp_strip_all_tags( get_the_title() ); ?>" href="<?php the_permalink() ?>"><?php echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $slider_title_length, '...' ); ?></a></h3>
					<?php if ( ! $hide_meta_comment || ! $meta_date_hide || $show_meta_author ): ?>
						<div class="feat-meta">
							<?php if ( $show_meta_author ): ?>
								<span class="feat-author"><?php echo penci_get_setting('penci_trans_by'); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
							<?php endif; ?>
							<?php if ( ! $meta_date_hide ): ?>
								<span class="feat-time"><?php penci_soledad_time_link(); ?></span>
							<?php endif; ?>
							<?php if ( ! $hide_meta_comment ): ?>
								<span class="feat-comments"><a href="<?php comments_link(); ?> "><?php comments_number( '0 ' . penci_get_setting( 'penci_trans_comment' ), '1 '. penci_get_setting( 'penci_trans_comment' ), '% ' . penci_get_setting( 'penci_trans_comments' ) ); ?></a></span>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; wp_reset_postdata(); endif; ?>