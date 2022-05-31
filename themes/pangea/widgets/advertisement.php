<?php

namespace WPC\Widgets;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Advertisement extends Widget_Base{

  public function get_name(){
    return 'advertisement';
  }

  public function get_title(){
    return 'Advertisement';
  }

  public function get_icon(){
    return 'fa fa-camera';
  }

  public function get_categories(){
    return ['general'];
  }

  protected function _register_controls(){

    $this->start_controls_section(
      'section_content',
      [
        'label' => 'Settings',
      ]
    );

    $this->add_control(
      'label_heading',
      [
        'label' => 'Label Heading',
        'type' => \Elementor\Controls_Manager::MEDIA,
          'dynamic' => [
              'active' => true,
          ],
          'default' => [
              'url' => Utils::get_placeholder_image_src(),
//              'url' => 'https://picsum.photos/659/926',
          ],
        //'default' => 'My Example Heading'
      ]
    );

    $this->add_control(
      'content_heading',
      [
        'label' => 'Content Heading',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'Find a Better <br> Solution for your'
      ]
    );

    $this->add_control(
      'content',
      [
        'label' => 'Content',
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => 'From dept consolidation to your dream getaway, find a loan that meets your needs.'
      ]
    );

    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();

    $this->add_inline_editing_attributes('label_heading', 'basic');
    $this->add_render_attribute(
      'label_heading',
      [
        'class' => ['advertisement__label-heading'],
      ]
    );

    ?>
      <div class="landing_wrapper">
          <div class="landing1">
              <div class="landing1__item">
                  <div class="landing1__text"><?php echo $settings['content_heading'] ?></div>
                  <div class="landing1__text"><?php echo $settings['content'] ?>
                  </div>
              </div>
              <div class="landing1__item"><img src="<?php echo $settings['label_heading']['url']?>" alt="img"></div>
          </div>
      </div>
    <?php
  }

  protected function _content_template(){
    ?>
    <#
        view.addInlineEditingAttributes( 'label_heading', 'basic' );
    view.addRenderAttribute(
        'label_heading',
        {
            'class': [ 'advertisement__label-heading' ],
        }
    );
      console.log(view.getRenderAttributeString)
        #>
      <div class="landing_wrapper">
          <div class="landing1">
              <div class="landing1__item">
                  <div class="landing1__text">{{{ settings.content_heading }}}</div>
                  <div class="landing1__text">{{{ settings.content }}}
                  </div>
              </div>
              <div class="landing1__item"><img src="{{{ settings.label_heading.url }}}" alt="img"></div>
          </div>
      </div>
        <?php
  }
}
