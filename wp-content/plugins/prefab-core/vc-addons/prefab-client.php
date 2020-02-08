<?php

	add_shortcode( 'prefab_brand', function($atts, $content) {
		extract(shortcode_atts(array(
				'custom_design' => '',
				), $atts));
		$custom_design = vc_shortcode_custom_css_class( $custom_design, ' ' );
		$output = '';
			$output .= '<div class="brand-area gray-bg">';
				$output .= '<div class="container">';
					$output .= '<div class="brand-active brand-border pt-50 pb-50">';
						$output .= do_shortcode($content);
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';
		return $output;
	});

	add_shortcode( 'prefab_brand_item', function($atts, $content) {

		extract(shortcode_atts( array (
			'link_url' => '',
			'logo' 	=> '',
		), $atts ) );

		$logo = wp_get_attachment_image_src( $logo, 'full');

		$output = '';
		$output .= '<div class="single-brand">';
            $output .= '<a href="'. esc_url($link_url) .'"><img src="'. current($logo) .'" alt="'.esc_attr__('img','prefab-core').'"></a>';
        $output .= '</div>';

		return $output;
	});


	vc_map(array(
		"name" => esc_html__("Prefab Brand", 'prefab-core'),
		"base" => "prefab_brand",
		'icon' => 'icon-thm-title',
		"js_view" => 'VcColumnView',
		"as_parent" => array('only' => 'prefab_brand_item'),
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
		"name" => esc_html__("Prefab Brand Item", 'prefab-core'),
		"base" => "prefab_brand_item",
		'icon' => 'icon-thm-title',
		"as_child" => array('only' => 'prefab_brand'),
		"description" => esc_html__("Brand Item", 'prefab-core'),
		"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
		"params" => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Client link','prefab-core'),
				'param_name' => 'link_url',
			),
			array(
				'type' => 'attach_image',
				'heading' => __( 'Client Logo', 'prefab-core' ),
				'param_name' => 'logo',
			)
		)
	));
	
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_prefab_brand extends WPBakeryShortCodesContainer {}
	}
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_prefab_brand_item extends WPBakeryShortCode {}
	}