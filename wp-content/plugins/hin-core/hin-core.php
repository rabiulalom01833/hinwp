<?php 
if ( !defined('ABSPATH') )
    exit;

/*
Plugin Name: Hin Core
Plugin URI: http://codexexpert.com/
Description: Hin Core Plugin For Hin
Version: 1.0.0
Author: Codexexpert
Author URI: http://codexexpert.com/
*/

define( 'HIN_CORE_POST_VER', '1.0.1' );
define( 'HIN_CORE_POST_DIR', plugin_dir_path( __FILE__ ) );
define( 'HIN_CORE_POST_URL', plugin_dir_url( __FILE__ ) );

define( 'HIN_CORE_VISUAL_COMPOSER_ACTIVED', in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

final class Hin_core {

	private static $instance;

	function __construct() {

		// require_once Hin_CORE_POST_DIR . '/inc/hin-hero-banner.php';
		add_action('init',array($this,'load_vc_addons'),20);
  
	}

	public static function instance() {

		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Hin_core ) ) {
			self::$instance = new Hin_core;
		}
		return self::$instance;
	}
	
	public function load_vc_addons() {

		if( HIN_CORE_VISUAL_COMPOSER_ACTIVED ) {
			
			require_once HIN_CORE_POST_DIR . '/vc-addons/hero-banner.php';
			require_once HIN_CORE_POST_DIR . '/vc-addons/video-feature.php';
		 
		}
	}
	
	 
}

function Hin_core() { 
	return Hin_core::instance();
}
	
Hin_core();
 