<html>
    <head>
        <title>Perfect Match</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'/>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" type="text/css" href="css/login.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <style>
            footer {
                width: 100%;
                background-color: #101010;
                padding: 3%;
                color: #FFF;
            }
            .fa{
                padding: 20px;
                font-size: 25px;
                color: #FFF;
            }
            .fa:hover{
                text-decoration: none;
                color:#d5d5d5;
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
            label {
                font-size: 12px;
                font-weight: 400;
                color: #9A9A9A;
                margin-bottom: 0px;
                margin-bottom: 5px;
                text-transform: uppercase;
            }
            @media (max-width: 900px){
                .fa {
                    font-size: 20px;
                    padding:0;
                }
            }

        </style>
    </head>
    <body>

        <!--- Início do menu --->
        <nav class = "navbar navbar-inverse" style="z-index: 9; width: 100%;">
            <div class = "container-fluid">
                <div class = "navbar-header">
                    <button type = "button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavBar">
                        <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span>
                    </button>
                    <a class = "navbar-brand" href="#">
                        <img src = "img/logo.png">
                    </a>
                </div>
                <div class = "collapse navbar-collapse" id = "myNavBar">
                    <ul class = "nav navbar-nav navbar-right">
                        <li class = "active"><a href="#">Home</a></li>
                        <li><a href="#sobre">Sobre nós</a></li>
                        <li><a href="#parceiros">Parceiros</a></li>
                        <li><a href="#contactos">Contactos</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Iniciar sessão</a>
                            <ul id="login-dp" class="dropdown-menu" style="width:100%;">
                                <li>
                                     <div class="row">
                                            <div class="col-md-12">

                                                 <form class="form" role="form" method="post" action="processforms\index_process_login.php" accept-charset="UTF-8" id="login-nav">
                                                        <div class="form-group">
                                                             <label class="sr-only">username</label>
                                                             <input type="text" class="form-control" placeholder="Username" name="username" required>
                                                        </div>
                                                        <div class="form-group">
                                                             <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                             <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="pwd" required>
                                                        </div>
                                                        <div class="form-group">
                                                             <button type="submit" class="btn btn-primary btn-block" style="background-color: #DC006C; border:1px solid #DC006C">Iniciar sessão</button>

                                                        </div>

                                                 </form>
                                            </div>
                                     </div>
                                </li>
                            </ul>
                        </li>

                        <!--REGISTO-->

                       <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Registe-se</a>
                            <ul id="login-dp" class="dropdown-menu" style="width:100%;">
                                <li>
                                     <div class="row">
                                            <div class="col-md-12">

                                                 <form class="form" role="form" method="post" action="processforms\index_process_register.php" accept-charset="UTF-8" id="login-nav">
                                                        <div class="form-group">
                                                             <label class="sr-only">Primeiro nome</label>
                                                             <input type="text" class="form-control" placeholder="Primeiro nome" name="fname" required>
                                                        </div>

                                                        <div class="form-group">
                                                             <label class="sr-only">Último nome</label>
                                                             <input type="text" class="form-control" placeholder="Último nome" name="lname" required>
                                                        </div>
                                                     
                                                        <div class="form-group">
                                                             <label class="sr-only">Email</label>
                                                             <input type="email" class="form-control" placeholder="E-mail" name="email" required>
                                                        </div>

                                                        <div class="form-group">
                                                             <label class="sr-only">Username</label>
                                                             <input type="text" class="form-control" placeholder="Username" name="username" required>
                                                        </div>
                                                        <div class="form-group">
                                                             <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                             <input type="password" class="form-control" placeholder="Password" name="password1" required>
                                                        </div>

                                                        <div class="form-group">
                                                             <label class="sr-only" for="exampleInputPassword2">Confirm Password</label>
                                                             <input type="password" class="form-control" placeholder="Confirm password" name="password2" required>
                                                        </div>

                                                        <div class="form-group">
                                                             <button type="submit" class="btn btn-primary btn-block" style="background-color: #DC006C; border:1px solid #DC006C">Registe-se</button>
                                                        </div>

                                                 </form>
                                            </div>
                                     </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>

        </nav> <!--- Fim do menu --->




        <!--- Inicio do slider--->



        <div id = "slider" class = "carousel slide" data-ride="carousel">
            <ol class = "carousel-indicators">
                <li data-target = "#slider" data-slide-to="0" class="active"></li>
                <li data-target = "#slider" data-slide-to="1"></li>
                <li data-target = "#slider" data-slide-to="2"></li>
            </ol>
            <div class = "carousel-inner" role = "listbox">
                <div class = "item active">
                    <img src="img/slider-img-two.jpeg">
                    <div class = "carousel-caption">
                        <h1>Ainda não é membro? Registe-se!</h1>
                    </div>
                </div> <!--- Fim da primeira image--->


                <div class = "item">
                    <img src="img/slider-img-one.jpeg">
                    <div class = "carousel-caption">
                        <h1>Conheça os nosso parceiros</h1>
                        <br>
                        <button type="button" class="btn btn-success btn-lg">Clique aqui</button>
                    </div>
                </div> <!--- Fim da segunda image--->
                <div class = "item">
                    <img src="img/slider-img-three.png">
                </div> <!--- Fim da terceira image--->
            </div>
            <!--- Começo dos controlos do slider--->
            <a class = "left carousel-control" href="#slider" rolo= "button" data-slide="prev">
                <span class = "glyphicon glyphicon-chevron-left" aria-hidder = "true"></span>
                <span class = "sr-only">Previous</span>
            </a>
            <a class = "right carousel-control" href="#slider" rolo= "button" data-slide="next">
                <span class = "glyphicon glyphicon-chevron-right" aria-hidder = "true"></span>
                <span class = "sr-only">Next</span>
            </a>
        </div>
        <!--- Fim do slider--->




        <div id ="sobre"></div>
        <div class = "container text-center"> <!--- Início serviços -->
            <h2><b>O que fazemos?</b></h2>
            <div class = "row">
                <div class="col-sm-4">
                    <img src= "img/icon-match.png" id = "icon">
                    <h4>Com base nas suas preferencias, garantimos-lhe a pessoa correta.</h4>
                </div>
                <div class="col-sm-4">
                    <img src= "img/icon-date.png" id = "icon">
                    <h4>Arranjamos-lhe um encontro, no dia ideial.</h4>
                </div>
                <div class="col-sm-4">
                    <img src= "img/icon-local.png" id = "icon">
                    <h4>E no local ideial.</h4>
                </div>
            </div>
        </div>  <!--- Fim serviços -->
        <div id = "parceiros"></div>
        <div class = "container-full">

            <div class="jumbotron jumbotron-fluid" style = "background-color: #101010">

                <div class = "container-fluid">
                    <h2 style = "text-align: center;"><b>Parceiros</b></h2> <br>
                    <div class="row">
                        <div class="col-md-6">
                            <p class = "lead">Estes são os nossos parceiros. Será nesta variedade de restaurantes, discotecas, bares e afins onde terá o date apropriado com a pessoa indicada.</p>
                            <p class = "lead">Os nossos parceiros estão compremetidos a dar o melhor serviço possível aos nossos clientes. Serão escolhidos com base nas suas preferências.</p>
                            <p class = "lead">Se ainda não casou, nós, que lhe garantimos o melhor parceiro para o seu date, e os nossos parceiros, que lhe garantem o lugar ideal, com certeza não permanecerá solteiro muito mais tempo. Este é o futuro. Embrace it!</p>
                        </div>
                        <div class="col-md-6">
                            <img src = "img/icon-partner.jpg" class = "img-responsive" style = "margin: 0 auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class = "container" id = "contactos">
            <div class = "row">
                <div class = "col-6 col-sm-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <div class="embed-responsive-item"  id ="map-1">


                        </div> <!--- Mapa. Ver javascript para adaptar a próximas colunas --->
                    </div>
                </div>
                <div class = "col-6 col-sm-3">
                    <b><span style="color:#DC006C">Teste Teste</span></b><br><br>
                       <span style="color:#DC006C">Tel:</span> 123456789<br><br>
                       <span style="color:#DC006C">Morada:</span> Lore Ipsum Morada muito lel<br><br>              <!--- O mesmo. meter proximos com os q estaram na bd --->
                       <span style="color:#DC006C">Categoria:</span> hmmm
                </div>
                <div class = "col-6 col-sm-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <div class="embed-responsive-item"  id ="map-2"></div> <!--- Mapa. Ver javascript para adaptar a próximas colunas --->
                    </div>
                </div>
                <div class = "col-6 col-sm-3">

                </div>
            </div>
        </div>

        <footer class = "container-fluid text-center">
            <div class = "row" style="position:relative;">
                <div class = "col-sm-4">
                    <h3 style = "color:#DC006C"><b>Contacte-nos</b></h3>
                    <br>
                    <span style="color:#DC006C">Morada: </span> Calçada do Tojal, n.º 8, 3.º DTO<br>
                    <span style="color:#DC006C">Telefone: </span> 923475847<br>
                    <span style="color:#DC006C">E-mail: </span> admin@perfectmatch.pt<br>
                </div>
                <div class = "col-sm-4">
                    <h3 style = "color:#DC006C"><b>Siga-nos</b></h3>
                    <br>
                    <a href = "#" class = "fa fa-facebook"></a>
                    <a href = "#" class = "fa fa-twitter"></a>
                    <a href = "#" class = "fa fa-linkedin"></a>
                    <a href = "#" class = "fa fa-youtube"></a>
                </div>
                <div class = "col-sm-4" style = "font-size:80%;">
                    <span style="color:#DC006C;">
                    <br><br><br>
                    Copyright: </span> Ctrl Solutions<br><br>
                    <a style = "text-decoration: none; color: #FFF" href = "#" >Backoffice</a>

                </div>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDE3ySLtLsitGn4Tq5cqzj9g_D_DnlMyLU&callback=initMap"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <script>
            $(function () {

                function initMap() {
                    var location = new google.maps.LatLng(50.0875726, 14.4189987);
                    var mapCanvas = document.getElementById('map-1');
                    var mapOptions = {
                        center: location,
                        zoom: 16,
                        panControl: false,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    var map = new google.maps.Map(mapCanvas, mapOptions);
                    var marker = new google.maps.Marker({
                        position: location,
                        map: map,
                        title: 'Hello World!'
                    });

                    mapsSetMark(map, 'Praceta Vitorino Nemésio, nº 6, Odivelas');
                }
                google.maps.event.addDomListener(window, 'load', initMap);

            });

            function mapsSetMark(map, address) {
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({'address': address}, function (results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        map.setZoom(13);
                        map.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    } else {
                        console.log('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }

            $('ul.nav').find('a').click(function(){
                var $href = $(this).attr('href');
                var $anchor = $('#'+$href).offset();
                window.scrollTo($anchor.left,$anchor.top);
                return false;
            });
        </script>
    </body>
</html>
