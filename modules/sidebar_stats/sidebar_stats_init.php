<?php header('Content-Type: text/html; charset=utf-8');
	include_once('sidebar_stats_settings.php');

	// tell pligg what pages this module should be included in
	// pages are <script name> minus .php
	$do_not_include_in_pages = array();
	
	$include_in_pages = array('all');
	if( do_we_load_module() ) {		
		if(is_object($main_smarty)){
			$main_smarty->plugins_dir[] = sidebar_stats_plugins_path;

			module_add_action_tpl('tpl_pligg_sidebar2_end', sidebar_stats_tpl_path . 'sidebar_stats.tpl');

		}
	}
?>
