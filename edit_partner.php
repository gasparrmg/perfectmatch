<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'/>
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />

    <!--- Stylesheets--->
    <link rel = "stylesheet" href = "css/main.page.style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css"/>

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
    <div class = "card">
        <div class="header">
            <?php
                require_once ('MysqliDb.php');
                $db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
                $id_partner = $_POST["id"];
                $db -> where('id_parceiro', $id_partner);
                
                $parceiro = $db -> get('parceiros');
                
                $db -> where('id_campo', $parceiro[0]['id_campo']);
                $campo_interesse_parceiro = $db -> get('campos_de_interesse');
                $campos_interesse_general = $db -> get('campos_de_interesse');
                
                $db -> where('id_parceiro', $id_partner);
                $locais_parceiro = $db -> get('locais');
                
            ?>
            <p><button type="button" class="btn btn-lg back-man-partners" class="fa fa-undo" aria-hidden="true"><i class="fa fa-undo" aria-hidden="true"></i> Voltar</button>
                        </p>
            <h4 class="title" style = "color: #DC006C;"><b style="font-size: 90%;">Parceiros</b></h4>
            <br>
        </div>
        <form action = "processforms/edit_partner_form.php" method = "post">
            
            <!-------------------------------
            
            FALTA INPUT DA FOTO
            
            -------------------------------->
            <input name ="partnerID" type="number" class="form-control" value = "<?php echo $id_partner; ?>" style = "display:none;">
            <div class = "row">
                <div class = "col-md-12">
                    <div class = "form-group">
                        <label>Nome</label>
                        <input name ="nome" type="text" class="form-control" value = "<?php echo $parceiro[0]['nome_parceiro']; ?>" required>
                    </div>
                </div>
            </div>
            <div class = "row">
                <div class = "col-md-12">
                    <div class = "form-group">
                        <label>Descrição</label>
                        <input name ="description" type="text" class="form-control" value = "<?php echo $parceiro[0]['descrição']; ?>" required>
                    </div>
                </div>
            </div>
            <div class = "row">
                <div class = "col-md-6">
                    <div class = "form-group">
                        <label>Categoria</label>
                        <?php
                        echo '<select name = "categoria" id="categoria" class="form-control" required>';
                        for ($i = 0; $i < count($campos_interesse_general); $i++) {
                            if (strcasecmp($campo_interesse_parceiro[0]['nome_campo'], $campos_interesse_general[$i]['nome_campo']) === 0) {
                                $field = $campos_interesse_general[$i]["nome_campo"];
                                echo '<option selected="selected">' . ucfirst($campos_interesse_general[$i]["nome_campo"]) . '</option>';
                            } else {
                                echo '<option>'.ucfirst($campos_interesse_general[$i]["nome_campo"]).'</option>';
                            }
                        }
                        echo '</select>';
                        ?>
                    </div>
                </div>
                <div class = "col-md-6">
                    <div class = "form-group">
                        <label>Especificação do parceiro</label>
                        <select name = "especificacao_campo" id = "especificacao" class ="form-control" required>
                            <?php 
                            $db -> where('nome_campo', $field);
                            $campo = $db -> get('campos_de_interesse');
                            $id_campo = $campo[0]["id_campo"];

                            $db -> where('id_campo', $id_campo);
                            $results = $db -> get("especificacoes_campos");
                            
                            foreach($results as $result){
                                if(strcasecmp($result["possivel_input"], $parceiro[0]['especificacao_campo']) === 0){
                                    echo '<option selected="selected">'.$result["possivel_input"].'</option>';
                                } else {
                                    echo '<option>'.$result["possivel_input"].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="header">
                <h4 class="title" style = "color: #DC006C;font-size: 90%;"><b>Locais</b><b><i class="fa fa-plus-circle pull-right add-row-icon" style = " color: #DC006C; cursor:pointer; font-size: 1.5em;"></i></b></h4>
                <br>
            </div>
            
            <div class = "moradas">
                <?php
                for ($i = 0; $i < count($locais_parceiro); $i++) {
                    echo '<div class = "row">';
                    echo '<div class = "col-sm-12">';
                    echo '<div class="form-group">';
                    echo '<label>Morada</label>';
                    echo '<input name = "morada[]" type="text" class="form-control" style = "width:90%; position:absolute;" value = "' . $locais_parceiro[$i]["nome_local"] . '">';
                    echo '<i class="fa fa-minus-circle pull-right remove-row-icon" style = "font-size: 90%;color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:30px; padding-right:15px;"></i>';
                    echo '</div></div></div>';
                }
                ?>
                <div class = "row">
                    <div class = "col-sm-12">
                        <div class="form-group">
                            <label>Morada</label>
                            <?php
                                echo '<input type="text" name = "morada[]" class="form-control" style = "width:90%; position:absolute;">';
                                echo '<i class="fa fa-minus-circle pull-right remove-row-icon" style = "font-size: 90%;color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:30px; padding-right:15px;"></i>';
                             
                            ?>
                        </div>
                    </div>
                    <br><br>
                </div>
            </div>
            <br><br>
            <p><button type="submit" class="btn btn-lg btn-fill pull-right" style = "background-color: #DC006C; color:#FFF">Editar parceiro</button><p>
            <div class="clearfix"></div>
        </form>
    </div>
    
    <script>
        $(document).ready(function () {
            $("#categoria").change(function(){
                $.ajax({
                    type: "POST",
                    url: "processforms/load_partner_specification.php",
                    datatype: "HTML",
                    data: { 
                        category: $('#categoria').val() 
                    },
                    success: function(data) {
                        $("#especificacao").html(data);
                    }
                });
            });
        });
        
        $(document).on('click', '.remove-row-icon', function () {
            //codigo PHP para remover da bd, se necessário
            $(this).parent().parent().parent().remove();   
        });
            
        $(document).on('click', '.add-row-icon', function() {
            var div = document.createElement('div');
            div.className = 'row';
            $parent_to_add = $(this).parent().parent().parent().parent().children(".moradas");
            div.innerHTML = '<div class = "col-sm-12"><div class="form-group"><label>Morada</label><input type="text" class="form-control" name = "morada[]" style = "width:90%; position:absolute;"><i class="fa fa-minus-circle pull-right remove-row-icon" style = "color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:30px; padding-right:15px;"></i></div></div><br><br></div>';
            $parent_to_add.append(div);
        });
    </script>