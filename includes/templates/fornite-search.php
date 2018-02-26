<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access ?>

<div class='wp-fornite-search-from'>

	<form method='post'>
		<label><input type="radio" name="wp_fornite_platform" value="pc"> PC</label>
		<label><input type="radio" name="wp_fornite_platform" value="xbl"> Xbox one </label>
		<label><input type="radio" name="wp_fornite_platform" value="psn"> Play Station</label>

		<label>
			<strong>
				<?php _e( 'Stats Fornite', 'wft' ); ?>
			</strong>
			<input type='text' name='wp_fornite_uname' id='wp-fornite-uname-input'>
		</label>

		<input type='submit' value="<?php _e('Afficher', 'wft'); ?>">
	</form>

</div>

<?php
if( !empty($_REQUEST['wp_fornite_platform']) && !empty($_REQUEST['wp_fornite_uname']) ){

	$platform = strip_tags($_REQUEST['wp_fornite_platform']);
	$username = strip_tags($_REQUEST['wp_fornite_uname']);
	include 'fornite-tracker.php';
}
