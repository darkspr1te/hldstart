<?php
/*
*
* Copyright (C) 2008 OGP Team
* 
* www.opengamepanel.org
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
*/

// settings.php
define('update_settings', "Zapisz");
define('settings_updated', "Ustawienia zostały zaktualizowane.");
define('theme', "Skórka");
define('panel_language', "Język");
define('maintenance_mode', "Tryb konserwacji");
define('maintenance_title', "Maintenance Title");
define('maintenance_title_info', "The title that is displayed to normal users during maintenance.");
define('maintenance_message', "Prezentowane Wiadomość");
define('page_auto_refresh', "Odświerzenie strony");
define('smtp_server', "Serwer SMTP");
define('panel_email_address', "Email Panelu");
define('panel_name', "Panel name");
define('feed_enable', "Enable LGSL Feed");
define('feed_url', "Feed URL");
define('feed_url_info', "GrayCube.com dzieli LGSL paszy na adres:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('charset', "Kodowanie znaków");
define('charset_info', "UTF8, ISO, ASCII, itp. .. Zostawił puste, aby użyć kodowania ISO.");
define('steam_user', "Steam User");
define('steam_user_info', "This user is needed to log in to steam for download some new games like CS:GO.");
define('steam_pass', "Steam Password");
define('steam_pass_info', "Set here the steam account password.");
define('steam_guard', "Steam Guard Code");
define('steam_guard_info', "Some users have steam guard activated to protect their accounts from hackers,<br>this code is sent to the account email when the first steam update is started.");
define('smtp_port', "Port SMTP");
define('smtp_port_info', "Tak SMTP port nie jest domyślny port (25) Wpisz numer portu SMTP.");
define('smtp_login', "Użytkownik SMTP");
define('smtp_login_info', "Jeśli serwer SMTP wymaga uwierzytelniania, wpisz nazwę użytkownika.");
define('smtp_passw', "Hasło SMTP");
define('smtp_passw_info', "Jeśli nie ustawić hasło nie używane uwierzytelnianie SMTP");
define('time_zone', "Strefa Czasu");
define('time_zone_info', "Ustawia domyślną strefę czasową używaną przez wszystkie data / czas funkcji.");
define('query_cache_life', "Query cache life");
define('query_cache_life_info', "Sets the timeout in seconds before the server status is refreshed.");
define('query_num_servers_stop', "Disable Game Server Queries After");
define('query_num_servers_stop_info', "Use this setting to disable queries if a user owns more game servers than this amount specified to speed up panel loading.");
define('editable_email', "Editable E-Mail Address");
define('editable_email_info', "Select if users can edit their e-mail address or not.");
define('old_dashboard_behavior', "Old Dashboard behavior");
define('old_dashboard_behavior_info', "The old Dashboard was running slower but shows more server information, current players and map.");
define('rsync_available', "Available rsync servers");
define('rsync_available_info', "Select what servers list will be shown in the rsync installation.");
define('all_available_servers', "All available servers ( rsync_sites.list + rsync_sites_local.list )");
define('only_remote_servers', "Only remote servers ( rsync_sites.list )");
define('only_local_servers', "Only local servers ( rsync_sites_local.list )");
define('header_code', "Header code");
define('header_code_info', "Here you can write your own header code (like HTML code, Embed Code etc.) without editing the theme layout.");
define('remote_query', "Remote query");
define('remote_query_info', "Use the remote server (agent) to make queries to the game servers (Only GameQ and LGSL).");

// Theme settings
define('theme_settings', "Ustawienia tematyczne");
define('theme_info', "Theme selected here will be the default theme for all users. Users can change their theme from their profile page.");
define('welcome_title', "Witaj Tytuł");
define('welcome_title_info', "Umożliwia tytuł, który jest wyświetlany w górnej części deski rozdzielczej.");
define('welcome_title_message', "Powitanie Tytuł");
define('welcome_title_message_info', "Wiadomość tytuł, który jest wyświetlany w górnej części deski rozdzielczej (HTML dozwolony).");
define('logo_link', "Logos Link");
define('logo_link_info', "The logos hyperlink. <b style='font-size:10px; font-weight:normal;'>(Leaving it blank will link it to the Dashboard)</b>");
define('custom_tab', "Custom Tab");
define('custom_tab_info', "Adds a customisable tab at the end of the menu. <b style='font-size:10px; font-weight:normal;'>(Apply and refresh this page to edit tab settings)</b>");
define('custom_tab_name', "Custom Tab Name");
define('custom_tab_name_info', "The tabs display name.");
define('custom_tab_link', "Custom Tab Link");
define('custom_tab_link_info', "The tabs hyperlink.");
define('custom_tab_sub', "Custom Sub-Tabs");
define('custom_tab_sub_info', "Adds customisable sub-tabs when hovering over the 'Custom Tab'.");
define('custom_tab_sub_name', "Sub-Tab #1 Name");
define('custom_tab_sub_link', "Sub-Tab #1 Link");
define('custom_tab_sub_name2', "Sub-Tab #2 Name");
define('custom_tab_sub_link2', "Sub-Tab #2 Link");
define('custom_tab_sub_name3', "Sub-Tab #3 Name");
define('custom_tab_sub_link3', "Sub-Tab #3 Link");
define('custom_tab_sub_name4', "Sub-Tab #4 Name");
define('custom_tab_sub_link4', "Sub-Tab #4 Link");
define('custom_tab_target_blank', "Custom Tabs Target");
define('custom_tab_target_blank_info', "Sets all the tabs target. <b style='font-size:10px; font-weight:normal;'>('_self' = Opens link on same page. '_blank'  =  Opens link on new tab.)</b>");
define('bg_wrapper', "Wrapper Background");
define('bg_wrapper_info', "The wrappers background image. <b style='font-size:10px; font-weight:normal;'>(Only available on Revolution themes.)</b>");
define('maintenance_mode_info', 'Maintenance mode info');
define('maintenance_message_info', 'Maintenance message info');
define('panel_language_info', 'Panel language info');
define('page_auto_refresh_info', 'Page auto refresh info');
define('smtp_server_info', 'Smtp server info');
define('panel_email_address_info', 'Panel email address info');
define('panel_name_info', 'Panel name info');
define('feed_enable_info', 'Feed enable info');
define('smtp_secure', "SMTP Secure");
define('smtp_secure_info', "Use SSL/TLS to connect to the SMTP server");
define('support_widget_title', "Support widget title");
define('support_widget_title_info', "A custom title for the support widget in the Dashboard.");
define('support_widget_content', "Support widget content");
define('support_widget_content_info', "The content of the support widget, you can use HTML code.");
define('support_widget_link', "Support widget link");
define('support_widget_link_info', "The URL of your support site.");
?>