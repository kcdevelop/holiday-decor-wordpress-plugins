<?php 
	if( ! defined('ABSPATH') ) { exit; }

	//Add submenu to admin dashboard
	function holidaydecor_add_admin_menu_callback() {
		add_submenu_page(
			'options-general.php',
			'Holiday Decor',
			'Decorate!',
			'manage_options',
			'holidaydecor',
			'holidaydecor_add_settings_page_callback'
		);
	}
	
	add_action(
		'admin_menu', 
		'holidaydecor_add_admin_menu_callback'
	);
?>