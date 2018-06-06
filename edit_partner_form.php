<?php

require_once ('../MysqliDb.php');
$db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
if(strlen($_POST["nome"]) !== 0){
    $data = array(
        'nome_parceiro' => $_POST["nome"]
    );
    $db -> where('id_parceiro', $_POST["partnerID"]);
    $db -> update('parceiros', $data);
}
if(strlen($_POST["description"]) !== 0){
    $data = array(
        'descrição' => $_POST["description"]
    );
    $db -> where('id_parceiro', $_POST["partnerID"]);
    $db -> update('parceiros', $data);
}
if(strlen($_POST["categoria"]) !== 0){
    $db -> where("nome_campo", '%'.$_POST["categoria"].'%', 'like');
    $campo = $db -> get("campos_de_interesse");
    $data = array(
        'id_campo' => $campo[0]["id_campo"]
    );
    $db -> where('id_parceiro', $_POST["partnerID"]);
    $db -> update('parceiros', $data);
}
if($_FILES['image']['size'] !== 0 ){
    $target = "../img_parceiros/".basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $data = array(
        "foto" => $image
    );
    $db -> where('id_parceiro', $_POST["partnerID"]);
    $db -> update('parceiros', $data);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
}

$db->where('id_parceiro', $_POST["partnerID"]);
$db->delete('locais');


$moradas = $_POST["morada"];
print_r($moradas);

    for ($i = 0; $i < count($moradas); $i++) {
        if(strlen($moradas[$i]) > 0){
            $data = array(
                "nome_local" => $moradas[$i],
                "id_parceiro" => $_POST["partnerID"]
            );
            $db->insert("locais", $data);
        }
            
    }
    
header("Location: ../mainPage.php");