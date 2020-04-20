<?php

namespace Elementor_Custom_Addon\Widgets;


use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
 
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Pricing_Table extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Pricing Table';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Pricing Table', 'hin-elements' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fas fa-table'; 
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'Elementor_Custom_Addon' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'pricing_table',
			[
				'label' => __( 'Pricing Table', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'table_name',
			[
				'label' => __( 'Table Title', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'SMALL BUSINESS', ' hin-elements' ),
 			]
		);
         
        $this->add_control(
			'currency_sing',
			[
				'label' => __( 'Currency Sing', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( '$', ' hin-elements' ),
                
			]
		);
        $this->add_control(
			'table_price',
			[
				'label' => __( 'Table Price', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( '75', ' hin-elements' ),
                
			]
        );
        
        $this->end_controls_section();


        $this->start_controls_section(
			'pricing_table_year',
			[
				'label' => __( 'Pricing Table Year', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'year_1',
			[
				'label' => __( 'Type Year 1', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( '2020', ' hin-elements' ), 
			]
        );
        $this->add_control(
			'year_2',
			[
				'label' => __( 'Type Year 2', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( '2021', ' hin-elements' ), 
			]
        );
        $this->add_control(
			'year_3',
			[
				'label' => __( 'Type Year 3', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( '2022', ' hin-elements' ), 
			]
        );
        
        $this->end_controls_section();



        $repeater = new Repeater();

         
        $repeater->add_control(
			'list_title', [
				'label' => __( 'list here', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
        );
        
        $this->add_control(
			'list_repeat',
			[
				'label' => __( 'List', ' hin-elements' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[  
						'list_title' => __( 'list here ', ' hin-elements' ),
						 
                    ],
               
					 
				],
				'title_field' => '{{{ title }}}',
			]
		);


        $this->end_controls_section();



        $this->start_controls_section(
			'pricing_table_years',
			[
				'label' => __( 'Pricing Table Year', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'text_align',
			[
				'label' => __( 'Alignment', ' hin-elements' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', ' hin-elements' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', ' hin-elements' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', ' hin-elements' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};',
				],
				'default' => 'center',
				'toggle' => true,
			]
		);


        $this->end_controls_section();
        
        // STYLE SECTION - TITLE
		$this->start_controls_section(
			'title_style',
			[
				'label' => __( 'Title', ' hin-elements' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} h2',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1
			]
		);

		
		$this->end_controls_section();

          
	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

        $settings = $this->get_settings_for_display();
        
        ?>

        <!-- <div class="section-title">
            <h2><?php echo $settings['title']; ?></h2>
            <div class="section-title-border-center"></div>
        </div> -->


        <div class="single-pricing-all text-center pb-50">
            <div class="single-pricing-half bg-dark-black">
                <h4 class="pricing-headings">SMALL BUSINESS</h4>
                <h1><sup>$</sup>2<span>5</span></h1>
                <ul class="tabs yearly-price tab-change-1">
                    <li class="tab-link currents" data-tab="price-tab-1">1 Year</li>
                    <li class="tab-link" data-tab="price-tab-2">2 Year</li>
                    <li class="tab-link" data-tab="price-tab-3">3 Year</li>
                </ul>
            </div>

            <div class="pricing-half-bottom tab-content currents" id="price-tab-1">
                <ul class="pricing-bottom-list">
                    <li>100 MB Disk Space</li>
                    <li>100 MB Disk Space</li>
                    <li>100 MB Disk Space</li>
                    <li>100 MB Disk Space</li>
                    <li>100 MB Disk Space</li>
                </ul>
                <a href="#" class="btn-4 btn-bgc-2">Purchase<i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="pricing-half-bottom tab-content" id="price-tab-2">
                <ul class="pricing-bottom-list">
                    <li>500 MB Space</li>
                    <li>700 MB Space</li>
                    <li>200 Disk Space</li>
                    <li>600 MB Disk </li>
                    <li>900 Disk Space</li>
                </ul>
                <a href="#" class="btn-4 btn-bgc-2">Purchase<i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="pricing-half-bottom tab-content" id="price-tab-3">
                <ul class="pricing-bottom-list">
                    <li>100 MB Disk Space</li>
                    <li>100 MB Disk Space</li>
                    <li>100 MB Disk Space</li>
                    <li>100 MB Disk Space</li>
                    <li>100 MB Disk Space</li>
                </ul>
                <a href="#" class="btn-4 btn-bgc-2">Purchase<i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
         
        <?php

	}

}