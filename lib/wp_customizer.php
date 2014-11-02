<?php
// WP customizer
add_action ('admin_menu', 'aude_admin');
function aude_admin() {
    // add the Customize link to the admin menu
    add_theme_page( 'Theme Customizer', 'Theme Customizer', 'edit_theme_options', 'customize.php' );
}

/**
 * Contains methods for customizing the theme customization screen.
 * 
 * @link http://codex.wordpress.org/Theme_Customization_API
 */

add_action( 'customize_register', 'aude_customize_register' );
function aude_customize_register($wp_customize) {  

$wp_customize->remove_section( 'nav');
$wp_customize->remove_section( 'static_front_page');    

class Aude_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
        <?php
    }
}
	
/* Favicon */	 
	 
    $wp_customize->add_section( 'aude_favicon', array(
        'title'          => 'Favicon',
        'priority'       => 26,
    ) );
	
    $wp_customize->add_setting( 'upload_favicon', array(
        'default'        => get_template_directory_uri() . '/images/icons/favicon.png',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'upload_favicon', array(
        'label'   => 'Upload Favicon',
        'section' => 'aude_favicon',
        'settings' => 'upload_favicon',
    ) ) );
    

/* Logo */	 
	 
    $wp_customize->add_section( 'aude_logo', array(
        'title'          => 'Logo',
        'priority'       => 27,
    ) );
	
    $wp_customize->add_setting( 'upload_logo', array(
        'default'        => '',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'upload_logo', array(
        'label'   => 'Upload Logo',
        'section' => 'aude_logo',
        'settings'    => 'upload_logo',
    ) ) );
 
    
/* Social Links */	

$wp_customize->add_section( 'aude_social_links', array(
        'title'          => 'Social Links',
        'priority'       => 28,
    ) ); 
	 
   $wp_customize->add_setting( 'facebook', array(
        'default'        => '',
    ) );
     
         
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook', array(
        'label'   => 'Facebook URL',
        'section' => 'aude_social_links',
        'settings' => 'facebook',
        'priority' => 1,  
    ) ) );

    $wp_customize->add_setting( 'behance', array(
        'default'        => '',
    ) );
     
         
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'behance', array(
        'label'   => 'Behance URL',
        'section' => 'aude_social_links',
        'settings' => 'behance',
        'priority' => 2,  
    ) ) ); 

    $wp_customize->add_setting( 'dribbble', array(
        'default'        => '',
    ) );
     
         
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dribbble', array(
        'label'   => 'Dribbble URL',
        'section' => 'aude_social_links',
        'settings' => 'dribbble',
        'priority' => 3,  
    ) ) );   

    $wp_customize->add_setting( 'flickr', array(
        'default'        => '',
    ) );
     
         
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'flickr', array(
        'label'   => 'Flickr URL',
        'section' => 'aude_social_links',
        'settings' => 'flickr',
        'priority' => 4,  
    ) ) );

    $wp_customize->add_setting( 'googleplus', array(
        'default'        => '',
    ) );
     
         
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'googleplus', array(
        'label'   => 'Google+ URL',
        'section' => 'aude_social_links',
        'settings' => 'googleplus',
        'priority' => 5,  
    ) ) ); 

     $wp_customize->add_setting( 'linkedin', array(
        'default'        => '',
    ) );
     
         
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin', array(
        'label'   => 'Linkedin URL',
        'section' => 'aude_social_links',
        'settings' => 'linkedin',
        'priority' => 6,  
    ) ) ); 

    $wp_customize->add_setting( 'rss', array(
        'default'        => '',
    ) );
     
         
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rss', array(
        'label'   => 'RSS URL',
        'section' => 'aude_social_links',
        'settings' => 'rss',
        'priority' => 7,  
    ) ) ); 

    $wp_customize->add_setting( 'soundcloud', array(
        'default'        => '',
    ) );
     
         
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'soundcloud', array(
        'label'   => 'Soundcloud URL',
        'section' => 'aude_social_links',
        'settings' => 'soundcloud',
        'priority' => 8,  
    ) ) );  

    $wp_customize->add_setting( 'twitter', array(
        'default'        => '',
    ) );
     
         
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter', array(
        'label'   => 'Twitter URL',
        'section' => 'aude_social_links',
        'settings' => 'twitter',
        'priority' => 9,  
    ) ) ); 

    $wp_customize->add_setting( 'vimeo', array(
        'default'        => '',
    ) );
     
         
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vimeo', array(
        'label'   => 'Vimeo URL',
        'section' => 'aude_social_links',
        'settings' => 'vimeo',
        'priority' => 10,  
    ) ) ); 

    $wp_customize->add_setting( 'youtube', array(
        'default'        => '',
    ) );
     
         
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youtube', array(
        'label'   => 'Youtube URL',
        'section' => 'aude_social_links',
        'settings' => 'youtube',
        'priority' => 11,  
    ) ) ); 

     $wp_customize->add_setting( 'pinterest', array(
        'default'        => '',
    ) );
     
         
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pinterest', array(
        'label'   => 'Pinterest URL',
        'section' => 'aude_social_links',
        'settings' => 'pinterest',
        'priority' => 12,  
    ) ) );


   $wp_customize->add_setting( 'instagram', array(
        'default'        => '',
    ) );
     
         
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram', array(
        'label'   => 'Instagram URL',
        'section' => 'aude_social_links',
        'settings' => 'instagram',
        'priority' => 13,  
    ) ) );
    
/* General Settings */
     
	$wp_customize->add_section( 'aude_general_settings', array(
        'title'          => 'General Settings',
        'priority'       => 29,
    ) );
         
               
    	$wp_customize->add_setting( 'content_or_excerpt', array(
        'default'        => 'content',
    ) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'content_or_excerpt', array(
        'label'   => 'Use the following on Listings',
        'section' => 'aude_general_settings',
        'settings' => 'content_or_excerpt', 
            
        'type'    => 'select',
        'choices'    => array(
        'content' => 'use the content',
        'excerpt' => 'use the excerpt',
        ),
        'priority' => 1,
) ) );
        
         $wp_customize->add_setting( 'read_more', array(
        'default'        => 'Read More',
    ) );
     
         
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'read_more', array(
        'label'   => 'Read More Text',
        'section' => 'aude_general_settings',
        'settings' => 'read_more',
        'priority' => 2,  
    ) ) );

        $wp_customize->add_setting( 'excerpt_length', array(
        'default'        => '55',
    ) );
     
         
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'excerpt_length', array(
        'label'   => 'Excerpt Length',
        'section' => 'aude_general_settings',
        'settings' => 'excerpt_length',
        'priority' => 3,  
    ) ) );

    $wp_customize->add_setting( 'google_analytics', array(
    'default'        => '',
) );
 
$wp_customize->add_control( new Aude_Customize_Textarea_Control( $wp_customize, 'google_analytics', array(
    'label'   => 'Google Analytics',
    'section' => 'aude_general_settings',
    'settings'   => 'google_analytics',
    'priority' => 4, 
) ) );


/* Footer */
     
     $wp_customize->add_section( 'aude_footer', array(
        'title'          => 'Footer',
        'priority'       => 37,
    ) );
         
     $wp_customize->add_setting( 'footer_text', array(
    'default'        => 'Copyright 2013 Quarter.  <a href="hello@audemedia.com">Say Hello</a>',
) );
 
$wp_customize->add_control( new Aude_Customize_Textarea_Control( $wp_customize, 'footer_text', array(
    'label'   => 'Footer Text',
    'section' => 'aude_footer',
    'settings'   => 'footer_text',
    'priority'       => 26,    
) ) );  
	
}