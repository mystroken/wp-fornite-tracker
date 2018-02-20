<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access ?>

<div class='redeem-gift-card'>

	<form method='post'>
		<label><strong><?php _e( 'Your gift card code', 'wordpress' ); ?></strong>
			<input type='text' name='gift_card' id='gift-card-input'>
		</label>
		<input type='submit'>
	</form>

</div>
