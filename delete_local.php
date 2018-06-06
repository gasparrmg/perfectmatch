<?php

require_once ('MysqliDb.php');
$db = new MysqliDb('localhost', 'root', '', 'perfectmatch');

$id_local = $_POST["id"];

$db -> where("id_local",$id_local);
$db -> delete('locais');