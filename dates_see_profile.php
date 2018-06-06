<?php
session_start();
?>

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

        <!--- Fonts--->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'/>
        <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />

        <!--- Stylesheets--->
        <link rel = "stylesheet" href = "css/main.page.style.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css"/>
        <style>
            .card-user {
                border-radius: 4px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), 0 0 0 1px rgba(63, 63, 68, 0.1);
                background-color: #FFFFFF;
                margin-bottom: 30px;
            }
            .form-control::-moz-placeholder {
                color: #DDDDDD;
                opacity: 1;
                filter: alpha(opacity=100);
            }

            .form-control:-moz-placeholder {
                color: #DDDDDD;
                opacity: 1;
                filter: alpha(opacity=100);
            }

            .form-control::-webkit-input-placeholder {
                color: #DDDDDD;
                opacity: 1;
                filter: alpha(opacity=100);
            }

            .form-control:-ms-input-placeholder {
                color: #DDDDDD;
                opacity: 1;
                filter: alpha(opacity=100);
            }

            .form-control {
                background-color: #FFFFFF;
                border: 1px solid #E3E3E3;
                border-radius: 4px;
                color: #565656;
                padding: 8px 12px;
                height: 40px;
                -webkit-box-shadow: none;
                box-shadow: none;
            }
            .form-control:focus {
                background-color: #FFFFFF;
                border: 1px solid #AAAAAA;
                -webkit-box-shadow: none;
                box-shadow: none;
                outline: 0 !important;
                color: #333333;
            }
            .has-success .form-control, .has-error .form-control, .has-success .form-control:focus, .has-error .form-control:focus {
                border-color: #E3E3E3;
                -webkit-box-shadow: none;
                box-shadow: none;
            }
            .has-success .form-control {
                color: #87CB16;
            }
            .has-success .form-control:focus {
                border-color: #87CB16;
            }
            .has-error .form-control {
                color: #FF4A55;
            }
            .has-error .form-control:focus {
                border-color: #FF4A55;
            }
            .form-control + .form-control-feedback {
                border-radius: 6px;
                font-size: 14px;
                margin-top: -7px;
                position: absolute;
                right: 10px;
                top: 50%;
                vertical-align: middle;
            }
            .open .form-control {
                border-radius: 4px 4px 0 0;
                border-bottom-color: transparent;
            }
            .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
                background-color: #F5F5F5;
                color: #888888;
                cursor: not-allowed;
            }

        </style>

    </head>
    <body>
        <!-- Início perfil geral -->
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="header">
                            <?php
                                $idperfil= $_POST["id"];
                                
                                
                        
                                require_once ('MysqliDb.php');
                                $db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
                                
                        
                                $db -> where ('id_login', $_SESSION['id_login']);
                                $perfillogado = $db -> get('perfis');
                    
                                $idperfillogado = $perfillogado[0]["id_perfil"];
                        
                        
                                $resultado = $db -> rawQuery("SELECT * FROM encontros WHERE (id_perfil1 = ".$idperfil." AND id_perfil2 = ".$idperfillogado.") OR (id_perfil1 = ".$idperfillogado." AND id_perfil2 = ".$idperfil.")");
                        
                                $idcurrentdate = $resultado[0]['id_encontro'];
                        
                                
                                echo '<button type="button" class="btn btn-lg back-see-dates" class="fa fa-undo" id="'.$idcurrentdate.'" aria-hidden="true" value="encontros.php"><i class="fa fa-undo" aria-hidden="true"></i> Voltar</button>';    
                                    
                                $db -> where("id_perfil", $idperfil);
                                $target_profile = $db -> getOne("perfis");
                                    
                            ?>
                        
                        <p><h4 class="title" style = "color: #DC006C;"><b>Perfil de <?php echo $target_profile["primeiro_nome"] . ' ' . $target_profile["ultimo_nome"]; ?></b></h4></p>
                    </div>
                    <div class="content">
                        <form>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Primeiro nome</label>
                                        <input type="text" class="form-control" value="<?php echo $target_profile["primeiro_nome"]; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Último nome</label>
                                        <input type="text" class="form-control" value="<?php echo $target_profile["ultimo_nome"]; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Género</label>
                                        <select class="form-control" disabled>
                                            <?php 
                                            if(strcmp($target_profile[genero], "Masculino") === 0){
                                                echo '<option selected="selected">Masculino</option>';
                                                echo '<option>Feminino</option>';
                                            }
                                            else if(strlen($target_profile[genero]) === 0){
                                                echo '<option selected="selected"></option>';
                                                echo '<option>Masculino</option>';
                                                echo '<option>Feminino</option>';
                                            }
                                            else {
                                                echo '<option selected="selected">Feminino</option>';
                                                echo '<option>Masculino</option>';
                                            }
                                            
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Orientação sexual</label>
                                        <select class="form-control" disabled>
                                            <?php 
                                            if(strcmp($target_profile[orientação], "Heterossexual") === 0){
                                                echo '<option selected="selected">Heterossexual</option>';
                                                echo '<option>Homossexual</option>';
                                                echo '<option>Bissexual</option>';
                                            }
                                            else if(strlen($target_profile[orientação]) === 0){
                                                echo '<option selected="selected"></option>';
                                                echo '<option>Heterossexual</option>';
                                                echo '<option>Homossexual</option>';
                                                echo '<option>Bissexual</option>';
                                            }
                                            else if(strcmp($target_profile[orientação], "Homossexual") === 0){
                                                echo '<option selected="selected">Homossexual</option>';
                                                echo '<option>Heterossexual</option>';
                                                echo '<option>Bissexual</option>';
                                            }
                                            else {
                                                echo '<option selected="selected">Bissexual</option>';
                                                echo '<option>Heterossexual</option>';
                                                echo '<option>Homossexual</option>';
                                            }
                                            
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">E-mail</label>
                                        <input type="email" class="form-control" value="<?php echo $target_profile["email"]; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <label>Data de Nascimento</label>
                                        <input type="date" class="form-control" id="Date" value="<?php echo $target_profile["data_nascimento"]; ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sobre mim</label>
                                        <textarea rows="5" class="form-control" readonly><?php echo $target_profile["descrição"]; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class = "row">
                                <div class = "row">
                                <div class = "col-sm-4">
                                    <label>Facebook</label>
                                    <input name = "facebook" type="text" class="form-control" value="<?php echo $target_profile["facebook"]; ?>" readonly>
                                </div>
                                <div class = "col-sm-4">
                                    <label>Skype</label>
                                    <input name = "skype" type="text" class="form-control" value="<?php echo $target_profile["skype"]; ?>" readonly>
                                </div>
                                <div class = "col-sm-4">
                                    <label>Instagram</label>
                                    <input name = "instagram" type="text" class="form-control" value="<?php echo $target_profile["instagram"]; ?>" readonly>
                                </div>
                            </div>
                            </div>
                            <br>
                            <div class = "row">
                                <div class = "col-sm-4 col-md-offset-8">
                                    
                                </div>

                            </div>
                            <br><br>
                            
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-user" style = "top: 0;">
                    <br>
                    <img class ="avatar" src = "avatars/<?php echo $target_profile["avatar"]; ?>">
                    <br><br>
                    <h2 class="title"><?php echo $target_profile["primeiro_nome"] .' '. $target_profile["ultimo_nome"]; ?></h2>
                    <p class="category"><?php echo $target_profile["descrição"]; ?></p>
                    <a href="<?php echo $target_profile["facebook"]; ?>"><i class="fa fa-facebook"></i></a>
                    <a href="<?php echo $target_profile["instagram"]; ?>"><i class="fa fa-instagram"></i></a>
                    <a href="<?php echo $target_profile["skype"]; ?>"><i class="fa fa-skype"></i></a>

                </div>
                
             </div>

            </div>
        <!-- Fim perfil geral -->

        <div class = "row">
            <div class = "col-md-9">
                <div class = "card">
                    <div class = "header">
                        <h4 class="title" style = "color: #DC006C;"><b>As suas disponibilidades</b><b></b></h4>
                    </div>
                    <div class = "content">
                        <div id = "disp">
                        <?php
                            $db -> where ('id_perfil', $target_profile['id_perfil']);
                            $result2 = $db -> get('disponibilidades');

                            for ($i = 0; $i < count($result2); $i++){
                                echo '<div class = "row">';
                                echo '<div class="col-md-4">';
                                echo '<div class="form-group">';
                                echo '<label>Dia da Semana</label>';
                                echo '<select name = "diasemana[]" class="form-control" disabled>';


                                if(strcasecmp($result2[$i]["dia_semana"], "Segunda-Feira") === 0){
                                    echo '<option selected="selected">Segunda-Feira</option>';
                                    echo '<option>Terça-Feira</option>';
                                    echo '<option>Quarta-Feira</option>';
                                    echo '<option>Quinta-Feira</option>';
                                    echo '<option>Sexta-Feira</option>';
                                    echo '<option>Sábado</option>';
                                    echo '<option>Domingo</option>';
                                }

                                 else if(strcasecmp($result2[$i]["dia_semana"], "Terça-Feira") === 0){
                                    echo '<option selected="selected">Terça-Feira</option>';
                                    echo '<option>Segunda-Feira</option>';
                                    echo '<option>Quarta-Feira</option>';
                                    echo '<option>Quinta-Feira</option>';
                                    echo '<option>Sexta-Feira</option>';
                                    echo '<option>Sábado</option>';
                                    echo '<option>Domingo</option>';
                                }
                                else if(strcasecmp($result2[$i]["dia_semana"], "Quarta-Feira") === 0){
                                    echo '<option selected="selected">Quarta-Feira</option>';
                                    echo '<option>Segunda-Feira</option>';
                                    echo '<option>Terça-Feira</option>';
                                    echo '<option>Quinta-Feira</option>';
                                    echo '<option>Sexta-Feira</option>';
                                    echo '<option>Sábado</option>';
                                    echo '<option>Domingo</option>';
                                }
                                else if(strcasecmp($result2[$i]["dia_semana"], "Quinta-Feira") === 0){
                                    echo '<option selected="selected">Quinta-Feira</option>';
                                    echo '<option>Segunda-Feira</option>';
                                    echo '<option>Terça-Feira</option>';
                                    echo '<option>Quarta-Feira</option>';
                                    echo '<option>Sexta-Feira</option>';
                                    echo '<option>Sábado</option>';
                                    echo '<option>Domingo</option>';
                                }
                                else if(strcasecmp($result2[$i]["dia_semana"], "Sexta-Feira") === 0){
                                    echo '<option selected="selected">Sexta-Feira</option>';
                                    echo '<option>Segunda-Feira</option>';
                                    echo '<option>Terça-Feira</option>';
                                    echo '<option>Quarta-Feira</option>';
                                    echo '<option>Quinta-Feira</option>';
                                    echo '<option>Sábado</option>';
                                    echo '<option>Domingo</option>';
                                }
                                else if(strcasecmp($result2[$i]["dia_semana"], "Sábado") === 0){
                                    echo '<option selected="selected">Sábado</option>';
                                    echo '<option>Segunda-Feira</option>';
                                    echo '<option>Terça-Feira</option>';
                                    echo '<option>Quarta-Feira</option>';
                                    echo '<option>Quinta-Feira</option>';
                                    echo '<option>Sexta-Feira</option>';
                                    echo '<option>Domingo</option>';
                                }
                                else if(strcasecmp($result2[$i]["dia_semana"], "Domingo") === 0){
                                    echo '<option selected="selected">Domingo</option>';
                                    echo '<option>Segunda-Feira</option>';
                                    echo '<option>Terça-Feira</option>';
                                    echo '<option>Quarta-Feira</option>';
                                    echo '<option>Quinta-Feira</option>';
                                    echo '<option>Sexta-Feira</option>';
                                    echo '<option>Sábado</option>';
                                }

                                echo '</select>';
                            echo '</div>';

                        echo '</div>';
                        echo '<div class="col-md-2">';
                            echo '<div class="form-group ">';
                                echo '<label>Início</label>';
                                    $time_disponibilidade = $result2[$i]["time_inicio"];
                                    $time = new DateTime($time_disponibilidade);
                                    $hora = $time->format('H');
                                    $minuto = $time->format('i');
                                echo '<input name="horasinicio[]" type="number"  class="form-control" name="horainicio" min="0" max="24" placeholder="Horas" onchange="if(parseInt(this.value,10)<10)this.value=String(0)+this.value;" value="'.$hora.'" readonly>';

                            echo '</div>';  
                        echo '</div>'; 
                        echo '<div class="col-md-2">';
                            echo '<div class="form-group ">';
                                echo '<div style="display:inline-block"></div>'; 
                                echo '<label style="color:FFF"> .</label>';
                                echo '<input name="minutosinicio[]" type="number"  class="form-control" name="minutoinicio" min="0" max="59" placeholder="Minutos" onchange="if(parseInt(this.value,10)<10)this.value="0"+this.value;" value="'.$minuto.'" readonly>'; 

                            echo '</div>';  
                        echo '</div>';
                        echo '<div class="col-md-2">';
                            echo '<div class="form-group ">';
                                echo '<label>Fim</label>';
                                    $time_disponibilidade = $result2[$i]["time_fim"];
                                    $time = new DateTime($time_disponibilidade);
                                    $hora = $time->format('H');
                                    $minuto = $time->format('i');
                                echo '<input name = "horasfim[]" type="number"  class="form-control" name="horafim" min="0" max="24" placeholder="Horas" onchange="if(parseInt(this.value,10)<10)this.value="0"+this.value;" value="'.$hora.'" readonly>';

                             echo '</div>';  
                        echo '</div>'; 
                        echo '<div class="col-md-2">';
                            echo '<div class="form-group ">';
                                echo '<div style="display:inline-block"></div>'; 
                                echo '<label style="color:FFF"> .</label>';
                                echo '<input name="minutosfim[]" type="number"  class="form-control" name="minutofim" min="0" max="59" placeholder="Minutos" onchange="if(parseInt(this.value,10)<10)this.value="0"+this.value;" value="'.$minuto.'" readonly>'; 
                            echo '</div>';  
                        echo '</div>';
                echo '</div>';
                }
echo '</div>';
                ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Início preferencias -->
        <div class = "row">
            <div class = "col-md-9">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style = "color: #DC006C;"><b>As suas músicas favoritas</b><b></b></h4>

                    </div>
                    <div class = "content">
                    <?php
                        $db -> where ('id_perfil', $target_profile['id_perfil']);
                        $result3 = $db -> get('musica');
                        for ($i = 0; $i < count($result3); $i++){

                            echo '<div class = "row">';
                                echo '<div class="col-md-4">';
                                    echo '<div class="form-group">';
                                        echo '<label>Artista</label>';
                                        $artista = $result3[$i]["artista"];
                                        echo '<input type="text" name="artistas[]" value="'.$artista.'" class="form-control m-artist-input" readonly>';
                                        echo '<div class = "suggesstion-box"></div>';
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="col-md-4">';
                                    echo '<div class="form-group">';
                                        echo '<label>Nome da música</label>';
                                        $nomemusica = $result3[$i]["nome_musica"];
                                        echo '<input type="text" name = "nomemusicas[]" value="'.$nomemusica.'" class="form-control m-music-input" readonly>';
                                        echo '<div class = "suggesstion-box"></div>';
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="col-md-4">';
                                    echo '<div class="form-group">';
                                        echo '<label>Género</label>';
                                        $genero = $result3[$i]["genero"];
                                        echo '<input type="text" name="generos[]" value="'.$genero.'" class="form-control m-music-genre" readonly>';
                                    echo '</div>';
                                echo '</div>';
                                echo '<br>';
                            echo '</div>';
                        
                        echo '<br>';
                        }
                        echo '</div></div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class = "row">
            <div class = "col-md-9">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style = "color: #DC006C;"><b>Os seus filmes favoritos</b><b></b></h4>

                    </div>
                    <div class = "content">
                        <?php
                            $db -> where ('id_perfil', $target_profile['id_perfil']);
                            $result4 = $db -> get('filmes'); 
                            echo '<div id = "filmes">';
                            for ($i = 0; $i < count($result4); $i++){
                                
                                echo '<div class = "row">';
                                    echo '<div class="col-md-4">';
                                        echo '<div class="form-group">';
                                            echo '<label>Filme</label>';
                                            $nomefilme = $result4[$i]["nome_filme"];
                                            echo '<input type="text" name ="nomefilmes[]" value="'.$nomefilme.'" class="form-control m-movie-input" readonly>';
                                            echo '<div class = "suggesstion-box"></div>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<div class="col-md-4">';
                                        echo '<div class="form-group">';
                                            echo '<label>Realizador</label>';
                                            $realizador = $result4[$i]["realizador"];
                                            echo'<input type="text" name = "realizadores[]" value="'.$realizador.'" class="form-control m-director-input" readonly>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<div class="col-md-4">';
                                        echo '<div class="form-group">';
                                            echo '<label>Género</label>';
                                            $genero = $result4[$i]["genero"];
                                            echo '<input type="text" name = "generos[]" value="'.$genero.'" class="form-control m-movie-genre" readonly>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<br>';
                                echo '</div>';
                                
                            }
                                
                            echo '</div>';
                            ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
            $db -> where("id_campo", 4, ">=");
            $campos_de_interesse = $db -> get("campos_de_interesse");
            $possible_inputs_javascript = array();
            $nomes_tabelas = array();
            for($i = 0; $i<count($campos_de_interesse); $i++){
                
                echo '<div class = "row">';
                    echo '<div class = "col-md-9">';
                        echo '<div class="card">';
                            echo '<div class="header">';
                                echo '<h4 class="title" style = "color: #DC006C;"><b>'.ucfirst(str_replace('_', ' ', $campos_de_interesse[$i]["nome_campo"])).' favorita(o)/s</b></h4>';
                            echo '</div>';
                            echo '<div class = "content">';
                                $db -> where("id_campo", $campos_de_interesse[$i]["id_campo"]);
                                $inputs_campos = $db -> get("inputs_campos_interesse");
                                $db -> where("id_campo", $campos_de_interesse[$i]["id_campo"]);
                                $possible_inputs = $db -> get("especificacoes_campos");
                                array_push($possible_inputs_javascript, $possible_inputs);
                                $db -> where("id_perfil", $target_profile["id_perfil"]);
                                $user_data = $db->get( $inputs_campos[0]["nome_tabela_criada"]);
                                echo '<div id = "'.$inputs_campos[0]["nome_tabela_criada"].'">';
                                array_push($nomes_tabelas, $inputs_campos[0]);
                                        for($j = 0; $j< count($user_data); $j++){
                                            echo '<div class = "row">';
                                                echo '<div class="col-md-12">';
                                                    echo '<div class="form-group">';
                                                        echo '<label>'.ucfirst(str_replace('_', ' ', $inputs_campos[0]["nome_input"])).'</label>';
                                                        if(count($possible_inputs) > 0){
                                                            echo '<select class="form-control" disabled>';
                                                            for($k = 0; $k < count($possible_inputs); $k++){
                                                                echo "<script>console.log('Entra no loop'".$possible_inputs[$k]["possivel_input"].");</script>";
                                                                if(strcasecmp($possible_inputs[$k]["possivel_input"], $user_data[$j][$inputs_campos[0]["nome_input"]]) === 0){
                                                                    echo "<script>console.log('Entra no if".$possible_inputs[$k]["possivel_input"]."');</script>";
                                                                    echo '<option selected = "selected">'.$possible_inputs[$k]["possivel_input"].'</option>';
                                                                } else {
                                                                    echo '<option>'.$possible_inputs[$k]["possivel_input"].'</option>';
                                                                }
                                                            }
                                                            echo '</select>';
                                                        } else {
                                                            echo '<input type = "text" name = "user_input[]" class = "form-control>';
                                                        }
                                                        
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                            echo '<br>';
                                        }
                                        
                                    echo '</div>';
                                    echo '</div>';
                            echo '</div>';    
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                
               
            }
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <script src = "scripts/suggestion_scripts/suggestion.script.js"></script>


    </body>
</html>