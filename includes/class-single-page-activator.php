<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    wp_single_page
 * @subpackage    wp_single_page/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    wp_single_page
 * @subpackage    wp_single_page/includes
 * @author     Tiago Fabre <tiagofabre@gmail.com>
 */
class wp_single_page_activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		add_action('init','add_page');
        
		//Check and add a new page to be the front page
		function add_page($slug = '', $name = '')
		{
			$slug ='wp-single-page-home';
			$name ='wp-single-page-home';
			global $wpdb;

			// Search for an existing page with the specified page slug
			$page_found = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_type='page' AND post_name = %s LIMIT 1;", $slug ) );

			if(!$page_found)
			{
				$page_data = array(
				'post_status'    => 'publish',
				'post_type'      => 'page',
				'post_author'    => 1,
				'post_title'     => $name,
				'post_content'   => '[wp-single-page-home]',
				'comment_status' => 'closed'
				);
			}
			wp_insert_post( $page_data );
		}
	}

}
