<?php
/**
 * Pico Configuration
 *
 *  This is the configuration file for Pico. It comes loaded with the
 *  default values, which can be found in the get_config() method of
 *  the Pico class (lib/pico.php).
 *
 * @author Gilbert Pellegrom
 * @link http://picocms.org
 * @license http://opensource.org/licenses/MIT
 * @version 0.9
 *
 * To override any of the default settings below, uncomment the line,
 * make and save the changes, then rename this file to `config.php`
 */

/*
 * BASIC
 */
$config['site_title'] = 'botwiki.org';              // Site title
// $config['base_url'] = '';                    // Override base URL (e.g. http://example.com)

/*
 * THEME
 */
$config['theme'] = 'botwiki';                // Set the theme (defaults to "default")
$config['twig_config'] = array(              // Twig settings
	'cache' => false,	                        // To enable Twig caching change this to CACHE_DIR
	'autoescape' => false,                      // Autoescape Twig vars
	'debug' => false                            // Enable Twig debug
);

/*
 * CONTENT
 */
// $config['date_format'] = '%D %T';             // Set the PHP date format as described here: http://php.net/manual/en/function.strftime.php
$config['pages_order_by'] = 'date';           // Order pages by "alpha" or "date"
$config['pages_order'] = 'desc';                // Order pages "asc" or "desc"
// $config['excerpt_length'] = 50;                // The pages excerpt length (in words)
$config['content_dir'] = 'content/';    // Content directory
$config['ptags_template'] = 'index';

$config['custom_meta_values'] = array(
  'nav' => 'Nav'
);

/*
 * TIMEZONE
 */
date_default_timezone_set('America/New_York');              // Timezone may be reqired by your php install

/*
 * CUSTOM
 */
// $config['custom_setting'] = 'Hello';           // Can be accessed by {{ config.custom_setting }} in a theme

// Keep this line
return $config;