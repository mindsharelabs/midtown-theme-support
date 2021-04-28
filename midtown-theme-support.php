<?php
/*
Plugin Name: Midtown District Santa Fe Theme Support Plugin
Plugin URI: https://mind.sh/are
Description: Provides a library of additional template gutenberg blocks for use on midtowndistrictsantafe.com.
Author: Mindshare Labs, Inc
Version: 1.0.0
Author: Mindshare Labs, Inc
Author URI: https://mind.sh/are/
*/

class midtownPlugin {
  protected static $instance = NULL;

  public function __construct() {
    if ( !defined( 'MIDTOWN_PLUGIN_FILE' ) ) {
    	define( 'MIDTOWN_PLUGIN_FILE', __FILE__ );
    }
    //Define all the constants
    $this->define( 'MIDTOWN_ABSPATH', dirname( MIDTOWN_PLUGIN_FILE ) . '/' );
    $this->define( 'MIDTOWN_URL', plugin_dir_url( __FILE__ ));
    $this->define( 'MIDTOWN_PLUGIN_VERSION', '0.1.0');
    $this->define( 'MIDTOWN_PREPEND', 'midtown_');

    $this->includes();

	}
  public static function get_instance() {
    if ( null === self::$instance ) {
  		self::$instance = new self;
  	}
  	return self::$instance;
  }
  private function define( $name, $value ) {
    if ( ! defined( $name ) ) {
      define( $name, $value );
    }
  }
  private function includes() {

    //General
    include_once MIDTOWN_ABSPATH . 'inc/utility.php';
    include_once MIDTOWN_ABSPATH . 'inc/multiple-roles.php';
    include_once MIDTOWN_ABSPATH . 'inc/blocks.php';
    include_once MIDTOWN_ABSPATH . 'inc/widgets.php';
    include_once MIDTOWN_ABSPATH . 'inc/scripts-and-styles.php';

  }


}//end of class


new midtownPlugin();





/**
 * Deactivation hook.
 */
function midtown_deactivate() {

}
register_deactivation_hook( __FILE__, 'midtown_deactivate' );
