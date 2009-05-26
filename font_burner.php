<?php
/* 
Plugin Name: Font Burner
Plugin URI: http://www.fontburner.com/the-font-burner-wordpress-plugin/
Version: v0.3
Author: <a href="http://adrian3.com/">Adrian3</a>
Description: The Font Burner Plugin allows you to easily add <a href="http://fontburner.com/">Font Burner</a> Fonts to your site through Wordpress.

*/


//Original Framework http://theundersigned.net/2006/06/wordpress-how-to-theme-options/ 
//Updated and added additional options by Jeremy Clark http://clarktech.no-ip.com/
//Hacked and Frankensteined into a plugin by Adrian Hanft http://adrian3.com/

$fontburner_themename = "Font Burner";
$fontburner_shortname = "fontburner";
$fontburner_options = array (
    array(  "name" => "Do you want links to be underlined?",
            "id" => $fontburner_shortname."_underline",
            "type" => "radio",
            "std" => "none",
            "options" => array("underline", "none")),

	array(  "name" => "Font Burner Code: <br />(found at fontburner.com)",
		            "id" => $fontburner_shortname."_font",
		            "std" => "fontin_sans_bold",
		            "type" => "text"),

    array(  "name" => "Font Color:<br />(hexadecimal without the \"#\")",
            "id" => $fontburner_shortname."_color",
            "std" => "000000",
            "type" => "text"),

    array(  "name" => "Font Size: <br />
(line-height and font-size<br />
only. If you mess this up,<br />
click \"reset\" below.<br />
to restore defaults.)",
		            "id" => $fontburner_shortname."_css",
		            "std" => ".sIFR-active h1 {
	  line-height: 1.4em;
	  font-size: 24px;
	}
.sIFR-active h2 {
	  line-height: 1.3em;
	  font-size: 18px;
	}
.sIFR-active h3 {
	  line-height: 1.2em;
	  font-size: 14px;
	}
.sIFR-active h4 {
	  line-height: 1.2em;
	  font-size: 13px;
	}",
		            "type" => "textarea"),
  
    array(  "name" => "Turn off h1:",
            "id" => $fontburner_shortname."_h1",
            "type" => "select",
            "std" => "h1",
            "options" => array("h1", "off")),
    array(  "name" => "Turn off h2:",
            "id" => $fontburner_shortname."_h2",
            "type" => "select",
            "std" => "h2",
            "options" => array("h2", "off")),
    array(  "name" => "Turn off h3:",
            "id" => $fontburner_shortname."_h3",
            "type" => "select",
            "std" => "h3",
            "options" => array("h3", "off")),
    array(  "name" => "Turn off h4:",
            "id" => $fontburner_shortname."_h4",
            "type" => "select",
            "std" => "off",
            "options" => array("h4", "off"))
);

function myfontburner_add_admin() {

    global $fontburner_themename, $fontburner_shortname, $fontburner_options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($fontburner_options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($fontburner_options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: options-general.php?page=font_burner.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($fontburner_options as $value) {
                delete_option( $value['id'] ); 
                update_option( $value['id'], $value['std'] );}

            header("Location: options-general.php?page=font_burner.php&reset=true");
            die;

        }
    }

add_options_page($fontburner_themename." Options", "Font Burner", 'edit_themes', basename(__FILE__), 'myfontburner_admin');

}


function addFontburner() {
	global $fontburner_options;
	foreach ($fontburner_options as $value) {
	    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } 
	      else { $$value['id'] = get_settings( $value['id'] ); } 
	}
	echo '<!-- Font Burner -->
	<link rel="stylesheet" href="';
	echo get_bloginfo('wpurl'); 
	echo '/wp-content/plugins/font-burner-control-panel/css/fontburner.css" type="text/css" media="screen" />
	<link rel="wpurl" href="';
	echo get_bloginfo('stylesheet_directory'); 
	echo '/wp-content/plugins/font-burner-control-panel/css/fontburner_print.css" type="text/css" media="print" />
	<script src="';
	echo get_bloginfo('wpurl'); 
	echo'/wp-content/plugins/font-burner-control-panel/js/fontburner.js" type="text/javascript"></script> 

<script type="text/javascript">
	var ';
	
	echo $fontburner_font;
	echo '= {
    src: \'http://www.fontburner.com/flash/';
	echo $fontburner_font;
	echo '.swf\'
  };
  sIFR.prefetch(';
	echo $fontburner_font;
	echo ');
	  sIFR.delayCSS  = true;
	  sIFR.activate(';
	echo $fontburner_font;
	echo
	  '); 
	sIFR.replace(';
	echo $fontburner_font;
	echo ', {
	    selector: \'';
		echo $fontburner_h1;
		echo ', ';
		echo $fontburner_h2;
		echo ', ';
		echo $fontburner_h3;
		echo ', ';
		echo $fontburner_h4;
		echo ', ';
		echo '  .';
	echo $fontburner_font;
	echo ', #';
	echo $fontburner_font;
	echo '\'
	    ,css: [
	      \'.sIFR-root {color:#';
	echo $fontburner_color;
	echo '	;}'
	      ,'a {color:#';
	echo $fontburner_color;
	echo '	; text-decoration: ';
	echo $fontburner_underline;
	echo '; font-weight:normal; }'
	      ,'a:link {color:#';
	echo $fontburner_color;
	echo '	; text-decoration: ';
	echo $fontburner_underline;
	echo '; font-weight:normal; }'
	      ,'a:hover {color:#';
	echo $fontburner_color;
	echo '	; text-decoration: ';
	echo $fontburner_underline;
	echo '; font-weight:normal; }'
	      ,'a:visited { color: #';
	echo $fontburner_color;
	echo '	; text-decoration: ';
	echo $fontburner_underline;
	echo ' }'
	      ,'em { color: #';
	echo $fontburner_color;
	echo '	; font-style:normal; font-weight:normal; }'
	      ,'strong { color: #';
	echo $fontburner_color;
	echo '	; font-weight:normal; font-style:normal; }\'
	    ]

	    ,offsetTop:0
	    ,marginBottom: 0
	   	,verticalSpacing: 0
	    ,wmode: \'transparent\'

	  });
	</script>
<!-- sIFR fonts delivered by www.fontburner.com -->
<!-- Header styling -->
<style type="text/css" media="screen">';
echo $fontburner_css;
	echo '
	.sIFR-active 	';
		echo $fontburner_h1;
		echo ', .sIFR-active ';
		echo $fontburner_h2;
		echo ', .sIFR-active ';
		echo $fontburner_h3;
		echo ', .sIFR-active ';
		echo $fontburner_h4;
		echo ' {
		  visibility: hidden;
		  font-family: Verdana;
		}
	
	
	</style>

	';
	
	
}
function myfontburner_admin() {

    global $fontburner_themename, $fontburner_shortname, $fontburner_options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$fontburner_themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$fontburner_themename.' settings reset.</strong></p></div>';
    
?>
<div class="wrap">
<a href="http://www.fontburner.com/"><img src="http://www.fontburner.com/images/font_burner_badge4.gif" width="300" height="50" vspace="25" /></a>

<p>This control panel gives you the ability to control how your Font Burner fonts are displayed. For more information about this plugin, please visit the <a href="http://www.fontburner.com/the-font-burner-wordpress-plugin/" title="Font Burner plugin page">Font Burner plugin page</a>. Please <a href="http://www.fontburner.com/contact/" title="contact me">contact me</a> with any bugs, suggestions, or questions. Thanks for using Font Burner, and I hope you like this plugin. <a href="http://adrian3.com/" title="-Adrian 3">-Adrian Hanft</a></p>
<hr><br /><br />
<h2>Customize your Font Burner settings</h2>
<form method="post">

<table class="optiontable">

<?php foreach ($fontburner_options as $value) { 
    
if ($value['type'] == "text") { ?>
        
<tr valign="top"> 
    <th scope="row"><?php echo $value['name']; ?></th>
    <td>
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" size="40" />
    </td>
</tr>
<tr><td colspan=2><hr /></td></tr>
<?php } elseif ($value['type'] == "select") { ?>

    <tr valign="middle"> 
        <th scope="top"><?php echo $value['name']; ?></th>
        <td>
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; }?>><?php echo $option; ?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
<tr><td colspan=2><hr /></td></tr>
<?php } elseif ($value['type'] == "radio") { ?>

    <tr valign="middle"> 
        <th scope="top"><?php echo $value['name']; ?></th>
        <td>
                <?php foreach ($value['options'] as $option) { ?>
      <?php echo $option; ?><input name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo $option; ?>" <?php if ( get_settings( $value['id'] ) == $option) { echo 'checked'; } ?>/> &nbsp;&nbsp;&nbsp;
<?php } ?>
        </td>
    </tr>
<tr><td colspan=2><hr /></td></tr>
<?php } elseif ($value['type'] == "textarea") { ?>

    <tr valign="middle"> 
        <th scope="top"><?php echo $value['name']; ?></th>
        <td>
            <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="40" rows="16"/><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>
</textarea>

        </td>
    </tr>
<tr><td colspan=2><hr /></td></tr>
<?php } ?>
<?php 
}
?>
</table>
<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<h2>Preview (updated when options are saved)</h2>
<iframe src="../?preview=true" width="100%" height="600" ></iframe>
<?php
}
add_action('admin_menu', 'myfontburner_add_admin');
add_action('wp_head', 'addFontburner'); ?>
