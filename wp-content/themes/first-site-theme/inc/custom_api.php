<?php


    function searchapi(){
        register_rest_route( 'uni/v1', 'search', array(
            'methods' => 'GET',
            'callback' => 'results'
        ));
    }

    function results(){
        $events = new WP_Query(array(
            'post_type' => 'Events'
        ));

        $resultarray = array();

        while($events->have_posts(  )){
            $events->the_post(  );

            array_push($resultarray, array(
                'title' => get_the_title(  ),
                'permalink'=> get_the_permalink( ),
                'author' => get_the_author( )
            ));
        }


        return $resultarray;
    }

    add_action('rest_api_init','searchapi');

    
?>