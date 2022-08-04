<?php
/**
 * Functions - Elementor - Widget
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_elementor_widgets_register')) {
  /**
   * Register custom elementor widgets
   */
  function vikinger_elementor_widgets_register() {
    /**
     * Menu Widget
     */
    class Vikinger_Menu extends \Elementor\Widget_Base {
      public function get_name() {
        return 'vikinger-menu';
      }
    
      public function get_title() {
        return 'Vikinger Menu';
      }
    
      public function get_icon() {
        return 'eicon-header';
      }
    
      public function get_categories() {
        return ['vikinger'];
      }
    
      protected function register_controls() {
        $wp_menus = wp_get_nav_menus();

        $menu_options = [];

        if (is_array($wp_menus)) {
          foreach ($wp_menus as $wp_menu) {
            $menu_options[$wp_menu->term_id] = $wp_menu->name;
          }
        }

        $this->start_controls_section(
          'menu_section',
          [
            'label' => __('Menu', 'vikinger'),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT
          ]
        );
    
        $this->add_control(
          'menu',
          [
            'label'       => __('Select a Menu', 'vikinger'),
            'description' => __('You can add/edit menus via the WordPress backend "Appearance" -> "Menus" page.', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::SELECT,
            'options'     => $menu_options
          ]
        );

        $type_options = [
          'threaded'  => 'Threaded',
          'flat'      => 'Flat'
        ];

        $this->add_control(
          'menu_type',
          [
            'label'       => __('Select a Type', 'vikinger'),
            'description' => __('The "Threaded" option shows submenu items when hovering over the respective menu item parent. The "Flat" type shows all menu and submenu items in the same level. ', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::SELECT,
            'options'     => $type_options,
            'default'     => 'threaded'
          ]
        );
    
        $this->end_controls_section();

        $this->start_controls_section(
          'menu_item_section',
          [
            'label' => __('Menu Item', 'vikinger'),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT
          ]
        );

        $this->add_control(
          'menu_item_color',
          [
            'label'       => __('Color', 'vikinger'),
            'description' => __('Controls menu item text color. ', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::COLOR,
            'alpha'       => false,
            'default'     => '#3e3f5e'
          ]
        );

        $this->add_control(
          'menu_item_icon_color',
          [
            'label'       => __('Icon Color', 'vikinger'),
            'description' => __('Controls menu item icon color. ', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::COLOR,
            'alpha'       => false,
            'default'     => '#3e3f5e'
          ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
          'submenu_section',
          [
            'label' => __('SubMenu', 'vikinger'),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT
          ]
        );

        $this->add_control(
          'submenu_background_color',
          [
            'label'       => __('Background Color', 'vikinger'),
            'description' => __('Controls submenu background color. ', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::COLOR,
            'alpha'       => false,
            'default'     => '#ffffff'
          ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
          'submenu_item_section',
          [
            'label' => __('SubMenu Item', 'vikinger'),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT
          ]
        );

        $this->add_control(
          'submenu_item_color',
          [
            'label'       => __('Color', 'vikinger'),
            'description' => __('Controls submenu item text color. ', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::COLOR,
            'alpha'       => false,
            'default'     => '#3e3f5e'
          ]
        );

        $this->add_control(
          'submenu_item_icon_color',
          [
            'label'       => __('Icon Color', 'vikinger'),
            'description' => __('Controls submenu item icon color. ', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::COLOR,
            'alpha'       => false,
            'default'     => '#3e3f5e'
          ]
        );

        $this->end_controls_section();
      }
    
      protected function render() {
        $settings = $this->get_settings_for_display();

        $menu_items = vikinger_menu_get_items((int) $settings['menu']);

        $menu_styles = [
          'menu-item'         => [
            'color' => $settings['menu_item_color']
          ],
          'menu-item-icon'    => [
            'fill' => $settings['menu_item_icon_color']
          ],
          'submenu'           => [
            'background-color'  => $settings['submenu_background_color']
          ],
          'submenu-item'      => [
            'color' => $settings['submenu_item_color']
          ],
          'submenu-item-icon' => [
            'fill' => $settings['submenu_item_icon_color']
          ]
        ];

        /**
         * Navigation
         */
        get_template_part('template-part/elementor/navigation/navigation', null, [
          'menu_items'  => $menu_items[$settings['menu_type']],
          'menu_styles' => $menu_styles
        ]);
      }
    
      protected function content_template() {}
    }

    /**
     * Mobile Menu Widget
     */
    class Vikinger_Menu_Mobile extends \Elementor\Widget_Base {
      public function get_name() {
        return 'vikinger-menu-mobile';
      }
    
      public function get_title() {
        return 'Vikinger Mobile Menu';
      }
    
      public function get_icon() {
        return 'eicon-menu-bar';
      }
    
      public function get_categories() {
        return ['vikinger'];
      }
    
      protected function register_controls() {
        $wp_menus = wp_get_nav_menus();

        $menu_options = [];

        if (is_array($wp_menus)) {
          foreach ($wp_menus as $wp_menu) {
            $menu_options[$wp_menu->term_id] = $wp_menu->name;
          }
        }

        $this->start_controls_section(
          'menu_mobile_section',
          [
            'label' => __('Menu', 'vikinger'),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT
          ]
        );
    
        $this->add_control(
          'menu_mobile',
          [
            'label'       => __('Select a Menu', 'vikinger'),
            'description' => __('You can add/edit menus via the WordPress backend "Appearance" -> "Menus" page.', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::SELECT,
            'options'     => $menu_options
          ]
        );

        $type_options = [
          'threaded'  => 'Threaded',
          'flat'      => 'Flat'
        ];

        $this->add_control(
          'menu_mobile_type',
          [
            'label'       => __('Select a Type', 'vikinger'),
            'description' => __('The "Threaded" option shows padded submenu items below the respective menu item parent. The "Flat" type shows all menu and submenu items in the same level.', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::SELECT,
            'options'     => $type_options,
            'default'     => 'threaded'
          ]
        );

        $this->add_control(
          'menu_mobile_trigger_open_icon',
          [
            'label'       => __('Open Menu Trigger Icon', 'vikinger'),
            'description' => __('The selected icon will be used as the trigger for opening the mobile menu.', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::ICONS,
            'default'     => [
              'value'   => 'fas fa-bars',
              'library' => 'fa-solid'
            ]
          ]
        );

        $this->add_control(
          'menu_mobile_trigger_open_icon_size',
          [
            'label'       => __('Open Menu Trigger Icon - Size', 'vikinger'),
            'description' => __('Controls icon size.', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::NUMBER,
            'default'     => '20'
          ]
        );

        $this->add_control(
          'menu_mobile_trigger_open_icon_color',
          [
            'label'       => __('Open Menu Trigger Icon - Color', 'vikinger'),
            'description' => __('Controls icon color.', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::COLOR,
            'default'     => '#fff'
          ]
        );

        $this->add_control(
          'menu_mobile_trigger_close_icon',
          [
            'label'       => __('Close Menu Trigger Icon', 'vikinger'),
            'description' => __('The selected icon will be used as the trigger for closing the mobile menu.', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::ICONS,
            'default'     => [
              'value'   => 'fas fa-times',
              'library' => 'fa-solid'
            ]
          ]
        );

        $this->add_control(
          'menu_mobile_trigger_close_icon_size',
          [
            'label'       => __('Close Menu Trigger Icon - Size', 'vikinger'),
            'description' => __('Controls icon size.', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::NUMBER,
            'default'     => '20'
          ]
        );

        $this->add_control(
          'menu_mobile_trigger_close_icon_color',
          [
            'label'       => __('Close Menu Trigger Icon - Color', 'vikinger'),
            'description' => __('Controls icon color.', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::COLOR,
            'default'     => '#3e3f5e'
          ]
        );

        $this->add_control(
          'menu_mobile_logo',
          [
            'label'       => __('Logo', 'vikinger'),
            'description' => __('Image that displays before the title when the mobile menu is open.', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::MEDIA
          ]
        );

        $this->add_control(
          'menu_mobile_title',
          [
            'label'       => __('Title', 'vikinger'),
            'description' => __('Text that displays after the logo when the mobile menu is open.', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'input_type'  => 'text',
            'default'     => 'vikinger'
          ]
        );

        $this->add_control(
          'menu_mobile_title_color',
          [
            'label'       => __('Title - Color', 'vikinger'),
            'description' => __('Controls title text color.', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::COLOR,
            'default'     => '#3e3f5e'
          ]
        );

        $this->add_control(
          'menu_mobile_background_color',
          [
            'label'       => __('Background Color', 'vikinger'),
            'description' => __('Controls menu background color.', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::COLOR,
            'alpha'       => false,
            'default'     => '#fff'
          ]
        );
    
        $this->end_controls_section();

        $this->start_controls_section(
          'menu_mobile_item_section',
          [
            'label' => __('Menu Item', 'vikinger'),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT
          ]
        );

        $this->add_control(
          'menu_mobile_item_color',
          [
            'label'       => __('Color', 'vikinger'),
            'description' => __('Controls menu item text color. ', 'vikinger'),
            'type'        => \Elementor\Controls_Manager::COLOR,
            'alpha'       => false,
            'default'     => '#3e3f5e'
          ]
        );

        $this->end_controls_section();
      }
    
      protected function render() {
        $settings = $this->get_settings_for_display();

        $menu_items = vikinger_menu_get_items((int) $settings['menu_mobile']);

        $menu_styles = [
          'menu'        => [
            'background-color'  => $settings['menu_mobile_background_color']
          ],
          'menu-title'  => [
            'color' => $settings['menu_mobile_title_color']
          ],
          'menu-trigger-open' => [
            'color'     => $settings['menu_mobile_trigger_open_icon_color'],
            'font-size' => $settings['menu_mobile_trigger_open_icon_size'] . 'px'
          ],
          'menu-trigger-close' => [
            'color'     => $settings['menu_mobile_trigger_close_icon_color'],
            'font-size' => $settings['menu_mobile_trigger_close_icon_size'] . 'px'
          ],
          'menu-item'   => [
            'color' => $settings['menu_mobile_item_color']
          ]
        ];

        /**
         * Navigation Mobile
         */
        get_template_part('template-part/elementor/navigation/navigation-mobile', null, [
          'menu_items'              => $menu_items[$settings['menu_mobile_type']],
          'menu_styles'             => $menu_styles,
          'menu_title'              => $settings['menu_mobile_title'],
          'menu_logo'               => $settings['menu_mobile_logo'],
          'menu_trigger_open_icon'  => $settings['menu_mobile_trigger_open_icon'],
          'menu_trigger_close_icon' => $settings['menu_mobile_trigger_close_icon']
        ]);
      }
    
      protected function content_template() {}
    }

    $vikinger_menu = new Vikinger_Menu();
    $vikinger_menu_mobile = new Vikinger_Menu_Mobile();

    // Let Elementor know about our widget
    Elementor\Plugin::instance()->widgets_manager->register_widget_type($vikinger_menu);
    Elementor\Plugin::instance()->widgets_manager->register_widget_type($vikinger_menu_mobile);
  }
}

add_action('elementor/widgets/widgets_registered', 'vikinger_elementor_widgets_register');

if (!function_exists('vikinger_elementor_widget_categories_register')) {
  /**
   * Create new elementor categories
   */
  function vikinger_elementor_widget_categories_register($elements_manager) {
    $elements_manager->add_category(
      'vikinger',
      [
        'title' => esc_html_x('Vikinger', '(Elementor) Vikinger Category - Title', 'vikinger'),
        'icon'  => 'fa fa-plug',
      ]
    );
  }
}

add_action('elementor/elements/categories_registered', 'vikinger_elementor_widget_categories_register');

?>