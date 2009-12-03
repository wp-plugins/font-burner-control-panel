<?php
/* 
Plugin Name: Font Burner
Plugin URI: http://www.fontburner.com/the-font-burner-wordpress-plugin/
Version: v0.7
Author: <a href="http://adrian3.com/">Adrian3</a>
Description: The Font Burner Plugin allows you to easily add <a href="http://fontburner.com/">Font Burner</a> Fonts to your site through Wordpress.

*/  
   
/*
Hacked and Frankensteined into a plugin by Adrian Hanft http://adrian3.com/
*/

/**
* Guess the wp-content and plugin urls/paths
*/
// Pre-2.6 compatibility
if ( ! defined( 'WP_CONTENT_URL' ) )
      define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
      define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
      define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
      define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );


if (!class_exists('fntburnr')) {
    class fntburnr {
        //This is where the class variables go, don't forget to use @var to tell what they're for
        /**
        * @var string The options string name for this plugin
        */
        var $optionsName = 'fntburnr_options';
        
        /**
        * @var string $localizationDomain Domain used for localization
        */
        var $localizationDomain = "fntburnr";
        
        /**
        * @var string $pluginurl The path to this plugin
        */ 
        var $thispluginurl = '';
        /**
        * @var string $pluginurlpath The path to this plugin
        */
        var $thispluginpath = '';
            
        /**
        * @var array $options Stores the options for this plugin
        */
        var $options = array();
        
        //Class Functions
        /**
        * PHP 4 Compatible Constructor
        */
        function fntburnr(){$this->__construct();}
        
        /**
        * PHP 5 Constructor
        */        
        function __construct(){
            //Language Setup
            $locale = get_locale();
            $mo = dirname(__FILE__) . "/languages/" . $this->localizationDomain . "-".$locale.".mo";
            load_textdomain($this->localizationDomain, $mo);

            //"Constants" setup
            $this->thispluginurl = PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)).'/';
            $this->thispluginpath = PLUGIN_PATH . '/' . dirname(plugin_basename(__FILE__)).'/';
            
            //Initialize the options
            //This is REQUIRED to initialize the options when the plugin is loaded!
            $this->getOptions();
            
            //Actions        
            add_action("admin_menu", array(&$this,"admin_menu_link"));
            add_action("wp_head", array(&$this,"fntburnrstart"));
			add_action("wp_head", array(&$this,"addfntburnrh1"));
			add_action("wp_head", array(&$this,"addfntburnrh2"));
			add_action("wp_head", array(&$this,"addfntburnrh3"));
			add_action("wp_head", array(&$this,"addfntburnrh4"));
            add_action("wp_head", array(&$this,"addfntburnrcss"));            
            add_action("wp_head", array(&$this,"fntburnrend"));
            /*
            add_action("wp_head", array(&$this,"add_css"));
            add_action('wp_print_scripts', array(&$this, 'add_js'));
            */
            
            //Filters
            /*
            add_filter('the_content', array(&$this, 'filter_content'), 0);
            */
        }
        
        
        
 function fntburnrstart() {
echo '
<!-- Font Burner -->
<link rel="stylesheet" href="';
	echo get_bloginfo('wpurl'); 
	echo '/wp-content/plugins/font-burner-control-panel/css/fontburner.css" type="text/css" media="screen" />
<link rel="wpurl" href="';
	echo get_bloginfo('wpurl'); 
	echo '/wp-content/plugins/font-burner-control-panel/css/fontburner_print.css" type="text/css" media="print" />
<script src="';
	echo get_bloginfo('wpurl'); 
	echo'/wp-content/plugins/font-burner-control-panel/js/fontburner.js" type="text/javascript"></script>';
}


function addfntburnrh1() {
         if ($this->options['fntburnr_h1_on_off'] == 'on') {
echo '<script type="text/javascript">	var ';
	echo $this->options['fntburnr_h1_font'];
	echo '= { src: \'http://www.fontburner.com/flash/';
	echo $this->options['fntburnr_h1_font'];
	echo '.swf\' };  sIFR.prefetch(';
	echo $this->options['fntburnr_h1_font'];
	echo '); sIFR.delayCSS  = true; sIFR.activate(';
	echo $this->options['fntburnr_h1_font'];
	echo '); sIFR.replace(';
	echo $this->options['fntburnr_h1_font'];
	echo ', { selector: \'h1, ';
	echo $this->options['fntburnr_h1_font'];
	echo ', ';
	echo ' .';
	echo $this->options['fntburnr_h1_font'];
	echo ', #';
	echo $this->options['fntburnr_h1_font'];
	echo '\' , css: [ \'.sIFR-root {text-align:'; 
	echo $this->options['fntburnr_h1_align'];
	echo '; color:#';		
	echo $this->options['fntburnr_h1_color'];
	echo ';}' , ' a {color: #';
	echo $this->options['fntburnr_h1_link_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h1_underline'];
	echo '; font-weight: normal; } ' ,'a:link { color:#';
	echo $this->options['fntburnr_h1_link_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h1_underline'];
	echo '; font-weight: normal; } ' ,'a:hover { color:#';
	echo $this->options['fntburnr_h1_hover_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h1_hover_underline'];
	echo '; font-weight: normal; } ' ,'a:visited { color: #';
	echo $this->options['fntburnr_h1_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h1_underline'];
	echo ' }' , ' em { color: #';
	echo $this->options['fntburnr_h1_color'];
	echo '; font-style: normal; font-weight: normal; } ' , 'strong { color: #';
	echo $this->options['fntburnr_h1_color'];
	echo '; font-style: normal; font-weight: normal; }\' ] , offsetTop: 0, marginBottom: 0, verticalSpacing: 0, wmode: \'transparent\'}); </script>'
; }}

function addfntburnrh2() {
         if ($this->options['fntburnr_h2_on_off'] == 'on') {

	echo '
<script type="text/javascript">	var ';
	echo $this->options['fntburnr_h2_font'];
	echo '= { src: \'http://www.fontburner.com/flash/';
	echo $this->options['fntburnr_h2_font'];
	echo '.swf\' };  sIFR.prefetch(';
	echo $this->options['fntburnr_h2_font'];
	echo '); sIFR.delayCSS  = true; sIFR.activate(';
	echo $this->options['fntburnr_h2_font'];
	echo '); sIFR.replace(';
	echo $this->options['fntburnr_h2_font'];
	echo ', { selector: \'h2, ';
	echo $this->options['fntburnr_h2_font'];
	echo ', ';
	echo ' .';
	echo $this->options['fntburnr_h2_font'];
	echo ', #';
	echo $this->options['fntburnr_h2_font'];
	echo '\' , css: [ \'.sIFR-root {text-align:'; 
	echo $this->options['fntburnr_h2_align'];
	echo '; color:#';		
	echo $this->options['fntburnr_h2_color'];
	echo ';}' , ' a {color: #';
	echo $this->options['fntburnr_h2_link_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h2_underline'];
	echo '; font-weight: normal; } ' ,'a:link { color:#';
	echo $this->options['fntburnr_h2_link_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h2_underline'];
	echo '; font-weight: normal; } ' ,'a:hover { color:#';
	echo $this->options['fntburnr_h2_hover_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h2_hover_underline'];
	echo '; font-weight: normal; } ' ,'a:visited { color: #';
	echo $this->options['fntburnr_h2_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h2_underline'];
	echo ' }' , ' em { color: #';
	echo $this->options['fntburnr_h2_color'];
	echo '; font-style: normal; font-weight: normal; } ' , 'strong { color: #';
	echo $this->options['fntburnr_h2_color'];
	echo '; font-style: normal; font-weight: normal; }\' ] , offsetTop: 0, marginBottom: 0, verticalSpacing: 0, wmode: \'transparent\'}); </script>'
; }}

function addfntburnrh3() {
         if ($this->options['fntburnr_h3_on_off'] == 'on') {

	echo ' 
<script type="text/javascript">	var ';
	echo $this->options['fntburnr_h3_font'];
	echo '= { src: \'http://www.fontburner.com/flash/';
	echo $this->options['fntburnr_h3_font'];
	echo '.swf\' };  sIFR.prefetch(';
	echo $this->options['fntburnr_h3_font'];
	echo '); sIFR.delayCSS  = true; sIFR.activate(';
	echo $this->options['fntburnr_h3_font'];
	echo '); sIFR.replace(';
	echo $this->options['fntburnr_h3_font'];
	echo ', { selector: \'h3, ';
	echo $this->options['fntburnr_h3_font'];
	echo ', ';
	echo ' .';
	echo $this->options['fntburnr_h3_font'];
	echo ', #';
	echo $this->options['fntburnr_h3_font'];
	echo '\' , css: [ \'.sIFR-root {text-align:'; 
	echo $this->options['fntburnr_h3_align'];
	echo '; color:#';		
	echo $this->options['fntburnr_h3_color'];
	echo ';}' , ' a {color: #';
	echo $this->options['fntburnr_h3_link_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h3_underline'];
	echo '; font-weight: normal; } ' ,'a:link { color:#';
	echo $this->options['fntburnr_h3_link_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h3_underline'];
	echo '; font-weight: normal; } ' ,'a:hover { color:#';
	echo $this->options['fntburnr_h3_hover_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h3_hover_underline'];
	echo '; font-weight: normal; } ' ,'a:visited { color: #';
	echo $this->options['fntburnr_h3_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h3_underline'];
	echo ' }' , ' em { color: #';
	echo $this->options['fntburnr_h3_color'];
	echo '; font-style: normal; font-weight: normal; } ' , 'strong { color: #';
	echo $this->options['fntburnr_h3_color'];
	echo '; font-style: normal; font-weight: normal; }\' ] , offsetTop: 0, marginBottom: 0, verticalSpacing: 0, wmode: \'transparent\'}); </script>'
; }}

function addfntburnrh4() {
         if ($this->options['fntburnr_h4_on_off'] == 'on') {

	echo ' 
<script type="text/javascript">	var ';
	echo $this->options['fntburnr_h4_font'];
	echo '= { src: \'http://www.fontburner.com/flash/';
	echo $this->options['fntburnr_h4_font'];
	echo '.swf\' };  sIFR.prefetch(';
	echo $this->options['fntburnr_h4_font'];
	echo '); sIFR.delayCSS  = true; sIFR.activate(';
	echo $this->options['fntburnr_h4_font'];
	echo '); sIFR.replace(';
	echo $this->options['fntburnr_h4_font'];
	echo ', { selector: \'h4, ';
	echo $this->options['fntburnr_h4_font'];
	echo ', ';
	echo ' .';
	echo $this->options['fntburnr_h4_font'];
	echo ', #';
	echo $this->options['fntburnr_h4_font'];
	echo '\' , css: [ \'.sIFR-root {text-align:'; 
	echo $this->options['fntburnr_h4_align'];
	echo '; color:#';		
	echo $this->options['fntburnr_h4_color'];
	echo ';}' , ' a {color: #';
	echo $this->options['fntburnr_h4_link_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h4_underline'];
	echo '; font-weight: normal; } ' ,'a:link { color:#';
	echo $this->options['fntburnr_h4_link_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h4_underline'];
	echo '; font-weight: normal; } ' ,'a:hover { color:#';
	echo $this->options['fntburnr_h4_hover_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h4_hover_underline'];
	echo '; font-weight: normal; } ' ,'a:visited { color: #';
	echo $this->options['fntburnr_h4_color'];
	echo '; text-decoration: ';
	echo $this->options['fntburnr_h4_underline'];
	echo ' }' , ' em { color: #';
	echo $this->options['fntburnr_h4_color'];
	echo '; font-style: normal; font-weight: normal; } ' , 'strong { color: #';
	echo $this->options['fntburnr_h4_color'];
	echo '; font-style: normal; font-weight: normal; }\' ] , offsetTop: 0, marginBottom: 0, verticalSpacing: 0, wmode: \'transparent\'}); </script>'
; }}

function addfntburnrcss() {
         if ($this->options['fntburnr_css_on_off'] == 'on') {
echo '
<!-- Font Burner CSS styling -->
<style type="text/css" media="screen">
';
	echo $this->options['fntburnr_css'];
 	echo '</style>
';
; }}

function fntburnrend() {
echo '<!-- sIFR fonts delivered by www.fontburner.com -->

';
}







       
        /**
        * Retrieves the plugin options from the database.
        * @return array
        */
        function getOptions() {
            //Don't forget to set up the default options
            if (!$theOptions = get_option($this->optionsName)) {
                $theOptions = array(
	
	'fntburnr_h1_on_off'=>'on',
	'fntburnr_h1_font'=>'cuprum',
	'fntburnr_h1_align'=>'left',
	'fntburnr_h1_color'=>'666666',
	'fntburnr_h1_link_color'=>'000000',
	'fntburnr_h1_hover_color'=>'333333',	
	'fntburnr_h1_underline'=>'No Underline',
	'fntburnr_h1_hover_underline'=>'Underline',

	'fntburnr_h2_on_off'=>'on',
	'fntburnr_h2_font'=>'fontin_sans_bold',
	'fntburnr_h2_align'=>'left',
	'fntburnr_h2_color'=>'666666',
	'fntburnr_h2_link_color'=>'000000',
	'fntburnr_h2_hover_color'=>'333333',	
	'fntburnr_h2_underline'=>'No Underline',
	'fntburnr_h2_hover_underline'=>'Underline',

	'fntburnr_h3_on_off'=>'on',
	'fntburnr_h3_font'=>'andron_scriptor_web',
	'fntburnr_h3_align'=>'left',
	'fntburnr_h3_color'=>'666666',
	'fntburnr_h3_link_color'=>'000000',
	'fntburnr_h3_hover_color'=>'333333',	
	'fntburnr_h3_underline'=>'No Underline',
	'fntburnr_h3_hover_underline'=>'Underline',

	'fntburnr_h4_on_off'=>'on',
	'fntburnr_h4_font'=>'museo_300',
	'fntburnr_h4_align'=>'left',
	'fntburnr_h4_color'=>'666666',
	'fntburnr_h4_link_color'=>'000000',
	'fntburnr_h4_hover_color'=>'333333',	
	'fntburnr_h4_underline'=>'No Underline',
	'fntburnr_h4_hover_underline'=>'Underline',

	'fntburnr_css'=>'line-height: 1.2em;
	  font-size: 16px;
	}
.sIFR-active h2 {
	  line-height: 1.2em;
	  font-size: 15px;
	}
.sIFR-active h3 {
	  line-height: 1.2em;
	  font-size: 14px;
	}
.sIFR-active h4 {
	  line-height: 1.2em;
	  font-size: 13px;'


			);
                update_option($this->optionsName, $theOptions);
            }
            $this->options = $theOptions;
            
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            //There is no return here, because you should use the $this->options variable!!!
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        }
        /**
        * Saves the admin options to the database.
        */
        function saveAdminOptions(){
            return update_option($this->optionsName, $this->options);
        }
        
        /**
        * @desc Adds the options subpanel
        */
        function admin_menu_link() {
            //If you change this from add_options_page, MAKE SURE you change the filter_plugin_actions function (below) to
            //reflect the page filename (ie - options-general.php) of the page your plugin is under!
            add_options_page('Font Burner', 'Font Burner', 10, basename(__FILE__), array(&$this,'admin_options_page'));
            add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array(&$this, 'filter_plugin_actions'), 10, 2 );
        }
        
        /**
        * @desc Adds the Settings link to the plugin activate/deactivate page
        */
        function filter_plugin_actions($links, $file) {
           //If your plugin is under a different top-level menu than Settiongs (IE - you changed the function above to something other than add_options_page)
           //Then you're going to want to change options-general.php below to the name of your top-level page
           $settings_link = '<a href="options-general.php?page=' . basename(__FILE__) . '">' . __('Settings') . '</a>';
           array_unshift( $links, $settings_link ); // before other links

           return $links;
        }
        
        /**
        * Adds settings/options page
        */
        function admin_options_page() { 
            if($_POST['fntburnr_save']){
                if (! wp_verify_nonce($_POST['_wpnonce'], 'fntburnr-update-options') ) die('Whoops! There was a problem with the data you posted. Please go back and try again.'); 

$this->options['fntburnr_h1_on_off'] = $_POST['fntburnr_h1_on_off'];
$this->options['fntburnr_h1_font'] = $_POST['fntburnr_h1_font'];
$this->options['fntburnr_h1_align'] = $_POST['fntburnr_h1_align'];
$this->options['fntburnr_h1_color'] = $_POST['fntburnr_h1_color'];
$this->options['fntburnr_h1_link_color'] = $_POST['fntburnr_h1_link_color'];
$this->options['fntburnr_h1_hover_color'] = $_POST['fntburnr_h1_hover_color'];
$this->options['fntburnr_h1_underline'] = $_POST['fntburnr_h1_underline'];
$this->options['fntburnr_h1_hover_underline'] = $_POST['fntburnr_h1_hover_underline'];

$this->options['fntburnr_h2_on_off'] = $_POST['fntburnr_h2_on_off'];
$this->options['fntburnr_h2_font'] = $_POST['fntburnr_h2_font'];
$this->options['fntburnr_h2_align'] = $_POST['fntburnr_h2_align'];
$this->options['fntburnr_h2_color'] = $_POST['fntburnr_h2_color'];
$this->options['fntburnr_h2_link_color'] = $_POST['fntburnr_h2_link_color'];
$this->options['fntburnr_h2_hover_color'] = $_POST['fntburnr_h2_hover_color'];
$this->options['fntburnr_h2_underline'] = $_POST['fntburnr_h2_underline'];
$this->options['fntburnr_h2_hover_underline'] = $_POST['fntburnr_h2_hover_underline'];

$this->options['fntburnr_h3_on_off'] = $_POST['fntburnr_h3_on_off'];
$this->options['fntburnr_h3_font'] = $_POST['fntburnr_h3_font'];
$this->options['fntburnr_h3_align'] = $_POST['fntburnr_h3_align'];
$this->options['fntburnr_h3_color'] = $_POST['fntburnr_h3_color'];
$this->options['fntburnr_h3_link_color'] = $_POST['fntburnr_h3_link_color'];
$this->options['fntburnr_h3_hover_color'] = $_POST['fntburnr_h3_hover_color'];
$this->options['fntburnr_h3_underline'] = $_POST['fntburnr_h3_underline'];
$this->options['fntburnr_h3_hover_underline'] = $_POST['fntburnr_h3_hover_underline'];

$this->options['fntburnr_h4_on_off'] = $_POST['fntburnr_h4_on_off'];
$this->options['fntburnr_h4_font'] = $_POST['fntburnr_h4_font'];
$this->options['fntburnr_h4_align'] = $_POST['fntburnr_h4_align'];
$this->options['fntburnr_h4_color'] = $_POST['fntburnr_h4_color'];
$this->options['fntburnr_h4_link_color'] = $_POST['fntburnr_h4_link_color'];
$this->options['fntburnr_h4_hover_color'] = $_POST['fntburnr_h4_hover_color'];
$this->options['fntburnr_h4_underline'] = $_POST['fntburnr_h4_underline'];
$this->options['fntburnr_h4_hover_underline'] = $_POST['fntburnr_h4_hover_underline'];

$this->options['fntburnr_css_on_off'] = $_POST['fntburnr_css_on_off'];
$this->options['fntburnr_css'] = $_POST['fntburnr_css'];
                                        
                                        
                $this->saveAdminOptions();
                
                echo '<div class="updated"><p>Success! Your changes were sucessfully saved!</p></div>';
            }
?>                                   
                <div class="wrap">
<h1>Font Burner Control Panel</h1>
<p><a href="http://www.fontburner.com/"><img src="http://www.fontburner.com/images/font_burner_badge4.gif" width="300" height="50" vspace="25" align ="right" /></a>This control panel gives you the ability to control how your Font Burner fonts are displayed. For more information about this plugin, please visit the <a href="http://www.fontburner.com/the-font-burner-wordpress-plugin/" title="Font Burner plugin page">Font Burner plugin page</a>. Please <a href="http://www.fontburner.com/forum/" title="visit the Font Burner Forum">visit the Font Burner forum</a> with any bugs, suggestions, or questions. Thanks for using Font Burner, and I hope you like this plugin. <a href="http://adrian3.com/" title="-Adrian 3">-Adrian3</a></p>
<hr><br /><br />
<h2>Customize your Font Burner settings:</h2>
                <form method="post" id="fntburnr_options">
                <?php wp_nonce_field('fntburnr-update-options'); ?>

<h2>H1 Customization</h2>
                <p>
                  <?php _e('Headline 1 (h1) On/Off<sup>1</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h1_on_off" id="fntburnr_h1_on_off">
                  <option selected="selected"><?php echo $this->options['fntburnr_h1_on_off'] ;?></option>
                  <option>on</option>
                  <option>off</option>
                 </select>
                </p><hr />



                <p>
                <?php _e('Specify Font:<sup>3</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h1_font" cols="25" rows="1" id="fntburnr_h1_font"><?php echo $this->options['fntburnr_h1_font'] ;?></textarea>
                </p><hr />

                <p>
                  <?php _e('H1 Alignment<sup>2</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h1_align" id="fntburnr_h1_align">
                  <option selected="selected"><?php echo $this->options['fntburnr_h1_align'] ;?></option>
                  <option>left</option>
                  <option>center</option>
                  <option>right</option>
                 </select>
                </p><hr />

                <p>
                <?php _e('Font Color:<sup>4</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h1_color" cols="25" rows="1" id="fntburnr_h1_color"><?php echo $this->options['fntburnr_h1_color'] ;?></textarea>
                </p><hr />


                <p>
                <?php _e('Link Color:<sup>4</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h1_link_color" cols="25" rows="1" id="fntburnr_h1_link_color"><?php echo $this->options['fntburnr_h1_link_color'] ;?></textarea>
                </p><hr />


                <p>
                <?php _e('Link Hover Color:<sup>4</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h1_hover_color" cols="25" rows="1" id="fntburnr_h1_hover_color"><?php echo $this->options['fntburnr_h1_hover_color'] ;?></textarea>
                </p><hr />


                <p>
                  <?php _e('H1 Link Underline<sup>5</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h1_underline" id="fntburnr_h1_underline">
                  <option selected="selected"><?php echo $this->options['fntburnr_h1_underline'] ;?></option>
                  <option>Underline</option>
                  <option>No Underline</option>
                 </select>
                </p><hr />


                <p>
                  <?php _e('H1 Hover Underline<sup>5</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h1_hover_underline" id="fntburnr_h1_hover_underline">
                  <option selected="selected"><?php echo $this->options['fntburnr_h1_hover_underline'] ;?></option>
                  <option>Underline</option>
                  <option>No Underline</option>
                 </select>
                </p><hr />

<p><input type="submit" name="fntburnr_save" value="Save" /></p>

<h2>H2 Customization</h2>
                <p>
                  <?php _e('Headline 2 (h2) On/Off<sup>1</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h2_on_off" id="fntburnr_h2_on_off">
                  <option selected="selected"><?php echo $this->options['fntburnr_h2_on_off'] ;?></option>
                  <option>on</option>
                  <option>off</option>
                 </select>
                </p><hr />


                <p>
                <?php _e('Specify Font:<sup>3</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h2_font" cols="25" rows="1" id="fntburnr_h2_font"><?php echo $this->options['fntburnr_h2_font'] ;?></textarea>
                </p><hr />



                <p>
                  <?php _e('h2 Alignment<sup>2</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h2_align" id="fntburnr_h2_align">
                  <option selected="selected"><?php echo $this->options['fntburnr_h2_align'] ;?></option>
                  <option>left</option>
                  <option>center</option>
                  <option>right</option>
                 </select>
                </p><hr />

                <p>
                <?php _e('Font Color:<sup>4</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h2_color" cols="25" rows="1" id="fntburnr_h2_color"><?php echo $this->options['fntburnr_h2_color'] ;?></textarea>
                </p><hr />


                <p>
                <?php _e('Link Color:<sup>4</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h2_link_color" cols="25" rows="1" id="fntburnr_h2_link_color"><?php echo $this->options['fntburnr_h2_link_color'] ;?></textarea>
                </p><hr />


                <p>
                <?php _e('Link Hover Color:<sup>4</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h2_hover_color" cols="25" rows="1" id="fntburnr_h2_hover_color"><?php echo $this->options['fntburnr_h2_hover_color'] ;?></textarea>
                </p><hr />


                <p>
                  <?php _e('h2 Link Underline<sup>5</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h2_underline" id="fntburnr_h2_underline">
                  <option selected="selected"><?php echo $this->options['fntburnr_h2_underline'] ;?></option>
                  <option>Underline</option>
                  <option>No Underline</option>
                 </select>
                </p><hr />


                <p>
                  <?php _e('h2 Hover Underline<sup>5</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h2_hover_underline" id="fntburnr_h2_hover_underline">
                  <option selected="selected"><?php echo $this->options['fntburnr_h2_hover_underline'] ;?></option>
                  <option>Underline</option>
                  <option>No Underline</option>
                 </select>
                </p><hr />


<p><input type="submit" name="fntburnr_save" value="Save" /></p>

<h2>H3 Customization</h2>
                <p>
                  <?php _e('Headline 3 (h3) On/Off<sup>1</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h3_on_off" id="fntburnr_h3_on_off">
                  <option selected="selected"><?php echo $this->options['fntburnr_h3_on_off'] ;?></option>
                  <option>on</option>
                  <option>off</option>
                 </select>
                </p><hr />


                <p>
                <?php _e('Specify Font:<sup>3</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h3_font" cols="25" rows="1" id="fntburnr_h3_font"><?php echo $this->options['fntburnr_h3_font'] ;?></textarea>
                </p><hr />


                <p>
                  <?php _e('h3 Alignment<sup>2</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h3_align" id="fntburnr_h3_align">
                  <option selected="selected"><?php echo $this->options['fntburnr_h3_align'] ;?></option>
                  <option>left</option>
                  <option>center</option>
                  <option>right</option>
                 </select>
                </p><hr />


                <p>
                <?php _e('Font Color:<sup>4</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h3_color" cols="25" rows="1" id="fntburnr_h3_color"><?php echo $this->options['fntburnr_h3_color'] ;?></textarea>
                </p><hr />


                <p>
                <?php _e('Link Color:<sup>4</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h3_link_color" cols="25" rows="1" id="fntburnr_h3_link_color"><?php echo $this->options['fntburnr_h3_link_color'] ;?></textarea>
                </p><hr />


                <p>
                <?php _e('Link Hover Color:<sup>4</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h3_hover_color" cols="25" rows="1" id="fntburnr_h3_hover_color"><?php echo $this->options['fntburnr_h3_hover_color'] ;?></textarea>
                </p><hr />


                <p>
                  <?php _e('h3 Link Underline<sup>5</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h3_underline" id="fntburnr_h3_underline">
                  <option selected="selected"><?php echo $this->options['fntburnr_h3_underline'] ;?></option>
                  <option>Underline</option>
                  <option>No Underline</option>
                 </select>
                </p><hr />


                <p>
                  <?php _e('h3 Hover Underline<sup>5</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h3_hover_underline" id="fntburnr_h3_hover_underline">
                  <option selected="selected"><?php echo $this->options['fntburnr_h3_hover_underline'] ;?></option>
                  <option>Underline</option>
                  <option>No Underline</option>
                 </select>
                </p><hr />

<p><input type="submit" name="fntburnr_save" value="Save" /></p>

<h2>H4 Customization</h2>
                <p>
                  <?php _e('Headline 4 (h4) On/Off<sup>1</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h4_on_off" id="fntburnr_h4_on_off">
                  <option selected="selected"><?php echo $this->options['fntburnr_h4_on_off'] ;?></option>
                  <option>on</option>
                  <option>off</option>
                 </select>
                </p><hr />


                <p>
                <?php _e('Specify Font:<sup>3</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h4_font" cols="25" rows="1" id="fntburnr_h4_font"><?php echo $this->options['fntburnr_h4_font'] ;?></textarea>
                </p><hr />



                <p>
                  <?php _e('h4 Alignment<sup>2</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h4_align" id="fntburnr_h4_align">
                  <option selected="selected"><?php echo $this->options['fntburnr_h4_align'] ;?></option>
                  <option>left</option>
                  <option>center</option>
                  <option>right</option>
                 </select>
                </p><hr />


                <p>
                <?php _e('Font Color:<sup>4</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h4_color" cols="25" rows="1" id="fntburnr_h4_color"><?php echo $this->options['fntburnr_h4_color'] ;?></textarea>
                </p><hr />


                <p>
                <?php _e('Link Color:<sup>4</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h4_link_color" cols="25" rows="1" id="fntburnr_h4_link_color"><?php echo $this->options['fntburnr_h4_link_color'] ;?></textarea>
                </p><hr />


                <p>
                <?php _e('Link Hover Color:<sup>4</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_h4_hover_color" cols="25" rows="1" id="fntburnr_h4_hover_color"><?php echo $this->options['fntburnr_h4_hover_color'] ;?></textarea>
                </p><hr />


                <p>
                  <?php _e('h4 Link Underline<sup>5</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h4_underline" id="fntburnr_h4_underline">
                  <option selected="selected"><?php echo $this->options['fntburnr_h4_underline'] ;?></option>
                  <option>Underline</option>
                  <option>No Underline</option>
                 </select>
                </p><hr />


                <p>
                  <?php _e('h4 Hover Underline<sup>5</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_h4_hover_underline" id="fntburnr_h4_hover_underline">
                  <option selected="selected"><?php echo $this->options['fntburnr_h4_hover_underline'] ;?></option>
                  <option>Underline</option>
                  <option>No Underline</option>
                 </select>
                </p><hr />

<p><input type="submit" name="fntburnr_save" value="Save" /></p>

<h2>CSS Customization</h2>
                <p>
                  <?php _e('Custom CSS On/Off<sup>6</sup>:', $this->localizationDomain); ?>
                  <select name="fntburnr_css_on_off" id="fntburnr_css_on_off">
                  <option selected="selected"><?php echo $this->options['fntburnr_css_on_off'] ;?></option>
                  <option>on</option>
                  <option>off</option>
                 </select>
                </p><hr />

				<p>
                <?php _e('Custom CSS*:<sup>6</sup>', $this->localizationDomain); ?>
                <textarea name="fntburnr_css" cols="45" rows="10" id="fntburnr_css"><?php echo $this->options['fntburnr_css'] ;?></textarea>
        		</p>

<p><input type="submit" name="fntburnr_save" value="Save" /></p>

<h1>Help</h1>
<h2>1. Turn On/Off</h2>
<p>If you do not want to use Font Burner on some of your headlines this is where you can turn it off. This can be handy if you only want to use Font Burner on certain H tags. To turn Font Burner off for a certain Headline select "off" from this dropdown. </p>
<h2>2. Specify Font</h2>
<p>This box is where you will enter the font name that you would like to change your headlines to. You MUST choose a font that is available from <a href="http://www.fontburner.com/fonts/" title="Font Burner">Font Burner</a>. The Font Burner Website has over 1000 fonts that you can use on your website for free. When you find a font on Font Burner that you would like to use look at the bottom of the page where it says "Wordpress plugin code" and enter this code in the box above. This code will always be lowercase and will never contain spaces. A typical font code will look like "bitstream_vera_sans_mono_bold".</p>

<h2>3. Alignment</h2>
<p>This option allows you to change the alignment to right, left, or center.</p>
<h2>4. Link Underline Settings</h2>
<p>This is an easy one. If you want your links to be underlined simply check the "underline" checkbox. If you don't want links to be underlined check "none." The second box sets the "hover" color. That means that when the mouse is over the link you can set whether there is an underline or not.</p>

<h2>5. Font Color</h2>
<p>This box is where you enter the color that you would like your headlines to be. This is a six digit hexadecimal number. For example, "ffffff" is white and "000000" is black. A google search can help you figure out how hexadecimal colors work if you are unfamiliar with them. You do not need to enter a "#" before this number. The "Link Color"" allows you to have your links be a different color than the "normal" headline. The "Link Hover Color" specifies the color that the links will be when the mouse rolls over them.</p>
<h2>6. CSS Customization</h2>
<p>Certain Font Burner Fonts need to be fine-tuned and this is where you will do it. The CSS options here are for line-height and font-size. By default, This box contains: </p>
<p>.sIFR-active h1 {<br />
line-height: 1.2em;<br />
font-size: 16px;<br />
}<br />
.sIFR-active h2 {<br />
line-height: 1.2em;<br />
font-size: 15px;<br />
}<br />
.sIFR-active h3 {<br />
line-height: 1.2em;<br />
font-size: 14px;<br />
}<br />
.sIFR-active h4 {<br />
line-height: 1.2em;<br />
font-size: 13px;<br />
}</p>
<p>Use that as a starting point and adjust accordingly.</p>

<h2>Save Button</h2>
The "save" button will save your settings. Any time you make a change remember to click "Save."

                        <tr>
                            <th colspan=2><input type="submit" name="fntburnr_save" value="Save" /></th>
                        </tr>
                    </table>
                </form>


<?php
        }

  } //End Class
} //End if class exists statement

//instantiate the class
if (class_exists('fntburnr')) {
    $fntburnr_var = new fntburnr();
}
?>