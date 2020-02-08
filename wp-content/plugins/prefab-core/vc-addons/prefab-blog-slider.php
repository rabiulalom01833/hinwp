<?php
add_shortcode( 'prefab_blog_slider', function($atts, $content = null) {

	extract(shortcode_atts( array(
		'dis_style'	=> 'Main Style',
		'count' => '9',
		'blog_order' => 'DESC',
	), $atts));

	$extra_class = 'gray-bg pt-80 pb-120';

	if( $dis_style == 'Grid Style' ) {
		$extra_class = 'pt-80 pb-70';
	}
		
	global $post;

	$q = new WP_Query(array('posts_per_page' => $count,'post_type' => 'post', 'order' => $blog_order,)); 
	//other style
	$output = '';

		$output .= '<div class="latest-blog-area'. $extra_class .'">';
        $output .= '<div class="container">';
            $output .= '<div class="custom-row">';
                $output .= '<div class="blog-active dot-style">';

				while($q->have_posts()) : $q->the_post();//start while

					$small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array(370, 200) );
		
					$category_list = '';
					$item_cats = get_the_terms($post->ID, 'category');
					if($item_cats):
						foreach($item_cats as $item_cat) {
							$category_list .= isset($item_cat->name) ? '<a href="'.get_the_permalink().'">'. $item_cat->name . '</a> ' :'';
						}
					endif;//endif
                    
                    $output .= '<div class="col-xl-4 col-lg-4">';

                    if( $dis_style == 'Grid Style' ) {

                    	$output .= '<div class="blog-latest mb-30">';
                    		if ( !empty($small_image_url) ) {
                    			$output .= '<div class="blog-img">';
			                        $output .= '<a href="'.get_the_permalink().'"><img src="'.esc_url( current($small_image_url) ).'" alt="'.esc_attr__('ug-1','prefab-core').'"></a>';
			                    $output .= '</div>';
                    		}
		                    $output .= '<div class="blog-latest-content">';
		                        $output .= '<div class="blog-title">';
		                            $output .= '<span>'. get_the_date( 'd' ) .'<span>'. get_the_date( 'M' ) .'</span></span>';
		                            $output .= '<h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
		                        $output .= '</div>';
		                        $output .= '<p>'. wp_trim_words( get_the_excerpt(), 15, '' )  .'</p>';
		                        $output .= '<a class="btn brand-btn btn-2" href="'. get_the_permalink(). '">Continue Reading</a>';
		                    $output .= '</div>';
		                $output .= '</div>';

                    }
                    else {

                    	$output .= '<div class="blog-wrapper">';
                            $output .= '<div class="blog-inner">';
                                $output .= '<span class="tag-blog">';
                                    $output .= '<a href="'. esc_url(get_author_posts_url(get_the_author_meta('ID'))) .'">'. get_the_author() .'</a>';
                                $output .= '</span>';
                                $output .= '<h4>';
                                    $output .= '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
                                $output .= '</h4>';
                                $output .= '<p>'. wp_trim_words( get_the_excerpt(), 15, '' ) .'</p>';
                                $output .= '<div class="blog-meta">';
                                    $output .= '<span class="f-left">'. get_the_date( get_option('date_format')) .'</span>';
                                    $output .= '<span class="f-right blog-more-btn">';
                                        $output .= '<a href="'.get_the_permalink().'">';
                                            $output .= '<i class="fas fa-long-arrow-alt-right"></i>';
                                            $output .= '<span class="blog-more">More</span>';
                                        $output .= '</a>';
                                    $output .= '</span>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    }

                    $output .= '</div>';
       
				endwhile;//endwhile
				wp_reset_postdata();

                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</div>';
	
	return $output;//return

});


//Visual Composer
if (class_exists('WPBakeryVisualComposerAbstract')) {
	vc_map(array(
		"name" => esc_html__("Prefab Blog Slider", 'prefab-core'),
		"base" => "prefab_blog_slider",
		'icon' => 'icon-thm-title',
		"class" => "",
		"description" => esc_html__("Blog Slider", 'prefab-core'),
		"category" => esc_html__('Prefab Shortcode', 'prefab-core'),
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => __("Display Style", 'prefab-core'),
				"param_name" => "dis_style",
				"value"=> array( '1' => 'Slider Style' , '2'=> 'Grid Style' )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Blog Count", 'prefab-core'),
				"param_name" => "count",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Post Order", 'prefab-core'),
				"param_name" => "blog_order",
				"value"=>array('ASC'=>'ASC','DESC'=>'DESC'),
			),
		)
	));
}