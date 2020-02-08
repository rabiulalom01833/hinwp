<?php

	add_shortcode( 'prefab_counter', function($atts, $content) {
		extract(shortcode_atts(array(
				'custom_design' => '',
				'bg_image' => '',
				'wrp_view_style' => '1',
				), $atts));
		$custom_design = vc_shortcode_custom_css_class( $custom_design, ' ' );
		$bg_image = wp_get_attachment_image_src( $bg_image, 'full');

		$output = '';


        $class = 'counter_'.rand();

		if( $wrp_view_style == 2 ) {

			$output .= '<div class="counter-area pt-75 pb-45 '. $class .'">';
				$output .= '<div class="container">';
					$output .= '<div class="row">';
						$output .= do_shortcode($content);
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';

		}
		elseif ($wrp_view_style == 3) {
			$output .= '<div class="counter-area pt-75 pb-45 '. $class .'">';
				$output .= '<div class="container">';
					$output .= '<div class="row">';
						$output .= do_shortcode($content);
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';
		}
		else {

			$output .= '<div class="counter-area wrapper-section-box pt-75 pb-45 '. $class .'">';
				$output .= '<div class="container">';
					$output .= '<div class="row">';
						$output .= do_shortcode($content);
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';

		}

		if ( !empty( $class ) ) {
				$output .= '<style>.'. $class . '{background-image:url('. @current($bg_image) .')}</style>';
			}

		return $output;

	});

	add_shortcode( 'prefab_counter_item', function($atts, $content) {

		extract(shortcode_atts(array(
			'image'	=> '',
			'title' => '',
			'number' => '',
			'counter_grid_number' => '3',
			'view_style' => '1',
		), $atts));

		$image = wp_get_attachment_image_src( $image, 'full');

		//var_dump($counter_grid_number); die;

		$output = '';

        if( $view_style == 2 ) {

        	$output .= '<div class="col-xl-3 col-lg-3 col-md-3">';
	            $output .= '<div class="single-couter counter-2  d-xl-flex mb-30">';
	                $output .= '<span>'. number_format($number) .'</span>';
	                $output .= '<p>'. $title .'</p>';
	            $output .= '</div>';
	        $output .= '</div>';
		}

        else {
        	$output .= '<div class="col-xl-'. $counter_grid_number .' col-lg-'. $counter_grid_number .' col-md-'. $counter_grid_number .'">';
	            $output .= '<div class="single-couter text-center mb-30">';
					$output .= '<img src="'.current($image).'" alt="'.esc_attr__('img','prefab-core').'">';
	        		$output .= '<span class="counter">'. number_format($number) .'</span>';
	        		$output .= '<p>'. $title .'</p>';
	        	$output .= '</div>';
	        $output .= '</div>';
        }

		return $output;
	});


	vc_map(array(
		"name" => esc_html__("Prefab Counter", 'prefab-core'),
		"base" => "prefab_counter",
		'icon' => 'icon-thm-title',
		"js_view" => 'VcColumnView',
		"as_parent" => array('only' => 'prefab_counter_item'),
		"description" => esc_html__("Brand", 'prefab-core'),
		"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("View Style", 'prefab-core'),
				"param_name" => "wrp_view_style",
				"value"=>array('Style 1' => 1,'Style 2' =>2,'Style 1 with no padding' =>3)
			),
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
		"name" => esc_html__("Prefab Counter Item", 'prefab-core'),
		"base" => "prefab_counter_item",
		'icon' => 'icon-thm-title',
		"as_child" => array('only' => 'prefab_counter'),
		"description" => esc_html__("Brand Item", 'prefab-core'),
		"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("View Style", 'prefab-core'),
				"param_name" => "view_style",
				"value"=>array('Style 1' => 1,'Style 2' =>2)
			),
			array(
				'type' => 'textfield',
				'heading' => __('Counter Title','prefab-core'),
				'param_name' => 'title',
			),
			array(
				'type' => 'textfield',
				'heading' => __('Number of Counter','prefab-core'),
				'param_name' => 'number',
			),
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image', 'prefab-core' ),
				'param_name' => 'image',
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Counter Grid", 'prefab-core'),
				"param_name" => "counter_grid_number",
				"value"=> array(
					'3 Columns'=>'3',
					'4 Columns'=>'4',
					'6 Columns'=>'6'
				),
			)
		)
	));

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_prefab_counter extends WPBakeryShortCodesContainer {}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_prefab_counter_item extends WPBakeryShortCode {}
	}


