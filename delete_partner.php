<?php
require_once ('MysqliDb.php');
$db = new MysqliDb('localhost', 'root', '', 'perfectmatch');

$id_parceiro = $_POST["id"];

$db -> where("id_parceiro", $id_parceiro);
$db -> delete('locais');

$db -> where("id_parceiro", $id_parceiro);
$db -> delete('parceiros');