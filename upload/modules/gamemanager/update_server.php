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

require_once("includes/lib_remote.php");
require_once("modules/config_games/server_config_parser.php");

function exec_ogp_module() {

	global $db;
	global $view;

	$home_id = isset($_REQUEST['home_id']) ? $_REQUEST['home_id'] : "";
	$mod_id = isset($_REQUEST['mod_id']) ? $_REQUEST['mod_id'] : "";

	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
	if($isAdmin) 
		$home_info = $db->getGameHome($home_id);
	else
		$home_info = $db->getUserGameHome($_SESSION['user_id'],$home_id);

	if ( $home_info === FALSE || preg_match("/u/",$home_info['access_rights']) != 1 )
	{
		print_failure( no_rights );
		echo "<table class='center'><tr><td><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id=".$home_info['home_id']."'><< ". back ."</a></td></tr></table>";
		return;
	}
	
	$home_id = $home_info['home_id'];

	$game_type = $home_info['game_key'];

	echo "<h2>Updating game server <em>".$home_info['home_name']."</em></h2>";

	$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$home_info['home_cfg_file']);

	if ( $server_xml->installer != "steamcmd" )
	{
		print_failure( xml_steam_error );
		return;
	}
	$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key'], $home_info['timeout']);
	$host_stat = $remote->status_chk();
	if( $host_stat === 0 )
	{
		print_failure( agent_offline );
		$view->refresh("?m=gamemanager&amp;p=update&amp;update=".$_GET['update']."&amp;home_id=$home_id&amp;mod_id=$mod_id",5);
		return;
	}
	else
	{
		if ( $remote->is_screen_running(OGP_SCREEN_TYPE_HOME,$home_id) == 1 )
		{
			print_failure( server_running_cant_update );
			return;
		}

		$log_txt = '';
		$update_active = $remote->get_log(OGP_SCREEN_TYPE_UPDATE,
			// Note exec location should not be added here as the log is in root where steam is executed.
			$home_id,clean_path($home_info['home_path']),
			$log_txt);

		$modkey = $home_info['mods'][$mod_id]['mod_key'];
		$mod_xml = xml_get_mod($server_xml, $modkey);
		
		if (!$mod_xml)
		{
			print_failure(get_lang_f('mod_key_not_found_from_xml',$modkey));
			return;
		}

		// Start update.
		else if ($_GET['update'] == 'update' && $update_active != 1)
		{
			$installer_name = $modkey;

			if ( isset( $mod_xml->installer_name ) )
			{
				$installer_name = $mod_xml->installer_name;
			}
			
			$precmd = $home_info['mods'][$mod_id]['precmd'] == "" ? 
				( $home_info['mods'][$mod_id]['def_precmd'] == "" ? $server_xml->pre_install : 
				  $home_info['mods'][$mod_id]['def_precmd'] ) : $home_info['mods'][$mod_id]['precmd'];
			
			$postcmd = $home_info['mods'][$mod_id]['postcmd'] == "" ?
				(  $home_info['mods'][$mod_id]['def_postcmd'] == "" ? $server_xml->post_install : 
					$home_info['mods'][$mod_id]['def_precmd'] ) : $home_info['mods'][$mod_id]['postcmd'];
			
			$exec_folder_path = clean_path($home_info['home_path'] . "/" . $server_xml->exe_location );
			$exec_path = clean_path($exec_folder_path . "/" . $server_xml->server_exec_name );
			
			if( isset( $_REQUEST['master_server_home_id'] ) )
			{
				$ms_home_id = $_REQUEST['master_server_home_id'];
				$ms_info = $db->getGameHome($ms_home_id);
				$steam_out = $remote->masterServerUpdate( $home_id,$home_info['home_path'],$ms_home_id,$ms_info['home_path'],$exec_folder_path,$exec_path,$precmd,$postcmd );
			}
			else
			{
				if( preg_match("/win32/", $server_xml->game_key) OR preg_match("/win64/", $server_xml->game_key) ) 
					$cfg_os = "windows";
				elseif( preg_match("/linux/", $server_xml->game_key) )
					$cfg_os = "linux";
				
				$settings = $db->getSettings();
				
				// Some games like L4D2 require anonymous login
				if($mod_xml->installer_login){
					$login = $mod_xml->installer_login;
					$pass = '';
				}else{
					$login = $settings['steam_user'];
					$pass = $settings['steam_pass'];
				}
				
				$modname = ( $installer_name == '90' and !preg_match("/(cstrike|valve)/", $modkey) ) ? $modkey : '';
				$betaname = isset($mod_xml->betaname) ? $mod_xml->betaname : '';
				$betapwd = isset($mod_xml->betapwd) ? $mod_xml->betapwd : '';
				
				$steam_out = $remote->steam_cmd( $home_id,$home_info['home_path'],$installer_name,$modname,
												 $betaname,$betapwd,$login,$pass,$settings['steam_guard'],
												 $exec_folder_path,$exec_path,$precmd,$postcmd,$cfg_os );
			}
			
			if( $steam_out === 0 )
			{
				print_failure( failed_to_start_steam_update );
				return;
			}
			else if ( $steam_out === 1 )
			{
				print_success( update_started );
			}
		}
		// Refresh update page.
		else
		{
			if ( isset( $_POST['stop_update_x'] ) )
			{
				$remote->stop_update($home_id);
				print_success("Update stopped.");
				$view->refresh("?m=gamemanager&amp;p=update&amp;update=refresh&amp;home_id=$home_id&amp;mod_id=$mod_id", 2);
				return;
			}
			$update_complete = false;
			if ( $update_active == 1 )
			{
				echo "<p class='note'>". update_in_progress ."</p>\n";
				echo "<form method=POST><input type='image' name='stop_update' onsubmit='submit-form();' src='modules/administration/images/remove.gif'>". stop_update ."</input></form>";
			}
			else
			{
				echo "<meta http-equiv='refresh' content='60'>";
				print_success( update_completed );
				echo "<table class='center'><tr><td><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id=".$home_info['home_id']."'><< ". back ."</a></td></tr></table>";
				$update_complete = true;
			}
			if (empty($log_txt))
				$log_txt = not_available;

			echo "<pre>".$log_txt."</pre>\n";

			if ( $update_complete )
				return;
		}
		echo "<p><a href=\"?m=gamemanager&amp;p=update&amp;update=refresh&amp;home_id=$home_id&amp;mod_id=$mod_id\">";
		echo refresh_steam_status ."</a></p>";
		$view->refresh("?m=gamemanager&amp;p=update&amp;update=refresh&amp;home_id=$home_id&amp;mod_id=$mod_id",5);
		return;
	}
}
?>