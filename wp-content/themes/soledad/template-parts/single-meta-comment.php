<?php
$style_cscount = get_theme_mod( 'penci_single_style_cscount' );
$style_cscount = $style_cscount ? $style_cscount : 's1';
?>
<?php if( ! get_theme_mod( 'penci_single_meta_comment' ) || ! get_theme_mod( 'penci_post_share' ) ): ?>
	<div class="tags-share-box<?php echo esc_attr( 's1' == $style_cscount ? ' center-box' : ' tags-share-box-2_3' ); ?> tags-share-box-<?php echo esc_attr( $style_cscount ); ?>">
		<?php
		if( 's1' != $style_cscount ){
			echo '<span class="penci-social-share-text">';
			if( get_theme_mod( 'penci_trans_share' ) ) { echo do_shortcode( get_theme_mod( 'penci_trans_share' ) ); }else{ esc_html_e( 'Share', 'soledad' ); }
			echo '</span>';
		}
		?>
		<?php if ( ! get_theme_mod( 'penci_single_meta_comment' ) && 's1' == $style_cscount ) : ?>
			<span class="single-comment-o<?php if ( get_theme_mod( 'penci_post_share' ) ) : echo ' hide-comments-o'; endif; ?>"><?php penci_fawesome_icon('far fa-comment'); ?><?php comments_number( '0 ' . penci_get_setting( 'penci_trans_comment' ), '1 '. penci_get_setting( 'penci_trans_comment' ), '% ' . penci_get_setting( 'penci_trans_comments' ) ); ?></span>
		<?php endif; ?>

		<?php if ( ! get_theme_mod( 'penci_post_share' ) ) : ?>
			<div class="post-share<?php if( get_theme_mod( 'penci__hide_share_plike' ) ): echo ' hide-like-count'; endif; ?>">
				<?php if( ! get_theme_mod( 'penci__hide_share_plike' ) ): ?>
					<span class="post-share-item post-share-plike">
					<?php echo penci_single_getPostLikeLink( get_the_ID() ); ?>
					</span>
				<?php endif; ?>
				<?php penci_soledad_social_share( 'single' );  ?>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>