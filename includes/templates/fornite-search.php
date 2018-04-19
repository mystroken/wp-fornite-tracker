<?php

if (! defined('ABSPATH')) {
    exit;
} // Don't allow direct access?>

<div class='wp-fornite-search-from'>

    <form method="get">
        <label><input type="radio" name="wp_fornite_platform" value="pc"> PC</label>
        <label><input type="radio" name="wp_fornite_platform" value="xbl"> Xbox one </label>
        <label><input type="radio" name="wp_fornite_platform" value="psn"> Play Station</label>
        <br>
        <label>
            <strong>
                <?php _e('Stats Fornite', 'wft'); ?>
            </strong>
            <input type='text' name='wp_fornite_uname' id='wp-fornite-uname-input'>
        </label>

        <input type='submit' value="<?php _e('Afficher', 'wft'); ?>">
    </form>

</div>

<?php

echo do_shortcode('[fornite_tracker_result]');
