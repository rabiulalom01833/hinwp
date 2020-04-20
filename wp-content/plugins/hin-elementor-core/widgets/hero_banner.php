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
class Hero_Banner extends Widget_Base {

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
		return 'Hero-Banner';
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
		return __( 'Hero Banner', ' hin-elements' );
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
		return 'far fa-address-card';
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
			'hero_banner',
			[
                'label' => __( 'Hero Image', ' hin-elements' ),
                'label_block' => true,
			]
		);

        $this->add_control(
			'image',
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

        $this->start_controls_section(
			'hero_banner_section',
			[
				'label' => __( 'Hero Details', ' hin-elements' ),
			]
		);
		$this->add_control(
			'hero_banner_title', [
				'label' => __( 'Title', ' hin-elements' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Type your Title here', ' hin-elements' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'hero_banner_subtitle', [
				'label' => __( 'Sub Title', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Type your Sub Title here', ' hin-elements' ),
                'label_block' => true,
			]
		);
        
        $this->add_control(
			'hero_banner_details', [
				'label' => __( 'Sub Details', ' hin-elements' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type your details here', ' hin-elements' ),
			]
		);
	  
        $this->end_controls_section();

        $this->start_controls_section(
			'hero_banner_button',
			[
				'label' => __( 'Button', 'hin-elements' ),
			]
		);

        $this->add_control(
			'hero_banner_download_button', [
				'label' => __( 'Button Name 1', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'download_cv',
			[
				'label' => __( 'Download Cv link', 'ic-elements' ),
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

        $this->add_control(
			'hero_banner_explor_button', [
				'label' => __( 'Button Name 2', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
        );
        
        $this->add_control(
			'explore_work',
			[
				'label' => __( 'Explore Work Link', 'ic-elements' ),
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
        

         // STYLE SECTION - TITLE
		$this->start_controls_section(
			'hero_banner_section_style',
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
					'{{WRAPPER}} .hero-text-home1 h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} h3',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1
			]
		);

        $this->end_controls_section();

        // STYLE SECTION - SUB TITLE
		$this->start_controls_section(
			'hero_banner_section_sub_title',
			[
				'label' 		=> __( 'Sub Title Style', ' hin-elements' ),
				'tab' 			=> Controls_Manager::TAB_STYLE
			]
		);
		$this->add_control(
			'sub_title_color',
			[
				'label' => __( 'Text Color', ' hin-elements' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-text-home1 h1' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sub_title_typography',
				'selector' => '{{WRAPPER}} h1',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1
			]
		);

        $this->end_controls_section();

        // STYLE SECTION - DESCRIPTION
		$this->start_controls_section(
			'hero_banner_section_discription',
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
					'{{WRAPPER}} .hero-text-home1 h4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} h4',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1
			]
		);

        $this->end_controls_section();
        
        
        // STYLE SECTION - DOWNLOAD CV

		$this->start_controls_section(
			'hero_banner_section_button_1',
			[
				'label' 		=> __( 'Button Style 1', ' hin-elements' ),
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
				'selector' => '{{WRAPPER}} .btn-bgc-1',
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

         // STYLE SECTION - Explore Work Button

		$this->start_controls_section(
			'hero_banner_section_button_2',
			[
				'label' 		=> __( 'Button Style 2', ' hin-elements' ),
				'tab' 			=> Controls_Manager::TAB_STYLE
			]
        );
        
		$this->add_control(
			'button_style_2',
			[
				'label' => __( 'Text Color', ' hin-elements' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .btn-bgc-2' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background-2',
				'label' => __( 'Background', 'hin-elements' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .btn-bgc-2',
			]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border-2',
				'label' => __( 'Border', 'hin-elements' ),
				'selector' => '{{WRAPPER}} .btn-bgc-2',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_2_typography',
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
 
		$target = $settings['download_cv']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['download_cv']['nofollow'] ? ' rel="nofollow"' : '';
		$target1 = $settings['explore_work']['is_external'] ? ' target="_blank"' : '';
		$nofollow1 = $settings['explore_work']['nofollow'] ? ' rel="nofollow"' : '';
 
        ?> 
        <section id="hero-area1" class="hero-top">
            <div class="hero1-all-images-wrapper">
                <img class="hero1-left" src="<?php echo get_template_directory_uri(  ); ?>/img/home1/hero1-left.png" alt="">
                <img class="shape-left" src="<?php echo get_template_directory_uri(  ); ?>/img/home1/hero1-left-shape.png" alt="">
                <img class="shape-right-same" src="<?php echo get_template_directory_uri(  ); ?>/img/home1/hero1-left-shape.png" alt="">
                <img class="shape-right" src="<?php echo get_template_directory_uri(  ); ?>/img/home1/hero1-right-shape.png" alt="">
                 <div class="man-middle">
                 <?php  echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
                </div> 
                <img class="hero-dots-1" src="<?php echo get_template_directory_uri(  ); ?>/img/home1/hero-dot-1.png" alt="">
                <img class="hero-dots-2" src="<?php echo get_template_directory_uri(  ); ?>/img/home1/hero-dot-2.png" alt="">
                <img class="hero-triangle" src="<?php echo get_template_directory_uri(  ); ?>/img/home1/triangle.png" alt="">
                <img class="hero-triangle2" src="<?php echo get_template_directory_uri(  ); ?>/img/home1/triangle.png" alt="">
                <img class="hero-triangle3" src="<?php echo get_template_directory_uri(  ); ?>/img/home1/triangle.png" alt="">
                <img class="hero-cross" src="<?php echo get_template_directory_uri(  ); ?>/img/home1/cross.png" alt="">
                <img class="hero-circle" src="<?php echo get_template_directory_uri(  ); ?>/img/home1/circle.png" alt="">
            </div>
            <div class="hero-item1 bg-dark-black">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">

                            <div class="hero-text-home1 text-left">
                                <h3><?php echo $settings['hero_banner_title']; ?></h3>
                                <h1 class="text-yellow"><?php echo $settings['hero_banner_subtitle']; ?></h1>
                                <h4><?php echo $settings['hero_banner_details']; ?></h4> 
                                <a href="<?php echo esc_url($settings['download_cv']['url']); ?>" class="btn-1 btn-bgc-1" <?php echo $target; ?> <?php echo $nofollow; ?>>  <?php echo $settings['hero_banner_download_button']; ?> </a>
                                <a href="<?php echo esc_url($settings['explore_work']['url']); ?>" class="btn-1 btn-bgc-2" <?php echo $target1; ?> <?php echo $nofollow1; ?> > <?php echo $settings['hero_banner_explor_button']; ?> </a>
                            </div>

                        </div>
                        <div class="col-lg-5"></div>
                    </div>
                </div>
            </div>
        </section> 
        <?php
		
	}

}