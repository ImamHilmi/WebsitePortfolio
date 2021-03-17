<?php
/**
 * About me widget
 * Display your information on footer or sidebar
 *
 * @package Wordpress
 * @since   1.0
 */

add_action( 'widgets_init', 'penci_instagram_feed_widget' );

if ( ! function_exists( 'penci_instagram_feed_widget' ) ) {
	function penci_instagram_feed_widget() {
		register_widget( 'Penci_Instagram_Feed_Widget' );
	}
}

if ( ! class_exists( 'Penci_Instagram_Feed_Widget' ) ) {
	class Penci_Instagram_Feed_Widget extends WP_Widget {

		protected $default;

		function __construct() {
			$this->default = array(
				'title'            => __( 'Instagram', 'soledad' ),
				'access_token'     => '',
				'insta_user_id'     => '',
				'search_for'       => 'username',
				'username'         => '',
				'hashtag'          => '',
				'blocked_users'    => '',
				'attachment'       => 0,
				'template'         => 'thumbs-no-border',
				'images_link'      => 'image_url',
				'custom_url'       => '',
				'orderby'          => 'rand',
				'images_number'    => 9,
				'columns'          => 3,
				'refresh_hour'     => 12,
				'image_size'       => 'jr_insta_square',
				'image_link_rel'   => '',
				'image_link_class' => '',
				'no_pin'           => 0,
				'controls'         => 'prev_next',
				'animation'        => 'slide',
				'caption_words'    => 100,
				'slidespeed'       => 7000,
				'description'      => array( 'username', 'time', 'caption' ),
			);

			$widget_ops  = array( 'classname' => 'penci-insta-slider', 'description' => esc_html__( 'A widget that displays thumbnails or a slider with instagram images', 'soledad' ) );
			$control_ops = array( 'id_base' => 'penci-insta-slider' );

			global $wp_version;
			if ( 4.3 > $wp_version ) {
				$this->WP_Widget( 'penci-insta-slider', esc_html__( '.Soledad Instagram Feed', 'soledad' ), $widget_ops, $control_ops );
			} else {
				parent::__construct( 'penci-insta-slider', esc_html__( '.Soledad Instagram Feed', 'soledad' ), $widget_ops, $control_ops );
			}
		}

		function widget( $args, $instance ) {
			$instance = wp_parse_args( $instance, $this->default );
			extract( $args );

			/* Before widget (defined by themes). */
			echo ent2ncr( $before_widget );

			/* Display the widget title if one was input (before and after defined by themes). */
			$title = apply_filters( 'widget_title', $instance['title'] );
			if ( $title ) {
				echo ent2ncr( $before_title )  . $title . ent2ncr( $after_title );
			}

			Penci_Instagram_Feed::display_images( $instance );

			/* After widget (defined by themes). */
			echo ent2ncr( $after_widget );
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title']            = $new_instance['title'];
			$instance['access_token']     = $new_instance['access_token'];
			$instance['access_token']     = $new_instance['access_token'];
			$instance['insta_user_id']     = $new_instance['insta_user_id'];
			$instance['search_for']       = $new_instance['search_for'];
			$instance['username']         = $new_instance['username'];
			$instance['hashtag']          = $new_instance['hashtag'];
			$instance['blocked_users']    = $new_instance['blocked_users'];
			$instance['attachment']       = $new_instance['attachment'];
			$instance['template']         = $new_instance['template'];
			$instance['images_link']      = $new_instance['images_link'];
			$instance['custom_url']       = $new_instance['custom_url'];
			$instance['orderby']          = $new_instance['orderby'];
			$instance['images_number']    = $new_instance['images_number'];
			$instance['columns']          = $new_instance['columns'];
			$instance['refresh_hour']     = $new_instance['refresh_hour'];
			$instance['image_size']       = $new_instance['image_size'];
			$instance['image_link_rel']   = $new_instance['image_link_rel'];
			$instance['image_link_class'] = $new_instance['image_link_class'];
			$instance['no_pin']           = $new_instance['no_pin'];
			$instance['controls']         = $new_instance['controls'];
			$instance['animation']        = $new_instance['animation'];
			$instance['caption_words']    = $new_instance['caption_words'];
			$instance['slidespeed']       = $new_instance['slidespeed'];
			$instance['description']      = $new_instance['description'];
			$instance['support_author']   = $new_instance['support_author'];

			return $instance;
		}

		function form( $instance ) {
			$instance = wp_parse_args( $instance, $this->default );

			$instance_title = $instance['title'] ? str_replace( '"','&quot;', $instance['title'] ) : '';
			?>
			<div class="penci-instagram-container">
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e( 'Title:', 'soledad' ); ?></strong></label>
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance_title; ?>"/>
				</p>

				<p>
					<strong><?php _e( 'Search Instagram for:', 'soledad' ); ?></strong><br>
					<span class="penci-search-for-container"><label class="penci-seach-for"><input type="radio" id="<?php echo $this->get_field_id( 'search_for' ); ?>" name="<?php echo $this->get_field_name( 'search_for' ); ?>" value="username" <?php checked( 'username', $instance['search_for'] ); ?> /> <?php _e( 'Username:', 'soledad' ); ?></label> <input id="<?php echo $this->get_field_id( 'username' ); ?>" class="inline-field-text" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>"/></span>
					<span class="penci-search-for-container"><label class="penci-seach-for"><input type="radio" id="<?php echo $this->get_field_id( 'search_for' ); ?>" name="<?php echo $this->get_field_name( 'search_for' ); ?>" value="hashtag" <?php checked( 'hashtag', $instance['search_for'] ); ?> /> <?php _e( 'Hashtag:', 'soledad' ); ?></label> <input id="<?php echo $this->get_field_id( 'hashtag' ); ?>" class="inline-field-text" name="<?php echo $this->get_field_name( 'hashtag' ); ?>" value="<?php echo $instance['hashtag']; ?>"/> <small><?php _e( 'without # sign', 'soledad' ); ?></small></span>
				</p>
				<p class="<?php if ( 'username' != $instance['search_for'] ) {echo 'hidden';} ?>">
					<label for="<?php echo $this->get_field_id( 'access_token' ); ?>"><?php _e( 'Instagram Access Token', 'soledad' ); ?>:</label>
					<input class="widefat" id="<?php echo $this->get_field_id( 'access_token' ); ?>" name="<?php echo $this->get_field_name( 'access_token' ); ?>" value="<?php echo $instance['access_token']; ?>"/>
					<span class="penci-description">Please fill the Instagram Access Token here. You can get Instagram Access Token via <a href="http://pencidesign.com/penci_instagram/" target="_blank">http://pencidesign.com/penci_instagram</a></span>
				</p>
				<p class="<?php if ( 'username' != $instance['search_for'] ) {echo 'hidden';} ?>">
					<label for="<?php echo $this->get_field_id( 'insta_user_id' ); ?>"><?php _e( 'Instagram User ID', 'soledad' ); ?>:</label>
					<input class="widefat" id="<?php echo $this->get_field_id( 'insta_user_id' ); ?>" name="<?php echo $this->get_field_name( 'insta_user_id' ); ?>" value="<?php echo $instance['insta_user_id']; ?>"/>
					<span class="penci-description">Please enter the User ID for this Profile ( Eg: 123456789987654321 )  You can get User ID via <a href="http://pencidesign.com/penci_instagram/" target="_blank">http://pencidesign.com/penci_instagram/</a></span>
				</p>

				<p class="<?php if ( 'hashtag' != $instance['search_for'] ) {echo 'hidden';} ?>">
					<label for="<?php echo $this->get_field_id( 'blocked_users' ); ?>"><?php _e( 'Block Users', 'soledad' ); ?>:</label>
					<input class="widefat" id="<?php echo $this->get_field_id( 'blocked_users' ); ?>" name="<?php echo $this->get_field_name( 'blocked_users' ); ?>" value="<?php echo $instance['blocked_users']; ?>"/>
					<span class="penci-description"><?php _e( 'Enter usernames separated by commas whose images you don\'t want to show', 'soledad' ); ?></span>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'images_number' ); ?>"><strong><?php _e( 'Number of images to show:', 'soledad' ); ?></strong>
						<input class="small-text" id="<?php echo $this->get_field_id( 'images_number' ); ?>" name="<?php echo $this->get_field_name( 'images_number' ); ?>" value="<?php echo $instance['images_number']; ?>"/>
					</label>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'refresh_hour' ); ?>"><strong><?php _e( 'Check for new images every:', 'soledad' ); ?></strong>
						<input class="small-text" id="<?php echo $this->get_field_id( 'refresh_hour' ); ?>" name="<?php echo $this->get_field_name( 'refresh_hour' ); ?>" value="<?php echo $instance['refresh_hour']; ?>"/>
						<span><?php _e( 'hours', 'soledad' ); ?></span>
					</label>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'template' ); ?>"><strong><?php _e( 'Template', 'soledad' ); ?></strong>
						<select class="widefat" name="<?php echo $this->get_field_name( 'template' ); ?>" id="<?php echo $this->get_field_id( 'template' ); ?>">
							<option value="thumbs-no-border" <?php echo ($instance['template'] == 'thumbs-no-border') ? ' selected="selected"' : ''; ?>><?php _e( 'Thumbnails - Without Border', 'soledad' ); ?></option>
							<option value="thumbs" <?php echo ( $instance['template'] == 'thumbs' ) ? ' selected="selected"' : ''; ?>><?php _e( 'Thumbnails', 'soledad' ); ?></option>
							<option value="slider" <?php echo ( $instance['template'] == 'slider' ) ? ' selected="selected"' : ''; ?>><?php _e( 'Slider - Normal', 'soledad' ); ?></option>
							<option value="slider-overlay" <?php echo ( $instance['template'] == 'slider-overlay' ) ? ' selected="selected"' : ''; ?>><?php _e( 'Slider - Overlay Text', 'soledad' ); ?></option>
						</select>
					</label>
				</p>
				<p class="<?php if ( 'thumbs' != $instance['template'] && 'thumbs-no-border' != $instance['template'] ) {
					echo 'hidden';
				} ?>">
					<label for="<?php echo $this->get_field_id( 'columns' ); ?>"><strong><?php _e( 'Number of Columns:', 'soledad' ); ?></strong>
						<input class="small-text" id="<?php echo $this->get_field_id( 'columns' ); ?>" name="<?php echo $this->get_field_name( 'columns' ); ?>" value="<?php echo $instance['columns']; ?>"/>
						<span class='penci-description'><?php _e( 'max is 10 ( only for thumbnails template )', 'soledad' ); ?></span>
					</label>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><strong><?php _e( 'Order by', 'soledad' ); ?></strong>
						<select class="widefat" name="<?php echo $this->get_field_name( 'orderby' ); ?>" id="<?php echo $this->get_field_id( 'orderby' ); ?>">
							<option value="date-ASC" <?php selected( $instance['orderby'], 'date-ASC', true ); ?>><?php _e( 'Date - Ascending', 'soledad' ); ?></option>
							<option value="date-DESC" <?php selected( $instance['orderby'], 'date-DESC', true ); ?>><?php _e( 'Date - Descending', 'soledad' ); ?></option>
							<option value="popular-ASC" <?php selected( $instance['orderby'], 'popular-ASC', true ); ?>><?php _e( 'Popularity - Ascending', 'soledad' ); ?></option>
							<option value="popular-DESC" <?php selected( $instance['orderby'], 'popular-DESC', true ); ?>><?php _e( 'Popularity - Descending', 'soledad' ); ?></option>
							<option value="rand" <?php selected( $instance['orderby'], 'rand', true ); ?>><?php _e( 'Random', 'soledad' ); ?></option>
						</select>
					</label>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'images_link' ); ?>"><strong><?php _e( 'Link to', 'soledad' ); ?></strong>
						<select class="widefat" name="<?php echo $this->get_field_name( 'images_link' ); ?>" id="<?php echo $this->get_field_id( 'images_link' ); ?>">
							<option value="image_url" <?php selected( $instance['images_link'], 'image_url', true ); ?>><?php _e( 'Instagram Image', 'soledad' ); ?></option>
							<option class="<?php if ( 'hashtag' == $instance['search_for'] ) {
								echo 'hidden';
							} ?>" value="user_url" <?php selected( $instance['images_link'], 'user_url', true ); ?>><?php _e( 'Instagram Profile', 'soledad' ); ?></option>
							<option class="<?php if ( ( ! $instance['attachment'] ) || 'hashtag' == $instance['search_for'] ) {
								echo 'hidden';
							} ?>" value="attachment" <?php selected( $instance['images_link'], 'attachment', true ); ?>><?php _e( 'Attachment Page', 'soledad' ); ?></option>
							<option value="none" <?php selected( $instance['images_link'], 'none', true ); ?>><?php _e( 'None', 'soledad' ); ?></option>
						</select>
					</label>
				</p>
				<p class="<?php if ( 'custom_url' != $instance['images_link'] ) {
					echo 'hidden';
				} ?>">
					<label for="<?php echo $this->get_field_id( 'custom_url' ); ?>"><?php _e( 'Custom link:', 'soledad' ); ?></label>
					<input class="widefat" id="<?php echo $this->get_field_id( 'custom_url' ); ?>" name="<?php echo $this->get_field_name( 'custom_url' ); ?>" value="<?php echo $instance['custom_url']; ?>"/>
					<span><?php _e( '* use this field only if the above option is set to <strong>Custom Link</strong>', 'soledad' ); ?></span>
				</p>
				<div class="penci-advanced-input">
					<div class="penci-slider-options <?php if ( 'thumbs' == $instance['template'] || 'thumbs-no-border' == $instance['template'] ) {
						echo 'hidden';
					} ?>">
						<h4 class="penci-advanced-title"><?php _e( 'Advanced Slider Options', 'soledad' ); ?></h4>
						<p>
							<?php _e( 'Slider Navigation Controls:', 'soledad' ); ?><br>
							<label class="penci-radio"><input type="radio" id="<?php echo $this->get_field_id( 'controls' ); ?>" name="<?php echo $this->get_field_name( 'controls' ); ?>" value="prev_next" <?php checked( 'prev_next', $instance['controls'] ); ?> /> <?php _e( 'Prev & Next', 'soledad' ); ?></label>
							<label class="penci-radio"><input type="radio" id="<?php echo $this->get_field_id( 'controls' ); ?>" name="<?php echo $this->get_field_name( 'controls' ); ?>" value="numberless" <?php checked( 'numberless', $instance['controls'] ); ?> /> <?php _e( 'Dotted', 'soledad' ); ?></label>
							<label class="penci-radio"><input type="radio" id="<?php echo $this->get_field_id( 'controls' ); ?>" name="<?php echo $this->get_field_name( 'controls' ); ?>" value="none" <?php checked( 'none', $instance['controls'] ); ?> /> <?php _e( 'No Navigation', 'soledad' ); ?></label>
						</p>
						<p>
							<label for="<?php echo $this->get_field_id( 'caption_words' ); ?>"><?php _e( 'Number of words in caption:', 'soledad' ); ?>
								<input class="small-text" id="<?php echo $this->get_field_id( 'caption_words' ); ?>" name="<?php echo $this->get_field_name( 'caption_words' ); ?>" value="<?php echo $instance['caption_words']; ?>"/>
							</label>
						</p>
						<p>
							<label for="<?php echo $this->get_field_id( 'slidespeed' ); ?>"><?php _e( 'Slide Speed:', 'soledad' ); ?>
								<input class="small-text" id="<?php echo $this->get_field_id( 'slidespeed' ); ?>" name="<?php echo $this->get_field_name( 'slidespeed' ); ?>" value="<?php echo $instance['slidespeed']; ?>"/>
								<span><?php _e( 'milliseconds', 'soledad' ); ?></span>
								<span class='penci-description'><?php _e( '1000 milliseconds = 1 second', 'soledad' ); ?></span>
							</label>
						</p>
						<p>
							<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e( 'Slider Text Description:', 'soledad' ); ?></label>
							<select size=3 class='widefat' id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>[]" multiple="multiple">
								<option class="<?php if ( 'hashtag' == $instance['search_for'] ) echo 'hidden'; ?>" value='username' <?php $this->selected( $instance['description'], 'username' ); ?>><?php _e( 'Username', 'soledad'); ?></option>
								<option value='time'<?php $this->selected( $instance['description'], 'time' ); ?>><?php _e( 'Time', 'soledad'); ?></option>
								<option value='caption'<?php $this->selected( $instance['description'], 'caption' ); ?>><?php _e( 'Caption', 'soledad'); ?></option>
							</select>
							<span class="jr-description"><?php _e( 'Hold ctrl and click the fields you want to show/hide on your slider. Leave all unselected to hide them all. Default all selected.', 'soledad') ?></span>
						</p>
					</div>
				</div>
			</div>
			<?php
		}

		public function selected( $haystack, $current ) {

			if( is_array( $haystack ) && in_array( $current, $haystack ) ) {
				selected( 1, 1, true );
			}
		}
	}
}
?>