<html>
    <head>

    </head>
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
    <body onload = "load_first_tab()">
        <?php 
            require_once ('MysqliDb.php');
            $db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
            $campos_interesse_general = $db -> get('campos_de_interesse');
        ?>
        <div class = "row">
            <div class = "col-md-12">
                <div class = "card">
                    <div class="header">
                        <h4 class="title" style = "color: #DC006C;"><b>Gerir Parceiros</b></h4>
                    </div>
                    <div class="content">
                        <ul class="nav nav-tabs" role="tablist" id = "tab">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#adicionarParceiro" role="tab">Adicionar parceiros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#gerirParceiros" role="tab">Editar ou eliminar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#gerirLocais" role="tab">Gerir locais</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="adicionarParceiro" role="tabpanel">
                                <div class="header">
                                    <h4 class="title" style = "color: #DC006C;"><b style="font-size: 90%;">Parceiros</b></h4>
                                    <br>
                                </div>
                                <form method = "POST" action = "processforms/add_partner.php" enctype="multipart/form-data">
                                    <div class = "row">
                                        <div class = "col-md-12">
                                            <div class = "form-group">
                                                <label>Nome</label>
                                                <input name ="nome" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-12">
                                            <div class = "form-group">
                                                <label>Descrição</label>
                                                <input name ="description" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-6">
                                            <div class = "form-group">
                                                <label>Categoria</label>
                                                <select name ="categoria" id ="categoria" class="form-control" required>
                                                    <?php
                                                        foreach($campos_interesse_general as $campos){
                                                            echo '<option>'.ucfirst($campos["nome_campo"]).'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class = "col-md-6">
                                            <div class = "form-group">
                                                <label>Especificação do parceiro</label>
                                                <select name = "especificacao_campo" id = "especificacao" class ="form-control" required></select>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="header">
                                        <h4 class="title" style = "color: #DC006C;font-size: 90%;"><b>Locais</b><b><i class="fa fa-plus-circle pull-right add-row-icon" style = " color: #DC006C; cursor:pointer; font-size: 1.5em;"></i></b></h4>
                                        <br>
                                    </div>
                                    <div class = "moradas">
                                        <div class = "row">
                                            <div class = "col-sm-12">
                                                <div class="form-group">
                                                    <label>Morada</label>
                                                    <input name ="morada[]" type="text" class="form-control" style = "width:90%; position:absolute;">
                                                    <i class="fa fa-minus-circle pull-right remove-row-icon" style = "font-size: 90%;color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:30px;"></i>
                                                </div>
                                            </div>
                                        <br><br>
                                        </div>
                                    </div>
                                    <br></br>
                                    <div class = "row">
                                        <div class = "col-md-4">
                                        </div>
                                        <div class = "col-md-4">
                                        </div>
                                        <div class = "col-md-4">
                                            <div class="form-group">
                                                <label>Imagem do parceiro</label>
                                                <input type="hidden" name="size" value="100000">
                                                <input type="file" name="image" required>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <button type="submit" class="btn btn-lg btn-fill pull-right" style = "background-color: #DC006C; color:#FFF">Adicionar parceiro</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            <div class="tab-pane" id="gerirParceiros" role="tabpanel">
                                <br>
                                <div class = "row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input id ="id_partner" type="Number" class="form-control search-one">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input id = "name_partner" type="text" class="form-control search-one">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <input id = "category_partner" type="text" class="form-control search-one">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Categoria</th>
                                        <th></th>
                                        <th></th>
                                        </thead>
                                        <tbody id = "results-one">
                                            
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="tab-pane" id="gerirLocais" role="tabpanel">
                                <br>
                                <div class = "row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>ID Local</label>
                                            <input id = "id_local" type="Number" class="form-control search-two">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Nome parceiro</label>
                                            <input id ="name_partner2" type="text" class="form-control search-two">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Morada</label>
                                            <input id ="address" type="text" class="form-control search-two">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <th>ID Parceiro</th>
                                        <th>Nome parceiro</th>
                                        <th>Morada</th>
                                        <th></th>
                                        <th></th>
                                        </thead>
                                        <tbody id = "results-two">
                                            <tr>
                                                <td>1</td>
                                                <td>A Camponesa</td>
                                                <td>Calçada do Tojal, nº 50</td>
                                                <td><a href = "" class = "edit-partner" value = "edit_partner.php?id=2"><button type="button" class="btn btn-primary btn-lg pull-right">Editar</button></a></td>
                                                <td><a href = "" class = "del-local" value = "delete_local.php?id=2"><button type="button" class="btn btn-primary btn-lg pull-right">Eliminar</button></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
                <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function () {
                $(".search-one").keyup(function (){
                    $.ajax({
                        type: "POST",
                        url: "processforms/search_db_partners.php",
                        datatype: "HTML",
                        data: { id_partner : $('#id_partner').val(), 
                                name_partner: $('#name_partner').val(), 
                                category_partner : $('#category_partner').val() },
                        success:function (data) {
                            $('#results-one').html(data);
                        }
                    });
                }).keyup();
                $(".search-two").keyup(function (){
                    $.ajax({
                        type: "POST",
                        url: "processforms/search_db_locals.php",
                        datatype: "HTML",
                        data: { 
                            id_local : $('#id_local').val(), 
                            name_partner: $('#name_partner2').val(), 
                            address : $('#address').val() 
                        },
                        success:function (data) {
                            $('#results-two').html(data);
                        }
                    });
                }).keyup();
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
                }).change();
            });
            
          $('#tab a').click(function (e) {

              $('#tab a').removeClass('active');
              $(this).addClass('active');
              $(this).tab('show');

              e.preventDefault();
          });

          function load_first_tab() {
              $('#tab a:first').tab('show');
          }
          
          $(document).on('click', '.remove-row-icon', function () {
                //codigo PHP para remover da bd, se necessário
                $(this).parent().parent().parent().remove();   
            });
            
            $(document).on('click', '.add-row-icon', function() {
                var div = document.createElement('div');
                div.className = 'row';
                $parent_to_add = $(this).parent().parent().parent().parent().children(".moradas");
                div.innerHTML = '<div class = "col-sm-12"><div class="form-group"><label>Morada</label><input name = "morada[]" type="text" class="form-control" style = "width:90%; position:absolute;"><i class="fa fa-minus-circle pull-right remove-row-icon" style = "color: #a5a5a5; position:relative; cursor:pointer; font-size: 1.5em;padding-top:30px;"></i></div></div><br><br></div>';
                $parent_to_add.append(div);
            });
        </script>
    </body>
</html>
