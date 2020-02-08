<?php 

function prefab_team_style_one($atts) {

	extract($atts);
	$image = wp_get_attachment_image_src( $image, 'full');

	$output = '';
	$output .= '<div class="col-xl-'. $grid_number .' col-lg-'. $grid_number .' col-md-6">';
		$output .= '<div class="single-team text-center mb-30">';
			$output .= '<div class="team-img">';
				if(!empty($image))
					$output .= '<img src="'.current($image).'" alt="'.esc_attr__('image','prefab-core').'">';
				$output .= '<div class="team-icon">';
					if( !empty($fb_url) ) {
						$output .= '<a href="'. esc_url($fb_url) .'">';
						$output .= '<i class="fab fa-facebook-f"></i>';
						$output .= '</a>';
					}
					if ( !empty($twitter_url) ) {
						$output .= '<a href="'. esc_url($twitter_url) .'">';
						$output .= '<i class="fab fa-twitter"></i>';
						$output .= '</a>';
					}
					if ( !empty($google_url) ) {
						$output .= '<a href="'. esc_url($google_url) .'">';
						$output .= '<i class="fab fa-google-plus-g"></i>';
						$output .= '</a>';
					}
					if ( !empty($instagram_url) ) {
						$output .= '<a href="'. esc_url($instagram_url) .'">';
						$output .= '<i class="fab fa-instagram"></i>';
						$output .= '</a>';
					}
				$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="team-info">';
				$output .= '<h3>'. esc_html($full_name) .'</h3>';
				$output .= '<span>'. esc_html($designation) .'</span>';
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</div>';

	return $output;
}

function prefab_team_style_two($atts){
	extract($atts);

	$image = wp_get_attachment_image_src( $image, 'full');
	
	$output = '';
	$output .= '<div class="col-xl-'. $grid_number .' col-lg-'. $grid_number .' col-md-6">';
		$output .= '<div class="team-box text-center mb-30 white-bg">';
			
			$output .= '<div class="team-thumb">';
				$output .= '<img src="'.current($image).'" alt="'.esc_attr__('image','prefab-core').'">';
			$output .= '</div>';
			
			$output .= '<div class="team-title">';
			
				$output .= '<h3>'. esc_html($full_name) .'</h3>';
				$output .= '<span>'. esc_html($designation) .'</span>';
			$output .= '</div>';
			
			$output .= '<div class="team-about-icon">';
				if( !empty($fb_url) ) {
					$output .= '<a href="'. esc_url($fb_url) .'">';
					$output .= '<i class="fab fa-facebook-f"></i>';
					$output .= '</a>';
				}
				if ( !empty($twitter_url) ) {
					$output .= '<a href="'. esc_url($twitter_url) .'">';
					$output .= '<i class="fab fa-twitter"></i>';
					$output .= '</a>';
				}
				if ( !empty($google_url) ) {
					$output .= '<a href="'. esc_url($google_url) .'">';
					$output .= '<i class="fab fa-google-plus-g"></i>';
					$output .= '</a>';
				}
				if ( !empty($instagram_url) ) {
					$output .= '<a href="'. esc_url($instagram_url) .'">';
					$output .= '<i class="fab fa-instagram"></i>';
					$output .= '</a>';
				}
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</div>';
	return $output;
}