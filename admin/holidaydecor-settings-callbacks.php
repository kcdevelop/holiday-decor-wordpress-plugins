<?php 
	if( ! defined('ABSPATH') ) { exit; }
	
	//Display respective section descrition, based on section id
	function holidaydecor_section_detail_callback( $args ) {
		$id = $args["id"];
		$descriptions = array(
			'html_element_section' => '<div class="holiday-decor-descriptions">Please enter the CSS selector of the element/s (e.g. section or #selector or .selector) where you would like the decoration image to appear. If you would like the decoration image to appear on multiple elements please enter a comma after each selector name (e.g. #selector1, .selector2, selector3).<br /> <b>Note: Do not place a comma after the last selector name.</b></div>',
			 'adjust_vertical_position_section' => '<div class="holiday-decor-descriptions">This value alows you to adjust the top position (e.g. 5px or -5px) of the decoration image.</div>',
			 'adjust_z_index_section' => '<div class="holiday-decor-descriptions">This value alows you to adjust the z-index (e.g. 1 or greater) of the decoration image.</div>',
			 'image_selection_section' => '<div class="holiday-decor-descriptions">Select the image to display. <br /> <b>Note: The decoration images will be rendered with a transparent background.</b></div>'
		);

		if($id == 'html_element_section')
			echo $descriptions["html_element_section"];

		if($id == 'adjust_vertical_position_section')
			echo $descriptions["adjust_vertical_position_section"];
		
		if($id == 'adjust_z_index_section')
			echo $descriptions["adjust_z_index_section"];

		if($id == 'image_selection_section')
			echo $descriptions["image_selection_section"];
	}

	//Add input field/s
	function holidaydecor_input_field_callback( $args ) {
		$option = get_option('manage_options');
		$id = isset( $args["id"] ) ? $args["id"] : '';
		$value = isset( $option[$id] ) ? $option[$id] : '';

		echo '<input ';
			foreach ($args as $attr => $attr_value) {
				echo "$attr=\"$attr_value\"";
			}
		echo "name=\"manage_options[$id]\" ";
		echo "value=\"$value\" />";
	}

	//Add select field/s
	function holidaydecor_select_field_callback( $args ) {
		$option = get_option('manage_options');
		$id = isset( $args["id"] ) ? $args["id"] : '';
		$value = isset( $option[$id] ) ? $option[$id] : '';
		$selectStatus;
		$selectedImage;
		$selectedTxt;
		
		foreach ($args['value'] as $num => $field_value) {
			$selectStatus = $value == $field_value ? true : false;
			$selectedImage = $selectStatus ? $field_value : "";
			$selectedTxt = $selectStatus ? $args["display_text"][$num] : "";
			echo $num == 0 ? "<select class=\"deco-select-field\" name=\"manage_options[$id]\">" : "";
			echo "<option ";
			echo $selectStatus ? "selected=\"selected\" " : "";
			echo "value=\"{$field_value}\">";
			echo "{$args["display_text"][$num]}</option>";
			echo $num == (count($args['value']) -1) ? "</select> <img class=\"holiday-decor-preview\" src=\"http://localhost/wp-content/plugins/holidaydecor/public/images/autum-leaves.png\" alt=\"\" />" : "";
		}
	}

	//Add radio button/s
	function holidaydecor_radio_field_callback( $args ) {
		$option = get_option('manage_options');
		$id = isset( $args["id"] ) ? $args["id"] : '';
		$value = isset( $option[$id] ) ? $option[$id] : '';

		echo '<input ';
			foreach ($args as $attr => $attr_value) {
				echo "$attr=\"$attr_value\"";
				echo $value == $attr_value ? "checked=\"checked \"" : "" ;
			}
		echo "name=\"manage_options[$id]\" ";
		echo "value=\"$value\" />";
	}
?>