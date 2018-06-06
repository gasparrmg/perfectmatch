<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
                <style>
            .card-user {
    border-radius: 4px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), 0 0 0 1px rgba(63, 63, 68, 0.1);
    background-color: #FFFFFF;
    margin-bottom: 30px; 
}
            
        </style>
        
    </head>
    <body>
        <?php
        
                    require_once('MysqliDb.php');
        
            // buscar linha perfil brad
                    session_start();
                    $db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
                    $db -> where ('id_login', $_SESSION['id_login']);
                    $result = $db -> get('perfis');
                    
                    $id = $result[0]["id_perfil"];
                    
            //buscar encontros em que o brad está envolvido que estão pendentes
                    //$db -> where('aprovacao_p1', 'Pendente');
                    //$db -> orWhere('aprovacao_p2', 'Pendente');
                    //$db -> where('id_perfil1', $id);
                    //$db -> orWhere('id_perfil2', $id);
        
                    
        
                    $results = $db -> rawQuery('SELECT * FROM encontros WHERE (id_perfil1 = '.$id.' and aprovacao_p1 = "Pendente") or (id_perfil2 = '.$id.' and aprovacao_p2 = "Pendente");');
                    
                    //$results = $db -> get('encontros'); //conjunto dos encontros do brad
        
                    //select * from encontros where (id_perfil1 = $id or id_perfil2 = $id) AND (aprovacao_p1 = 'Pendente' or aprovacao_p2 = 'Pendente')
                    $count = 0;
                    if (count($results) > 0) {  //conjunto de dates
                        
                        for($i = 0; $i < count($results); $i++) { //um date
                            
                                if($count === 0){
                                    echo '<div class = "row">';
                                }
                            
                                
                            
                                if($id === $results[$i]['id_perfil1']){
                                    //buscar perfil do date do brad (id2)
                                    
                                    $db -> where ('id_perfil', $results[$i]['id_perfil2']); 
                                    $resultPerfilDate = $db -> get('perfis');
                                    
                                    if($results[$i]['aprovacao_p1'] === "Pendente"){
                                        
                                         echo '<div class="col-md-3"><div class="card card-user card-date" style = "top: 0;"><br>';
                                        
                                        if(count($resultPerfilDate > 0)){
                                            echo '<img class ="avatar" src = "avatars/'.$resultPerfilDate[0]["avatar"].'"><br><br>';

                                            echo '<h2 class="title"><a id="'.$results[$i]["id_encontro"].'" href = "" value = "suggestions_see_date.php">'.$resultPerfilDate[0]["primeiro_nome"].' '.$resultPerfilDate[0]["ultimo_nome"].'</a></h2>';
                                            if(strlen($resultPerfilDate[0]["descrição"]) === 0){
                                                echo '<p class="category"><br></p>';
                                            }else{
                                                echo '<p class="category">'.$resultPerfilDate[0]["descrição"].'</p>';
                                            }
                                            echo '<a href="#"><i class="fa fa-instagram"></i></a>';
                                            echo '<a href="#"><i class="fa fa-facebook"></i></a>';
                                            echo '<a href="#"><i class="fa fa-skype"></i></a>';
                                            $campos_interesse = $db -> get("inputs_campos_interesse");
                                            
                                            echo '<hr><p style = "font-size: 90%">Campos de interesse em comum: ';
                                            $count2 = 0;
                                            foreach($campos_interesse as $campo){
                                                if($results[$i]["score_".$campo["nome_tabela_criada"]] > 40){
                                                    $count2++;
                                                }
                                            }
                                            $count3 = 0;
                                            foreach($campos_interesse as $campo){
                                                if($results[$i]["score_".$campo["nome_tabela_criada"]] > 40){
                                                    $count3++;
                                                    if($count3 != $count2){
                                                        if(strcasecmp($campo["nome_tabela_criada"], "musica") === 0){
                                                            echo "música, ";
                                                        } else {
                                                            echo $campo["nome_tabela_criada"].', ';                                                            
                                                        }
                                                        
                                                    } else {
                                                        if(strcasecmp($campo["nome_tabela_criada"], "musica") === 0){
                                                            echo "música.";
                                                        } else {
                                                            echo $campo["nome_tabela_criada"].'.';                                                            
                                                        }
                                                        $count3 = 0;
                                                    }
                                                    
                                                }
                                            }
                                            
                                            echo '</p><hr><p><form action = "processforms/process_suggestions.php" method = "post"><input type="text" style="display:none;" name="nrAprovacao" value="1"><input type="text" style="display:none;" name="idDate" value='.$results[$i]['id_encontro'].'><div class = "row"><div class = "col-md-3 col-md-offset-3"><button type="submit" name="aceite" class="btn btn-success btn-lg">Aceitar</button></div><div class = "col-md-3"><button type="submit" name="recusado" class="btn btn-danger btn-lg">Recusar</button></div></div></form></p>';
                                            echo '</div></div>';
                                            
                                        }

                                    }
                                    
                                } else {
                                    //buscar perfil do date do brad (id1)
                                    $db -> where ('id_perfil', $results[$i]['id_perfil1']); 
                                    $resultPerfilDate = $db -> get('perfis');
                                    
                                    if($results[$i]['aprovacao_p2'] === "Pendente"){
                                        
                                         echo '<div class="col-md-3"><div class="card card-user card-date" style = "top: 0;"><br>';
                                        
                                        if(count($resultPerfilDate > 0)){
                                            echo '<img class ="avatar" src = "avatars/'.$resultPerfilDate[0]["avatar"].'"><br><br>';

                                            echo '<h2 class="title"><a id="'.$results[$i]["id_encontro"].'" href = "" value = "suggestions_see_date.php">'.$resultPerfilDate[0]["primeiro_nome"].' '.$resultPerfilDate[0]["ultimo_nome"].'</a></h2>';
                                            if(strlen($resultPerfilDate[0]["descrição"]) === 0){
                                                echo '<p class="category"><br></p>';
                                            }else{
                                                echo '<p class="category">'.$resultPerfilDate[0]["descrição"].'</p>';
                                            }
                                            echo '<a href="#"><i class="fa fa-instagram"></i></a>';
                                            echo '<a href="#"><i class="fa fa-facebook"></i></a>';
                                            echo '<a href="#"><i class="fa fa-skype"></i></a>';
                                            $campos_interesse = $db -> get("inputs_campos_interesse");
                                            
                                            echo '<hr><p style = "font-size: 90%">Campos de interesse em comum: ';
                                            $count2 = 0;
                                            foreach($campos_interesse as $campo){
                                                if($results[$i]["score_".$campo["nome_tabela_criada"]] > 40){
                                                    $count2++;
                                                }
                                            }
                                            $count3 = 0;
                                            foreach($campos_interesse as $campo){
                                                if($results[$i]["score_".$campo["nome_tabela_criada"]] > 40){
                                                    $count3++;
                                                    if($count3 != $count2){
                                                        if(strcasecmp($campo["nome_tabela_criada"], "musica") === 0){
                                                            echo "música, ";
                                                        } else {
                                                            echo $campo["nome_tabela_criada"].', ';                                                            
                                                        }
                                                        
                                                    } else {
                                                        if(strcasecmp($campo["nome_tabela_criada"], "musica") === 0){
                                                            echo "música.";
                                                        } else {
                                                            echo $campo["nome_tabela_criada"].'.';                                                            
                                                        }
                                                        $count3 = 0;
                                                    }
                                                    
                                                }
                                            }
                                            
                                            echo '</p><hr><p><form action = "processforms/process_suggestions.php" method = "post"><input type="text" style="display:none;" name="nrAprovacao" value="1"><input type="text" style="display:none;" name="idDate" value='.$results[$i]['id_encontro'].'><div class = "row"><div class = "col-md-3 col-md-offset-3"><button type="submit" name="aceite" class="btn btn-success btn-lg">Aceitar</button></div><div class = "col-md-3"><button type="submit" name="recusado" class="btn btn-danger btn-lg">Recusar</button></div></div></form></p>';
                                            echo '</div></div>';
                                        }
                                        
                                    }
                                      
                                }

                                
                                
                                if($count === 3){
                                    $count = 0;
                                    echo '</div>';
                                }
                                $count++;
                            
                        }
                    }

        ?>
        
        
            
            
        </div>
    </body>
</html>