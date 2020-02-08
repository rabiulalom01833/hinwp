<?php
/**
 * [prefab_fourth_slider description]
 * @param  [type] $atts [description]
 * @return [type]       [description]
 */
function prefab_fourth_slider( $atts ) {

	extract($atts);

	$url = ($url=='||') ? '' : $url;
	$url = vc_build_link( $url );

	$a_link = $url['url'];
	$a_title = ($url['title'] == '') ? '' : $url['title'];

	$bac_image = wp_get_attachment_image_src( $bac_slider_image, 'full');

	$class = 'sc_'.rand();

	$output = '';
	$output .= '<div class="single-slider height-100 d-flex align-items-center '.$class.'">';
		$output .= '<div class="container"><div class="row">';
			$output .= '<div class="col-xl-6 col-lg-7 d-flex align-items-center">';
				$output .= '<div class="slider-content slide-white pt-110">';
					if( $top_title !='' )
						$output .= '<span data-animation="fadeInLeft" data-delay=".5s">'.$top_title.'</span>';
					if( $title !='' )
						$output .= '<h1 data-animation="fadeInLeft" data-delay="1s">'.$title.'</h1>';
					if( $description !='' )
						$output .= '<p data-animation="fadeInLeft" data-delay="1.5s">'. esc_html($description) .'</p>';
					if($a_link!='')
						$output .= '<a data-animation="fadeInLeft" data-delay="2s" class="btn brand-btn" href="'.esc_url($a_link).'">'.$a_title.'</a>';
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div></div>';

		if(!empty($bac_image)){
			$output .= '<style> .'.$class.'{background-image:url('.current($bac_image).')}</style>';
		}

	$output .= '</div>';

	return $output;


}

/**
 * [prefab_third_slider description]
 * @param  [type] $atts [description]
 * @return [type]       [description]
 */
function prefab_third_slider( $atts ) {
	extract($atts);
	$url = ($url=='||') ? '' : $url;
	$url = vc_build_link( $url );
	$a_link = $url['url'];
	$a_title = ($url['title'] == '') ? '' : $url['title'];
	$bac_image = wp_get_attachment_image_src( $bac_slider_image, 'full');
	$class = 'sc_'.rand();
	$output = '';
	$output .= '<div class="single-slider slider-height-3 d-flex align-items-center '.$class.'">';
		$output .= '<div class="container"><div class="row">';
			$output .= '<div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 d-flex align-items-center">';
				$output .= '<div class="slider-content text-center">';
					if($top_title!='')
						$output .= '<span data-animation="fadeIn" data-delay=".5s">'.$top_title.'</span>';
					if($title!='')
						$output .= '<h1 data-animation="fadeInUp" data-delay="1s">'.$title.'</h1>';
					if($a_link!='')
						$output .= '<a data-animation="fadeInLeft" data-delay="2s" class="btn" href="'.esc_url($a_link).'">'.$a_title.'</a>';
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div></div>';
		if(!empty($bac_image)){
			$output .= '<style> .'.$class.'{background-image:url('.current($bac_image).')}</style>';
		}
	$output .= '</div>';
	return $output;
}

/**
 * [prefab_second_slider description]
 * @param  [type] $atts [description]
 * @return [type]       [description]
 */
function prefab_second_slider($atts){
	extract($atts);
	$url = ($url=='||') ? '' : $url;
	$url = vc_build_link( $url );
	$a_link = $url['url'];
	$a_title = ($url['title'] == '') ? '' : $url['title'];
	$bac_image = wp_get_attachment_image_src( $bac_slider_image, 'full');
	$fr_image = wp_get_attachment_image_src( $fr_slider_image, 'full');

	$class = 'sc_'.rand();
	$output = '';
	$output .= '<div class="single-slider height-100 d-flex align-items-center '.$class.'">';
		$output .= '<div class="container"><div class="row">';
			$output .= '<div class="col-xl-6 col-lg-7 d-flex align-items-center">';
				$output .= '<div class="slider-content pt-110">';
					if($top_title!='')
						$output .= '<span data-animation="fadeInLeft" data-delay=".5s">'.$top_title.'</span>';
					if($title!='')
						$output .= '<h1 data-animation="fadeInLeft" data-delay="1s">'.$title.'</h1>';
					if($description!='')
						$output .= '<p data-animation="fadeInLeft" data-delay="1.5s">'.$description.'</p>';
					if($a_link!='')
						$output .= '<a data-animation="fadeInLeft" data-delay="2s" class="btn" href="'.esc_url($a_link).'">'.$a_title.'</a>';
				$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="col-xl-6 col-lg-5 d-none d-lg-block">';
				if(!empty($fr_image)){
					$output .= '<div class="slide-img text-right pt-120 slider-full f-right" data-animation="fadeInRight" data-delay="2.5s">';
						$output .= '<img src="'.current($fr_image).'" alt="'.esc_attr__('image','prefab-core').'">';
					$output .= '</div>';
				}
			$output .= '</div>';
		$output .= '</div></div>';
		if(!empty($bac_image)){
			$output .= '<style> .'.$class.'{background-image:url('.current($bac_image).')}</style>';
		}
	$output .= '</div>';
	return $output;
}

/**
 * [prefab_first_slider description]
 * @param  [type] $atts [description]
 * @return [type]       [description]
 */
function prefab_first_slider($atts){
	extract($atts);
	$url = ($url=='||') ? '' : $url;
	$url = vc_build_link( $url );
	$a_link = $url['url'];
	$a_title = ($url['title'] == '') ? '' : $url['title'];
	$bac_image = wp_get_attachment_image_src( $bac_slider_image, 'full');
	$fr_image = wp_get_attachment_image_src( $fr_slider_image, 'full');

	$class = 'sc_'.rand();
	$output = '';
	$output .= '<div class="single-slider wrapper-section-box slider-height d-flex align-items-center '.$class.'">';
		$output .= '<div class="container"><div class="row">';
			$output .= '<div class="col-xl-6 col-lg-7 d-flex align-items-center">';
				$output .= '<div class="slider-content">';
					if($top_title!='')
						$output .= '<span data-animation="fadeInLeft" data-delay=".5s">'.$top_title.'</span>';
					if($title!='')
						$output .= '<h1 data-animation="fadeInLeft" data-delay="1s">'.$title.'</h1>';
					if($description!='')
						$output .= '<p data-animation="fadeInLeft" data-delay="1.5s">'.$description.'</p>';
					if($a_link!='')
						$output .= '<a data-animation="fadeInLeft" data-delay="2s" class="btn" href="'.esc_url($a_link).'">'.$a_title.'</a>';
				$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="col-xl-6 col-lg-5 d-none d-lg-block">';
				if(!empty($fr_image)){
					$output .= '<div class="slide-img text-right" data-animation="fadeInRight" data-delay="2.5s">';
						$output .= '<img src="'.current($fr_image).'" alt="'.esc_attr__('image','prefab-core').'">';
					$output .= '</div>';
				}
			$output .= '</div>';
		$output .= '</div></div>';
		if(!empty($bac_image)){
			$output .= '<style> .'.$class.'{background-image:url('.current($bac_image).')}</style>';
		}
	$output .= '</div>';
	return $output;
}



/**
 * [prefab_first_slider_with_no_padding description]
 * @param  [type] $atts [description]
 * @return [type]       [description]
 */
function prefab_first_slider_no_padding($atts){
	extract($atts);
	$url = ($url=='||') ? '' : $url;
	$url = vc_build_link( $url );
	$a_link = $url['url'];
	$a_title = ($url['title'] == '') ? '' : $url['title'];
	$bac_image = wp_get_attachment_image_src( $bac_slider_image, 'full');
	$fr_image = wp_get_attachment_image_src( $fr_slider_image, 'full');

	$class = 'sc_'.rand();
	$output = '';
	$output .= '<div class="single-slider slider-height d-flex align-items-center '.$class.'">';
		$output .= '<div class="container"><div class="row">';
			$output .= '<div class="col-xl-6 col-lg-7 d-flex align-items-center">';
				$output .= '<div class="slider-content">';
					if($top_title!='')
						$output .= '<span data-animation="fadeInLeft" data-delay=".5s">'.$top_title.'</span>';
					if($title!='')
						$output .= '<h1 data-animation="fadeInLeft" data-delay="1s">'.$title.'</h1>';
					if($description!='')
						$output .= '<p data-animation="fadeInLeft" data-delay="1.5s">'.$description.'</p>';
					if($a_link!='')
						$output .= '<a data-animation="fadeInLeft" data-delay="2s" class="btn" href="'.esc_url($a_link).'">'.$a_title.'</a>';
				$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="col-xl-6 col-lg-5 d-none d-lg-block">';
				if(!empty($fr_image)){
					$output .= '<div class="slide-img text-right" data-animation="fadeInRight" data-delay="2.5s">';
						$output .= '<img src="'.current($fr_image).'" alt="'.esc_attr__('image','prefab-core').'">';
					$output .= '</div>';
				}
			$output .= '</div>';
		$output .= '</div></div>';
		if(!empty($bac_image)){
			$output .= '<style> .'.$class.'{background-image:url('.current($bac_image).')}</style>';
		}
	$output .= '</div>';
	return $output;
}



/**
 * [prefab_first_slider description]
 * @param  [type] $atts [description]
 * @return [type]       [description]
 */
function prefab_fifth_slider($atts){
	extract($atts);
	$url = ($url=='||') ? '' : $url;
	$url = vc_build_link( $url );
	$a_link = $url['url'];
	$a_title = ($url['title'] == '') ? '' : $url['title'];
	$bac_image = wp_get_attachment_image_src( $bac_slider_image, 'full');
	$fr_image = wp_get_attachment_image_src( $fr_slider_image, 'full');

	$class = 'sc_'.rand();
	$output = '';
	$output .= '<div class="single-slider slider-height d-flex align-items-center '.$class.'">';
		$output .= '<div class="container"><div class="row">';
			$output .= '<div class="col-xl-6 col-lg-7 d-flex align-items-center">';
				$output .= '<div class="slider-content">';
					if($top_title!='')
						$output .= '<span data-animation="fadeInLeft" data-delay=".5s">'.$top_title.'</span>';
					if($title!='')
						$output .= '<h1 data-animation="fadeInLeft" data-delay="1s">'.$title.'</h1>';
					if($description!='')
						$output .= '<p data-animation="fadeInLeft" data-delay="1.5s">'.$description.'</p>';
					if($a_link!='')
						$output .= '<a data-animation="fadeInLeft" data-delay="2s" class="btn" href="'.esc_url($a_link).'">'.$a_title.'</a>';
				$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="col-xl-6 col-lg-5 d-none d-lg-block">';
				if(!empty($fr_image)){
					$output .= '<div class="slide-img text-right" data-animation="fadeInRight" data-delay="2.5s">';
						$output .= '<img src="'.current($fr_image).'" alt="'.esc_attr__('image','prefab-core').'">';
					$output .= '</div>';
				}
			$output .= '</div>';
		$output .= '</div></div>';
		if(!empty($bac_image)){
			$output .= '<style> .'.$class.'{background-image:url('.current($bac_image).')}</style>';
		}
	$output .= '</div>';
	return $output;
}