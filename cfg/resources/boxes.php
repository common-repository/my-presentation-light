<?php

$boxes = array();
        
$boxes[ 'presentation' ][ 'manager' ] = array(
    'title' => __( 'Presentation Manager' , 'myThemes' ),
    'context' => 'normal',
    'priority' => 'low',
    'callback' => array( 'mythemes_plg_presentation' , 'manager' ),
    'args' => null,
    'onSave' => array( 'mythemes_plg_presentation' , 'save' )
);
$boxes[ 'presentation' ][ 'attach' ] = array(
    'title' => __( 'Attach Presentation to Resources' , 'myThemes' ),
    'context' => 'normal',
    'priority' => 'high',
    'callback' => array( 'mythemes_plg_presentation' , 'attach' ),
    'args' => null,
    'onSave' => array( 'mythemes_plg_presentation' , 'attach_save' )
);

$boxes[ 'presentation' ][ 'settings' ] = array(
    'title' => __( 'Settings' , 'myThemes' ),
    'context' => 'normal',
    'priority' => 'high',
    'callback' => array( 'mythemes_plg_presentation' , 'settings' ),
    'args' => null,
    'onSave' => array( 'mythemes_plg_presentation' , 'settings_save' )
);

mythemes_plg_cfg::set_boxes( $boxes );
?>