<?php
require('inc/custom_api.php');

    function load_css(){

        wp_enqueue_style( 'style_css', get_theme_file_uri( '/build/style-index.css' ));
        wp_enqueue_style( 'extra_style_css', get_theme_file_uri( '/build/index.css' ));
        wp_enqueue_style( 'font-awsome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style( 'font-style', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        wp_enqueue_script( "Toogle-footer", get_theme_file_uri( '/build/index.js' ), array('jquery'), '1.0', true );
        wp_localize_script( 'Toogle-footer', 'local_url', array(

            'url'=>get_site_url(),
            'nonce'=> wp_create_nonce('wp_rest')
            
        ) );
    }
    add_action( 'wp_enqueue_scripts', 'load_css');

    function Add_Author(){
        register_rest_field( 'post', 'author_name', array(
            'get_callback' => function(){
                return get_the_author( );   
            }

        ) );
    }

    add_action( 'rest_api_init()', 'Add_Author' );

    function title_func(){
        register_nav_menu( "HeaderMenu", "Add Header Menu" );
        register_nav_menu("FooterMenu" , "Add Footer Menu");
        register_nav_menu( 'FooterMenu2', 'Add Info Menu' );
        add_theme_support( 'title-tag');
    }

    add_action( 'after_setup_theme', 'title_func' );

    function uni_adjust_query($query){
        if(!is_admin(  ) AND is_post_type_archive( 'program' ) AND is_main_query(  )){
            $query->set('orderby','title');
            $query->set('order', 'ASC');
            $query->set('post_per_page',-1);
        }

    }

    add_action('pre_get_posts', 'uni_adjust_query');


    function redirecttofront(){

        $ourUSer = wp_get_current_user();
        if(count($ourUser->roles)==1 AND $ourUSer->roles[0]=='subscriber'){

            wp_redirect( site_url( "/"));
            exit;

        }
    }

    //add_action( 'admin_init', 'redirecttofront' )

    add_filter( 'ai1wm_exclude_content_from_export', 'ignorecertainfile');

    function ignorecertainfile($exclude_filers){
        $exclude_filers[]='theme/first-site-theme/node_modules';
        return $exclude_filers;
    }
?>