<?php

/*  Hi,
    
    Thanks for downloading net2ftp!
    
    This page shows how to integrate net2ftp in a generic PHP page.
    It is quite easy:
    1. Define the constants NET2FTP_APPLICATION_ROOTDIR and NET2FTP_APPLICATION_ROOTDIR_URL
    2. Include the file main.inc.php
    3. Execute 5 net2ftp() calls to send the HTTP headers, print the Javascript 
       code, print the HTML body, etc...
    4. Check if an error occured to print out an error message.
    
    Look in /integration for more elaborate examples.
    
    Enjoy,
    
    David 
*/
error_reporting(E_ERROR);
session_start();
$settings = $_SESSION['settings'];
// ------------------------------------------------------------------------
// 1. Define the constants NET2FTP_APPLICATION_ROOTDIR and NET2FTP_APPLICATION_ROOTDIR_URL
// ------------------------------------------------------------------------
define("NET2FTP_APPLICATION_ROOTDIR", dirname(__FILE__));
if     (isset($_SERVER["SCRIPT_NAME"]) == true) { define("NET2FTP_APPLICATION_ROOTDIR_URL", dirname($_SERVER["SCRIPT_NAME"])); }
elseif (isset($_SERVER["PHP_SELF"]) == true)    { define("NET2FTP_APPLICATION_ROOTDIR_URL", dirname($_SERVER["PHP_SELF"])); }

// ------------------------------------------------------------------------
// 2. Include the file /path/to/net2ftp/main.inc.php
// ------------------------------------------------------------------------
require_once("./main.inc.php");

// ------------------------------------------------------------------------
// 3. Execute net2ftp($action). Note that net2ftp("sendHttpHeaders") MUST 
//    be called once before the other net2ftp() calls!
// ------------------------------------------------------------------------
net2ftp("sendHttpHeaders");
if ($net2ftp_result["success"] == false) {
	require_once("./skins/blue/error_wrapped.template.php");
	exit();
}

// <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
date_default_timezone_set($settings['time_zone']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="<?php echo __("en"); ?>" dir="<?php echo __("ltr"); ?>">
<head>
<meta http-equiv="Content-type" content="text/html;charset=<?php echo __("iso-8859-1"); ?>" />
<?php net2ftp("printJavascript"); ?>
<?php net2ftp("printCss"); ?>
</head>
<body onload="<?php net2ftp("printBodyOnload"); ?>">

<?php net2ftp("printBody"); ?>

<?php
// ------------------------------------------------------------------------
// 4. Check the result and print out an error message. This can be done using 
//    a template, or by accessing the $net2ftp_result variable directly.
// ------------------------------------------------------------------------
if ($net2ftp_result["success"] == false) {
	require_once($net2ftp_globals["application_rootdir"] . "/skins/" . $net2ftp_globals["skin"] . "/error.template.php");
}
?>

</body>
</html>