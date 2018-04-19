## WP Fornite Tracker



Two shortcodes are created:

- ```[fornite_tracker_form]``` : This shortcode generates the output of the form. This output can be customized through a filter (add a filter to the following hook ```fornite_tracker_form```)
- ```[fornite_tracker_result]```: This shortcode generates the output of the result.

When customizing the ouptut of the form, you have to ensure that globals variables ```$_REQUEST['wp_fornite_platform']``` and ```$_REQUEST['wp_fornite_uname']``` are generated on your result page else the result with display nothing.
