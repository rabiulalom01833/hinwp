<?php

namespace Elementor_Custom_Addon\Widgets;


use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Control_Media;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Image_Size;

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Testimonial extends \Elementor\Widget_Base {

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
		return 'Testimonial';
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
		return __( 'Testimonial', 'hin-elements' );
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
		return 'fas fa-address-card'; 
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
			'testimonial_slider',
			[
                'label' => __( 'Testimonial', ' hin-elements' ),
                'label_block' => true,
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
			'testimonial_img',
			array(
				'label'   => esc_html__( 'Image', ' hin-elements' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'dynamic' => array( 'active' => true ),
			)
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'exclude' => [],
				'include' => [],
				'default' => 'full',
			]
		);
         
        $repeater->add_control(
			'testimonial_name', [
				'label' => __( 'Name', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
        );

        $repeater->add_control(
			'testimonial_position', [
				'label' => __( 'Position', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
        );

        $repeater->add_control(
			'testimonial_details', [
				'label' => __( 'Review', ' hin-elements' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
        );
        
        $this->add_control(
			'testimonial_reapeter',
			[
				'label' => __( 'Testimonial', ' hin-elements' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[  
						'testimonial_name' => __( 'Md. Rabiul Alam', ' hin-elements' ),
						'testimonial_position' => __( 'WordPress Developer', ' hin-elements' ),
						'testimonial_details' => __( 'Review Details', ' hin-elements' ),
						'testimonial_img' => __( 'Upload Image', ' hin-elements' ),
						 
                    ],
               
					 
				],
				'title_field' => '{{{ testimonial_name }}}',
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

      

        <section id="testimonial-area" class="rights-bg bg-dark-black pt-130 pb-130">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section-title text-center">
                            <h2>Client Testimonial</h2>
                            <div class="section-title-border-center"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php if ( $settings['testimonial_reapeter'] ) :  
                  foreach (  $settings['testimonial_reapeter'] as $key=>$item ) : ?>
                    <div class="testimonial-col col-lg-5 offset-lg-1 col-md-9 offset-md-3 col-sm-9 offset-sm-3 pt-40"> 
                        <div class="testimonial-slick">
                            <div class="testimonial-texts-all">
                                <p>
                                <i class="fas fa-quote-left"></i>
                                <?php echo $item['testimonial_details']; ?>
                                <i class="fas fa-quote-right"></i>
                                </p>
                                <h4><?php echo $item['testimonial_name']; ?></h4>
                                <p class="fontstyle"><?php echo $item['testimonial_position']; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="testimonial-col col-lg-4 offset-lg-2 col-md-9 offset-md-3 col-sm-9 offset-sm-3 pt-40">
                        <div class="slide-fades">
                            <div class="testimonial-images text-left">
                            <?php  echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'testimonial_img' ); ?>
                            </div> 
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>  
                
                </div>
            </div>
        </section>               

         
        <?php

	}

}