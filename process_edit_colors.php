<?php
session_start();
require_once ('MysqliDb.php');
$db = new MysqliDb ('localhost', 'root', '', 'perfectmatch');
$msg = "";


	if (isset($_POST['upload'])) {
         
        $nomecor = $_POST["nomecores"];
    
        $db -> where("id_login", $_SESSION['id_login']);
        $perfil_logado = $db -> get("perfis");
        
        $db -> where("id_perfil", $perfil_logado[0]["id_perfil"]);
        $db -> delete("cores");
        
        for ($i = 0; $i < count($nomecor); $i++){
            if (strlen((string)$nomecor[$i])!==0){
                          
                $data = Array (
	                'nome_cor' => $nomecor[i],
                              
                    'id_perfil' => $perfil_logado[0]["id_perfil"]
	             );
                $db -> insert("cores", $data);
            }
            
      } 
        
        

        header("Location: mainPage.php");
    }
header("Location: mainPage.php");
?>