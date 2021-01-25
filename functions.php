<?php
function test_bootstrapping(){
    load_theme_textdomain( "test");
    add_theme_support( 'post-thumbnails' );
    add_theme_support( "title-tag");
    
    register_nav_menu( "top-menu",__("top menu","test") );
    register_nav_menu( "footer-menu",__("footer menu","test") );
}
add_action( "after_setup_theme","test_bootstrapping");

function test_assets(){
    wp_enqueue_style( "test",get_stylesheet_uri(),null,time());
    // wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"' );
    wp_enqueue_style('test-css',get_template_directory_uri()."/assets/css/vendor/font-awesome.min.css",null,time());
    wp_enqueue_style('test-css2',get_template_directory_uri()."/assets/css/vendor/animate.min.css",null,time());
    wp_enqueue_style('test-css3',get_template_directory_uri()."/assets/css/vendor/owl.carousel.css",null,time());
    wp_enqueue_style('test-css4',get_template_directory_uri()."/assets/css/vendor/owl.transitions.css",null,time());

    wp_enqueue_script('test-js',get_template_directory_uri()."/assets/js/vendor/modernizr.js",array("jquery"),time());
    wp_enqueue_script('test-js1',get_template_directory_uri()."/assets/js/vendor/jquery.js",array("jquery"),time(),true);
    wp_enqueue_script('test-js2',get_template_directory_uri()."/assets/js/vendor/grid.js",array("jquery"),time(),true);
    wp_enqueue_script('test-js3',get_template_directory_uri()."/assets/js/vendor/owl.carousel.min.js.js",array("jquery"),time(),true);
    wp_enqueue_script('test-js4',get_template_directory_uri()."/assets/js/vendor/wow.min.js",array("jquery"),time(),true);
    wp_enqueue_script('test-js5',get_template_directory_uri()."/assets/js/vendor/jquery.nav.js",array("jquery"),time(),true);
    wp_enqueue_script('test-js6',get_template_directory_uri()."/assets/js/vendor/typed.min.js",array("jquery"),time(),true);
    wp_enqueue_script('test-js7',get_template_directory_uri()."/assets/js/vendor/jquery.scrollUp.min.js",array("jquery"),time(),true);
    wp_enqueue_script('test-js8',get_template_directory_uri()."/assets/js/vendor/scroll.js",array("jquery"),time(),true);
    wp_enqueue_script('test-js9',get_template_directory_uri()."/assets/js/vendor/jquery.sticky.js",array("jquery"),time(),true);
    wp_enqueue_script('test-js10',get_template_directory_uri()."/assets/js/vendor/jquery.flexnav.min.js",array("jquery"),time(),true);
    wp_enqueue_script('test-js11',get_template_directory_uri()."/assets/js/vendor/masonry.pkgd.min.js",array("jquery"),time(),true);
    wp_enqueue_script('test-js12',get_template_directory_uri()."/assets/js/vendor/skrollr.js",array("jquery"),time(),true);
    wp_enqueue_script('test-js13',get_template_directory_uri()."/assets/js/script.js",array("jquery"),time(),true);
    wp_enqueue_script('featherlight-js',"//cdn.jsdelivr.net/npm/sweetalert2@10",array('jquery'),time(),true);

}
add_action( "wp_enqueue_scripts","test_assets");

function alpha_sidebar(){
    register_sidebar( 
        array(
            'name' => __('Social link','test'),
            'id'  => 'sidebar-1',
            'description' => __('Right Sidebar','test'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>', 
        ) 
    );
    
    
}
add_action( "widgets_init","alpha_sidebar");

function test_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'test_add_woocommerce_support' );
add_action( 'woocommerce_before_main_content', 'test_wrapper_start',10);
add_action( 'woocommerce_after_main_content', 'test_wrapper_end',10);

function test_wrapper_start(){
    echo '<section id="main">';
}
function test_wrapper_end(){
    echo '</section>';
}





