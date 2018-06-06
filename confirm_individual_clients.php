<?php

require_once ('MysqliDb.php');

$id_cliente = $_POST["id"];

$data = Array (
	'confirmado' => 'Sim'
);
$db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
$db -> where("id_perfil", $id_cliente);
$db -> update('perfis', $data);