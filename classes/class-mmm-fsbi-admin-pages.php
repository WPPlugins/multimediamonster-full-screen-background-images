<?php
class mmm_fsbi_admin_pages 
{
	// ---------------------------------------------------------------------------------------------------------------------
	// 	THE ADMIN PAGE:::ALL
	// 	@since									MultiMediaMonster
	// ---------------------------------------------------------------------------------------------------------------------
	
		static function settings_pages ()
		{
			global $plugin_page;
			$link							=	get_admin_page_parent();
			$new_plugin_page 				= 	str_replace(MMM_FSBI_PLUGIN_ID_LONG_MINUS.'-', '', $plugin_page);
			$new_plugin_page 				= 	str_replace('-', '_', $new_plugin_page);
			$tabs 							= 	mmm_fsbi_settings::settings_pages_tabs($new_plugin_page);
			?>
			<div class="wrap <?php echo MMM_FSBI_PLUGIN_ID_LONG_MINUS; ?>">
                <h2><?php echo MMM_FSBI_PLUGIN_NAME; ?> &raquo; <?php echo $tabs['page_title']; ?></h2>
				<div class="div-to-table">
					<div class="div-to-row">
						<div class="div-to-cell">
                        	<?php
							settings_errors();
							?>
                            <h2 class="nav-tab-wrapper">
								<?php
                                $tab_counter					= 	1;
                                foreach( $tabs['page_tabs'] as $tab_key => $tab_val)
                                {
                                    $current_tab_class			= 	'';
                                    if ($tab_counter == 1)
                                    {
                                        $current_tab_class		= 	' nav-tab-active';
                                    }
                                    echo '<a href="javascript:void(0);" class="nav-tab'.$current_tab_class.' '.$tab_key.'">'.$tab_val.'</a>';
                                    $tab_counter++;
                                }
	                            ?>
                            </h2>
							<form action='options.php' method='post'>                        
								<div class="nav-tab-wrapper-content">
									<?php
                                    $tab_first									= 	'';
                                    $tab_counter								= 	1;
                                    foreach( $tabs['page_tabs'] as $tab_key => $tab_val)
                                    {
                                        $current_tab_class						= '';
                                        if ($tab_counter == 1)
                                        {
                                            $current_tab_class					= ' nav-tab-active-content';
                                    		$tab_first							= 	$tab_key;
                                        }
										?>
                                        <div class="nav-tab-content<?php echo $current_tab_class; ?> <?php echo $tab_key; ?>">
											<?php
											$find_fields							= 	mmm_fsbi_settings::default_values($new_plugin_page.'_'.$tab_key);
											$fields									=	mmm_fsbi_admin_functions::array_find_element_by(array('textarea', 'text', 'checkbox', 'select'), 'val', $find_fields);
											if (isset($fields) && $fields)
											{
												settings_fields(MMM_FSBI_PLUGIN_ID_SHORT.'_'.$new_plugin_page.'_'.$tab_key);
											}
											do_settings_sections(MMM_FSBI_PLUGIN_ID_SHORT.'_'.$new_plugin_page.'_'.$tab_key);
                                            ?>
                                        </div>
                                        <?php
                                        $tab_counter++;
                                    }
                                    ?>
                                </div>
                                <?php
								submit_button();
								?>
							</form>
							<form action='options.php' method='post' class="reset">
                            	<?php
								settings_fields(MMM_FSBI_PLUGIN_ID_SHORT.'_'.$new_plugin_page.'_'.$tab_first);
								submit_button(__( 'Reset', MMM_FSBI_PLUGIN_TRANSLATE), 'secondary', 'reset' );
								?>
							</form>
						</div>
						<?php mmm_fsbi_copyright::copyright_column(); ?>
					</div>
				</div>
			</div>
			<?php
		}
}