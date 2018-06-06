<?php
session_start();
require_once ('MysqliDb.php');
$db = new MysqliDb ('localhost', 'root', '', 'perfectmatch');
$msg = "";
$apiKey = "3c2df63ca9357eee202bdb3bfe873971";

	if (isset($_POST['upload'])) {
         
        $nomefilme = $_POST["nomefilmes"];
        $realizador = $_POST["realizadores"];
        $genero = $_POST["generos"];
    
        $db -> where("id_login", $_SESSION['id_login']);
        $perfil_logado = $db -> get("perfis");
        
        $db -> where("id_perfil", $perfil_logado[0]["id_perfil"]);
        $db -> delete("filmes");
        
        for ($i = 0; $i < count($nomefilme); $i++){
            if (strlen((string)$nomefilme[$i])!==0 && strlen((string)$realizador[$i])!==0 && strlen((string)$genero[$i])!==0){
                
                $url_movie_search = 'https://api.themoviedb.org/3/search/movie?api_key=' . $apiKey . '&query=' . urlencode($nomefilme[$i]);
                $json_movies = file_get_contents($url_movie_search);
                $movies_array = json_decode($json_movies, true);
                $usable_movies = $movies_array['results'];
                
                $data = Array (
	                'nome_filme' => $nomefilme[$i],
            
                    'realizador' => $realizador[$i],
	        
                    'genero' => $genero[$i],
                    
                    'id_perfil' => $perfil_logado[0]["id_perfil"],
                    
                    'id_api' => $usable_movies[0]['id']
	             );
                $db -> insert("filmes", $data);
            }
            
      } 
        
        

        header("Location: mainPage.php");
    }
header("Location: mainPage.php");
?>