<?php
$output = $penci_block_width = $el_class = $css_animation = $css = '';
$date   = $auto = $reply = $retweet = $favorite = $align = '';

$tweets_text_color = $tweets_text_size = $tweets_date_color = $tweets_date_size = '';
$tweets_link_color = $tweets_link_size = $tweets_dot_color = $tweets_dot_hcolor = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$tweets = getTweets(5);
if( empty( $tweets ) ){
	return;
}

$class_to_filter = vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_class = 'penci-block-vc penci-latest-tweets-widget';
$css_class .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$block_id = Penci_Vc_Helper::get_unique_id_block( 'latest_tweets' );
?>
	<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>">
		<?php Penci_Vc_Helper::markup_block_title( $atts ); ?>
		<div class="penci-block_content">
			<?php
			if( isset( $tweets['error'] ) ) {
				echo 'Missing consumer key - please check your settings in admin > Settings > Twitter Feed Auth';
			} else {
				?>
				<div class="penci-tweets-widget-content <?php echo $align; ?>">
					<span class="icon-tweets"><?php penci_fawesome_icon('fab fa-twitter'); ?></span>
					<div class="penci-owl-carousel penci-owl-carousel-slider penci-tweets-slider" data-dots="true" data-nav="false" data-auto="<?php if( $auto ){ echo 'false'; } else { echo 'true'; } ?>">
						<?php foreach( $tweets as $tweet ):
							$date_array = explode( ' ', $tweet['created_at'] );
							$tweet_id = $tweet['id_str'];
							$tweet_text = $tweet['text'];
							$urls = $tweet['entities']['urls'];

							if( isset( $urls ) ) {
								foreach ( $urls as $ul ) {
									$url = $ul['url'];
									if( isset( $url ) ):
										$tweet_text = str_replace( $url, '<a href="'. $url .'" target="_blank">'. $url .'</a>', $tweet_text );
									endif;
								}
							}
							?>
							<div class="penci-tweet">
								<div class="tweet-text">
									<?php echo $tweet_text; ?>
								</div>
								<?php if( $date_array[1] && $date_array[2] && $date_array[5] && ! $date ): ?>
									<p class="tweet-date"><?php echo $date_array[2] . '-' . $date_array[1] . '-' . $date_array[5]; ?></p>
								<?php endif; ?>
								<div class="tweet-intents">
									<div class="tweet-intents-inner">
										<span><a target="_blank" class="reply" href="https://twitter.com/intent/tweet?in_reply_to=<?php echo sanitize_text_field( $tweet_id ); ?>"><?php echo do_shortcode( $reply ); ?></a></span>
										<span><a target="_blank" class="retweet" href="https://twitter.com/intent/retweet?tweet_id=<?php echo sanitize_text_field( $tweet_id ); ?>"><?php echo do_shortcode( $retweet ); ?></a></span>
										<span><a target="_blank" class="favorite" href="https://twitter.com/intent/favorite?tweet_id=<?php echo sanitize_text_field( $tweet_id ); ?>"><?php echo do_shortcode( $favorite ); ?></a></span>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<?php
			}
			?>
		</div>
	</div>
<?php

$id_latest_tweets = '#' . $block_id;
$css_custom = Penci_Vc_Helper::get_heading_block_css( $id_latest_tweets, $atts );

if ( $tweets_text_color ) {
	$css_custom .= $id_latest_tweets . ' .tweet-text{ color:' . esc_attr( $tweets_text_color ) . ' }';
}
if ( $tweets_text_size ) {
	$css_custom .= $id_latest_tweets . ' .tweet-text{ font-size:' . esc_attr( $tweets_text_size ) . ' }';
}
if ( $tweets_date_color ) {
	$css_custom .= $id_latest_tweets . ' .tweet-date{ color:' . esc_attr( $tweets_date_color ) . ' }';
}
if ( $tweets_text_size ) {
	$css_custom .= $id_latest_tweets . ' .tweet-date{ font-size:' . esc_attr( $tweets_text_size ) . ' }';
}
if ( $tweets_link_color ) {
	$css_custom .= $id_latest_tweets . ' .penci-tweets-widget-content .tweet-intents-inner:after,';
	$css_custom .= $id_latest_tweets . ' .penci-tweets-widget-content .tweet-intents-inner:before{background-color:' . esc_attr( $tweets_link_color ) . '}';

	$css_custom .= $id_latest_tweets . ' .tweet-text a,';
	$css_custom .= $id_latest_tweets . ' .penci-tweets-widget-content .icon-tweets,';
	$css_custom .= $id_latest_tweets . ' .penci-tweets-widget-content .tweet-intents span:after,';
	$css_custom .= $id_latest_tweets . ' .penci-tweets-widget-content .tweet-intents a{ color:' . esc_attr( $tweets_link_color ) . ' }';
}
if ( $tweets_link_size ) {
	$css_custom .= $id_latest_tweets . ' .penci-tweets-widget-content .tweet-intents a{ font-size:' . esc_attr( $tweets_text_size ) . ' }';
}
if ( $tweets_dot_color ) {
	$css_custom .= $id_latest_tweets . ' .penci-owl-carousel.penci-tweets-slider .owl-dots .owl-dot span{ border-color:' . esc_attr( $tweets_dot_color ) . ';background-color:' . esc_attr( $tweets_dot_color ) . ' }';
}
if ( $tweets_dot_hcolor ) {
	$css_custom .= $id_latest_tweets . ' .penci-owl-carousel.penci-tweets-slider .owl-dots .owl-dot:hover span,';
	$css_custom .= $id_latest_tweets . ' .penci-owl-carousel.penci-tweets-slider .owl-dots .owl-dot.active span{ border-color:' . esc_attr( $tweets_dot_hcolor ) . ';background-color:' . esc_attr( $tweets_dot_hcolor ) . '}';
}

if ( $css_custom ) {
	echo '<style>';
	echo $css_custom;
	echo '</style>';
}
