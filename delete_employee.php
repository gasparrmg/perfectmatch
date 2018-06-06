<?php
require_once ('MysqliDb.php');
$db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
$id_empregado = $_POST["id"];
/*
 * Delete login e empregados
 */
$db-> where("id_empregado", $id_empregado);
$login = $db -> get("empregados");
$db -> where("id_login", $login[0]["id_login"]);
$db -> delete('login');

$db-> where("id_empregado", $id_empregado);
$db -> delete('empregados');


