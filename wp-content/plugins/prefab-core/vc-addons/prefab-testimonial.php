<?php

	add_shortcode( 'prefab_testimonial', function($atts, $content) {
	extract(shortcode_atts(array(
		'custom_design' => '',
		'dis_style'	=> 'Main Style',
	), $atts));

	$custom_design = vc_shortcode_custom_css_class( $custom_design, ' ' );

	$no_gutters = '';
	$margin_bottom = 'mb-30';

	if( $dis_style == 'Custom Style' ) {
		$no_gutters = 'no-gutters';
		$margin_bottom = '';
	}

	$output = '';
	$output .= '<div class="testimonial-area pt-100 pb-100">';
    	$output .= '<div class="container">';
    		$output .= '<div class="custom-row">';
        		$output .= '<div class="testimonial-active dot-style">';
        		$output .= do_shortcode($content);
        	$output .= '</div>';
    	$output .= '</div>';
    $output .= '</div>';

	return $output;

	});

	add_shortcode( 'prefab_testimonial_item', function($atts, $content) {
		extract(shortcode_atts(array(
				'name' 	=> '',
				'designation' 	=> '',
				'description' 		=> '',
				'image' 		=> '',
				), $atts));

		$image = wp_get_attachment_image_src( $image, 'full');
		$description = html_entity_decode(vc_value_from_safe( $description, true ));

		$class = 'testimonial_'.rand();
		$output = '';
		$output .= '<div class="col-xl-6">';
            $output .= '<div class="testimonial-wrapper text-center">';
                $output .= '<div class="testimonial-img">';
                    $output .= '<img src="'. current($image) .'" alt="'. $name .'">';
                $output .= '</div>';
                $output .= '<p>'. $description .'</p>';
                $output .= '<div class="client-info">';
                    $output .= '<h4>'. $name .'</h4>';
                    $output .= '<span>'. $designation .'</span>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';

		return $output;
	});


	vc_map(array(
		"name" => esc_html__("Prefab Testimonial", 'prefab-core'),
		"base" => "prefab_testimonial",
		'icon' => 'icon-thm-title',
		"js_view" => 'VcColumnView',
		"as_parent" => array('only' => 'prefab_testimonial_item'),
		"description" => esc_html__("Testimonial", 'prefab-core'),
		"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => __("Display Style", 'prefab-core'),
				"param_name" => "dis_style",
				"value"=> array( '1' => 'Main Style' , '2'=> 'Custom Style' )
			),
			array(
				'type' => 'css_editor',
				'heading' => __( 'Css', 'prefab-core' ),
				'param_name' => 'custom_design',
				'group' => __( 'Design options', 'prefab-core' ),
			)
		)
	));
	
	vc_map(array(
		"name" => esc_html__("Prefab Testimonial Item", 'prefab-core'),
		"base" => "prefab_testimonial_item",
		'icon' => 'icon-thm-title',
		"as_child" => array('only' => 'prefab_testimonial'),
		"description" => esc_html__("Testimonial Item", 'prefab-core'),
		"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
		"params" => array(
			array(
				'type' => 'textfield',
				'heading' => __('Full Name','prefab-core'),
				'param_name' => 'name',
			),
			array(
				'type' => 'textfield',
				'heading' => __('Designation','prefab-core'),
				'param_name' => 'designation',
			),
			array(
				"type" => "textarea_safe",
				"Promotion" => __("Description", 'prefab-core'),
				"param_name" => "description",
				"value" => "",
			),
			array(
				'type' => 'attach_image',
				'heading' => __( 'Profile Image', 'prefab-core' ),
				'param_name' => 'image',
			)
		
		)
	));
	
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_prefab_testimonial extends WPBakeryShortCodesContainer {}
	}
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_prefab_testimonial_item extends WPBakeryShortCode {}
	}