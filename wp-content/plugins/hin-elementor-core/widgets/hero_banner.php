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
                'label' => __( 'Hero Banner', ' hin-elements' ),
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
				'label' => __( 'Content', ' hin-elements' ),
			]
		);
		$this->add_control(
			'hero_banner_title', [
				'label' => __( 'Title', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'hero_banner_subtitle', [
				'label' => __( 'Sub Title', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Type your Sub Title here', ' hin-elements' ),
			]
		);
        
        $this->add_control(
			'hero_banner_details', [
				'label' => __( 'Sub Title', ' hin-elements' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type your Sub Title here', ' hin-elements' ),
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
                                <h3><?php echo $settings['title']; ?></h3>
                                <h1 class="text-yellow"><?php echo $settings['hero_banner_title']; ?></h1>
                                <h4><?php echo $settings['hero_banner_details']; ?></h4>
                                <a href="#" class="btn-1 btn-bgc-1">Download CV</a>
                                <a href="#" class="btn-1 btn-bgc-2">Explore Work</a>
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