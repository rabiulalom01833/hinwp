<?php
add_shortcode( 'prefab_heading', function($atts, $content = null) {

	extract(shortcode_atts(array(
		'style_class' => '',
		'heading' => '',
		'sub_heading' => '',
		'text_align' => '',
		'custom_design' => '',
		'custom_class'	=> '',
	), $atts));

	if($style_class == 'Style 2') {
		$area_title_class = 'features-title ';
	}
	elseif($style_class == 'Style 1') {
		$area_title_class = 'section-title';
	}
	else {
		$area_title_class = 'section-title section-title-2';
	}
	$textal = ( $text_align == 'Center' ) ? 'text-center' : 'text-left';
	$all_class =  $area_title_class .' '. $custom_class .' '. $textal;

	$custom_design = vc_shortcode_custom_css_class( $custom_design, ' ' );
	$heading = html_entity_decode(vc_value_from_safe( $heading, true ));

	$output ='';
	$output .= '<div class="'. $all_class .' '. $custom_design .'">';
		$output .= '<h2>'.$heading.'</h2>';
		if($sub_heading!='')
			$output .= '<p>'.$sub_heading.'</p>';
	$output .= '</div>';

	return $output;

});


//Visual Composer
if (class_exists('WPBakeryVisualComposerAbstract')) {

	vc_map( array (
		"name" => esc_html__("Prefab Heading", 'prefab-core'),
		"base" => "prefab_heading",
		'icon' => 'icon-thm-title',
		"class" => "",
		"description" => esc_html__("Heading", 'prefab-core'),
		"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => __("Display Style", 'prefab-core'),
				"param_name" => "style_class",
				"value"=> array( '1' => 'Style 1' , '2'=> 'Style 2','3'=> 'Style 3' )
			),
			array(
				"type" => "textarea_safe",
				"heading" => __("Heading", 'prefab-core'),
				"param_name" => "heading",
				"value" => "",
			),
			array(
				"type" => "textarea_safe",
				"heading" => __("Sub Heading", 'prefab-core'),
				"param_name" => "sub_heading",
			),
			array(
				"type" => "dropdown",
				"heading" => __("Text Align", 'prefab-core'),
				"param_name" => "text_align",
				"value"=>array('1'=>'Left','2'=>'Center'),
			),
			array(
				'type' => 'textfield',
				'heading' => __('Class','prefab-core'),
				'param_name' => 'custom_class',
			),
			array(
				'type' => 'css_editor',
				'heading' => __( 'Css', 'prefab-core' ),
				'param_name' => 'custom_design',
				'group' => __( 'Design options', 'prefab-core' ),
			)
		)
	));
}