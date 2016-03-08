<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) Copyright (C) 2008 - 2013 The OGP Development Team
 *
 * http://www.opengamepanel.org/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 */
 
// Ignore any request with unwanted values at 'm' or 'p'
if( isset($_REQUEST['m']) and !preg_match("/^([a-z]|[0-9]|_|-)+$/i", $_REQUEST['m']) )
	unset($_POST['m'], $_GET['m'], $_REQUEST['m']);
if( isset($_REQUEST['p']) and ( !isset($_REQUEST['m']) or !preg_match("/^([a-z]|[0-9]|_|-)+$/i", $_REQUEST['p']) ) )
{
	if( isset($_REQUEST['m']) )
		unset($_POST['m'], $_GET['m'], $_REQUEST['m']);
	unset($_POST['p'], $_GET['p'], $_REQUEST['p']);
}

require_once("lang.php");

/// \return the database object when the creation was successfull.
/// \return FALSE if database type was invalid.
/// \return negative value in case of error
function createDatabaseConnection($db_type,$db_host,$db_user,$db_pass,$db_name,$table_prefix)
{
    if ( $db_type == "mysql" )
    {
		if ( function_exists('mysqli_connect') )
			require_once("includes/database_mysqli.php");
		else
			require_once("includes/database_mysql.php");
        $database = new OGPDatabaseMysql();
        $connect_value = $database->connect($db_host,$db_user,$db_pass,$db_name,$table_prefix);
        
        if ($connect_value === TRUE)
            return $database;

        // See return values from database classes.
        return $connect_value;
    }
    else
    {
        return -98;
    }
}

function get_db_error_text ($db_retval, &$error_text)
{
    if (is_a($db_retval,"OGPDatabase"))
        return FALSE;

    switch ($db_retval) {
    case -1:
        $error_text = get_lang("db_error_invalid_host");
        break;
    case -11:
        $error_text = get_lang("db_error_invalid_user_and_pass");
        break;
    case -12:
        $error_text = get_lang("db_error_invalid_database");
        break;
    case -98:
        $error_text = get_lang("db_error_invalid_db_type");
        break;
    case -99:
        $error_text = get_lang("db_error_module_missing");
        break;
    default:
        $error_text = get_lang_f("db_unknown_error",$db_retval);
        break;
    }

    return TRUE;
}

// Create a list of files or folders and store them in an array
function makefilelist($folder, $filter, $sort=true, $type="files") {
    $res = array();
    $filter = explode("|", $filter);
    $temp = opendir($folder);
    while ($file = readdir($temp)) {
        if ($type == "files" && !in_array($file, $filter)) {
            if (!is_dir($folder.$file)) $res[] = $file;
        } elseif ($type == "folders" && !in_array($file, $filter)) {
            if (is_dir($folder.$file)) $res[] = $file;
        }
    }
    closedir($temp);
    if ($sort) sort($res);
    return $res;
}

function isPortValid($port)
{
    return ( $port > 0 && $port <= 65535 );
}

function cleanFilenames($file_array)
{
    $retval = array();
    foreach($file_array as $file_name)
    {
        if($file_name === "." && $file_name === "..")
            continue;
        /// \todo @ is because of files without . in the name.extension.
        @list($value, $ext) = explode(".", $file_name);
        array_push($retval,$value);
    }
    return $retval;
}

function clean_id_string($id_string)
{
    return preg_replace("/-/","",$id_string);
}

function get_first_existing_file($paths)
{
    foreach ($paths as $path)
    {
		if(preg_match("/^http/", $path))
		{
			if(cURLEnabled()){
				// Get headers using cURL
				$file_headers = @get_headers_curl($path);
			}else{
				// Five second timeout...
				$origSocketTimeout = ini_get('default_socket_timeout');
				ini_set('default_socket_timeout', 5);
				
				// Get headers with a socket timeout value of 5 seconds...
				$file_headers = @get_headers($path);
				
				// Reset timeout to old value
				ini_set('default_socket_timeout', $origSocketTimeout);
			}
			if($file_headers[0] == 'HTTP/1.0 200 OK' || $file_headers[0] == 'HTTP/1.1 200 OK') return $path;
		}
		
        if (file_exists($path)) return $path;
    }
}

function cURLEnabled(){
    return function_exists('curl_version');
}

function get_headers_curl($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,            $url);
    curl_setopt($ch, CURLOPT_HEADER,         true);
    curl_setopt($ch, CURLOPT_NOBODY,         true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    
    // 5 second timeout should be reasonable...
    curl_setopt($ch, CURLOPT_TIMEOUT,        5);

    $r = curl_exec($ch);
    $r = split("\n", $r);
    if(is_array($r)){
		$r = array_filter($r, 'strlen');
		
		// Get rid of the last index value which appears to be holding odd characters
		array_pop($r);
	}
    return $r;
}

function clean_path($path)
{
    // Replace multiple / or \ marks with one /.
    return preg_replace("/[\/|\\\\]+/","/",$path);
}
?>
