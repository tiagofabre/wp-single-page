<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    wp_single_page
 * @subpackage    wp_single_page/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    wp_single_page
 * @subpackage    wp_single_page/admin
 * @author     Tiago Fabre <tiagofabre@gmail.com>
 */
class wp_single_page_admin
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;
    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name The name of this plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = 'wp-single-page';
        $this->version = '1.0';
        require plugin_dir_path(__FILE__) . 'partials/admin-single-page-settings.php';
        require plugin_dir_path(__FILE__) . 'partials/single-page-meta-box.php';
        require plugin_dir_path(__FILE__) . 'partials/single-page-shortcode.php';
    }

}
