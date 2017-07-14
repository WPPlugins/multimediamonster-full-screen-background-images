<?
class mmm_fsbi_frontend_widget 
{
	static function frontend_init()  // FIXME
	{
		// COMPLETE SETTINS ARRAY
		$values										= 	array();
		$pages 										= 	mmm_fsbi_settings::settings_pages_tabs();
		foreach( $pages as $pages_id => $pages_name )
		{
			foreach( $pages_name['page_tabs'] as $tab_key => $tab_val)
			{
				$values_defaults_pp_pt				= 	mmm_fsbi_settings::default_values($pages_id.'_'.$tab_key);
				$values_defaults_val_only_pp_pt		= 	mmm_fsbi_settings::default_values($pages_id.'_'.$tab_key, 'vals_only');
				$values_db_pp_pt					= 	get_option( MMM_FSBI_PLUGIN_ID_SHORT.'_'.$pages_id, $values_defaults_val_only_pp_pt );
				$values_combined_pp_pt 				= 	wp_parse_args((array) $values_db_pp_pt, $values_defaults_val_only_pp_pt);
				
				foreach( $values_combined_pp_pt as $settings_key => $settings_val)
				{
					$values[$settings_key]			=	$settings_val;
				}
			}
		}
		
		$args 										= 	array
														(
															'post_type' 				=> MMM_FSBI_PLUGIN_ID_SHORT,
															'posts_per_page' 			=> -1,
															'update_post_term_cache' 	=> false, // don't retrieve post terms
															'update_post_meta_cache' 	=> false, // don't retrieve post meta
														);
		$the_query 									= 	new WP_Query($args);
		if ($the_query->have_posts()) :
		?>
        <script type="text/javascript">

			jQuery(function($)
			{
				$.supersized.themeVars =
				 {
					// Internal Variables
					progress_delay		:	false,				// Delay after resize before resuming slideshow
					thumb_page 			: 	false,				// Thumbnail page
					thumb_interval 		: 	false,				// Thumbnail interval
					image_path			: 	"<?php echo MMM_FSBI_PLUGIN_URL; ?>/images/",
																
					// General Elements							
					play_button			:	'#pauseplay',		// Play/Pause button
					next_slide			:	'#nextslide',		// Next slide button
					prev_slide			:	'#prevslide',		// Prev slide button
					next_thumb			:	'#nextthumb',		// Next slide thumb button
					prev_thumb			:	'#prevthumb',		// Prev slide thumb button
					
					slide_caption		:	'#slidecaption',	// Slide caption
					slide_current		:	'.slidenumber',		// Current slide number
					slide_total			:	'.totalslides',		// Total Slides
					slide_list			:	'#slide-list',		// Slide jump list							
					
					thumb_tray			:	'#thumb-tray',		// Thumbnail tray
					thumb_list			:	'#thumb-list',		// Thumbnail list
					thumb_forward		:	'#thumb-forward',	// Cycles forward through thumbnail list
					thumb_back			:	'#thumb-back',		// Cycles backwards through thumbnail list
					tray_arrow			:	'#tray-arrow',		// Thumbnail tray button arrow
					tray_button			:	'#tray-button',		// Thumbnail tray button
					
					progress_bar		:	'#progress-bar'		// Progress bar
																
				 };	
				$.supersized({
					slideshow               :   1,												// Slideshow on/off
					autoplay				:	<?php echo $values['autoplay']; ?>,				// Slideshow starts playing automatically
					start_slide             :   1,												// Start slide (0 is random)
					stop_loop				:	0,												// Pauses slideshow on last slide
					random					: 	<?php echo $values['random']; ?>,				// Randomize slide order (Ignores start slide)
					transition              :   "<?php echo $values['transition']; ?>", 		// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					new_window				:	1,												// Image links open in new window/tab
					pause_hover             :   <?php echo $values['pause_hover']; ?>,			// Pause slideshow on hover
					keyboard_nav            :   <?php echo $values['keyboard_nav']; ?>,			// Keyboard navigation on/off
					performance				:	1,												// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
					image_protect			:	1,												// Disables image dragging and right click with Javascript
					
					// needed ifs
					<?php if ($values['slide_interval']) 		{ ?>slide_interval          :   <?php echo $values['slide_interval']; ?>,<?php } ?>			// Length between transitions
					<?php if ($values['transition_speed']) 		{ ?>transition_speed		:	<?php echo $values['transition_speed']; ?>,<?php } ?>			// Speed of transition
					<?php if ($values['min_width']) 			{ ?>min_width		        :   <?php echo $values['min_width']; ?>,<?php } ?>			// Min width allowed (in pixels)
					<?php if ($values['min_height']) 			{ ?>min_height		        :   <?php echo $values['min_height']; ?>,<?php } ?>				// Min height allowed (in pixels)
										   
					// Size & Position						   
					vertical_center         :   <?php echo $values['vertical_center']; ?>,		// Vertically center background
					horizontal_center       :   <?php echo $values['horizontal_center']; ?>,	// Horizontally center background
					fit_always				:	<?php echo $values['fit_always']; ?>,			// Image will never exceed browser width or height (Ignores min. dimensions)
					fit_portrait         	:   0,												// Portrait images will not exceed browser height
					fit_landscape			:   0,												// Landscape images will not exceed browser width
															   
					// Components							
					slide_links				:	'blank',										// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					thumb_links				:	1,												// Individual thumb links for each slide
					thumbnail_navigation    :   0,												// Thumbnail navigation,
												
					// Theme Options			   
					progress_bar			:	1,												// Timer for each slide							
					mouse_scrub				:	0,
					slides 					:	[<?php 
												$slide_array = array();
												if ($the_query->have_posts()) :
										
													while ($the_query->have_posts()) : $the_query->the_post();	
														if (has_post_thumbnail())
														{
															$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full_screen_background');
															$slide_array[] .= '{image : "' . $image_url[0] .'", title : "' . get_the_title() . '"}';
														}
													endwhile;
												endif;
												echo join(',', $slide_array);
												?>]		
				});
			});
		</script>
        <?php
		wp_reset_query();
		endif;
	}
	static function frontend_footer()
	{
		// COMPLETE SETTINS ARRAY
		$values										= 	array();
		$pages 										= 	mmm_fsbi_settings::settings_pages_tabs();
		foreach( $pages as $pages_id => $pages_name )
		{
			foreach( $pages_name['page_tabs'] as $tab_key => $tab_val)
			{
				$values_defaults_pp_pt				= 	mmm_fsbi_settings::default_values($pages_id.'_'.$tab_key);
				$values_defaults_val_only_pp_pt		= 	mmm_fsbi_settings::default_values($pages_id.'_'.$tab_key, 'vals_only');
				$values_db_pp_pt					= 	get_option( MMM_FSBI_PLUGIN_ID_SHORT.'_'.$pages_id, $values_defaults_val_only_pp_pt );
				$values_combined_pp_pt 				= 	wp_parse_args((array) $values_db_pp_pt, $values_defaults_val_only_pp_pt);
				
				foreach( $values_combined_pp_pt as $settings_key => $settings_val)
				{
					$values[$settings_key]			=	$settings_val;
				}
			}
		}
		$records_found 										= 	mmm_fsbi_frontend_functions::has_records();
		if ($records_found == true && $values['controls'] == 1) :
		?>
		<div id="controls-container" class="controls-container">
			<!--Thumbnail Navigation-->
			<div id="prevthumb"></div>
			<div id="nextthumb"></div>
			
			<!--Arrow Navigation-->
			<a id="prevslide" class="load-item"></a>
			<a id="nextslide" class="load-item"></a>
			
			<div id="thumb-tray" class="load-item">
				<div id="thumb-back"></div>
				<div id="thumb-forward"></div>
			</div>
			
			<!--Time Bar-->
			<div id="progress-back" class="load-item">
				<div id="progress-bar"></div>
			</div>
			
			<!--Control Bar-->
			<div id="controls-wrapper" class="load-item">
				<div id="controls">
					
					<a id="play-button"><img id="pauseplay" src="<?php echo MMM_FSBI_PLUGIN_URL; ?>/images/pause.png"/></a>
				
					<!--Slide counter-->
					<div id="slidecounter">
						<span class="slidenumber"></span> / <span class="totalslides"></span>
					</div>
					
					<!--Slide captions displayed here-->
					<div id="slidecaption"></div>
					
					<!--Thumb Tray button-->
					<a id="tray-button"><img id="tray-arrow" src="<?php echo MMM_FSBI_PLUGIN_URL; ?>/images/button-tray-up.png"/></a>
					
					<!--Navigation-->
					<ul id="slide-list"></ul>
					
				</div>
			</div>
		</div>
		<?
		endif;
	}
}
?>