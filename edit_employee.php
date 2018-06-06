<html>
    <head>
        <meta charset="UTF-8">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <title>Perfect Match</title>


        <link rel="icon" href="img/browser-icon.png">
        <!--- Fonts--->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'/>
        <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />

        <!--- Stylesheets--->
        <link rel = "stylesheet" href = "css/main.page.style.css"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css"/>

    </head>
    <style>

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

        .table > thead > tr > th {
            border-bottom-width: 1px;
            font-size: 12px;
            text-transform: uppercase;
            color: #9A9A9A;
            font-weight: 400;
            padding-bottom: 5px;
        }


        @media (max-width: 991px) {
            .table-responsive {
                width: 100%;
                margin-bottom: 15px;
                overflow-x: scroll;
                overflow-y: hidden;
                -ms-overflow-style: -ms-autohiding-scrollbar;
                -webkit-overflow-scrolling: touch;
            }
        }
    </style>
    <body>
        <?php
        require_once ('MysqliDb.php');
        $db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
        $id_empregado = $_POST["id"];
        $db -> where ('id_empregado', $id_empregado);
        $empregado = $db->get('empregados');
        $db -> where ('id_login', $empregado[0]["id_login"]);
        $login = $db -> get('login');
        ?>
        <div class = "card">
        <div class="header">
            <p><button type="button" class="btn btn-lg back-man-employee" class="fa fa-undo" aria-hidden="true"><i class="fa fa-undo" aria-hidden="true"></i> Voltar</button>
                        </p>
            <h4 class="title" style = "color: #DC006C;"><b style="font-size: 90%;">Empregado</b></h4>
            <br>
        </div>
        <form method = "POST" action = "processforms/edit_employee_form.php">
            <input type = "number" name = "id_empregado" value = "<?php echo $id_empregado;?>" style = "display: none;">
                                    <div class = "row">
                                        <div class = "col-md-12">
                                            <div class = "form-group">
                                                <label>Username</label>
                                                <input name ="username" type="text" class="form-control" value="<?php echo $login[0]['username']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-12">
                                            <div class = "form-group">
                                                <label>Password</label>
                                                <input name ="password" type="password" class="form-control" value="<?php echo $login[0]['password']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-8">
                                            <div class = "form-group">
                                                <label>Tipo de login</label>
                                                <select name ="tipo_login" class="form-control">
                                                    <?php 
                                                    if(strcasecmp($login[0]["tipo_login"], "admin") === 0){
                                                        echo '<option selected="selected">Admin</option>';
                                                        echo '<option >Empregado</option>';
                                                    } else {
                                                        echo '<option>Admin</option>';
                                                        echo '<option selected="selected">Empregado</option>';
                                                    }
                                                    ?>
                                                    
                                                    
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-12">
                                            <div class = "form-group">
                                                <label>Primeiro nome</label>
                                                <input name ="primeiro_nome" type="text" class="form-control" value="<?php echo $empregado[0]['primeiro_nome']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-12">
                                            <div class = "form-group">
                                                <label>Último nome</label>
                                                <input name ="ultimo_nome" type="text" class="form-control" value="<?php echo $empregado[0]['ultimo_nome']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-12">
                                            <div class = "form-group">
                                                <label>Email</label>
                                                <input name ="email" type="email" class="form-control" value="<?php echo $empregado[0]['email']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-12">
                                            <div class = "form-group">
                                                <label>Morada</label>
                                                <input name = "morada" type="text" class="form-control" value="<?php echo $empregado[0]['morada']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-12">
                                            <div class = "form-group">
                                                <label>Data de nascimento</label>
                                                <input name ="data_nascimento" type="date" class="form-control" value="<?php echo $empregado[0]['data_nascimento']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                                                    
                                    <br><br>
                                    <button type="submit" class="btn btn-lg btn-fill pull-right" style = "background-color: #DC006C; color:#FFF">Editar empregado</button>
                                    <div class="clearfix"></div>
                                </form>
    </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

        
    </body>
</html> 
