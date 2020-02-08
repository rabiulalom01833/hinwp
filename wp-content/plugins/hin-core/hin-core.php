<?php 
if ( !defined('ABSPATH') )
    exit;

/*
Plugin Name: Hin Core
Plugin URI: http://codexexpert.com/
Description: Hin Core Plugin For Hin
Version: 1.0.0
Author: CodexExpert
Author URI: http://codexexpert.com/
*/

define( 'Hin_CORE_POST_VER', '1.0.1' );
define( 'Hin_CORE_POST_DIR', plugin_dir_path( __FILE__ ) );
define( 'Hin_CORE_POST_URL', plugin_dir_url( __FILE__ ) );

define( 'Hin_CORE_POST_METABOX_ACTIVED', in_array( 'cmb2/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'Hin_CORE_VISUAL_COMPOSER_ACTIVED', in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

final class Hin_core {

	private static $instance;

	function __construct() {

		require_once Hin_CORE_POST_DIR . '/inc/Hin-portfolio-post.php';
 
		add_action('init',array($this,'load_vc_addons'),20);
		add_filter('excerpt_length', array($this,'custom_post_excerpt'));
		add_filter('excerpt_more', array($this,'custom_new_excerpt_more'));
	}

	public static function instance() {

		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Hin_core ) ) {
			self::$instance = new Hin_core;
		}
		return self::$instance;
	}
	
	public function load_vc_addons() {

		if( Hin_CORE_VISUAL_COMPOSER_ACTIVED ) {
			
			require_once Hin_CORE_POST_DIR . '/vc-addons/hin-hero-banner.php';
		 
		}
	}
	
	function custom_post_excerpt($length){
		global $post;
		if ($post->post_type == 'Hin-service')
			return 15;
		return $length;
	}
	function custom_new_excerpt_more( $more ) {
		global $post;
		if ($post->post_type == 'Hin-service')
			return '';
		return $more;
	}
}

function Hin_core() {

	return Hin_core::instance();
}

 
