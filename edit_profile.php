<!--- Fonts--->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'/>
        <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />
        
        <!--- Stylesheets--->
        <link rel = "stylesheet" href = "css/main.page.style.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="scripts/Timepicker/stylesheets/wickedpicker.css"/>

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
            .wickedpicker{
                z-index: 10000;
            }
        </style>
        
        
        <div class="row">
            <?php 
                $id_perfil = $_POST["id"];
                require_once ('MysqliDb.php');
                $db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
                $db -> where ('id_perfil', $id_perfil);
                $result = $db -> get('perfis');
            ?>
            <div class="col-md-9">
                <div class="card">
                    <div class="header">
                        <p><button type="button" class="btn btn-lg back-man-clients" class="fa fa-undo" aria-hidden="true"><i class="fa fa-undo" aria-hidden="true"></i> Voltar</button>
                        </p>
                        <h4 class="title" style = "color: #DC006C;"><b>Edite o perfil</b></h4>
                    </div>
                    <div class="content">
                        <form method="post" action="processforms/process_edit_logged_profile.php">
                            <input name = "id_perfil" type="text" value = "<?php echo $result[0]['id_perfil']; ?>" style = "display:none;">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Primeiro nome</label>
                                        
                                        <input name = "primeironome" type="text" class="form-control" value="<?php echo $result[0]["primeiro_nome"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Último nome</label>
                                        <input name = "ultimonome" type="text" class="form-control" value="<?php echo $result[0]["ultimo_nome"]; ?>">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Género</label>
                                        
                                        <select name = "genero" class="form-control">
                                            <?php 
                                            if(strcmp($result[0][genero], "Masculino") === 0){
                                                echo '<option selected="selected">Masculino</option>';
                                                echo '<option>Feminino</option>';
                                            }
                                            else if(strlen($result[0][genero]) === 0){
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
                                
                                <div class="col-md-3">
                                     <div class="form-group">
                                        <label>Data de Nascimento</label>
                                        <input name = "datanascimento" type="date" class="form-control" id="Date" value="<?php echo $result[0]["data_nascimento"]; ?>">
                                    </div>
                                </div>
                                

                            </div>

                            <div class="row">
                                
                                 <div class="col-md-4">
                                   <div class="form-group">
                                        <label>Orientação sexual</label>
                                        <select name = "orientacao" class="form-control">
                                            <?php 
                                            if(strcmp($result[0][orientação], "Heterossexual") === 0){
                                                echo '<option selected="selected">Heterossexual</option>';
                                                echo '<option>Homossexual</option>';
                                                echo '<option>Bissexual</option>';
                                            }
                                            else if(strlen($result[0][orientação]) === 0){
                                                echo '<option selected="selected"></option>';
                                                echo '<option>Heterossexual</option>';
                                                echo '<option>Homossexual</option>';
                                                echo '<option>Bissexual</option>';
                                            }
                                            else if(strcmp($result[0][orientação], "Homossexual") === 0){
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
                                        <label>Escolaridade</label>
                                        <select name = "escolaridade" class="form-control">
                                            <?php 
                                            if(strcmp($result[0][escolaridade], "Sem Escolaridade") === 0){
                                                echo '<option selected="selected">Sem Escolaridade</option>';
                                                echo '<option>1ºCiclo do Ensino Básico (4º ano ou equivalente)</option>';
                                                echo '<option>2ºCiclo do Ensino Básico (6º ano ou equivalente)</option>';
                                                echo '<option>3ºCiclo do Ensino Básico (9º ano ou equivalente)</option>';
                                                echo '<option>Ensino Secundário (12ºano ou equivalente)</option>';
                                                echo '<option>Ensino Superior - Licenciatura</option>';
                                                echo '<option>Ensino Superior - Mestrado</option>';
                                                echo '<option>Ensino Superior - Doutoramento</option>';
                                            }
                                            else if(strlen($result[0][escolaridade]) === 0){
                                                echo '<option selected="selected"></option>';
                                                echo '<option>Sem Escolaridade</option>';
                                                echo '<option>1ºCiclo do Ensino Básico (4º ano ou equivalente)</option>';
                                                echo '<option>2ºCiclo do Ensino Básico (6º ano ou equivalente)</option>';
                                                echo '<option>3ºCiclo do Ensino Básico (9º ano ou equivalente)</option>';
                                                echo '<option>Ensino Secundário (12ºano ou equivalente)</option>';
                                                echo '<option>Ensino Superior - Licenciatura</option>';
                                                echo '<option>Ensino Superior - Mestrado</option>';
                                                echo '<option>Ensino Superior - Doutoramento</option>';
                                            }
                                            else if(strcmp($result[0][escolaridade], "1ºCiclo do Ensino Básico (4º ano ou equivalente)") === 0){
                                                echo '<option selected="selected">1ºCiclo do Ensino Básico (4º ano ou equivalente)</option>';
                                                echo '<option>Sem Escolaridade</option>';
                                                echo '<option>2ºCiclo do Ensino Básico (6º ano ou equivalente)</option>';
                                                echo '<option>3ºCiclo do Ensino Básico (9º ano ou equivalente)</option>';
                                                echo '<option>Ensino Secundário (12ºano ou equivalente)</option>';
                                                echo '<option>Ensino Superior - Licenciatura</option>';
                                                echo '<option>Ensino Superior - Mestrado</option>';
                                                echo '<option>Ensino Superior - Doutoramento</option>';
                                            }
                                            else if(strcmp($result[0][escolaridade], "2ºCiclo do Ensino Básico (6º ano ou equivalente)") === 0){
                                                echo '<option selected="selected">2ºCiclo do Ensino Básico (6º ano ou equivalente)</option>';
                                                echo '<option>Sem Escolaridade</option>';
                                                echo '<option>1ºCiclo do Ensino Básico (4º ano ou equivalente)</option>';
                                                echo '<option>3ºCiclo do Ensino Básico (9º ano ou equivalente)</option>';
                                                echo '<option>Ensino Secundário (12ºano ou equivalente)</option>';
                                                echo '<option>Ensino Superior - Licenciatura</option>';
                                                echo '<option>Ensino Superior - Mestrado</option>';
                                                echo '<option>Ensino Superior - Doutoramento</option>';
                                            }
                                            else if(strcmp($result[0][escolaridade], "3ºCiclo do Ensino Básico (9º ano ou equivalente)") === 0){
                                                echo '<option selected="selected">3ºCiclo do Ensino Básico (9º ano ou equivalente)</option>';
                                                echo '<option>Sem Escolaridade</option>';
                                                echo '<option>1ºCiclo do Ensino Básico (4º ano ou equivalente)</option>';
                                                echo '<option>2ºCiclo do Ensino Básico (6º ano ou equivalente)</option>';
                                                echo '<option>Ensino Secundário (12ºano ou equivalente)</option>';
                                                echo '<option>Ensino Superior - Licenciatura</option>';
                                                echo '<option>Ensino Superior - Mestrado</option>';
                                                echo '<option>Ensino Superior - Doutoramento</option>';
                                            }
                                            else if(strcmp($result[0][escolaridade], "Ensino Secundário (12ºano ou equivalente)") === 0){
                                                echo '<option selected="selected">Ensino Secundário (12ºano ou equivalente)</option>';
                                                echo '<option>Sem Escolaridade</option>';
                                                echo '<option>1ºCiclo do Ensino Básico (4º ano ou equivalente)</option>';
                                                echo '<option>2ºCiclo do Ensino Básico (6º ano ou equivalente)</option>';
                                                echo '<option>3ºCiclo do Ensino Básico (9º ano ou equivalente)</option>';
                                                echo '<option>Ensino Superior - Licenciatura</option>';
                                                echo '<option>Ensino Superior - Mestrado</option>';
                                                echo '<option>Ensino Superior - Doutoramento</option>';
                                            }
                                            else if(strcmp($result[0][escolaridade], "Ensino Superior - Licenciatura") === 0){
                                                echo '<option selected="selected">Ensino Superior - Licenciatura</option>';
                                                echo '<option>Sem Escolaridade</option>';
                                                echo '<option>1ºCiclo do Ensino Básico (4º ano ou equivalente)</option>';
                                                echo '<option>2ºCiclo do Ensino Básico (6º ano ou equivalente)</option>';
                                                echo '<option>3ºCiclo do Ensino Básico (9º ano ou equivalente)</option>';
                                                echo '<option>Ensino Secundário (12ºano ou equivalente)</option>';
                                                echo '<option>Ensino Superior - Mestrado</option>';
                                                echo '<option>Ensino Superior - Doutoramento</option>';
                                            }
                                            else if(strcmp($result[0][escolaridade], "Ensino Superior - Mestrado") === 0){
                                                echo '<option selected="selected">Ensino Superior - Mestrado</option>';
                                                echo '<option>Sem Escolaridade</option>';
                                                echo '<option>1ºCiclo do Ensino Básico (4º ano ou equivalente)</option>';
                                                echo '<option>2ºCiclo do Ensino Básico (6º ano ou equivalente)</option>';
                                                echo '<option>3ºCiclo do Ensino Básico (9º ano ou equivalente)</option>';
                                                echo '<option>Ensino Secundário (12ºano ou equivalente)</option>';
                                                echo '<option>Ensino Superior - Licenciatura</option>';
                                                echo '<option>Ensino Superior - Doutoramento</option>';
                                            }
                                            else{
                                                echo '<option selected="selected">Ensino Superior - Doutoramento</option>';
                                                echo '<option>Sem Escolaridade</option>';
                                                echo '<option>1ºCiclo do Ensino Básico (4º ano ou equivalente)</option>';
                                                echo '<option>3ºCiclo do Ensino Básico (9º ano ou equivalente)</option>';
                                                echo '<option>Ensino Secundário (12ºano ou equivalente)</option>';
                                                echo '<option>Ensino Superior - Licenciatura</option>';
                                                echo '<option>Ensino Superior - Mestrado</option>';
                                            }
                                            
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">E-mail</label>
                                        <input name = "email" type="email" class="form-control" value="<?php echo $result[0]["email"]; ?>">
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Morada</label>
                                        <input name = "morada" type="text" class="form-control" value="<?php echo $result[0]["morada"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Código Postal</label>
                                        <input name = "codigopostal" type="text" class="form-control" value="<?php echo $result[0]["codigo_postal"]; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Distrito</label>
                                        <input name = "distrito" type="text" class="form-control" value="<?php echo $result[0]["distrito"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Concelho</label>
                                        <input name = "concelho" type="text" class="form-control" value="<?php echo $result[0]["concelho"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Freguesia</label>
                                        <input name = "freguesia" type="text" class="form-control" value="<?php echo $result[0]["freguesia"]; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sobre mim</label>
                                        <textarea rows="5" name = "descricao" class="form-control"><?php echo $result[0]["descrição"]; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class = "row">
                                <div class = "col-sm-4">
                                    <label>Facebook</label>
                                    <input name = "facebook" type="text" class="form-control" value="<?php echo $result[0]["facebook"]; ?>">
                                </div>
                                <div class = "col-sm-4">
                                    <label>Skype</label>
                                    <input name = "skype" type="text" class="form-control" value="<?php echo $result[0]["skype"]; ?>">
                                </div>
                                <div class = "col-sm-4">
                                    <label>Instagram</label>
                                    <input name = "instagram" type="text" class="form-control" value="<?php echo $result[0]["instagram"]; ?>">
                                </div>
                            </div>
                            <br><br>
                            <button name = "upload" type="submit" class="btn btn-lg btn-fill pull-right" style = "background-color: #DC006C; color:#FFF">Salvar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-user" style = "top: 0;">
                    <br>
                    <?php
                    echo '<img class ="avatar" src = "avatars/'.$result[0]["avatar"].'">';
                    
                    
                    ?>
                    <br><br>
                    
                    <h2 class="title"><?php echo $result[0]["primeiro_nome"]; echo " "; echo $result[0]["ultimo_nome"]; ?></h2>
                    <p class="category"><?php echo $result[0]["descrição"]; ?></p>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>  
                    
                    <a href="#"><i class="fa fa-skype"></i></a>

                    <div class = "row">
                        <label>Editar Fotografia de Perfil</label> </div>

                    <div class = "row">
                        <form method="post" action="processAvatar.php" enctype="multipart/form-data">
                            <input type="hidden" name="size" value="100000">
                            <div>
                                <input name = "id_perfil" type="text" value = "<?php echo $result[0]['id_perfil']; ?>" style = "display:none;">
                                <input type="file" name="image">
                            </div>
                            <BR>

                            <div>
                                <button type="submit" name="upload" class="btn btn-lg btn-fill" style = "background-color: #DC006C; color:#FFF">Guardar avatar</button>
                            </div>
                        </form>
                    </div>
                    <br>
                </div>
            </div>

        </div>
    </div>
        <!-- Fim perfil geral -->
        
            <div class="row">
                <div class="col-md-9">
                     <div class="card " style = "top: 0;">
                           <div class="header">
                                <h4 class="title" style = "color: #DC006C;"><b>A sua disponibilidade para encontros</b><b><i class="fa fa-plus-circle pull-right add-row-icon" style = " color: #DC006C; cursor:pointer; font-size: 1.5em;"></i></b></h4>
                            </div>
                            <div class = "content">
                                <form method="post" action="processforms/process_edit_disponibilidade.php">
                                    <div id = "disp">
                                        <?php
                                            $db -> where ('id_perfil', $result[0]['id_perfil']);
                                            $result2 = $db -> get('disponibilidades');
                                        
                                            for ($i = 0; $i < count($result2); $i++){
                                                echo '<div class = "row">';
                                                echo '<div class="col-md-4">';
                                                echo '<div class="form-group">';
                                                echo '<label>Dia da Semana</label>';
                                                echo '<select name = "diasemana[]" class="form-control">';
                                                            
                                                        
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
                                                echo '<input name="horasinicio[]" type="number"  class="form-control" name="horainicio" min="0" max="24" placeholder="Horas" onchange="if(parseInt(this.value,10)<10)this.value=String(0)+this.value;" value="'.$hora.'">';

                                            echo '</div>';  
                                        echo '</div>'; 
                                        echo '<div class="col-md-2">';
                                            echo '<div class="form-group ">';
                                                echo '<div style="display:inline-block"></div>'; 
                                                echo '<label style="color:FFF"> .</label>';
                                                echo '<input name="minutosinicio[]" type="number"  class="form-control" name="minutoinicio" min="0" max="59" placeholder="Minutos" onchange="if(parseInt(this.value,10)<10)this.value="0"+this.value;" value="'.$minuto.'">'; 

                                            echo '</div>';  
                                        echo '</div>';
                                        echo '<div class="col-md-2">';
                                            echo '<div class="form-group ">';
                                                echo '<label>Fim</label>';
                                                    $time_disponibilidade = $result2[$i]["time_fim"];
                                                    $time = new DateTime($time_disponibilidade);
                                                    $hora = $time->format('H');
                                                    $minuto = $time->format('i');
                                                echo '<input name = "horasfim[]" type="number"  class="form-control" name="horafim" min="0" max="24" placeholder="Horas" onchange="if(parseInt(this.value,10)<10)this.value="0"+this.value;" value="'.$hora.'">';

                                             echo '</div>';  
                                        echo '</div>'; 
                                        echo '<div class="col-md-2">';
                                            echo '<div class="form-group ">';
                                                echo '<div style="display:inline-block"></div>'; 
                                                echo '<label style="color:FFF"> .</label>';
                                                echo '<input name="minutosfim[]" type="number"  class="form-control" name="minutofim" min="0" max="59" placeholder="Minutos" style="width:60%; position:absolute;" onchange="if(parseInt(this.value,10)<10)this.value="0"+this.value;" value="'.$minuto.'">'; 
                                               echo '<i class="fa fa-minus-circle pull-right remove-row-icon" style = "color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:30px;"></i>';
                                            echo '</div>';  
                                        echo '</div>';
                                echo '</div>';
                                }
                               
                                ?>
                                <div class="col-md-4"><div class="form-group"><label>Dia da Semana</label><select name="diasemana[]" class="form-control"><option selected="selected" >Segunda-Feira</option><option >Terça-Feira</option><option >Quarta-Feira</option><option >Quinta-Feira</option><option >Sexta-Feira</option><option >Sábado</option><option >Domingo</option></select></div></div><div class="col-md-2"><div class="form-group "><label>Início</label><input name="horasinicio[]" type="number"  class="form-control" min="0" max="24" placeholder="Horas" onchange="if(parseInt(this.value,10)<10)this.value=String(0)+this.value;" ></div></div><div class="col-md-2"><div class="form-group "><div style="display:inline-block"></div><label style="color:FFF"> .</label><input type="number"  class="form-control" name="minutosinicio[]" min="0" max="59" placeholder="Minutos" onchange="if(parseInt(this.value,10)<10)this.value=String(0)+this.value;"></div></div><div class="col-md-2"><div class="form-group "><label>Fim</label><input type="number"  class="form-control" name="horasfim[]" min="0" max="24" placeholder="Horas" onchange="if(parseInt(this.value,10)<10)this.value=String(0)+this.value;"></div></div><div class="col-md-2"><div class="form-group "><div style="display:inline-block"></div><label style="color:FFF"> .</label><input type="number"  class="form-control" name="minutosfim[]" min="0" max="59" placeholder="Minutos" style="width:60%; position:absolute;" onchange="if(parseInt(this.value,10)<10)this.value=String(0)+this.value;"> <i class="fa fa-minus-circle pull-right remove-row-icon" style = "color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:30px;"></i></div></div>
                                <br><br>
                                </div>
                               <br><br><br>
                                <button name = "upload" type="submit" class="btn btn-lg btn-fill pull-right" style = "background-color: #DC006C; color:#FFF">Salvar</button>
                                <div class="clearfix"></div> 
                                <input name = "id_perfil" type="text" value = "<?php echo $result[0]['id_perfil']; ?>" style = "display:none;">
                            </form>
                    </div>
                </div>
    
        </div>
    </div>            
    
        <!-- Início preferencias -->
        
        <div class = "row">
            <div class = "col-md-9">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style = "color: #DC006C;"><b>As suas músicas favoritas</b><b><i class="fa fa-plus-circle pull-right add-row-icon" style = " color: #DC006C; cursor:pointer; font-size: 1.5em;"></i></b></h4>

                    </div>
                    <div class = "content">
                        <form method="post" action="processforms/process_edit_musicas.php">
                            <?php
                            $db -> where ('id_perfil', $result[0]['id_perfil']);
                            $result3 = $db -> get('musica');
                            echo '<div id = "musicas">';
                            for ($i = 0; $i < count($result3); $i++){
                            
                                echo '<div class = "row">';
                                    echo '<div class="col-md-4">';
                                        echo '<div class="form-group">';
                                            echo '<label>Artista</label>';
                                            $artista = $result3[$i]["artista"];
                                            echo '<input type="text" name="artistas[]" value="'.$artista.'" class="form-control m-artist-input">';
                                            echo '<div class = "suggesstion-box"></div>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<div class="col-md-4">';
                                        echo '<div class="form-group">';
                                            echo '<label>Nome da música</label>';
                                            $nomemusica = $result3[$i]["nome_musica"];
                                            echo '<input type="text" name = "nomemusicas[]" value="'.$nomemusica.'" class="form-control m-music-input">';
                                            echo '<div class = "suggesstion-box"></div>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<div class="col-md-4">';
                                        echo '<div class="form-group">';
                                            echo '<label>Género</label>';
                                            $genero = $result3[$i]["genero"];
                                            echo '<input type="text" name="generos[]" value="'.$genero.'" class="form-control m-music-genre" style = "width:80%; position:absolute;" readonly>
                                            <i class="fa fa-minus-circle pull-right remove-row-icon" style = "color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:30px;"></i>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<br>';
                                echo '</div>';
                            
                            echo '<br>';
                            
                            }
                            echo '<div class = "row">';
                                    echo '<div class="col-md-4">';
                                        echo '<div class="form-group">';
                                            echo '<label>Artista</label>';
                                            echo '<input type="text" name="artistas[]" class="form-control m-artist-input">';
                                            echo '<div class = "suggesstion-box"></div>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<div class="col-md-4">';
                                        echo '<div class="form-group">';
                                            echo '<label>Nome da música</label>';
                                            echo '<input type="text" name = "nomemusicas[]" class="form-control m-music-input">';
                                            echo '<div class = "suggesstion-box"></div>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<div class="col-md-4">';
                                        echo '<div class="form-group">';
                                            echo '<label>Género</label>';
                                            echo '<input type="text" name="generos[]" class="form-control m-music-genre" style = "width:80%; position:absolute;" readonly>
                                            <i class="fa fa-minus-circle pull-right remove-row-icon" style = "color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:30px;"></i>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<br>';
                                echo '</div>';
                            
                            echo '<br>';
                            echo '</div>';
                            echo '<div class = "col-sm-4 col-md-offset-8">';
                            $db -> where("id_perfil", $result[0]['id_perfil']);
                            $db -> where("id_campo", 2);
                            $prioridade = $db -> get("interesses");
                                echo '<label class = "pull-right">Prioridade</label>';
                                echo '<select name = "prioridade" class="form-control">';
                                if(strcmp($prioridade[0]["prioridade"], "Média") === 0){
                                    echo '<option>Alta</option>';
                                    echo '<option selected="selected">Média</option>';
                                    echo '<option>Baixa</option>';
                                } else if (strcmp($prioridade[0]["prioridade"], "Alta") === 0){
                                    echo '<option selected="selected">Alta</option>';
                                    echo '<option>Média</option>';
                                    echo '<option>Baixa</option>';
                                } else {
                                    echo '<option>Alta</option>';
                                    echo '<option>Média</option>';
                                    echo '<option selected="selected">Baixa</option>';
                                }
                                    
                                echo '</select>';
                            echo '</div>';
                            echo '<input name = "id_perfil" type="text" value = "'.$result[0]['id_perfil'].'" style = "display:none;">';
                            ?>
                            <br><br>
                            <br>
                            <br>
                            <button name = "upload" type="submit" class="btn btn-lg btn-fill pull-right" style = "background-color: #DC006C; color:#FFF">Salvar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class = "row">
            <div class = "col-md-9">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style = "color: #DC006C;"><b>Os seus filmes favoritos</b><b><i class="fa fa-plus-circle pull-right add-row-icon" style = " color: #DC006C; cursor:pointer; font-size: 1.5em;"></i></b></h4>

                    </div>
                    <div class = "content">
                        <form method="post" action="processforms/process_edit_filmes.php">
                            <?php
                            $db -> where ('id_perfil', $result[0]['id_perfil']);
                            $result4 = $db -> get('filmes'); 
                            echo '<div id = "filmes">';
                            for ($i = 0; $i < count($result4); $i++){
                                
                                echo '<div class = "row">';
                                    echo '<div class="col-md-4">';
                                        echo '<div class="form-group">';
                                            echo '<label>Filme</label>';
                                            $nomefilme = $result4[$i]["nome_filme"];
                                            echo '<input type="text" name ="nomefilmes[]" value="'.$nomefilme.'" class="form-control m-movie-input">';
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
                                            echo '<input type="text" name = "generos[]" value="'.$genero.'" class="form-control m-movie-genre" style = "width:80%; position:absolute;" readonly>
                                            <i class="fa fa-minus-circle pull-right remove-row-icon" style = "color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:30px;"></i>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<br>';
                                echo '</div>';
                                
                            }
                                
                            echo '</div>';
                            ?>
                            <div class = "row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Filme</label>
                                        <input type="text" name ="nomefilmes[]" value="" class="form-control m-movie-input">
                                        <div class = "suggesstion-box"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Realizador</label>
                                        <input type="text" name = "realizadores[]" value="" class="form-control m-director-input" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Género</label>
                                        <input type="text" name = "generos[]" value="" class="form-control m-movie-genre" style = "width:80%; position:absolute;" readonly>
                                        <i class="fa fa-minus-circle pull-right remove-row-icon" style = "color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:30px;"></i>
                                    </div>
                                </div>
                                <br>
                            </div>
                            
                            <br>
                            <?php
                            echo '<div class = "col-sm-4 col-md-offset-8">';
                            $db -> where("id_perfil", $result[0]['id_perfil']);
                            $db -> where("id_campo", 3);
                            $prioridade = $db -> get("interesses");
                                echo '<label class = "pull-right">Prioridade</label>';
                                echo '<select name = "prioridade" class="form-control">';
                                if(strcmp($prioridade[0]["prioridade"], "Média") === 0){
                                    echo '<option>Alta</option>';
                                    echo '<option selected="selected">Média</option>';
                                    echo '<option>Baixa</option>';
                                } else if (strcmp($prioridade[0]["prioridade"], "Alta") === 0){
                                    echo '<option selected="selected">Alta</option>';
                                    echo '<option>Média</option>';
                                    echo '<option>Baixa</option>';
                                } else {
                                    echo '<option>Alta</option>';
                                    echo '<option>Média</option>';
                                    echo '<option selected="selected">Baixa</option>';
                                }
                                    
                                echo '</select>';
                            echo '</div>';
                            echo '<input name = "id_perfil" type="text" value = "'.$result[0]['id_perfil'].'" style = "display:none;">';
                            ?>
                            <br><br>
                            <button type="submit" name = "upload" class="btn btn-lg btn-fill pull-right" style = "background-color: #DC006C; color:#FFF">Salvar</button>
                            <div class="clearfix"></div>
                            </div>
                        </form>
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
                                echo '<h4 class="title" style = "color: #DC006C;"><b>'.ucfirst(str_replace('_', ' ', $campos_de_interesse[$i]["nome_campo"])).' favorita(o)/s</b><b><i class="fa fa-plus-circle pull-right add-row-icon" style = " color: #DC006C; cursor:pointer; font-size: 1.5em;"></i></b></h4>';
                            echo '</div>';
                            echo '<div class = "content">';
                            echo '<form method="post" action="processforms/process_edit_general_field.php">';
                                $db -> where("id_campo", $campos_de_interesse[$i]["id_campo"]);
                                $inputs_campos = $db -> get("inputs_campos_interesse");
                                $db -> where("id_campo", $campos_de_interesse[$i]["id_campo"]);
                                $possible_inputs = $db -> get("especificacoes_campos");
                                array_push($possible_inputs_javascript, $possible_inputs);
                                $db -> where("id_perfil", $result[0]["id_perfil"]);
                                $user_data = $db->get( $inputs_campos[0]["nome_tabela_criada"]);
                                echo '<div id = "'.$inputs_campos[0]["nome_tabela_criada"].'">';
                                array_push($nomes_tabelas, $inputs_campos[0]);
                                
                                
                                   
                                        for($j = 0; $j< count($user_data); $j++){
                                            echo '<div class = "row">';
                                                echo '<div class="col-md-12">';
                                                    echo '<div class="form-group">';
                                                        echo '<label>'.ucfirst(str_replace('_', ' ', $inputs_campos[0]["nome_input"])).'</label>';
                                                        if(count($possible_inputs) > 0){
                                                            echo '<select class = "form-control" name = "user_input[]" style = "width:80%; position:absolute;">';
                                                            for($k = 0; $k < count($possible_inputs); $k++){
                                                                if(strcasecmp($possible_inputs[$k]["possivel_input"], $user_data[$j][$inputs_campos[0]["nome_input"]]) === 0){
                                                                    echo '<option selected = "selected">'.$possible_inputs[$k]["possivel_input"].'</option>';
                                                                } else {
                                                                    echo '<option>'.$possible_inputs[$k]["possivel_input"].'</option>';
                                                                }
                                                            }
                                                            echo '</select>';
                                                        } else {
                                                            echo '<input type = "text" name = "user_input[]" class = "form-control" style = "width:80%; position:absolute;">';
                                                        }
                                                        
                                                        echo '<i class="fa fa-minus-circle pull-right remove-row-icon" style = "color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:27px;"></i>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                            echo '<br>';
                                        }
                                        echo '<div class = "row">';
                                            echo '<div class="col-md-12">';
                                                echo '<div class="form-group">';
                                                    echo '<label>'.ucfirst(str_replace('_', ' ', $inputs_campos[0]["nome_input"])).'</label>';
                                                    if(count($possible_inputs) > 0){
                                                        echo '<select class = "form-control" name = "user_input[]" style = "width:80%; position:absolute;">';
                                                        echo '<option selected = "selected"></option>';
                                                        for($j = 0; $j < count($possible_inputs); $j++){
                                                            echo '<option>'.$possible_inputs[$j]["possivel_input"].'</option>';
                                                        }
                                                        echo '</select>';
                                                    } else {
                                                        echo '<input type = "text" name = "user_input[]" class = "form-control" style = "width:80%; position:absolute;">';
                                                    }
                                                    echo '<i class="fa fa-minus-circle pull-right remove-row-icon" style = "color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:27px;"></i>';
                                                echo '</div>';
                                                echo '<br><br>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<div class = "col-sm-4 col-md-offset-8">';
                                    $db -> where("id_perfil", $result[0]['id_perfil']);
                                    $db -> where("id_campo", $campos_de_interesse[$i]["id_campo"]);
                                    $prioridade = $db -> get("interesses");
                                        echo '<label class = "pull-right">Prioridade</label>';
                                        echo '<select name = "prioridade" class="form-control">';
                                        if(strcmp($prioridade[0]["prioridade"], "Média") === 0){
                                            echo '<option>Alta</option>';
                                            echo '<option selected="selected">Média</option>';
                                            echo '<option>Baixa</option>';
                                        } else if (strcmp($prioridade[0]["prioridade"], "Alta") === 0){
                                            echo '<option selected="selected">Alta</option>';
                                            echo '<option>Média</option>';
                                            echo '<option>Baixa</option>';
                                        } else {
                                            echo '<option>Alta</option>';
                                            echo '<option>Média</option>';
                                            echo '<option selected="selected">Baixa</option>';
                                        }
                                        echo '</select>';
                                    
                                     echo '</div>';
                                    echo '<br><br>';
                                    echo '<button type="submit" name = "upload" class="btn btn-lg btn-fill pull-right" style = "background-color: #DC006C; color:#FFF">Salvar</button>';
                                    echo '<div class="clearfix"></div>';
                                    
                                echo '<input name = "id_perfil" type="text" value = "'.$result[0]['id_perfil'].'" style = "display:none;">';
                                echo '<input name = "tabela_destino" type="text" value = "'.$inputs_campos[0]["nome_tabela_criada"].'" style = "display:none;">';
                                echo '<input name = "nome_input" type="text" value = "'.$inputs_campos[0]["nome_input"].'" style = "display:none;">';
                                echo '<input name = "id_campo" type="text" value = "'.$inputs_campos[0]["id_campo"].'" style = "display:none;">';
                            echo '</div>';
                            echo '</form>';
                            echo '</div>';    
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                
               
            }
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <script src = "scripts/suggestion_scripts/suggestion.script.js"></script>
                
        <script>
            String.prototype.capitalize = function() {
                return this.charAt(0).toUpperCase() + this.slice(1);
            };
            //remover inputs
            $(document).on('click', '.remove-row-icon', function () {
                //codigo PHP para remover da bd, se necessário
                $(this).parent().parent().parent().remove();   
            });
            
            $(document).on('click', '.add-row-icon', function() {
                var loop_necessary = true;
                var div = document.createElement('div');
                div.className = 'row';
                $parent_to_add = $(this).parent().parents().children(".content").children().children(":first");
                $interest_field = $parent_to_add.attr('id');
                if($interest_field === "musicas"){
                    div.innerHTML = ' <div class="col-md-4"><div class="form-group"><label>Artista</label><input type="text" name = "artistas[]" class="form-control m-artist-input"><div class = "suggesstion-box"></div></div></div><div class="col-md-4"><div class="form-group"><label>Nome da música</label><input type="text" name = "nomemusicas[]" class="form-control m-music-input"><div class = "suggesstion-box"></div></div>' +
                                ' </div><div class="col-md-4"><div class="form-group"><label>Género</label><input type="text" name = "generos[]" class="form-control m-music-genre" style = "width:80%; position:absolute;" readonly> ' +
                                ' <i class="fa fa-minus-circle pull-right remove-row-icon" style = "color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:30px;"></i></div></div> <br>';
                    loop_necessary = false;
                } 
                else if ($interest_field === "filmes") {
                    div.innerHTML = ' <div class="col-md-4"><div class="form-group"><label>Filme</label><input type="text" name="nomefilmes[]" class="form-control m-movie-input"><div class = "suggesstion-box"></div></div></div><div class="col-md-4"><div class="form-group"><label>Realizador</label><input type="text" name="realizadores[]" class="form-control m-director-input" readonly></div>' +
                                ' </div><div class="col-md-4"><div class="form-group"><label>Género</label><input type="text" name="generos[]" class="form-control m-movie-genre" style = "width:80%; position:absolute;" readonly> ' +
                                ' <i class="fa fa-minus-circle pull-right remove-row-icon" style = "color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:30px;"></i></div></div> <br>';
                    loop_necessary = false;
                }
                else if ($interest_field === "disp"){
                    div.innerHTML =' <div class="col-md-4"><div class="form-group"><label>Dia da Semana</label><select name="diasemana[]" class="form-control"><option selected="selected" >Segunda-Feira</option><option >Terça-Feira</option><option >Quarta-Feira</option><option >Quinta-Feira</option><option >Sexta-Feira</option><option >Sábado</option><option >Domingo</option></select></div></div><div class="col-md-2"><div class="form-group "><label>Início</label><input name="horasinicio[]" type="number"  class="form-control" min="0" max="24" placeholder="Horas" onchange="if(parseInt(this.value,10)<10)this.value=String(0)+this.value;" ></div></div><div class="col-md-2"><div class="form-group "><div style="display:inline-block"></div><label style="color:FFF"> .</label><input type="number"  class="form-control" name="minutosinicio[]" min="0" max="59" placeholder="Minutos" onchange="if(parseInt(this.value,10)<10)this.value=String(0)+this.value;"></div></div><div class="col-md-2"><div class="form-group "><label>Fim</label><input type="number"  class="form-control" name="horasfim[]" min="0" max="24" placeholder="Horas" onchange="if(parseInt(this.value,10)<10)this.value=String(0)+this.value;"></div></div><div class="col-md-2"><div class="form-group "><div style="display:inline-block"></div><label style="color:FFF"> .</label><input type="number"  class="form-control" name="minutosfim[]" min="0" max="59" placeholder="Minutos" style="width:60%; position:absolute;" onchange="if(parseInt(this.value,10)<10)this.value=String(0)+this.value;"> <i class="fa fa-minus-circle pull-right remove-row-icon" style = "color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:30px;"></i></div></div>';
                    loop_necessary = false;
                }
                
                if(loop_necessary === true){
                    var fields_of_interest = <?php echo json_encode($campos_de_interesse) ?>;
                    var possible_inputs = <?php echo json_encode($possible_inputs_javascript) ?>;
                    var ids = <?php echo json_encode($nomes_tabelas) ?>;
                    var inner_html = '';
                    for(var i = 0; i < Object.keys(fields_of_interest).length; i++){
                        inner_html = '';
                        if($interest_field === ids[i]["nome_tabela_criada"]){
                            inner_html = inner_html + '<div class="col-md-12"><div class="form-group"><label>'+ids[i]["nome_input"].replace("_", " ").capitalize()+'</label>';
                            console.log(inner_html);
                            if(possible_inputs.hasOwnProperty(i)){
                                inner_html = inner_html + '<select class = "form-control" name = "user_input[]" style = "width:80%; position:absolute;">';
                                inner_html = inner_html + '<option selected = "selected"></option>';
                                for(var j = 0; j < Object.keys(possible_inputs[i]).length; j++){
                                    inner_html = inner_html + '<option>' + possible_inputs[i][j]["possivel_input"] + '</option>';
                                }
                                inner_html = inner_html + '</select>';
                            } else {
                                inner_html = inner_html + '<input type = "text" name = "user_input[]" class = "form-control" style = "width:80%; position:absolute;">';
                            }
                            inner_html = inner_html +'<i class="fa fa-minus-circle pull-right remove-row-icon" style = "color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:30px;"></i></div><br><br></div> ';
                            div.innerHTML = inner_html;
                            break;
                        }
                    }
                }
                
                $parent_to_add.append(div);               
            });
         

        </script>

    </body>
</html>

