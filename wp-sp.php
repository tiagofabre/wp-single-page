<?php
    /**
     * The plugin bootstrap file
     *
     * This file is read by WordPress to generate the plugin information in the plugin
     * admin area. This file also includes all of the dependencies used by the plugin,
     * registers the activation and deactivation functions, and defines a function
     * that starts the plugin.
     *
     * @link              http://example.com
     * @since             1.0.0
     * @package           Plugin_Name
     *
     * @wordpress-plugin
     * Plugin Name:       WP single page
     * Plugin URI:        http://example.com/single-page-uri/
     * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
     * Version:           1.0.0
     * Author:            Tiago Fabre
     * Author URI:        http://example.com/
     * License:           GPL-2.0+
     * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
     * Text Domain:       wpsp
     * Domain Path:       /languages
     */
    // If this file is called directly, abort.
    if ( ! defined( 'WPINC' ) ) {
        die;
    }
    /**
     * The code that runs during plugin activation.
     * This action is documented in includes/class-wp-sp-activator.php
     */
    function activate_wp_sp() {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-sp-activator.php';
        wp_sp_activator::activate();
    }

    register_activation_hook( __FILE__, 'activate_wp_sp' );
    register_deactivation_hook( __FILE__, 'deactivate_wp_sp' );
    /**
     * The core plugin class that is used to define internationalization,
     * admin-specific hooks, and public-facing site hooks.
     */
    require plugin_dir_path( __FILE__ ) . 'includes/class-wp-sp.php';

    /**
     * Begins execution of the plugin.
     *
     * Since everything within the plugin is registered via hooks,
     * then kicking off the plugin from this point in the file does
     * not affect the page life cycle.
     *
     * @since    1.0.0
     */
    function run_wp_sp() {
        $plugin = new Wp_sp_plugin();
        $plugin->run();
    }
    run_wp_sp();
    
?>
