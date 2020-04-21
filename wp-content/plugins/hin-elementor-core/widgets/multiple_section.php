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
 
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class multiple_section extends \Elementor\Widget_Base {

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
		return 'Multiple Section';
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
		return __( 'Multiple Section', 'hin-elements' );
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
			'tab_name',
			[
				'label' => __( 'Tab Name', 'hin-elements' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
  
        $this->add_control(
			'tab_1',
			[
				'label' => __( 'Tab Name 1', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Tab List', ' hin-elements' ),
                
			]
		);
        $this->add_control(
			'tab_2',
			[
				'label' => __( 'Tab Name 2', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Tab List', ' hin-elements' ),
                
			]
		);
         
        $this->add_control(
			'tab_3',
			[
				'label' => __( 'Tab Name 3', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Tab List', ' hin-elements' ),
                
			]
		);
         
        $this->add_control(
			'tab_4',
			[
				'label' => __( 'Tab Name 4', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Tab List', ' hin-elements' ),
                
			]
		);
         
        $this->add_control(
			'tab_5',
			[
				'label' => __( 'Tab Name 5', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Tab List', ' hin-elements' ),
                
			]
		);
         
        $this->end_controls_section();
        


        $this->start_controls_section(
			'about_tab',
			[
				'label' => __( 'About Tab', 'hin-elements' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
        
        $this->add_control(
			'about_image',
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
 
        $this->add_control(
			'about_title',
			[
				'label' => __( 'About Titel', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Title', ' hin-elements' ),
                
			]
		);
        $this->add_control(
			'about_sub_title',
			[
				'label' => __( 'About Solugun', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Solugun', ' hin-elements' ),
                
			]
        );
        $this->add_control(
			'about_sub_title_color',
			[
				'label' => __( 'About Solugun Color', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Solugun Color', ' hin-elements' ),
                
			]
        );
     
        $this->add_control(
			'about_birthday',
			[
				'label' => __( 'About Birthday', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Birthday', ' hin-elements' ),
                
			]
        );

        $this->add_control(
			'about_city',
			[
				'label' => __( 'About City', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'City', ' hin-elements' ),
                
			]
        );
        $this->add_control(
			'about_study',
			[
				'label' => __( 'About Study', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Study', ' hin-elements' ),
                
			]
        );
        $this->add_control(
			'about_website',
			[
				'label' => __( 'About Website', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Website', ' hin-elements' ),
                
			]
        );
        $this->add_control(
			'about_phone',
			[
				'label' => __( 'About Phone', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Phone', ' hin-elements' ),
                
			]
        );
        $this->add_control(
			'about_age',
			[
				'label' => __( 'About Age', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Age', ' hin-elements' ),
                
			]
        );
        $this->add_control(
			'about_interest',
			[
				'label' => __( 'About Interests', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Interests', ' hin-elements' ),
                
			]
        );
        $this->add_control(
			'about_degree',
			[
				'label' => __( 'About Degree', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Degree', ' hin-elements' ),
                
			]
        );
        $this->add_control(
			'about_mail',
			[
				'label' => __( 'About Mail', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Mail', ' hin-elements' ),
                
			]
        );
        $this->add_control(
			'about_twitter',
			[
				'label' => __( 'About Twitter', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Twitter', ' hin-elements' ),
                
			]
        );

        $this->add_control(
			'about_message_button', [
				'label' => __( 'Button Name', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Type button title', 'hin-elements' ),
				'default' => 'Message',
				'label_block' => true,

			]
		);

		$this->add_control(
			'about_message_url',
			[
				'label' => __( 'Button link', 'ic-elements' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'hin-elements' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
        );

        $this->add_control(
			'about_details',
			[
				'label' => __( 'About Details', ' hin-elements' ),
				'type' => Controls_Manager::WYSIWYG,
                'default' => __( 'Details', ' hin-elements' ),
                
			]
        );

        $this->end_controls_section();


        $this->start_controls_section(
			'experience_box',
			[
                'label' => __( 'Experience', ' hin-elements' ),
                'label_block' => true,
			]
		);

        $repeater = new Repeater();

         
        $repeater->add_control(
			'experience_list', [
				'label' => __( 'Experience Name', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
        );
        $repeater->add_control(
			'experience_year', [
				'label' => __( 'Experience Year', ' hin-elements' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
        );
        $repeater->add_control(
            'experience_details', [
                'label' => __( 'Experience details', ' hin-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
			'repeat_expeience',
			[
				'label' => __( 'Experience', ' hin-elements' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[  
						'experience_list' => __( 'Experience Institute', ' hin-elements' ),
						'experience_year' => __( 'Experience Year', ' hin-elements' ),
						'experience_details' => __( 'Experience Details', ' hin-elements' ),
						 
                    ],
               
					 
				],
				'title_field' => '{{{ experience_list }}}',
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
    $target = $settings['about_message_url']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['about_message_url']['nofollow'] ? ' rel="nofollow"' : '';
    ?>

<section id="introduce-area" class="introduce-all bg-light-black pb-130 pt-130">
        <div class="introduce-tab">

            <ul class="tabs introduce-list-tabs">
                <li class="tab-link current" data-tab="tab-1"><?php echo $settings['tab_1']; ?></li>
                <li class="tab-link" data-tab="tab-2"><?php echo $settings['tab_2']; ?></li>
                <li class="tab-link" data-tab="tab-3"><?php echo $settings['tab_3']; ?></li>
                <li class="tab-link" data-tab="tab-4"><?php echo $settings['tab_4']; ?></li>
                <li class="tab-link" data-tab="tab-5"><?php echo $settings['tab_5']; ?></li>
            </ul>

        </div>
        <div class="container">
            <!-- About me -->
            <div id="tab-1" class="tab-content current">
                <div class="row pt-10">
                    <div class="col-lg-6 col-md-12 col-sm-12 mt-30">
                        <div class="timelined-items">
                            <?php  echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'about_image' ); ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 mt-30">
                        <div class="about-timelined-total">
                            <div class="section-title">
                                <h5><?php echo $settings['about_title']; ?></h5>
                                <h2><?php echo $settings['about_sub_title']; ?> <span class="text-yellow"><?php echo $settings['about_sub_title_color']; ?></span>
                                </h2>
                                <div class="section-title-border"></div>
                                <p class=""><?php echo $settings['about_details']; ?></p>
                            </div>
                            <div class="row pt-30 pb-25">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="list-1">
                                        <ul class="timeline-para-list text-left">
                                            <li><strong>Birthday:</strong> <?php echo $settings['about_birthday']; ?> </li>
                                            <li><strong>City:</strong><?php echo $settings['about_city']; ?> </li>
                                            <li><strong>Study:</strong> <?php echo $settings['about_study']; ?> </li>
                                            <li><strong>Website:</strong> <?php echo $settings['about_website']; ?>
                                            </li>
                                            <li><strong>Phone:</strong> <?php echo $settings['about_phone']; ?> </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="list-2">
                                        <ul class="timeline-para-list">
                                            <li><strong>Age:</strong> <?php echo $settings['about_age']; ?> </li>
                                            <li><strong>Interests:</strong> <?php echo $settings['about_interest']; ?></li>
                                            <li><strong>Degree:</strong> <?php echo $settings['about_degree']; ?> </li>
                                            <li><strong>Mail:</strong> <?php echo $settings['about_mail']; ?> </li>
                                            <li><strong>Twitter:</strong> <?php echo $settings['about_twitter']; ?> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo esc_url($settings['about_message_url']['url']); ?>" class="btn-3 btn-bgc-1"><?php echo $settings['about_message_button']; ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Skill -->
            <div id="tab-2" class="tab-content">
                <div class="row mt-20">
                    <div class="col-lg-3 col-sm-6 col-md-4 mt-30">
                        <div class="circle-progress-single">
                            <div class="progress-circle position" data-percent="75" data-duration="1000"
                                data-color="#ff8f43,#164eaa"></div>
                            <p>Communication 75%</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mt-30">
                        <div class="circle-progress-single">
                            <div class="progress-circle position" data-percent="85" data-duration="1000"
                                data-color="#ff8f43,#164eaa"></div>
                            <p>Organization 85%</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-4 mt-30">
                        <div class="circle-progress-single">
                            <div class="progress-circle position" data-percent="90" data-duration="1000"
                                data-color="#ff8f43,#164eaa"></div>
                            <p>Analytical Abilities 90%</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mt-30">
                        <div class="circle-progress-single">
                            <div class="progress-circle position" data-percent="75" data-duration="1000"
                                data-color="#ff8f43,#164eaa"></div>
                            <p>Creativity Design 75%</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mt-90">
                        <div id="example-9" class="lines-skills">
                            <div class="cssProgress">
                                <p>Project Management</p>
                                <div class="cssProgress-label2">75%</div>
                                <div class="progress1">
                                    <div class="cssProgress-bar" data-percent="75" style="width: 75%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mt-90">
                        <div id="example-8" class="lines-skills">
                            <div class="cssProgress">
                                <p>Problem solving</p>
                                <div class="cssProgress-label2">90%</div>
                                <div class="progress1">
                                    <div class="cssProgress-bar" data-percent="90" style="width: 90%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mt-90">
                        <div id="example-7" class="lines-skills">
                            <div class="cssProgress">
                                <p>Perseverence</p>
                                <div class="cssProgress-label2">80%</div>
                                <div class="progress1">
                                    <div class="cssProgress-bar" data-percent="80" style="width: 80%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mt-90">
                        <div id="example-6" class="lines-skills">
                            <div class="cssProgress">
                                <p>Resourcefulness</p>
                                <div class="cssProgress-label2">75%</div>
                                <div class="progress1">
                                    <div class="cssProgress-bar" data-percent="75" style="width: 75%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Experience -->
            <div id="tab-3" class="tab-content">
                <div class="row mt-15">
                    
                    <?php if ( $settings['repeat_expeience'] ) : 
                       foreach (  $settings['repeat_expeience'] as $key=>$item ) : 
                        echo '<div class="col-lg-6 col-md-12 col-sm-12">'; 
                            echo '<div class="timelined-Experience mt-30">';
                                    echo '<p>'. $item['experience_list'] . '</p>';
                                    echo '<p>'. $item['experience_year'] . '</p>';
                                    echo '<p>'. $item['experience_details'] . '</p>';
                                echo '</div>'; 
                        echo '</div>';

                    endforeach; ?>

                      <?php endif;  ?> 
                    
                </div>
            </div>

            <!-- Tab Services  -->
            <div id="tab-4" class="tab-content">
                <div class="row pt-15">

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="timelined-services mt-30">
                            <div class="services-images-timelined">
                                <img src="assets/img/home1/service-img-1.png" alt="">
                            </div>
                            <div class="services-text-timelined">
                                <h4>Business Strategy</h4>
                                <p>Strategy develop customer organisa knowledge and market perspectivesti hat inform and
                                    provoke.</p>
                            </div>
                        </div>
                    </div>
                    
                     
                </div>
            </div>

            <!-- Tab Portfolio -->
            <div id="tab-5" class="tab-content">
                <div class="row pt-15">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="timelined-portfolio-all mt-30">
                            <div class="port-img-timelined">
                                <img src="assets/img/home1/port-img-1.png" alt="">
                                <h6>Amazing Design Mockup
                                    <br> Design for Client</h6>
                            </div>
                            <div class="port-hover-icons">
                                <a class="images-gallery" href="assets/img/home1/port-img-1.png"><i
                                        class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="timelined-portfolio-all mt-30">
                            <div class="port-img-timelined">
                                <img src="assets/img/home1/port-img-2.png" alt="">
                                <h6>Creative Design
                                    <br> for Client</h6>
                            </div>
                            <div class="port-hover-icons">
                                <a class="images-gallery" href="assets/img/home1/port-img-2.png"><i
                                        class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="timelined-portfolio-all mt-30">
                            <div class="port-img-timelined">
                                <img src="assets/img/home1/port-img-3.png" alt="">
                                <h6>WP Development For
                                    <br> My Client</h6>
                            </div>
                            <div class="port-hover-icons">
                                <a class="images-gallery" href="assets/img/home1/port-img-3.png"><i
                                        class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="timelined-portfolio-all mt-30">
                            <div class="port-img-timelined">
                                <img src="assets/img/home1/port-img-4.png" alt="">
                                <h6>Extraordinary Image
                                    <br> Caption</h6>
                            </div>
                            <div class="port-hover-icons">
                                <a class="images-gallery" href="assets/img/home1/port-img-4.png"><i
                                        class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="timelined-portfolio-all mt-30">
                            <div class="port-img-timelined">
                                <img src="assets/img/home1/port-img-5.png" alt="">
                                <h6>Retouch Product Design
                                    <br> For Buyer</h6>
                            </div>
                            <div class="port-hover-icons">
                                <a class="images-gallery" href="assets/img/home1/port-img-5.png"><i
                                        class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="timelined-portfolio-all mt-30">
                            <div class="port-img-timelined">
                                <img src="assets/img/home1/port-img-6.png" alt="">
                                <h6>This Is Awesome
                                    <br> Photography</h6>
                            </div>
                            <div class="port-hover-icons">
                                <a class="images-gallery" href="assets/img/home1/port-img-6.png"><i
                                        class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- container -->
    </section>
      
    <?php

	}

}