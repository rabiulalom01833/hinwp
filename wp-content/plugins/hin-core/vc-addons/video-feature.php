<?php

/**
 * Video Feature VC Addon
 */

add_shortcode( 'video_feature', function($atts, $content = null) {

	extract(shortcode_atts(array(
		'add_video_title' => '',
		'video_add_details' => '',
		'url' => '',
		'youtube_video_url' => '',
		'video_cover_img' => '',
	 
 	), $atts));

 
 
    $description = html_entity_decode(vc_value_from_safe( $description, true ));
    $url = vc_build_link( $url );
 	$read_more_url = isset($url['url']) ? $url['url'] : '#';
    $video_cover_img = wp_get_attachment_image_src( $video_cover_img, 'full');

    $output ='';
    
$output .= '<section id="Hin-video-area" class="bg-dark-black pt-130">';
    $output .= '<div class="videos-shape-img">';
        $output .= '<img class="left-video-img" src="assets/img/home1/left-video-img.png" alt="">';
        $output .= '<img class="video-left-shadow-img" src="assets/img/home1/video-left-shadow.png" alt="">';
    $output .= '</div>';
    $output .= '<div class="container">';
        $output .= '<div class="row">';
            $output .= '<div class="col-lg-6 col-md-12">';
                $output .= '<div class="section-title">';
                    $output .= '<h2>'.$add_video_title.'</h2>';
                    $output .= '<div class="section-title-border"></div>';
                    $output .= '<p class="mt-5">'.$video_add_details.'</p>'; 
                    $output .= '<a href="'. esc_url($read_more_url) .'" class="btn-4 btn-bgc-1 mt-50">Read More</a>';
                $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="col-lg-5 offset-lg-1 col-md-8 offset-md-2">';
                $output .= '<div class="videos-manage-all">';
                    $output .= '<div class="single-video-img">';
                        $output .= '<img src="'.current($video_cover_img).'" alt="">';
                        $output .= '<a class="open-videos" href="'.$youtube_video_url.'"><i class="fas fa-play"></i></a>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</div>';
$output .= '</section>  ';   

	return $output;

});


//Visual Composer
if (class_exists('WPBakeryVisualComposerAbstract')) {

	vc_map( array (
		"name" => esc_html__("Video Feature", 'hin-core'),
		"base" => "video_feature",
		'icon' => 'icon-thm-title',
		"class" => "",
		"description" => esc_html__("Video Feature", 'hin-core'),
		"category" => esc_html__('Hin Shortcode', 'hin-core'),
		"params" => array(
             
              
			array(
				'type' => 'textfield',
				'heading' => __('Video Title','hin-core'),
				'param_name' => 'add_video_title',
            ),
           
            array(
				"type" => "textarea",
				"heading" => __("Video Details", 'hin-core'),
				"param_name" => "video_add_details",
				"value" => "",
            ),

            array(
				"type" => "vc_link",
				"heading" => __("Read More Url", 'hin-core'),
				"param_name" => "url",
             ),

             array(
				'type' => 'textfield',
				'heading' => __('Youtube Video Url','hin-core'),
				'param_name' => 'youtube_video_url',
            ),
          
			array(
				'type' => 'attach_image',
				'heading' => __( 'Video cover Image', 'hin-core' ),
				'param_name' => 'video_cover_img',
            ),

            array(
				'type' => 'textfield',
				'heading' => esc_html__('Class','hin-core'),
				'param_name' => 'class',
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