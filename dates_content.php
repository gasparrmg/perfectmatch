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
                    
        //buscar encontros em que o brad está envolvido
                    $curr_date = date('Y/m/d h:i:s', time());
                    $results = $db ->rawQuery('SELECT * FROM encontros WHERE (id_perfil1 = '.$id.' or id_perfil2 = '.$id.') and (aprovacao_p1 = "Sim" and aprovacao_p2 = "Sim") and `date&time` > "'.$curr_date.'";'); //conjunto dos encontros do brad
        
        //selecionar aqueles que já passaram
        
                    $currentTime = date('Y/m/d h:i:s', time());
                    
        
        
        //mostrar encontros do brad
        
                    if (count($results) > 0) {  //conjunto de dates
                        $count = 1;
                        for($i = 0; $i < count($results); $i++) { //um date
                            
                            $teste = str_replace('-', '/', $results[$i]['date&time']);
                            
                            if($currentTime < $teste){
                                if($count === 1){
                                    echo '<div class = "row">';
                                }
                            
                                echo '<div class="col-md-3"><div class="card card-user card-date" style = "top: 0;"><br>';
                            
                                if($id === $results[$i]['id_perfil1']){
                                    //buscar perfil do date do brad (id2)
                                    $db -> where ('id_perfil', $results[$i]['id_perfil2']); 
                                    $resultPerfilDate = $db -> get('perfis');
                                    if(count($resultPerfilDate > 0)){
                                        echo '<img class ="avatar" src = "avatars/'.$resultPerfilDate[0]["avatar"].'"><br><br>';

                                        echo '<h2 class="title"><a id="'.$results[$i]["id_encontro"].'" href = "" value = "encontros.php">'.$resultPerfilDate[0]["primeiro_nome"].' '.$resultPerfilDate[0]["ultimo_nome"].'</a></h2>';
                                        if(strlen($resultPerfilDate[0]["descrição"]) === 0){
                                            echo '<p></p>';
                                        }else{
                                            echo '<p class="category">'.$resultPerfilDate[0]["descrição"].'</p>';
                                        }
                                        echo '<a href="#"><i class="fa fa-instagram"></i></a>';
                                        echo '<a href="#"><i class="fa fa-facebook"></i></a>';
                                        echo '<a href="#"><i class="fa fa-skype"></i></a>';

                                    }
                                } else {
                                    //buscar perfil do date do brad (id1)
                                    $db -> where ('id_perfil', $results[$i]['id_perfil1']); 
                                    $resultPerfilDate = $db -> get('perfis');
                                    if(count($resultPerfilDate > 0)){
                                        echo '<img class ="avatar" src = "avatars/'.$resultPerfilDate[0]["avatar"].'"><br><br>';

                                        echo '<h2 class="title"><a id="'.$results[$i]["id_encontro"].'" href = "" value = "encontros.php">'.$resultPerfilDate[0]["primeiro_nome"].' '.$resultPerfilDate[0]["ultimo_nome"].'</a></h2>';
                                        if(strlen($resultPerfilDate[0]["descrição"]) === 0){
                                            echo '<p></p>';
                                        }else{
                                            echo '<p class="category">'.$resultPerfilDate[0]["descrição"].'</p>';
                                        }

                                        echo '<a href="#"><i class="fa fa-instagram"></i></a>';
                                        echo '<a href="#"><i class="fa fa-facebook"></i></a>';
                                        echo '<a href="#"><i class="fa fa-skype"></i></a>';

                                    }    
                                }

                                echo '</div></div>';
                                $count++;
                                if($count === 4){
                                    $count = 0;
                                    echo '</div>';
                                }
                            }
                            else {
                            }
                            
                        }
                    }
                    
                    ?>
    </body>
</html>