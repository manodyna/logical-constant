<?php
/**
 * Page Type Condition logic swiftly crafted.
 *
 * @since 4.11.0
 *
 * @package     Divi
 * @sub-package Builder
 */

namespace Module\Field\DisplayConditions;

/**
 * Post Type Condition Trait.
 */
trait PostTypeCondition {

	/**
	 * Processes "Post Types" condition.
	 *
	 * @since 4.11.0
	 *
	 * @param  array $condition_settings Containing all settings of the condition.
	 *
	 * @return boolean Condition output.
	 */
	protected function _process_post_type_condition( $condition_settings ) {
		// Only check for Posts.
		if ( ! is_singular() ) {
			return false;
		}

		$display_rule       = isset( $condition_settings['postTypeDisplay'] ) ? $condition_settings['postTypeDisplay'] : '';
		$post_types_raw     = isset( $condition_settings['postTypes'] ) ? $condition_settings['postTypes'] : [];
		$post_types_values  = array_map(
			function( $item ) {
				return $item['value'];
			},
			$post_types_raw
		);
		$current_queried_id = get_queried_object_id();
		$post_type          = get_post_type( $current_queried_id );

		$should_display = array_intersect( $post_types_values, (array) $post_type ) ? true : false;

		return ( 'is' === $display_rule ) ? $should_display : ! $should_display;
	}

}
