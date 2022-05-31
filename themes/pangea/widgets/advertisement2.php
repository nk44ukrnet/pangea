<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Advertisement2 extends Widget_Base
{

    public function get_name()
    {
        return 'advertisement2';
    }

    public function get_title()
    {
        return 'Advertisement2';
    }

    public function get_icon()
    {
        return 'fa fa-camera';
    }

    public function get_categories()
    {
        return ['general'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'section_content_block',
            [
                'label' => 'Settings',
            ]
        );

        $this->add_control(
            'content_block1',
            [
                'label' => 'Label Heading',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => "<em>95%</em>
                        <strong>Positive Feedback</strong>
                        <span>We strongly believe that successful content marketing</span>"
            ]
        );

        $this->add_control(
            'content_block2',
            [
                'label' => 'content_block3 Heading',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => "<em>95%</em>
                        <strong>Positive Feedback</strong>
                        <span>We strongly believe that successful content marketing</span>"
            ]
        );

        $this->add_control(
            'content_block3',
            [
                'label' => 'content_block3',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => "<em>95%</em>
                        <strong>Positive Feedback</strong>
                        <span>We strongly believe that successful content marketing</span>"
            ]
        );

        $this->add_control(
            'content_block4',
            [
                'label' => 'content_block4',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => "<h2>Our Progress & Marketing Analysis</h2>
                    <p>
                        And produce say the ten moments parties. Simple innate summer fat appear basket his desire joy.
                        Outward clothes promise at gravity do excited.
                    </p>"
            ]
        );

        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes('content_block1', 'basic');
        $this->add_render_attribute(
            'content_block1',
            [
                'class' => ['advertisement__label-heading'],
            ]
        );

        ?>
        <div class="landing_wrapper">
            <div class="landing2">
                <div class="landing2__section">
                    <div class="landing2__item">
                        <?php echo $settings['content_block1']; ?>
                    </div>
                    <div class="landing2__item">
                        <?php echo $settings['content_block2']; ?>
                    </div>
                    <div class="landing2__item">
                        <?php echo $settings['content_block3']; ?>
                    </div>
                </div>
                <div class="landing2__section">
                    <?php echo $settings['content_block4']; ?>
                </div>
            </div>
        </div>
        <?php
    }

    protected function _content_template()
    {
        ?>
        <#
        view.addInlineEditingAttributes( 'content_block1', 'basic' );
        view.addRenderAttribute(
        'content_block1',
        {
        'class': [ 'advertisement__label-heading' ],
        }
        );
        #>
        <div class="landing_wrapper">
            <div class="landing2">
                <div class="landing2__section">
                    <div class="landing2__item">
                        {{{ settings.content_block1 }}}
                    </div>
                    <div class="landing2__item">
                        {{{ settings.content_block2 }}}
                    </div>
                    <div class="landing2__item">
                        {{{ settings.content_block3 }}}
                    </div>
                </div>
                <div class="landing2__section">
                    {{{ settings.content_block4 }}}
                </div>
            </div>
        </div>

        <?php
    }
}
