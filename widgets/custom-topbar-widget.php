<?php
class topbar_id_widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'topbar-id-for-elementor';
    }
    public function get_title()
    {
        return esc_html__('Topbar ID', 'topbar-id-for-elementor');
    }
    public function get_icon()
    {
        return 'eicon-editor-list-ul';
    }
    public function get_categories()
    {
        return ['general'];
    }
    public function get_keywords()
    {
        return ['navigation', 'navbar', 'topbar'];
    }
    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Navigation', 'topbar-id-for-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'navList',
            [
                'label' => esc_html__('Navigation List', 'topbar-id-for-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_navigation_label',
                        'label' => esc_html__('Navigation Label', 'topbar-id-for-elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('To Section', 'topbar-id-for-elementor'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'list_target',
                        'label' => esc_html__('Navigation ID Target', 'topbar-id-for-elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('idSection', 'topbar-id-for-elementor'),
                        'label_block' => true,
                    ]
                ],
                'default' => [
                    [
                        'list_navigation_label' => esc_html__('To Section 1', 'topbar-id-for-elementor'),
                        'list_target' => esc_html__('section1', 'topbar-id-for-elementor'),
                    ],
                ],
                'title_field' => '{{{ list_navigation_label }}}',
            ]
        );
        $this->add_control(
            'typeNavLabel',
            [
                'name' => 'list_heading_type',
                'label' => esc_html__('Heading Type', 'topbar-id-for-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'h1' => esc_html__('H1', 'topbar-id-for-elementor'),
                    'h2' => esc_html__('H2', 'topbar-id-for-elementor'),
                    'h3' => esc_html__('H3', 'topbar-id-for-elementor'),
                    'h4' => esc_html__('H4', 'topbar-id-for-elementor'),
                    'h5' => esc_html__('H5', 'topbar-id-for-elementor'),
                    'h6' => esc_html__('H6', 'topbar-id-for-elementor'),
                    'p' => esc_html__('P', 'topbar-id-for-elementor'),
                ],
                'default' => 'h1',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'layer_style',
            [
                'label' => esc_html__('Navigation Layer Styles', 'topbar-id-for-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'layer_background',
                'label' => esc_html__('Layer Background', 'topbar-id-for-elementor'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .topbar',
            ]
        );
        $this->add_control(
            'layerMargin',
            [
                'label' => esc_html__('Layer Margin', 'topbar-id-for-elementor'),
                'devices' => ['desktop', 'tablet', 'mobile'],
                'responsive' => true,
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .topbar' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'layerPadding',
            [
                'label' => esc_html__('Layer Padding', 'topbar-id-for-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'devices' => ['desktop', 'tablet', 'mobile'],
                'responsive' => true,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .topbar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'labelStyle',
            [
                'label' => esc_html__('Navigation Label Styles', 'topbar-id-for-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'label_background',
                'label' => esc_html__('Label Background', 'topbar-id-for-elementor'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .topBarLi',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'labelTypography',
                'devices' => ['desktop', 'tablet', 'mobile'],
                'responsive' => true,
                'selector' => '{{WRAPPER}} .typoGraphStyle',
            ]
        );
        $this->add_control(
            'label-text-color',
            [
                'label' => esc_html__('Color', 'topbar-id-for-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .topBarLi' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'labelMargin',
            [
                'label' => esc_html__('Label Margin', 'topbar-id-for-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'devices' => ['desktop', 'tablet', 'mobile'],
                'responsive' => true,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .topBarLi' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'labelPadding',
            [
                'label' => esc_html__('Label Padding', 'topbar-id-for-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'devices' => ['desktop', 'tablet', 'mobile'],
                'responsive' => true,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .topBarLi' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'labelGap',
            [
                'label' => esc_html__('Label Gap', 'topbar-id-for-elementor'),
                'devices' => ['desktop', 'tablet', 'mobile'],
                'responsive' => true,
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .topbar ul' => 'gap:  {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'labelHover',
            [
                'label' => esc_html__('Label Hover Styles', 'topbar-id-for-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'label_hover_background',
                'label' => esc_html__('Label Hover Background', 'topbar-id-for-elementor'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .topBarLi:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'labelHoverTypography',
                'devices' => ['desktop', 'tablet', 'mobile'],
                'responsive' => true,
                'selector' => '{{WRAPPER}} .topBarLi:hover .typoGraphStyle',
            ]
        );
        $this->add_control(
            'hoverTextColor',
            [
                'label' => esc_html__('Hover Text Color', 'topbar-id-for-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .topBarLi:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'labelHover_animation',
            [
                'label' => esc_html__('Hover Animation', 'topbar-id-for-elementor'),
                'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'labelActive',
            [
                'label' => esc_html__('Label Active Styles', 'topbar-id-for-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'label_active_background',
                'label' => esc_html__('Label Active Background', 'topbar-id-for-elementor'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .topBarLi a.topbar-link.active',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'labelActiveTypography',
                'devices' => ['desktop', 'tablet', 'mobile'],
                'responsive' => true,
                'selector' => '{{WRAPPER}} .topBarLi a.topbar-link.active',
            ]
        );
        $this->add_control(
            'activeTextColor',
            [
                'label' => esc_html__('Active Text Color', 'topbar-id-for-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .topBarLi a.topbar-link.active' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'activeUnderlineColor',
            [
                'label' => esc_html__('Active Underline Color', 'topbar-id-for-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .topBarLi a.topbar-link::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $topBarLi = 'topBarLi';

        if ($settings['labelHover_animation']) {
            $topBarLi .= ' elementor-animation-' . $settings['labelHover_animation'];
        }
        $navlist = $settings['navList'];
        $labelType = $settings['typeNavLabel'];

        $this->add_render_attribute('topBarLi', 'class', $topBarLi);
        if (empty($navlist)) {
            return;
        }
        ?>
<div class="setCustomTopbar" id="topbar-id-for-elementor">
    <div class="topbar">
        <ul class="topbarIDUl">
            <?php foreach ($navlist as $index => $item): ?>
            <li <?php $this->print_render_attribute_string('topBarLi'); ?>>
                <a href="<?php echo esc_url('#' . esc_attr($item['list_target'])); ?>"
                    data-target="<?php echo esc_attr($item['list_target']); ?>" class="topbar-link">
                    <<?php echo esc_html($labelType); ?> class="typoGraphStyle">
                        <?php echo esc_html($item['list_navigation_label']); ?>
                    </<?php echo esc_html($labelType); ?>>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php
    }
}
?>