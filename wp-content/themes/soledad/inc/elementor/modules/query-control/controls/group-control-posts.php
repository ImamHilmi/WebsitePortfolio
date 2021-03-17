<?php

namespace PenciSoledadElementor\Modules\QueryControl\Controls;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Base;
use PenciSoledadElementor\Classes\Utils;
use PenciSoledadElementor\Modules\QueryControl\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Group_Control_Posts extends Group_Control_Base {

	const INLINE_MAX_RESULTS = 100;

	protected static $fields;

	public static function get_type() {
		return 'posts';
	}

	public static function on_export_remove_setting_from_element( $element, $control_id ) {
		unset( $element['settings'][ $control_id . '_posts_ids' ] );
		unset( $element['settings'][ $control_id . '_authors' ] );

		foreach ( Utils::get_public_post_types() as $post_type => $label ) {
			$taxonomy_filter_args = array(
				'show_in_nav_menus' => true,
				'object_type'       => array( $post_type )
			);

			$taxonomies = get_taxonomies( $taxonomy_filter_args, 'objects' );

			foreach ( $taxonomies as $taxonomy => $object ) {
				unset( $element['settings'][ $control_id . '_' . $taxonomy . '_ids' ] );
			}
		}

		return $element;
	}

	protected function init_fields() {
		$fields = [];

		$fields['post_type'] = array(
			'label' => __( 'Source', 'soledad' ),
			'type'  => Controls_Manager::SELECT
		);

		$fields['posts_ids'] = array(
			'label'       => __( 'Search & Select', 'soledad' ),
			'type'        => Module::QUERY_CONTROL_ID,
			'post_type'   => '',
			'options'     => array(),
			'label_block' => true,
			'multiple'    => true,
			'filter_type' => 'by_id',
			'condition'   => array( 'post_type' => 'by_id' )
		);

		$fields['authors'] = array(
			'label'       => __( 'Author', 'soledad' ),
			'label_block' => true,
			'type'        => Module::QUERY_CONTROL_ID,
			'multiple'    => true,
			'default'     => array(),
			'options'     => array(),
			'filter_type' => 'author',
			'condition'   => array( 'post_type!' => array( 'by_id', 'current_query' ) )
		);

		return $fields;
	}

	protected function prepare_fields( $fields ) {
		$args = $this->get_args();

		$post_types = Utils::get_public_post_types( $args );

		$post_types_options = $post_types;

		$post_types_options['by_id']         = __( 'Manual Selection', 'soledad' );
		$post_types_options['current_query'] = __( 'Current Query', 'soledad' );

		$fields['post_type']['options'] = $post_types_options;

		$fields['post_type']['default'] = key( $post_types );

		$fields['posts_ids']['object_type'] = array_keys( $post_types );

		$taxonomy_filter_args = array( 'show_in_nav_menus' => true );

		if ( ! empty( $args['post_type'] ) ) {
			$taxonomy_filter_args['object_type'] = [ $args['post_type'] ];
		}

		$taxonomies = get_taxonomies( $taxonomy_filter_args, 'objects' );

		foreach ( $taxonomies as $taxonomy => $object ) {
			$taxonomy_args = array(
				'label'       => $object->label,
				'type'        => Module::QUERY_CONTROL_ID,
				'label_block' => true,
				'multiple'    => true,
				'object_type' => $taxonomy,
				'options'     => array(),
				'condition'   => array( 'post_type' => $object->object_type )
			);

			$count = wp_count_terms( $taxonomy );

			$options = array();

			if ( $count > self::INLINE_MAX_RESULTS ) {
				$taxonomy_args['type'] = Module::QUERY_CONTROL_ID;

				$taxonomy_args['filter_type'] = 'taxonomy';
			} else {
				$taxonomy_args['type'] = Controls_Manager::SELECT2;

				$terms = get_terms( array(
					'taxonomy'   => $taxonomy,
					'hide_empty' => false
				) );

				foreach ( $terms as $term ) {
					$options[ $term->term_id ] = $term->name;
				}

				$taxonomy_args['options'] = $options;
			}

			$fields[ $taxonomy . '_ids' ] = $taxonomy_args;
		}

		return parent::prepare_fields( $fields );
	}

	protected function get_default_options() {
		return array( 'popover' => false );
	}
}
