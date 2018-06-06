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
    <body onload = "load_first_tab()">

        <div class = "row">
            <div class = "col-md-12">
                <div class = "card">
                    <div class="header">
                        <h4 class="title" style = "color: #DC006C;"><b>Gerir clientes</b></h4>
                    </div>
                    <div class="content">
                        <ul class="nav nav-tabs" role="tablist" id = "tab">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#confirmarClientes" role="tab">Confirmar novos clientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#editClientes" role="tab">Editar/eliminar clientes</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="confirmarClientes" role="tabpanel">
                                <br>
                                <div class = "row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input id ="id_perfil" type="Number" class="form-control search-one">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input id ="username" type="text" class="form-control search-one">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input id ="name_perfil" type="text" class="form-control search-one">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input id ="email_perfil" type="text" class="form-control search-one">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Confirmado?</label>
                                            <select id="confirmado" class="form-control search-one">
                                                <option selected="selected"></option>
                                                <option>Sim</option>
                                                <option>Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="table-responsive" >
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Confirmado?</th>
                                            <th></th>
                                            <th></th>
                                        </thead>
                                        <tbody id = "results-one">
                                        </tbody>
                                    </table>
                                    <br>
                                    <a href = "" value = "confirm_all_clients.php" class = "confirm-all-clients"><button type="submit" class="btn btn-lg btn-fill pull-right" style = "background-color: #DC006C; color:#FFF">Confirmar todas as contas</button></a>
                                    <div class="clearfix"></div>
                                </div>
                                
                                
                                
                            </div>
                            <div class="tab-pane" id="editClientes" role="tabpanel">
                                <div class="tab-content">
                                    <br>
                                    <div class = "row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input id ="id_perfil2" type="Number" class="form-control search-two">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input id ="username2" type="text" class="form-control search-two">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input id ="name_perfil2" type="text" class="form-control search-two">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input id ="email_perfil2" type="text" class="form-control search-two">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Confirmado?</label>
                                            <select id= "confirmado2" class="form-control search-two">
                                                <option selected="selected"></option>
                                                <option>Sim</option>
                                                <option>Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                    
                            <div class="tab-pane active" id="editClientes" role="tabpanel">
                                
                                
                                
                                
                                
                                <div class="table-responsive" >
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Confirmado?</th>
                                            <th></th>
                                            <th></th>
                                        </thead>
                                        <tbody id = "results-two">
                                            
                                            
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="clearfix"></div>
                                </div>
                                
                                
                                
                                
                            </div>
                        </div>
                            </div>
                        </div>
                        <!--CONFIRMAÇÕES-->
                        
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
                        url: "processforms/search_db_clients_tab_one.php",
                        datatype: "HTML",
                        data: { id : $('#id_perfil').val(), 
                                username: $('#username').val(), 
                                name : $('#name_perfil').val(), 
                                email : $('#email_perfil').val(), 
                                confirmado : $('#confirmado').val() },
                        success:function (data) {
                            $('#results-one').html(data);
                        }
                    });
                }).keyup();
                $(".search-one").change(function (){
                    $.ajax({
                        type: "POST",
                        url: "processforms/search_db_clients_tab_one.php",
                        datatype: "HTML",
                        data: { id : $('#id_perfil').val(), 
                                username: $('#username').val(), 
                                name : $('#name_perfil').val(), 
                                email : $('#email_perfil').val(), 
                                confirmado : $('#confirmado').val() },
                        success:function (data) {
                            $('#results-one').html(data);
                        }
                    });
                }).change();
                
                $(".search-two").keyup(function (){
                    $.ajax({
                        type: "POST",
                        url: "processforms/search_db_clients_tab_two.php",
                        datatype: "HTML",
                        data: { id : $('#id_perfil').val(), 
                                username: $('#username').val(), 
                                name : $('#name_perfil').val(), 
                                email : $('#email_perfil').val(), 
                                confirmado : $('#confirmado').val() },
                        success:function (data) {
                            $('#results-two').html(data);
                        }
                    });
                }).keyup();
                $(".search-two").change(function (){
                    $.ajax({
                        type: "POST",
                        url: "processforms/search_db_clients_tab_two.php",
                        datatype: "HTML",
                        data: { id : $('#id_perfil2').val(), 
                            username: $('#username2').val(), 
                            name : $('#name_perfil2').val(), 
                            email : $('#email_perfil2').val(), 
                            confirmado : $('#confirmado2').val() },
                        success:function (data) {
                            $('#results-two').html(data);
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
          
          
        </script>
    </body>
</html>    