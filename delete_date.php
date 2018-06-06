<?php

require_once ('MysqliDb.php');
$db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
$id_date = $_POST["id"];

$db -> where("id_encontro", $id_date);
$perfis = $db -> get('encontros');

$db -> where("id_perfil_sender", $perfis[0]["id_perfil1"]);
$db -> where("id_perfil_receiver", $perfis[0]["id_perfil2"]);
$db -> delete('mensagens');

$db -> where("id_perfil_sender", $perfis[0]["id_perfil2"]);
$db -> where("id_perfil_receiver", $perfis[0]["id_perfil1"]);
$db -> delete('mensagens');

$db -> where("id_encontro", $id_date);
$db -> delete('encontros');