<?php

add_shortcode( 'prefab_service', function($atts, $content) {
	extract(shortcode_atts(array(
		'custom_design' 	=> '',
	), $atts));

	$custom_design = vc_shortcode_custom_css_class( $custom_design, ' ' );

	$class = 'service_'.rand();
	$output = '';
    
	$output .= '<div class="features-area pt-100 pb-70 '. $class .'">';
		$output .= '<div class="container">';
			$output .= '<div class="row">';
				$output .= do_shortcode($content);
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</div>';


	return $output;

});

add_shortcode( 'prefab_service_item', function($atts, $content) {

	extract(shortcode_atts(array(
		'image'	=> '',
		'title' => '',
		'description' => '',
		'grid_number' => '4',
	), $atts));

	$image = wp_get_attachment_image_src( $image, 'full');


	$output = '';
    $output .= '<div class="col-xl-'. $grid_number .' col-lg-'. $grid_number .' col-md-'. $grid_number .'">';
    	$output .= '<div class="single-features text-center mb-30">';
			if(!empty($image)){
				$output .= '<img src="'.current($image).'" alt="'.esc_attr__('img','prefab-core').'">';
			}
			if($title!='')
				$output .= '<h2>'. esc_html($title) .'</h2>';
			if($description!='')
				$output .= '<p>'. esc_html($description) .'</p>';
		$output .= '</div>';
	$output .= '</div>';

	return $output;
});


vc_map(array(
	"name" => esc_html__("Prefab Service", 'prefab-core'),
	"base" => "prefab_service",
	'icon' => 'icon-thm-title',
	"js_view" => 'VcColumnView',
	"as_parent" => array('only' => 'prefab_service_item'),
	"description" => esc_html__("Brand", 'prefab-core'),
	"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
	"params" => array(
		array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'prefab-core' ),
			'param_name' => 'custom_design',
			'group' => __( 'Design options', 'prefab-core' ),
		)	
	)
));

vc_map(array(
	"name" => esc_html__("Prefab Service Item", 'prefab-core'),
	"base" => "prefab_service_item",
	'icon' => 'icon-thm-title',
	"as_child" => array('only' => 'prefab_service'),
	"description" => esc_html__("Brand Item", 'prefab-core'),
	"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
	"params" => array (
		array (
			'type' => 'textfield',
			'heading' => esc_html__('Title','prefab-core'),
			'param_name' => 'title',
		),
		array (
			'type' => 'textarea',
			'heading' => esc_html__('Description','prefab-core'),
			'param_name' => 'description',
		),

		array (
			'type' => 'attach_image',
			'heading' => __( 'Image', 'prefab-core' ),
			'param_name' => 'image',
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Service Grid", 'prefab-core'),
			"param_name" => "grid_number",
			"value"=> array(
				'3 Columns'=>'3', 
				'4 Columns'=>'4', 
				'6 Columns'=>'6'
			),
		)
	)
));

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_prefab_service extends WPBakeryShortCodesContainer {}
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_prefab_service_item extends WPBakeryShortCode {}
}


