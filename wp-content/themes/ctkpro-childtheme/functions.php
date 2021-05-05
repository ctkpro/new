<?php 
    /*
    Purpose: added theme-update.css & main js
    */
    function ctkpro_enqueue_styles_scripts() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css?v='.rand() );
        wp_enqueue_style('theme-style', get_stylesheet_directory_uri(). '/css/theme-update.css?v='.rand() );
        wp_enqueue_script(
            'custom-script',
            get_stylesheet_directory_uri() . '/js/main.min.js?v='.rand(),
            array( 'jquery' )
        );
    }
    add_action( 'wp_enqueue_scripts', 'ctkpro_enqueue_styles_scripts' );

    /*
    Purpose: body add slug classname
    */
    function add_slug_body_class($classes) {
        global $post;
        if (isset($post)) {
            $classes[] = $post->post_type . '-' . $post->post_name;
        }
        return $classes;
    }
    add_filter('body_class', 'add_slug_body_class');
?>