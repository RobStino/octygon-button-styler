<?php
/**
* Plugin Name: Octygon Button Styler
* Plugin URI: http://octygon.com/
* Description: Takes the already amazing Divi buttons to the next level.
* Version: 1.0
* Author: Rob Stinson
* Author URI: http://octygon.com
 * License: GPLv2 or later
*/

function octygon_button_styler_assets() {
	wp_enqueue_style( 'octygon-button-styles', plugins_url( '/style.css', __FILE__ ) );
	// wp_enqueue_script( 'octygon-button-scripts', plugins_url( '/scripts.js', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'octygon_button_styler_assets' );

function oct_customize_register( $wp_customize ) {
  	$wp_customize->add_setting( 'oct_btn_grow_styles',
		array(
			'type' => 'option', // or 'option'
			'capability' => 'edit_theme_options',
			'default' => 'oct_btn_grow_none',
			'transport' => 'refresh', // or postMessage
		)
	);
	$wp_customize->add_setting( 'oct_btn_shrink_styles',
		array(
			'type' => 'option', // or 'option'
			'capability' => 'edit_theme_options',
			'default' => 'oct_btn_shrink_none',
			'transport' => 'refresh', // or postMessage
		)
	);
	$wp_customize->add_setting( 'oct_btn_shadow_styles',
		array(
			'type' => 'option', // or 'option'
			'capability' => 'edit_theme_options',
			'default' => 'oct_btn_shadow_none',
			'transport' => 'refresh', // or postMessage
		)
	);
	$wp_customize->add_setting( 'oct_btn_slide_styles',
		array(
			'type' => 'option', // or 'option'
			'capability' => 'edit_theme_options',
			'default' => 'oct_btn_slide_none',
			'transport' => 'refresh', // or postMessage
		)
	);
	$wp_customize->add_control( 
		'oct_btn_grow_styles', 
		array(
			'priority' 	=> 20, // Within the section.
			'section' 	=> 'et_divi_buttons_hover', // Required, core or custom.
			'settings' 	=> 'oct_btn_grow_styles',
			'label'    	=> __( 'Button Grow Styles', 'oct' ), 
			'type'     	=> 'radio',
			'choices'  	=> array(
				'oct_btn_grow_none'   	=> __( 'None' ),
                'oct_btn_grow_1'  		=> __( 'Grow 1' ),
                'oct_btn_grow_2'  		=> __( 'Grow 2' ),
                'oct_btn_grow_3'  		=> __( 'Grow 3' ),
                'oct_btn_grow_4'  		=> __( 'Grow 4' )
			),
		) 
	);
	$wp_customize->add_control( 
		'oct_btn_shrink_styles', 
		array(
			'priority' 	=> 20, // Within the section.
			'section' 	=> 'et_divi_buttons_hover', // Required, core or custom.
			'settings' 	=> 'oct_btn_shrink_styles',
			'label'    	=> __( 'Button Shrink Styles', 'oct' ), 
			'type'     	=> 'radio',
			'choices'  	=> array(
				'oct_btn_shrink_none'   	=> __( 'None' ),
                'oct_btn_shrink_1'  		=> __( 'Shrink 1' ),
                'oct_btn_shrink_2'  		=> __( 'Shrink 2' ),
                'oct_btn_shrink_3'  		=> __( 'Shrink 3' ),
                'oct_btn_shrink_4'  		=> __( 'Shrink 4' )
			),
		) 
	);
	$wp_customize->add_control( 
		'oct_btn_shadow_styles', 
		array(
			'priority' 	=> 20, // Within the section.
			'section' 	=> 'et_divi_buttons_hover', // Required, core or custom.
			'settings' 	=> 'oct_btn_shadow_styles',
			'label'    	=> __( 'Button Shadow Styles', 'oct' ), 
			'type'     	=> 'radio',
			'choices'  	=> array(
				'oct_btn_shadow_none'   	=> __( 'None' ),
                'oct_btn_shadow_1'  		=> __( 'Shadow 1' ),
                'oct_btn_shadow_2'  		=> __( 'Shadow 2' ),
                'oct_btn_shadow_3'  		=> __( 'Shadow 3' ),
                'oct_btn_shadow_4'  		=> __( 'Shadow 4' )
			),
		) 
	);
	$wp_customize->add_control( 
		'oct_btn_slide_styles', 
		array(
			'priority' 	=> 20, // Within the section.
			'section' 	=> 'et_divi_buttons_hover', // Required, core or custom.
			'settings' 	=> 'oct_btn_slide_styles',
			'label'    	=> __( 'Button Slide Styles', 'oct' ), 
			'type'     	=> 'radio',
			'choices'  	=> array(
				'oct_btn_slide_none'   		=> __( 'None' ),
                'oct_btn_slide_left'  		=> __( 'Slide Left' ),
                'oct_btn_slide_right'  		=> __( 'Slide Right' ),
                'oct_btn_slide_top'  		=> __( 'Slide Top' ),
                'oct_btn_slide_bottom'  	=> __( 'Slide Bottom' ),
                'oct_btn_slide_out_h'  		=> __( 'Slide Out Horizontal' ),
                'oct_btn_slide_out_v'  		=> __( 'Slide Vertical' )
			),
		) 
	);
}
add_action( 'customize_register', 'oct_customize_register' );

//Octygon Customizer Javascript & CSS Output
function oct_customize_output()
{
	$oct_btn_grow = ( get_option( 'oct_btn_grow_styles' ) == 'oct_btn_grow_none' ) ? '' : get_option( 'oct_btn_grow_styles' );
	$oct_btn_shrink = ( get_option( 'oct_btn_shrink_styles' ) == 'oct_btn_shrink_none' ) ? '' : get_option( 'oct_btn_shrink_styles' );
	$oct_btn_shadow = ( get_option( 'oct_btn_shadow_styles' ) == 'oct_btn_shadow_none' ) ? '' : get_option( 'oct_btn_shadow_styles' );
	$oct_btn_slide = ( get_option( 'oct_btn_slide_styles' ) == 'oct_btn_slide_none' ) ? '' : get_option( 'oct_btn_slide_styles' );
	echo $oct_btn_grow;
	echo $oct_btn_shrink;
	echo $oct_btn_shadow;
	echo $oct_btn_slide;
    ?>
    	<script type="text/javascript">
    		jQuery(document).ready(function($) { 
				$( ".et_pb_button" ).addClass( "<?php echo $oct_btn_grow; ?>" );
				$( ".et_pb_button" ).addClass( "<?php echo $oct_btn_shrink; ?>" );
				$( ".et_pb_button" ).addClass( "<?php echo $oct_btn_shadow; ?>" );
				$( ".et_pb_button" ).addClass( "<?php echo $oct_btn_slide; ?>" );
			});
    	</script>
    <?php
}
add_action( 'wp_footer', 'oct_customize_output');