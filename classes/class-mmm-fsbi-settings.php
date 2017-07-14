<?php
class mmm_fsbi_settings 
{
		
	// ---------------------------------------------------------------------------------------------------------------------
	// 	PAGES AND TABS
	// 	@since									MultiMediaMonster
	/*
		Example array element
		
		----------------------------------------------------------
		
		$pages_tabs['PAGENAME']		=
			array
			(
														"PAGETITLE"	=>	__('Page title', MMM_FSBI_PLUGIN_TRANSLATE),
														"PAGETABS"		=> 	array
																			(
																				"TABID" => __('Tab title', MMM_FSBI_PLUGIN_TRANSLATE),
																				"TABID" => __('Tab title', MMM_FSBI_PLUGIN_TRANSLATE),
																				"TABID" => __('Tab title', MMM_FSBI_PLUGIN_TRANSLATE)
																			)
		);
		
		----------------------------------------------------------
		
		Don't forget to add the tabs to the default_values() function -> PAGENAME_TABID
	*/
	// ---------------------------------------------------------------------------------------------------------------------
		
		public static function settings_pages_tabs($to_return = '')
		{
			$pages_tabs 						= 	array();
			$pages_tabs['settings_general']		=	
				array
				(
														"page_title"	=>	__('Settings general', MMM_FSBI_PLUGIN_TRANSLATE),
														"page_tabs"		=> 	array
																			(
																				"tab1" => __('Configuration', MMM_FSBI_PLUGIN_TRANSLATE),
																				"tab2" => __('Layout', MMM_FSBI_PLUGIN_TRANSLATE)
																			)
			);
			if ($to_return)
			{
				$pages_tabs							= $pages_tabs[$to_return];
			}
			return $pages_tabs;
		}
		
	// ---------------------------------------------------------------------------------------------------------------------
	// 	DEFAULT VALUES
	// 	@since									MultiMediaMonster
	/*
		Example array elements
		- section
		- select
		- text
		----------------------------------------------------------
		
		$defaults['PAGENAME_TABID']['ELEMENTID'] 	= 	
			array(
				'the_title' 		=> 		__('Element title', MMM_FSBI_PLUGIN_TRANSLATE),
				'the_text' 			=> 		__('Element text', MMM_FSBI_PLUGIN_TRANSLATE),
				'the_type'			=> 		'section'
		);
		$defaults['PAGENAME_TABID']['ELEMENTID'] 	= 	
			array(
				'the_title' 		=> 		__('Label title<br /><span class="small">Optional explanation</span>', MMM_FSBI_PLUGIN_TRANSLATE),
				'the_val' 			=> 		2, // default value
				'the_type'			=> 		'select',
				'the_vals'			=> 		array
											(
												"SELECTVAL"		=> __('Select title', MMM_FSBI_PLUGIN_TRANSLATE),
												"SELECTVAL"		=> __('Select title', MMM_FSBI_PLUGIN_TRANSLATE)
												//option add element
											)
		);
		$defaults['PAGENAME_TABID']['ELEMENTID'] 	= 	
			array(
				'the_title' 		=> 		__('Label title<br /><span class="small">Optional explanation</span>', MMM_FSBI_PLUGIN_TRANSLATE),
				'the_val' 			=> 		2, // default value
				'the_type'			=> 		'text'
		);
		
		----------------------------------------------------------
		
	*/
	// ---------------------------------------------------------------------------------------------------------------------
		
		public static function default_values($to_return = '', $return_as = 'all') 
		{
			$defaults 													= 	array();
			
			// ---------------------------------------------------------------------------------------------------------------------
			// 	TAB1
			// ---------------------------------------------------------------------------------------------------------------------
				
				$defaults['settings_general_tab1']['section'] 			= 	array
																			(
																				'the_title' 	=> 		__('Configuration', MMM_FSBI_PLUGIN_TRANSLATE),
																				'the_text' 		=> 		__('This section contains configuration settings for setting up Full Screen Background Images plugin', MMM_FSBI_PLUGIN_TRANSLATE),
																				'the_type'		=> 		'section'
																			);
				$defaults['settings_general_tab1']['autoplay'] 			= 	array
																			(
																				'the_title' 	=> 		__('Autoplay<br /><span class="small">Determines whether slideshow begins playing when page is loaded</span>', MMM_FSBI_PLUGIN_TRANSLATE),
																				'the_val' 		=> 		2,
																				'the_type'		=> 		'select',
																				'the_vals'		=> 		array
																										(
																											1		=> __('Yes', MMM_FSBI_PLUGIN_TRANSLATE),
																											2		=> __('No', MMM_FSBI_PLUGIN_TRANSLATE)
																										)
																			);
				$defaults['settings_general_tab1']['controls'] 			= 	array
																			(
																				'the_title' 	=> 		__('Show Controls<br /><span class="small">Show the controls at the bottom of the page</span>', MMM_FSBI_PLUGIN_TRANSLATE),
																				'the_val' 		=> 		2,
																				'the_type'		=> 		'select',
																				'the_vals'		=> 		array
																										(
																											1		=> __('Yes', MMM_FSBI_PLUGIN_TRANSLATE),
																											2		=> __('No', MMM_FSBI_PLUGIN_TRANSLATE)
																										)
																			);
				$defaults['settings_general_tab1']['keyboard_nav'] 		= 	array
																			(
																				'the_title' 	=> 		__('Keyboard Navigation<br /><span class="small">Allows control via keyboard (Spacebar: Pause or play - Right or Up Arrow: Next slide - Left or Down Arrow: Previous slide).</span>', MMM_FSBI_PLUGIN_TRANSLATE),
																				'the_val' 		=> 		2,
																				'the_type'		=> 		'select',
																				'the_vals'		=> 		array
																										(
																											1		=> __('Yes', MMM_FSBI_PLUGIN_TRANSLATE),
																											2		=> __('No', MMM_FSBI_PLUGIN_TRANSLATE)
																										)
																			);
				$defaults['settings_general_tab1']['pause_hover'] 		= 	array
																			(
																				'the_title' 	=> 		__('Pause on Hover<br /><span class="small">Pauses slideshow while current image hovered over.</span>', MMM_FSBI_PLUGIN_TRANSLATE),
																				'the_val' 		=> 		2,
																				'the_type'		=> 		'select',
																				'the_vals'		=> 		array
																										(
																											1		=> __('Yes', MMM_FSBI_PLUGIN_TRANSLATE),
																											2		=> __('No', MMM_FSBI_PLUGIN_TRANSLATE)
																										)
																			);
				
			// ---------------------------------------------------------------------------------------------------------------------
			// 	TAB2
			// ---------------------------------------------------------------------------------------------------------------------
			
				$defaults['settings_general_tab2']['section'] 			= 	array
																			(
																					'the_title' 		=> 		__('Layout', MMM_FSBI_PLUGIN_TRANSLATE),
																					'the_text' 			=> 		__('This section contains layout settings for setting up Full Screen Background Images plugin', MMM_FSBI_PLUGIN_TRANSLATE),
																					'the_type'			=> 		'section'
																			);
				$defaults['settings_general_tab2']['background_color'] 	= 	array
																			(
																					'the_title' 		=> 		__('Background color<br /><span class="small">backgroundcolor for the images</span>', MMM_FSBI_PLUGIN_TRANSLATE),
																					'the_val' 			=> 		'#fff',
																					'the_type'			=> 		'text',
																					'the_class'			=> 		'colorpicker'
																			);
				$defaults['settings_general_tab2']['fit_always'] 		= 	array
																			(
																					'the_title' 		=> 		__('Fit always<br /><span class="small">Prevents the image from ever being cropped. Ignores minimum width and height.</span>', MMM_FSBI_PLUGIN_TRANSLATE),
																					'the_val' 			=> 		2,
																					'the_type'			=> 		'select',
																					'the_vals'			=> 		array
																												(
																													1		=> __('Yes', MMM_FSBI_PLUGIN_TRANSLATE),
																													2		=> __('No', MMM_FSBI_PLUGIN_TRANSLATE)
																												)
																			);
				$defaults['settings_general_tab2']['horizontal_center'] = 	array
																			(
																					'the_title' 		=> 		__('Horizontal center<br /><span class="small">Centers image horizontally. When turned off, the images resize/display from the left of the page.</span>', MMM_FSBI_PLUGIN_TRANSLATE),
																					'the_val' 			=> 		2,
																					'the_type'			=> 		'select',
																					'the_vals'			=> 		array
																												(
																													1		=> __('Yes', MMM_FSBI_PLUGIN_TRANSLATE),
																													2		=> __('No', MMM_FSBI_PLUGIN_TRANSLATE)
																												)
																			);
				$defaults['settings_general_tab2']['vertical_center'] 	= 	array
																			(
																					'the_title' 		=> 		__('Vertical center<br /><span class="small">Centers image vertically. When turned off, the images resize/display from the top of the page.</span>', MMM_FSBI_PLUGIN_TRANSLATE),
																					'the_val' 			=> 		2,
																					'the_type'			=> 		'select',
																					'the_vals'			=> 		array
																												(
																													1		=> __('Yes', MMM_FSBI_PLUGIN_TRANSLATE),
																													2		=> __('No', MMM_FSBI_PLUGIN_TRANSLATE)
																												)
																			);
				$defaults['settings_general_tab2']['min_width'] 		= 	array
																			(
																					'the_title' 		=> 		__('Min Width<br /><span class="small">Minimum width the image is allowed to be. If it is met, the image won&#8217;t size down any further.</span>', MMM_FSBI_PLUGIN_TRANSLATE),
																					'the_val' 			=> 		2,
																					'the_type'			=> 		'text'
																			);
				$defaults['settings_general_tab2']['min_height'] 		= 	array
																			(
																					'the_title' 		=> 		__('Min Height<br /><span class="small">Minimum height the image is allowed to be. If it is met, the image won&#8217;t size down any further.</span>', MMM_FSBI_PLUGIN_TRANSLATE),
																					'the_val' 			=> 		2,
																					'the_type'			=> 		'text'
																			);
				$defaults['settings_general_tab2']['random'] 			= 	array
																			(
																					'the_title' 		=> 		__('Random Slides<br /><span class="small">Slides are shown in a random order. start_slide is disregarded.</span>', MMM_FSBI_PLUGIN_TRANSLATE),
																					'the_val' 			=> 		2,
																					'the_type'			=> 		'select',
																					'the_vals'			=> 		array
																												(
																													1		=> __('Yes', MMM_FSBI_PLUGIN_TRANSLATE),
																													2		=> __('No', MMM_FSBI_PLUGIN_TRANSLATE)
																												)
																			);
				$defaults['settings_general_tab2']['slide_interval'] 	= 	array
																			(
																					'the_title' 		=> 		__('Slides Interval<br /><span class="small">Time between slide changes in milliseconds.</span>', MMM_FSBI_PLUGIN_TRANSLATE),
																					'the_val' 			=> 		5000,
																					'the_type'			=> 		'text'
																			);
				$defaults['settings_general_tab2']['transition'] 		= 	array
																			(
																					'the_title' 		=> 		__('Transition Slides<br /><span class="small">Controls which effect is used to transition between slides.</span>', MMM_FSBI_PLUGIN_TRANSLATE),
																					'the_val' 			=> 		'none',
																					'the_type'			=> 		'select',
																					'the_vals'			=> 		array
																												(
																													"none"				=> __('No transition effect', MMM_FSBI_PLUGIN_TRANSLATE),
																													"fade"				=> __('Fade effect', MMM_FSBI_PLUGIN_TRANSLATE),
																													"slideTop"			=> __('Slide in from top', MMM_FSBI_PLUGIN_TRANSLATE),
																													"slideRight"		=> __('Slide in from right', MMM_FSBI_PLUGIN_TRANSLATE),
																													"slideBottom"		=> __('Slide in from bottom', MMM_FSBI_PLUGIN_TRANSLATE),
																													"slideLeft"			=> __('Slide in from left', MMM_FSBI_PLUGIN_TRANSLATE),
																													"carouselRight"		=> __('Carousel from right to left', MMM_FSBI_PLUGIN_TRANSLATE),
																													"carouselLeft"		=> __('Carousel from left to right', MMM_FSBI_PLUGIN_TRANSLATE)
																												)
																			);
				$defaults['settings_general_tab2']['transition_speed'] 	= 	array
																			(
																					'the_title' 		=> 		__('Transition Speed<br /><span class="small">Speed of transitions in milliseconds.</span>', MMM_FSBI_PLUGIN_TRANSLATE),
																					'the_val' 			=> 		750,
																					'the_type'			=> 		'text'
																			);

			if ($to_return)
			{
				$defaults												= 	$defaults[$to_return];
			}
			if ($return_as == 'vals_only')
			{
				$defaults_new											=	array();
				if (count($defaults) > 0)
				{
					foreach ($defaults as $defaults_key => $defaults_val_array)
					{
						if (isset($defaults_val_array['the_val']))
						{
							$defaults_new[$defaults_key]				= 	$defaults_val_array['the_val'];
						}
					}
				}
				$defaults												= 	$defaults_new;
			}
			return $defaults;
		}
		
	// ---------------------------------------------------------------------------------------------------------------------
	// 	ADD SETTINGS PAGE TO PLUGIN PAGE
	// 	@since									MultiMediaMonster
	// ---------------------------------------------------------------------------------------------------------------------
		
		static function wp_parse_args_multidimensional( &$a, $b )
		{
			$a 														= 	(array) $a;
			$b 														= 	(array) $b;
			$result 												= 	$b;
			foreach($a as $k => &$v)
			{
				if (is_array($v) && isset($result[$k]))
				{
					$result[$k] 									=	self::wp_parse_args_multidimensional($v, $result[$k]);
				}
				else 
				{
					$result[$k]										= 	$v;
				}
			}
			return $result;
		}
		static function strip_empty($array)
		{
			if(is_array($array))
			{
				$array 												= 	array_filter($array);
			}
			if (isset($array) && is_array($array))
			{
				foreach ($array as $key => $value)
				{
					if(is_array($value))
					{
						$value 										= 	array_filter($value);
						$array[$key] 								= 	self::strip_empty($value);
					}
				}
			}
			return ($array);
		}
		static function settings_fields_update()
		{
			if (isset($_POST['reset']) && $_POST['reset'])
			{
				$pages 													= 	mmm_fsbi_settings::settings_pages_tabs();
				foreach( $pages as $pages_id => $pages_name )
				{
                    $tab_counter									= 	1;
					foreach( $pages_name['page_tabs'] as $tab_key => $tab_val)
					{
						if ($tab_counter == 1)
						{
							$option_group								=	$pages_id.'_'.$tab_key;
							if (isset($_POST['option_page']) && $_POST['option_page'] == $option_group)
							{
								delete_option( $option_group );
								add_settings_error(
									MMM_OH_PLUGIN_ID_SHORT.'_settings_resetted',
									esc_attr( 'settings_updated' ),
									__('Settings resetted.', MMM_FSBI_PLUGIN_TRANSLATE),
									'updated'
								);
							}
						}
						$tab_counter++;
					}
				}
			}
		}
		static function settings_fields_init()
		{
			$pages 													= 	mmm_fsbi_settings::settings_pages_tabs();
			foreach( $pages as $pages_id => $pages_name )
			{
				foreach( $pages_name['page_tabs'] as $tab_key => $tab_val)
				{
					register_setting(MMM_FSBI_PLUGIN_ID_SHORT.'_'.$pages_id.'_'.$tab_key, MMM_FSBI_PLUGIN_ID_SHORT.'_'.$pages_id);

					$values_defaults_pp_pt							= 	self::default_values($pages_id.'_'.$tab_key);
					$values_defaults_val_only_pp_pt					= 	self::default_values($pages_id.'_'.$tab_key, 'vals_only');
					
					$values_db_pp_pt								= 	get_option( MMM_FSBI_PLUGIN_ID_SHORT.'_'.$pages_id, $values_defaults_val_only_pp_pt );
					$values_db_pp_pt 								= 	self::strip_empty($values_db_pp_pt);
					$values_combined_pp_pt							= 	self::wp_parse_args_multidimensional( $values_db_pp_pt, $values_defaults_val_only_pp_pt );
					foreach( $values_defaults_pp_pt as $defaults_pp_pt_key => $tab_val)
					{
						$the_type 									=	'';
						$the_title 									=	'';
						$the_val 									=	'';
						$the_vals 									=	'';
						$the_class									= 	'';
						
						if (isset($tab_val['the_type']) && $tab_val['the_type'])												{ $the_type								= 	$tab_val['the_type'];							}
						if (isset($tab_val['the_title']) && $tab_val['the_title'])												{ $the_title							= 	$tab_val['the_title'];							}
						if (isset($values_combined_pp_pt[$defaults_pp_pt_key]) && $values_combined_pp_pt[$defaults_pp_pt_key])	{ $the_val								= 	$values_combined_pp_pt[$defaults_pp_pt_key];	}
						if (isset($tab_val['the_vals']) && $tab_val['the_vals'])												{ $the_vals								= 	$tab_val['the_vals'];							}
						if (isset($tab_val['the_class']) && $tab_val['the_class'])												{ $the_class							= 	$tab_val['the_class'];							}
						
						if ($the_type == 'section')
						{
							add_settings_section(
								MMM_FSBI_PLUGIN_ID_SHORT.'_'.$pages_id.'_'.$tab_key, 
								$the_title, 
								MMM_FSBI_PLUGIN_ID_SHORT.'_settings::section_render', 
								MMM_FSBI_PLUGIN_ID_SHORT.'_'.$pages_id.'_'.$tab_key
							);
						}
						else
						{
							add_settings_field( 
								MMM_FSBI_PLUGIN_ID_SHORT.'_'.$defaults_pp_pt_key, 
								$the_title,
								MMM_FSBI_PLUGIN_ID_SHORT.'_settings::field_render',
								MMM_FSBI_PLUGIN_ID_SHORT.'_'.$pages_id.'_'.$tab_key, 
								MMM_FSBI_PLUGIN_ID_SHORT.'_'.$pages_id.'_'.$tab_key,
								array(
									"the_type" 					=> 	$the_type,
									"the_type_name" 			=> 	$pages_id,
									"label_for" 				=> 	$defaults_pp_pt_key,
									"the_key" 					=> 	$defaults_pp_pt_key,
									"the_val" 					=> 	$the_val,
									"the_vals" 					=> 	$the_vals,
									"the_class" 				=> 	$the_class
								)
							);
						}
					}
				}
			}
		}
		static function section_render($args)
		{
			$main_key_section 		= 	str_replace(MMM_FSBI_PLUGIN_ID_SHORT.'_', '', $args['id']);
			$the_defaults			= 	self::default_values($main_key_section);
			foreach ($the_defaults as $the_defaults_key => $the_defaults_val)
			{
				if ($the_defaults_val['the_type'] == 'section' && $the_defaults_val['the_title'] == $args['title'])
				{
					echo '<div class="tab-help">'.$the_defaults_val['the_text'].'</div>';
				}
			}
		}
		static function field_render($args)
		{
			$field_class			= 	'';
			if (isset($args['the_class']) && $args['the_class'])
			{
				$field_class		= 	' class="'.$args['the_class'].'"';
			}
			if ($args['the_type'] == 'select')
			{
				?>
				<select<?php echo $field_class; ?> name='<?php echo MMM_FSBI_PLUGIN_ID_SHORT.'_'.$args['the_type_name']; ?>[<?php echo $args['the_key']; ?>]'>
					<?php
					foreach ($args['the_vals'] as $val_key => $val_val)
					{
						?>
	                    <option value='<?php echo $val_key; ?>' <?php selected( $args['the_val'], $val_key); ?>><?php echo $val_val; ?></option>
                        <?php
					}
					?>
				</select>
				<?php
			}
			if ($args['the_type'] == 'text')
			{
				?>
                <input<?php echo $field_class; ?> type='text' name='<?php echo MMM_FSBI_PLUGIN_ID_SHORT.'_'.$args['the_type_name']; ?>[<?php echo $args['the_key']; ?>]' value='<?php echo $args['the_val']; ?>'>
                <?php
			}			
		}
}
?>