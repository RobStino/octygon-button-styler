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

/**
 * Add css button styles.
 *
 * @action wp_enqueue_scripts
 */
function octygon_button_styler_assets() {
	wp_enqueue_style( 'octygon-button-styles', plugins_url( '/style.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'octygon_button_styler_assets' );

/**
 * Register customizer controls.
 *
 * @action customize_register
 *
 * @param WP_Customize_Manager $wp_customize
 */
function oct_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'oct_btn_grow_styles',
		array(
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'default'    => 'oct_btn_grow_none',
			'transport'  => 'refresh',
		)
	);
	$wp_customize->add_setting( 'oct_btn_shrink_styles',
		array(
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'default'    => 'oct_btn_shrink_none',
			'transport'  => 'refresh',
		)
	);
	$wp_customize->add_setting( 'oct_btn_shadow_styles',
		array(
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'default'    => 'oct_btn_shadow_none',
			'transport'  => 'refresh',
		)
	);
	$wp_customize->add_setting( 'oct_btn_slide_styles',
		array(
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'default'    => 'oct_btn_slide_none',
			'transport'  => 'refresh',
		)
	);
	$wp_customize->add_setting( 'oct_btn_other_styles',
		array(
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'default'    => 'oct_btn_other_none',
			'transport'  => 'refresh',
		)
	);
	$wp_customize->add_control(
		'oct_btn_grow_styles',
		array(
			'priority' => 20,
			'section'  => 'et_divi_buttons_hover',
			'settings' => 'oct_btn_grow_styles',
			'label'    => __( 'Button Grow Styles', 'oct' ),
			'type'     => 'radio',
			'choices'  => array(
				'oct_btn_grow_none' => __( 'None' ),
				'oct_btn_grow_1'    => __( 'Grow 1' ),
				'oct_btn_grow_2'    => __( 'Grow 2' ),
				'oct_btn_grow_3'    => __( 'Grow 3' ),
				'oct_btn_grow_4'    => __( 'Grow 4' ),
			),
		)
	);
	$wp_customize->add_control(
		'oct_btn_shrink_styles',
		array(
			'priority' => 20,
			'section'  => 'et_divi_buttons_hover',
			'settings' => 'oct_btn_shrink_styles',
			'label'    => __( 'Button Shrink Styles', 'oct' ),
			'type'     => 'radio',
			'choices'  => array(
				'oct_btn_shrink_none' => __( 'None' ),
				'oct_btn_shrink_1'    => __( 'Shrink 1' ),
				'oct_btn_shrink_2'    => __( 'Shrink 2' ),
				'oct_btn_shrink_3'    => __( 'Shrink 3' ),
				'oct_btn_shrink_4'    => __( 'Shrink 4' ),
			),
		)
	);
	$wp_customize->add_control(
		'oct_btn_shadow_styles',
		array(
			'priority' => 20,
			'section'  => 'et_divi_buttons_hover',
			'settings' => 'oct_btn_shadow_styles',
			'label'    => __( 'Button Shadow Styles', 'oct' ),
			'type'     => 'radio',
			'choices'  => array(
				'oct_btn_shadow_none' => __( 'None' ),
				'oct_btn_shadow_1'    => __( 'Shadow 1' ),
				'oct_btn_shadow_2'    => __( 'Shadow 2' ),
				'oct_btn_shadow_3'    => __( 'Shadow 3' ),
				'oct_btn_shadow_4'    => __( 'Shadow 4' ),
			),
		)
	);
	$wp_customize->add_control(
		'oct_btn_slide_styles',
		array(
			'priority' => 20,
			'section'  => 'et_divi_buttons_hover',
			'settings' => 'oct_btn_slide_styles',
			'label'    => __( 'Button Slide Styles', 'oct' ),
			'type'     => 'radio',
			'choices'  => array(
				'oct_btn_slide_none'   => __( 'None' ),
				'oct_btn_slide_left'   => __( 'Slide Left' ),
				'oct_btn_slide_right'  => __( 'Slide Right' ),
				'oct_btn_slide_top'    => __( 'Slide Top' ),
				'oct_btn_slide_bottom' => __( 'Slide Bottom' ),
				'oct_btn_slide_out_h'  => __( 'Slide Out Horizontal' ),
				'oct_btn_slide_out_v'  => __( 'Slide Vertical' ),
			),
		)
	);
	$wp_customize->add_control(
		'oct_btn_other_styles',
		array(
			'priority' => 20,
			'section'  => 'et_divi_buttons_hover',
			'settings' => 'oct_btn_other_styles',
			'label'    => __( 'Button Other Styles', 'oct' ),
			'type'     => 'radio',
			'choices'  => array(
				'oct_btn_other_none'   => __( 'None' ),
				'oct_btn_wiggle'   => __( 'Wiggle' ),
				'oct_btn_pulse'  => __( 'Pulse' ),
				'oct_btn_shiver'    => __( 'Shiver' ),
				'oct_btn_bounce' => __( 'Bounce' ),
			),
		)
	);
}
add_action( 'customize_register', 'oct_customize_register' );

/**
 * Customizer Javascript & CSS Output
 *
 * @action wp_footer
 */
function oct_customize_output() {
	$grow_class   = get_option( 'oct_btn_grow_styles' );
	$shrink_class = get_option( 'oct_btn_shrink_styles' );
	$shadow_class = get_option( 'oct_btn_shadow_styles' );
	$slide_class  = get_option( 'oct_btn_slide_styles' );
	$other_class  = get_option( 'oct_btn_other_styles' );

	if ( 'oct_btn_grow_none' === $grow_class ) {
		$grow_class = '';
	}

	if ( 'oct_btn_shrink_none' === $shrink_class ) {
		$shrink_class = '';
	}

	if ( 'oct_btn_shadow_styles' === $shadow_class ) {
		$shadow_class = '';
	}

	if ( 'oct_btn_slide_styles' === $slide_class ) {
		$slide_class = '';
	}

	if ( 'oct_btn_other_styles' === $other_class ) {
		$other_class = '';
	}

	$button_classes = implode( ' ', array( $grow_class, $shrink_class, $shadow_class, $slide_class, $other_class ) );
	?>
	<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			$( '.et_pb_button' ).addClass( '<?php echo esc_attr( $button_classes ); ?>' );
		});
	</script>
	<?php
}
add_action( 'wp_footer', 'oct_customize_output' );
