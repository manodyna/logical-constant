<?php
/*
Plugin Name: DW Glossary
Plugin URI:  https://www.designwall.com/wordpress/plugins/dw-glossary/
Description: A simple plugin to help you add Glossary section to your WordPress site via widget or short-code or PHP function.
Version:     1.0.4
Author:      DesignWall
Author URI:  https://www.designwall.com
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Domain Path: /languages
Text Domain: dw-glossary
*/

// add_action( 'init', 'dw_glossary_post_type_init' );
add_action( 'init', 'dw_glossary_taxanomy_init' );
function dw_glossary_post_type_init() {
	$labels = array(
		'name'               => _x( 'Glossaries', 'post type general name', 'dw-glossary' ),
		'singular_name'      => _x( 'Glossary', 'post type singular name', 'dw-glossary' ),
		'menu_name'          => _x( 'Glossary', 'admin menu', 'dw-glossary' ),
		'name_admin_bar'     => _x( 'Glossary', 'add new on admin bar', 'dw-glossary' ),
		'add_new'            => _x( 'Add New', 'glossary', 'dw-glossary' ),
		'add_new_item'       => __( 'Add New Glossary', 'dw-glossary' ),
		'new_item'           => __( 'New Glossary', 'dw-glossary' ),
		'edit_item'          => __( 'Edit Glossary', 'dw-glossary' ),
		'view_item'          => __( 'View Glossary', 'dw-glossary' ),
		'all_items'          => __( 'All Glossaries', 'dw-glossary' ),
		'search_items'       => __( 'Search Glossaries', 'dw-glossary' ),
		'parent_item_colon'  => __( 'Parent Glossaries:', 'dw-glossary' ),
		'not_found'          => __( 'No glossaries found.', 'dw-glossary' ),
		'not_found_in_trash' => __( 'No glossaries found in Trash.', 'dw-glossary' )
	);

	$dw_glossary_rewrite = get_option('dw_glossary_rewrite');
	if(!$dw_glossary_rewrite){
		$dw_glossary_rewrite = 'glossary';
	}

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'dw-glossary' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => $dw_glossary_rewrite ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-welcome-learn-more',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	$args = apply_filters( 'dw_glossary_post_type_init_args', $args );

	register_post_type( 'dw-glossary', $args );
}

function dw_glossary_taxanomy_init( $names ) {
	$labels = array(
		'name'              => _x( 'Glossary Categories', 'taxonomy general name', 'dw-lms' ),
		'singular_name'     => _x( 'Glossary Category', 'taxonomy singular name', 'dw-lms' ),
		'search_items'      => __( 'Search Glossary Categories', 'dw-lms' ),
		'all_items'         => __( 'All Glossary Categories', 'dw-lms' ),
		'parent_item'       => __( 'Parent Glossary Category', 'dw-lms' ),
		'parent_item_colon' => __( 'Parent Glossary Category:', 'dw-lms' ),
		'edit_item'         => __( 'Edit Glossary Category', 'dw-lms' ),
		'update_item'       => __( 'Update Glossary Category', 'dw-lms' ),
		'add_new_item'      => __( 'Add New Glossary Category', 'dw-lms' ),
		'new_item_name'     => __( 'New Glossary Category Name', 'dw-lms' ),
		'menu_name'         => __( 'Glossary Categories', 'dw-lms' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'dw-glossary-cat', 'with_front' => false, 'hierarchical' => true ),
		'query_var'         => true,
		'capabilities'      => array(),
	);
	register_taxonomy( 'dw-glossary' . '_category', array( 'dw-glossary' ), $args );

	$labels = array(
		'name'                       => _x( 'Glossary Tags', 'taxonomy general name', 'dw-lms' ),
		'singular_name'              => _x( 'Glossary Tag', 'taxonomy singular name', 'dw-lms' ),
		'search_items'               => __( 'Search Glossary Tags', 'dw-lms' ),
		'popular_items'              => __( 'Popular Glossary Tags', 'dw-lms' ),
		'all_items'                  => __( 'All Glossary Tags', 'dw-lms' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Glossary Tag', 'dw-lms' ),
		'update_item'                => __( 'Update Glossary Tag', 'dw-lms' ),
		'add_new_item'               => __( 'Add New Glossary Tag', 'dw-lms' ),
		'new_item_name'              => __( 'New Glossary Tag Name', 'dw-lms' ),
		'separate_items_with_commas' => __( 'Separate glossary tags with commas', 'dw-lms' ),
		'add_or_remove_items'        => __( 'Add or remove glossary tags', 'dw-lms' ),
		'choose_from_most_used'      => __( 'Choose from the most used glossary tags', 'dw-lms' ),
		'not_found'                  => __( 'No glossary tags found.', 'dw-lms' ),
		'menu_name'                  => __( 'Glossary Tags', 'dw-lms' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => false,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'dw-glossary-tag', 'with_front' => false, 'hierarchical' => true ),
		'query_var'         => true,
		'capabilities'      => array(),
	);
	register_taxonomy( 'dw-glossary' . '_tag', array( 'dw-glossary' ), $args );
}

// Add short-code
add_shortcode( 'dw-glossary', 'dw_glossary_shortcode' );
function dw_glossary_shortcode( $atts = array() ) {
	$glossary_query_arg['post_type'] = 'dw-glossary';
	$glossary_query_arg['posts_per_page'] = -1;
	extract( shortcode_atts( array(
		'col' => 3,
		'cat' => '',
		'tag' => '',
	), $atts, 'dw-glossary' ) );

	if ( $col ) {
		switch ( $col ) {
			case '1':
			$width = '100%';
			break;

			case '2':
			$width = '50%';
			break;

			case '3':
			$width = '33%';
			break;

			case '4':
			$width = '25%';
			break;
			
			default:
			$width = '33%';
			break;
		}
	} else {
		$width = '50%';
	}

	if ( '' != $cat ) {
		$glossary_query_arg['tax_query'] = array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'dw-glossary_category',
				'field'    => 'term_id',
				'terms'    => array( $cat ),
			),
		);
	}

	if ( '' != $tag ) {
		$glossary_query_arg['tax_query'] = array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'dw-glossary_tag',
				'field'    => 'term_id',
				'terms'    => array( $tag ),
			),
		);
	}



	$glossary_query_arg = apply_filters( 'dw_glossary_query_arg', $glossary_query_arg );
	$glossary_query = new WP_Query( $glossary_query_arg );

	?>

	<?php

	if ( $glossary_query->have_posts() ) :
		
		$content = '<div class="container">';
		$content .= '<p><input id="dw-glossary-search" type="text" class="form-control input-lg" placeholder="'.__( 'Search glossary','dw-glossary' ).' ..."></p>';
		$content .= '<ul class="dw-glossary-index"><li><a class="dw-glossary-menu" data-name="all" href="javascript:void(0)">'.__( 'All','dw-glossary' ).'</a></li>';

		//disable letters
		$disable_letters = array();
		$dw_glossary_disable_letters = get_option('dw_glossary_disable_letters');
		if($dw_glossary_disable_letters){
			//remove space
			$dw_glossary_disable_letters = str_replace(' ', '', $dw_glossary_disable_letters);

			$disable_letters = explode(',', $dw_glossary_disable_letters);
		}

		//get posts
		$posts = array();
		while ( $glossary_query->have_posts() ) : $glossary_query->the_post();
			$title = get_the_title();
			$permalink = get_permalink();
			$f_char = mb_strtoupper( mb_substr( $title, 0, 1, 'utf-8' ) );

			//disable number
			if(is_numeric($f_char) && in_array('0', $disable_letters)){
				continue;
			}
			//disable letter
			if(in_array($f_char, $disable_letters)){
				continue;
			}

			$first_character[] = $f_char;
			$posts[] = array( $f_char => array( $title, $permalink ) );
		endwhile;


		//disable number
		$first_character = array_unique( $first_character );
		if(!in_array('0', $disable_letters)){
			foreach ( $first_character as $value) {
				if ( is_numeric( $value ) ) {
					$flag = true;
					break;
				} else {
					$flag = false;
				}
			}

			if ( $flag == true ) {
				$content .= '<li><a class="dw-glossary-menu" data-name="0-9" href="javascript:void(0)">0-9</a></li>';
			} else {
				$content .= '<li>0-9</li>';
			}
		}


		$alphas = mb_range('A', 'Z');
		foreach ( $alphas as $key => $value) {
			//disable letter
			if(in_array($value, $disable_letters)) continue;

			if ( in_array( $value, $first_character ) ) {
				$content .= '<li><a class="dw-glossary-menu" data-name="'.$value.'" href="javascript:void(0)">'.$value.'</a></li>';
			} else {
				$content .= '<li>'.$value.'</li>';
			}
			
		}

		if ( get_option( 'show_greek' ) == 'on' ) {
			$greek = mb_range( 'Α', 'Ω');
			$content .= '</ul><ul class="dw-glossary-index">';
			foreach ( $greek as $key => $value) {
				//disable letter
				if(in_array($value, $disable_letters)) continue;

				if ( in_array( $value, $first_character ) ) {
					$content .= '<li><a class="dw-glossary-menu" data-name="'.$value.'" href="javascript:void(0)">'.$value.'</a></li>';
				} else {
					$content .= '<li>'.$value.'</li>';
				}

			}
		}

		if ( get_option( 'show_cyrillic' ) == 'on' ) {
			$cyrillic =  mb_range( 'Ѐ', 'Я');
			$content .= '</ul><ul class="dw-glossary-index">';
			foreach ( $cyrillic as $key => $value) {
				//disable letter
				if(in_array($value, $disable_letters)) continue;

				if ( in_array( $value, $first_character ) ) {
					$content .= '<li><a class="dw-glossary-menu" data-name="'.$value.'" href="javascript:void(0)">'.$value.'</a></li>';
				} else {
					$content .= '<li>'.$value.'</li>';
				}	
			}
		}



		$content .= '</ul>';
		$result = array();

		foreach ( $posts as $item ) {
			$fc = key( $item );
			if ( is_numeric( $fc ) ) {
				$fc = '0-9';
			}
			$value = current( $item );

			if( ! isset( $result[$fc] ) ) {
				$result[$fc] = array();
			}
			$result[$fc][] = $value;
		}

		ksort( $result );

		if ( is_array( $result ) ) {
			$content .= '<div class="dw-glossary-list">';
			foreach ( $result as $key => $value) {
				$content .= '<ul id="dw-glossary-'.$key.'" class="dw-glossary-items">';
				$content .= '<li class="dw-glossary-title">'.$key.'</li>';
				foreach ( $value as $item ) {
					$content .= '<li class="post-item" style="width: '.$width.'"><a href="'.$item[1].'">'.$item[0].'</a></li>';
				}
				$content .= '</ul>';	
			}
			$content .= '</div>';
		}
		

		$content .= '<div class="dw-glossary-alert" style="display:none">' . __( 'No glossary Found', 'dw-glossary' ) . '</div></div>';
	else :
		$content = '<div class="dw-glossary-alert">' . __( 'No glossary Found', 'dw-glossary' ) . '</div>';
	endif;
	wp_reset_postdata();

	return $content;
}

add_action( 'wp_enqueue_scripts', 'dw_glossary_scripts' );
function dw_glossary_scripts($hook) {
	wp_enqueue_script( 'dw-glossary-js', plugins_url( 'assets/js/dw-glossary.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_style( 'dw-glossary-css', plugins_url( 'assets/css/dw-glossary.css', __FILE__ ) );
}

function mb_range( $start, $end ) {
    // if start and end are the same, well, there's nothing to do
	if ( $start == $end ) {
		return array( $start );
	}

	$_result = array();
    // get unicodes of start and end
	list( , $_start, $_end ) = unpack("N*", mb_convert_encoding($start . $end, "UTF-32BE", "UTF-8"));
    // determine movement direction
	$_offset = $_start < $_end ? 1 : -1;
	$_current = $_start;
	while ($_current != $_end) {
		$_result[] = mb_convert_encoding(pack("N*", $_current), "UTF-8", "UTF-32BE");
		$_current += $_offset;
	}
	$_result[] = $end;
	return $_result;
}

// create custom plugin settings menu
add_action('admin_menu', 'dw_glossary_create_menu');

function dw_glossary_create_menu() {
	//create new top-level menu
	add_submenu_page( 'edit.php?post_type=dw-glossary', 'DW Glossary Settings', 'Settings', 'administrator', 'dw-glossary-settings', 'dw_glossary_settings_page' );

	//call register settings function
	add_action( 'admin_init', 'register_dw_glossary_plugin_settings' );
}


function register_dw_glossary_plugin_settings() {
	//register our settings
	register_setting( 'dw-glossary-settings-group', 'show_greek' );
	register_setting( 'dw-glossary-settings-group', 'show_cyrillic' );
	register_setting( 'dw-glossary-settings-group', 'dw_glossary_rewrite' );
	register_setting( 'dw-glossary-settings-group', 'dw_glossary_disable_letters' );
}

function dw_glossary_settings_page() {
	?>
	<div class="wrap">
		<h2>DW Glossary</h2>

		<form method="post" action="options.php">
			<?php settings_fields( 'dw-glossary-settings-group' ); ?>
			<?php do_settings_sections( 'dw-glossary-settings-group' ); ?>
			<table class="form-table">

				<tr valign="top">
					<th scope="row"><?php _e( 'Show Greek Alphabet', 'dw-glossary' ); ?></th>
					<td><input type="checkbox" name="show_greek" <?php echo get_option( 'show_greek' ) == 'on' ? 'checked' : ''; ?> /></td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php _e( 'Show Cyrillic Alphabet', 'dw-glossary' );?></th>
					<td><input type="checkbox" name="show_cyrillic" <?php echo get_option( 'show_cyrillic' ) == 'on' ? 'checked' : ''; ?> /></td>
				</tr>

				<?php $dw_glossary_rewrite =  get_option( 'dw_glossary_rewrite' );
				if(!$dw_glossary_rewrite){
					$dw_glossary_rewrite = '';
				}
				?>
				<tr valign="top">
					<th scope="row"><?php _e( 'Glossary Base', 'dw-glossary' );?></th>
					<td>
						<input type="text" name="dw_glossary_rewrite" value="<?php echo $dw_glossary_rewrite;?>"/>
						<br>
						<span class="description"><?php _e('If you leave these blank the default will be used. Go to Settings &gt; Permalinks and refresh your permalink.', 'dw-glossary');?></span>
					</td>
				</tr>

				<?php $dw_glossary_disable_letters =  get_option( 'dw_glossary_disable_letters' );
				if(!$dw_glossary_disable_letters){
					$dw_glossary_disable_letters = '';
				}
				?>
				<tr valign="top">
					<th scope="row"><?php _e( 'Disable letters', 'dw-glossary' );?></th>
					<td>
						<input type="text" name="dw_glossary_disable_letters" value="<?php echo $dw_glossary_disable_letters;?>"/>
						<br>
						<span class="description"><?php _e('ex:', 'dw-glossary');?> <code>A,0,C,Π</code> (<?php _e('use <code>0</code> to disable number', 'dw-glossary');?>)</span>
					</td>
				</tr>
			</table>

			<?php submit_button(); ?>

		</form>
	</div>
	<?php 
}