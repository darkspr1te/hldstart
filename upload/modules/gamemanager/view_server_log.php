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

require_once('home_handling_functions.php');
require_once("modules/config_games/server_config_parser.php");

function exec_ogp_module()
{
    global $db;
    global $view;


	list($home_id, $mod_id, $ip, $port) = explode("-", $_GET['home_id-mod_id-ip-port']);
	$user_id = $_SESSION['user_id'];
	
	
	$isAdmin = $db->isAdmin( $user_id );
	if($isAdmin) 
		$home_info = $db->getGameHome($home_id);
	else
		$home_info = $db->getUserGameHome($user_id,$home_id);
	
    if ( $home_info === FALSE )
    {
        print_failure( no_access_to_home );
        return;
    }

    $server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$home_info['home_cfg_file']);

    if ( !$server_xml )
    {
        echo create_back_button( $_GET['m'], 'game_monitor&home_id-mod_id-ip-port='.$_GET['home_id-mod_id-ip-port'] );
        return;
    }

    require_once('includes/lib_remote.php');
    $remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key'],$home_info['timeout']);

    $home_log = "";
	
    if( isset( $server_xml->console_log ) )
	{
		$log_path = preg_replace("/%mod%/i", $home_info['mods'][$mod_id]['mod_key'], $server_xml->console_log);
		$readable = $remote->remote_readfile( $home_info['home_path'].'/'.$log_path, $home_log );
		$running = $remote->is_screen_running( OGP_SCREEN_TYPE_HOME, $home_info['home_id'] );
		$log_retval = $running == -1 ? 0 : ($running == 1 ? ($readable == 1 ? 1 : 3) : 2);
	}
	else
	{
		$log_retval = $remote->get_log(OGP_SCREEN_TYPE_HOME,
			$home_info['home_id'],
			clean_path($home_info['home_path']."/".$server_xml->exe_location),
			$home_log);
	}

    if ($log_retval == 0)
    {
        print_failure( agent_offline );
		echo create_back_button( $_GET['m'], 'game_monitor&home_id-mod_id-ip-port='.$_GET['home_id-mod_id-ip-port'] );
    }
    elseif ($log_retval == 1 || $log_retval == 2)
    {
		// Using the refreshed class
		if( isset($_GET['refreshed']) )
		{
			echo "<pre class='log'><xmp>".$home_log."</xmp></pre>";
		}
		else
		{
			echo '<script src="js/jquery/jquery-1.11.0.min.js"></script>';
			echo "<h2>".$home_info['home_name']."</h2>";
			if($log_retval == 1)
			{
				require_once("includes/refreshed.php");
				
				$control = '<form method="GET" >
							<input type="hidden" name="m" value="gamemanager" />
							<input type="hidden" name="p" value="log" />
							<input type="hidden" name="home_id-mod_id-ip-port" value="'.$_GET['home_id-mod_id-ip-port'].'" />';
				if(isset($_GET['setInterval']))
					$control .= "<input type='hidden' name='setInterval' value='" . $_GET['setInterval'] . "' />";
				if(isset($_GET['view_player_commands']))
					$control .= "<input type='hidden' name='view_player_commands' value='" . $_GET['view_player_commands'] . "' />";
				$control .= '<input type="submit" name="size" value="';
				if( isset( $_GET['size'] ) and $_GET['size'] == "+" )
				{
					$height = "100%";
					$control .= '-';
				}	
				else
				{
					$height = "500px";
					$control .= '+';
				}
				$control .= '" /></form>';
				
				$intervals = array( "4s" => "4000",
									"8s" => "8000",
									"30s" => "30000",
									"2m" => "120000",
									"5m" => "300000" );
									
				$intSel = '<form action="" method="GET" >
						   <input type="hidden" name="m" value="gamemanager" />
						   <input type="hidden" name="p" value="log" />
						   <input type="hidden" name="home_id-mod_id-ip-port" value="'.$_GET['home_id-mod_id-ip-port'].'" />';
				if(isset($_GET['size']))
					$intSel .= "<input type='hidden' name='size' value='" . $_GET['size'] . "' />";
				if(isset($_GET['view_player_commands']))
					$intSel .= "<input type='hidden' name='view_player_commands' value='" . $_GET['view_player_commands'] . "' />";
				$intSel .= refresh_interval . ':<select name="setInterval" onchange="this.form.submit();">';
				foreach ($intervals as $interval => $value )
				{
					$selected = "";
					if ( isset( $_GET['setInterval'] ) AND $_GET['setInterval'] == $value )
						$selected = 'selected="selected"';
					$intSel .= '<option value="'.$value.'" '.$selected.' >'.$interval.'</option>';
				}					
				$intSel .= "</select></form>";
										
				$setInterval = isset($_GET['setInterval']) ? $_GET['setInterval'] : 4000;
				$refresh = new refreshed();
				$pos = $refresh->add("home.php?m=gamemanager&p=log&type=cleared&refreshed&home_id-mod_id-ip-port=". $_GET['home_id-mod_id-ip-port']);
				echo $refresh->getdiv($pos,"height:".$height.";overflow:auto;max-width:1600px;");
				?><script type="text/javascript">$(document).ready(function(){ <?php echo $refresh->build("$setInterval"); ?>} ); </script><?php
				echo "<table class='center' ><tr><td>$intSel</td><td>$control</td></tr></table>";
				if(	($server_xml->control_protocol and preg_match("/^r?l?con2?$/", $server_xml->control_protocol)) OR
					($server_xml->gameq_query_name and $server_xml->gameq_query_name == "minecraft") OR 
					($server_xml->lgsl_query_name  and $server_xml->lgsl_query_name == "7dtd") )
					require('modules/gamemanager/rcon.php');
			}
			else
			{
				echo "<pre class='log'><xmp>".$home_log."</xmp></pre>";
				print_failure( server_not_running );
			}
			echo create_back_button( $_GET['m'], 'game_monitor&home_id-mod_id-ip-port='.$_GET['home_id-mod_id-ip-port'] );
		}
    }
    else
    {
        print_failure(get_lang_f('unable_to_get_log',$log_retval));
		echo create_back_button( $_GET['m'], 'game_monitor&home_id-mod_id-ip-port='.$_GET['home_id-mod_id-ip-port'] );
    }
}
?>