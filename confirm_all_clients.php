<?php

require_once ('MysqliDb.php');
$db = new MysqliDb('localhost', 'root', '', 'perfectmatch');

$data = array(
    'confirmado' => 'Sim'
);

$db->update('perfis', $data);