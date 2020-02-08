<?php
add_shortcode( 'prefab_contact', function($atts, $content = null) {

	extract(shortcode_atts( array(
			'title'	=> '',
			'shortcode' => '',
			'custom_design' => '',
	), $atts));
	$output = '';
	$custom_design = vc_shortcode_custom_css_class( $custom_design, ' ' );
	$output .= '<div class="contact-form '.$custom_design.'">';
		$output .= '<h3>'.$title.'</h3>';
		$output .= do_shortcode(html_entity_decode(vc_value_from_safe( $shortcode, true )));
	$output .= '</div>';
	return $output;//return

});


//Visual Composer
if (class_exists('WPBakeryVisualComposerAbstract')) {
	vc_map(array(
		"name" => esc_html__("Prefab Contact", 'prefab-core'),
		"base" => "prefab_contact",
		'icon' => 'icon-thm-title',
		"class" => "",
		"description" => esc_html__("Blog Slider", 'prefab-core'),
		"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
		"params" => array(
			array (
				"type" => "textfield",
				"heading" => esc_html__("Title", 'prefab-core'),
				"param_name" => "title",
			),
			array(
				"type" => "textarea_safe",
				"heading" => esc_html__("Shortcode", 'prefab-core'),
				"param_name" => "shortcode",
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