<?php

require_once ('MysqliDb.php');
$db = new MysqliDb('localhost', 'root', '', 'perfectmatch');

$id_interesse = $_POST["id"];
if ($_POST["id"] > 3) {
    $db->where("id_campo", $id_interesse);
    $db->delete('especificacoes_campos');
    
    $db->where("id_campo", $id_interesse);
    $tabela = $db -> get("inputs_campos_interesse");
    $query_drop_table = 'DROP TABLE '.$tabela[0]["nome_tabela_criada"];
    $db -> rawQuery($query_drop_table);
    
    $db->where("id_campo", $id_interesse);
    $db->delete('inputs_campos_interesse');
    
    $db -> where ("id_campo", $id_interesse);
    $db -> delete("interesses");
    
    $db->where("id_campo", $id_interesse);
    $db->delete('campos_de_interesse');
}
