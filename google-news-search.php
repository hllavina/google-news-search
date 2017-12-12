<?php
/*
Plugin Name: Google News Search
Version: 1.0
Description: Generates a form to enable a user to enter search term and return list of news items from the Google News feed. Add googlenews as shortcode to embed form 
Author: Hattie Llavina
Author URI: http://www.googlenewsplugin.com
Text Domain: google-news-search

*/


if (!defined('THEME_DIR'))
    define('THEME_DIR', ABSPATH . 'wp-content/themes/' . get_template());
 
if (!defined('PLUGIN_NAME'))
    define('PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));
 
if (!defined('PLUGIN_DIR'))
    define('PLUGIN_DIR', WP_PLUGIN_DIR . '/' . PLUGIN_NAME);
 
if (!defined('PLUGIN_URL'))
	define('PLUGIN_URL', WP_PLUGIN_URL . '/' . PLUGIN_NAME);

/* load scripts on page head for js and css. Sets a variable plugin_url to the plugin url for use by client */

add_action('wp_head', 'google_search_news_load_scripts', 0);

function google_search_news_load_scripts() {
  wp_enqueue_style('gns-styles', PLUGIN_URL.'/css/newsForm.css', false, '1.0');
  wp_register_script( 'gns-scripts',PLUGIN_URL . '/js/newsForm.js', array(), '1.0.0', false );
  wp_localize_script( 'gns-scripts', 'GNS',array( 'plugin_url' =>PLUGIN_URL ) ); 
  wp_enqueue_script( 'gns-scripts' );

}
 

/* creates shortcode to insert into pages */  

add_shortcode('googlenews', 'google_news_search_form');

function google_news_search_form($atts) {
  
	$formText =  '<form id="searchnews" name="searchnewsForm">
                <input type="text" id="searchTermText" />
                <input type="button" value="Search" id="searchnewsSubmit" onclick="submitSearch()" />
                <div id="searchOutput">
                </div>
                ';
 return $formText;
}

