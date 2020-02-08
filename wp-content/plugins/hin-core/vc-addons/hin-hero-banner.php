<?php

/**
 * Hero Banner VC Addon
 */

add_shortcode( 'hero_banner', function($atts, $content = null) {

	extract(shortcode_atts(array(
		'add_name' => '',
		'add_designation' => '',
		'add_details' => '',
		'url' => '',
		'man_mage' => '',
 	), $atts));

 
 
    $description = html_entity_decode(vc_value_from_safe( $description, true ));
    $url = vc_build_link( $url );
	$page_link = isset($url['url']) ? $url['url'] : '#';
    $link_title = isset($url['title']) ? $url['title'] : 'Shop now';
    $man_mage = wp_get_attachment_image_src( $man_mage, 'full' );

    $output ='';
    
    $output .= '<section id="hero-area1" class="hero-top '.$class.'">';
        $output .= '<div class="hero1-all-images-wrapper">';
            $output .= '<img class="hero1-left" src="assets/img/home1/hero1-left.png" alt="">';
            $output .= '<img class="shape-left" src="assets/img/home1/hero1-left-shape.png" alt="">';
            $output .= '<img class="shape-right-same" src="assets/img/home1/hero1-left-shape.png" alt="">';
            $output .= '<img class="shape-right" src="assets/img/home1/hero1-right-shape.png" alt="">';
            $output .= '<img class="man-middle" src="assets/img/home1/hero-man-111.png" alt="">';
            $output .= '<img class="hero-dots-1" src="assets/img/home1/hero-dot-1.png" alt="">';
            $output .= '<img class="hero-dots-2" src="assets/img/home1/hero-dot-2.png" alt="">';
            $output .= '<img class="hero-triangle" src="assets/img/home1/triangle.png" alt="">';
            $output .= '<img class="hero-triangle2" src="assets/img/home1/triangle.png" alt="">';
            $output .= '<img class="hero-triangle3" src="assets/img/home1/triangle.png" alt="">';
            $output .= '<img class="hero-cross" src="assets/img/home1/cross.png" alt="">';
            $output .= '<img class="hero-circle" src="assets/img/home1/circle.png" alt="">';
        $output .= '</div>';
        $output .= '<div class="hero-item1 bg-dark-black">';
            $output .= '<div class="container">';
                $output .= '<div class="row">';
                    $output .= '<div class="col-lg-7">';
                        $output .= '<div class="hero-text-home1 text-left">';
                            $output .= '<h3>'.$add_name.'</h3>';
                            $output .= '<h1 class="text-yellow">'.$add_name.'</h1>';
                            $output .= '<h4>'.esc_html($add_name).'</h4>';
                                $output .= '<a href="'. esc_url($page_link) .'" class="btn-1 btn-bgc-1">Download CV</a>';
                                $output .= '<a href="'. esc_url($link_title) .'" class="btn-1 btn-bgc-2">Explore Work</a>';
                         $output .= '</div>';
                     $output .= '</div>';
                    $output .= '<div class="col-lg-5"></div>';
                $output .= '</div>';
             $output .= '</div>';
        $output .= '</div>';
    $output .= '</section>';
 

	return $output;

});


//Visual Composer
if (class_exists('WPBakeryVisualComposerAbstract')) {

	vc_map( array (
		"name" => esc_html__("Hero banner", 'hin-core'),
		"base" => "hero_banner",
		'icon' => 'icon-thm-title',
		"class" => "",
		"description" => esc_html__("Hero Banner", 'hin-core'),
		"category" => esc_html__('Hin Shortcode', 'hin-core'),
		"params" => array(
             
              
			array(
				'type' => 'textfield',
				'heading' => __('Full Name','hin-core'),
				'param_name' => 'add_name',
            ),
            
			array(
				"type" => "textfield",
				"heading" => __("designation", 'hin-core'),
				"param_name" => "add_designation",
				"value" => "",
            ),
            array(
				"type" => "textarea",
				"heading" => __("Details Bio", 'hin-core'),
				"param_name" => "add_details",
				"value" => "",
            ),

            array(
				"type" => "vc_link",
				"heading" => __("Button", 'hin-core'),
				"param_name" => "url",
             ),
          
			array(
				'type' => 'attach_image',
				'heading' => __( 'Man Image', 'hin-core' ),
				'param_name' => 'man_mage',
            ),
            array(
				'type' => 'textfield',
				'heading' => esc_html__('Class','hin-core'),
				'param_name' => 'class',
			),
            

		)
	));
}