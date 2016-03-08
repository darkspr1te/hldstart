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

// settings.php
define('maintenance_mode', "Maintenance");
define('maintenance_mode_info', "Désactive le site pour que seuls les administrateurs puissent s'y connecter.");
define('maintenance_title', "Titre pour la maintenance");
define('maintenance_title_info', "Le titre qui est affiché aux utilisateurs durant la maintenance.");
define('maintenance_message', "Message de la maintenance");
define('maintenance_message_info', "Le message qui est affiché aux utilisateurs durant la maintenance.");
define('update_settings', "Mettre à jour les paramètres");
define('settings_updated', "Paramètres mis à jour avec succès.");
define('panel_language', "Langue du panneau");
define('panel_language_info', "La langue définie ici est la langue par défaut du panneau. Les utilisateurs peuvent la changer depuis leur page de profil.");
define('page_auto_refresh', "Rafraîchissement automatique des pages");
define('page_auto_refresh_info', "Le rafraîchissement automatique des pages est surtout utilisé dans les pages de logs. Il est préférable de l'activer.");
define('smtp_server', "Serveur sortant mail");
define('smtp_server_info', "C'est le serveur sortant pour e-mails (serveur SMTP) utilisé pour, par exemple, envoyer les mots de passes aux utilisateurs.<br>'localhost' est par défaut.");
define('panel_email_address', "Adresse e-mail sortante");
define('panel_email_address_info', "C'est l'adresse e-mail qui est utilisée pour envoyer les mails.");
define('panel_name', "Nom du panneau");
define('panel_name_info', "Le nom du panneau qui est affiché dans le titre des pages. Cette valeur écrase les titres des pages si elle est définie.");
define('feed_enable', "Activer LGSL Feed");
define('feed_enable_info', "Si votre hébergement web a un pare-feu (firewall) bloquant les requêtes sur les ports, vous devez l'activer.");
define('feed_url', "Feed URL");
define('feed_url_info', "GrayCube.com partage un 'LGSL feed' depuis l'URL :<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('charset', "Encodage des caractères");
define('charset_info', "UTF8, ISO, ASCII, etc... Laissez vide pour utiliser l'encodage ISO.");
define('steam_user', "Nom d'utilisateur Steam");
define('steam_user_info', "Ce nom d'utilisateur est utilisé pour se connecter à Steam et télécharger les jeux comme CS:GO.");
define('steam_pass', "Mot de passe Steam");
define('steam_pass_info', "Le mot de passe pour le compte Steam utilisé.");
define('steam_guard', "Steam Guard");
define('steam_guard_info', "Des utilisateurs ont Steam Guard activés pour protéger leur compte des pirates,<br>ce code est envoyé par e-mail lors de la première installation.");
define('smtp_port', "Port SMTP");
define('smtp_port_info', "Si le port SMTP n'est pas celui par défaut (25), entrez le ici.");
define('smtp_login', "Utilisateur SMTP");
define('smtp_login_info', "Si le serveur SMTP requiert une authentification, entrez votre nom d'utilisateur ici.");
define('smtp_passw', "Mot de passe SMTP");
define('smtp_passw_info', "Si vous ne mettez pas de mot de passe, l'authentification STMP sera désactivée.");
define('smtp_secure', "SMTP Secure");
define('smtp_secure_info', "Utilisez-vous le SSL/TLS pour vous connecter à votre serveur SMTP ?");
define('time_zone', "Fuseau horaire");
define('time_zone_info', "Définissez le fuseau horaire par défaut utiliser pour toutes les dates et les temps.");
define('query_cache_life', "Temps de vie du cache des requêtes");
define('query_cache_life_info', "Définissez le timeout en seconde avant que le statut du serveur ne soit rafraîchi.");
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
define('support_widget_title', "Support widget title");
define('support_widget_title_info', "A custom title for the support widget in the Dashboard.");
define('support_widget_content', "Support widget content");
define('support_widget_content_info', "The content of the support widget, you can use HTML code.");
define('support_widget_link', "Support widget link");
define('support_widget_link_info', "The URL of your support site.");
define('remote_query', "Remote query");
define('remote_query_info', "Use the remote server (agent) to make queries to the game servers (Only GameQ and LGSL).");

// Theme settings
define('theme_settings', "Paramètres du thème");
define('theme', "Thème");
define('theme_info', "Le thème sélectionné sera le thème par défaut de tous les utilisateurs. Ils pourront changer depuis leur page de profil.");
define('welcome_title', "Titre de bienvenue");
define('welcome_title_info', "Active le titre qui s'affiche en haut du Tableau de bord.");
define('welcome_title_message', "Message du titre de bienvenue");
define('welcome_title_message_info', "Le message du titre de bienvenue affiché en haut du Tableau de bord (html autorisé).");
define('logo_link', "Lien du logo");
define('logo_link_info', "Le lien vers où on est redirigé si on clique sur le logo. <b style='font-size:10px; font-weight:normal;'>(Laissez vide si vous voulez que ça redirige vers le Tableau de bord)</b>");
define('custom_tab', "Onglet personnalisé");
define('custom_tab_info', "Permet d'ajouter un onglet à la fin du menu. <b style='font-size:10px; font-weight:normal;'>(Activez-le puis validez pour le paramétrer)</b>");
define('custom_tab_name', "Nom de l'onglet personnalisé");
define('custom_tab_name_info', "Le nom sur l'onglet personnalisé.");
define('custom_tab_link', "Lien de l'onglet personnalisé");
define('custom_tab_link_info', "Le lien sur lequel on est redirigé si on clique sur l'onglet personnalisé.");
define('custom_tab_sub', "Sous-onglet personnalisé");
define('custom_tab_sub_info', "Ajoute plusieurs sous-onglets personnalisés en dessous de l'onglet personnalisé.");
define('custom_tab_sub_name', "Nom du sous-onglet #1");
define('custom_tab_sub_link', "Lien du sous-onglet #1");
define('custom_tab_sub_name2', "Nom du sous-onglet #2");
define('custom_tab_sub_link2', "Lien du sous-onglet #2");
define('custom_tab_sub_name3', "Nom du sous-onglet #3");
define('custom_tab_sub_link3', "Lien du sous-onglet #3");
define('custom_tab_sub_name4', "Nom du sous-onglet #4");
define('custom_tab_sub_link4', "Lien du sous-onglet #4");
define('custom_tab_target_blank', "Cible des (sous-)onglets personnalisés");
define('custom_tab_target_blank_info', "Définit la cible de tous les onglets. <b style='font-size:10px; font-weight:normal;'>('_self' = le lien s'ouvre dans la même page. '_blank'  =  le lien s'ouvre dans un nouvel onglet.)</b>");
define('bg_wrapper', "Fond d'écran du panneau");
define('bg_wrapper_info', "L'image fond d'écran du panneau. <b style='font-size:10px; font-weight:normal;'>(Pas disponible sur tous les thèmes.)</b>");
?>
