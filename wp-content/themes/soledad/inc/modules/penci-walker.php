<?php
/**
 * Class penci_main_menu
 * Hook to create options mega menu on Appearance > Menu
 * Render content mega menu if mega menu is selected
 * We hook only for categories
 *
 * @since     1.0
 * @construct hook
 *            - action wp_update_nav_menu_item
 *            - filter wp_edit_nav_menu_walker
 *            - filter wp_nav_menu_objects
 */
class penci_main_menu {

	function __construct() {
		if ( is_admin() ) {
			add_action( 'wp_update_nav_menu_item', array( $this, 'penci_wp_update_nav_menu_item' ), 10, 3 );
			add_filter( 'wp_edit_nav_menu_walker', array( $this, 'penci_wp_edit_nav_menu_walker' ) );
		}
		add_filter( 'wp_nav_menu_objects', array( $this, 'hook_wp_nav_menu_objects' ), 10, 2 );
	}

	function penci_wp_edit_nav_menu_walker() {
		include_once( trailingslashit( get_template_directory() ). 'inc/modules/penci-menu-callback.php' );

		return 'penci_nav_menu_edit_walker';
	}

	function penci_wp_update_nav_menu_item( $menu_id, $menu_item_id, $args ) {

		// Update meta menu items
		if ( isset( $_POST['penci_cat_mega_menu'][$menu_item_id] ) ) {
			update_post_meta( $menu_item_id, 'penci_cat_mega_menu', $_POST['penci_cat_mega_menu'][$menu_item_id] );
		}
		if ( isset( $_POST['penci_number_mega_menu'][$menu_item_id] ) ) {
			update_post_meta( $menu_item_id, 'penci_number_mega_menu', $_POST['penci_number_mega_menu'][$menu_item_id] );
		}

	}

	function hook_wp_nav_menu_objects( $items, $args = '' ) {
		$menu_items = array();

		foreach ( $items as &$item ) {
			$item->is_mega_menu = false;

			// if menu is mega menu, render mega menu
			$penci_catid_mega_menu = get_post_meta( $item->ID, 'penci_cat_mega_menu', true );
			$penci_number_mega_menu = get_post_meta( $item->ID, 'penci_number_mega_menu', true );
			if( ! isset( $penci_number_mega_menu ) || empty ( $penci_number_mega_menu ) ): $penci_number_mega_menu = '1';  endif;

			if ( ! empty( $penci_catid_mega_menu ) ) {

				$item->classes[] = 'penci-mega-menu';
				
				$child_categories = get_categories( array(
					'child_of'     => $penci_catid_mega_menu,
					'orderby'      => 'name',
					'order'        => 'ASC',
					'hide_empty'   => true,
					'hierarchical' => 1,
					'taxonomy'     => 'category',
				) );
				
				if( ! empty( $child_categories ) ) {
					$item->classes[] = 'menu-item-has-children';
				}
				
				// add the parent menu
				$menu_items[] = $item;

				// create mega menu item
				$post                 = new stdClass;
				$post->ID             = 0;
				$post->post_author    = '';
				$post->post_date      = '';
				$post->post_date_gmt  = '';
				$post->post_password  = '';
				$post->post_type      = 'menu_penci';
				$post->post_status    = 'draft';
				$post->to_ping        = '';
				$post->pinged         = '';
				$post->comment_status = get_option( 'default_comment_status' );
				$post->ping_status    = get_option( 'default_ping_status' );
				$post->post_pingback  = get_option( 'default_pingback_flag' );
				$post->post_category  = get_option( 'default_category' );
				$post->page_template  = 'default';
				$post->post_parent    = 0;
				$post->menu_order     = 0;
				$new_item             = new WP_Post( $post );

				/*
				 * if this is mega menu
				 * set the is_mega_menu flag
				 * render content of this mega menu
				 */
				$new_item->is_mega_menu = true; // sent to the menu walkers

				$new_item->menu_item_parent = $item->ID;

				$new_item->url   = '';
				$new_item->title = '';
				$new_item->title .= '<div class="penci-megamenu">';
				$new_item->title .= penci_return_html_mega_menu( $penci_catid_mega_menu, $penci_number_mega_menu );
				$new_item->title .= '</div>';

				$menu_items[] = $new_item;

			}
			else {
				$menu_items[] = $item;
			}
		} //end foreach

		return $menu_items;
	}
}

new penci_main_menu();

/**
 * Class penci_menu_walker_nav_menu
 * This class will remove wrap </a> around mega menu
 * Callback on wp_nav_menu() in header.php file
 *
 * @since 1.0
 */
class penci_menu_walker_nav_menu extends Walker_Nav_Menu {
	private $logo_break_point = null;
	private $count_item_parent = 0;

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$header_style = penci_soledad_get_header_layout();
		if( in_array( $header_style, array( 'header-10','header-11' ) ) && ! isset( $this->logo_break_point )  ){
			$penci_nav_menu_items           = wp_get_nav_menu_items( $args->menu );
			$middle_menu_elements = 0;

			foreach ( $penci_nav_menu_items as $menu_element ) {
				$menu_item_parent = isset( $menu_element->menu_item_parent ) && $menu_element->menu_item_parent ? $menu_element->menu_item_parent : '0';
				if ( '0' === $menu_item_parent ) {
					$middle_menu_elements++;
				}
			}
			$top_level_menu_items_count = $middle_menu_elements;
			if ( 0 === $top_level_menu_items_count ) {
				$this->logo_break_point = $middle_menu_elements / 2;
			} else {
				$this->logo_break_point = ceil( $middle_menu_elements / 2 );
			}
		}

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		/**
		 * Filter the CSS classes applied to a menu items
		 *
		 * @since 1.0
		 *
		 * @param array $classes The CSS classes that are applied to the menu items
		 * @param object $item   Current menu item
		 * @param array $args    Array of arguments
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filter the ID applied to a menu items
		 *
		 * @since 1.0
		 *
		 * @param string       ID that is applied to the menu items
		 * @param object $item Current menu item.
		 * @param array $args  Array of arguments
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . '>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';

		/**
		 * Filter the HTML attributes applied to a menu items
		 *
		 * @since 1.0
		 *
		 * @param array $atts
		 * @param object $item The current menu item.
		 * @param array $args  An array of arguments
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;

		if ( $item->is_mega_menu == false ) {
			$item_output .= '<a' . $attributes . '>';
		}

		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

		if ( $item->is_mega_menu == false ) {
			$item_output .= '</a>';
		}
		$item_output .= $args->after;

		/**
		 * Filter a menu item's starting output
		 *
		 * @since 1.0
		 *
		 * @param string $item_output The menu items starting HTML output
		 * @param object $item        Menu item data object
		 * @param int $depth          Depth of menu item
		 * @param array $args         Array of arguments
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$output .= "</li>{$n}";

		$item_parent = $item->menu_item_parent ? $item->menu_item_parent : '0';

		if ( '0' === $item_parent ) {
			$this->count_item_parent ++;
		}

		$header_style = penci_soledad_get_header_layout();
		$break_point = $this->logo_break_point;

		if( in_array( $header_style, array( 'header-10','header-11' ) ) && '0' === $item_parent && $break_point == $this->count_item_parent ){

			if ( isset( $args->menu_id ) && $args->menu_id ) {
				$wrap_id = $args->menu_id;
			} elseif ( isset( $args->menu ) && $args->menu ) {
				$menu    = $args->menu;
				$wrap_id = 'menu-' . ( isset( $menu->slug ) ? $menu->slug : '' ) . '-second';
			} else {
				$wrap_id = 'menu-second';
			}

			$wrap_class =  isset( $args->menu_class ) ?  str_replace( 'pencimn-left','pencimn-right', $args->menu_class )  : 'pencimn-right';

			$output .='</ul>';

			ob_start();
			get_template_part( 'template-parts/header/logo-has-trans' );
			$output .= ob_get_clean();

			$output .= sprintf( '<ul id="%s" class="%s">', esc_attr( $wrap_id ), esc_attr( $wrap_class  ) );

		}
	}
}

