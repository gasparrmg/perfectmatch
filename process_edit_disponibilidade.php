<?php
session_start();
require_once ('MysqliDb.php');
$db = new MysqliDb ('localhost', 'root', '', 'perfectmatch');
$msg = "";

	if (isset($_POST['upload'])) {
        
        $diasemana = $_POST["diasemana"];
        $horasinicio = $_POST["horasinicio"];
        $minutosinicio = $_POST["minutosinicio"];
        $horasfim = $_POST["horasfim"];
        $minutosfim = $_POST["minutosfim"];
    
        $db -> where("id_login", $_SESSION['id_login']);
        $perfil_logado = $db -> get("perfis");
        
        $db -> where("id_perfil", $perfil_logado[0]["id_perfil"]);
        $db -> delete("disponibilidades");
        
        for ($i = 0; $i < count($horasinicio); $i++){
            if (strlen((string)$horasinicio[$i])!==0 && strlen((string)$minutosinicio[$i])!==0 && strlen((string)$horasfim[$i])!==0 && strlen((string)$minutosfim[$i])!==0){
                $timeinicio = ($horasinicio[$i].":".$minutosinicio[$i]);
                $timefim = ($horasfim[$i].":".$minutosfim[$i]);    
                $data = Array (
	                'dia_semana' => $diasemana[$i],
            
                    'time_inicio' => $timeinicio,
	        
                    'time_fim' => $timefim,
                    
                    'id_perfil' => $perfil_logado[0]["id_perfil"]
	             );
                $db -> insert("disponibilidades", $data);
            }
            
        } 
        
        

        header("Location: mainPage.php");
	}
header("Location: mainPage.php");
?>