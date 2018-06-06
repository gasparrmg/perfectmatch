
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
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div  class="navbar-brand">
                            <a id="menu-toggle" class="glyphicon btn-menu toggle"  style = "top: 5px;">
                                <i class="fa fa-bars"></i>
                            </a>
                            <a href="home_content.php">
                                <img src = "img/logo.png">
                            </a>

                        </div>

                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-center" >
                            <li><p class="navbar-text"><span>Bem-vindo, <?php session_start(); echo $_SESSION['username']; ?></span></p></i>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="processforms/sign_out.php"><span>Sign out</span></a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <nav id="spy">
                  <?php
                    
                        if(!isset($_SESSION)) 
                        { 
                    session_start(); 
                            } 
                         
                    echo '<ul class="sidebar-nav nav">';
                        echo '<br>';
                            if(strcmp($_SESSION["tipo_login"], "admin") == 0){
                                echo '<li class="active"><a id = "first" href="manage_partners.php"><i class="pe-7s-cash"></i><p>Gerir Parceiros</p></a></li>';
                                echo '<li><a id = "manage-clients" href="manage_clients.php"><i class="pe-7s-users"></i><p>Gerir clientes</p></a></li>';
                                echo '<li><a id = "manage-dates" href="manage_dates.php"><i class="pe-7s-like"></i><p>Gerir encontros</p></a></li>';
                                echo '<li><a id = "manage-employees" href="manage_employees.php"><i class="pe-7s-portfolio"></i><p>Gerir empregados</p></a></li>';
                                echo '<li><a id = "manage-interests" href="manage_interests.php"><i class="pe-7s-star"></i><p>Campos de interesse</p></a></li>';
                               

                            } else if (strcmp($_SESSION["tipo_login"], "empregado") == 0){
                                echo '<li class="active"><a id = "first" href="manage_partners.php"><i class="pe-7s-cash"></i><p>Gerir Parceiros</p></a></li>';
                                echo '<li><a id = "manage-clients" href="manage_clients.php"><i class="pe-7s-users"></i><p>Gerir clientes</p></a></li>';
                                echo '<li><a id = "manage-dates href="manage_dates.php"><i class="pe-7s-like"></i><p>Gerir encontros</p></a></li>';
                                echo '<li><a id = "manage-interests" href="manage_interests.php"><i class="pe-7s-star"></i><p>Campos de interesse</p></a></li>';

                            } else {
                                echo '<li class="active"><a id = "first" href="home_content.php"><i class="pe-7s-home"></i><p>Home</p></a></li>';
                                echo '<li><a href="profile_content.php"><i class="pe-7s-user"></i><p>Perfil</p></a></li>';
                                echo '<li><a href="suggestions_content.php"><i class="pe-7s-users"></i><p>Lista de Matches</p></a></li>';
                                echo '<li><a href="dates_content.php"><i class="pe-7s-notebook"></i><p>Encontros</p></a></li>';
                                echo '<li><a href="historic_content.php"><i class="pe-7s-portfolio"></i><p>Histórico de encontros</p></a></li>';
                                echo '<li><a href="chat_content.php"><i class="pe-7s-chat"></i><p>Chat</p></a></li><li>';
                            }
                    echo '</ul>';
                        ?>

                    
                </nav>
            </div>
            <!-- Page content -->
            <div id="page-content-wrapper">
                <div class="page-content">
                    <div class="container-fluid" id = "page-content">
                        
                    </div>
                </div>
            </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){

                $("#menu-toggle").click(function (e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("active");
                });
                
                $('#page-content').on( 'click', '.card-click a', function(e){
                    $('#page-content').load($(this).attr('value'));
                    e.preventDefault();
                });
                
                $('#sidebar-wrapper a').click(function(e){
                    $('.sidebar-nav li').removeClass('active');
                    $(this).parent().addClass('active');
                    $("#page-content").load($(this).attr('href'));
                    e.preventDefault();
                    $('#page-content').on( 'click', '.card-click a', function(e){
                        $('#page-content').load($(this).attr('value'));
                        e.preventDefault();
                    });
                    
                });
                /*
                 * JQUERY PARTE DOS CLIENTES
                 */
                $('#page-content').on( 'click', '.card-sug-date .title a', function(e){
                    $("#page-content").load( 
                             $(this).attr('value'), {
                        id : $(this).attr('id')
                    });
                    e.preventDefault();
                });
                $('#page-content').on( 'click', '.card-date .title a', function(e){
                    $("#page-content").load( 
                             $(this).attr('value'), {
                        id : $(this).attr('id')
                    });
                    e.preventDefault();
                });
                
                /*
                 * JQUERY PARTE DOS EMPREGADOS
                 */
                    /*
                     * JQUERY EMPREGADOS
                     */
                $('#page-content').on( 'click', '.edit-employee', function(e){
                    $("#page-content").load( 
                             $(this).attr('value'), {
                        id : $(this).attr('id')
                    });
                    e.preventDefault();
                    $('#page-content').on( 'click', '.back-man-employee', function(e){
                        $('#page-content').load('manage_employees.php');
                        e.preventDefault();
                    });
                });
                
                $('#page-content').on( 'click', '.del-employee', function(e){
                    $.ajax({
                        type:'POST',
                        url: $(this).attr('value'),
                        data: 'id='+$(this).attr('id'),
                        success: function(){
                            $('#page-content').load('manage_employees.php');
                        }
                    });
                    e.preventDefault();
                });
                    
                    /*
                     * JQUERY CLIENTES
                     */    
                $('#page-content').on( 'click', '.edit-profile', function(e){
                    $("#page-content").load( 
                             $(this).attr('value'), {
                        id : $(this).attr('id')
                    });
                    e.preventDefault();
                    $('#page-content').on( 'click', '.back-man-clients', function(e){
                        $('#page-content').load('manage_clients.php');
                        e.preventDefault();
                    });
                });
                
                $('#page-content').on( 'click', '.del-client', function(e){
                    $.ajax({
                        type:'POST',
                        url: $(this).attr('value'),
                        data: 'id='+$(this).attr('id'),
                        success: function(){
                            $('#page-content').load('manage_clients.php');
                        }
                    });
                    e.preventDefault();
                });
                
                
                
                $('#page-content').on( 'click', '.confirm-ind-client', function(e){
                    $.ajax({
                        type:'POST',
                        url: $(this).attr('value'),
                        data: 'id='+$(this).attr('id'),
                        success: function(){
                            $('#page-content').load('manage_clients.php');
                        }
                    });
                    e.preventDefault();
                });
                $('#page-content').on( 'click', '.confirm-all-clients', function(e){
                    $link = $(this).attr('value');
                    $.ajax({
                        type:'POST',
                        url: $link,
                        success: function(){
                            $('#page-content').load('manage_clients.php');
                        }
                    });
                    e.preventDefault();
                });
                
                /*
                 * JQUERY INTERESSES
                 */
                $('#page-content').on( 'click', '.del-interest', function(e){
                    $.ajax({
                        type:'POST',
                        url: $(this).attr('value'),
                        data: 'id='+$(this).attr('id'),
                        success: function(){
                            $('#page-content').load('manage_interests.php');
                        }
                    });
                    e.preventDefault();
                });
                
                $('#page-content').on( 'click', '.edit-interest', function(e){
                    $("#page-content").load( 
                             $(this).attr('value'), {
                        id : $(this).attr('id')
                    });
                    e.preventDefault();
                    $('#page-content').on( 'click', '.back-man-interests', function(e){
                        $('#page-content').load('manage_interests.php');
                        e.preventDefault();
                    });
                });
                
                /*
                 * JQUERY PARCEIROS E LOCAIS
                 */
                $('#page-content').on( 'click', '.edit-partner', function(e){
                    $("#page-content").load( 
                             $(this).attr('value'), {
                        id : $(this).attr('id')
                    });
                    e.preventDefault();
                    $('#page-content').on( 'click', '.back-man-partners', function(e){
                        $('#page-content').load('manage_partners.php');
                        e.preventDefault();
                    });
                });
                
                $('#page-content').on( 'click', '.dates_see_profile', function(e){
                    $("#page-content").load( 
                             $(this).attr('value'), {
                        id : $(this).attr('id')
                    });
                    e.preventDefault();
                    //BUSCAR BOTÃO VOLTAR
                    $('#page-content').on( 'click', '.back-see-dates', function(e){
                        $("#page-content").load( 
                             $(this).attr('value'), {
                            id : $(this).attr('id')
                        });
                        e.preventDefault();
                    });
                });
                
                $('#page-content').on( 'click', '.del-partner', function(e){
                    $.ajax({
                        type:'POST',
                        url: $(this).attr('value'),
                        data: 'id='+$(this).attr('id'),
                        success: function(){
                            $('#page-content').load('manage_partners.php');
                        }
                    });
                    e.preventDefault();
                });
                
                $('#page-content').on( 'click', '.del-local', function(e){
                    $.ajax({
                        type:'POST',
                        url: $(this).attr('value'),
                        data: 'id='+$(this).attr('id'),
                        success: function(){
                            $('#page-content').load('manage_partners.php');
                        }
                    });
                    e.preventDefault();
                });
                
                /*
                 * JQUERY DATES
                 */
                $('#page-content').on( 'click', '.gen-ind-date', function(e){
                    $.ajax({
                        type:'POST',
                        url: $(this).attr('value'),
                        data: 'id='+$(this).attr('id'),
                        success: function(){
                            $('#page-content').load('manage_dates.php');
                        }
                    });
                    e.preventDefault();
                });
                $('#page-content').on( 'click', '.edit-date', function(e){
                    $("#page-content").load( 
                             $(this).attr('value'), {
                        id : $(this).attr('id')
                    });
                    e.preventDefault();
                    
                    $('#page-content').on( 'click', '.back-man-dates', function(e){
                        $('#page-content').load('manage_dates.php');
                        e.preventDefault();
                    });
                });
                
                $('#page-content').on( 'click', '.del-date', function(e){
                    $.ajax({
                        type:'POST',
                        url: $(this).attr('value'),
                        data: 'id='+$(this).attr('id'),
                        success: function(){
                            $('#page-content').load('manage_dates.php');
                        }
                    });
                    e.preventDefault();
                });
                $('#page-content').on( 'click', '.gen-date-all', function(e){
                    $link = $(this).attr('value');
                    $.ajax({
                        type:'POST',
                        url: $link,
                        success: function(){
                            alert('lol');
                            $('#page-content').load('manage_dates.php');
                        }
                    });
                    e.preventDefault();
                });
                $("#first").click();
            });
            
        </script>
    
        
    </body>
</html>
