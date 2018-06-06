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
            $id_campo = $_POST["id"];
            require_once ('MysqliDb.php');
            $db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
            $db -> where("id_campo", $id_campo);
            $input_campo_interesse = $db -> get ('inputs_campos_interesse');
            $db -> where("id_campo", $id_campo);
            $especificacoes_campo = $db -> get("especificacoes_campos");
        ?>
        <div class = "row">
            <div class = "col-md-12">
                <div class = "card">
                    <div class="header">
                        <h4 class="title" style = "color: #DC006C;"><b>Edite o campo de interesse</b></h4>
                    </div>
                    <div class="content">
                        <form method = "POST" action = "processforms/edit_interest_form.php">
                            <input type = "number" name = "id_campo" value = "<?php echo $input_campo_interesse[0]["id_campo"] ?>" style = "display:none;">
                            <div class = "row">
                                <div class = "col-md-6">
                                    <div class = "form-group">
                                        <label>Campo de interesse</label>
                                        <input name ="nome_campo" type="text" class="form-control" value = "<?php echo ucfirst(str_replace('_', ' ', $input_campo_interesse[0]['nome_tabela_criada'])); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-md-6">
                                    <div class = "form-group">
                                        <label>Input nome</label>
                                        <input name = "nome_input" type="text" class="form-control" value = "<?php echo ucfirst(str_replace('_', ' ', $input_campo_interesse[0]["nome_input"])); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="header">
                                <h4 class="title" style = "color: #DC006C;font-size: 90%;"><b>Adicionar especificações</b><b><i class="fa fa-plus-circle pull-right add-row-icon" style = " color: #DC006C; cursor:pointer; font-size: 1.5em;"></i></b></h4>
                                <br>
                            </div>
                            <div class = "specs">
                                <?php
                                for($i = 0; $i < count($especificacoes_campo); $i++){
                                    echo '<div class = "row">';
                                    echo '<div class = "col-sm-6">';
                                    echo '<div class="form-group">';
                                    echo '<label>Especificação</label>';
                                    echo '<input name = "especificacoes[]" type="text" class="form-control" style = "width:90%; position:absolute;" value = "'.$especificacoes_campo[$i]["possivel_input"].'">';
                                    echo '<br>';
                                    echo '<i class="fa fa-minus-circle pull-right remove-row-icon" style = "font-size: 90%;color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:10px;"></i>';
                                    echo '<br>';
                                    echo '<br>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<br><br>';
                                    echo '</div>';
                                }
                                ?>
                                <div class = "row">
                                    <div class = "col-sm-6">
                                        <div class="form-group">
                                            <label>Especificação</label>
                                            <input name = "especificacoes[]" type="text" class="form-control" style = "width:90%; position:absolute;">
                                            <br>
                                            <i class="fa fa-minus-circle pull-right remove-row-icon" style = "font-size: 90%;color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:10px;"></i>
                                            <br>
                                            <br>
                                        </div>
                                    </div>
                                    <br><br>
                                </div>
                            </div>


                            <br><br>
                            <button type="submit" class="btn btn-lg btn-fill pull-right" style = "background-color: #DC006C; color:#FFF">Editar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <script>
            $(document).on('click', '.remove-row-icon', function () {
                //codigo PHP para remover da bd, se necessário
                $(this).parent().parent().parent().remove();   
            });
            
            $(document).on('click', '.add-row-icon', function() {
                var div = document.createElement('div');
                div.className = 'row';
                $parent_to_add = $(this).parent().parent().parent().parent().children(".specs");
                div.innerHTML = '<div class = "col-sm-6"><div class="form-group"><label>Especificação</label><input name = "especificacoes[]" type="text" class="form-control" style = "width:90%; position:absolute;"><br><i class="fa fa-minus-circle pull-right remove-row-icon" style = "color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:10px;"></i><br><br></div></div><br><br></div>';
                $parent_to_add.append(div);
            });
        </script>
    </body>
    
    