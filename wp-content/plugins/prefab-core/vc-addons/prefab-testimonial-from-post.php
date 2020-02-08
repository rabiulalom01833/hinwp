<?php
add_shortcode( 'prefab_testimonial_from_post', function( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'count' => '6',
		'dis_style'	=> 'Main Style',
	), $atts));
		

	$q = new WP_Query(array('posts_per_page' => $count,'post_type' => 'prefab-testimonial')); 
	$output = '';
	$nav_output = '';

	if(  $q->have_posts() ):

		global $post;

		$output .= '<div class="testimonial-area pt-100 pb-100 gray-bg">'; 
			$output .= '<div class="container">'; 
				$output .= '<div class="row">'; 
					$output .= '<div class="col-xl-8 offset-xl-2">'; 
						$output .= '<div class="testimonia-item-active">';

							while($q->have_posts()) : $q->the_post(); //start while
									
								$full_name = get_post_meta(get_the_ID(),'full_name',true);
								$designation = get_post_meta(get_the_ID(),'designation',true);
								$image = get_post_meta(get_the_ID(),'image',true);

								$output .= '<div class="testimonial-item text-center">';
									$output .= '<i class="fas fa-quote-right"></i>';
									$output .=  '<p>'. get_post_field('post_content', get_the_ID()) .'</p>'; 
									$output .= '<div class="designation">';
										$output .= '<h3>'. esc_html($full_name) .'</h3>';
										$output .= '<span>'. esc_html($designation) .'</span>';
									$output .= '</div>';
								$output .= '</div>';
												  
							endwhile;//endwhile
							wp_reset_postdata();

						$output.= '</div>';	
						$output.= '<div class="testimonial-nav">';	

							while($q->have_posts()) : $q->the_post(); //start while
									
								$full_name = get_post_meta(get_the_ID(),'full_name',true);
								$image = get_post_meta(get_the_ID(),'image',true);

								$output .= '<div class="testimonial-thumb"><img src="'.esc_url( $image ).'" alt="'. esc_html($full_name) .'"></div>';
																  
							endwhile;//endwhile
							wp_reset_postdata();
						$output.= '</div>';	
					$output.= '</div>';	
				$output.= '</div>';	
			$output.= '</div>';	
		$output.= '</div>';	
	endif;//endif 
	return $output;//return

});


//Visual Composer
if (class_exists('WPBakeryVisualComposerAbstract')) {
	
	vc_map(array(
		"name" => esc_html__("Prefab Post Testimonial", 'prefab-core'),
		"base" => "prefab_testimonial_from_post",
		'icon' => 'icon-thm-title',
		"class" => "",
		"description" => esc_html__("Prefab Post Testimonial", 'prefab-core'),
		"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => __("Display Style", 'prefab-core'),
				"param_name" => "dis_style",
				"value"=> array( '1' => 'Main Style' , '2'=> 'Full-width Style' )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Testimonials Count", 'prefab-core'),
				"param_name" => "count",
			)
		
		)
	));
}