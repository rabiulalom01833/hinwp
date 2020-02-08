<?php
/**
 * Promotion Section VC Addon
 */

add_shortcode( 'prefab_promotion', function($atts, $content = null) {

	extract(shortcode_atts(array(
		'title' 	=> '',
		'short_description' 	=> '',
		'description' 		=> '',
		'url' 	=> '',
		'class' => '',
		'promo_image' => '',
		'view_style' => '1',
	), $atts));


	$title = html_entity_decode( vc_value_from_safe( $title, true ) );
	$description = html_entity_decode(vc_value_from_safe( $description, true ));
	$url = vc_build_link( $url );
	$page_link = isset($url['url']) ? $url['url'] : '#';
	$link_title = isset($url['title']) ? $url['title'] : 'Shop now';
	$promo_image = wp_get_attachment_image_src( $promo_image, 'full' );


	$output ='';

	if( $view_style == 2 ) {

	    $output .= '<div class="promotion-area '.$class.'">';
            $output .= '<div class="container">';
                $output .= '<div class="row">';
                    $output .= '<div class="col-xl-6 col-lg-6">';
                	if ( !empty($promo_image) ) {

                        $output .= '<div class="cta-img">';
                            $output .= '<img src="'. current($promo_image) .'" alt="'.esc_attr__('img','prefab-core').'">';
                        $output .= '</div>';
                	}
                    $output .= '</div>';
                    $output .= '<div class="col-xl-6 col-lg-6">';
                        $output .= '<div class="promotion-text promo-2">';
                            $output .= '<h3>'. $title .'</h3>';
                            $output .= '<span>'. esc_html($short_description) .'</span>';
                            $output .= '<P>'. $description .'</P>';
                            $output .= '<a href="'. esc_url($page_link) .'" class="btn brand-btn btn-2">'. $link_title .'</a>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';

	}
	else {

		$inner_class = 'promo_'. rand();

		$output .= '<div class="promotion-area wrapper-section-box gray-bg '.$class.'">';
		    $output .= '<div class="promotion-img d-none d-md-block '. $inner_class .'"></div>';
		    $output .= '<div class="container">';
		        $output .= '<div class="row">';
		            $output .= '<div class="col-xl-6 offset-xl-6 col-lg-6 offset-lg-6 col-md-6 offset-md-6">';
		                $output .= '<div class="promotion-text pt-110 pb-110">';
		                    $output .= '<h3>'. $title .'</h3>';
		                    $output .= '<span>'. esc_html($short_description) .'</span>';
		                    $output .= '<p>'. $description .'</p>';
		                    $output .= '<a href="'. esc_url($page_link) .'" class="btn brand-btn">'. $link_title .'</a>';
		                $output .= '</div>';
		            $output .= '</div>';
		        $output .= '</div>';
		    $output .= '</div>';
		$output .= '</div>';

		if ( !empty( $inner_class ) ) {
			$output .= '<style>.'. $inner_class . '{background-image:url('. current($promo_image) .')}</style>';
		}
	}


	return $output;

});


//Visual Composer
if (class_exists('WPBakeryVisualComposerAbstract')) {

	vc_map(array(
		"name" => esc_html__("Prefab Promotion", 'prefab-core'),
		"base" => "prefab_promotion",
		'icon' => 'icon-thm-title',
		"class" => "",
		"description" => esc_html__("Promotion Section", 'prefab-core'),
		"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
		"params" => array(

			array(
				"type" => "textarea_safe",
				"heading" => esc_html__("Title", 'prefab-core'),
				"param_name" => "title",
				"value" => "",
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Short Description','prefab-core'),
				'param_name' => 'short_description',
			),
			array(
				"type" => "textarea_safe",
				"heading" => esc_html__("Description", 'prefab-core'),
				"param_name" => "description",
				"value" => "",
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'Button', 'prefab-core' ),
				'param_name' => 'url',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Class','prefab-core'),
				'param_name' => 'class',
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Promo Image', 'prefab-core' ),
				'param_name' => 'promo_image',
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("View Style", 'prefab-core'),
				"param_name" => "view_style",
				"value"=>array('Style 1' => 1,'Style 2' =>2)
			)
		)
	));
}