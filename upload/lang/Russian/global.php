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
#####################################################################
# Russian language variables
#
#####################################################################

define('lang_charset', "UTF-8");
define('already_logged_in_redirecting_to_dashboard', "Вы уже вошли в систему, перенаправление на главную страницу");
define('logging_in', "Вход в систему");
define('redirecting_in', "Перенаправление через");
define('refresh_page', "Обновить страницу");
define('no_rights', "У Вас недостаточно прав для доступа к этой странице.");
define('welcome', "Добро пожаловать!");
define('logout', "Выйти");
define('logout_message', "Вы успешно вышли.");
define('support', "Поддержка");
define('password', "Пароль");
define('login', "Логин");
define('login_button', "Войти");
define('lost_passwd', "Забыли пароль?");
define('no_db_connection', "Не удалось подключиться к базе данных.");
define('bad_login', "Неправильный логин или пароль.");
define('not_logged_in', "Вы не вошли в систему.");
define('remove_install', "Пожалуйста, удалите файл install.php по соображениям безопасности.");
define('agent_offline', "Агент, который управляет этим сервером, выключен или сервер не запущен.");
define('logged_in', "Вы зашли как");
define('delete', "Удалить");
define('edit', "Изменить");
define('actions', "Действия");
define('invalid_subpage', "Неверная страница.");
define('invalid_home_id', "Invalid home ID entered.");
define('note', "ПРИМЕЧАНИЕ");
define('hint', "ПОДСКАЗКА");
define('yes', "Да");
define('no', "Нет");
define('on', "On");
define('off', "Off");

// datase vars.
define('db_error_invalid_host', "Неверно введен хост базы данных.");
define('db_error_invalid_user_and_pass', "Неверное имя пользователя базы данных и/или пароль.");
define('db_error_invalid_database', "Неверная база данных.");
define('db_unknown_error', "Неизвестная ошибка базы данных: %s");
define('db_error_module_missing', "Обязательные базы данных PHP модуль отсутствует.");
define('db_error_invalid_db_type', "Неверный тип базы данных в конфигурационном файле.");

// home.php
define('invalid_login_information', "Неверная регистрационная информация.");
define('failed_to_read_config', "Не удалось прочитать файл конфигурации.");
define('account_expired', "Ваш аккаунт просрочен.");
define('contact_admin_to_enable_account', "Свяжитесь с администратором для восстановления аккаунта.");
define('maintenance_mode_on', "Режим обслуживания");
define('logging_out_10', "Выход через 10 секунд");
define('invalid_redirect', "Перенаправление");
define('copyright', "copyright");
define('all_rights_reserved', "Все права защищены");
define('queries_executed', "запросов к базе");
define('cur_theme', "%s тема оформления");

// index.php
define('login_title', "Вход в панель управления");
define('lang', "Язык");

// includes/navig.php
define('module_not_installed', "Модуль не установлен");

// Common
define('no_access_to_home', "У вас нет доступа для этого действия.");
define('not_available', "N/A");
define('offline', "Offline");
define('online', "Online");
define('invalid_url', "Неверный URL");

// XML parsing
define('xml_file_not_valid', "XML файл '%s' не может быть проверен с помощью схемы '%s'.");
define('unable_to_load_xml', "Невозможно загрузить XML файл '%s'. Проблема с правами доступа?");

// User Menu
define('gamemanager', "Управление");
define('game_monitor', "Мониторинг");
define('dashboard', "Главная");
define('user_addons', "Аддоны");
define('ftp', "FTP");
define('shop', "Магазин");

// Admin Menu
define('administration', "Админка");
define('config_games', "Игры/Моды конфигурация");
define('modulemanager', "Модули");
define('server', "Физические серверы");
define('settings', "Настройки панели");
define('themes', "Настройки темы");
define('user_admin', "Пользователи");
define('sub_users', "Sub Users");
define('show_groups', "Группы");
define('user_games', "Игровые серверы");
define('addons_manager', "Менеджер аддонов");
define('ftp_admin', "пользователи FTP");
define('orders', "Заказы");
define('services', "Услуги");
define('update', "Обновление панели");
define('extras', "Добавочный");
define('watch_logger', "Watch Logger");

// Server Selector
define('show', "Показать");
define('show_all', "Показать все сервера");
define("TS3Admin", "TS3Admin");
define("shop_settings", "настройка магазина");

// Get home path size
define('get_size', "Get size");
define('total_size', "Total size");
define('lgsl', 'Lgsl');
define('lgsl_admin', 'Lgsl admin');
define('rcon', 'Rcon');
?>