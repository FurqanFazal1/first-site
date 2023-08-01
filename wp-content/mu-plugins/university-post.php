<?php

function Uni_Events(){
        register_post_type( 'Events', array(
            
            //'show_in_rest'=>true,
            'labels' => array(
                'name'=>'Events',
                'add_new_item' => 'Add New Event',
                'edit_item' => 'Edit Event'
            ),

            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug'=>'events'),
            'menu_icon' => 'dashicons-calendar',
            'show_in_rest'=>true
        ) );


        register_post_type( 'program', array(
            
            'labels' => array(
                'name'=>'Programs',
                'add_new_item' => 'Add New Program',
                'edit_item' => 'Edit Program'
            ),

            'show_in_rest'=>true,
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor'),
            'rewrite' => array('slug'=>'programs'),
            'menu_icon' => 'dashicons-awards'
        ) );


            register_post_type( 'Note', array(
                
                'show_in_rest'=>true,
                'labels' => array(
                    'name'=>'Note',
                    'add_new_note' => 'Add New Note',
                    'edit_note' => 'Edit Note'
                ),
    
                'public' => false,
                'show_ui' => true,
                'has_archive' => true,
                'rewrite' => array('slug'=>'notes'),
                'menu_icon' => 'dashicons-welcome-write-blog',
                'show_in_rest'=>true
            ) );
    
    }

    add_action('init', 'Uni_Events');