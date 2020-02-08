<?php
	add_shortcode( 'prefab_slider', function($atts, $content) {
		extract(shortcode_atts(array(
				'custom_design' => '',
				), $atts));
		$custom_design = vc_shortcode_custom_css_class( $custom_design, ' ' );
		$output = '';
			$output .= '<div class="slider-area">';
				$output .= '<div class="slider-active dot-style">';
					$output .= do_shortcode($content);
				$output .= '</div>';
			$output .= '</div>';
		return $output;
	});


	add_shortcode( 'prefab_slider_item', function($atts, $content) {

		$atts = shortcode_atts(array(
			'bac_slider_image' => '',
			'fr_slider_image' => '',
			'top_title' => '',
			'title' => '',
			'description' => '',
			'url' => '',
			'style' => 1,
		), $atts);

		if( $atts['style'] == 2 ) {

			return prefab_second_slider($atts);
		}
		elseif( $atts['style'] == 3 ) {

			return prefab_third_slider($atts);
		}
		elseif( $atts['style'] == 4 ) {

			return prefab_fourth_slider($atts);
		}
		elseif( $atts['style'] == 5 ) {

			return prefab_fifth_slider($atts);
		}
		elseif( $atts['style'] == 6 ) {

			return prefab_first_slider_no_padding($atts);
		}
		else {

			return prefab_first_slider($atts);
		}

	});


	vc_map(array(
		"name" => esc_html__("Prefab Slider", 'prefab-core'),
		"base" => "prefab_slider",
		'icon' => 'icon-thm-title',
		"js_view" => 'VcColumnView',
		"as_parent" => array('only' => 'prefab_slider_item'),
		"description" => esc_html__("Slider", 'prefab-core'),
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
		"name" => esc_html__("Prefab Slider Item", 'prefab-core'),
		"base" => "prefab_slider_item",
		'icon' => 'icon-thm-title',
		"as_child" => array('only' => 'prefab_slider'),
		"description" => esc_html__("Slider Item", 'prefab-core'),
		"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
		"params" => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Style','prefab-core'),
				'param_name' => 'style',
				'value'       => array(
					'First Style'   => 1,
					'Second Style Full Screen'   => 2,
					'Third Style'   => 3,
					'Fourth Style'   => 4,
					'Fifth Style'   => 5,
					'First Style With No Padding'   => 6,
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Top Title','prefab-core'),
				'param_name' => 'top_title',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title','prefab-core'),
				'param_name' => 'title',
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Description','prefab-core'),
				'param_name' => 'description',
			),
			array(
				'type' => 'vc_link',
				'heading' => __( 'Button', 'prefab-core' ),
				'param_name' => 'url',
			),
			array(
				'type' => 'attach_image',
				'heading' => __( 'Front Slider Image', 'prefab-core' ),
				'param_name' => 'fr_slider_image',
			),
			array(
				'type' => 'attach_image',
				'heading' => __( 'Background Slider Image', 'prefab-core' ),
				'param_name' => 'bac_slider_image',
			)
		)
	));

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_prefab_slider extends WPBakeryShortCodesContainer {}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_prefab_slider_item extends WPBakeryShortCode {}
	}
