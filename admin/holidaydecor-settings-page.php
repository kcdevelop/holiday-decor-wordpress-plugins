<?php 
	if( ! defined('ABSPATH') ) { exit; }
	
	function holidaydecor_add_settings_page_callback() {
		if(!current_user_can('manage_options')) return;
?>

		<form action="options.php" method="post">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

			<?php
				//Set Options Group
				settings_fields('manage_options');

				//Set Settings Page
				do_settings_sections('holidaydecor');

				//Add Form Submit Button
				submit_button();
			?>

		</form>

<?php
	}
?>