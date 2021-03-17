<?php
$output = $penci_block_width = $el_class = $css_animation = $css = '';

$title_page = $page_url =  $page_height = $hide_faces =  $hide_stream = '';
$heading_title_style = $heading = $heading_title_link = $heading_title_align = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_class = 'penci-block-vc penci_facebook_widget';
$css_class .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$block_id = Penci_Vc_Helper::get_unique_id_block( 'counter_up' );
?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>">
	<?php Penci_Vc_Helper::markup_block_title( $atts ); ?>
	<div class="penci-block_content">
		<?php
		wp_enqueue_script( 'penci-facebook-js', get_template_directory_uri() . '/js/facebook.js' , '', '4.1', true );
		?>
		<div class="fb-page" data-href="<?php echo esc_url( $page_url ); ?>"<?php if( !$hide_stream && is_numeric( $page_height ) && $page_height > 69 ): ?> data-height="<?php echo absint( $page_height ); ?>"<?php endif;?> data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="<?php if( !$hide_faces) { echo 'true'; } else { echo 'false'; } ?>" data-show-posts="<?php if( !$hide_stream) { echo 'true'; } else { echo 'false'; } ?>"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo esc_attr( $page_url ); ?>"><a href="<?php echo esc_url( $page_url ); ?>"><?php if($title_page) { echo sanitize_text_field( $title_page ); } else { echo 'Facebook'; } ?></a></blockquote></div></div>
	</div>
</div>
<?php

$id_facebook_page = '#' . $block_id;
$css_custom = Penci_Vc_Helper::get_heading_block_css( $id_facebook_page, $atts );

if ( $css_custom ) {
	echo '<style>';
	echo $css_custom;
	echo '</style>';
}
