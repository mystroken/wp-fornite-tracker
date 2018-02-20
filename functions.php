<?php

/**
 * Locate template to load
 */
if( !function_exists('wft_locate_template') )
{
	/**
	 * @param string $template_name Template to load.
	 * @param string $template_path Path to templates.
	 * @param string $default_path  Default path to template files.
	 * @return string $template     Path to the template file.
	 */
	function wft_locate_template($template_name, $template_path = '', $default_path = '')
	{
		// Set default plugin templates path
		if( !$default_path ) :
			$default_path = plugin_dir_path(__FILE__) . 'includes/templates/'; // Path to the templates folder.
		endif;

		// Search template file in theme folder
		$template = locate_template(array(
			$template_path . $template_name,
			$template_name
		));

		// Get plugins template file if not found into theme.
		if( !$template ) :
			$template = $default_path . $template_name;
		endif;

		return apply_filters('wft_locate_template', $template, $template_name, $template_path, $default_path);
	}
}


/**
 * Include the template
 */
if( !function_exists('wft_get_template') )
{
	/**
	 * @param $template_name
	 * @param array $args
	 * @param string $template_path
	 * @param string $default_path
	 */
	function wft_get_template($template_name, $args = array(), $template_path = '', $default_path = '')
	{
		if( is_array($args) && isset($args) ) :
			extract($args);
		endif;

		$template_file = wft_locate_template($template_name, $template_path, $default_path);

		if( !file_exists($template_file) ):
			_doing_it_wrong(__FUNCTION__, sprintf('<code>%s</code> does not exist.', $template_file), '1.0.0');
		endif;

		include $template_file;
	}
}

function wft_fornite_search_shortcode() {
	return wft_get_template('fornite-search.php');
}
add_shortcode('fornite_search', 'wft_fornite_search_shortcode');
