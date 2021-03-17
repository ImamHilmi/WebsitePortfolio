<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Penci_Social_Counter' ) ):
	class Penci_Social_Counter{

		static $list_socials = array(
			'facebook'      => 'Facebook',
			'twitter'       => 'Twitter',
			'youtube'       => 'Youtube',
			'instagram'     => 'Instagram',
			'linkedin'      => 'Linkedin',
			'pinterest'     => 'Pinterest',
			'flickr'        => 'Flickr',
			'dribbble'      => 'Dribbble',
			'vimeo'         => 'Vimeo',
			'delicious'     => 'Delicious',
			'soundcloud'    => 'Soundcloud',
			'github'        => 'Github',
			'behance'       => 'Behance',
			'vk'            => 'VKontakte',
			'tumblr'        => 'Tumblr',
			'vine'          => 'Vine',
			'steam'         => 'Steam'
		);

		public  function __construct(){

			add_filter( 'mb_settings_pages', array( $this, 'settings_pages' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'facebook_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'twitter_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'youtube_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'instagram_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'linkedin_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'pinterest_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'flickr_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'dribbble_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'vimeo_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'delicious_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'soundcloud_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'github_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'behance_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'vk_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'tumblr_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'vine_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'steam_option' ) );
		}

		function settings_pages( $settings_pages ) {
			$list_social_media = Penci_Social_Counter::$list_socials;

			$settings_pages[] = array(
				'id'          => 'penci_social_counter_settings',
				'option_name' => 'penci_social_counter_settings',
				'menu_title'  => 'Social Counter',
				'parent'      => 'soledad_dashboard_welcome',
				'style'       => 'no-boxes',
				'tab_style' => 'default',
				'columns'     => 1,
				'tabs'        =>  $list_social_media
			);
			return $settings_pages;
		}

		function facebook_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'facebook',
				'title'          => 'facebook',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'facebook',

				'fields' => array(
					array(
						'id' => 'facebook_id',
						'type' => 'text',
						'name' => esc_html__( 'Facebook id', 'soledad' ),
						'desc' => esc_html__( 'Please enter the page ID or page name', 'soledad' ),
					),
					array(
						'id' => 'facebook_token',
						'type' => 'text',
						'name' => esc_html__( 'Access Token Key', 'soledad' ),
						'desc' => 'Please go to <a href="https://smashballoon.com/custom-facebook-feed/access-token/" target="_blank">https://smashballoon.com/custom-facebook-feed/access-token/</a> and check this giude and get the access token ID'
					),
					array(
						'id' => 'facebook_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'Facebook', 'soledad' ),
					),
					array(
						'id' => 'facebook_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'soledad' ),
						'std' => 0,
					),
					array(
						'id' => 'facebook_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Custom "Fans" text', 'soledad' ),
						'std' => esc_html__( 'Fans', 'soledad' ),
					),
					array(
						'id' => 'facebook_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Like', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}

		function vimeo_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'vimeo',
				'title'          => 'vimeo',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'vimeo',

				'fields' => array(
					array(
						'id' => 'vimeo_username',
						'type' => 'text',
						'name' => esc_html__( 'Vimeo Username', 'soledad' )
					),
					array(
						'id' => 'vimeo_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'Vimeo', 'soledad' ),
					),
					array(
						'id' => 'vimeo_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'soledad' ),
						'std' => 0,
					),
					array(
						'id' => 'vimeo_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Custom "Subscribers" text', 'soledad' ),
						'std' => esc_html__( 'Subscribers', 'soledad' ),
					),
					array(
						'id' => 'vimeo_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Subscribe', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}

		function youtube_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'youtube',
				'title'          => 'youtube',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'youtube',

				'fields' => array(
					array(
						'id' => 'youtube_username',
						'type' => 'text',
						'name' => esc_html__( 'Youtube Channel ID or Username', 'soledad' )
					),
					array(
						'id' => 'youtube_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'Youtube', 'soledad' ),
					),
					array(
						'id' => 'youtube_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'soledad' ),
						'std' => 0,
					),
					array(
						'id' => 'youtube_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'soledad' ),
						'std' => esc_html__( 'Subscribers', 'soledad' ),
					),
					array(
						'id' => 'youtube_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Subscribe', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}

		function soundcloud_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'soundcloud',
				'title'          => 'soundcloud',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'soundcloud',
				'fields' => array(
					array(
						'id' => 'soundcloud_username',
						'type' => 'text',
						'name' => esc_html__( 'SoundCloud UserName', 'soledad' )
					),
					array(
						'id' => 'soundcloud_apikey',
						'type' => 'text',
						'name' => esc_html__( 'API Key', 'soledad' )
					),
					array(
						'id' => 'soundcloud_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'SoundCloud', 'soledad' ),
					),
					array(
						'id' => 'soundcloud_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'soledad' ),
						'std' => 0,
					),
					array(
						'id' => 'soundcloud_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'soledad' ),
						'std' => esc_html__( 'Followers', 'soledad' ),
					),
					array(
						'id' => 'soundcloud_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Follow Us', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}

		function twitter_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'twitter',
				'title'          => 'twitter',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'twitter',

				'fields' => array(
					array(
						'id' => 'twitter_username',
						'type' => 'text',
						'name' => esc_html__( 'Twitter Username', 'soledad' )
					),
					array(
						'id' => 'twitter_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'Twitter', 'soledad' ),
					),
					array(
						'id' => 'twitter_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'soledad' ),
						'std' => 0,
					),
					array(
						'id' => 'twitter_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'soledad' ),
						'std' => esc_html__( 'Followers', 'soledad' ),
					),
					array(
						'id' => 'twitter_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Follow Us', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}

		function instagram_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'instagram',
				'title'          => 'instagram',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'instagram',

				'fields' => array(
					array(
						'id' => 'instagram_username',
						'type' => 'text',
						'name' => esc_html__( 'Instagram UserName', 'soledad' )
					),array(
						'id' => 'instagram_token',
						'type' => 'text',
						'name' => esc_html__( 'Instagram Access Token', 'soledad' ),
						'desc' => 'Please enter the instagram Access Token.You can get this information from <a href="http://pencidesign.com/penci_instagram/" target="_blank">http://pencidesign.com/penci_instagram/</a>'

					),
					array(
						'id' => 'instagram_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'Instagram', 'soledad' ),
					),
					array(
						'id' => 'instagram_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'soledad' ),
						'std' => 0,
					),
					array(
						'id' => 'instagram_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'soledad' ),
						'std' => esc_html__( 'Followers', 'soledad' ),
					),
					array(
						'id' => 'instagram_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Follow Us', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}

		function linkedin_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'linkedin',
				'title'          => 'linkedin',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'linkedin',

				'fields' => array(
					array(
						'id' => 'linkedin_url',
						'type' => 'text',
						'name' => esc_html__( 'Linkedin url', 'soledad' )
					),
					array(
						'id' => 'linkedin_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'Linkedin', 'soledad' ),
					),
					array(
						'id' => 'linkedin_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'soledad' ),
						'std' => esc_html__( 'Follow', 'soledad' ),
					),
					array(
						'id' => 'linkedin_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Follow Us', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}

		function pinterest_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'pinterest',
				'title'          => 'pinterest',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'pinterest',

				'fields' => array(
					array(
						'id' => 'pinterest_userid',
						'type' => 'text',
						'name' => esc_html__( 'Pinterest UserName', 'soledad' )
					),
					array(
						'id' => 'pinterest_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'Pinterest', 'soledad' ),
					),
					array(
						'id' => 'pinterest_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'soledad' ),
						'std' => 0,
					),
					array(
						'id' => 'pinterest_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'soledad' ),
						'std' => esc_html__( 'Followers', 'soledad' ),
					),
					array(
						'id' => 'pinterest_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Follow Us', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}

		function flickr_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'flickr',
				'title'          => 'flickr',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'flickr',

				'fields' => array(
					array(
						'id'   => 'flickr_url',
						'type' => 'text',
						'name' => esc_html__( 'Flickr url', 'soledad' )
					),
					array(
						'id'   => 'flickr_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std'  => esc_html__( 'Flickr', 'soledad' ),
					),
					array(
						'id'   => 'flickr_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'soledad' ),
						'std'  => 0,
					),
					array(
						'id'   => 'flickr_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'soledad' ),
						'std'  => esc_html__( 'Followers', 'soledad' ),
					),
					array(
						'id'   => 'flickr_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std'  => esc_html__( 'Follow Us', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}

		function dribbble_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'dribbble',
				'title'          => 'dribbble',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'dribbble',

				'fields' => array(
					array(
						'id' => 'dribbble_username',
						'type' => 'text',
						'name' => esc_html__( 'Dribbble UserName', 'soledad' )
					),array(
						'id' => 'dribbble_token',
						'type' => 'text',
						'name' => esc_html__( 'Access Token Key', 'soledad' )
					),
					array(
						'id' => 'dribbble_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'Dribbble', 'soledad' ),
					),
					array(
						'id' => 'dribbble_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'soledad' ),
						'std' => 0,
					),
					array(
						'id' => 'dribbble_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'soledad' ),
						'std' => esc_html__( 'Followers', 'soledad' ),
					),
					array(
						'id' => 'dribbble_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Follow Us', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}

		function delicious_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'delicious',
				'title'          => 'delicious',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'delicious',

				'fields' => array(
					array(
						'id' => 'delicious_username',
						'type' => 'text',
						'name' => esc_html__( 'Delicious UserName', 'soledad' )
					),
					array(
						'id' => 'delicious_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'Delicious', 'soledad' ),
					),
					array(
						'id' => 'delicious_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'soledad' ),
						'std' => 0,
					),
					array(
						'id' => 'delicious_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'soledad' ),
						'std' => esc_html__( 'Followers', 'soledad' ),
					),
					array(
						'id' => 'delicious_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Follow Us', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}

		function github_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'github',
				'title'          => 'github',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'github',

				'fields' => array(
					array(
						'id' => 'github_username',
						'type' => 'text',
						'name' => esc_html__( 'Github UserName', 'soledad' )
					),
					array(
						'id' => 'github_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'Github', 'soledad' ),
					),
					array(
						'id' => 'github_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'soledad' ),
						'std' => 0,
					),
					array(
						'id' => 'github_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'soledad' ),
						'std' => esc_html__( 'Followers', 'soledad' ),
					),
					array(
						'id' => 'github_text_join',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Follow Us', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}
		function behance_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'behance',
				'title'          => 'behance',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'behance',

				'fields' => array(
					array(
						'id' => 'behance_username',
						'type' => 'text',
						'name' => esc_html__( 'Behance UserName', 'soledad' )
					),
					array(
						'id' => 'behance_api',
						'type' => 'text',
						'name' => esc_html__( 'Behance Api Key', 'soledad' )
					),
					array(
						'id' => 'behance_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'Behance', 'soledad' ),
					),
					array(
						'id' => 'behance_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'soledad' ),
						'std' => 0,
					),
					array(
						'id' => 'behance_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'soledad' ),
						'std' => esc_html__( 'Followers', 'soledad' ),
					),
					array(
						'id' => 'behance_text_join',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Follow Us', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}
		function vk_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'vk',
				'title'          => 'vk',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'vk',

				'fields' => array(
					array(
						'id' => 'vk_username',
						'type' => 'text',
						'name' => esc_html__( 'VK Community ID/Name', 'soledad' )
					),
					array(
						'id' => 'vk_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'VK', 'soledad' ),
					),
					array(
						'id' => 'vk_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'soledad' ),
						'std' => 0,
					),
					array(
						'id' => 'vk_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'soledad' ),
						'std' => esc_html__( 'Followers', 'soledad' ),
					),
					array(
						'id' => 'vk_text_join',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Follow Us', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}
		function tumblr_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'tumblr',
				'title'          => 'tumblr',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'tumblr',
				'fields' => array(
					array(
						'id' => 'tumblr_username',
						'type' => 'text',
						'name' => esc_html__( 'Blog Link', 'soledad' )
					),
					array(
						'id' => 'tumblr_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'Tumblr', 'soledad' ),
					),
					array(
						'id' => 'tumblr_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Custom "Subscribers" text', 'soledad' ),
						'std' => esc_html__( 'Subscribers', 'soledad' ),
					),
					array(
						'id' => 'elrk_ssc_tumblr_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Subscribe', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}
		function vine_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'vine',
				'title'          => 'vine',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'vine',

				'fields' => array(
					array(
						'id' => 'vine_username',
						'type' => 'text',
						'name' => esc_html__( 'Vine Profile URL', 'soledad' )
					),
					array(
						'id' => 'vine_email',
						'type' => 'text',
						'name' => esc_html__( 'Account Email', 'soledad' )
					),
					array(
						'id' => 'vine_pass',
						'type' => 'text',
						'name' => esc_html__( 'Account Password', 'soledad' )
					),
					array(
						'id' => 'vine_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'Vine', 'soledad' ),
					),
					array(
						'id' => 'vine_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'soledad' ),
						'std' => 0,
					),
					array(
						'id' => 'vine_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'soledad' ),
						'std' => esc_html__( 'Followers', 'soledad' ),
					),
					array(
						'id' => 'vine_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Follow Us', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}
		function steam_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'steam',
				'title'          => 'steam',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'steam',

				'fields' => array(
					array(
						'id' => 'steam_link',
						'type' => 'text',
						'name' => esc_html__( 'Telegram Link', 'soledad' )
					),
					array(
						'id' => 'steam_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'soledad' ),
						'std' => esc_html__( 'Telegram', 'soledad' ),
					),
					array(
						'id' => 'steam_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'soledad' ),
						'std' => 0,
					),
					array(
						'id' => 'steam_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Custom "Friends" text', 'soledad' ),
						'std' => esc_html__( 'Friends', 'soledad' ),
					),
					array(
						'id' => 'steam_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'soledad' ),
						'std' => esc_html__( 'Chat', 'soledad' ),
					),
				),
			);

			return $meta_boxes;
		}
	}
	new Penci_Social_Counter;
endif;