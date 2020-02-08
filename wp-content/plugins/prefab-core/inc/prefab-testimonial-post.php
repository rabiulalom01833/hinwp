<?php 
class PrefabTestimonialPost 
{

	function __construct() {

		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'cmb2_meta_boxes', array( $this, 'add_meta' ) );
	}
	
	
	public function register_custom_post_type() {

		$labels = array(
			'name'               => __( 'Testimonial', 'Post Type General Name', 'prefab-core'),
			'singular_name'      => __( 'Testimonial', 'Post Type Singular Name', 'prefab-core'),
			'menu_name'          => __( 'Testimonial', 'prefab-core'),
			'parent_item_colon'  => __( 'Parent Testimonial', 'prefab-core'),
			'all_items'          => __( 'All  Testimonial', 'prefab-core'),
			'view_item'          => __( 'View  Testimonial', 'prefab-core'),
			'add_new_item'       => __( 'Add New  Testimonial', 'prefab-core'),
			'add_new'            => __( 'Add New  Testimonial', 'prefab-core'),
			'edit_item'          => __( 'Edit  Testimonial', 'prefab-core'),
			'update_item'        => __( 'Update  Testimonial', 'prefab-core'),
			'search_items'       => __( 'Search  Testimonial', 'prefab-core'),
			'not_found'          => __( 'Not found', 'prefab-core'),
			'not_found_in_trash' => __( 'Not found in Trash', 'prefab-core'),
		);

		$args   = array(
			'label'               => __( 'Testimonial', 'prefab-core'),
			'description'         => __( 'Create and manage all Prefab Testimonial', 'prefab-core'),
			'labels'              => $labels,
			'supports'            => array( 'title', 'author', 'thumbnail', 'editor', 'excerpt', 'custom-fields'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 14,
			'rewrite'             =>  array( 'slug' => 'prefab-Testimonial', 'with_front' => false ),
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-format-quote',
		);

		register_post_type( 'prefab-testimonial', $args );
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

		register_taxonomy('testimonial-cat','prefab-testimonial', $args );
	}



	
	public function add_meta(array $prefab) {

		$prefab[] = array(
			'id'           => 'prefab-testimonial',
			'title'        => esc_html__( 'Testimonial Extra Info', 'prefab-core' ),
			'object_types' => array( 'prefab-testimonial'),
			'fields'       => array(
				array(
					'name' => esc_html__( 'Full Name', 'prefab-core'),
					'id'   => 'full_name',
					'type' => 'text',
				),
				array(
					'name' => esc_html__( 'Designation', 'prefab-core'),
					'id'   => 'designation',
					'type' => 'text',
				),
				array(
					'name' => esc_html__( 'Profile Image', 'prefab-core'),
					'id'   => 'image',
					'type' => 'file',
				)
			)
		);
		
		return $prefab;
	}

}
new PrefabTestimonialPost();