<?php
// servers.php
define('ip_administration', "Servidores - Administración de IPs");
define('add_new_remote_host', "Nuevo servidor remoto");
define('configured_remote_hosts', "Servidores remotos instalados");
define('remote_host', "Servidor remoto");
define('remote_host_info', "Se debe poder hacer ping al servidor remoto!");
define('remote_host_port', "Puerto del servidor remoto");
define('remote_host_port_info', "Puerto de escucha para el agente OGP. Por defecto: 12679.");
define('remote_host_name', "Nombre del servidor remoto");
define('remote_host_name_info', "Solo sirve para que lo identifiquen los usuarios.");
define('add_remote_host', "Asignar servidor remoto");
define('remote_encryption_key', "Clave de cifrado del servidor remoto");
define('remote_encryption_key_info', "La clave de cifrado remota se utiliza para cifrar los datos entre las páginas web y el agente. Esta clave debe ser igual en ambos.");
define('server_name', "Nombre del servidor");
define('agent_ip_port', "IP:Puerto");
define('agent_status', "Estado del servidor");
define('ips', "IPs");
define('add_more_ips', "Si desea introducir mas IPs, cuando todos los campos esten llenos un campo vacio aparecera.");
define('encryption_key_mismatch', "La clave de cifrado no coincide con el agente. Vuelva a revisar sus archivos de configuración.");
define('no_ip_for_remote_host', "Es necesario añadir al menos una (1)<br>dirección IP para cada servidor remoto.");
define('note_remote_host', "Un servidor remoto es un servidor en el que el agente se está ejecutando para OGP.<br>Cada servidor puede tener varias IP en las que los usuarios pueden vincular sus partidas.");// edit_server.php
define('invalid_remote_host_id', "La ID de servidor remoto '%s' no es valida.");
define('remote_host_removed', "El servidor remoto llamado '%s' se elimino correctamente.");
define('editing_remote_server', "Editando el servidor remoto '%s'");
define('remote_server_settings_changed', "Configuracion cambiada para el servidor remoto '%s' correctamente.");
define('save_settings', "Guardar cambios");
define('set_ips', "Asignar IPs");
define('remote_ip', "IP remota");
define('remote_ips_for', "IPs para el servidor remoto llamado '%s'");
define('ips_set_for_server', "IPs asignadas al servidor remoto '%s' correctamente.");
define('added_server', "Se ha agregado el servidor con IP");
define('with_port', "y puerto");
define('to_db_succesfully', "a la base de datos sadisfactoriamente.");
define('unable_discover', "No se ha podido detectar la IP del servidor en la direccion");
define('set_ip_manually', "Por favor, agregue la direccion o direcciones IP manualmente.");
define('could_not_add_server', "No se pudo agregar el servidor con direccion IP");
define('to_db', "a la base de datos.");
define('areyousure_removeagent', "Desea eliminar el servidor");
define('areyousure_removeagent2', "de la base de datos?");
define('remote_host_user_name', "Usuario UNIX");
define('remote_host_user_name_info', "Usuario de linux donde instalaste el agente.");
define('ogp_user', remote_host_user_name);
define('ogp_user_info', remote_host_user_name_info);
define('found_ips', "Se han detectado las IP");
define('for_remote_server', "para el servidor remoto.");
define('add_ip', "Añadir IP");
define('remove_ip', "Eliminar IP");
define('edit_ip', "Editar IP");
define('remote_host_ftp_ip', "IP FTP");
define('remote_host_ftp_ip_info', "La <b>IP</b> para conectarse al servidor FTP de este servidor (agente).");
define('remote_host_ftp_port', "Puerto FTP");
define('remote_host_ftp_port_info', "El <b>puerto</b> para conectarse al servidor FTP de este servidor (agente).");
define('view_log', "Ver&nbsp;log");
define('timeout', "TimeOut");
define('timeout_info', "Limite de espera, en segundos, para que este agente responda.");
define('use_nat', "Usar NAT");
define('use_nat_info', "Activalo si tu servidor remoto está usando reglas NAT.");
define('status', "Estado:");
define('stop_firewall', "Parar Cortafuegos");
define('start_firewall', "Iniciar Cortafuegos");
define('seconds', "Segundos");
define('wrote_changes', "Cambios guardados");
define("unknown_error", "Error desconocido.");
define("could_not_remove_ip", "No se pudo eliminar la IP.");
define("could_add_ip", "Imposible añadir la IP.");
define("error_while_remove", "Error al intentar eliminar.");
define("enter_ip_host", "Introduzca la IP del host.");
define("enter_valid_ip", "Introduzca una IP valida.");
define("failed_add_ip", "Error al añadir la IP.");
define('there_are_servers_running_on_this_ip', "Hay servidores ejecutandose en esta dirección IP.");
define('reboot', "Remote Server Reboot");
define('restart', "Restart Agent");
define('confirm_reboot', "Are you sure you want to remotely reboot the entire physical server named '%s'?");
define('confirm_restart', "Are you sure you want to restart the agent named '%s'?");
define('restarting', "Restarting agent... Please wait.");
define('restarted', "Agent successfully restarted.");
define('reboot_success', "Server named '%s' was successfully rebooted. You will not be able to access the server until it has successfully booted.");

// arrange_servers.php
define('arrange_ports', "Organizar puertos");
define('assign_new_ports_range_for_ip', "Asignar nuevo intervalo de puertos para la IP %s");
define('assigned_port_ranges_for_ip', "Intervalos de puertos asignados para la IP %s");
define('assigned_ports_for_ip', "Puertos asignados para la IP %s");
define('unspecified_game_types', "Tipos de juego sín especificar");
define('start_port', "Puerto inicial:");
define('end_port', "Puerto final:");
define('port_increment', "Incremento de puertos:");
define('total_assignable_ports', "Total de puertos asignables:");
define('available_range_ports', "Puertos del intervalo disponibles:");
define('assign_range', "Asignar intervalo");
define('edit_range', "Editar intervalo");
define('delete_range', "Eliminar intervalo");
define('home_id', "ID servidor");
define('home_path', "Ruta servidor");
define('game_type', "Tipo de juego");
define('port', "Puerto");
define('invalid_values', "Valores no validos.");
define('ports_in_range_already_arranged', "Puertos en el intervalo ya asignados.");
define('ports_range_already_configured_for', "El intervalo de puertos para %s ya está configurado.");
define('ports_range_added_successfull_for', "Intervalo de puertos añadido correctamente para %s.");
define('ports_range_deleted_successfull', "Intervalo de puertos eliminado correctamente.");
define('ports_range_edited_successfull_for', "Intervalo de puertos para %s editado correctamente.");

// Firewall
define('editing_firewall_for_remote_server', 'Editando el cortafuegos para el servidor remoto llamado "%s"');
define('default_allowed', 'Permitido por defecto');
define('allow_port_command', 'Comando permitir puerto');
define('deny_port_command', 'Comando denegar puerto');
define('allow_ip_port_command', 'Comando permitir IP:puerto');
define('deny_ip_port_command', 'Comando denegar IP:puerto');
define('enable_firewall_command', 'Comando activar cortafuegos');
define('disable_firewall_command', 'Comando desactivar cortafuegos');
define('get_firewall_status_command', 'Comando mostrar estado cortafuegos');
define('reset_firewall_command', 'Comando restablecer cortafuegos');
define('firewall_status', 'Estado cortafuegos');
define('save_firewall_settings', 'Guardar configuración cortafuegos');
define('reset_firewall', 'Restablecer cortafuegos');
define('firewall_settings', 'Configuración cortafuegos');
?>