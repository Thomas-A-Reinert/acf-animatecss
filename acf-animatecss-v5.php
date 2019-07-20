<?php

class acf_field_animate_parameters extends acf_field {
	
	
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {
		
		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/
		
		$this->name = 'acf_animatecss';
		
		
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
				$this->label = __('Animate.css Effects', 'acf-animatecss');
				
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
				$this->category = 'basic';
				
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/		
		$this->defaults = array(
			'effect_name'	=> '',
			'enable_effect'	=> 1,
			'select_animate_type'	=> 1,
			'list_values'			=> array(
										'none' => '-none-',
										'bounce' => 'bounce',
										'flash' => 'flash',
										'pulse' => 'pulse',
										'rubberBand' => 'rubberBand',
										'shake' => 'shake',
										'swing' => 'swing',
										'tada' => 'tada',
										'wobble' => 'wobble',
										'bounceIn' => 'bounceIn',
										'bounceInDown' => 'bounceInDown',
										'bounceInLeft' => 'bounceInLeft',
										'bounceInRight' => 'bounceInRight',
										'bounceInUp' => 'bounceInUp',
										'fadeIn' => 'fadeIn',
										'fadeInDown' => 'fadeInDown',
										'fadeInDownBig' => 'fadeInDownBig',
										'fadeInLeft' => 'fadeInLeft',
										'fadeInLeftBig' => 'fadeInLeftBig',
										'fadeInRight' => 'fadeInRight',
										'fadeInRightBig' => 'fadeInRightBig',
										'fadeInUp' => 'fadeInUp',
										'fadeInUpBig' => 'fadeInUpBig',
										'flip' => 'flip',
										'flipInX' => 'flipInX',
										'flipInY' => 'flipInY',
										'lightSpeedIn' => 'lightSpeedIn',
										'rotateIn' => 'rotateIn',
										'rotateInDownLeft' => 'rotateInDownLeft',
										'rotateInDownRight' => 'rotateInDownRight',
										'rotateInUpLeft' => 'rotateInUpLeft',
										'rotateInUpRight' => 'rotateInUpRight',
										'rollIn' => 'rollIn',
										'zoomIn' => 'zoomIn',
										'zoomInDown' => 'zoomInDown',
										'zoomInLeft' => 'zoomInLeft',
										'zoomInRight' => 'zoomInRight',
										'zoomInUp' => 'zoomInUp',
										'slideInDown' => 'slideInDown',
										'slideInLeft' => 'slideInLeft',
										'slideInRight' => 'slideInRight',
										'slideInUp' => 'slideInUp'
								),
				'delay'	=>	array(
											0	=>	'0',
											1	=>	'1',
											2	=>	'2',
											3	=>	'3',
											4	=>	'4',
											5	=>	'5',
										),
		);
						
		// do not delete!
    	parent::__construct();
    	
	}
	
	
	/*
	*  render_field_settings()
	*
	*  Create extra settings for your field. These are visible when editing a field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field_settings( $field ) {
		
		/*
		*  acf_render_field_setting
		*
		*  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
		*  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
		*
		*  More than one setting can be added by copy/paste the above code.
		*  Please note that you must also have a matching $defaults value for the field name (font_size)
		*/
		
		acf_render_field_setting( $field, array(
			'label'			=> __('Enable Effect','acf-animatecss'),
			'type'			=> 'radio',
			'name'			=> 'enable_effect',
			'layout'  		=>  'horizontal',
			'choices' =>  array(
											1 => __('Yes', 'acf-animatecss'),
											0 => __('No', 'acf-animatecss'),
										)
		));

		acf_render_field_setting( $field, array(
			'label'			=> __('Select Animate.css Type','acf-animatecss'),
			'type'			=> 'select',
			'ui'			=> 1,
			'name'			=> 'select_animate_type',
			'choices'		=> $field['list_values'],
		));

		acf_render_field_setting( $field, array(
			'label'			=> __('Animate.css Start Delay','acf-animatecss'),
			'type'			=> 'select',
			'ui'			=> 1,
			'name'			=> 'animate_start_delay',
			'choices' =>  array(
											0	=>	0,
											1	=>	1,
											2	=>	2,
											3	=>	3,
											4	=>	4,
											5	=>	5,
										),
			'append'		=> 'Seconds'
		));

		acf_render_field_setting( $field, array(
			'label'			=> __('Animation Speed','acf-animatecss'),
			'type'			=> 'select',
			'ui'			=> 1,
			'name'			=> 'animation_speed',
			'choices' =>  array(
											'slower'	=>	__('Slowest (3s)','acf-animatecss'),
											'slow'		=>	__('Slow (2s)','acf-animatecss'),
											'fast'		=>	__('Fast (800ms)','acf-animatecss'),
											'faster'	=>	__('Fastest (500ms)','acf-animatecss'),
										),
			'append'		=> '',
		));
	}


	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field (array) the $field being rendered
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	function render_field( $field ) {
		
			// add empty value (allows '' to be selected)
			if( empty($field['value']) ){

					$field['value']['enable_effect'] 					= $field['enable_effect'];
					$field['value']['select_animate_type']		= $field['select_animate_type'];
					$field['value']['animate_start_delay'] 		= $field['animate_start_delay'];
					$field['value']['animation_speed']       	= $field['animation_speed'];
			}

			$field_value = $field['value'];

			$e = '<div class="acf-label">';
			$e.= '<label class="" for="' . $field['key'] . '">' . __("Enable Effect", "acf-animate_parameters") . '</label>';
			$e.= '<div class="acf-input">';
			$e.=  '<ul class="acf-radio-list acf-hl"><li><label><input type="radio" name="' . $field['name'] . '[enable_effect]"'; if ($field_value['enable_effect']) { $e.= 'checked'; } $e.= ' value="1">' . __("Yes", "acf-animate_parameters") . '</label></li><li><label>';
			$e.=  '<input type="radio" name="' . $field['name'] . '[enable_effect]"'; if (!$field_value['enable_effect']) { $e.= 'checked'; } $e.= ' value="0">' . __("No", "acf-animate_parameters") . '</label></li></ul>';
			$e.= '</div></div>';


			$e.= '<div class="acf-label">';
			$e.= '<div class="acf-input-prepend">' . __("Animate.css Animation", "acf-animate_parameters") . $i . '</div>';
			$e.= '<div class="acf-input-wrap">';
			$e.= '<select name="' . $field['name'] . '[select_animate_type]" class="js-select2">';
				foreach ( $field['list_values'] as $k => $v ) {
					$e.= '<option value="' . $k . '"' . selected($field_value['select_animate_type'], $k, false) . ' >' . $k . '</option>' ;
				}
			$e.= '</select>';	
			$e.= '</div></div>';


			$e.= '<div class="acf-label">';
			$e.= '<div class="acf-input-prepend">' . __('Animate.css Start Delay','acf-animatecss') . '</div>';
			$e.= '<div class="acf-input-wrap">';
			$e.= '<select name="' . $field['name'] . '[animate_start_delay]" class="js-select2">';
				foreach ( $field['delay'] as $k => $v ) {
					$e.= '<option value="' . $k . '"' . selected($field_value['animate_start_delay'], $k, false) . ' >' . $k . '</option>' ;
				}
			$e.= '</select>';	
			$e.= '</div></div>';


			$e.= '<div class="acf-label">';
			$e.= '<div class="acf-input-prepend">' . __('Animation Speed','acf-animatecss') . '</div>';
			$e.= '<div class="acf-input-wrap">';
			$e.= '<select name="' . $field['name'] . '[animation_speed]" class="js-select2">';
				foreach ( $field['animation_speed_values'] as $k => $v ) {
					$e.= '<option value="' . $k . '"' . selected($field_value['animation_speed'], $k, false) . ' >' . $k . '</option>' ;
				}
			$e.= '</select>';	
			$e.= '</div></div>';
			
			echo $e;
	}

}

// create field
new acf_field_animate_parameters();
?>
