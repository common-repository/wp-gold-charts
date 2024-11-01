<?php
/*
Plugin Name: WP Gold Charts
Plugin URI: http://www.gold.de/wordpress-goldkurs.html
Description: Mit WP Gold Charts lassen sich im Artikel/in der Seite oder alternativ in der Sidebar automatisch aktualisierte Charts von den Edelmetallen Gold und Silber anzeigen. Dabei k&ouml;nnen die W&auml;hrung (Euro oder USD), der Zeitraum (von 24h bis 10 Jahre) und die Gr&ouml;&szlig;e der einzelnen Charts konfiguriert werden. 
Version: 1.0
Author: Gold.de
Author URI: http://www.gold.de/
License: GPL3
*/


global $wp_version;

$exit_msg = 'WP Gold Charts requires Wordpress 2.9 or newer. <a href="http://codex.wordpress.org/Upgrading_Wordpress">Please update!</a>';

if (version_compare($wp_version, "2.9", "<")) {
    exit ($exit_msg);
}
// ===========
// WPGold Class
// ===========
class WPGold extends WP_Widget {
    /**
     * * constructor
     */
    function WPGold()
    {
        parent::WP_Widget(false, $name = 'Gold Charts');
    }

    /**
     * * Widget-Ausgabe
     */
    function widget($args, $instance)
    {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $edelmetall = $instance['gold_edelmetall'];
        $waehrung = $instance['gold_waehrung'];
        $zeitraum = $instance['gold_zeitraum'];

        echo $before_widget;
        if ($title)
            echo $before_title . $title . $after_title;

        include ('wp-gold-widget-output.php');

        echo $after_widget;
    }

    /**
     * * Widget-Update
     */
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['gold_edelmetall'] = $new_instance['gold_edelmetall'];
        $instance['gold_waehrung'] = $new_instance['gold_waehrung'];
        $instance['gold_zeitraum'] = $new_instance['gold_zeitraum'];

        return $instance;
    }

    /**
     * * Widget-Optionen
     */
    function form($instance)
    {
        $defaults = array('title' => 'Goldkurs', 'gold_edelmetall' => 'goldkurs', 'gold_waehrung' => 'euro', 'gold_zeitraum' => '6monate');
        $instance = wp_parse_args((array) $instance, $defaults);
        $title = esc_attr($instance['title']);
        $edelmetall = esc_attr($instance['gold_edelmetall']);
        $waehrung = esc_attr($instance['gold_waehrung']);
        $zeitraum = esc_attr($instance['gold_zeitraum']);

        include ('wp-gold-widget-options.php');
    }
} // class WPGold Class
// register WPGold widget
add_action('widgets_init', create_function('', 'return register_widget("WPGold");'));
add_action('init', 'WPGold_Init');
// ===========
// Plugin Init
// ===========
function WPGold_Init()
{ 
    // add options page
    add_action('admin_menu', 'admin_menu'); 
    // add shortcode handler
    add_shortcode('gold-charts', 'display'); 
    // Backlinkurl setzen
    if (get_option('wp_gold_backlinkurl') == false) {
        $newvalue = rand(1, 3);
        switch ($newvalue) {
            case "1":
                $backlinkurl = "http://www.gold.de/goldbarren.html";
                $backlinktext = "Goldbarren kaufen";
                break;
            case "2":
                $backlinkurl = "http://www.gold.de/";
                $backlinktext = "Gold kaufen";
                break;
            case "3":
                $backlinkurl = "http://www.gold.de/goldmuenzen.html";
                $backlinktext = "Goldm&uuml;nzen g&uuml;nstig kaufen";
                break;
        }
        $deprecated = ' ';
        $autoload = 'no';
        add_option('wp_gold_backlinkurl', $backlinkurl, $deprecated, $autoload);
        add_option('wp_gold_backlinktext', $backlinktext, $deprecated, $autoload);
    }
}
// ===========
// Plugin deinstallation
// ===========
register_deactivation_hook(__FILE__, 'deinstall');

function deinstall()
{
    delete_option('wp_gold_backlinkurl');
    delete_option('wp_gold_backlinktext');
}
// =====================
// hook the options page
// =====================
function admin_menu()
{
    add_options_page('WP Gold Charts Options', 'WP Gold Charts', 8, basename(__FILE__), 'handle_options');
}
// =======================
// handle the options page
// =======================
function handle_options()
{
    include ('wp-gold-content-options.php');
}
// =======================
// Content output
// =======================
function display($params)
{
    $values = shortcode_atts(array
        (
            'edelmetall' => "goldkurs",
            'waehrung' => "euro",
            'zeitraum' => "6monate",
            'groesse' => "b"
            ), $params);

    $edelmetall = $values['edelmetall'];
    $waehrung = $values['waehrung'];
    $zeitraum = $values['zeitraum'];
    $groesse = $values['groesse'];

    include ('wp-gold-content-output.php');
}

?>
