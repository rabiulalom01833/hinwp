<?php 
if ( !defined('ABSPATH') )
    exit;

/*
Plugin Name: Prefab Core
Plugin URI: http://nilartstudio.com/
Description: Prefab Core Plugin For Prefab
Version: 1.0.0
Author: Nilartstudio
Author URI: http://nilartstudio.com
*/

define( 'PREFAB_CORE_POST_VER', '1.0.1' );
define( 'PREFAB_CORE_POST_DIR', plugin_dir_path( __FILE__ ) );
define( 'PREFAB_CORE_POST_URL', plugin_dir_url( __FILE__ ) );

define( 'PREFAB_CORE_POST_METABOX_ACTIVED', in_array( 'cmb2/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'PREFAB_CORE_VISUAL_COMPOSER_ACTIVED', in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

final class Prefab_core {

	private static $instance;

	function __construct() {

		require_once PREFAB_CORE_POST_DIR . '/inc/prefab-portfolio-post.php';
		require_once PREFAB_CORE_POST_DIR . '/inc/prefab-testimonial-post.php';
		require_once PREFAB_CORE_POST_DIR . '/inc/prefab-service-post.php';
		require_once PREFAB_CORE_POST_DIR . '/inc/prefab-slider.php';
		require_once PREFAB_CORE_POST_DIR . '/inc/prefab-team-view.php';

		add_action('init',array($this,'load_vc_addons'),20);
		add_filter('excerpt_length', array($this,'custom_post_excerpt'));
		add_filter('excerpt_more', array($this,'custom_new_excerpt_more'));
	}

	public static function instance() {

		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Prefab_core ) ) {
			self::$instance = new Prefab_core;
		}
		return self::$instance;
	}
	
	public function load_vc_addons() {

		if( PREFAB_CORE_VISUAL_COMPOSER_ACTIVED ) {
			
			require_once PREFAB_CORE_POST_DIR . '/vc-addons/prefab-client.php';
			require_once PREFAB_CORE_POST_DIR . '/vc-addons/prefab-team.php';
			require_once PREFAB_CORE_POST_DIR . '/vc-addons/prefab-counter.php';
			require_once PREFAB_CORE_POST_DIR . '/vc-addons/prefab-gallery.php';
			require_once PREFAB_CORE_POST_DIR . '/vc-addons/prefab-heading.php';
			require_once PREFAB_CORE_POST_DIR . '/vc-addons/prefab-promotion.php';
			require_once PREFAB_CORE_POST_DIR . '/vc-addons/prefab-service.php';
			require_once PREFAB_CORE_POST_DIR . '/vc-addons/prefab-service-post.php';
			require_once PREFAB_CORE_POST_DIR . '/vc-addons/prefab-single-image.php';
			require_once PREFAB_CORE_POST_DIR . '/vc-addons/prefab-slider.php';
			require_once PREFAB_CORE_POST_DIR . '/vc-addons/prefab-testimonial.php';
			require_once PREFAB_CORE_POST_DIR . '/vc-addons/prefab-testimonial-from-post.php';
			require_once PREFAB_CORE_POST_DIR . '/vc-addons/prefab-blog-slider.php';
			require_once PREFAB_CORE_POST_DIR . '/vc-addons/prefab-contact.php';
			
		}
	}
	
	function custom_post_excerpt($length){
		global $post;
		if ($post->post_type == 'prefab-service')
			return 15;
		return $length;
	}
	function custom_new_excerpt_more( $more ) {
		global $post;
		if ($post->post_type == 'prefab-service')
			return '';
		return $more;
	}
}

function Prefab_core() {

	return Prefab_core::instance();
}


function prefab_get_terms($id,$tax){
	$terms = get_the_terms( get_the_ID(), $tax ); 
	$list = '';
	if ( $terms && ! is_wp_error( $terms ) ) : 
		$i=0;
		foreach ( $terms as $term ) {
			if($i==2)
				break;
			$list .= $term->name.' ,';
			$i++;
		}
	endif;
	return trim($list,',');
}

Prefab_core();


add_action('prefab_post_share','prefab_post_share');
/*Post share option*/
function prefab_post_share(){
	global $post;
		// Get current page URL 
		$crunchifyURL = get_permalink();
	 
		// Get current page title
		$crunchifyTitle = str_replace( ' ', '%20', get_the_title());
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
		$linkedin = 'http://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL;
	?>
		<div class="blog-share-icon text-left text-md-right">
			<span><?php esc_html_e('Share:','prefab'); ?> </span>
			<a href="<?php print $facebookURL; ?>">
				<i class="fab fa-facebook-f"></i>
			</a>
			<a href="<?php print $twitterURL; ?>">
				<i class="fab fa-twitter"></i>
			</a>
			<a href="<?php print $googleURL; ?>">
				<i class="fab fa-google-plus-g"></i>
			</a>
			<a href="<?php print $linkedin; ?>">
				<i class="fab fa-linkedin"></i>
			</a>
		</div>
	<?php 
}

