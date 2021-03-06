<?php

/**
 * Locate template to load
 */
if (!function_exists('wft_locate_template')) {
    /**
     * @param string $template_name Template to load.
     * @param string $template_path Path to templates.
     * @param string $default_path  Default path to template files.
     * @return string $template     Path to the template file.
     */
    function wft_locate_template($template_name, $template_path = '', $default_path = '')
    {
        // Set default plugin templates path
        if (!$default_path) :
            $default_path = plugin_dir_path(__FILE__) . 'includes/templates/'; // Path to the templates folder.
        endif;

        // Search template file in theme folder
        $template = locate_template([
            $template_path . $template_name,
            $template_name
        ]);

        // Get plugins template file if not found into theme.
        if (!$template) :
            $template = $default_path . $template_name;
        endif;

        return apply_filters('wft_locate_template', $template, $template_name, $template_path, $default_path);
    }
}


/**
 * Include the template
 */
if (!function_exists('wft_get_template')) {
    /**
     * @param $template_name
     * @param array $args
     * @param string $template_path
     * @param string $default_path
     */
    function wft_get_template($template_name, $args = [], $template_path = '', $default_path = '')
    {
        ob_start();

        if (is_array($args) && isset($args)) :
            extract($args);
        endif;

        $template_file = wft_locate_template($template_name, $template_path, $default_path);

        if (!file_exists($template_file)) :
            _doing_it_wrong(__FUNCTION__, sprintf('<code>%s</code> does not exist.', $template_file), '1.0.0');
        endif;


        include $template_file;
        return ob_get_clean();
    }
}

/**
 * Enqueue style & script
 */
function wft_enqueue_script()
{

    // Enqueue stylesheet
    wp_enqueue_style(
        'fornite-tracker',
        plugin_dir_url(__FILE__) . 'assets/css/main.css',
        false
    );

    // Enqueue scripts
    wp_enqueue_script(
        'fornite-tracker-js',
        plugin_dir_url(__FILE__) . 'assets/js/script.js',
        ['jquery'],
        '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'wft_enqueue_script');


/**
 * Shortcode displaying the form
 */
add_shortcode('fornite_tracker_form', 'wft_fornite_search_shortcode');
function wft_fornite_search_shortcode()
{
    $fornite_search_form_code = wft_get_template('fornite-search.php');
    return apply_filters('fornite_tracker_form', $fornite_search_form_code);
}


/**
 * Shortcode displaying the result
 */
add_shortcode('fornite_tracker_result', 'wft_fornite_result_shortcode');
function wft_fornite_result_shortcode()
{
    $fornite_tracker_result_code = '';

    if (!empty($_REQUEST['wp_fornite_platform']) && !empty($_REQUEST['wp_fornite_uname'])) {
        $platform = strip_tags($_REQUEST['wp_fornite_platform']);
        $username = strip_tags($_REQUEST['wp_fornite_uname']);

        $fornite_tracker_result_code = wft_get_template('fornite-tracker.php', [
            'platform' => $platform,
            'username' => $username
        ]);
    }

    return apply_filters('fornite_tracker_result', $fornite_tracker_result_code);
}
