<?php 
class PrefabServicePost 
{

	function __construct() {

		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'cmb2_meta_boxes', array( $this, 'add_meta' ) );
		add_filter( 'template_include', array( $this, 'service_template_include' ) );
	}
	
	public function service_template_include( $template ) {
		if ( is_singular( 'prefab-service' ) ) {
			return $this->get_template( 'single-prefab-service.php');
		}
		return $template;
	}
	
	public function get_template( $template ) {
		if ( $theme_file = locate_template( array( $template ) ) ) {
			$file = $theme_file;
		} else {
			$file = PREFAB_CORE_POST_DIR . 'template/'. $template;
		}
		return apply_filters( __FUNCTION__, $file, $template );
	}
	
	
	public function register_custom_post_type() {

		$labels = array(
			'name'               => __( 'Service', 'Post Type General Name', 'prefab-core'),
			'singular_name'      => __( 'Service', 'Post Type Singular Name', 'prefab-core'),
			'menu_name'          => __( 'Service', 'prefab-core'),
			'parent_item_colon'  => __( 'Parent Service', 'prefab-core'),
			'all_items'          => __( 'All  Service', 'prefab-core'),
			'view_item'          => __( 'View  Service', 'prefab-core'),
			'add_new_item'       => __( 'Add New  Service', 'prefab-core'),
			'add_new'            => __( 'Add New  Service', 'prefab-core'),
			'edit_item'          => __( 'Edit  Service', 'prefab-core'),
			'update_item'        => __( 'Update  Service', 'prefab-core'),
			'search_items'       => __( 'Search  Service', 'prefab-core'),
			'not_found'          => __( 'Not found', 'prefab-core'),
			'not_found_in_trash' => __( 'Not found in Trash', 'prefab-core'),
		);

		$args   = array(
			'label'               => __( 'Service', 'prefab-core'),
			'description'         => __( 'Create and manage all Prefab Service', 'prefab-core'),
			'labels'              => $labels,
			'supports'            => array( 'title','thumbnail', 'editor'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 14,
			'rewrite'             =>  array( 'slug' => 'prefab-service', 'with_front' => false ),
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-format-quote',
		);

		register_post_type( 'prefab-service', $args );
	}
	
	public function create_cat() {

		$name = 'Category';

		$labels = array(
			'name'              => esc_html($name),
			'singular_name'     => esc_html($name),
			'search_items'      => sprintf(esc_html__( 'Search %s:', 'prefab-core' ),$name),
			'all_items'      	=> sprintf(esc_html__( 'All %s:', 'prefab-core' ),$name),
			'parent_item'      	=> sprintf(esc_html__( 'Parent  %s:', 'prefab-core' ),$name),
			'parent_item_colon' => sprintf(esc_html__( 'Parent  %s:', 'prefab-core' ),$name),
			'edit_item'     	=> sprintf(esc_html__( 'Edit  %s:', 'prefab-core' ),$name),
			'update_item'     	=> sprintf(esc_html__( 'Update %s:', 'prefab-core' ),$name),
			'add_new_item'      => sprintf(esc_html__( 'Add New %s:', 'prefab-core' ),$name),
			'new_item_name'     => sprintf(esc_html__( 'New  %s Name:', 'prefab-core' ),$name),
			'menu_name'      	=> esc_html($name),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
		);

		register_taxonomy('service-cat','prefab-service', $args );
	}



	
	public function add_meta(array $prefab) {

		$prefab[] = array(
			'id'           => 'prefab-service',
			'title'        => esc_html__( 'Service Extra Info', 'prefab-core' ),
			'object_types' => array( 'prefab-service'),
			'fields'       => array(
				array(
					'name' => esc_html__( 'Icon Name', 'prefab-core'),
					'id'   => 'icon_name',
					'type' => 'text',
					'desc' => esc_html__('Example : fa-comments','prefab-core'),
				)
			)
		);
		
		return $prefab;
	}

}
new PrefabServicePost();