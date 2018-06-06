<?php

require_once ('MysqliDb.php');
$db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
$id_cliente = $_POST["id"];


/*
 * eliminar interesses
 * fazer cascade a quando ele puder adicionar interesses (com loops)
 */
 
$db -> where("id_perfil", $id_cliente);
$db -> delete('interesses');

$db -> where("id_perfil", $id_cliente);
$db -> delete('filmes');

$db -> where("id_perfil", $id_cliente);
$db -> delete('musica');

$db -> where("id_perfil", $id_cliente);
$db -> delete('cores');

/*
 * eliminar disponibilidade
 */
$db -> where("id_perfil", $id_cliente);
$db -> delete('disponibilidades');
/*
 * eliminar encontros
 */
$db -> where("id_perfil1", $id_cliente);
$db -> orWhere("id_perfil2", $id_cliente);
$db -> delete('encontros');
/*
 * eliminar login
 */

/*
 * eliminar mensagens
 */
$db -> where("id_perfil_sender", $id_cliente);
$db -> orWhere("id_perfil_receiver", $id_cliente);
$db -> delete('mensagens');


/*
 * Delete login e perfis
 */
$db-> where("id_perfil", $id_cliente);
$login = $db -> get("perfis");
$db -> where("id_login", $login[0]["id_login"]);
$db -> delete('login');

$db -> where("id_perfil", $id_cliente);
$db -> delete('perfis');


