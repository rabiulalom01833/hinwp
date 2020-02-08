<?php

	add_shortcode( 'prefab_team', function($atts, $content) {
		extract(shortcode_atts(array(
				'custom_design' => '',
				'bg_image' => '',
				), $atts));
		$custom_design = vc_shortcode_custom_css_class( $custom_design, ' ' );
		$bg_image = wp_get_attachment_image_src( $bg_image, 'full');

		$class = 'team_'.rand();
		$output = '';
        
		$output .= '<div class="team-area '. $class .'">';
			$output .= '<div class="container">';
				$output .= '<div class="row">';
					$output .= do_shortcode($content);
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';

		if ( !empty( $bg_image ) ) {
			$output .= '<style>.'. $class . '{background-image:url('. current($bg_image) .')}</style>';
		}

		return $output;

	});


	add_shortcode( 'prefab_team_item', function($atts, $content) {

		
		$vs_data = shortcode_atts(array(
			'full_name' => '',
			'designation' => '',
			'fb_url' => '',
			'twitter_url' => '',
			'google_url' => '',
			'instagram_url' => '',
			'image'	=> '',
			'grid_number' => '3',
			'view_style' => '1',
		), $atts);

		if( $vs_data['view_style'] == 2 ){
			$output = prefab_team_style_two($vs_data);
		}
		else {
			$output = prefab_team_style_one($vs_data);
		}
		return $output;
	});

	vc_map(array(
		"name" => esc_html__("Prefab Team", 'prefab-core'),
		"base" => "prefab_team",
		'icon' => 'icon-thm-title',
		"js_view" => 'VcColumnView',
		"as_parent" => array('only' => 'prefab_team_item'),
		"description" => esc_html__("Team", 'prefab-core'),
		"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
		"params" => array(
			array(
				'type' => 'attach_image',
				'heading' => __( 'Bg Image', 'prefab-core' ),
				'param_name' => 'bg_image',
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
		"name" => esc_html__("Prefab Team Item", 'prefab-core'),
		"base" => "prefab_team_item",
		'icon' => 'icon-thm-title',
		"as_child" => array('only' => 'prefab_team'),
		"description" => esc_html__("Team Item", 'prefab-core'),
		"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
		"params" => array(
			array(
				'type' => 'textfield',
				'heading' => __('Full Name','prefab-core'),
				'param_name' => 'full_name',
			),
			array(
				'type' => 'textfield',
				'heading' => __('Designation','prefab-core'),
				'param_name' => 'designation',
			),
			array(
				'type' => 'textfield',
				'heading' => __('FB url','prefab-core'),
				'param_name' => 'fb_url',
			),
			array(
				'type' => 'textfield',
				'heading' => __('Twitter url','prefab-core'),
				'param_name' => 'twitter_url',
			),
			array(
				'type' => 'textfield',
				'heading' => __('Google url','prefab-core'),
				'param_name' => 'google_url',
			),
			array(
				'type' => 'textfield',
				'heading' => __('Instagram url','prefab-core'),
				'param_name' => 'instagram_url',
			),

			array(
				'type' => 'attach_image',
				'heading' => __( 'Profile Image', 'prefab-core' ),
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
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("View Style", 'prefab-core'),
				"param_name" => "view_style",
				"value"=>array('Style 1' => 1,'Style 2' =>2)
			)
		)
	));
	
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_prefab_team extends WPBakeryShortCodesContainer {}
	}
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_prefab_team_item extends WPBakeryShortCode {}
	}


