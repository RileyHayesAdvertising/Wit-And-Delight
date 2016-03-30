<?php

/**
 *
 * @link              https://nmrkt.com/
 * @since             1.1.1
 * @package           nmrkt
 *
 * @wordpress-plugin
 * Plugin Name:       NMRKT Publisher
 * Plugin URI:        https://nmrkt.com/
 * Description:       The NMRKT publisher wordpress plugin will integrate your NMRKT shop inventory management into your blogging workflow. NMRKT account required.
 * Version:           1.1.0
 * Author:            NMRKT
 * Author URI:        https://nmrkt.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nmrkt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-nmrkt-activator.php';

/**
 * The code that runs during plugin deactivation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-nmrkt-deactivator.php';

/** This action is documented in includes/class-plugin-name-activator.php */
register_activation_hook( __FILE__, array( 'NMRKT_Activator', 'activate' ) );

/** This action is documented in includes/class-plugin-name-deactivator.php */
register_deactivation_hook( __FILE__, array( 'NMRKT_Deactivator', 'deactivate' ) );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-nmrkt.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_nmrkt() {

	$plugin = new NMRKT();
	$plugin->run();

}

run_nmrkt();

// Dev Stuff for Research

