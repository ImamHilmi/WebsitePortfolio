<?php
/**
 * Register one click import demo data
 */


add_filter( 'penci_soledad_demo_packages', 'penci_soledad_addons_import_register' );

function penci_soledad_addons_import_register() {
	$demo_listing = array(
		'default' => 'Default',
		'adventure-blog' => 'Adventure Blog',
		'animal-news' => 'Animal News',
		'architecture' => 'Architecture',
		'art-artist-blog' => 'Art Artist Blog',
		'art-magazine' => 'Art Magazine',
		'baby' => 'Baby',
		'beauty' => 'Beauty',
		'beauty-blog2' => 'Beauty Blog 2',
		'bitcoin-news' => 'Bitcoin News',
		'book' => 'Book',
		'breaking-news' => 'Breaking News',
		'business-magazine' => 'Business Magazine',
		'business-news' => 'Business News',
		'cars' => 'Cars',
		'charity' => 'Charity',
		'classic' => 'Classic',
		'coffee-blog' => 'Coffee Blog',
		'construction' => 'Construction',
		'cosmetic-blog' => 'Cosmetic Blog',
		'craft-diy-blog2' => 'Craft DIY Blog 2',
		'craft-diy' => 'Craft Diy',
		'dark-version' => 'Dark Version',
		'designers-blog' => 'Designers Blog',
		'education-news' => 'Education News',
		'elegant-blog' => 'Elegant Blog',
		'entertainment' => 'Entertainment',
		'environment-charity-blog' => 'Environment Charity Blog',
		'factory-news' => 'Factory News',
		'fashion-blog2' => 'Fashion Blog 2',
		'fashion-lifestyle' => 'Fashion Lifestyle',
		'fashion-magazine' => 'Fashion Magazine',
		'fashion-magazine2' => 'Fashion Magazine 2',
		'fitness' => 'Fitness',
		'fitness-blog' => 'Fitness Blog',
		'food' => 'Food',
		'food-blog2' => 'Food Blog 2',
		'food-news' => 'Food News',
		'gardening-blog' => 'Gardening Blog',
		'gardening-magazine' => 'Gardening Magazine',
		'game' => 'Game',
		'game-blog' => 'Game Blog',
		'hair-stylist-blog' => 'Hair Stylist Blog',
		'hair-style-magazine' => 'Hair Style Magazine',
		'health-medical' => 'Health Medical',
		'healthy-clean-eating-blog' => 'Healthy Clean Eating Blog',
		'hipster' => 'Hipster',
		'interior-design-blog' => 'Interior Design Blog',
		'interior-design-magazine' => 'Interior Design Magazine',
		'lawyers-blog' => 'Lawyears Blog',
		'magazine' => 'Magazine',
		'men-health-magazine' => 'Men Health Magazine',
		'minimal-simple-magazine' => 'Minimal Simple Magazine',
		'movie' => 'Movie',
		'old-fashioned-blog' => 'Old Fashioned Blog',
		'pet' => 'Pet',
		'pet-blog' => 'Pet Blog',
		'photographer' => 'Photographer',
		'photography-blog' => 'Photography Blog',
		'photography-magazine' => 'Photography Magazine',
		'radio-blog' => 'Radio Blog',
		'seo-blog' => 'SEO Blog',
		'science-news' => 'Science News',
		'seo-magazine' => 'Seo Magazine',
		'simple' => 'Simple',
		'spa-blog' => 'Spa Blog',
		'sport' => 'Sport',
		'sport-2' => 'Sport 2',
		'stylist-blog' => 'Stylist Blog',
		'tech-news' => 'Tech News',
		'technology' => 'Technology',
		'technology-blog2' => 'Technology Blog 2',
		'time-magazine' => 'Time Magazine',
		'travel' => 'Travel',
		'travel-blog2' => 'Travel Blog 2',
		'travel-blog3' => 'Travel Blog 3',
		'travel-guide-magazine' => 'Travel Guide Magazine',
		'travel-magazine' => 'Travel Magazine',
		'vegan-magazine' => 'Vegan Magazine',
		'video' => 'Video',
		'video-dark' => 'Video Dark',
		'videos-blog' => 'Videos Blog',
		'vintage-blog' => 'Vintage Blog',
		'viral' => 'Viral',
		'wedding' => 'Wedding',
		'music' => 'Music',
		'beauty-blog3' => 'Beauty Blog 3',
		'book-magazine' => 'Book Magazine',
		'car-blog' => 'Car Blog',
		'coding-blog' => 'Coding Blog',
		'colorful-magazine' => 'Clorfull Magazine',
		'dentist-blog' => 'Dentist Blog',
		'design-magazine' => 'Design Magazine',
		'fashion-blog3' => 'Fashion Blog 3',
		'freelancer-blog' => 'Freelancer Blog',
		'game-magazine' => 'Game Magazine',
		'handmade-blog' => 'Handmade Blog',
		'ios-tips-mag' => 'IOS Tips Magazine',
		'motorcycle-blog' => 'Motorcycle Blog',
		'musicband-blog' => 'Musicband Blog',
		'painter-blog' => 'Painter Blog',
		'software-tips-blog' => 'Software Tips Blog',
		'transport-blog' => 'Transport Blog',
		'vertical-nav' => 'Vertical Nav',
		'vertical-nav-dark' => 'Vertical Nav Dark',
		'video-blog2' => 'Video Blog 2',


		'01-lifestyle-news-2sb'        => 'Lifestyle News Two Sidebars',
		'02-travel-news-2sb'           => 'Travel News Two Sidebars',
		'03-fashion-news-2sb'          => 'Fashion News Two Sidebars',
		'04-food-news-2sb'             => 'Food News Two Sidebars',
		'05-game-news-2sb'             => 'Game News Two Sidebars',
		'06-fitness-news-2sb'          => 'Fitness News Two Sidebars',
		'07-beauty-cosmetics-news-2sb' => 'Beauty & Cosmetics News',
		'08-travel-agency-mul'         => 'Travel Agency',
		'09-spa-wellness-mul'          => 'Spa & Wellness Center ',
		'10-business-mul'              => 'Business',
		'11-restaurant-mul'            => 'Restaurant',
		'12-fitness-center-mul'        => 'Fitness Center',
		'13-barber-shop-mul'           => 'Barber Shop',
		'14-ceramics-art-mul'          => 'Ceramics Art',
		'15-fashion-stylist-mul'       => 'Fashion Stylist',
		'16-construction-business-mul' => 'Construction Business',
		'17-coffee-shop-mul'           => 'Coffee Shop',
		'18-web-studio-mul'            => 'Web Studio',
		'19-wedding-studio-mul'        => 'Wedding Studio',
		'20-tailor-shop-mul'           => 'Tailor Shop ',
		'21-catering-business-mul'     => 'Catering Business',
		'22-yoga-studio-mul'           => 'Yoga Studio',
		'23-bakery-mul'                => 'Bakery',
		'24-tattoo-studio-mul'         => 'Tattoo Studio',
		'25-run-club-mutl'             => 'Run Club',
		'26-pet-clinic-mul'            => 'Pet Clinic',
		'27-honey-business-mul'        => 'Honey Business',
		'28-makeup-artist-mul'         => 'Makeup Artist',
		'29-insurance-mul'          => 'Insurance',
		'30-pizza-shop-mul'         => 'Pizza Shop',
		'31-law-firm-mul'           => 'Law Firm',
		'32-nail-salon-mul'         => 'Nail Salon',
		'33-zoo-mul'                => 'Zoo',
		'34-finance-consulting-mul' => 'Finance Consulting',
		'35-hosting-provider-mul'   => 'Hosting Provider',
		'36-wedding-planner-mul'    => 'Wedding Planner',
		'37-garden-design-mul'      => 'Garden Design',
		'38-car-wash-business-mul'  => 'Car Wash Business',
		'39-call-center-mul'        => 'Call Center',
		'40-chocolate-business-mul' => 'Chocolate Business',
		'41-video-production-mul'   => 'Video Production',
		'42-interior-design-mul'    => 'Interior Design',
		'43-beauty-salon-mul'       => 'Beauty Salon',
		'44-herbal-tea-mul'         => 'Herbal Tea',
		'45-logistics-business-mul' => 'Logistics Business',
		'46-luxury-resort-mul'      => 'Luxury Resort',
		'47-kindergarten-mul'       => 'Kindergarten',
		'48-dairy-farm-mul'         => 'Dairy Farm',
		'49-burger-shop-mul'        => 'Burger Shop',
		'50-florist-mul'            => 'Florist',
		'51-clean-energy-mul'       => 'Clean Energy',
		'52-delivery-service-mul'   => 'Delivery Service',
		'53-wine-company-mul'       => 'Wine Company',

		'54-cocktail-bar-mul'        => 'Cocktail Bar',
		'55-hospital-mul'            => 'Hospital',
		'56-dental-clinic-mul'       => 'Dental Clinic',
		'57-software-development'    => 'Software Development',
		'58-craft-beer-business-mul' => 'Craft Beer Business',
		'59-cooking-class-mul'       => 'Cooking Class',
		'60-moving-service-mul'      => 'Moving Service',
		'61-steak-house-mul'         => 'Steak House',
		'62-golf-club-mul'           => 'Golf Club',
		'63-ice-cream-mul'           => 'Ice Cream',
		'64-personal-trainer-mul'    => 'Personal Trainer',
		'65-real-estate'             => 'Real Estate',
		'66-dance-studio-mul'        => 'Dance School',
		'67-fisher-business-mul'     => 'Fisher Business',
		'68-ads-agency-mul'          => 'Ads Agency',
		'69-freelance-writer-mul'    => 'Freelance Writer',
		'70-human-resources-mul'     => 'Human Resources',
		'71-health-coach-mul'        => 'Health Coach',
		'72-cleaning-service-mul'    => 'Cleaning Service',
		'73-game-demo-mul'           => 'Game Demo',
		'74-production-house-mul'    => 'Production House',
		'75-headphones-company-mul'  => 'Headphones Company',
		'76-fashion-designer-mul'    => 'Fashion Designer',
		'77-seo-company-mul'         => 'SEO Company',
		'78-music-band-mul'          => 'Music Band',
		'79-taxi-company-mul'        => 'Taxi Company',
		'80-fitness-band-mul'        => 'Fitness Band',
		'81-psychologist-mul'        => 'Psychologist',
		'82-watch-maker-mul'         => 'Watch Maker',
		'83-smarthome-system-mul'    => 'Smarthome System',
		'84-perfume-business-mul'    => 'Perfume Business',
		'85-digital-startup-mul'    => 'Digital Startup',
		
		'86-wedding-catering-mul' => 'Wedding Catering',
		'87-food-tour-travel-mul' => 'Food Tour Travel',
		'88-market-intelligence-firm-mul' => 'Market Intelligence Firm',
		'89-medical-consulting-business-mul' => 'Medical Consulting Business',
		'90-food-truck-mul' => 'Food Truck',
		'91-swimming-class-mul' => 'Swimming Class',
		'92-loan-business-mul' => 'Loan Business',
		'93-salad-club-business-mul' => 'Salad Club Business',
		'94-astrology-club-mul' => 'Astrology Club',
		'95-mechanics-business-mul' => 'Mechanics Shop',
		'96-it-service-mul' => 'IT Service Business',
		'97-seafood-restaurant-mul' => 'Seafood Restaurant',
		'98-city-delivery-service-mul' => 'City Delivery Service',
		'99-plastic-surgery-business-mul' => 'Plastic Surgery Business',
		'100-mobile-payment-mul' => 'Mobile Payment',
		'101-bubble-tea-shop-mul' => 'Bubble Tea Shop',
		'102-food-photography-studio-mul' => 'Food Photography Studio',
		'103-copywriters-business-mul' => 'Copywriters Business',
		'104-italian-restaurant-mul' => 'Italian Restaurant',
		'105-car-racing-mul' => 'Car Racing',
	);
	
	asort( $demo_listing );

	$new_demo_listing = penci_soledad_get_list_new_demo();
	
	$demo_configs = array();
	foreach ( $demo_listing as $key => $label ) {
		if( in_array( $key, $new_demo_listing ) ){
			$demo_configs[] = array(
				'id_demo'    => $key,
				'name'       => $label,
				'content'    => 'https://soledad-new-data.s3.amazonaws.com/' . $key . '/demo-content.xml',
				'widgets'    => 'https://soledad-new-data.s3.amazonaws.com/' . $key . '/widgets.wie',
				'preview'    => 'https://soledad-new-data.s3.amazonaws.com/' . $key . '/preview.jpg',
				'customizer' => 'https://soledad-new-data.s3.amazonaws.com/' . $key . '/customizer.dat',
				'menus'      => array( 'main-menu' => 'menu' ),
				'pages'      => array(
					'front_page' => 'Soledad_Home',
					'blog'       => '',
					'shop'       => 'Shop',
					'cart'       => 'Cart',
					'checkout'   => 'Checkout',
					'my_account' => 'My Account',
					'portfolio'  => 'Masonry 3 Columns',
				)
			);

			continue;
		}

		$config = array(
			'id_demo'    => $key,
			'name'       => $label,
			'content'    => 'https://soledad-datas.s3.amazonaws.com/'. $key .'/demo-content.xml',
			'widgets'    => 'https://soledad-datas.s3.amazonaws.com/'. $key .'/widgets.wie',
			'preview'    => 'https://soledad-datas.s3.amazonaws.com/'. $key .'/preview.jpg',
			'customizer' => 'https://soledad-datas.s3.amazonaws.com/'. $key .'/customizer.dat',
			'menus'      => array( 'main-menu'   => 'menu-1' ),
		);
		if ( $key == 'default' ) {
			$config['pages'] = array(
				'front_page' 		=> '',
				'blog'       		=> '',
				'shop'       		=> 'Shop',
				'cart'       		=> 'Cart',
				'checkout'   		=> 'Checkout',
				'my_account' 		=> 'My Account',
				'portfolio'  		=> 'Masonry 3 Columns',
			);
			$config['options'] = array(
				'shop_catalog_image_size'   => array(
					'width'  => 600,
					'height' => 732,
					'crop'   => 1,
				),
				'shop_single_image_size'    => array(
					'width'  => 600,
					'height' => 732,
					'crop'   => 1,
				),
				'shop_thumbnail_image_size' => array(
					'width'  => 150,
					'height' => 183,
					'crop'   => 1,
				),
			);
		}else {
			$config['pages'] = array(
				'front_page' 		=> '',
				'blog'       		=> '',
			);
			$config['options'] = array();
		}

		// Add menu
		if ( $key == 'magazine' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		} elseif ( $key == 'sport' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		} elseif ( $key == 'video' ) {
			$config['menus']['topbar-menu'] = 'topbar-menu';
		} elseif ( $key == 'game' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		} elseif ( $key == 'music' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		} elseif ( $key == 'health-medical' ) {
			$config['menus']['topbar-menu'] = 'topbar-menu';
		} elseif ( $key == 'cars' ) {
			$config['menus']['footer-menu'] = 'footer-menu';
		} elseif ( $key == 'wedding' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		} elseif ( $key == 'simple' ) {
			$config['menus']['topbar-menu'] = 'topbar-menu';
		} elseif ( $key == 'tech-news' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		} elseif ( $key == 'business-news' ) {
			$config['menus']['footer-menu'] = 'footer-menu';
		} elseif ( $key == 'fashion-magazine' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		} elseif ( $key == 'charity' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		}


		$demo_configs[] = $config;
	}
	return $demo_configs;
}

if ( ! function_exists( 'penci_soledad_get_list_new_demo' ) ):
	function penci_soledad_get_list_new_demo() {
		$new_demo_listing = array(
			'01-lifestyle-news-2sb',
			'02-travel-news-2sb',
			'03-fashion-news-2sb',
			'04-food-news-2sb',
			'05-game-news-2sb',
			'06-fitness-news-2sb',
			'07-beauty-cosmetics-news-2sb',
			'08-travel-agency-mul',
			'09-spa-wellness-mul',
			'10-business-mul',
			'11-restaurant-mul',
			'12-fitness-center-mul',
			'13-barber-shop-mul',
			'14-ceramics-art-mul',
			'15-fashion-stylist-mul',
			'16-construction-business-mul',
			'17-coffee-shop-mul',
			'18-web-studio-mul',
			'19-wedding-studio-mul',
			'20-tailor-shop-mul',
			'21-catering-business-mul',
			'22-yoga-studio-mul',
			'23-bakery-mul',
			'24-tattoo-studio-mul',
			'25-run-club-mutl',
			'26-pet-clinic-mul',
			'27-honey-business-mul',
			'28-makeup-artist-mul',
			'29-insurance-mul',
			'30-pizza-shop-mul',
			'31-law-firm-mul',
			'32-nail-salon-mul',
			'33-zoo-mul',
			'34-finance-consulting-mul',
			'35-hosting-provider-mul',
			'36-wedding-planner-mul',
			'37-garden-design-mul',
			'38-car-wash-business-mul',
			'39-call-center-mul',
			'40-chocolate-business-mul',
			'41-video-production-mul',
			'42-interior-design-mul',
			'43-beauty-salon-mul',
			'44-herbal-tea-mul',
			'45-logistics-business-mul',
			'46-luxury-resort-mul',
			'47-kindergarten-mul',
			'48-dairy-farm-mul',
			'49-burger-shop-mul',
			'50-florist-mul',
			'51-clean-energy-mul',
			'52-delivery-service-mul',
			'53-wine-company-mul',

			'54-cocktail-bar-mul',
			'55-hospital-mul',
			'56-dental-clinic-mul',
			'57-software-development',
			'58-craft-beer-business-mul',
			'59-cooking-class-mul',
			'60-moving-service-mul',
			'61-steak-house-mul',
			'62-golf-club-mul',
			'63-ice-cream-mul',
			'64-personal-trainer-mul',
			'65-real-estate',
			'66-dance-studio-mul',
			'67-fisher-business-mul',
			'68-ads-agency-mul',
			'69-freelance-writer-mul',
			'70-human-resources-mul',
			'71-health-coach-mul',
			'72-cleaning-service-mul',
			'73-game-demo-mul',
			'74-production-house-mul',
			'75-headphones-company-mul',
			'76-fashion-designer-mul',
			'77-seo-company-mul',
			'78-music-band-mul',
			'79-taxi-company-mul',
			'80-fitness-band-mul',
			'81-psychologist-mul',
			'82-watch-maker-mul',
			'83-smarthome-system-mul',
			'84-perfume-business-mul',
			'85-digital-startup-mul',
			
			'86-wedding-catering-mul',
			'87-food-tour-travel-mul',
			'88-market-intelligence-firm-mul',
			'89-medical-consulting-business-mul',
			'90-food-truck-mul',
			'91-swimming-class-mul',
			'92-loan-business-mul',
			'93-salad-club-business-mul',
			'94-astrology-club-mul',
			'95-mechanics-business-mul',
			'96-it-service-mul',
			'97-seafood-restaurant-mul',
			'98-city-delivery-service-mul',
			'99-plastic-surgery-business-mul',
			'100-mobile-payment-mul',
			'101-bubble-tea-shop-mul',
			'102-food-photography-studio-mul',
			'103-copywriters-business-mul',
			'104-italian-restaurant-mul',
			'105-car-racing-mul',
		);

		return $new_demo_listing;
	}
endif;

add_filter( 'penci_soledad_plugins_required', 'penci_soledad_plugins_required_register' );
if( ! function_exists( 'penci_soledad_plugins_required_register' ) ) {
	function penci_soledad_plugins_required_register(){
		return array(
			'vafpress-post-formats-ui-develop',
			'penci-shortcodes',
			'penci-soledad-slider',
			'penci-portfolio',
			'penci-recipe',
			'penci-review',
			'penci-soledad-demo-importer',
			'instagram-slider-widget',
			'oauth-twitter-feed-for-developers',
			'contact-form-7',
			'mailchimp-for-wp',
		);
	}
}

add_action( 'penci_soledaddi_after_setup_pages', 'penci_soledad_addons_import_order_tracking' );

/**
 * Update more page options
 *
 * @param $pages
 */
function penci_soledad_addons_import_order_tracking( $pages ) {
	if ( isset( $pages['order_tracking'] ) ) {
		$order = get_page_by_title( $pages['order_tracking'] );

		if ( $order ) {
			update_option( 'penci_soledad_order_tracking_page_id', $order->ID );
		}
	}

	if ( isset( $pages['portfolio'] ) ) {
		$portfolio = get_page_by_title( $pages['portfolio'] );

		if ( $portfolio ) {
			update_option( 'penci_soledad_portfolio_page_id', $portfolio->ID );
		}
	}
}

add_action( 'penci_soledaddi_before_import_content', 'penci_soledad_addons_import_product_attributes' );

/**
 * Prepare product attributes before import demo content
 *
 * @param $file
 */
function penci_soledad_addons_import_product_attributes( $file ) {
	global $wpdb;

	if ( ! class_exists( 'WXR_Parser' ) ) {
		require_once WP_PLUGIN_DIR . '/penci-soledad-demo-importer/includes/parsers.php';
	}

	$parser      = new WXR_Parser();
	$import_data = $parser->parse( $file );

	if ( isset( $import_data['posts'] ) ) {
		$posts = $import_data['posts'];

		if ( $posts && sizeof( $posts ) > 0 ) {
			foreach ( $posts as $post ) {
				if ( 'product' === $post['post_type'] ) {
					if ( ! empty( $post['terms'] ) ) {
						foreach ( $post['terms'] as $term ) {
							if ( strstr( $term['domain'], 'pa_' ) ) {
								if ( ! taxonomy_exists( $term['domain'] ) ) {
									$attribute_name = wc_sanitize_taxonomy_name( str_replace( 'pa_', '', $term['domain'] ) );

									// Create the taxonomy
									if ( ! in_array( $attribute_name, wc_get_attribute_taxonomies() ) ) {
										$attribute = array(
											'attribute_label'   => $attribute_name,
											'attribute_name'    => $attribute_name,
											'attribute_type'    => 'select',
											'attribute_orderby' => 'menu_order',
											'attribute_public'  => 0
										);
										$wpdb->insert( $wpdb->prefix . 'woocommerce_attribute_taxonomies', $attribute );
										delete_transient( 'wc_attribute_taxonomies' );
									}

									// Register the taxonomy now so that the import works!
									register_taxonomy(
										$term['domain'],
										apply_filters( 'woocommerce_taxonomy_objects_' . $term['domain'], array( 'product' ) ),
										apply_filters( 'woocommerce_taxonomy_args_' . $term['domain'], array(
											'hierarchical' => true,
											'show_ui'      => false,
											'query_var'    => true,
											'rewrite'      => false,
										) )
									);
								}
							}
						}
					}
				}
			}
		}
	}
}