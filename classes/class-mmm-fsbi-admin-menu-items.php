<?php
class mmm_fsbi_admin_menu_items 
{

	// ---------------------------------------------------------------------------------------------------------------------
	// 	THE ADMIN MENU ITEMS
	// 	@since									MultiMediaMonster
	// ---------------------------------------------------------------------------------------------------------------------
		
		static function add_admin_menu_items ()
		{
			$labels = array(
				'name' 						=> 	MMM_FSBI_PLUGIN_NAME,
				'singular_name' 			=> 	_x('Backgrounds', 'post type singular name', MMM_FSBI_PLUGIN_TRANSLATE),
				'new_item' 					=> 	__('New Background', MMM_FSBI_PLUGIN_TRANSLATE),
				'add_new'					=> 	__('New Background', MMM_FSBI_PLUGIN_TRANSLATE),
				'add_new_item' 				=> 	__('Add New Background', MMM_FSBI_PLUGIN_TRANSLATE),
				'view_item' 				=> 	__('View Background', MMM_FSBI_PLUGIN_TRANSLATE),
				'edit_item' 				=> 	__('Edit Background', MMM_FSBI_PLUGIN_TRANSLATE),
				'search_items' 				=> 	__('Search Backgrounds', MMM_FSBI_PLUGIN_TRANSLATE),
				'not_found' 				=> 	__('No Backgrounds found', MMM_FSBI_PLUGIN_TRANSLATE),
				'not_found_in_trash' 		=> 	__('No Backgrounds found in the trash', MMM_FSBI_PLUGIN_TRANSLATE),
				'parent_item_colon'			=> 	__('Parent Background:', MMM_FSBI_PLUGIN_TRANSLATE)
			);
		
			$args = array(
				'labels' 					=> 	$labels,
				'public'					=> 	true,
				'publicly_queryable'		=> 	true,
				'show_ui' 					=> 	true,
				'singular_label' 			=> 	__('Backgrounds', MMM_FSBI_PLUGIN_TRANSLATE),
				'query_var' 				=> 	true,
				'rewrite' 					=> 	true,
				'capability_type' 			=> 	'post',
				'hierarchical' 				=> 	false,
				'has_archive' 				=> 	false,
				'menu_position' 			=> 	102,
				'supports' 					=> 	array
												(
													'title',
													'thumbnail'
												),
				'menu_icon'					=> 	MMM_FSBI_PLUGIN_URL.'/images/admin/menu-icon.png',
			);
			register_post_type(MMM_FSBI_PLUGIN_ID_SHORT, $args);
		}	
		
	// ---------------------------------------------------------------------------------------------------------------------
	// 	THE ADMIN MENU ITEMS (with changing the first name // FIXME
	// 	@since									MultiMediaMonster
	// ---------------------------------------------------------------------------------------------------------------------

		static function add_admin_menu_subitems ()
		{
			$pages 							= 	mmm_fsbi_settings::settings_pages_tabs();
			foreach( $pages as $pages_id => $pages_name )
			{
				$pages_id_minus 			= 	str_replace('_', '-', $pages_id);
				add_submenu_page('edit.php?post_type='.MMM_FSBI_PLUGIN_ID_SHORT, '', $pages_name['page_title'], 'manage_options', MMM_FSBI_PLUGIN_ID_LONG_MINUS.'-'.$pages_id_minus, 'mmm_fsbi_admin_pages::settings_pages');
			}
			global $submenu;
			if (isset($submenu['edit.php?post_type='.MMM_FSBI_PLUGIN_ID_SHORT]))
			{
				$submenu['edit.php?post_type='.MMM_FSBI_PLUGIN_ID_SHORT][5][0] = __('All backgrounds', MMM_FSBI_PLUGIN_TRANSLATE);
			}
		}
		
	// ---------------------------------------------------------------------------------------------------------------------
	// 	ADD SETTINGS PAGE TO PLUGIN PAGE
	// 	@since									MultiMediaMonster
	// ---------------------------------------------------------------------------------------------------------------------
		
		static function add_plugin_settings_link($actions, $file) 
		{
			if(false !== strpos($file, MMM_FSBI_PLUGIN_ID_LONG_MINUS))
			{
			 	$actions['settings']						= 	'<a href="edit.php?post_type='.MMM_FSBI_PLUGIN_ID_SHORT.'&page='.MMM_FSBI_PLUGIN_ID_LONG_MINUS.'-settings-general">'.__('Settings general', MMM_FSBI_PLUGIN_TRANSLATE).'</a>';
			}
			return $actions; 
		}
}