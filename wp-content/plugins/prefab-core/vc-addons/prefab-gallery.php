<?php
add_shortcode( 'prefab_gallery', function($atts, $content = null) {

	extract(shortcode_atts(array(
			'count' => '6',
			'dis_style'	=> 1,
			), $atts));

		global $post;


		$q = new WP_Query(array('posts_per_page' => $count,'post_type' => 'prefab-portfolio',  'orderby' => 'ID', 'order' => 'ASC'));
		//other style
		$size = array(370,400);
		$args = array('post_type' => 'prefab-portfolio','posts_per_page' => $count);
		$filteArr = array();
		$postArr = new WP_Query($args);

		if(is_array($postArr->posts) && !empty($postArr->posts)) {
			foreach($postArr->posts as $item) {
				$taxsArr = wp_get_post_terms($item->ID, 'portfolio-cat', array("fields" => "all"));
				if(is_array($taxsArr) && !empty($taxsArr)) {
					foreach($taxsArr as $tax) {
						$filteArr[$tax->slug] = $tax->name;
					}
				}
			}
		}

		$no_gutters = '';
		$margin_bottom = 'mb-30';

		if( $dis_style == 2 ) {
			$no_gutters = ' no-gutters';
			$margin_bottom = '';
		}

		$output = '';
		if(is_array($filteArr) && !empty($filteArr) && get_post_meta($post->ID, 'pyre_portfolio_filters', true) != 'no'):
			$output.= '<div class="portfolio-area">';
			if( $dis_style != 2 ) {

				$output.= '<div class="container">';
			}
			$output.= '<div class="row'. $no_gutters .'">';
				$output.= '<div class="col-xl-12">';
					$output.= '<div class="portfolio-menu mb-40 text-center">';
						$output.= '<button class="active" data-filter="*" >'.esc_html__('ALL','prefab-core').'</button>';
						foreach($filteArr as $tax_slug => $tax_name):
							$output.= '<button data-filter=".'.esc_attr($tax_slug).'">'.esc_attr($tax_name).'</button>';
						endforeach;
					$output.= '</div>';
				$output.= '</div>';
			$output.= '</div>';

			$output .= '<div class="row grid'. $no_gutters .'">';
				$j = 0;
				while($q->have_posts()) : $q->the_post();//start while

					$small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),$size );
					$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' );

					$item_classes = '';
					$item_cats = get_the_terms($post->ID, 'portfolio-cat');
					if($item_cats):
						foreach($item_cats as $item_cat) {
							$item_classes .= $item_cat->slug . ' ';
						}
					endif;//endif

					$image = get_post_meta(get_the_ID(),'image',true);

					if ( $dis_style == 2 ) {

						$output .= '<div class="col-xl-4 col-lg-4 col-md-6 grid-item '.$item_classes.'">';
							$output .= '<div class="portfolio-wrapper '. $margin_bottom .'">';
								$output .= '<div class="portfolio-thumb">';
									$output .= '<img src="'.esc_url($image).'" alt="'.esc_attr__('img','prefab-core').'" width="640" height="400" />';
								$output .= '</div>';
								$output .= '<div class="portfolio-content">';
									$output .= '<div class="icon">';
										$output .= '<a class="popup-img" href="'.esc_url($image).'"><span></span></a>';
									$output .= '</div>';
									$output .= '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
									$output .= '<span>'.trim(str_replace(' ',',',$item_classes),',').'</span>';
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div>';

					}
					else {

						$output .= '<div class="col-xl-4 col-lg-4 col-md-6 grid-item '.$item_classes.'">';
							$output .= '<div class="portfolio-wrapper '. $margin_bottom .'">';
								$output .= '<div class="portfolio-thumb">';
									$output .= '<img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr__('img','prefab-core').'"/>';
								$output .= '</div>';
								$output .= '<div class="portfolio-content">';
									$output .= '<div class="icon">';
										$output .= '<a class="popup-img" href="'.esc_url($full_image_url[0]).'"><span></span></a>';
									$output .= '</div>';
									$output .= '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
									$output .= '<span>'.trim(str_replace(' ',',',$item_classes),',').'</span>';
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div>';
					}

					$j++;
				endwhile;//endwhile
				wp_reset_postdata();
			$output.= '</div>';
			if( $dis_style != 2 ) {
				$output.= '</div>';
			}
			$output.= '</div>';

		endif;//endif

	return $output;//return

});


//Visual Composer
if (class_exists('WPBakeryVisualComposerAbstract')) {
	vc_map(array(
		"name" => esc_html__("Prefab Gallery", 'prefab-core'),
		"base" => "prefab_gallery",
		'icon' => 'icon-thm-title',
		"class" => "",
		"description" => esc_html__("Gallery", 'prefab-core'),
		"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => __("Display Style", 'prefab-core'),
				"param_name" => "dis_style",
				"value"=> array( 'Main Style' => '1' , 'Full-width Style'=> '2' )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Project Count", 'prefab-core'),
				"param_name" => "count",
			)

		)
	));
}