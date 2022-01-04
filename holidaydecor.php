<?php 
	/*
	Plugin Name: holidaydecor
	Description: This plugin allows you to add holiday decorations to any element/s of your website.
	Version: 1.0
	Author: Kenneth Corbin
	License: Private
	 */
	if( ! defined('ABSPATH') ) { exit; }

	if( is_admin() ) {
		require_once plugin_dir_path(__FILE__) . 'admin/holidaydecor-settings-callbacks.php';
		require_once plugin_dir_path(__FILE__) . 'admin/holidaydecor-admin-menu.php';
		require_once plugin_dir_path(__FILE__) . 'admin/holidaydecor-register-settings.php';
		require_once plugin_dir_path(__FILE__) . 'admin/holidaydecor-settings-page.php';

		//Adds admin styles
		wp_enqueue_style(
			'holidaydecor_main', 
			plugins_url('holidaydecor/admin/css/holidaydecor-admin.css')
		);
		//Adds admin javascript
		wp_enqueue_script(
			'holidaydecor_main', 
			plugins_url('holidaydecor/admin/js/holidaydecor-admin.js')
		);
	}

	if( !is_admin() ) {
		//Adds public styles
		wp_enqueue_style(
			'holidaydecor_main', 
			plugins_url('holidaydecor/public/css/holidaydecor-main.css')
		);
		//Includes embedded javascript
		require plugin_dir_path(__FILE__) . 'includes/scripts.php';
	}
?>

