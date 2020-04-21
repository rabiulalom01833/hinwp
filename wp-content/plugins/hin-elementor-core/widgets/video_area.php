<?php

namespace Elementor_Custom_Addon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Video_Area extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Video-Area';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Video Section', ' hin-elements' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fas fa-video';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'Elementor_Custom_Addon' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
 
         
           
        $this->start_controls_section(
			'video_details_area',
			[
                'label' => __( 'Video Section Details', ' hin-elements' ),
                'label_block' => true,
			]
		);

		$this->add_control(
			'video_title', [
				'label' => __( 'Title', ' hin-elements' ),
                'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Type your Title here', ' hin-elements' ),
				'default' => 'Title Here',
				'label_block' => true,
			]
		);
		$this->add_control(
			'video_details', [
				'label' => __( 'Details', ' hin-elements' ),
				'type' => Controls_Manager::WYSIWYG,
                'placeholder' => __( 'Type your details here', ' hin-elements' ),
				'default' => 'Discription Here',
				'label_block' => true,
			]
		);
	 
	
 
        $this->add_control(
			'video_button_name', [
				'label' => __( 'Button Name', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Type button title', ' hin-elements' ),
				'default' => 'Read More',
				'label_block' => true,

			]
		);

		$this->add_control(
			'video_button',
			[
				'label' => __( 'Button link', 'ic-elements' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'ic-elements' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
        );
 

		$this->end_controls_section();

		     
        $this->start_controls_section(
			'video_area',
			[
                'label' => __( 'Video Add', ' hin-elements' ),
                'label_block' => true,
			]
		);

		$this->add_control(
			'video_url',
			[
				'label' => __( 'Youtube Url', 'hin-elements' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'hin-elements' ),
				'default' => [
					'url' => '', 
				],
			]
		);

		$this->add_control(
			'video_image',
			array(
				'label'   => esc_html__( 'Image', ' hin-elements' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'dynamic' => array( 'active' => true ),
			)
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'exclude' => [],
				'include' => [],
				'default' => 'full',
			]
		);

		
        $this->end_controls_section();


		 // STYLE SECTION - Title 

		 $this->start_controls_section(
			'video_title_style',
			[
				'label' 		=> __( 'Title Style', ' hin-elements' ),
				'tab' 			=> Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', ' hin-elements' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sub_title_typography',
				'selector' => '{{WRAPPER}} h2',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1
			]
		);

		$this->end_controls_section();
		

		// STYLE SECTION - Description
		
		$this->start_controls_section(
			'video_discription',
			[
				'label' 		=> __( 'Description Style', ' hin-elements' ),
				'tab' 			=> Controls_Manager::TAB_STYLE
			]
		);
		$this->add_control(
			'details_color',
			[
				'label' => __( 'Text Color', ' hin-elements' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} p',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1
			]
		);

        $this->end_controls_section();
        
        
        // STYLE SECTION - Read More Button Style

		$this->start_controls_section(
			'hero_button_style',
			[
				'label' 		=> __( 'Button Style', ' hin-elements' ),
				'tab' 			=> Controls_Manager::TAB_STYLE
			]
        );
        
		$this->add_control(
			'button_style_1',
			[
				'label' => __( 'Text Color', ' hin-elements' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .btn-bgc-1' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background-1',
				'label' => __( 'Background', 'hin-elements' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .btn-bgc-1',
			]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border-1',
				'label' => __( 'Border', 'hin-elements' ),
				'selector' => '{{WRAPPER}} .btn-bgc-1,.pricing-half-bottom i',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_1_typography',
				'selector' => '{{WRAPPER}} a',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1
			]
		);

        $this->end_controls_section();

         
    }
    


    

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();  
		$target = $settings['video_button']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['video_button']['nofollow'] ? ' rel="nofollow"' : '';
		?> 

         <section id="Hin-video-area" class="bg-dark-black pt-130">
			<div class="videos-shape-img">
				<img class="left-video-img" src="assets/img/home1/left-video-img.png" alt="">
				<img class="video-left-shadow-img" src="assets/img/home1/video-left-shadow.png" alt="">
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="section-title">
							<h2><?php echo $settings['video_title']; ?></h2>
							<div class="section-title-border"></div>
							<p class="mt-5"><?php echo $settings['video_details']; ?></p>
							<a href="<?php echo esc_url($settings['video_button']['url']); ?>" class="btn-4 btn-bgc-1 mt-50" <?php echo $target; ?> <?php echo $nofollow; ?>>  <?php echo $settings['video_button_name']; ?> </a>
  
						</div>
					</div>
					<div class="col-lg-5 offset-lg-1 col-md-8 offset-md-2">
						<div class="videos-manage-all">
							<div class="single-video-img">
							<?php  echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'video_image' ); ?>

								<a class="open-videos" href="<?php echo esc_url($settings['video_url']['url']); ?>"><i
										class="fas fa-play"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

        <?php
		
	}

}