
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'/>
        <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />

        <!--- Stylesheets--->
        <link rel = "stylesheet" href = "css/main.page.style.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css"/>
    </head>
    <body>
        <?php
        require_once ('MysqliDb.php');
        session_start();
        $db = new MysqliDb('localhost', 'root', '', 'perfectmatch');
        $db -> where('id_login', $_SESSION['id_login']);
        $perfil_logged = $db->get('perfis');
        $db->where("aprovacao_p1", "Sim");
        $db->where("aprovacao_p2", "Sim");
        $db -> where ('id_perfil1', $perfil_logged[0]['id_perfil']);
        $db -> orWhere ('id_perfil2', $perfil_logged[0]['id_perfil']);
        $results = $db -> get('encontros');
        $messages = array();
        $perfis_chat = array();
        for($i = 0; $i < count($results); $i++){
            if($results[$i]['id_perfil1'] === $perfil_logged[0]['id_perfil']){
                $db -> where('id_perfil', $results[$i]['id_perfil2']);
            }
            if($results[$i]['id_perfil2'] === $perfil_logged[0]['id_perfil']){
                $db -> where('id_perfil', $results[$i]['id_perfil1']);
            }
            $res = $db -> get('perfis');
            array_push($perfis_chat, $res[0]);
            $params = Array(
                $perfil_logged[0]["id_perfil"],
                $perfis_chat[$i]["id_perfil"],
                $perfis_chat[$i]["id_perfil"],
                $perfil_logged[0]["id_perfil"]
            );
            array_push($messages, $db->rawQuery("SELECT * FROM mensagens WHERE (id_perfil_sender = ? and id_perfil_receiver = ?) or (id_perfil_sender = ? and id_perfil_receiver = ?) ORDER BY `date&time` ASC", $params));
         
        }
        ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel-body chat"> 
                    <div class="row chat-wrapper">  
                        <div class="col-md-4">
                            <div class="chat-list-wrapper" style="overflow-y: auto; height: 87%;">
                                <ul class="chat-list">

                                    <?php 
                                    for($i = 0; $i<count($perfis_chat); $i++){
                                        if($i === 0){
                                            echo '<li id = "'.$perfis_chat[$i]['id_perfil'].'" class="active">';
                                        } else {
                                            echo '<li id = "'.$perfis_chat[$i]['id_perfil'].'">';
                                        }
                                        
                                        echo '<span class="avatar-chat">';
                                        echo '<img src="avatars/'.$perfis_chat[$i]['avatar'].'" alt="avatar" class="avatar">';
                                        echo '</span>';
                                        echo '<div class="body">';
                                        echo '<div class="header">';
                                        echo '<span class="username">'.$perfis_chat[$i]['primeiro_nome'].' '.$perfis_chat[$i]['ultimo_nome'].'</span>';
                                        echo '<small class="timestamp text-muted">';
                                        if(count($messages[$i]) > 0){
                                            echo '<i class="fa fa-clock-o"></i> '.$messages[$i][count($messages[$i])-1]["date&time"];
                                        } else{
                                            echo '<br>';
                                        }
                                        echo '</small>';
                                        echo '</div>';
                                        if(count($messages[$i]) > 0){
                                            echo '<p>'.$messages[$i][count($messages[$i])-1]["mensagem"].'</p>';
                                        } else {
                                            echo '<p><br></p>';
                                        }
                                        
                                        echo '</div>';
                                        echo '</li>';
                                    }
                                                
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div id = "message-wrapper" class="message-list-wrapper" style="overflow: auto; height: 70%;">
                                <ul class="message-list">
                                </ul>
                            </div>
                            <div class="compose-box">
                                <div class="row">
                                    <div class="col-xs-12 mg-btm-10">
                                        <textarea id="btn-input" class="form-control input-sm" placeholder="Escreva a sua mensagem aqui..."></textarea>
                                    </div>
                                    <div class="col-xs-8">
                                    </div>
                                    <div class="col-xs-4"> 
                                        <button id ="send"  class="btn btn-green btn-lg pull-right">
                                            <i class="fa fa-location-arrow"></i> Enviar
                                        </button>
                                    </div> 
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <script src = "scripts/chat_scripts/chat.js"></script>
    </body>
</html>
