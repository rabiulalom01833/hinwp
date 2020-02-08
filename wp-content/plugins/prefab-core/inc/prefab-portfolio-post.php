<?php 
class PrefabPortfolioPost
{

	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_action( 'init', array( $this, 'create_location_cat' ) );
		add_filter( 'cmb2_meta_boxes', array( $this, 'add_meta' ) );
		add_filter( 'cmb2_meta_boxes', array( $this, 'add_page_meta' ) );
		add_filter( 'cmb2_meta_boxes', array( $this, 'add_profile_meta' ) );
		add_filter( 'template_include', array( $this, 'service_template_include' ) );
	}
	
	public function service_template_include( $template ) {
		if ( is_singular( 'prefab-portfolio' ) ) {
			return $this->get_template( 'single-prefab-portfolio.php');
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
			'name'               => __( 'Portfolio', 'Post Type General Name', 'prefab-core'),
			'singular_name'      => __( 'Portfolio', 'Post Type Singular Name', 'prefab-core'),
			'menu_name'          => __( 'Portfolio', 'prefab-core'),
			'parent_item_colon'  => __( 'Parent Portfolio', 'prefab-core'),
			'all_items'          => __( 'All  Portfolio', 'prefab-core'),
			'view_item'          => __( 'View  Portfolio', 'prefab-core'),
			'add_new_item'       => __( 'Add New  Portfolio', 'prefab-core'),
			'add_new'            => __( 'Add New  Portfolio', 'prefab-core'),
			'edit_item'          => __( 'Edit  Portfolio', 'prefab-core'),
			'update_item'        => __( 'Update  Portfolio', 'prefab-core'),
			'search_items'       => __( 'Search  Portfolio', 'prefab-core'),
			'not_found'          => __( 'Not found', 'prefab-core'),
			'not_found_in_trash' => __( 'Not found in Trash', 'prefab-core'),
		);

		$args   = array(
			'label'               => __( 'Portfolio', 'prefab-core'),
			'description'         => __( 'Create and manage all Prefab Portfolio', 'prefab-core'),
			'labels'              => $labels,
			'supports'            => array( 'title', 'author', 'thumbnail', 'editor', 'excerpt', 'custom-fields'),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 14,
			'rewrite'             =>  array( 'slug' => 'prefab-portfolio', 'with_front' => false ),
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-format-quote',
		);
		register_post_type( 'prefab-portfolio', $args );
	}
	
	public function create_cat() {

		$name = 'Portfolio Category';
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
		register_taxonomy('portfolio-cat','prefab-portfolio', $args );

	}
	
	public function create_location_cat() {

		$name = 'Location';
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
		register_taxonomy('portfolio-location','prefab-portfolio', $args );

	}
	
	public function add_meta( array $prefab ) {

		$prefab[] = array(
			'id'           => 'prefab-portfolio',
			'title'        => esc_html__( 'Portfolio Extra Info', 'prefab-core' ),
			'object_types' => array( 'prefab-portfolio'),
			'fields'       => array(
				array(
					'name' => esc_html__( 'Date', 'prefab-core'),
					'id'   => 'portfolio_date',
					'type' => 'text_date',
				),
				array(
					'name' => esc_html__( 'Company Name', 'prefab-core'),
					'id'   => 'company_name',
					'type' => 'text',
				),
				array(
					'name' => esc_html__( 'Gallery Image', 'prefab-core'),
					'id'   => 'image',
					'type' => 'file',
				)
			)
		);
		return $prefab;
	}

	public function add_page_meta(array $prefab) {
		$prefab[] = array(
			'id'           => 'prefab-page',
			'title'        => esc_html__( 'Page Info', 'prefab-core' ),
			'object_types' => array( 'page'),
			'fields'       => array ( 
				array(
					'name' => esc_html__( 'Is it invisible breadcrumb?', 'prefab-core'),
					'id'   => 'invisible_breadcrumb',
					'type' => 'checkbox',
				),
				array(
					'name' => esc_html__( 'Enable Secondary Logo', 'prefab-core'),
					'id'   => 'enable_sec_logo',
					'type' => 'checkbox',
				),
				array (
					'name' => esc_html__( 'Header Style', 'prefab-core' ),
					'id' => 'choice_header_style',
					'type' => 'select',
					'show_option_none' => false,
					'options' => array(
						'default' => esc_html__( 'Default', 'prefab-core' ),
						'transparent' => esc_html__( 'Transparent', 'prefab-core' ),
						'transparent_moon' => esc_html__( 'Transparent with Moon', 'prefab-core' ),
						'logo_topbar' => esc_html__( 'Logo in topbar', 'prefab-core' ),
					),
				),
				array (
					'name' => esc_html__( 'Footer Style', 'prefab-core' ),
					'id' => 'choice_footer_style',
					'type' => 'select',
					'show_option_none' => false,
					'options' => array(
						'default' => esc_html__( 'Default', 'prefab-core' ),
						'default_full_width' => esc_html__( 'Default with full width', 'prefab-core' ),
						'dark' => esc_html__( 'Dark', 'prefab-core' ),
						'drak_full_width' => esc_html__( 'Dark with full width', 'prefab-core' ),
					),
				)
				
			)
		);

		return $prefab;
	}

	/**
	 * Hook in and add a metabox to add fields to the user profile pages
	 */
	public function add_profile_meta(array $prefab) {
		$prefab[] = array(
			'id'           => 'prefab-profile-edit',
			'title'        => esc_html__( 'Profile Media links', 'prefab-core' ),
			'object_types' => array( 'user'),
			'fields'       => array ( 
				array(
					'name' => esc_html__( 'Facebook Url', 'prefab-core'),
					'id'   => 'profile_fb_url',
					'type' => 'text_url',
				),
				array(
					'name' => esc_html__( 'Twitter Url', 'prefab-core'),
					'id'   => 'profile_twitter_url',
					'type' => 'text_url',
				),
				array(
					'name' => esc_html__( 'Google Plus Url', 'prefab-core'),
					'id'   => 'profile_google_url',
					'type' => 'text_url',
				),
				array(
					'name' => esc_html__( 'Instagram Url', 'prefab-core'),
					'id'   => 'profile_instagram_url',
					'type' => 'text_url',
				)
				
			)
		);

		return $prefab;
	}



}

new PrefabPortfolioPost();