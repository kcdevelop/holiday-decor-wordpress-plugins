<?php 
	if( ! defined('ABSPATH') ) { exit; }

	//Add settings sections and fields to admin section
	function holidaydecor_register_settings_callback() {
		add_settings_section(
			'image_selection_section',
			'Image/GIF Decor Section',
			'holidaydecor_section_detail_callback',
			'holidaydecor'
		);

		add_settings_field(
			'image_selection_1',
			'Image Decor',
			'holidaydecor_select_field_callback',
			'holidaydecor',
			'image_selection_section',
			[
				"id" => "image_selection", 
				"display_text" => [
					'Thanksgiving Leaves',
					'Holiday Sting Lights',
					'Holiday Sting Lights (Animated)',
					'Snow Fall',
					'Fourth of July Banner 1',
					'Fourth of July Banner 2',
					'Fireworks Multiple',
					'Labor Day Banner'
				],
				"value"=> [
					plugins_url('holidaydecor/public/images/autum-leaves.png'), 
					plugins_url('holidaydecor/public/images/string-lights.png'), 
					plugins_url('holidaydecor/public/images/string-lights.gif'), 
					plugins_url('holidaydecor/public/images/transparent-snow-animated.gif'),
					plugins_url('holidaydecor/public/images/fourth-banner1.png'),
					plugins_url('holidaydecor/public/images/fourth-banner2.png'),
					plugins_url('holidaydecor/public/images/fireworks-multiple.gif'),
					plugins_url('holidaydecor/public/images/labor-day-banner.png')
				]
			]
		);

		add_settings_section(
			'html_element_section',
			'<hr />HTML Element Section',
			'holidaydecor_section_detail_callback',
			'holidaydecor'
		);

		add_settings_field(
			'element_class',
			'Element Class',
			'holidaydecor_input_field_callback',
			'holidaydecor',
			'html_element_section',
			["id" => "element_class", "type" => "text", "placeholder" => "Enter class or id name"]
		);

		add_settings_section(
			'adjust_vertical_position_section',
			'<hr />Adjust Vertical Position Section',
			'holidaydecor_section_detail_callback',
			'holidaydecor'
		);

		add_settings_field(
			'adjust_vertical_position',
			'Adjust Vertical Position',
			'holidaydecor_input_field_callback',
			'holidaydecor',
			'adjust_vertical_position_section',
			["id" => "adjust_position", "type" => "text", "placeholder" => "Enter number of pixels"]
		);

		add_settings_section(
			'adjust_z_index_section',
			'<hr />Adjust z-index Section',
			'holidaydecor_section_detail_callback',
			'holidaydecor'
		);

		add_settings_field(
			'z_index',
			'Adjust z-index',
			'holidaydecor_input_field_callback',
			'holidaydecor',
			'adjust_z_index_section',
			["id" => "adjust_index", "type" => "text", "placeholder" => "Enter z-index (e.g. -1)"]
		);

		add_settings_section(
			'image_repeat_selection_section',
			'<hr />Image Repeat Slection Section',
			'holidaydecor_section_detail_callback',
			'holidaydecor'
		);

		add_settings_field(
			'image_repeat_selection_1',
			'No Repeat',
			'holidaydecor_radio_field_callback',
			'holidaydecor',
			'image_repeat_selection_section',
			["id" => "image_repeat_selection", "type" => "radio", "value"=> "no-repeat"]
		);

		add_settings_field(
			'image_repeat_selection_2',
			'Repeat',
			'holidaydecor_radio_field_callback',
			'holidaydecor',
			'image_repeat_selection_section',
			["id" => "image_repeat_selection", "type" => "radio", "value"=> "repeat"]
		);

		add_settings_section(
			'image_size_selection_section',
			'<hr />Image Size Slection Section',
			'holidaydecor_section_detail_callback',
			'holidaydecor'
		);

		add_settings_field(
			'image_size_selection_1',
			'Smaller',
			'holidaydecor_radio_field_callback',
			'holidaydecor',
			'image_size_selection_section',
			["id" => "image_size_selection", "type" => "radio", "value"=> "100%"]
		);

		add_settings_field(
			'image_size_selection_2',
			'Larger',
			'holidaydecor_radio_field_callback',
			'holidaydecor',
			'image_size_selection_section',
			["id" => "image_size_selection", "type" => "radio", "value"=> "cover"]
		);

		register_setting(
			'manage_options',
			'manage_options'
		);
	}

	add_action(
		'admin_init', 
		'holidaydecor_register_settings_callback'
	);
?>