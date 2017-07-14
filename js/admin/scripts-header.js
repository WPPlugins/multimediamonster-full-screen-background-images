	
	// ---------------------------------------------------------------------------------------------------------------------
	// 	JAVASCRIPT FUNCTIONS
	//	@since									MultiMediaMonster
	/*
		On loading the website ... what should we do?
	*/
	// ---------------------------------------------------------------------------------------------------------------------
		
		// functions
		jQuery( document ).ready(function()
		{
			// admin colorpicker
			function create_colorpicker()
			{
				jQuery('input.colorpicker').wpColorPicker();	
			}
			create_colorpicker();
			// switch tabs
			jQuery(".post-type-mmm_fsbi #contextual-help-link-wrap button").html(jQuery('.copyright-content h4').text());
			jQuery("body").delegate(".wrap.full-screen-background-images .nav-tab","click",function(e)
			{
				var selected_tab_class 						= 	jQuery(this).attr('class');
				// the button class
				jQuery(".nav-tab").each(function(index, element) 
				{
					jQuery(this).removeClass('nav-tab-active');
				});
				jQuery(this).addClass('nav-tab-active');
				// the content class
				jQuery(".nav-tab-content").each(function(index, element) 
				{
					var this_tab_class 						= 	jQuery(this).attr('class');
					if (selected_tab_class.search('active') < 0)
					{
						// remove active class and add active class to the selected
						jQuery(this).removeClass('nav-tab-active-content');
					}
					if (selected_tab_class.replace('nav-tab', 'nav-tab-content') == this_tab_class)
					{
						jQuery(this).addClass('nav-tab-active-content');
					}
				});
			});
			jQuery('.wrap.full-screen-background-images form.reset input#reset').click(function() 
			{
				return confirm(mmm_fsbi_js_variables_array.mmm_fsbi_reset_confirm_question);
			});
		});