<?php
/* 
Plugin Name: Font Burner
Plugin URI: http://www.fontburner.com/the-font-burner-wordpress-plugin/
Version: v0.6
Author: <a href="http://adrian3.com/">Adrian3</a>
Description: The Font Burner Plugin allows you to easily add <a href="http://fontburner.com/">Font Burner</a> Fonts to your site through Wordpress.

*/


//Original Framework http://theundersigned.net/2006/06/wordpress-how-to-theme-options/ 
//Updated and added additional options by Jeremy Clark http://clarktech.no-ip.com/
//Hacked and Frankensteined into a plugin by Adrian Hanft http://adrian3.com/

$fontburner_themename = "Font Burner";
$fontburner_shortname = "fontburner";
$fontburner_options = array (

	array(  "name" => "<h1>H1 Customization:</h1><br />Specify Font<sup>1</sup>",
		            "id" => $fontburner_shortname."_h1_font",
		            "std" => "fontin_sans_bold",
		            "type" => "text"),

    array(  "name" => "H1 Link Underline Settings<sup>2</sup>",
            "id" => $fontburner_shortname."_h1_underline",
            "type" => "radio",
            "std" => "none",
            "options" => array("underline", "none")),

    array(  "name" => "H1 Link Underline Hover Settings<sup>2</sup>",
            "id" => $fontburner_shortname."_h1_hover_underline",
            "type" => "radio",
            "std" => "underline",
            "options" => array("underline", "none")),

    array(  "name" => "H1 Font Color<sup>3</sup>",
            "id" => $fontburner_shortname."_h1_color",
            "std" => "000000",
            "type" => "text"),

    array(  "name" => "H1 Link Color<sup>3</sup>",
            "id" => $fontburner_shortname."_h1_link_color",
            "std" => "666666",
            "type" => "text"),

    array(  "name" => "H1 Link Hover Color<sup>3</sup>",
            "id" => $fontburner_shortname."_h1_hover_color",
            "std" => "333333",
            "type" => "text"),

    array(  "name" => "H1 Alignment<sup>4</sup>",
            "id" => $fontburner_shortname."_h1_align",
            "type" => "select",
            "std" => "left",
            "options" => array("right", "left", "center")),

    array(  "name" => "Turn off h1<sup>5</sup>",
            "id" => $fontburner_shortname."_h1",
            "type" => "select",
            "std" => "h1",
            "options" => array("h1", "off")),





	array(  "name" => "<h1>H2 Customization:</h1><br />Specify Font<sup>1</sup>",
		            "id" => $fontburner_shortname."_h2_font",
		            "std" => "cuprum",
		            "type" => "text"),

    array(  "name" => "H2 Link Underline Settings<sup>2</sup>",
            "id" => $fontburner_shortname."_h2_underline",
            "type" => "radio",
            "std" => "none",
            "options" => array("underline", "none")),

    array(  "name" => "H2 Link Underline Hover Settings<sup>2</sup>",
            "id" => $fontburner_shortname."_h2_hover_underline",
            "type" => "radio",
            "std" => "underline",
            "options" => array("underline", "none")),

    array(  "name" => "H2 Font Color<sup>3</sup>",
            "id" => $fontburner_shortname."_h2_color",
            "std" => "000000",
            "type" => "text"),

    array(  "name" => "H2 Link Color<sup>3</sup>",
            "id" => $fontburner_shortname."_h2_link_color",
            "std" => "666666",
            "type" => "text"),

    array(  "name" => "H2 Link Hover Color<sup>3</sup>",
            "id" => $fontburner_shortname."_h2_hover_color",
            "std" => "333333",
            "type" => "text"),

    array(  "name" => "H2 Alignment<sup>4</sup>",
            "id" => $fontburner_shortname."_h2_align",
            "type" => "select",
            "std" => "left",
            "options" => array("right", "left", "center")),
    array(  "name" => "Turn off h2<sup>5</sup>",
            "id" => $fontburner_shortname."_h2",
            "type" => "select",
            "std" => "h2",
            "options" => array("h2", "off")),





	array(  "name" => "<h1>H3 Customization:</h1><br />Specify Font<sup>1</sup>",
		            "id" => $fontburner_shortname."_h3_font",
		            "std" => "candara_bold",
		            "type" => "text"),

    array(  "name" => "H3 Link Underline Settings<sup>2</sup>",
            "id" => $fontburner_shortname."_h3_underline",
            "type" => "radio",
            "std" => "none",
            "options" => array("underline", "none")),

    array(  "name" => "H3 Link Underline Hover Settings<sup>2</sup>",
            "id" => $fontburner_shortname."_h3_hover_underline",
            "type" => "radio",
            "std" => "underline",
            "options" => array("underline", "none")),

    array(  "name" => "H3 Font Color<sup>3</sup>",
            "id" => $fontburner_shortname."_h3_color",
            "std" => "000000",
            "type" => "text"),

    array(  "name" => "H3 Link Color<sup>3</sup>",
            "id" => $fontburner_shortname."_h3_link_color",
            "std" => "666666",
            "type" => "text"),

    array(  "name" => "H3 Link Hover Color<sup>3</sup>",
            "id" => $fontburner_shortname."_h3_hover_color",
            "std" => "333333",
            "type" => "text"),

    array(  "name" => "H3 Alignment<sup>4</sup>",
            "id" => $fontburner_shortname."_h3_align",
            "type" => "select",
            "std" => "left",
            "options" => array("right", "left", "center")),
    array(  "name" => "Turn off h3<sup>5</sup>",
            "id" => $fontburner_shortname."_h3",
            "type" => "select",
            "std" => "h3",
            "options" => array("h3", "off")),





	array(  "name" => "<h1>H4 Customization:</h1><br />Specify Font<sup>1</sup>",
		            "id" => $fontburner_shortname."_h4_font",
		            "std" => "calibri",
		            "type" => "text"),

    array(  "name" => "H4 Link Underline Settings<sup>2</sup>",
            "id" => $fontburner_shortname."_h4_underline",
            "type" => "radio",
            "std" => "none",
            "options" => array("underline", "none")),

    array(  "name" => "H4 Link Underline Hover Settings<sup>2</sup>",
            "id" => $fontburner_shortname."_h4_hover_underline",
            "type" => "radio",
            "std" => "underline",
            "options" => array("underline", "none")),

    array(  "name" => "H4 Font Color<sup>3</sup>",
            "id" => $fontburner_shortname."_h4_color",
            "std" => "000000",
            "type" => "text"),

    array(  "name" => "H4 Link Color<sup>3</sup>",
            "id" => $fontburner_shortname."_h4_link_color",
            "std" => "666666",
            "type" => "text"),

    array(  "name" => "H4 Link Hover Color<sup>3</sup>",
            "id" => $fontburner_shortname."_h4_hover_color",
            "std" => "333333",
            "type" => "text"),

    array(  "name" => "H4 Alignment<sup>4</sup>",
            "id" => $fontburner_shortname."_h4_align",
            "type" => "select",
            "std" => "left",
            "options" => array("right", "left", "center")),
    array(  "name" => "Turn off h4<sup>5</sup>",
            "id" => $fontburner_shortname."_h4",
            "type" => "select",
            "std" => "h4",
            "options" => array("h4", "off")),




    array(  "name" => "<h1>CSS Customization:</h1><br />
CSS For Font Size<sup>6</sup>",
		            "id" => $fontburner_shortname."_css",
		            "std" => ".sIFR-active h1 {
	  line-height: 1.2em;
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
	  font-size: 13px;
	}",
		            "type" => "textarea")
  
 
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

<script type="text/javascript" src="http://www.google-analytics.com/ga.js"></script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-3989583-8");
pageTracker._initData();
pageTracker._setDomainName("none");
pageTracker._setAllowLinker(true);
pageTracker._trackPageview();
</script>

<script type="text/javascript">
	var ';
	
	echo $fontburner_h1_font;
	echo '= {
    src: \'http://www.fontburner.com/flash/';
	echo $fontburner_h1_font;
	echo '.swf\'
  };
  sIFR.prefetch(';
	echo $fontburner_h1_font;
	echo ');
	  sIFR.delayCSS  = true;
	  sIFR.activate(';
	echo $fontburner_h1_font;
	echo
	  '); 
	sIFR.replace(';
	echo $fontburner_h1_font;
	echo ', {
	    selector: \'';
		echo $fontburner_h1;

		echo ', ';
		echo '  .';
	echo $fontburner_h1_font;
	echo ', #';
	echo $fontburner_h1_font;
	echo '\'
	    ,css: [
	      \'.sIFR-root {text-align:'; 
	echo $fontburner_h1_align;
	echo '; color:#';		
	
	echo $fontburner_h1_color;
	echo '	;}'
	      ,'a {color:#';
	echo $fontburner_h1_link_color;
	echo '	; text-decoration: ';
	echo $fontburner_underline;
	echo '; font-weight:normal; }'
	      ,'a:link {color:#';
	echo $fontburner_h1_link_color;
	echo '	; text-decoration: ';
	echo $fontburner_h1_underline;
	echo '; font-weight:normal; }'
	      ,'a:hover {color:#';
	echo $fontburner_h1_hover_color;
	echo '	; text-decoration: ';
	echo $fontburner_h1_hover_underline;
	echo '; font-weight:normal; }'
	      ,'a:visited { color: #';
	echo $fontburner_h1_color;
	echo '	; text-decoration: ';
	echo $fontburner_h1_underline;
	echo ' }'
	      ,'em { color: #';
	echo $fontburner_h1_color;
	echo '	; font-style:normal; font-weight:normal; }'
	      ,'strong { color: #';
	echo $fontburner_h1_color;
	echo '	; font-weight:normal; font-style:normal; }\'
	    ]

	    ,offsetTop:0
	    ,marginBottom: 0
	   	,verticalSpacing: 0
	    ,wmode: \'transparent\'

	  });




	var ';
	
	echo $fontburner_h2_font;
	echo '= {
    src: \'http://www.fontburner.com/flash/';
	echo $fontburner_h2_font;
	echo '.swf\'
  };
  sIFR.prefetch(';
	echo $fontburner_h2_font;
	echo ');
	  sIFR.delayCSS  = true;
	  sIFR.activate(';
	echo $fontburner_h2_font;
	echo
	  '); 
	sIFR.replace(';
	echo $fontburner_h2_font;
	echo ', {
	    selector: \'';
		echo $fontburner_h2;

		echo ', ';
		echo '  .';
	echo $fontburner_h2_font;
	echo ', #';
	echo $fontburner_h2_font;
	echo '\'
	    ,css: [
	      \'.sIFR-root {text-align:'; 
	echo $fontburner_h2_align;
	echo '; color:#';		
	
	echo $fontburner_h2_color;
	echo '	;}'
	      ,'a {color:#';
	echo $fontburner_h2_link_color;
	echo '	; text-decoration: ';
	echo $fontburner_underline;
	echo '; font-weight:normal; }'
	      ,'a:link {color:#';
	echo $fontburner_h2_link_color;
	echo '	; text-decoration: ';
	echo $fontburner_h2_underline;
	echo '; font-weight:normal; }'
	      ,'a:hover {color:#';
	echo $fontburner_h2_hover_color;
	echo '	; text-decoration: ';
	echo $fontburner_h2_hover_underline;
	echo '; font-weight:normal; }'
	      ,'a:visited { color: #';
	echo $fontburner_h2_color;
	echo '	; text-decoration: ';
	echo $fontburner_h2_underline;
	echo ' }'
	      ,'em { color: #';
	echo $fontburner_h2_color;
	echo '	; font-style:normal; font-weight:normal; }'
	      ,'strong { color: #';
	echo $fontburner_h2_color;
	echo '	; font-weight:normal; font-style:normal; }\'
	    ]

	    ,offsetTop:0
	    ,marginBottom: 0
	   	,verticalSpacing: 0
	    ,wmode: \'transparent\'

	  });





	var ';
	
	echo $fontburner_h3_font;
	echo '= {
    src: \'http://www.fontburner.com/flash/';
	echo $fontburner_h3_font;
	echo '.swf\'
  };
  sIFR.prefetch(';
	echo $fontburner_h3_font;
	echo ');
	  sIFR.delayCSS  = true;
	  sIFR.activate(';
	echo $fontburner_h3_font;
	echo
	  '); 
	sIFR.replace(';
	echo $fontburner_h3_font;
	echo ', {
	    selector: \'';
		echo $fontburner_h3;

		echo ', ';
		echo '  .';
	echo $fontburner_h3_font;
	echo ', #';
	echo $fontburner_h3_font;
	echo '\'
	    ,css: [
	      \'.sIFR-root {text-align:'; 
	echo $fontburner_h3_align;
	echo '; color:#';		
	
	echo $fontburner_h3_color;
	echo '	;}'
	      ,'a {color:#';
	echo $fontburner_h3_link_color;
	echo '	; text-decoration: ';
	echo $fontburner_underline;
	echo '; font-weight:normal; }'
	      ,'a:link {color:#';
	echo $fontburner_h3_link_color;
	echo '	; text-decoration: ';
	echo $fontburner_h3_underline;
	echo '; font-weight:normal; }'
	      ,'a:hover {color:#';
	echo $fontburner_h3_hover_color;
	echo '	; text-decoration: ';
	echo $fontburner_h3_hover_underline;
	echo '; font-weight:normal; }'
	      ,'a:visited { color: #';
	echo $fontburner_h3_color;
	echo '	; text-decoration: ';
	echo $fontburner_h3_underline;
	echo ' }'
	      ,'em { color: #';
	echo $fontburner_h3_color;
	echo '	; font-style:normal; font-weight:normal; }'
	      ,'strong { color: #';
	echo $fontburner_h3_color;
	echo '	; font-weight:normal; font-style:normal; }\'
	    ]

	    ,offsetTop:0
	    ,marginBottom: 0
	   	,verticalSpacing: 0
	    ,wmode: \'transparent\'

	  });





	var ';
	
	echo $fontburner_h4_font;
	echo '= {
    src: \'http://www.fontburner.com/flash/';
	echo $fontburner_h4_font;
	echo '.swf\'
  };
  sIFR.prefetch(';
	echo $fontburner_h4_font;
	echo ');
	  sIFR.delayCSS  = true;
	  sIFR.activate(';
	echo $fontburner_h4_font;
	echo
	  '); 
	sIFR.replace(';
	echo $fontburner_h4_font;
	echo ', {
	    selector: \'';
		echo $fontburner_h4;

		echo ', ';
		echo '  .';
	echo $fontburner_h4_font;
	echo ', #';
	echo $fontburner_h4_font;
	echo '\'
	    ,css: [
	      \'.sIFR-root {text-align:'; 
	echo $fontburner_h4_align;
	echo '; color:#';		
	
	echo $fontburner_h4_color;
	echo '	;}'
	      ,'a {color:#';
	echo $fontburner_h4_link_color;
	echo '	; text-decoration: ';
	echo $fontburner_underline;
	echo '; font-weight:normal; }'
	      ,'a:link {color:#';
	echo $fontburner_h4_link_color;
	echo '	; text-decoration: ';
	echo $fontburner_h4_underline;
	echo '; font-weight:normal; }'
	      ,'a:hover {color:#';
	echo $fontburner_h4_hover_color;
	echo '	; text-decoration: ';
	echo $fontburner_h4_hover_underline;
	echo '; font-weight:normal; }'
	      ,'a:visited { color: #';
	echo $fontburner_h4_color;
	echo '	; text-decoration: ';
	echo $fontburner_h4_underline;
	echo ' }'
	      ,'em { color: #';
	echo $fontburner_h4_color;
	echo '	; font-style:normal; font-weight:normal; }'
	      ,'strong { color: #';
	echo $fontburner_h4_color;
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

<h1>Font Burner Control Panel</h1>
<p><a href="http://www.fontburner.com/"><img src="http://www.fontburner.com/images/font_burner_badge4.gif" width="300" height="50" vspace="25" align ="right" /></a>This control panel gives you the ability to control how your Font Burner fonts are displayed. For more information about this plugin, please visit the <a href="http://www.fontburner.com/the-font-burner-wordpress-plugin/" title="Font Burner plugin page">Font Burner plugin page</a>. Please <a href="http://www.fontburner.com/contact/" title="contact me">contact me</a> with any bugs, suggestions, or questions. Thanks for using Font Burner, and I hope you like this plugin. <a href="http://adrian3.com/" title="-Adrian 3">-Adrian Hanft</a></p>
<hr><br /><br />
<h2>Customize your Font Burner settings</h2>
<form method="post">

<table class="optiontable">

<?php foreach ($fontburner_options as $value) { 
    
if ($value['type'] == "text") { ?>
        
<tr valign="bottom"> 
    <th align="left" scope="row"><?php echo $value['name']; ?></th>
    <td>
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" size="40" />
    </td>
</tr>
<tr><td colspan=2><hr /></td></tr>
<?php } elseif ($value['type'] == "select") { ?>

    <tr valign="bottom"> 
        <th align="left" scope="top"><?php echo $value['name']; ?></th>
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
        <th align="left" scope="top"><?php echo $value['name']; ?></th>
        <td>
                <?php foreach ($value['options'] as $option) { ?>
      <?php echo $option; ?><input name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo $option; ?>" <?php if ( get_settings( $value['id'] ) == $option) { echo 'checked'; } ?>/> &nbsp;&nbsp;&nbsp;
<?php } ?>
        </td>
    </tr>
<tr><td colspan=2><hr /></td></tr>
<?php } elseif ($value['type'] == "textarea") { ?>

    <tr valign="top"> 
        <th align="left" scope="top"><?php echo $value['name']; ?></th>
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
<h1>Help</h1>
<h2>1. Specify Font</h2>
<p>This box is where you will enter the font name that you would like to change your headlines to. You MUST choose a font that is available from <a href="http://www.fontburner.com/fonts/" title="Font Burner">Font Burner</a>. The Font Burner Website has over 1000 fonts that you can use on your website for free. When you find a font on Font Burner that you would like to use look at the bottom of the page where it says "Wordpress plugin code" and enter this code in the box above. This code will always be lowercase and will never contain spaces. A typical font code will look like "bitstream_vera_sans_mono_bold".</p>

<h2>2. Link Underline Settings</h2>
<p>This is an easy one. If you want your links to be underlined simply check the "underline" checkbox. If you don't want links to be underlined check "none." The second box sets the "hover" color. That means that when the mouse is over the link you can set whether there is an underline or not.</p>

<h2>3. Font Color</h2>
<p>This box is where you enter the color that you would like your headlines to be. This is a six digit hexadecimal number. For example, "ffffff" is white and "000000" is black. A google search can help you figure out how hexadecimal colors work if you are unfamiliar with them. You do not need to enter a "#" before this number. The "Link Color"" allows you to have your links be a different color than the "normal" headline. The "Link Hover Color" specifies the color that the links will be when the mouse rolls over them.</p>

<h2>4. Alignment</h2>
<p>By default your headlines will be aligned left, but you can use this dropdown menu to change the alignment to right, left, or center.</p>

<h2>5. Turn Off</h2>
<p>If you do not want to use Font Burner on some of your headlines this is where you can turn it off. This can be handy if you only want to use Font Burner on certain H tags. To turn Font Burner off for a certain Headline select "off" from this dropdown. </p>

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

<h2>Save Changes and Reset</h2>
The "reset" button will restore the plugins default settings. Any time you make a change remember to click "Save Changes."


<h2>Preview (updated when options are saved)</h2>
<iframe src="../?preview=true" width="100%" height="600" ></iframe>
<?php
}
add_action('admin_menu', 'myfontburner_add_admin');
add_action('wp_head', 'addFontburner'); ?>
