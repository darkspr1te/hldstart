<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) Copyright (C) 2008 - 2014 The OGP Development Team
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

define("DEFAULT_REFRESH_TIME","2");

class OGPView {

    private $meta;
    private $title;

    private $refreshTime;
    private $refreshUrl;

    function __construct() {
        ob_start();
		$this->logo = "home.php?m=dashboard&p=dashboard";
		$this->bg_wrapper = "";
        $this->title = "Open Game Panel";
		$this->charset = "Windows-1255";
        $this->refreshTime = DEFAULT_REFRESH_TIME;
    }

    function __destruct() {

    }

	function menu(){}
	
    function printView($cleared = false) {
        global $db;

        if ( is_object($db) && array_key_exists( "OGPDatabase", class_parents($db) ) ) {
            $panel_settings = $db->getSettings();
        }

        $path = "";

        if ( isset($_SESSION['users_theme']) &&
            !empty($_SESSION['users_theme']) &&
            is_dir( 'themes/'.$_SESSION['users_theme'] ) &&
            is_file( 'themes/'.$_SESSION['users_theme'].'/layout.html') )
        {
            $path = 'themes/'.$_SESSION['users_theme'].'/';
        }
        // Using default theme if there is not one selected.
        else if ( !isset($panel_settings['theme']) )
        {
            $path = 'themes/Revolution/';
        }
        else if ( is_dir( 'themes/'.$panel_settings['theme'] ) &&
            is_file( 'themes/'.$panel_settings['theme'].'/layout.html') )
        {
            $path = 'themes/'.$panel_settings['theme'].'/';
        }
        // In case the theme that was selected is invalid print error and use default.
        else
        {
            $path = 'themes/Revolution/';
        }

		$page = file_get_contents($path.'layout.html');
		@$top = file_get_contents($path.'top.html');
		@$bottom = file_get_contents($path.'bottom.html');
		@$topbody = file_get_contents($path.'topbody.html');
		@$botbody = file_get_contents($path.'botbody.html');
		
		if ( isset($panel_settings['logo_link']) &&
            !empty($panel_settings['logo_link']))
            $this->logo = $panel_settings['logo_link'];
		
		if ( isset($panel_settings['bg_wrapper']) &&
            !empty($panel_settings['bg_wrapper']))
            $this->bg_wrapper = $panel_settings['bg_wrapper'];
		
		if ( isset($panel_settings['charset']) &&
            !empty($panel_settings['charset']))
        {
            $this->charset = $panel_settings['charset'];
			ini_set('default_charset', $panel_settings['charset']);
        }
		
		if ( isset($panel_settings['time_zone']) &&
            !empty($panel_settings['time_zone']))
        {
            $this->time_zone = $panel_settings['time_zone'];
			ini_set('date.timezone', $panel_settings['time_zone']);
        }
		
		if ( isset($panel_settings['panel_name']) &&
            !empty($panel_settings['panel_name']))
			$this->title = $panel_settings['panel_name'];
		
		if ( isset($panel_settings['header_code']) &&
            !empty($panel_settings['header_code']))  
			$this->header_code = $panel_settings['header_code']."\n";
		else
			$this->header_code = "";
		
		$module = isset($_GET['m']) ? $_GET['m'] : "";
		$subpage = isset($_GET['p']) ? $_GET['p'] : $module;
		
		if( file_exists( $path . MODULES . "$module/$subpage.css" ) ) 
			$this->header_code .= "<link rel='stylesheet' href='" . $path . MODULES . "$module/$subpage.css'>";
		elseif( file_exists( MODULES . "$module/$subpage.css" ) )
			$this->header_code .= "<link rel='stylesheet' href='" . MODULES . "$module/$subpage.css'>";
		
		$module_name = isset($_GET['m']) ? get_lang($_GET['m']) : "";
		$page_name = isset($_GET['p']) ? get_lang($_GET['p']) : "";
		$title = $page_name == "" ? $module_name : "$module_name - $page_name";
		$title = str_replace("_", " ", $title);
		$this->title = $title == "" ? $this->title : $this->title . " [$title]";
		
        $buffer = ob_get_contents();
        ob_end_clean();
		
		if ( !empty($this->refreshUrl) )
        {
            if ( $panel_settings['page_auto_refresh'] == "1" )
            {		
                $topbody .= "<div id='refresh-manual'>
				 <a href='".$this->refreshUrl."'>".get_lang('redirecting_in')." ".$this->refreshTime."s.</a>
				 </div>";
				$this->meta .= "<meta http-equiv='refresh' content='".$this->refreshTime.";url=".$this->refreshUrl."' />";
            }
            else
            {
                $topbody .= "<div id='refresh-manual'>
				 <a href='".$this->refreshUrl."'>".get_lang('refresh_page')."</a>
				 </div>";
            }
        }
				
        $footer = "";

        if ( is_object($db) && array_key_exists( "OGPDatabase", class_parents($db) ) ) {
            $footer .= "<div class=\"footer center\">".get_lang_f('cur_theme',@$panel_settings['theme'])."<br />".get_lang('copyright')." &copy; <a href=\"http://www.opengamepanel.org\">Open Game Panel</a> 2014 - ".get_lang('all_rights_reserved').".<br />v".@$panel_settings['ogp_version']." - ".
                $db->getNbOfQueries()." ".get_lang('queries_executed')."</div>";
        }
        else
        {
            $footer .= "<div class='footer center'>".get_lang('copyright')." &copy; <a href=\"http://www.opengamepanel.org\">Open Game Panel</a> 2014 - ".get_lang('all_rights_reserved').".</div>";
        }
		
		if (!isset($_GET['action']))
		{
			$filename = 'install.php';
			if ( !empty($_SESSION['users_theme']) ) $theme = $_SESSION['users_theme'];
			else $theme = $panel_settings['theme'];
			
			if (is_readable($filename))
			{
				if (is_readable($filename) AND $theme == "Modern")
				{
					$top = "<h4 class='failure'>".get_lang('remove_install')."</h4>".$top;
				}
				else
				{
					$topbody = "<h4 class='failure'>".get_lang('remove_install')."</h4>".$topbody;
				}
			}
		}
		
		if ( isset($panel_settings['maintenance_mode']) && $panel_settings['maintenance_mode'] == "1" )
		{
			if ( !empty($_SESSION['users_theme']) ) $theme = $_SESSION['users_theme'];
			else $theme = $panel_settings['theme'];
			
			if (@$_SESSION['users_group'] == "admin" AND $theme == "Modern")
			{
				$top = "<h4 class='failure'>".get_lang('maintenance_mode_on')."!</b></h4>".$top;
			}
			elseif (@$_SESSION['users_group'] == "admin")
			{
				$topbody = "<h4 class='failure'>".get_lang('maintenance_mode_on')."!</b></h4>".$topbody;
			}
		}
		
		if($cleared){
			$page = $buffer;
		}
		else
		{
			$page = str_replace("%meta%",$this->meta,$page);
			$top = str_replace("%logo%",$this->logo,$top);
			$topbody = str_replace("%bg_wrapper%",$this->bg_wrapper,$topbody);
			if ( !empty($_SESSION['users_theme']) ) 
				$theme = $_SESSION['users_theme'];
			else 
				$theme = @$panel_settings['theme'];
					
			$page = str_replace("%bg_wrapper%",$this->bg_wrapper,$page);
        	$page = str_replace("%title%",$this->title,$page);
        	$page = str_replace("%header_code%",$this->header_code,$page);
			$page = str_replace("%charset%",$this->charset,$page);
        	$page = str_replace("%body%",$buffer,$page);
			$page = str_replace("%top%",$top,$page);
			$page = str_replace("%topbody%",$topbody,$page);
			$page = str_replace("%botbody%",$botbody,$page);
			$page = str_replace("%bottom%",$bottom,$page);
			$page = str_replace("%footer%",$footer,$page);
			$page = str_replace("%notifications%",@$notifications,$page);
		}
        print $page;
    }

    function refresh($url,$time = "")
    {
        if ( !empty($time) || $time === 0 )
            $this->refreshTime = $time;
        $this->refreshUrl = $url;
    }

    function setTitle($title)
    {
        $this->title = $title;
    }
	
	function setCharset($charset)
    {
        $this->charset = $charset;
		ini_set('default_charset', $charset);
    }
	
	function setTimeZone($time_zone)
    {
		$time_zone = (!isset($time_zone) or $time_zone == "") ? "America/Chicago" : $time_zone;
		$this->time_zone = $time_zone;
		ini_set('date.timezone', $time_zone);
		$_SESSION['time_zone'] = $time_zone;
    }
}
?>