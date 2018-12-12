<?php

/* ==========================================================================
   Remove adminbar
   ========================================================================== */

add_filter( 'show_admin_bar', '__return_false' );


/* ==========================================================================
   Link til stylesheet
   ========================================================================== */


function hejtiger_theme_styles() {

  wp_enqueue_style('style.css',  get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'hejtiger_theme_styles' );


/* ==========================================================================
   Link to javascript
   ========================================================================== */

function hejtiger_theme_js() {

  wp_enqueue_script('jquery');

  wp_enqueue_script( 'custom_js' , get_template_directory_uri() . '/dist/js/custom.js' , array(), '1.0.0', true  );
  
  wp_enqueue_script( 'bootstrap_js' , get_template_directory_uri() . '/dist/js/bootstrap.bundle.min.js' , array(), '4.1.3', true  );
}

add_action( 'wp_enqueue_scripts', 'hejtiger_theme_js' );


/* ==========================================================================
   custom Fonts
   ========================================================================== */

    function hejtiger_custom_fonts() {

            wp_enqueue_style( 'googleFonts' , 'http://fonts.googleapis.com/css?family=Muli:300,400|Nunito');

            wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', null, '4.7.0' );
        }
    add_action('wp_enqueue_scripts', 'hejtiger_custom_fonts');

/* ==========================================================================
  theme default support
   ========================================================================== */

if ( ! function_exists( 'hejtiger_setup' ) ) {
  function hejtiger_setup() {

    /* post thumbnail support */
    add_theme_support( 'post-thumbnails' );

    /* post format support */
    add_theme_support( 'post-formats', array('aside','image','video', 'gallery','link') );

    /* Menuer */
    register_nav_menus(
          array(
            'main-menu' => __( 'Main Menu' ),
            'footer-menu' => __( 'Footer Menu' ),
            'social-menu' => __( 'Social Menu' )
            )
          );

    /* widgets */
    register_sidebar(
          array(
            'name' => __( 'Main Widget' ),
            'id' => __( 'main-widget' ),
            'class' => __( 'widget-custom' ),
            'desription' => __( 'Main Widget' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
            )
          );

     register_sidebar(
          array(
            'name' => __( 'Footer widget' ),
            'id' => __( 'footer-widget' ),
            'class' => __( 'widget-custom' ),
            'desription' => __( 'Footer widget' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
            )
          );




  }
}

add_action ( 'after_setup_theme', 'hejtiger_setup' );