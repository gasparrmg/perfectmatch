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
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'/>
        <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />

        <!--- Stylesheets--->
        <link rel = "stylesheet" href = "css/main.page.style.css"/>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css"/>
    </head>
    <body id = "body">
        <div class="row">
            <div class="col-sm-3 ">
                <div class="card card-user card-click">
                    
                    <br>
                    <?php
                    session_start();
                    require_once('MysqliDb.php');
                    $db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
                    $db -> where ('id_login', $_SESSION['id_login']);
                    $results = $db -> get('perfis');
                    
                    if(count($results > 0)){
                        echo '<img class ="avatar" src = "avatars/'.$results[0]["avatar"].'">';
                    }
                    
                    ?>
                    <br><br>
                    
                        <h2 class="title"><a href = "" value="profile_content.php" style = "text-decoration: none;  color: inherit;"> <?php echo $results[0]["primeiro_nome"]; echo " "; echo $results[0]["ultimo_nome"]; ?></a></h2>
                    
                    <p class="category"><?php echo $results[0]["descrição"]; ?></p>
                    <a href="<?php echo $results[0]["twitter"]; ?>"  target="_blank"><i class="fa fa-twitter"></i></a>  
                    <a href="<?php echo $results[0]["skype"]; ?>" target="_blank"><i class="fa fa-skype"></i></a>  
                    <a href="<?php echo $results[0]["facebook"]; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    <?php
                    $general_contains_empty = in_array("", $results[0], true);
                    $db -> where("id_perfil", $results[0]["id_perfil"]);
                    $profile_disponibility = $db -> getOne("disponibilidades");
                    $campos_interesse = $db -> get("inputs_campos_interesse");
                    $is_any_interest_empty = false;
                    foreach($campos_interesse as $campos){
                        $db -> where("id_perfil", $results[0]["id_perfil"]);
                        $profile_field = $db -> getOne($campos["nome_tabela_criada"]);
                        if(count($profile_field) == 0){
                            $is_any_interest_empty = true;
                            break;
                        }
                    }
                    $is_disponibility_empty = false;
                    if(count($profile_disponibility) == 0){
                        $is_disponibility_empty = true;
                    }
                    if($general_contains_empty || $is_disponibility_empty || $is_any_interest_empty){
                        echo '<div class = "footer"><hr><p>Tem campos por preencher no perfil</p></div>';
                    } else {
                        echo '<div class = "footer"><hr><p>Tem o perfil completo</p></div>';
                    }
                    ?>
                    
                </div>
            </div>

            <div class="col-sm-5 ">
                <?php 
                    $suggestion_dates = $db ->rawQuery('SELECT * FROM encontros WHERE (id_perfil1 = '.$results[0]["id_perfil"].' and aprovacao_p1 = "Pendente") or (id_perfil2 = '.$results[0]["id_perfil"].' and aprovacao_p2 = "Pendente");');
                ?>
                <div class="card card-inverse home-card card-click" style = "color:#FFF; ">
                    <a href = "" value="suggestions_content.php" style = "text-decoration: none;  color: inherit;">
                    <img class="card-img" src = "img/encontros.jpg" style = "height: 100%; width:100%;-webkit-filter: blur(3px);-moz-filter: blur(3px);-o-filter: blur(3px);-ms-filter: blur(3px);filter: blur(3px);">
                    <div class="card-img-overlay" style = "background-color:rgba(0, 0, 0, 0.3);">
                        <div class="header" style = "text-align:center; padding-top: 100px;">
                            <h1><b>Sugestões de encontros</b></h1>
                            <p class="category"></p>
                        </div>
                        <div class="content"  style = "text-align:center;">
                            <h2>Tem <?php echo count($suggestion_dates); ?> novas sugestões de encontros pendentes<h2>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <?php
                    $curr_date = date('Y/m/d h:i:s', time());
                    $dates = $db ->rawQuery('SELECT * FROM encontros WHERE (id_perfil1 = '.$results[0]["id_perfil"].' or id_perfil2 = '.$results[0]["id_perfil"].') and (aprovacao_p1 = "Sim" and aprovacao_p2 = "Sim") and `date&time` > "'.$curr_date.'";');
                ?>
                <div class="card card-inverse home-card card-click" style = "color:#FFF; ">
                    <a href = "" value="dates_content.php" style = "text-decoration: none;  color: inherit;">
                    <img class="card-img" src = "img/date-couple.jpeg" style = "height: 100%; width:100%;-webkit-filter: blur(3px);-moz-filter: blur(3px);-o-filter: blur(3px);-ms-filter: blur(3px);filter: blur(3px);">
                    <div class="card-img-overlay" style = "background-color:rgba(0, 0, 0, 0.3);">
                        <div class="header" style = "text-align:center;  padding-top: 100px;">
                            <h1><b>Encontros</b></h1>
                            <p class="category"></p>
                        </div>
                        <div class="content"  style = "text-align:center; ">
                            <h2>Tem <?php echo count($dates); ?> encontros por confirmar ou desmarcar<h2>
                        </div>
                    </div>
                    </a>
                </div>
                
            </div>
        </div>
        <br>
        <div class = "row">
            <div class = "col-sm-3">
                <?php
                    $historic_dates = $db ->rawQuery('select * from encontros where (id_perfil1 = '.$results[0]["id_perfil"].' or id_perfil2 = '.$results[0]["id_perfil"].') and aprovacao_p1 = "Sim" and aprovacao_p2 = "Sim" and `date&time` < "'.$curr_date.'";');
                ?>
                <div class = "card card-click">
                    <a href = "" value="chat_content.php" style = "text-decoration: none;  color: inherit;">
                    <div class="header" style = "text-align:center;">
                        <h1><b>Chat</b></h1>
                        <p class="category"></p>
                    </div>
                    <div class="content"  style = "text-align:center; ">
                        <h2>Converse com as suas <?php echo (count($dates) + count($historic_dates) + count($suggestion_dates)); ?> correspondências.<h2>
                    </div>
                    </a>
                </div>
                
            </div><div class="col-sm-4 col-md-offset-5">
                
                <div class = "card card-click" >
                    <a href = "" value="historic_content.php" style = "text-decoration: none;  color: inherit;">
                    <div class="header" style = "text-align:center;">
                        <h1><b>Histórico de Encontros</b></h1>
                        <p class="category"></p>
                    </div>
                    <div class="content"  style = "text-align:center; ">
                        <h2>Veja todos os <?php echo count($historic_dates); ?> encontros que fez connosco.<h2>
                    </div>
                    </a>
                </div>
                
            </div>
        </div>
    </body>
</html>
