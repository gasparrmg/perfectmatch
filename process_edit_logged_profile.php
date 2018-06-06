<?php
session_start();
require_once ('MysqliDb.php');
$db = new MysqliDb ('localhost', 'root', '', 'perfectmatch');
$msg = "";

	if (isset($_POST['upload'])) {
        
        $ava = $_SESSION['id_login'];
        
        $data = Array (
	       'primeiro_nome' => $_POST['primeironome'],
	       'ultimo_nome' => $_POST['ultimonome'],
	       'genero' => $_POST['genero'],
           'data_nascimento' => $_POST['datanascimento'],
           'orientação' => $_POST['orientacao'], 
           'escolaridade' => $_POST['escolaridade'], 
           'email' => $_POST['email'],
           'morada' => $_POST['morada'],
           'codigo_postal' => $_POST['codigopostal'],
           'distrito' => $_POST['distrito'],
           'concelho' => $_POST['concelho'],
           'freguesia' => $_POST['freguesia'],
           'descrição' => $_POST['descricao'],
           'instagram' => $_POST['instagram'],
           'facebook' => $_POST['facebook'],
           'skype' => $_POST['skype'],
	    );
        
        $db->where ('id_login', $ava);
        $db->update ('perfis', $data);
        

        header("Location: mainPage.php");
	}
header("Location: mainPage.php");
?>