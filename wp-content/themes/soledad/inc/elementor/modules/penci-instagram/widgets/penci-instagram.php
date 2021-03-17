<?php
namespace PenciSoledadElementor\Modules\PenciInstagram\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciInstagram extends Base_Widget {

	public function get_name() {
		return 'penci-instagram';
	}

	public function get_title() {
		return esc_html__( 'Penci Instagram Feed', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-image';
	}

	public function get_keywords() {
		return array( 'facebook', 'social', 'embed', 'page' );
	}

	/**
	 * Retrieve the list of scripts the image carousel widget depended on.
	 */
	public function get_script_depends() {
		return array( 'penci-facebook-js' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		// Section layout
		$this->start_controls_section(
			'section_instagram', array(
				'label' => esc_html__( 'Instagram Options', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'search_for', array(
				'label'   => __( 'Search instagram for', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'username',
				'options' => array(
					'username' => esc_html__( 'Username', 'soledad' ),
					'hashtag'  => esc_html__( 'Hashtag', 'soledad' ),
				)
			)
		);
		$this->add_control(
			'username',
			array(
				'label'       => __( 'Username', 'soledad' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'label_block' => true,
				'condition' => array( 'search_for' => 'username' ),
			)
		);
		$this->add_control(
			'access_token',
			array(
				'label'       => __( 'Instagram Access Token:', 'soledad' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'label_block' => true,
				'condition' => array( 'search_for' => 'username' ),
				'description' => 'Please fill the Instagram Access Token here. You can get Instagram Access Token via <a href="http://pencidesign.com/penci_instagram/" target="_blank">http://pencidesign.com/penci_instagram/</a>',
			)
		);
		$this->add_control(
			'insta_user_id',
			array(
				'label'       => __( 'Instagram User ID:', 'soledad' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'label_block' => true,
				'condition' => array( 'search_for' => 'username' ),
				'description' => 'Please enter the User ID for this Profile ( Eg: 123456789987654321 ).  You can get User ID via <a href="http://pencidesign.com/penci_instagram/" target="_blank">http://pencidesign.com/penci_instagram/</a>',
			)
		);
		$this->add_control(
			'hashtag',
			array(
				'label'       => __( 'Hashtag', 'soledad' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'label_block' => true,
				'description' => 'without # sign',
				'condition' => array( 'search_for' => 'hashtag' ),
			)
		);
		$this->add_control(
			'blocked_users',
			array(
				'label'       => __( 'Block Users', 'soledad' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'label_block' => true,
				'condition' => array( 'search_for' => 'hashtag' ),
				'description' => 'Enter usernames separated by commas whose images you don\'t want to show',

			)
		);

		$this->add_control(
			'images_number', array(
				'label'       => __( 'Number of images to show', 'soledad' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 9,
				'separator'   => 'before',
				'description' => __( 'You can shows 12 latest images from a public Instagram user( maximum 12 )', 'soledad' ),
			)
		);
		$this->add_control(
			'refresh_hour', array(
				'label'     => __( 'Check for new images every', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 5,
				'description' => __( 'Unix is hour(s)', 'soledad' ),
			)
		);
		$this->add_control(
			'template', array(
				'label'   => __( 'Style', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'thumbs',
				'options' => array(
					'thumbs-no-border' => esc_html__( 'Thumbnails - Without Border', 'soledad' ),
					'thumbs'           => esc_html__( 'Thumbnails', 'soledad' ),
					'slider'           => esc_html__( 'Slider - Normal', 'soledad' ),
					'slider-overlay'   => esc_html__( 'Slider - Overlay Text', 'soledad' ),
				)
			)
		);

		$this->add_control(
			'columns', array(
				'label'     => __( 'Number of Columns', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '3',
				'options'   => array(
					'1'  => '1',
					'2'  => '2',
					'3'  => '3',
					'4'  => '4',
					'5'  => '5',
					'6'  => '6',
					'7'  => '7',
					'8'  => '8',
					'9'  => '9',
					'10' => '10',
				),
				'condition' => array( 'template' => array( 'thumbs-no-border', 'thumbs' ) ),
			)
		);
		$this->add_control(
			'orderby', array(
				'label'   => __( 'Order by', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'rand',
				'options' => array(
					'date-ASC'     => __( 'Date - Ascending', 'soledad' ),
					'date-DESC'    => __( 'Date - Descending', 'soledad' ),
					'popular-ASC'  => __( 'Popularity - Ascending', 'soledad' ),
					'popular-DESC' => __( 'Popularity - Descending', 'soledad' ),
					'rand'         => __( 'Random', 'soledad' ),
				)
			)
		);
		$this->add_control(
			'images_link', array(
				'label'   => __( 'On click action', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'image_url',
				'options' => array(
					''           => __( 'None', 'soledad' ),
					'image_url'  => __( 'Instagram image', 'soledad' ),
					'user_url'   => __( 'Instagram Profile', 'soledad' ),
					'attachment' => __( 'Attachment Page', 'soledad' ),
				)
			)
		);
		$this->add_control(
			'description', array(
				'label'       => __( 'Slider Text Description', 'soledad' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'default'     => array( 'username', 'time', 'caption' ),
				'multiple'    => true,
				'options'     => array(
					'username' => __( 'Username', 'soledad' ),
					'time'     => __( 'Time', 'soledad' ),
					'caption'  => __( 'Caption', 'soledad' ),
				),
				'condition' => array( 'template' => array( 'slider','slider-overlay' ) ),
			)
		);
		$this->add_control(
			'slidespeed', array(
				'label'     => __( 'Slider Speed (at x seconds)', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 600,
				'condition' => array( 'template' => array( 'slider','slider-overlay' ) ),
			)
		);

		$this->add_control(
			'controls', array(
				'label'   => __( 'Slider Navigation Controls', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'prev_next',
				'options' => array(
					'none'           => __( 'None', 'soledad' ),
					'prev_next'  => __( 'Prev & Next', 'soledad' ),
					'numberless'   => __( 'Dotted', 'soledad' ),
				)
			)
		);
		$this->add_control(
			'caption_words', array(
				'label'     => __( 'Number of words in caption', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 100,
				'condition' => array( 'template' => array( 'slider','slider-overlay' ) ),
			)
		);

		$this->end_controls_section();
		
		$this->register_block_title_section_controls();
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		$instance_df = array(
			'title'            => '',
			'access_token'     => '',
			'insta_user_id'     => '',
			'search_for'       => 'username',
			'username'         => '',
			'hashtag'          => '',
			'blocked_users'    => '',
			'attachment'       => 0,
			'template'         => 'thumbs',
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

		$instance = shortcode_atts( $instance_df, $settings );

		$css_class = 'penci-block-vc penci_instagram_widget-sc penci_instagram_widget penci_insta-' .  $instance['template'];
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="penci-block_content">
				<?php \Penci_Instagram_Feed::display_images( $instance ); ?>
			</div>
		</div>
		<?php
	}
}
