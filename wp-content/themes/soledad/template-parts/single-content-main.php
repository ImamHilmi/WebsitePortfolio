<?php
/**
 * The template for displaying single pages.
 *
 * @since 1.0
 */
$block_style = get_theme_mod('penci_blockquote_style') ? get_theme_mod('penci_blockquote_style') : 'style-1';
$thumb_alt = $thumb_title_html = '';

if( has_post_thumbnail() ){
	$thumb_id = get_post_thumbnail_id( get_the_ID() );
	$thumb_alt = penci_get_image_alt( $thumb_id, get_the_ID() );
	$thumb_title_html = penci_get_image_title( $thumb_id );
}

$single_style = penci_get_single_style();
?>
<article id="post-<?php the_ID(); ?>" class="post type-post status-publish">
	<?php if( 'style-8' == $single_style ): ?>
		<?php
		$single_magazine = 'container-single penci-single-style-8  penci-header-text-white';
		if( get_theme_mod( 'penci_home_layout' ) == 'magazine-1' || get_theme_mod( 'penci_home_layout' ) == 'magazine-2' ) {
			$single_magazine .= ' container-single-magazine';
		}
		?>
		<div class="<?php echo ( $single_magazine );?>">
		<?php
		$post_format = get_post_format();
		if( ! get_theme_mod( 'penci_move_title_bellow' ) && get_theme_mod( 'penci_post_thumb' ) && ! in_array( $post_format, array( 'link', 'quote','gallery','video' ) )  ) {
			get_template_part( 'template-parts/single', 'entry-header' );
		}else{
			get_template_part( 'template-parts/single', 'post-format2' );
		}
		?>
		</div>
		<?php if( get_theme_mod( 'penci_post_adsense_one' ) ): ?>
			<div class="penci-google-adsense-1">
				<?php echo do_shortcode( get_theme_mod( 'penci_post_adsense_one' ) ); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_move_title_bellow' ) &&  'style-10' != $single_style  ): ?>
		<?php
		if( 'style-8' != $single_style ){
			get_template_part( 'template-parts/single', 'breadcrumb-inner' );
		}

		get_template_part( 'template-parts/single', 'entry-header' );
		?>

		<?php if( get_theme_mod( 'penci_post_adsense_one' ) ): ?>
			<div class="penci-google-adsense-1">
				<?php echo do_shortcode( get_theme_mod( 'penci_post_adsense_one' ) ); ?>
			</div>
		<?php endif; ?>

	<?php endif; /* End check if not move title bellow featured image */ ?>

	<?php
	$single_poslcscount = penci_get_setting( 'penci_single_poslcscount' );
	if( 'above-content' == $single_poslcscount || 'abovebelow-content' == $single_poslcscount ){
		get_template_part( 'template-parts/single', 'meta-comment-top' );
	}
	?>

	<div class="post-entry <?php echo 'blockquote-'. $block_style; ?>">
		<div class="inner-post-entry entry-content" id="penci-post-entry-inner">
			<?php the_content(); ?>

			<div class="penci-single-link-pages">
				<?php wp_link_pages(); ?>
			</div>
			<?php if ( ! get_theme_mod( 'penci_post_tags' ) && has_tag() ) : ?>
				<?php if ( is_single() ) : ?>
					<div class="post-tags">
						<?php the_tags( wp_kses( __( '', 'soledad' ), penci_allow_html() ), "", "" ); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>

	<?php if( get_theme_mod( 'penci_post_adsense_two' ) ): ?>
		<div class="penci-google-adsense-2">
			<?php echo do_shortcode( get_theme_mod( 'penci_post_adsense_two' ) ); ?>
		</div>
	<?php endif; ?>

	<?php
	if( 'below-content' == $single_poslcscount || 'abovebelow-content' == $single_poslcscount ){
		get_template_part( 'template-parts/single', 'meta-comment' );
	}
	?>

	<?php if ( get_theme_mod( 'penci_related_post_popup' ) ) : ?><div class="penci-flag-rlt-popup"></div><?php endif; ?>
	
	<?php 
	$reorder = get_theme_mod('penci_single_ordersec') ? get_theme_mod('penci_single_ordersec') : 'author-postnav-related-comments';
	$reorderarray = explode( '-', $reorder );
	if( !empty( $reorderarray ) ) {
		foreach( $reorderarray as $sec ) {
	?>

	<?php if ( $sec == 'author' && ! get_theme_mod( 'penci_post_author' ) ) : ?>
		<?php get_template_part( 'inc/templates/about_author' ); ?>
	<?php endif; ?>

	<?php if ( $sec == 'postnav' && ! get_theme_mod( 'penci_post_nav' ) ) : ?>
		<?php get_template_part( 'inc/templates/post_pagination' ); ?>
	<?php endif; ?>

	<?php if ( $sec == 'related' && ! get_theme_mod( 'penci_post_related' ) ) : ?>
		<?php get_template_part( 'inc/templates/related_posts' ); ?>
	<?php endif; ?>
	
	<?php if ( $sec == 'comments' && ! get_theme_mod( 'penci_post_hide_comments' ) ) : ?>
		<?php comments_template( '', true ); ?>
	<?php endif; ?>
	
	<?php } } ?>
	
	<?php if ( get_theme_mod( 'penci_related_post_popup' ) ) : ?><div class="penci-flag-rlt-popup"></div><?php endif; ?>

</article>