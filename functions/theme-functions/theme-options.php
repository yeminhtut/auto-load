<?php
/**
 * Redux theme option settings
 *
 * @package ReduxFramework
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if (!class_exists('Redux_Framework_sample_config')) {

    class Redux_Framework_sample_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public function setSections() {


            // ACTUAL DECLARATION OF SECTIONS
            $this->sections[] = array(
                'icon' => 'el-icon-cogs',
                'title' => esc_html__('General', 'newmagz'),
                'fields' => array(
                    array(
                        'id'                        => 'display_featured_slider',
                        'type'                      => 'switch',
                        'title'                     => esc_html__('Featured Slider', 'newmagz'),
                        'desc'                      => esc_html__('Display featured slider.', 'newmagz'),
                        'default'                   => 1,
                    ),

                    array(
                        'id'                        => 'featured_slider_categories',
                        'type'                      => 'select',
                        'data'                      => 'categories',
                        'multi'                     => true,
                        'title'                     => esc_html__('Featured Slider category', 'newmagz'),
                        'desc'                      => esc_html__('Select a category that you will use.', 'newmagz'),
                        'required'                  => array('display_featured_slider', 'equals', '1'),
                    ),

                    array(
                        'id'                        => 'featured_slider_show_items',
                        'type'                      => 'slider',
                        'required'                  => array('display_featured_slider', 'equals', '1'),
                        'title'                     => esc_html__('Featured Slider Show Items', 'newmagz'),
                        'desc'                      => esc_html__('How many items should be displayed in the featured slider.', 'newmagz'),
                        'default'                   => 12,
                        'min'                       => 12,
                        'step'                      => 12,
                        'max'                       => 42,
                        'display_value'             => 'text'
                    ),

                    array(
                        'id'                        => 'featured_slider_title_length',
                        'type'                      => 'slider',
                        'title'                     => esc_html__('Featured post slider title length', 'newmagz'),
                        'default'                   => 6,
                        'min'                       => 6,
                        'step'                      => 1,
                        'max'                       => 20,
                        'display_value'             => 'text'
                    ),

                    array(
                        'id'                        => 'featured_slider_word_length',
                        'type'                      => 'slider',
                        'title'                     => esc_html__('Featured post slider excerpt length', 'newmagz'),
                        'default'                   => 30,
                        'min'                       => 10,
                        'step'                      => 1,
                        'max'                       => 60,
                        'display_value'             => 'text'
                    ),

                    array(
                        'id'                        => 'enable_open_graph',
                        'type'                      => 'switch',
                        'title'                     => esc_html__('Enable Built-In Open Graph', 'newmagz'),
                        'description'               => esc_html__('Add open graph meta tags, useful when sharing your articles on social media such as Facebook.', 'newmagz'),
                        'default'                   => '1',
                    ),

                    array(
                        'id'                        => 'display_curr_date_time',
                        'type'                      => 'switch',
                        'title'                     => esc_html__('Enable Current Date & Time', 'newmagz'),
                        'desc'                      => esc_html__('Display current date & time in header area', 'newmagz'),
                        "default"                   => 1,
                    ),

                    array(
                        'id'                        => 'display_social_buttons',
                        'type'                      => 'switch',
                        'title'                     => esc_html__('Enable Social Buttons', 'newmagz'),
                        'desc'                      => esc_html__('Display social buttons in footer area', 'newmagz'),
                        "default"                   => 1,
                    ),

                    array(
                        'id'                        => 'display_footer_logo',
                        'type'                      => 'switch',
                        'title'                     => esc_html__('Enable Footer Logo', 'newmagz'),
                        'desc'                      => esc_html__('Display footer logo in footer area', 'newmagz'),
                        "default"                   => 1,
                    ),

                    array(
                        'id'                        => 'display_back_to_top',
                        'type'                      => 'switch',
                        'title'                     => esc_html__('Enable Back to Top Button', 'newmagz'),
                        'desc'                      => esc_html__('Display back to top button', 'newmagz'),
                        "default"                   => 1,
                    ),
                 )
            );

            $this->sections[] = array(
                'icon' => 'el-icon-website',
                'title' => esc_html__('Appearance', 'newmagz'),
                'fields' => array(
                    array(
                        'id'                          => 'logo',
                        'type'                        => 'media', 
                        'title'                       => esc_html__('Site Logo', 'newmagz'),
                        'output'                      => 'true',
                        'mode'                        => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'                        => esc_html__('Upload your logo.', 'newmagz'),
                        'default'                     => array('url' => get_template_directory_uri().'/images/logo.png'),
                    ),

                    array(
                        'id'                          => 'footer_logo',
                        'type'                        => 'media', 
                        'title'                       => esc_html__('Footer Logo', 'newmagz'),
                        'output'                      => 'true',
                        'mode'                        => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'                        => esc_html__('Upload your logo.', 'newmagz'),
                        'default'                     => array('url' => get_template_directory_uri().'/images/logo-newmagz-white.png'),
                    ),
                 )
            );

            $this->sections[] = array(
                'icon' => 'el-icon-list-alt',
                'title' => esc_html__('Post Settings', 'newmagz'),
                'fields' => array(
                    array(
                        'id'                        => 'section-general-posts',
                        'type'                      => 'info',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => esc_html__('General Posts', 'newmagz'),
                        'desc'                      => esc_html__('General posts settings section.', 'newmagz'),
                    ),

                    array(
                        'id'                        => 'display_recent_post',
                        'type'                      => 'switch',
                        'title'                     => esc_html__('Display Recent Post', 'newmagz'),
                        'desc'                      => esc_html__('Display recent post slider in archive post', 'newmagz'),
                        "default"                   => 1,
                    ),

                    array(
                        'id'                        => 'display_related_post',
                        'type'                      => 'switch',
                        'title'                     => esc_html__('Display Related Post', 'newmagz'),
                        'desc'                      => esc_html__('Display related post in post detail', 'newmagz'),
                        "default"                   => 1,
                    ),

                    array(
                        'id'                        => 'display_post_navigation',
                        'type'                      => 'switch',
                        'title'                     => esc_html__('Display Post Navigation', 'newmagz'),
                        'desc'                      => esc_html__('Display post navigation in post detail', 'newmagz'),
                        "default"                   => 1,
                    ),

                    array(
                        'id'                        => 'display_author_bio',
                        'type'                      => 'switch',
                        'title'                     => esc_html__('Display About Author', 'newmagz'),
                        'desc'                      => esc_html__('Display about author in post detail', 'newmagz'),
                        "default"                   => 1,
                    ),

                    array(
                        'id'                        => 'section-post-detail',
                        'type'                      => 'info',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => esc_html__('Post Details', 'newmagz'),
                        'desc'                      => esc_html__('Post details settings section.', 'newmagz'),
                    ),

                    array(
                        'id'                        => 'display_featured_image',
                        'type'                      => 'switch',
                        'title'                     => esc_html__('Display Featured Image', 'newmagz'),
                        'desc'                      => esc_html__('Display featured image in detail post.', 'newmagz'),
                        'default'                   => 1,
                    ),

                    array(
                        'id'                        => 'display_tags',
                        'type'                      => 'switch',
                        'title'                     => esc_html__('Display Tags', 'newmagz'),
                        'desc'                      => esc_html__('Display tags in post detail', 'newmagz'),
                        "default"                   => 1,
                    ),

                    array(
                        'id'                        => 'display_share_buttons',
                        'type'                      => 'switch',
                        'title'                     => esc_html__('Display Share Buttons', 'newmagz'),
                        'desc'                      => esc_html__('Display share buttons in post detail', 'newmagz'),
                        "default"                   => 1,
                    ),

                    array(
                        'id'                        => 'display_comment',
                        'type'                      => 'switch',
                        'title'                     => esc_html__('Display Comments', 'newmagz'),
                        'desc'                      => esc_html__('Display comment in post detail', 'newmagz'),
                        "default"                   => 1,
                    ),
                 )
            );

            $this->sections[] = array(
                'icon' => 'el-icon-font',
                'title' => esc_html__('Typography', 'newmagz'),
                'fields' => array(
                    array(
                        'id'                        => 'info-typography-common',
                        'type'                      => 'info',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => esc_html__('Common Typography', 'newmagz'),
                        'desc'                      => esc_html__('Common typography settings section.', 'newmagz')
                    ),

                    array(
                        'id'                        => 'main_body_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Main Body Typography', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'all_styles'                => true,
                        'output'                    => array('body'),
                        'default'                   => array(
                                                        'font-family' => 'Lato',
                                                        'font-size'   => '15px',
                                                        'font-weight' => '400',
                                                        'color'       => '#808080',
                                                    ),
                    ),

                    array(
                        'id'                        => 'main_menu_font',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Main Menu Typography', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'all_styles'                => false,
                        'text-transform'            => true,
                        'letter-spacing'            => true,
                        'output'                    => array('nav#main-menu.site-navigation ul li a'),
                        'default'                   => array(
                                                        'font-family'       => 'Lato',
                                                        'font-size'         => '14px',
                                                        'font-weight'       => '400',
                                                        'color'             => '#333333',
                                                        'text-transform'    => 'uppercase',
                                                        'letter-spacing'    => '1px'
                                                    ),
                    ),

                    array(
                        'id'                        => 'breadcrumb_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Breadcrumb Typography', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'all_styles'                => false,
                        'text-align'                => false,
                        'output'                    => array('.breadcrumbs'),
                        'default'                   => array(
                                                        'font-family' => 'Roboto',
                                                        'font-size'   => '12px',
                                                        'font-weight' => '700',
                                                        'color'       => '#4b4b4b',
                                                    ),
                    ),
                    
                    array(
                        'id'                        => 'info-typography-widget',
                        'type'                      => 'info',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => esc_html__('Widget Typography', 'newmagz'),
                        'desc'                      => esc_html__('Widget typography settings section.', 'newmagz')
                    ),

                    array(
                        'id'                        => 'home_widget_title_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Homepage Widget Title Typography', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => true,
                        'text-transform'            => true,
                        'output'                    => array('.homepage-widget .section-title h4'),
                        'default'                   => array(
                                                        'font-family'    => 'Merriweather',
                                                        'font-size'      => '35px',
                                                        'font-weight'    => '700',
                                                        'color'          => '#000000',
                                                        'text-transform' => 'none',
                                                        'letter-spacing' => '0px'
                                                    ),
                    ),

                    array(
                        'id'                        => 'home_widget_sub_title_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Homepage Widget Sub Title Typography', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => true,
                        'text-transform'            => true,
                        'output'                    => array('.homepage-widget .section-title small.section-subtitle'),
                        'default'                   => array(
                                                        'font-family' => 'Lato',
                                                        'font-size'   => '14px',
                                                        'font-weight' => '400',
                                                        'color'       => '#bbb',
                                                        'letter-spacing' => '1px'
                                                    ),
                    ),

                    array(
                        'id'                        => 'sidebar_widget_title_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Sidebar Widget Title Typography', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => true,
                        'text-transform'            => true,
                        'output'                    => array('.sidebar-widget .widget-title h4'),
                        'default'                   => array(
                                                        'font-family'    => 'Lato',
                                                        'font-size'      => '12px',
                                                        'font-weight'    => '400',
                                                        'color'          => '#212121',
                                                        'text-transform' => 'uppercase',
                                                        'letter-spacing' => '3px'
                                                    ),
                    ),

                    array(
                        'id'                        => 'single_widget_title_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Post Detail Widget Title Typography', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => true,
                        'text-transform'            => true,
                        'output'                    => array('.article-widget .widget-title h4', '.comment-respond .widget-title h4', '#archive-page .widget-title h4'),
                        'default'                   => array(
                                                        'font-family'    => 'Lato',
                                                        'font-size'      => '12px',
                                                        'font-weight'    => '400',
                                                        'color'          => '#212121',
                                                        'text-transform' => 'uppercase',
                                                        'letter-spacing' => '3px'
                                                    ),
                    ),

                    array(
                        'id'                        => 'footer_top_widget_title_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Footer Top Widget Title Typography', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => true,
                        'text-transform'            => true,
                        'output'                    => array('#footer-widgets .widget-title h4'),
                        'default'                   => array(
                                                        'font-family'    => 'Lato',
                                                        'font-size'      => '12px',
                                                        'font-weight'    => '400',
                                                        'color'          => '#212121',
                                                        'text-transform' => 'uppercase',
                                                        'letter-spacing' => '3px'
                                                    ),
                    ),

                    array(
                        'id'                        => 'footer_bottom_widget_title_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Footer Bottom Widget Title Typography', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => true,
                        'text-transform'            => true,
                        'output'                    => array('#footer-bottom .widget-title h4'),
                        'default'                   => array(
                                                        'font-family'    => 'Lato',
                                                        'font-size'      => '12px',
                                                        'font-weight'    => '400',
                                                        'color'          => '#ffffff',
                                                        'text-transform' => 'uppercase',
                                                        'letter-spacing' => '3px'
                                                    ),
                    ),

                    array(
                        'id'                        => 'footer_site_info',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Site Info in Footer', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => false,
                        'text-transform'            => false,
                        'output'                    => array('footer#colofone #site-info'),
                        'default'                   => array(
                                                        'font-family'    => 'Lato',
                                                        'font-size'      => '14px',
                                                        'font-weight'    => '400',
                                                        'color'          => '#9e9e9e',
                                                    ),
                    ),

                    array(
                        'id'                        => 'info-typography-post-page',
                        'type'                      => 'info',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => esc_html__('Post & Page Typography', 'newmagz'),
                        'desc'                      => esc_html__('Post & Page typography settings section.', 'newmagz')
                    ),

                    array(
                        'id'                        => 'widget_main_post_title',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Main Post Title in Visual Composer Elements', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => true,
                        'text-align'                => false,
                        'letter-spacing'            => false,
                        'text-transform'            => false,
                        'output'                    => array('.homepage-widget article.hentry h3', '#archive-page article.hentry.full-width-post.left-thumbnail h3.post-title'),
                        'default'                   => array(
                                                        'font-family' => 'Merriweather',
                                                        'font-size'   => '22px',
                                                        'font-weight' => '700',
                                                        'color'       => '#000000',
                                                        'line-height' => '28px'
                                                    ),
                    ),

                    array(
                        'id'                        => 'widget_secondary_post_title',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Secondary Post Title', 'newmagz'),
                        'desc'                      => esc_html__('Secondary post title in Visual Composer elements and post title in Sidebar &amp; Footer', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => true,
                        'text-align'                => false,
                        'letter-spacing'            => false,
                        'text-transform'            => false,
                        'output'                    => array('.homepage-widget article.square-thumb-post h3', '.homepage-widget .warrior-carousel article.hentry h3', '.widget-type-4 .post-list-style h3.post-title', '.widget-type-5 h3.post-title', 'article.hentry.slider-post .entry-content h3', '.footer-widget h3.post-title', '.post-list-style ul li h3.post-title', '#about-author h5', '.article-widget.related-post h3.post-title', '.categories ul li .summary a', '.article-widget.post-navigation ul li article.hentry.square-thumb-post h3.post-title'),
                        'default'                   => array(
                                                        'font-family' => 'Merriweather',
                                                        'font-size'   => '16px',
                                                        'font-weight' => '700',
                                                        'color'       => '#000000',
                                                        'line-height' => '22px'
                                                    ),
                    ),

                    array(
                        'id'                        => 'widget_sidebar_post_title',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Post Title in Sidebar', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => false,
                        'text-transform'            => false,
                        'output'                    => array('.sidebar-widget article.hentry h3'),
                        'default'                   => array(
                                                        'font-family' => 'Merriweather',
                                                        'font-size'   => '16px',
                                                        'font-weight' => '700',
                                                        'color'       => '#000000',
                                                    ),
                    ),

                    array(
                        'id'                        => 'post_category_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Post Category Name Typography', 'newmagz'),
                        'desc'                      => esc_html__('Post category name in widget, each posts & detail posts', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => true,
                        'text-transform'            => true,
                        'output'                    => array('.post-category', '#footer-widgets .post-category a'),
                        'default'                   => array(
                                                        'font-family'    => 'Lato',
                                                        'font-size'      => '10px',
                                                        'font-weight'    => '400',
                                                        'color'          => '#ec407a',
                                                        'text-transform' => 'uppercase',
                                                        'letter-spacing' => '1px'
                                                    ),
                    ),

                    array(
                        'id'                        => 'post_category_thumbnail_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Post Thumbnail Category Name Typography', 'newmagz'),
                        'desc'                      => esc_html__('Post category name in widget & each posts thumbnail', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => false,
                        'text-transform'            => true,
                        'output'                    => array('article.post-overlay .entry-content .post-category', '#footer-widgets article.post-overlay .entry-content .post-category a', '.categories ul li .summary a small'),
                        'default'                   => array(
                                                        'font-family'    => 'Lato',
                                                        'font-size'      => '10px',
                                                        'font-weight'    => '400',
                                                        'color'          => '#c51818',
                                                        'text-transform' => 'uppercase',
                                                    ),
                    ),

                    array(
                        'id'                        => 'post_meta_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Post Meta Typography', 'newmagz'),
                        'desc'                      => esc_html__('Post meta in widget & each posts', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => false,
                        'text-transform'            => false,
                        'output'                    => array('.entry-meta', '.entry-meta span', '.entry-meta span a'),
                        'default'                   => array(
                                                        'font-family' => 'Lato',
                                                        'font-size'   => '11px',
                                                        'font-weight' => '400',
                                                        'color'       => '#a9a9a9',
                                                    ),
                    ),

                    array(
                        'id'                        => 'recent_post_slider_title_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Recent Post Slider Category Name Typography', 'newmagz'),
                        'desc'                      => esc_html__('Recent post category name in archive page', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => true,
                        'text-transform'            => true,
                        'output'                    => array('#archive-page .section-title h4'),
                        'default'                   => array(
                                                        'font-family'    => 'Merriweather',
                                                        'font-size'      => '35px',
                                                        'font-weight'    => '700',
                                                        'color'          => '#000000',
                                                        'text-transform' => 'none',
                                                        'letter-spacing' => '0px'
                                                    ),
                    ),

                    array(
                        'id'                        => 'recent_post_slider_sub_title_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Recent Post Slider Category Description Typography', 'newmagz'),
                        'desc'                      => esc_html__('Recent post category description in archive page', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => true,
                        'text-transform'            => false,
                        'output'                    => array('#archive-page .section-title small.section-subtitle'),
                        'default'                   => array(
                                                        'font-family'   => 'Lato',
                                                        'font-size'     => '14px',
                                                        'font-weight'   => '400',
                                                        'color'         => '#bbb',
                                                        'letter-spacing'=> '1px'
                                                    ),
                    ),

                    array(
                        'id'                        => 'recent_post_slider_post_title_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Recent Post Slider Title Typography', 'newmagz'),
                        'desc'                      => esc_html__('Recent post title in archive page', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => false,
                        'text-transform'            => false,
                        'output'                    => array('#archive-page .slider-with-thumbnail article.post-overlay .entry-content h3.post-title', '#archive-page .slider-with-thumbnail article.post-overlay .entry-content h3.post-title a'),
                        'default'                   => array(
                                                        'font-family' => 'Merriweather',
                                                        'font-size'   => '30px',
                                                        'font-weight' => '400',
                                                        'color'       => '#ffffff',
                                                    ),
                    ),

                    array(
                        'id'                        => 'recent_post_category_thumbnail_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Recent Post Slider Thumbnail Category Name Typography', 'newmagz'),
                        'desc'                      => esc_html__('Recent Post category name in archive page', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => false,
                        'text-transform'            => true,
                        'output'                    => array('#archive-page .slider-with-thumbnail .post-category', '#archive-page .slider-with-thumbnail .post-category a'),
                        'default'                   => array(
                                                        'font-family'    => 'Lato',
                                                        'font-size'      => '10px',
                                                        'font-weight'    => '700',
                                                        'color'          => '#c51818',
                                                        'text-transform' => 'uppercase',
                                                    ),
                    ),

                    array(
                        'id'                        => 'recent_post_meta_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Recent Post Slider Meta Typography', 'newmagz'),
                        'desc'                      => esc_html__('Recent post meta in archive pages', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-align'                => false,
                        'letter-spacing'            => false,
                        'text-transform'            => false,
                        'output'                    => array('#archive-page .slider-with-thumbnail .entry-meta span', '#archive-page .slider-with-thumbnail .entry-meta span a'),
                        'default'                   => array(
                                                        'font-family' => 'Lato',
                                                        'font-size'   => '11px',
                                                        'font-weight' => '400',
                                                        'color'       => '#ffffff',
                                                    ),
                    ),

                    array(
                        'id'                        => 'heading_h1',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Heading H1', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'all_styles'				=> true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'letter-spacing'            => true,
                        'output'                    => array('body.single article.hentry h1', 'h1.page-title'),
                        'default'                   => array(
                                                        'font-family' => 'Merriweather',
                                                        'font-size'   => '35px',
                                                        'font-weight' => '700',
                                                        'color'       => '#000000',
                                                    ),
                    ),

                    array(
                        'id'                        => 'heading_h2',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Heading H2', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'output'                    => array('body.single article.hentry .entry-content h2'),
                        'default'                   => array(
                                                        'font-family' => 'Merriweather',
                                                        'font-size'   => '28px',
                                                        'font-weight' => '600',
                                                        'color'       => '#000000'
                                                    ),
                    ),

                    array(
                        'id'                        => 'heading_h3',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Heading H3', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'output'                    => array('.body.single article.hentry .entry-content h3'),
                        'default'                   => array(
                                                        'font-family' => 'Merriweather',
                                                        'font-size'   => '22px',
                                                        'font-weight' => '700',
                                                        'color'       => '#000000'
                                                    ),
                    ),

                    array(
                        'id'                        => 'heading_h4',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Heading H4', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'output'                    => array('.body.single article.hentry .entry-content h4'),
                        'default'                   => array(
                                                        'font-family' => 'Merriweather',
                                                        'font-size'   => '16px',
                                                        'font-weight' => '700',
                                                        'color'       => '#000000'
                                                    ),
                    ),

                    array(
                        'id'                        => 'heading_h5',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Heading H5', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'output'                    => array('body.single article.hentry .entry-content h5'),
                        'default'                   => array(
                                                        'font-family' => 'Merriweather',
                                                        'font-size'   => '12px',
                                                        'font-weight' => '400',
                                                        'color'       => '#000000'
                                                    ),
                    ),

                    array(
                        'id'                        => 'heading_h6',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Heading H6', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'output'                    => array('body.single article.hentry .entry-content h6'),
                        'default'                   => array(
                                                        'font-family' => 'Merriweather',
                                                        'font-size'   => '10px',
                                                        'font-weight' => '400',
                                                        'color'       => '#000000'
                                                    ),
                    ),

                    array(
                        'id'                        => 'info-typography-header',
                        'type'                      => 'info',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => esc_html__('Header Typography', 'newmagz'),
                        'desc'                      => esc_html__('Header typography settings section.', 'newmagz')
                    ),

                    array(
                        'id'                        => 'top_menu_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Top Menu Typography', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-transform'            => true,
                        'text-align'                => false,
                        'output'                    => array('nav#top-navigation.site-navigation ul li a', '#top-navigation'),
                        'default'                   => array(
                                                        'font-family'    => 'Lato',
                                                        'color'          => '#969696',
                                                        'font-size'      => '11px',
                                                        'font-weight'    => '700',
                                                        'text-transform' => 'uppercase',
                                                    ),
                    ),

                    array(
                        'id'                        => 'main_menu_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Main Menu Typography', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-transform'            => true,
                        'text-align'                => false,
                        'output'                    => array('.main-menu .site-navigation ul li a', '.main-menu .site-navigation ul li.menu-item-has-children ul.sub-menu li a'),
                        'default'                   => array(
                                                        'font-family'    => 'Roboto',
                                                        'color'          => '#ffffff',
                                                        'font-size'      => '13px',
                                                        'font-weight'    => '700',
                                                        'text-transform' => 'uppercase',
                                                    ),
                    ),

                    array(
                        'id'                        => 'info-typography-footer',
                        'type'                      => 'info',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => esc_html__('Footer Typography', 'newmagz'),
                        'desc'                      => esc_html__('Footer typography settings section.', 'newmagz')
                    ),

                    array(
                        'id'                        => 'footer_menu_typography',
                        'type'                      => 'typography',
                        'title'                     => esc_html__('Footer Menu Typography', 'newmagz'),
                        'google'                    => true,
                        'subsets'                   => true,
                        'preview'                   => true,
                        'color'                     => true,
                        'line-height'               => false,
                        'text-transform'            => true,
                        'text-align'                => false,
                        'letter-spacing'			=> true,
                        'output'                    => array('#footer-navigation ul li a'),
                        'default'                   => array(
                                                        'font-family'    => 'Lato',
                                                        'color'          => '#969696',
                                                        'font-size'      => '12px',
                                                        'font-weight'    => '400',
                                                        'text-transform' => 'uppercase',
                                                        'letter-spacing'    => '1px'
                                                    ),
                    ),

                    array(
                        'id'                        => 'info-typography-form',
                        'type'                      => 'info',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => esc_html__('Form Typography', 'newmagz'),
                        'desc'                      => esc_html__('Form typography settings section.', 'newmagz')
                    ),

                    array(
                            'id'                    => 'form_field_font',
                            'type'                  => 'typography',
                            'title'                 => esc_html__('Form Field Text', 'newmagz'),
                            'google'                => true,
                            'subsets'               => true,
                            'preview'               => true,
                            'line-height'           => false,
                            'text-transform'        => true,
                            'output'                => array('form input[type="text"]', 'form input[type="password"]', 'form input[type="email"]', 'select', 'form textarea', '.input textarea', 'form input[type="url"]', 'form input[type="search"]'),
                            'default'               => array(
                                                        'font-family' => 'Lato',
                                                        'font-size'   => '15px',
                                                        'font-weight' => '400',
                                                        'color'       => '#808080',
                                                    )
                        ),

                        array(
                            'id'                    => 'form_button_font',
                            'type'                  => 'typography',
                            'title'                 => esc_html__('Form Button Text', 'newmagz'),
                            'google'                => true,
                            'subsets'               => true,
                            'preview'               => true,
                            'line-height'           => false,
                            'text-transform'        => true,
                            'letter-spacing'		=> true,
                            'output'                => array('form .button.submit-button', 'form button[type="submit"]', 'form input[type="submit"]', '.search-widget .button.searchbutton', 'form .button.large'),
                            'default'               => array(
                                                        'font-family'    => 'Lato',
                                                        'font-size'      => '14px',
                                                        'font-weight'    => '400',
                                                        'color'          => '#ffffff',
                                                        'text-transform' => 'uppercase',
                                                        'letter-spacing' => '1px'
                                                    )
                        ),

                 )
            );
        
            $this->sections[] = array(
                'icon' => 'el-icon-tint',
                'title' => esc_html__('Colors', 'newmagz'),
                'fields' => array(
                    array(
                        'id'                        => 'info-color-common',
                        'type'                      => 'info',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => esc_html__('Common Colors', 'newmagz'),
                        'desc'                      => esc_html__('Common color settings section.', 'newmagz')
                    ),

                    array(
                        'id'                        => 'main_link_color',
                        'type'                      => 'link_color',
                        'title'                     => esc_html__('Main Link Color', 'newmagz'),
                        'output'                    => array('#maincontent a'),
                        'active'                    => false,
                        'default'                   => array(
                                                        'regular' => '#000000',
                                                        'hover'   => '#c51818',
                                                    )
                    ),

                    array(
                        'id'                        => 'main_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Main Background', 'newmagz'),
                        'output'                    => array('body'),
                        'preview'                   => false,
                        'preview_media'             => false,
                        'background-repeat'         => false,
                        'background-attachment'     => false,
                        'background-position'       => false,
                        'background-image'          => false,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => false,
                        'default'                   => array(
                                                        'background-color' => '#ffffff',
                                                    )
                    ),

                    array(
                        'id'                        => 'category_link_color',
                        'type'                      => 'link_color',
                        'title'                     => esc_html__('Category Link Color', 'newmagz'),
                        'output'                    => array('#maincontent .post-category a', '#footer-widgets .post-category a'),
                        'active'                    => false,
                        'default'                   => array(
                                                        'regular' => '#e65100',
                                                        'hover'   => '#e65100',
                                                    )
                    ),

                    array(
                        'id'                        => 'breadcrumb_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Breadcrumb Background', 'newmagz'),
                        'output'                    => array('.breadcrumbs'),
                        'preview'                   => false,
                        'preview_media'             => false,
                        'background-repeat'         => false,
                        'background-attachment'     => false,
                        'background-position'       => false,
                        'background-image'          => false,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => false,
                        'default'                   => array(
                                                        'background-color' => '#cbcbcb',
                                                    )
                    ),

                    array(
                        'id'                        => 'breadcrumb_link_color',
                        'type'                      => 'link_color',
                        'title'                     => esc_html__('Breadcrumb Link Color', 'newmagz'),
                        'output'                    => array('.breadcrumbs ul li a', '.breadcrumbs a'),
                        'active'                    => false,
                        'default'                   => array(
                                                        'regular' => '#4b4b4b',
                                                        'hover'   => '#000000',
                                                    )
                    ),

                    array(
                        'id'                        => 'pagination_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Pagination Background', 'newmagz'),
                        'output'                    => array('.wp-pagenavi a', '.wp-pagenavi span'),
                        'preview'                   => false,
                        'preview_media'             => false,
                        'background-repeat'         => false,
                        'background-attachment'     => false,
                        'background-position'       => false,
                        'background-image'          => false,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => false,
                        'default'                   => array(
                                                        'background-color' => '#ffffff',
                                                    )
                    ),

                    array(
                        'id'                        => 'paginatio_current_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Pagination Current Background', 'newmagz'),
                        'output'                    => array('.wp-pagenavi span.current'),
                        'preview'                   => false,
                        'preview_media'             => false,
                        'background-repeat'         => false,
                        'background-attachment'     => false,
                        'background-position'       => false,
                        'background-image'          => false,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => false,
                        'default'                   => array(
                                                        'background-color' => '#c51818',
                                                    )
                    ),

                    array(
                        'id'                        => 'pagination_border',
                        'type'                      => 'border',
                        'title'                     => esc_html__('Pagination Border Color', 'newmagz'),
                        'output'                    => array('.wp-pagenavi a', '.wp-pagenavi span.current', '.wp-pagenavi span'),
                        'all'                       => true,
                        'default'                   => array(
                                                        'border-color' => '#dddddd',
                                                        'border-style' => 'solid',
                                                        'border-width' => '1px', 
                                                    )
                    ),

                    array(
                        'id'                        => 'pagination_hover_border',
                        'type'                      => 'border',
                        'title'                     => esc_html__('Pagination Hover Border Color', 'newmagz'),
                        'output'                    => array('.wp-pagenavi a:hover', '.wp-pagenavi span.current', '.wp-pagenavi span:hover'),
                        'all'                       => true,
                        'default'                   => array(
                                                        'border-color' => '#c51818',
                                                        'border-style' => 'solid',
                                                        'border-width' => '1px', 
                                                    )
                    ),

                    array(
                        'id'                        => 'info-color-header',
                        'type'                      => 'info',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => esc_html__('Header Colors', 'newmagz'),
                        'desc'                      => esc_html__('Header color settings section.', 'newmagz')
                    ),

                    array(
                        'id'                        => 'top_menu_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Top Menu Background', 'newmagz'),
                        'output'                    => array('#top-header'),
                        'preview'                   => false,
                        'preview_media'             => false,
                        'background-repeat'         => false,
                        'background-attachment'     => false,
                        'background-position'       => false,
                        'background-image'          => false,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => false,
                        'default'                   => array(
                                                        'background-color' => '#212121',
                                                    )
                    ),

                    array(
                        'id'                        => 'top_header_text_color',
                        'type'                      => 'color',
                        'output'                    => array('#top-header'),
                        'title'                     => esc_html__('Top Header Text Color', 'newmagz'),
                        'default'                   => '#9e9e9e',
                        'validate'                  => 'color',
                    ),

                    array(
                        'id'                        => 'top_header_link_color',
                        'type'                      => 'link_color',
                        'output'                    => array('nav#top-navigation.site-navigation ul li a', '#top-header a', 'nav#top-navigation.site-navigation ul li a', 'nav#top-navigation.site-navigation ul li.current-menu-item > a', 'nav#top-navigation.site-navigation ul li.current_page_item > a', 'nav#top-navigation.site-navigation ul li.current-post-ancestor > a', 'nav#top-navigation.site-navigation ul li.current-menu-parent > a', 'nav#top-navigation.site-navigation ul li.current-post-parent > a', 'nav#top-navigation.site-navigation ul > li.menu-item-has-children a'),
                        'title'                     => esc_html__('Top Menu Link Color', 'newmagz'),
                        'default'                   => array(
                                                        'regular' => '#9e9e9e',
                                                        'active'  => '#ffffff',
                                                        'hover'   => '#ffffff',
                                                    ),
                        'validate'                  => 'color',
                    ),

                    array(
                        'id'                        => 'top_menu_border_top',
                        'type'                      => 'border',
                        'title'                     => esc_html__('Top Menu Border Color', 'newmagz'),
                        'output'                    => array('#top-header'),
                        'all'                       => false,
                        'left'                      => false,
                        'right'                     => false,
                        'top'                       => false,
                        'default'                   => array(
                                                        'border-width' => '1px',
                                                        'border-color'  => '#eeeeee',
                                                        'border-style'  => 'solid',
                                                    )
                    ),

                    array(
                        'id'                        => 'main_header_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Main Header Background', 'newmagz'),
                        'output'                    => array('#main-header'),
                        'preview'                   => false,
                        'preview_media'             => false,
                        'background-repeat'         => false,
                        'background-attachment'     => false,
                        'background-position'       => false,
                        'background-image'          => false,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => false,
                        'default'                   => array(
                                                        'background-color' => '#ffffff',
                                                    )
                    ),

                    array(
                        'id'                        => 'main_menu_link_color',
                        'type'                      => 'link_color',
                        'output'                    => array('ul.main-menu > li > a', 'ul.main-menu > li.current-menu-item > a', 'ul.main-menu > li.current_page_item > a', 'ul.main-menu > li.current-post-ancestor > a', 'ul.main-menu > li.current-menu-parent > a', 'ul.main-menu > li.current-post-parent > a', 'ul.main-menu > li.menu-item-has-children a'),
                        'title'                     => esc_html__('Main Menu Link Color', 'newmagz'),
                        'default'                   => array(
                                                        'regular' => '#333333',
                                                        'hover'   => '#d50000',
                                                    )
                    ),

                    // array(
                    //     'id'                        => 'main_menu_hover_border',
                    //     'type'                      => 'border',
                    //     'title'                     => esc_html__('Main Menu Hover & Active State Background', 'newmagz'),
                    //     'output'                    => array('ul.main-menu > li.current-menu-item > a', 'ul.main-menu > li.current_page_item > a', 'ul.main-menu > li.current-post-ancestor > a', 'ul.main-menu > li.current-menu-parent > a'),
                    //     'all'                       => true,
                    //     'default'                   => array(
                    //         'border-width'          => '2px',
                    //         'border-color'          => '#ffffff',
                    //         'border-style'          => 'solid',
                    //     )
                    // ),

                    array(
                        'id'                        => 'sub_menu_link_color',
                        'type'                      => 'link_color',
                        'output'                    => array('nav#main-menu.site-navigation ul li.menu-item-has-children ul.sub-menu li a'),
                        'title'                     => esc_html__('Sub Menu Link Color', 'newmagz'),
                        'default'                   => array(
                                                        'regular' => '#ffffff',
                                                        'active'  => '#ffffff',
                                                        'hover'   => '#ffffff',
                                                    )
                    ),

                    array(
                        'id'                        => 'sub_menu_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Sub Menu Background', 'newmagz'),
                        'output'                    => array('.site-navigation ul li.menu-item-has-children ul.sub-menu'),
                        'preview'                   => false,
                        'preview_media'             => false,
                        'background-repeat'         => false,
                        'background-attachment'     => false,
                        'background-position'       => false,
                        'background-image'          => false,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => false,
                        'default'                   => array(
                                                        'background-color' => '#313131',
                                                    )
                    ),

                    array(
                        'id'                        => 'sub_menu_hover_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Sub Menu Hover & Active State Background', 'newmagz'),
                        'output'                    => array('nav#main-menu.site-navigation ul li.menu-item-has-children ul.sub-menu li:hover a'),
                        'preview'                   => false,
                        'preview_media'             => false,
                        'background-repeat'         => false,
                        'background-attachment'     => false,
                        'background-position'       => false,
                        'background-image'          => false,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => false,
                        'default'                   => array(
                                                        'background-color' => '#c51818', 
                                                    )
                    ),

                    array(
                        'id'                        => 'header_search_button_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Search Button Background', 'newmagz'),
                        'output'                    => array('a.search-trigger'),
                        'preview'                   => false,
                        'preview_media'             => false,
                        'background-repeat'         => false,
                        'background-attachment'     => false,
                        'background-position'       => false,
                        'background-image'          => false,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => false,
                        'default'                   => array(
                                                        'background-color' => '#c51818',
                                                    )
                    ),

                    array(
                        'id'                        => 'header_search_icon_color',
                        'type'                      => 'color',
                        'title'                     => esc_html__('Search Icon Color', 'newmagz'),
                        'output'                    => array('a.search-trigger'),
                        'default'                   => '#ffffff',
                        'validate'                  => 'color',
                    ),

                    array(
                        'id'                        => 'info-color-footer',
                        'type'                      => 'info',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => esc_html__('Footer Colors', 'newmagz'),
                        'desc'                      => esc_html__('Footer color settings section.', 'newmagz')
                    ),

                    array(
                        'id'                        => 'footer_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Footer Background', 'newmagz'),
                        'output'                    => array('.footer'),
                        'preview'                   => false,
                        'preview_media'             => false,
                        'background-repeat'         => false,
                        'background-attachment'     => false,
                        'background-position'       => false,
                        'background-image'          => false,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => false,
                        'default'                   => array(
                                                        'background-color' => '#ffffff',
                                                    )
                    ),

                    array(
                        'id'                        => 'footer_link_color',
                        'type'                      => 'link_color',
                        'output'                    => array('#site-info a', '#site-info ul li a'),
                        'title'                     => esc_html__('Footer Link Color', 'newmagz'),
                        'active'                    => false,
                        'default'                   => array(
                                                        'regular' => '#343434',
                                                        'hover'   => '#c51818',
                                                    )
                    ),

                    array(
                        'id'                        => 'footer_menu_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Footer Menu Background', 'newmagz'),
                        'output'                    => array('#footer-menu-section'),
                        'preview'                   => false,
                        'preview_media'             => false,
                        'background-repeat'         => false,
                        'background-attachment'     => false,
                        'background-position'       => false,
                        'background-image'          => false,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => false,
                        'default'                   => array(
                                                        'background-color' => '#212121',
                                                    )
                    ),

                    array(
                        'id'                        => 'footer_menu_link_color',
                        'type'                      => 'link_color',
                        'output'                    => array('#footer-navigation ul li a', '#footer-menu-section a', '#footer-menu-section ul li a', '#footer-navigation ul li a', '#footer-navigation ul li.current-menu-item > a', '#footer-navigation ul li.current_page_item > a', '#footer-navigation ul li.current-post-ancestor > a', '#footer-navigation ul li.current-menu-parent > a', '#footer-navigation ul li.current-post-parent > a', '#footer-navigation ul > li.menu-item-has-children a'),
                        'title'                     => esc_html__('Footer Menu Link Color', 'newmagz'),
                        'default'                   => array(
                                                        'regular' => '#969696',
                                                        'active'  => '#ffffff',
                                                        'hover'   => '#ffffff',
                                                    )
                    ),

                    array(
                        'id'                        => 'footer_top_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Footer Top Widget Backround', 'newmagz'),
                        'output'                    => array('#footer-widgets'),
                        'preview'                   => true,
                        'preview_media'             => true,
                        'background-repeat'         => true,
                        'background-attachment'     => true,
                        'background-position'       => true,
                        'background-image'          => true,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => true,
                        'default'                   => array(
                                                        'background-color' => '#f9f9f9',
                                                    )
                    ),

                    array(
                        'id'                    => 'footer_top_text_color',
                        'type'                  => 'color',
                        'output'                => array('#footer-widgets'),
                        'title'                 => esc_html__('Footer Top Text Color', 'newmagz'),
                        'default'               => '#000000',
                        'validate'              => 'color',
                    ),

                    array(
                        'id'                    => 'footer_top_link_color',
                        'type'                  => 'link_color',
                        'output'                => array('#footer-widgets a', '#footer-widgets ul li a'),
                        'title'                 => esc_html__('Footer Top Widget Link Color', 'newmagz'),
                        'active'                => false,
                        'default'               => array(
                                                    'regular' => '#000000',
                                                    'hover'   => '#c51818',
                                                )
                    ),

                    array(
                        'id'                    => 'footer_bottom_bg',
                        'type'                  => 'background',
                        'title'                 => esc_html__('Footer Bottom Widget Background', 'newmagz'),
                        'output'                => array('#footer-bottom'),
                        'preview'               => true,
                        'preview_media'         => true,
                        'background-repeat'     => true,
                        'background-attachment' => true,
                        'background-position'   => true,
                        'background-image'      => true,
                        'background-gradient'   => true,
                        'background-clip'       => true,
                        'background-origin'     => true,
                        'background-size'       => true,
                        'default'               => array(
                                                    'background-image' => get_template_directory_uri() .'/images/bg-footer.jpg',
                                                    'background-size' => 'cover',
                                                )
                    ),

                    array(
                        'id'                    => 'footer_bottom_text_color',
                        'type'                  => 'color',
                        'output'                => array('#footer-bottom'),
                        'title'                 => esc_html__('Footer Bottom Text Color', 'newmagz'),
                        'default'               => '#eeeeee',
                        'validate'              => 'color',
                    ),

                    array(
                        'id'                    => 'footer_bottom_link_color',
                        'type'                  => 'link_color',
                        'output'                => array('#footer-bottom a', '#footer-bottom ul li a'),
                        'title'                 => esc_html__('Footer Bottom Widget Link Color', 'newmagz'),
                        'default'               => array(
                                                    'regular' => '#ffffff',
                                                    'active'  => '#eeeeee',
                                                    'hover'   => '#eeeeee',
                                                )
                    ),

                    array(
                        'id'                    => 'back_to_top_bg',
                        'type'                  => 'background',
                        'title'                 => esc_html__('Back to Top Button Background', 'newmagz'),
                        'output'                => array('#scroll-top'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                    'background-color' => '#434343',
                                                )
                    ),

                    array(
                        'id'                    => 'back_to_top_icon_color',
                        'type'                  => 'color',
                        'title'                 => esc_html__('Back to Top Button Icon Color', 'newmagz'),
                        'active'                => false,
                        'output'                => array('#scroll-top'),
                        'default'               => '#ffffff',
                        'validate'              => 'color'
                    ),

                    array(
                        'id'                    => 'info-color-post',
                        'type'                  => 'info',
                        'icon'                  => 'el-icon-info-sign',
                        'title'                 => esc_html__('Post Colors', 'newmagz'),
                        'desc'                  => esc_html__('Post color settings section.', 'newmagz')
                    ),

                    array(
                        'id'                    => 'tags_button_bg',
                        'type'                  => 'background',
                        'title'                 => esc_html__('Tags Button Background', 'newmagz'),
                        'output'                => array('.tags span a'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                    'background-color' => '#dcdcdc',
                                                )
                    ),

                    array(
                        'id'                    => 'tags_button_hover_bg',
                        'type'                  => 'background',
                        'title'                 => esc_html__('Tags Button Hover Background', 'newmagz'),
                        'output'                => array('.tags span:hover a'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                    'background-color' => '#363636',
                                                )
                    ),

                    array(
                        'id'                    => 'tags_button_color',
                        'type'                  => 'link_color',
                        'title'                 => esc_html__('Tags Link Color', 'newmagz'),
                        'output'                => array('.tags span a'),
                        'active'                => false,
                        'default'               => array(
                                                    'regular' => '#343434',
                                                    'hover'   => '#ffffff',
                                                )
                    ),

                    array(
                        'id'                    => 'info-color-widget',
                        'type'                  => 'info',
                        'icon'                  => 'el-icon-info-sign',
                        'title'                 => esc_html__('Widget Colors', 'newmagz'),
                        'desc'                  => esc_html__('Widget color settings section.', 'newmagz')
                    ),

                    array(
                        'id'                    => 'widget_search_button_bg',
                        'type'                  => 'background',
                        'title'                 => esc_html__('Search Button Background', 'newmagz'),
                        'output'                => array('.sidebar-widget.search-widget .search-button'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                    'background-color' => '#c51818',
                                                )
                    ),

                    array(
                        'id'                        => 'widget_search_icon_color',
                        'type'                      => 'color',
                        'title'                     => esc_html__('Search Icon Color', 'newmagz'),
                        'output'                    => array('.sidebar-widget.search-widget .search-button'),
                        'default'                   => '#ffffff',
                        'validate'                  => 'color',
                    ),

                    array(
                        'id'                        => 'info-color-form',
                        'type'                      => 'info',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => esc_html__('Form Colors', 'newmagz'),
                        'desc'                      => esc_html__('Form color settings section.', 'newmagz')
                    ),

                    array(
                        'id'                        => 'input_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Text Field Background', 'newmagz'),
                        'output'                    => array('form select', 'form input[type="url"]' , 'form textarea', 'form input[type="text"]', 'form input[type="email"]', 'form input[type="password"]', 'form input[type="search"]'),
                        'preview'                   => false,
                        'preview_media'             => false,
                        'background-repeat'         => false,
                        'background-attachment'     => false,
                        'background-position'       => false,
                        'background-image'          => false,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => false,
                        'default'                   => array(
                                                        'background-color' => '#ffffff',
                                                    )
                    ),

                    array(
                        'id'                        => 'input_border',
                        'type'                      => 'border',
                        'title'                     => esc_html__('Input Border Color', 'newmagz'),
                        'output'                    => array('form select', 'form input[type="url"]', 'form textarea', 'form input[type="text"]', 'form input[type="email"]', 'form input[type="password"]', 'form input[type="search"]'),
                        'all'                       => true,
                        'default'                   => array(
                            'border-top'            => '1px',
                            'border-bottom'         => '1px',
                            'border-left'           => '1px',
                            'border-right'          => '1px',
                            'border-color'          => '#c6c6c6',
                            'border-style'          => 'solid',
                        )
                    ),

                    array(
                        'id'                        => 'submit_button_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Submit Button Background', 'newmagz'),
                        'output'                    => array('form input[type="submit"]', 'form button[type="submit"]', '#bbpress-forums #bbp-search-form input[type="submit"]', '.button.submit-button'),
                        'preview'                   => false,
                        'preview_media'             => false,
                        'background-repeat'         => false,
                        'background-attachment'     => false,
                        'background-position'       => false,
                        'background-image'          => false,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => false,
                        'default'                   => array(
                                                        'background-color' => '#c51818',
                                                    )
                    ),

                    array(
                        'id'                        => 'info-color-author',
                        'type'                      => 'info',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => esc_html__('Author Colors', 'newmagz'),
                        'desc'                      => esc_html__('Author color settings section.', 'newmagz')
                    ),

                    array(
                        'id'                        => 'author_tab_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Author Tab Background', 'newmagz'),
                        'output'                    => array('.article-tabs ul.tab-nav li a'),
                        'preview'                   => false,
                        'preview_media'             => false,
                        'background-repeat'         => false,
                        'background-attachment'     => false,
                        'background-position'       => false,
                        'background-image'          => false,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => false,
                        'default'                   => array(
                                                        'background-color' => '#ffffff',
                                                    )
                    ),

                    array(
                        'id'                        => 'author_tab_color',
                        'type'                      => 'color',
                        'title'                     => esc_html__('Author Tab Text Color', 'newmagz'),
                        'output'                    => array('.article-tabs ul.tab-nav li a'),
                        'default'                   => '#999999',
                        'validate'                  => 'color',
                    ),

                    array(
                        'id'                        => 'author_tab_hover_bg',
                        'type'                      => 'background',
                        'title'                     => esc_html__('Author Tab Active Background', 'newmagz'),
                        'output'                    => array('.article-tabs ul.tab-nav li a.active'),
                        'preview'                   => false,
                        'preview_media'             => false,
                        'background-repeat'         => false,
                        'background-attachment'     => false,
                        'background-position'       => false,
                        'background-image'          => false,
                        'background-gradient'       => false,
                        'background-clip'           => false,
                        'background-origin'         => false,
                        'background-size'           => false,
                        'default'                   => array(
                                                        'background-color' => '#000',
                                                    )
                    ),

                    array(
                        'id'                        => 'author_tab_hover_color',
                        'type'                      => 'color',
                        'title'                     => esc_html__('Author Tab Text Active Color', 'newmagz'),
                        'output'                    => array('.article-tabs ul.tab-nav li a.active'),
                        'default'                   => '#ffffff',
                        'validate'                  => 'color',
                    ),

                    array(
                        'id'                        => 'author_tab_border',
                        'type'                      => 'border',
                        'title'                     => esc_html__('Author Tab Border Color', 'newmagz'),
                        'output'                    => array('ul.tab-nav'),
                        'all'                       => false,
                        'top'                       => false,
                        'left'                      => false,
                        'bottom'                    => true,
                        'right'                     => false,
                        'default'                   => array(
                                                        'border-color' => '#000000',
                                                        'border-style' => 'solid',
                                                        'border-width' => '3px',
                                                    )
                    ),

                    array(
                        'id'                        => 'author_socmed_color',
                        'type'                      => 'link_color',
                        'title'                     => esc_html__('Author Socmed Color', 'newmagz'),
                        'output'                    => array('.social ul li a'),
                        'active'                    => false,
                        'default'                   => array(
                                                        'regular' => '#000000',
                                                        'hover'   => '#c51818',
                                                    )
                    ),

                    array(
                        'id'                        => 'info-color-share-button',
                        'type'                      => 'info',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => esc_html__('Share Button Colors', 'newmagz'),
                        'desc'                      => esc_html__('Share button color settings section.', 'newmagz')
                    ),

                    array(
                        'id'                        => 'fb_share_button_color',
                        'type'                      => 'color',
                        'title'                     => esc_html__('Facebook Share Button Color', 'newmagz'),
                        'output'                    => array('.social-share-widget ul li.facebook a'),
                        'default'                   => '#20579b',
                        'validate'                  => 'color',
                    ),

                    array(
                        'id'                        => 'tw_share_button_color',
                        'type'                      => 'color',
                        'title'                     => esc_html__('Twitter Share Button Color', 'newmagz'),
                        'output'                    => array('.social-share-widget ul li.twitter a'),
                        'default'                   => '#5fb9f1',
                        'validate'                  => 'color',
                    ),

                    array(
                        'id'                        => 'gp_share_button_color',
                        'type'                      => 'color',
                        'title'                     => esc_html__('Google Plus Share Button Color', 'newmagz'),
                        'output'                    => array('.social-share-widget ul li.google a'),
                        'default'                   => '#9e1d1d',
                        'validate'                  => 'color',
                    ),

                    array(
                        'id'                        => 'pin_share_button_color',
                        'type'                      => 'color',
                        'title'                     => esc_html__('Pinterest Share Button Color', 'newmagz'),
                        'output'                    => array('.social-share-widget ul li.pinterest a'),
                        'default'                   => '#c92727',
                        'validate'                  => 'color',
                    ),

                )
            );
            
            // Advertisment
            $this->sections[] = array(
                'icon' => 'el-icon-bullhorn',
                'title' => esc_html__('Advertisement', 'newmagz'),
                'fields' => array(

                    array(
                        'id'                        => 'info-ad-300x250',
                        'type'                      => 'info',
                        'style'                     => 'warning',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => esc_html__('300x250 Advertisement Banner', 'newmagz'),
                        'desc'                      => esc_html__('You will need to assign "Warrior Sidebar 300x250 Ad Widget" to the Sidebar - Right widget area from the <a href="widgets.php">Widgets settings</a>.', 'newmagz')
                    ),

                    array(
                        'id'                        => 'ad_300x250_mode',
                        'type'                      => 'button_set',
                        'title'                     => esc_html__('Ad Mode', 'newmagz'),
                        'desc'                      => esc_html__('Choose the ad mode', 'newmagz'),
                        'options'                   => array('1' => 'Local Banner', '2' => 'Ad Code'),
                        'default'                   => '1'
                    ),

                    array(
                        'id'                        => 'ad_300x250_img',
                        'type'                      => 'media',
                        'required'                  => array('ad_300x250_mode', 'equals', '1'),
                        'title'                     => esc_html__('Banner Image', 'newmagz'),
                        'compiler'                  => 'true',
                        'desc'                      => esc_html__('Upload your own banner image.', 'newmagz'),
                        'default'                   => array('url' => get_template_directory_uri() .'/images/ad-336x280.jpg'),
                    ),

                    array(
                        'id'                        => 'ad_300x250_url',
                        'type'                      => 'text', 
                        'required'                  => array('ad_300x250_mode', 'equals', '1'),
                        'title'                     => esc_html__('Banner URL', 'newmagz'),
                        'desc'                      => esc_html__('Where should this banner linked to?', 'newmagz'),
                        'placeholder'               => 'http://',
                        'default'                   => '#'
                    ),

                    array(
                        'id'                        => 'ad_300x250_code',
                        'type'                      => 'textarea',
                        'required'                  => array('ad_300x250_mode', 'equals', '2'),
                        'title'                     => esc_html__('Ad Code', 'newmagz'),
                        'desc'                      => esc_html__('Paste your ad code.', 'newmagz'),
                        'default'                   => ''
                    ),
                 )
            );
        
            $this->sections[] = array(
                'icon' => 'el-icon-user',
                'title' => esc_html__('Social Profiles', 'newmagz'),
                'fields' => array(
                    array(
                        'id'                          => 'facebook',
                        'type'                        => 'text', 
                        'title'                       => esc_html__('Facebook Profile/Page', 'newmagz'),
                        'desc'                        => esc_html__('Your Facebook profile page', 'newmagz'),
                        'placeholder'                 => 'http://',
                        'default'                     => '#'
                    ),

                    array(
                        'id'                          => 'twitter',
                        'type'                        => 'text', 
                        'title'                       => esc_html__('Twitter Profile', 'newmagz'),
                        'desc'                        => esc_html__('Your Twitter profile page.', 'newmagz'),
                        'placeholder'                 => 'http://',
                        'default'                     => '#'
                    ),

                    array(
                        'id'                          => 'gplus',
                        'type'                        => 'text', 
                        'title'                       => esc_html__('Google+ Profile', 'newmagz'),
                        'desc'                        => esc_html__('Your Google+ profile page.', 'newmagz'),
                        'placeholder'                 => 'http://',
                        'default'                     => '#'
                    ),

                    array(
                        'id'                          => 'pinterest',
                        'type'                        => 'text', 
                        'title'                       => esc_html__('Pinterest Profile Page', 'newmagz'),
                        'desc'                        => esc_html__('Your Pinterest profile page.', 'newmagz'),
                        'placeholder'                 => 'http://',
                        'default'                     => '#'
                    ),

                    array(
                        'id'                          => 'youtube',
                        'type'                        => 'text', 
                        'title'                       => esc_html__('Youtube Videos', 'newmagz'),
                        'desc'                        => esc_html__('Your YouTube video page.', 'newmagz'),
                        'placeholder'                 => 'http://',
                        'default'                     => '#'
                    ),

                    array(
                        'id'                          => 'vimeo',
                        'type'                        => 'text', 
                        'title'                       => esc_html__('Vimeo Videos', 'newmagz'),
                        'desc'                        => esc_html__('Your Vimeo video page.', 'newmagz'),
                        'placeholder'                 => 'http://',
                        'default'                     => '#'
                    ),

                    array(
                        'id'                          => 'instagram',
                        'type'                        => 'text', 
                        'title'                       => esc_html__('Instagram Photos', 'newmagz'),
                        'desc'                        => esc_html__('Your Instagram page.', 'newmagz'),
                        'placeholder'                 => 'http://',
                        'default'                     => '#'
                    ),

                    array(
                        'id'                          => 'linkedin',
                        'type'                        => 'text', 
                        'title'                       => esc_html__('Linkedin Profile', 'newmagz'),
                        'desc'                        => esc_html__('Your LinkedIn profile page.', 'newmagz'),
                        'placeholder'                 => 'http://',
                        'default'                     => '#'
                    ),
                 )
            );
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => esc_html__('Theme Information 1', 'redux-framework-demo'),
                'content'   => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => esc_html__('Theme Information 2', 'redux-framework-demo'),
                'content'   => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = esc_html__('<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'          => 'newmagz_option',            // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'      => $theme->get('Name'),     // Name that appears at the top of your panel
                'display_version'   => $theme->get('Version'),  // Version that appears at the top of your panel
                'menu_type'         => 'menu',                  //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'    => true,                    // Show the sections below the admin menu item or not
                'menu_title'        => esc_html__('Theme Options', 'redux-framework-demo'),
                'page_title'        => esc_html__('Theme Options', 'redux-framework-demo'),
                
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key'    => 'AIzaSyDM81TyGQY8jEQykIWxXp1EnuKHOGe3ULA', // Must be defined to add google fonts to the typography module
                
                'async_typography'  => false,                    // Use a asynchronous font on the front end or font string
                'admin_bar'         => true,                    // Show the panel pages on the admin bar
                'global_variable'   => '',                      // Set a different name for your global variable other than the opt_name
                'dev_mode'          => false,                    // Show the time the page took to load, etc
                'customizer'        => true,                    // Enable basic customizer support
                'ajax_save'         => true,                    // Enable AJAX save
                
                // OPTIONAL -> Give you extra features
                'page_priority'     => 61,                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'       => 'themes.php',            // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'  => 'manage_options',        // Permissions needed to access the options panel.
                'menu_icon'         => get_template_directory_uri() .'/images/warrior-icon.png', // Specify a custom URL to an icon
                'last_tab'          => '',                      // Force your panel to always open to a specific tab (by id)
                'page_icon'         => 'icon-themes',           // Icon displayed in the admin panel next to your menu_title
                'page_slug'         => 'warriorpanel',              // Page slug used to denote the panel
                'save_defaults'     => true,                    // On load save the defaults to DB before user clicks save or not
                'default_show'      => false,                   // If true, shows the default value next to each field that is not the default value.
                'default_mark'      => '',                      // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,                   // Shows the Import/Export panel when not used as a field.
                'google_update_weekly' => true,
                
                // CAREFUL -> These options are for advanced use only
                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'compiler'            => true,                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'        => true,                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
                
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'              => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'           => false, // REMOVE

                // HINTS
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );

            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url' => 'https://www.facebook.com/themewarrior',
                'title' => 'Like us on Facebook',
                'icon' => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://twitter.com/themewarrior',
                'title' => 'Follow us on Twitter',
                'icon' => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://themeforest.net/user/ThemeWarriors/portfolio',
                'title' => 'See our portfolio',
                'icon' => 'el-icon-check'
            );

            // Panel Intro text -> before the form
                $this->args['intro_text'] = esc_html__('<p>If you like this theme, please consider giving it a 5 star rating on ThemeForest. <a href="http://themeforest.net/downloads" target="_blank">Rate now</a>.</p>', 'redux-framework-demo');
        }

    }
    
    global $reduxConfig;
    $reduxConfig = new Redux_Framework_sample_config();
}