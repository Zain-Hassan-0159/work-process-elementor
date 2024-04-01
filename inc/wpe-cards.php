<?php

if(!defined('ABSPATH')){
    exit;
}

/**
 *  Work Process Addon
 *
 * @Carousal            Work Process Addon
 * @author            Zain Hassan
 *
 */
   


/**
 * hz-widgets Work Process Addon Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

class hz_Wpe_Cards extends \Elementor\Widget_Base {

	// public function get_style_depends() {
	// 	return [ 'flip-cards' ];
	// }
	
	/**
	 * Get widget name.
	 *
	 * Retrieve company widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'wpe-hz';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve company widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Work Process', 'hz-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve company widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-flip-box';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the company of categories the company widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return ['hz-el-widgets'];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the company of keywords the company widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'card', 'Work Process Addon', 'custom', 'work process' ];
	}

	/**
	 * Register company widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'step_1',
			[
				'label' => esc_html__( 'Step One', 'hz-widgets' ),
			]
		);

		$this->add_control(
			'sublabel_1',
			[
				'label' => esc_html__( 'Sub Label', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'default' => esc_html__( 'Step 1', 'hz-widgets' ),
				'placeholder' => esc_html__( 'Type your description here', 'hz-widgets' ),
			]
		);

		$this->add_control(
			'label_1',
			[
				'label' => esc_html__( 'Label', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'default' => esc_html__( 'Discovery Session', 'hz-widgets' ),
				'placeholder' => esc_html__( 'Type your description here', 'hz-widgets' ),
			]
		);

		$this->add_control(
			'lottie_json_1',
			[
				'label' => esc_html__( 'Upload Lottie JSON', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'application/json' ],
				'default' => [
					'url' => '',
				],
			]
		);

		$this->add_control(
			'lottie_size_1',
			[
				'label' => esc_html__( 'Lottie Size', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 5,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 150,
				],
				'selectors' => [
					'{{WRAPPER}} #nav-step1-tab .lottie_wpe' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'lottie_margin_1',
			[
				'label' => esc_html__( 'Lottie Margin', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} #nav-step1-tab .lottie_wpe' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'lottie_loop_1',
			[
				'label' => esc_html__( 'Lottie Loop', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'hz-widgets' ),
				'label_off' => esc_html__( 'False', 'hz-widgets' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_content_1',
			[
				'label' => esc_html__( 'Content', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'image_content_1',
			[
				'label' => esc_html__( 'Image', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'button_title_1',
			[
				'label' => esc_html__( 'Button Text', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn More' , 'hz-widgets' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'button_link_1',
			[
				'label' => esc_html__( 'Button Link', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'list_1',
			[
				'label' => esc_html__( 'Work Process', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_content_1' => esc_html__( "Understanding Client Objectives:

						Begin by actively listening to the client's goals, challenges, and expectations.
						Encourage open communication to gain a comprehensive understanding of their needs and priorities.", 'hz-widgets' ),
						'image_content_1' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/initial-public-offering.svg',
						],
						'button_title_1' => esc_html__( 'Learn More', 'hz-widgets' )
					],
					[
						'list_content_1' => esc_html__( "Assessing Current Situation:

						Conduct a thorough evaluation of the client's current status, including their existing systems,
						processes, and pain points. Identify any gaps or areas for improvement that need to be addressed.", 'hz-widgets' ),
						'image_content_1' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/assessing.svg',
						],
						'button_title_1' => esc_html__( 'Learn More', 'hz-widgets' )
					],
					[
						'list_content_1' => esc_html__( "Clarifying Expectations:

							Clearly outline the scope of the consultation and the expected outcomes.
							Discuss timelines, deliverables, and any potential challenges or constraints.", 'hz-widgets' ),
						'image_content_1' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/marketing.svg',
						],
						'button_title_1' => esc_html__( 'Learn More', 'hz-widgets' )
					],
					[
						'list_content_1' => esc_html__( "Building Rapport and Trust:

						Take the time to build rapport and establish trust with the client.
						Demonstrate expertise, professionalism, and genuine interest in their success.", 'hz-widgets' ),
						'image_content_1' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/trust.svg',
						],
						'button_title_1' => esc_html__( 'Learn More', 'hz-widgets' )
					],
				],
				'title_field' => '{{{ list_content_1 }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'step_2',
			[
				'label' => esc_html__( 'Step Two', 'hz-widgets' ),
			]
		);

		$this->add_control(
			'sublabel_2',
			[
				'label' => esc_html__( 'Sub Label', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'default' => esc_html__( 'Step 2', 'hz-widgets' ),
				'placeholder' => esc_html__( 'Type your description here', 'hz-widgets' ),
			]
		);

		$this->add_control(
			'label_2',
			[
				'label' => esc_html__( 'Label', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'default' => esc_html__( 'Comprehensive Assessment', 'hz-widgets' ),
				'placeholder' => esc_html__( 'Type your description here', 'hz-widgets' ),
			]
		);

		$this->add_control(
			'lottie_json_2',
			[
				'label' => esc_html__( 'Upload Lottie JSON', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'application/json' ],
				'default' => [
					'url' => '',
				],
			]
		);

		$this->add_control(
			'lottie_size_2',
			[
				'label' => esc_html__( 'Lottie Size', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 5,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 150,
				],
				'selectors' => [
					'{{WRAPPER}} #nav-step2-tab .lottie_wpe' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'lottie_margin_2',
			[
				'label' => esc_html__( 'Lottie Margin', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} #nav-step2-tab .lottie_wpe' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'lottie_loop_2',
			[
				'label' => esc_html__( 'Lottie Loop', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'hz-widgets' ),
				'label_off' => esc_html__( 'False', 'hz-widgets' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);


		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_content_2',
			[
				'label' => esc_html__( 'Content', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'image_content_2',
			[
				'label' => esc_html__( 'Image', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'button_title_2',
			[
				'label' => esc_html__( 'Button Text', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn More' , 'hz-widgets' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'button_link_2',
			[
				'label' => esc_html__( 'Button Link', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'list_2',
			[
				'label' => esc_html__( 'Work Process', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_content_2' => esc_html__( "Data Collection and Analysis:

						Gather data from various sources, including customer interactions, market research, and internal
						processes.
						Analyze the collected data to identify patterns, trends, and areas for improvement.", 'hz-widgets' ),
						'image_content_2' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/data-collection.svg',
						],
						'button_title_2' => esc_html__( 'Learn More', 'hz-widgets' )
					],
					[
						'list_content_2' => esc_html__( "Stakeholder Consultation:

						Engage with key stakeholders, including clients, employees, and partners, to gather their
						perspectives and feedback.
						Conduct interviews, surveys, and focus groups to gain a comprehensive understanding of stakeholder
						needs, expectations, and concerns.", 'hz-widgets' ),
						'image_content_2' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/stakeholder-1.svg',
						],
						'button_title_2' => esc_html__( 'Learn More', 'hz-widgets' )
					],
					[
						'list_content_2' => esc_html__( "Gap Analysis:

						Compare the findings from data analysis and stakeholder consultation against predefined benchmarks,
						industry standards, and best practices.
						Identify gaps, discrepancies, and areas of alignment between current performance and desired
						outcomes.", 'hz-widgets' ),
						'image_content_2' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/gap.svg',
						],
						'button_title_2' => esc_html__( 'Learn More', 'hz-widgets' )
					],
					[
						'list_content_2' => esc_html__( "Recommendations and Action Planning:

						Based on the assessment findings, develop actionable recommendations and strategies for improvement.
						Prioritize recommendations based on their potential impact, feasibility, and alignment with
						organizational goals.", 'hz-widgets' ),
						'image_content_2' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/recommendations.svg',
						],
						'button_title_2' => esc_html__( 'Learn More', 'hz-widgets' )
					],
				],
				'title_field' => '{{{ list_content_2 }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'step_3',
			[
				'label' => esc_html__( 'Step Three', 'hz-widgets' ),
			]
		);

		$this->add_control(
			'sublabel_3',
			[
				'label' => esc_html__( 'Sub Label', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'default' => esc_html__( 'Step 3', 'hz-widgets' ),
				'placeholder' => esc_html__( 'Type your description here', 'hz-widgets' ),
			]
		);

		$this->add_control(
			'label_3',
			[
				'label' => esc_html__( 'Label', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'default' => esc_html__( 'Comprehensive Assessment', 'hz-widgets' ),
				'placeholder' => esc_html__( 'Type your description here', 'hz-widgets' ),
			]
		);

		$this->add_control(
			'lottie_json_3',
			[
				'label' => esc_html__( 'Upload Lottie JSON', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'application/json' ],
				'default' => [
					'url' => '',
				],
			]
		);

		$this->add_control(
			'lottie_size_3',
			[
				'label' => esc_html__( 'Lottie Size', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 5,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 150,
				],
				'selectors' => [
					'{{WRAPPER}} #nav-step3-tab .lottie_wpe' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'lottie_margin_3',
			[
				'label' => esc_html__( 'Lottie Margin', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} #nav-step3-tab .lottie_wpe' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'lottie_loop_3',
			[
				'label' => esc_html__( 'Lottie Loop', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'hz-widgets' ),
				'label_off' => esc_html__( 'False', 'hz-widgets' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_content_3',
			[
				'label' => esc_html__( 'Content', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'image_content_3',
			[
				'label' => esc_html__( 'Image', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'button_title_3',
			[
				'label' => esc_html__( 'Button Text', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn More' , 'hz-widgets' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'button_link_3',
			[
				'label' => esc_html__( 'Button Link', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'list_3',
			[
				'label' => esc_html__( 'Work Process', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_content_3' => esc_html__( "Client Consultation:

						Begin by engaging in thorough discussions with the client to understand their business objectives,
						challenges, and aspirations.
						Actively listen to their input and gather insights into their short-term and long-term goals.", 'hz-widgets' ),
						'image_content_3' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/interview-1.svg',
						],
						'button_title_3' => esc_html__( 'Learn More', 'hz-widgets' )
					],
					[
						'list_content_3' => esc_html__( "Objective Definition:

						Work closely with the client to articulate clear and specific objectives that are achievable and
						measurable.
						Define key performance indicators (KPIs) that will be used to evaluate progress and success.
						Establish realistic timelines and milestones to track progress towards the goals.", 'hz-widgets' ),
						'image_content_3' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/objective.svg',
						],
						'button_title_3' => esc_html__( 'Learn More', 'hz-widgets' )
					],
					[
						'list_content_3' => esc_html__( "Alignment with IT Requirements:

						Assess the client's IT infrastructure, systems, and requirements to ensure that goals are achievable
						within the existing technological framework.
						Identify any gaps or challenges that may impact the attainment of goals and develop strategies to
						address them.", 'hz-widgets' ),
						'image_content_3' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/alignment.svg',
						],
						'button_title_3' => esc_html__( 'Learn More', 'hz-widgets' )
					],
					[
						'list_content_3' => esc_html__( "Continuous Monitoring and Adaptation:

						Implement mechanisms for ongoing monitoring and evaluation of progress towards goals.
						Regularly review performance against established KPIs and milestones, and make adjustments as needed
						to stay on track.", 'hz-widgets' ),
						'image_content_3' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/monitoring.svg',
						],
						'button_title_3' => esc_html__( 'Learn More', 'hz-widgets' )
					],
				],
				'title_field' => '{{{ list_content_3 }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'step_4',
			[
				'label' => esc_html__( 'Step Four', 'hz-widgets' ),
			]
		);

		$this->add_control(
			'sublabel_4',
			[
				'label' => esc_html__( 'Sub Label', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'default' => esc_html__( 'Step 4', 'hz-widgets' ),
				'placeholder' => esc_html__( 'Type your description here', 'hz-widgets' ),
			]
		);

		$this->add_control(
			'label_4',
			[
				'label' => esc_html__( 'Label', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'default' => esc_html__( 'Strategic Planning', 'hz-widgets' ),
				'placeholder' => esc_html__( 'Type your description here', 'hz-widgets' ),
			]
		);

		$this->add_control(
			'lottie_json_4',
			[
				'label' => esc_html__( 'Upload Lottie JSON', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'application/json' ],
				'default' => [
					'url' => '',
				],
			]
		);

		$this->add_control(
			'lottie_size_4',
			[
				'label' => esc_html__( 'Lottie Size', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 5,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 150,
				],
				'selectors' => [
					'{{WRAPPER}} #nav-step4-tab .lottie_wpe' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'lottie_margin_4',
			[
				'label' => esc_html__( 'Lottie Margin', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} #nav-step4-tab .lottie_wpe' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'lottie_loop_4',
			[
				'label' => esc_html__( 'Lottie Loop', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'hz-widgets' ),
				'label_off' => esc_html__( 'False', 'hz-widgets' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_content_4',
			[
				'label' => esc_html__( 'Content', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'image_content_4',
			[
				'label' => esc_html__( 'Image', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'button_title_4',
			[
				'label' => esc_html__( 'Button Text', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn More' , 'hz-widgets' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'button_link_4',
			[
				'label' => esc_html__( 'Button Link', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'list_4',
			[
				'label' => esc_html__( 'Work Process', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_content_4' => esc_html__( "Goal Setting and Analysis:

						Begin by clearly defining your organization's goals and objectives, taking into account both
						short-term and long-term targets.
						Conduct a thorough analysis of internal and external factors that may impact the achievement of
						these goals, such as market trends, competitor activities, and regulatory changes.", 'hz-widgets' ),
						'image_content_4' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/goal-setting-1.svg',
						],
						'button_title_4' => esc_html__( 'Learn More', 'hz-widgets' )
					],
					[
						'list_content_4' => esc_html__( "Developing Strategies and Action Plans:

						Based on the goals and analysis, develop strategic initiatives and action plans that outline how you
						will achieve your objectives.
						Define key strategies, such as market expansion, product development, or cost optimization, and
						identify specific actions and timelines for implementation.", 'hz-widgets' ),
						'image_content_4' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/personalized-2.svg',
						],
						'button_title_4' => esc_html__( 'Learn More', 'hz-widgets' )
					],
					[
						'list_content_4' => esc_html__( "Resource Allocation and Implementation:

						Allocate resources, including budget, personnel, and technology, to support the execution of your
						strategic initiatives.
						Establish clear accountability and responsibility for each action item, and monitor progress closely
						to ensure timely and effective implementation.", 'hz-widgets' ),
						'image_content_4' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/resource-allocation.svg',
						],
						'button_title_4' => esc_html__( 'Learn More', 'hz-widgets' )
					],
					[
						'list_content_4' => esc_html__( "Monitoring and Evaluation:

						Continuously monitor and evaluate the progress of your strategic initiatives against predefined
						metrics and benchmarks.
						Regularly review performance, identify any deviations from the plan, and make adjustments as
						necessary to stay on track and achieve your organizational goals.", 'hz-widgets' ),
						'image_content_4' => [
							'url' => WPA_PLUGIN_ASSETS_FILE . 'images/monitoring.svg',
						],
						'button_title_4' => esc_html__( 'Learn More', 'hz-widgets' )
					],
				],
				'title_field' => '{{{ list_content_4 }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'tab_buttons',
			[
				'label' => esc_html__( 'Tab Buttons', 'hz-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Sub Label', 'hz-widgets' ),
				'name' => 'sublabel_typography',
				'selector' => '{{WRAPPER}} .process-tabs .nav-link .step-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Label', 'hz-widgets' ),
				'name' => 'label_typography',
				'selector' => '{{WRAPPER}} .process-tabs .nav-link',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .process-tabs .nav-link',
			]
		);

		$this->add_control(
			'borderradius',
			[
				'label' => esc_html__( 'Border Radius', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .process-tabs .nav-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .process-tabs .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'tab_content',
			[
				'label' => esc_html__( 'Tab Content', 'hz-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_icon',
			[
				'label' => esc_html__( 'Icon Size', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 5,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 120,
				],
				'selectors' => [
					'{{WRAPPER}} .process-card_icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Description', 'hz-widgets' ),
				'name' => 'content_content_typography',
				'selector' => '{{WRAPPER}} .process-card_text',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Link', 'hz-widgets' ),
				'name' => 'content_content_typography',
				'selector' => '{{WRAPPER}} .process-card .line-btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'selector' => '{{WRAPPER}} .process-card',
			]
		);

		$this->add_control(
			'content_borderradius',
			[
				'label' => esc_html__( 'Border Radius', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .process-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .process-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}


	/**
	 * Render company widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        ?>
		<style>
			.lottie_wpe{
				height: 150px;
				/* position: absolute;
				left: 0;
				right: 0;
				top: 0px;
				bottom: 0; */
			}

			.process-tabs button span{
				position: relative;
			}

			button.nav-link{
				outline: none;
			}
		</style>
		<div class="process-wrapper">
			<div class="nav nav-tabs process-tabs" id="nav-tab" role="tablist">
				<button class="nav-link active"
					id="nav-step1-tab" data-bs-toggle="tab" data-bs-target="#nav-step1" type="button">
					<span
						class="step-title"><?php echo $settings['sublabel_1']; ?>
					</span>
					<?php if(!empty($settings['lottie_json_1']['url'])) : ?>
					<dotlottie-player
					autoplay
					loop="<?php echo $settings['lottie_loop_1'] === 'true' ?'true' : 'false'; ?>"
					mode="normal"
					src="<?php echo $settings['lottie_json_1']['url']; ?>"
					class="lottie_wpe"
					>
					</dotlottie-player>
					<?php endif; ?>
					<span>
						<?php echo $settings['label_1']; ?>
					</span>
					<span class="process-icon"><i
							class="fa-light fa-angles-right fa-fw"></i>
					</span>
				</button>
				<button class="nav-link"
					id="nav-step2-tab" data-bs-toggle="tab" data-bs-target="#nav-step2" type="button">
					<span
						class="step-title"><?php echo $settings['sublabel_2']; ?>
					</span>
					<?php if(!empty($settings['lottie_json_2']['url'])) : ?>
					<dotlottie-player
					autoplay
					loop="<?php echo $settings['lottie_loop_2'] === 'true' ?'true' : 'false'; ?>"
					mode="normal"
					src="<?php echo $settings['lottie_json_2']['url']; ?>"
					class="lottie_wpe"
					>
					</dotlottie-player>
					<?php endif; ?>
					<span>
						<?php echo $settings['label_2']; ?>
					</span><span class="process-icon"><i
							class="fa-light fa-angles-right fa-fw"></i></span></button>
				<button class="nav-link"
					id="nav-step3-tab" data-bs-toggle="tab" data-bs-target="#nav-step3" type="button">
					<span
						class="step-title"><?php echo $settings['sublabel_3']; ?>
					</span>
					<?php if(!empty($settings['lottie_json_3']['url'])) : ?>
					<dotlottie-player
					autoplay
					loop="<?php echo $settings['lottie_loop_3'] === 'true' ?'true' : 'false'; ?>"
					mode="normal"
					src="<?php echo $settings['lottie_json_3']['url']; ?>"
					class="lottie_wpe"
					>
					</dotlottie-player>
					<?php endif; ?>
					<span>
						<?php echo $settings['label_3']; ?>
					</span><span class="process-icon"><i
							class="fa-light fa-angles-right fa-fw"></i></span></button>
				<button class="nav-link"
					id="nav-step4-tab" data-bs-toggle="tab" data-bs-target="#nav-step4" type="button">
					<span
						class="step-title"><?php echo $settings['sublabel_4']; ?>
					</span>
					<?php if(!empty($settings['lottie_json_4']['url'])) : ?>
					<dotlottie-player
					autoplay
					loop="<?php echo $settings['lottie_loop_4'] === 'true' ?'true' : 'false'; ?>"
					mode="normal"
					src="<?php echo $settings['lottie_json_4']['url']; ?>"
					class="lottie_wpe"
					>
					</dotlottie-player>
					<?php endif; ?>
					<span>
						<?php echo $settings['label_4']; ?>
					</span></button>
			</div>
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade active show" id="nav-step1" role="tabpanel">
					<?php if($settings['list_1']) : ?>
						<?php foreach($settings['list_1'] as $item) : ?>
							<div class="process-card">
								<div class="process-card_icon">
								<img decoding="async"
								src="<?php echo $item['image_content_1']['url'];?>"
								alt="svg icon">
								</div>
								<p class="process-card_text"><?php echo $item['list_content_1']; ?></p>
								<?php
								$this->remove_render_attribute( 'button_link_1' );
								if ( ! empty( $item['button_link_1']['url'] ) ) {
									$this->add_link_attributes( 'button_link_1', $item['button_link_1'] );
								}
								?>
								<a <?php echo $this->get_render_attribute_string( 'button_link_1' ); ?> class="line-btn"><?php echo $item['button_title_1']; ?><i class="fa-regular fa-arrow-right"></i></a>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
				<div class="tab-pane fade" id="nav-step2" role="tabpanel">
					<?php if($settings['list_2']) : ?>
						<?php foreach($settings['list_2'] as $item) : ?>
							<div class="process-card">
								<div class="process-card_icon">
								<img decoding="async"
								src="<?php echo $item['image_content_2']['url'];?>"
								alt="svg icon">
								</div>
								<p class="process-card_text"><?php echo $item['list_content_2']; ?></p>
								<?php
								$this->remove_render_attribute( 'button_link_2' );
								if ( ! empty( $item['button_link_2']['url'] ) ) {
									$this->add_link_attributes( 'button_link_2', $item['button_link_2'] );
								}
								?>
								<a <?php echo $this->get_render_attribute_string( 'button_link_2' ); ?> class="line-btn"><?php echo $item['button_title_2']; ?><i class="fa-regular fa-arrow-right"></i></a>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
				<div class="tab-pane fade" id="nav-step3" role="tabpanel">
					<?php if($settings['list_3']) : ?>
						<?php foreach($settings['list_3'] as $item) : ?>
							<div class="process-card">
								<div class="process-card_icon">
								<img decoding="async"
								src="<?php echo $item['image_content_3']['url'];?>"
								alt="svg icon">
								</div>
								<p class="process-card_text"><?php echo $item['list_content_3']; ?></p>
								<?php
								$this->remove_render_attribute( 'button_link_3' );
								if ( ! empty( $item['button_link_3']['url'] ) ) {
									$this->add_link_attributes( 'button_link_3', $item['button_link_3'] );
								}
								?>
								<a <?php echo $this->get_render_attribute_string( 'button_link_3' ); ?> class="line-btn"><?php echo $item['button_title_3']; ?><i class="fa-regular fa-arrow-right"></i></a>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
				<div class="tab-pane fade" id="nav-step4" role="tabpanel">
					<?php if($settings['list_4']) : ?>
						<?php foreach($settings['list_4'] as $item) : ?>
							<div class="process-card">
								<div class="process-card_icon">
								<img decoding="async"
								src="<?php echo $item['image_content_4']['url'];?>"
								alt="svg icon">
								</div>
								<p class="process-card_text"><?php echo $item['list_content_4']; ?></p>
								<?php
								$this->remove_render_attribute( 'button_link_4' );
								if ( ! empty( $item['button_link_4']['url'] ) ) {
									$this->add_link_attributes( 'button_link_4', $item['button_link_4'] );
								}
								?>
								<a <?php echo $this->get_render_attribute_string( 'button_link_4' ); ?> class="line-btn"><?php echo $item['button_title_4']; ?><i class="fa-regular fa-arrow-right"></i></a>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
	}
}