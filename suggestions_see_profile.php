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
                            
                    <button type="button" class="btn btn-lg" class="fa fa-undo" aria-hidden="true"><i class="fa fa-undo" aria-hidden="true"></i> Voltar</button>
                        <p><h4 class="title" style = "color: #DC006C;"><b>Perfil de Brad Pitt</b></h4></p>
                    </div>
                    <div class="content">
                        <form>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Primeiro nome</label>
                                        <input type="text" class="form-control" value="Brad" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Último nome</label>
                                        <input type="text" class="form-control" value="Pitt" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Género</label>
                                        <select class="form-control" disabled>
                                            <option selected="selected">Masculino</option>
                                            <option value="2">Feminino</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Orientação sexual</label>
                                        <select class="form-control" disabled>
                                            <option selected="selected">Heterossexual</option>
                                            <option value="2">Homossexual</option>
                                            <option value="3">Bissexual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">E-mail</label>
                                        <input type="email" class="form-control" value="bradpitt@gmail.com" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Morada</label>
                                        <input type="text" class="form-control" value="Calçada do Tojal n. X" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Código Postal</label>
                                        <input type="text" class="form-control" value="2675-584" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Distrito</label>
                                        <input type="text" class="form-control" value="Lisboa" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Concelho</label>
                                        <input type="text" class="form-control" value="Odivelas" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Freguesia</label>
                                        <input type="text" class="form-control" value="Odivelas" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sobre mim</label>
                                        <textarea rows="5" class="form-control" readonly>Ator comediante aahaha</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class = "row">
                                <div class = "col-sm-4 col-md-offset-4">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" value="https://www.facebook.com/Brad-Pitt-165952813475830/" readonly>
                                </div>
                                <div class = "col-sm-4">
                                    <label>Twitter</label>
                                    <input type="text" class="form-control" value="https://twitter.com/bradpittspage" readonly>
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
                    <img class ="avatar" src = "img/brad_pitt.jpg">
                    <br><br>
                    <h2 class="title">Brad Pitt</h2>
                    <p class="category">Ator comediante aahaha</p>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>

                </div>
                <div align = "center">
                    <button type="button" class="btn btn-lg btn-success" style = "background-color: #DC006C; border-color: #DC006C"><i class="fa fa-check "></i> Aceitar</button>
                    <button type="button" class="btn btn-lg btn-danger" style = "background-color: #9D9D9D; border-color: #9D9D9D"><i class="fa fa-times"></i> Rejeitar</button>
                </div>
             </div>

            </div>
        <!-- Fim perfil geral -->


        <!-- Início preferencias -->
        <div class = "row">
            <div class = "col-md-9">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style = "color: #DC006C;"><b>As suas músicas favoritas</b><b></b></h4>

                    </div>
                    <div class = "content">
                        <form>
                            <div id = "musicas">
                                <div class = "row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Artista</label>
                                            <input type="text" class="form-control m-artist-input" readonly>
                                            <div class = "suggesstion-box"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nome da música</label>
                                            <input type="text" class="form-control m-music-input" readonly>
                                            <div class = "suggesstion-box"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Género</label>
                                            <input type="text" class="form-control m-music-genre" style = "width:80%; position:absolute;" readonly>
                                            
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <br>
                            <div class = "col-sm-4 col-md-offset-8">
                                
                            </div>
                            <br><br>
                            
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
                        <h4 class="title" style = "color: #DC006C;"><b>Os seus filmes favoritos</b><b></b></h4>

                    </div>
                    <div class = "content">
                        <form>
                            <div id = "filmes">
                                <div class = "row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Filme</label>
                                            <input type="text" class="form-control m-movie-input" readonly>
                                            <div class = "suggesstion-box"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Diretor</label>
                                            <input type="text" class="form-control m-director-input" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Género</label>
                                            <input type="text" class="form-control m-movie-genre" style = "width:80%; position:absolute;" readonly>
                                            
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <br>
                            <div class = "col-sm-4 col-md-offset-8">
                                
                            </div>
                            <br>
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
                        <h4 class="title" style = "color: #DC006C;"><b>As suas cores favoritas</b><b></b></h4>

                    </div>
                    <div class = "content">
                        <form>
                            <div id = "cores">
                                <div class = "row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Cores</label>
                                            <select class="form-control" style = "width:80%; position:absolute;" disabled>
                                                <option value = "1">Preto</option>
                                                <option value = "2">Branco</option>
                                                <option value = "3">Vermelho</option>
                                                <option value = "4">Amarelo</option>
                                                <option value = "5">Azul</option>
                                                <option value = "6">Verde</option>
                                                <option value = "7">Laranja</option>
                                                <option value = "8">Roxo</option>
                                                <option value = "9">Rosa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <br>
                            <div class = "col-sm-4 col-md-offset-8">
                                
                            </div>
                            <br>
                            <div class="clearfix"></div>
                        </form>
                    
                    </div>
                    
                    
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <script src = "scripts/suggestion_scripts/suggestion.script.js"></script>


    </body>
</html>