<?php
	add_shortcode( 'prefab_service_post', function($atts, $content) {
		extract(shortcode_atts(array(
				'count' 			=> 3,
				'custom_design' 	=> '',
				), $atts));
		$custom_design = vc_shortcode_custom_css_class( $custom_design, ' ' );
		$output = '';
		$q = new WP_Query(array('posts_per_page' => $count,'post_type' => 'prefab-service'));
		$output .= '<div class="service-area">';
		$output .= '<div class="container">';
		$output .= '<div class="row">';
		while($q->have_posts()):
			$q->the_post();
			$icon = 'fa-lightbulb';
			$p_icon = get_post_meta(get_the_ID(),'icon_name',true);
			if($p_icon!=''){
				$icon = $p_icon;
			}
			$output .= '<div class="col-xl-4 col-lg-4 col-md-6">';
				$output .= '<div class="service-box mb-60">';
					$output .= '<i class="fas '.$icon.'"></i>';
					$output .= '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
					$output .= '<p>'.get_the_excerpt().'</p>';
				$output .= '</div>';
			$output .= '</div>';
		endwhile;
		wp_reset_postdata();
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		return $output;
	});

	if (class_exists('WPBakeryVisualComposerAbstract')) {
		vc_map(array(
			"name" => esc_html__("Prefab Service Post", 'prefab-core'),
			"base" => "prefab_service_post",
			'icon' => 'icon-thm-title',
			"description" => esc_html__("Service", 'prefab-core'),
			"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
			"params" => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Count','prefab-core'),
					'param_name' => 'count',
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