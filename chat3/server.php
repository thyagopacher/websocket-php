<?php
include "../sistema/model/Conexao.php";
$conexao = new Conexao();
// prevent the server from timing out
set_time_limit(0); 
ini_set('max_execution_time','0');
// include the web sockets server script (the server is started at the far bottom of this file)
require 'class.PHPWebSocket.php';

// when a client sends data to the server 
function wsOnMessage($clientID, $message, $messageLength, $binary) {
    global $Server, $conexao;
    $ip = long2ip($Server->wsClients[$clientID][6]);
    $jsonMsg = json_decode($message);
    // check if message length is 0
    if ($messageLength == 0) {
        $Server->wsClose($clientID);
        return;
    }
    foreach ($Server->wsClients as $id => $client) {
        $pessoa_enviou  = $conexao->comandoArray('select codempresa, nome from pessoa where codpessoa = ' . $jsonMsg->codpessoa1);
        $pessoa_recebe  = $conexao->comandoArray('select codempresa, nome from pessoa where codpessoa = ' . $jsonMsg->codpessoa2);
        $acesso_hoje    = $conexao->comandoArray('select codacesso from acesso where acesso.data = CURRENT_DATE() and acesso.dtsaida = "0000-00-00 00:00:00"');

        if(!isset($acesso_hoje["codacesso"]) || $acesso_hoje["codacesso"] == NULL || $acesso_hoje["codacesso"] == ""){
            $msg_enviada    = "Msg. enviada por: ".$pessoa_enviou["nome"];
            $msg_enviada   .= "<br>Destino para: ".$pessoa_recebe["nome"];
            $msg_enviada   .= "<br>Msg: ".addslashes($jsonMsg->message);            
            $resInserirFila = $conexao->comando("INSERT INTO `filaemail`(`codempresa`, `codfuncionario`, `dtcadastro`, `situacao`, `texto`, `assunto`, `codpessoa`, `tipo`, `codpagina`, `lido`, `anexo`, `enviadode`) 
            VALUES ('".$pessoa_enviou["codempresa"]."', '".$jsonMsg->codpessoa1."', '".date("Y-m-d H:i:s")."', 'n', '".$msg_enviada."', 'Contato offline chat gestccon', '".$jsonMsg->codpessoa2."',
            '0', '0', 'n', '', 'computador')");
        } 

        $reschatp = mysqli_query($conexao->conexao, "select texto 
        from chat 
        where codpessoa1 = ".$jsonMsg->codpessoa1." 
        and   codpessoa2 = ".$jsonMsg->codpessoa2." 
        and dtcadastro >= '".date("Y-m-d")." 00:00:00' 
        and dtcadastro <= '".date("Y-m-d")." 23:59:59'    
        and codempresa = ".$pessoa_enviou["codempresa"]);
        if($reschatp == FALSE){
            die("Erro causado por:". mysqli_error($conexao->conexao));
        }else{
            $chatp = mysqli_fetch_array($reschatp);
        }
        if(!isset($chatp["texto"]) || $chatp["texto"] == NULL || addslashes($chatp["texto"]) != addslashes($jsonMsg->message)){
            $resInserirChat = mysqli_query($conexao->conexao, "INSERT INTO `chat`(`codpessoa1`, `codpessoa2`, `codempresa`, `texto`, `dtcadastro`) 
            VALUES (".$jsonMsg->codpessoa1.", ".$jsonMsg->codpessoa2.", ".$pessoa_enviou["codempresa"].", '" . addslashes($jsonMsg->message) . "', '" . date("Y-m-d H:i:s") . "')");       
            if($resInserirChat == FALSE){
                die("Erro causado por:". mysqli_error($conexao->conexao));
            }
        }else{
            $resErroComando = mysqli_query($conexao->conexao, "INSERT INTO `log`(`codpessoa`, `codempresa`, `codpagina`, `acao`, 'observacao') 
            VALUES (".$jsonMsg->codpessoa1.", ".$pessoa_enviou["codempresa"].", 0, 'inserir', 'Erro ao inserir chat causado por: ".  mysqli_error($conexao->conexao)."')");               
        }
        $Server->wsSend($id, json_encode(array('type' => 'usermsg', 'name' => $jsonMsg->name, 'message' => $jsonMsg->message, 'color' => 'black', 'codpessoa1' => $jsonMsg->codpessoa1, 'codpessoa2' => $jsonMsg->codpessoa2)));
    }
}

// when a client connects
function wsOnOpen($clientID) {
    global $Server;
    $ip = long2ip($Server->wsClients[$clientID][6]);

    $Server->log("$ip ($clientID) has connected.");

    //Send a join notice to everyone but the person who joined
    foreach ($Server->wsClients as $id => $client) {
        if ($id != $clientID) {
            $Server->wsSend($id, "");
        }
    }
}

// when a client closes or lost connection
function wsOnClose($clientID, $status) {
    global $Server;
    $ip = long2ip($Server->wsClients[$clientID][6]);

    $Server->log("$ip ($clientID) has disconnected.");

    //Send a user left notice to everyone in the room
    foreach ($Server->wsClients as $id => $client) {
        $Server->wsSend($id, "Visitor $clientID ($ip) has left the room.");
    }
}

// start the server
$Server = new PHPWebSocket();
$Server->bind('message', 'wsOnMessage');
$Server->bind('open', 'wsOnOpen');
$Server->bind('close', 'wsOnClose');
// for other computers to connect, you will probably need to change this to your LAN IP or external IP,
// alternatively use: gethostbyaddr(gethostbyname($_SERVER['SERVER_NAME']))
//echo "Endereço ip: ". gethostbyaddr(gethostbyname($_SERVER['SERVER_NAME']));
//echo "host alternativo 2";
$Server->wsStartServer('0.0.0.0', 5222);
