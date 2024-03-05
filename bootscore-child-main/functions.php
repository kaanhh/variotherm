<?php

// style and scripts
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles() {

  // style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

  // Compiled main.css
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/css/main.css'));
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.css', array('parent-style'), $modified_bootscoreChildCss);

  // custom.js
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);
}

//Das Logo oben Links auf der Seite wird hier manuell eingerichtet
add_theme_support( 'custom-logo' );

function themename_custom_logo_setup() {
	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );


function einbetten_seite_als_shortcode($atts) {
    $atts = shortcode_atts(array(
        'slug' => '',
    ), $atts, 'einbetten_seite');

    $query = new WP_Query(array(
        'name' => $atts['slug'],
        'post_type' => 'page',
    ));

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $content = apply_filters('the_content', get_the_content());
            return $content;
        }
    }

    wp_reset_postdata();
    return '';
}
add_shortcode('einbetten_seite', 'einbetten_seite_als_shortcode');

//ab hier die Änderung der Farbe im Customizer von Schrift
function mein_theme_customizer( $wp_customize ) {
    // Abschnitt hinzufügen
    $wp_customize->add_section('mein_theme_farben', array(
        'title'      => __('Farben','meintheme'),
    ));

    // Einstellung für Paragraphenfarbe
    $wp_customize->add_setting('p_farbe', array(
        'default'     => '#000000',
        'transport'   => 'refresh',
    ));

    // Steuerelement für Paragraphenfarbe
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'p_farbe', array(
        'label'      => __('Paragraph Farbe', 'meintheme'),
        'section'    => 'mein_theme_farben',
        'settings'   => 'p_farbe',
    )));
}
add_action('customize_register', 'mein_theme_customizer');

// CSS für die Anpassung der Paragraphenfarbe
function mein_customizer_css() {
    ?>
    <style type="text/css">
        p { color: <?php echo get_theme_mod('p_farbe', '#000000'); ?>; }
    </style>
    <?php
}
add_action('wp_head', 'mein_customizer_css');


//Schriftart hinzufügen
function mein_theme_customizer2( $wp_customize ) {
    // Abschnitt für Schriftarteinstellungen
    $wp_customize->add_section('mein_theme_typografie', array(
        'title'      => __('Typografie','bootscore-child-main'),
    ));

    // Einstellung für Schriftart
    $wp_customize->add_setting('p_schriftart', array(
        'default'     => 'Arial',
        'transport'   => 'refresh',
    ));

    // Steuerelement für Schriftart
    $wp_customize->add_control('p_schriftart', array(
        'label'      => __('Paragraph Schriftart', 'bootscore-child-main'),
        'section'    => 'mein_theme_typografie',
        'settings'   => 'p_schriftart',
        'type'       => 'select',
        'choices'    => array(
            'Arial' => 'Arial',
            'Verdana' => 'Verdana',
            'Helvetica' => 'Helvetica',
            'Times New Roman' => 'Times New Roman',
            'Roboto' => 'Roboto',
            'HelveticaNowDisplay' => 'HelveticaNowDisplay',
        ),
    ));
}
add_action('customize_register', 'mein_theme_customizer2');

// CSS für die Schriftartänderung
function mein_typografie_css() {
    ?>
    <style type="text/css">
        p { font-family: <?php echo get_theme_mod('p_schriftart', 'Arial'); ?>; }
    </style>
    <?php
}

add_action('wp_head', 'mein_typografie_css');
