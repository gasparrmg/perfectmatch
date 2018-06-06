<?php
session_start();
require_once ('MysqliDb.php');
$db = new MysqliDb ('localhost', 'root', '', 'perfectmatch');
$msg = "";

	if (isset($_POST['upload'])) {
        
        $artista = $_POST["artistas"];
        $nomemusica = $_POST["nomemusicas"];
        $genero = $_POST["generos"];
    
        $db -> where("id_login", $_SESSION['id_login']);
        $perfil_logado = $db -> get("perfis");
        
        $db -> where("id_perfil", $perfil_logado[0]["id_perfil"]);
        $db -> delete("musica");
        
        for ($i = 0; $i < count($artista); $i++){
            if (strlen((string)$artista[$i])!==0 && strlen((string)$nomemusica[$i])!==0){
   
                $data = Array (
	                'artista' => $artista[$i],
            
                    'nome_musica' => $nomemusica[$i],
	        
                    'genero' => $genero[$i],
                    
                    'id_perfil' => $perfil_logado[0]["id_perfil"]
	             );
                $db -> insert("musica", $data);
            }
            
      } 
        
        

        header("Location: mainPage.php");
    }
header("Location: mainPage.php");
?>