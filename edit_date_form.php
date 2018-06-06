<?php

require_once ('../MysqliDb.php');
$db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
if(strlen($_POST["dia"]) !== 0 && strlen($_POST["hora"]) !== 0){
    $date = $_POST["dia"];
    $time = $_POST["hora"];
    $merge = $date. ' ' .$time;
    $data = array(
        'date&time' => $merge
    );
    $db -> where('id_encontro', $_POST["id_encontro"]);
    $db -> update('encontros', $data);
}
header ('location: ../mainPage.php');
