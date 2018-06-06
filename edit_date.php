
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
            .inline-div {
                display:inline-block;
            }
            .textAreaColumn{
                width:100%;    
            }
            .textAreaColumn div span{
                display:block;
                text-align:center;
            }
            

        </style>

    </head>
    <body>

        <div class="row">
            <div class="col-md-12">

                <br>
                <?php
                require_once ('MysqliDb.php');
                $db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
                $id_encontro = $_POST["id"];
                $db->where("id_encontro", $id_encontro);
                $date = $db->get("encontros");
                $db->where("id_parceiro", $date[0]["id_parceiro"]);
                $partner = $db->get("parceiros");
                $db->where("id_local", $date[0]["id_local"]);
                $local = $db->get("locais");
                $db->where("id_perfil", $date[0]["id_perfil1"]);
                $perfil1 = $db->get("perfis");
                $db->where("id_perfil", $date[0]["id_perfil2"]);
                $perfil2 = $db->get("perfis");

                $data_encontro = $date[0]["date&time"];
                $datetime = new DateTime($data_encontro);
                $data = $datetime->format('Y-m-d');
                $time = $datetime->format('H:i:s');
                ?>
                <div class="card" align="center">
                    <div class="header">
                        <p><button type="button" class="btn btn-lg back-man-dates pull-left" class="fa fa-undo" aria-hidden="true" href = "" value = "psi/manage_dates.php"><i class="fa fa-undo" aria-hidden="true" ></i> Voltar</button>
                        </p>
                        <h1 class="title" style = "color: #DC006C;"><b>Perfect Match</b></h1>
                    </div>
                    <br>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <div class="card card-user" style = "top: 0;">
                                    <br>
                                    <?php
                                    echo '<img class ="avatar" src = "avatars/' . $perfil1[0]["avatar"] . '">';
                                    ?>
                                    <br><br>
                                    <h2 class="title"><?php echo $perfil1[0]["primeiro_nome"] . ' ' . $perfil1[0]["ultimo_nome"]; ?></h2>
                                    <p class="category"><?php echo $perfil1[0]["descrição"]; ?></p>
                                    <a href="#"><i class="fa fa-instagram"></i></a>  
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-skype"></i></a>
                                </div>
                            </div>                

                            <div class="col-md-4">
                                <div class="card card-user" style = "top: 0;">
                                    <br>
                                    <?php
                                    echo '<img class ="avatar" src = "avatars/' . $perfil2[0]["avatar"] . '">';
                                    ?>
                                    <br><br>
                                    <h2 class="title"><?php echo $perfil2[0]["primeiro_nome"] . ' ' . $perfil2[0]["ultimo_nome"]; ?></h2>
                                    <p class="category"><?php echo $perfil2[0]["descrição"]; ?></p>
                                    <a href="#"><i class="fa fa-instagram"></i></a>  
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-skype"></i></a>

                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="content">
                            <form method = "POST" action = "processforms/edit_date_form.php">
                                <input type = "number" name = "id_encontro" value = "<?php echo $date[0]["id_encontro"]; ?>" style = "display:none;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="title" style = "color: #9D9D9D;" ><b><?php echo $date[0]["titulo"]; ?></b><b></b></h2>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-8" align="center">
                                        <br>
                                        <?php
                                        echo '<img src = "img_parceiros/' . $partner[0]["foto"] . '" width="87%">';
                                        ?>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="row">
                                            <div class="form-group">
                                                <label>Local</label>
                                                <input type="text" class="form-control" value="<?php echo $local[0]["nome_local"] ?> readonly" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label>Dia</label>
                                                <input name ="dia" type="date" class="form-control" value="<?php echo $data; ?>" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label>Hora</label>
                                                <input  name = "hora" type="time" class="form-control" value="<?php echo $time; ?>" >
                                            </div>
                                        </div> 
                                        <div class="row">

                                            <div class="form-group">
                                                <label>Descrição</label>
                                                <input type="text" class="form-control" value="<?php echo $partner[0]["descrição"] ?>" readonly>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <br>

                                <br>

                                <div class="row">
                                    <div class="col-md-12" >
                                        <button type="submit" class="btn btn-lg btn-success" style = "background-color: #DC006C; border-color: #DC006C"><i class="fa fa-check "></i>Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div> 


                </div>
            </div>
        </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <script src = "scripts/suggestion_scripts/suggestion.script.js"></script>

        <script>

        </script>

    </body>
</html>
