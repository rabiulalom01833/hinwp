<?php

add_shortcode( 'prefab_single_image', function($atts, $content = null) {

	extract(shortcode_atts(array(
		'image' 	=> '',
		'text_align' 	=> '',
		'custom_design' => '',
		'class'		=> '',
		), $atts));

	$output ='';
	$textal = ($text_align==2)?'text-left':'text-center';
	$class = $class.' '.$textal;
	$custom_design = vc_shortcode_custom_css_class( $custom_design, ' ' );

	$image = wp_get_attachment_image_src( $fr_slider_image, 'full');

	$output .= '<div class="cap text-center pt-140 '. $custom_design . ' ' . $class .'">';
        $output .= '<img src="'. current($image) .'" alt="'.esc_attr__('img','prefab-core').'">';
    $output .= '</div>';
    
	return $output;

});


//Visual Composer
if (class_exists('WPBakeryVisualComposerAbstract')) {
	
	vc_map(array(
		"name" => esc_html__("Prefab Single Image", 'prefab-core'),
		"base" => "prefab_single_image",
		'icon' => 'icon-thm-title',
		"class" => "",
		"description" => esc_html__("Heading", 'prefab-core'),
		"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
		"params" => array(
			array(
				'type' => 'attach_image',
				'heading' => __( 'Single Image', 'prefab-core' ),
				'param_name' => 'image',
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Text Align", 'prefab-core'),
				"param_name" => "text_align",
				"value"=>array('Center'=>'1','Left'=>'2'),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Class','prefab-core'),
				'param_name' => 'class',
			),
			array(
				'type' => 'css_editor',
				'heading' => __( 'Prefab Css', 'prefab-core' ),
				'param_name' => 'custom_design',
				'group' => __( 'Design options', 'prefab-core' ),
			)
		)
	));
}