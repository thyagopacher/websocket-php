<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
ob_start();
if (!isset($_SESSION)) {
    echo '<script>alert("Não pode acessar o chat agora, por favor se log novamente sua sessão caiu!");</script>';
}
include "../sistema/model/Conexao.php";
$conexao = new Conexao();
?>
<html class="no-js wf-opensans-n4-active wf-opensans-n6-active wf-roboto-n3-active wf-roboto-n4-active wf-roboto-n5-active wf-active" dir="ltr">
    <head>
        <link rel="dns-prefetch" href="http://gestccon.com.br"/>
        <link rel="stylesheet" type="text/css" href="/sistema/visao/recursos/css/whatsapp.min.css">
        <link rel="stylesheet" type="text/css" href="/sistema/visao/recursos/css/sprite.css">
        <link rel="stylesheet" type="text/css" href="/sistema/visao/recursos/css/style_whatsapp.css">
        <link rel="stylesheet" type="text/css" href="/sistema/visao/recursos/css/sweet-alert.min.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>
            GestCCon Web 
        </title> 
        <meta name="viewport" content="width=device-width">
        <meta name="google" content="notranslate">
        <meta name="description" content="Envie e receba mensagens do GestCCon rapidamente direto do seu computador.">
        <meta name="og:description" content="Envie e receba mensagens do GestCCon rapidamente direto do seu computador.">
        <meta name="og:url" content="https://gestccon.com.br/">
        <meta name="og:title" content="GestCCon Web">
        <meta name="og:image" content="https://www.gestccon.com.br/img/fb-post.jpg">
        <link id="favicon" rel="shortcut icon" href="/sistema/visao/recursos/img/icone_chat.png" type="image/png">
        <style>
</style>
                                                                               </head>

                                                                               <body cz-shortcut-listen="true">                                                                                   
                                                                                   <div class="app-wrapper app-wrapper-main" data-reactid=".0">

                <div data-reactid=".0.$modal-manager"> 
                    <span data-reactid=".0.$modal-manager.1">
                    </span>
                </div>
                <span data-reactid=".0.$context-menu-manager">
                </span>
                <span data-reactid=".0.$tooltip-manager">
                </span>
                <div class="app two" data-reactid=".0.$main">
                    <span data-reactid=".0.$main.2">
                    </span>
                    <div data-reactid=".0.$main.3">
                        <span data-reactid=".0.$main.3.0">
                        </span>
                        <span data-reactid=".0.$main.3.1">
                        </span>
                        <span data-reactid=".0.$main.3.2">
                        </span>
                    </div>
                    <div class="pane pane-list" id="side" data-reactid=".0.$main.4">
                        <header class="pane-header pane-list-header" data-reactid=".0.$main.4.0:$ChatHeader">
                            <div class="pane-list-user" data-reactid=".0.$main.4.0:$ChatHeader.0">
                                <div class="avatar icon-user-default" style="cursor:pointer;  float: left;margin-top: 10px;" data-reactid=".0.$main.4.0:$ChatHeader.0.0">
                                    <?php if ($_SESSION["imagem"] != NULL && $_SESSION["imagem"] != "") { ?>
                                        <img src="/sistema/arquivos/<?= $_SESSION["imagem"] ?>" class="avatar-image is-loaded" data-reactid=".0.$main.4.0:$ChatHeader.0.0.0">
                                    <?php } ?>
                                </div>
                                <p title="<?= $_SESSION["nome"] ?>" id="nome_pessoa<?= $_SESSION['codpessoa'] ?>" style="float: left;color: black !important;margin-top: 20px;margin-left: 10px;">
                                    <?= $_SESSION["nome"] ?>                                                         
                                </p>
                                <img style="float: right;width: 100px;height: 55px;border-radius: 0;margin-right: -105px;" src="/sistema/visao/recursos/img/logo.png" class="avatar-image is-loaded" data-reactid=".0.$main.4.0:$ChatHeader.0.0.0">                                
                            </div>
                            <div class="pane-list-controls" data-reactid=".0.$main.4.0:$ChatHeader.1">
                                <div class="menu menu-horizontal" data-reactid=".0.$main.4.0:$ChatHeader.1.$chatlist-header">
                                    <span data-reactid=".0.$main.4.0:$ChatHeader.1.$chatlist-header.0">
                                        <div class="menu-item" data-reactid=".0.$main.4.0:$ChatHeader.1.$chatlist-header.0.$=11">
                                            <button class="icon icon-chat" data-ignore-capture="any" title="Nova conversa"
                                                    data-reactid=".0.$main.4.0:$ChatHeader.1.$chatlist-header.0.$=11.0">
                                                Nova conversa
                                            </button>
                                        </div>
                                        <div class="menu-item" data-reactid=".0.$main.4.0:$ChatHeader.1.$chatlist-header.0.$=12">
                                            <button class="icon icon-menu" data-ignore-capture="any" title="Menu"
                                                    data-reactid=".0.$main.4.0:$ChatHeader.1.$chatlist-header.0.$=12.0">
                                                Menu
                                            </button>
                                            <span data-reactid=".0.$main.4.0:$ChatHeader.1.$chatlist-header.0.$=12.1">
                                            </span>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </header>
                        <div class="butterbar-container" data-reactid=".0.$main.4.0:$ButterBar">
                            <span data-reactid=".0.$main.4.0:$ButterBar.0">
                            </span>
                            <span data-reactid=".0.$main.4.0:$ButterBar.1">
                            </span>
                        </div>
                        <div class="pane-subheader pane-list-subheader subheader-search" data-reactid=".0.$main.4.1">
                            <button class="icon icon-search-morph" data-reactid=".0.$main.4.1.0">
                                <div class="icon icon-back-blue" data-reactid=".0.$main.4.1.0.0">
                                </div>
                                <div class="icon icon-search" data-reactid=".0.$main.4.1.0.1">
                                </div>
                            </button>
                            <span data-reactid=".0.$main.4.1.1">
                            </span>

                            <label for="input-chatlist-search" class="cont-input-search" data-reactid=".0.$main.4.1.3">
                                <input type='text' class="input input-search" tabindex="2" dir="auto" title="Procurar usuário ativos" placeholder="Procurar usuário ativos" value="" id="nome_pesquisado" name='nome_pesquisado'>
                            </label>
                        </div>
                        <!--pessoas logadas-->
                        <div class="pane-body pane-list-body" id="pane-side" data-reactid=".0.$main.4.2">
                            <div class="infinite-list chatlist infinite-list-animate" style="will-change:transform;"data-reactid=".0.$main.4.2.0">
                                <div class="infinite-list-viewport" style="height:360px;" data-reactid=".0.$main.4.2.0.0">
                                    <!--começar laço aqui-->
                                    <?php
                                    if ($_SESSION["codnivel"] != "1") {
                                        $and .= " and (pessoa.codempresa = '{$_SESSION['codempresa']}' or pessoa.codnivel = '1')";
                                    }
                                    $sql = "select pessoa.codpessoa, pessoa.nome, pessoa.imagem, DATE_FORMAT(ultimaacao, '%H:%i') as ultimacaoacao_hora, pessoa.codempresa, DATE_FORMAT(dtsaida, '%H:%i:%s') as hora_saida,
                                    empresa.razao as condominio, pessoa.codnivel
                                    from pessoa    
                                    inner join acesso on acesso.codpessoa = pessoa.codpessoa and acesso.codempresa = pessoa.codempresa
                                    inner join nivel on nivel.codnivel = pessoa.codnivel and nivel.codempresa = pessoa.codempresa
                                    inner join empresa on empresa.codempresa = pessoa.codempresa 
                                    where acesso.data = '" . date("Y-m-d") . "' 
                                    and acesso.dtsaida = '0000-00-00 00:00:00' 
                                    and pessoa.codpessoa <> '{$_SESSION['codpessoa']}' 
                                    and nivel.nome <> 'Morador' $and";

                                    $respessoa = $conexao->comando($sql);
                                    $qtdpessoa = $conexao->qtdResultado($respessoa);

                                    //trocando por aqui não interessa se está online ou não
                                    if (isset($_GET["trocaPessoa"]) && $_GET["trocaPessoa"] != NULL && $_GET["trocaPessoa"] != "") {
                                        if ($qtdpessoa == 0) {
                                            $sql = "select pessoa.codpessoa, pessoa.nome, pessoa.imagem, DATE_FORMAT(ultimaacao, '%H:%i') as ultimacaoacao_hora, 
                                            pessoa.codempresa, DATE_FORMAT(dtsaida, '%H:%i:%s') as hora_saida,
                                            empresa.razao as condominio, pessoa.codnivel
                                            from pessoa    
                                            inner join acesso on acesso.codpessoa = pessoa.codpessoa and acesso.codempresa = pessoa.codempresa
                                            inner join nivel on nivel.codnivel = pessoa.codnivel and nivel.codempresa = pessoa.codempresa
                                            inner join empresa on empresa.codempresa = pessoa.codempresa 
                                            where acesso.codpessoa = '{$_GET["trocaPessoa"]}'
                                            and pessoa.codpessoa <> '{$_SESSION['codpessoa']}' 
                                            and nivel.nome <> 'Morador' $and order by acesso.codacesso desc limit 1";
                                            $respessoa = $conexao->comando($sql);
                                            $qtdpessoa = $conexao->qtdResultado($respessoa);
                                        }
                                    }

                                    if ($qtdpessoa > 0) {
                                        $alturaAcima = 0;
                                        while ($pessoa = $conexao->resultadoArray($respessoa)) {
                                            if (!isset($pessoa['hora_saida']) || $pessoa['hora_saida'] == NULL || $pessoa['hora_saida'] == "00:00:00") {
                                                $minutos_gastos = diferencaHora($pessoa['ultimacaoacao_hora'], date('H:i:s'));
                                                if ($minutos_gastos <= 3) {
                                                    $cor_bolinha = 'green';
                                                } elseif ($minutos_gastos > 3 && $minutos_gastos <= 30) {
                                                    $cor_bolinha = 'yellow';
                                                } elseif ($minutos_gastos > 30) {
                                                    continue;
                                                }
                                                $titulo .= '-Ultima ação há:' . $minutos_gastos . ' min';
                                            } else {
                                                $cor_bolinha = 'white';
                                            }
                                            if ($pessoa["codnivel"] == 1) {
                                                $souDe = "Sou seu suporte!!!";
                                            } else {
                                                $souDe = "Sou do condominio " . $pessoa["condominio"];
                                            }
                                            ?>
                                            <div class="infinite-list-item infinite-list-item-transition" style="z-index: 4; height: 72px; will-change: transform; transform: translate3d(0px, 0%, 0px); float: left;width: 100%;height: 70px;margin-top: <?= $alturaAcima ?>px;"
                                                 codpessoa="<?= $pessoa["codpessoa"] ?>" onclick='trocaPessoaFalando(<?= $pessoa["codpessoa"] ?>)'>
                                                <div class="chat-drag-cover" data-reactid=".0.$main.4.2.0.0.$5511987263937@c=1us.$5511987263937@c=1us">
                                                    <div class="chat" data-ignore-capture="any" contextmenu="false" id="chat_pessoa_<?= $pessoa["codpessoa"] ?>">
                                                        <div class="chat-avatar" data-reactid=".0.$main.4.2.0.0.$5511987263937@c=1us.$5511987263937@c=1us.0.0">
                                                            <div class="avatar icon-user-default" data-reactid=".0.$main.4.2.0.0.$5511987263937@c=1us.$5511987263937@c=1us.0.0.0">
                                                                <?php if (isset($pessoa["imagem"]) && $pessoa["imagem"] != NULL && $pessoa["imagem"] != "") { ?>
                                                                    <img src="/sistema/arquivos/<?= $pessoa["imagem"] ?>" class="avatar-image is-loaded" id="imagem_pessoa<?= $pessoa["codpessoa"] ?>">
                                                                <?php } else { ?>
                                                                    <img src="/sistema/visao/recursos/img/sem_imagem_chat.png" class="avatar-image is-loaded" id="imagem_pessoa<?= $pessoa["codpessoa"] ?>">
                                                                <?php } ?>
                                                                <p style="background:<?= $cor_bolinha ?>;width:10px; height:10px;border-radius:20px; float:left; margin-left: 50px;border: 1px solid black;margin-top: -15px;position: fixed;"></p>   
                                                            </div>
                                                        </div>
                                                        <div class="chat-body" data-reactid=".0.$main.4.2.0.0.$5511987263937@c=1us.$5511987263937@c=1us.0.1">
                                                            <div class="chat-main" data-reactid=".0.$main.4.2.0.0.$5511987263937@c=1us.$5511987263937@c=1us.0.1.0">
                                                                <div class="chat-title" data-reactid=".0.$main.4.2.0.0.$5511987263937@c=1us.$5511987263937@c=1us.0.1.0.0">
                                                                    <span class="emojitext ellipsify" dir="auto" title="<?= $souDe ?>" id="nome_pessoa<?= $pessoa["codpessoa"] ?>">
                                                                        <?= $pessoa["nome"] ?>
                                                                    </span>
                                                                </div>
                                                                <div class="chat-meta" data-reactid=".0.$main.4.2.0.0.$5511987263937@c=1us.$5511987263937@c=1us.0.1.0.1">
                                                                    <span class="chat-time" id='ultima_hora<?= $pessoa["codpessoa"] ?>'>
                                                                        <?= $pessoa["ultimacaoacao_hora"] ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="chat-secondary" data-reactid=".0.$main.4.2.0.0.$5511987263937@c=1us.$5511987263937@c=1us.0.1.1">
                                                                <div class="chat-status" title="‪" data-reactid=".0.$main.4.2.0.0.$5511987263937@c=1us.$5511987263937@c=1us.0.1.1.0">
                                                                    <span class="emojitext ellipsify" dir="auto" data-reactid=".0.$main.4.2.0.0.$5511987263937@c=1us.$5511987263937@c=1us.0.1.1.0.$status">
                                                                        <?php
                                                                        $sql = "select texto 
                                                                        from chat 
                                                                        where (codpessoa1 = '{$pessoa["codpessoa"]}' or codpessoa1 = '{$_SESSION['codpessoa']}') 
                                                                        and   (codpessoa2 = '{$pessoa["codpessoa"]}' or codpessoa2 = '{$_SESSION['codpessoa']}')    
                                                                        and codempresa = '{$pessoa["codempresa"]}' 
                                                                        order by codchat desc limit 1";

                                                                        $ultimo_chat = $conexao->comandoArray($sql);
                                                                        echo $ultimo_chat["texto"];
                                                                        ?>
                                                                    </span>
                                                                </div>
                                                                <div class="chat-meta" data-reactid=".0.$main.4.2.0.0.$5511987263937@c=1us.$5511987263937@c=1us.0.1.1.1">
                                                                    <span data-reactid=".0.$main.4.2.0.0.$5511987263937@c=1us.$5511987263937@c=1us.0.1.1.1.0">
                                                                    </span>
                                                                    <span data-reactid=".0.$main.4.2.0.0.$5511987263937@c=1us.$5511987263937@c=1us.0.1.1.1.1">
                                                                    </span>
                                                                    <span data-reactid=".0.$main.4.2.0.0.$5511987263937@c=1us.$5511987263937@c=1us.0.1.1.1.2">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $alturaAcima = $alturaAcima + 70;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="main" class="pane pane-chat" data-reactid=".0.$main.5">
                        <header class="pane-header pane-chat-header" data-reactid=".0.$main.5.0">
                            <div class="chat-avatar" data-reactid=".0.$main.5.0.0">
                                <div class="avatar icon-user-default" data-reactid=".0.$main.5.0.0.0">
                                    <img src="" style="display: none" class="avatar-image is-loaded" id="imagem_pessoa_falando">
                                </div>
                            </div>
                            <div class="chat-body" data-reactid=".0.$main.5.0.1">
                                <div class="chat-main" data-reactid=".0.$main.5.0.1.0">
                                    <h2 class="chat-title" dir="auto" data-reactid=".0.$main.5.0.1.0.0">
                                        <span class="emojitext ellipsify" title="" id='nome_pessoa_falando'>
                                            Escolha alguém para começar a conversar.
                                        </span>
                                    </h2>
                                </div>
                                <div class="chat-status ellipsify" data-reactid=".0.$main.5.0.1.1">
                                    <span class="emojitext ellipsify" title="" id='ultima_hora_vista'>
                                        visto por último hoje às <?= date('H:i') ?>
                                    </span>
                                </div>
                            </div>
                            <div class="pane-chat-controls" data-reactid=".0.$main.5.0.2">
                                <div class="menu menu-horizontal" data-reactid=".0.$main.5.0.2.$conversation-header">
                                    <div class="menu-item" data-reactid=".0.$main.5.0.2.$conversation-header.0">
                                        <button class="icon icon-clip" data-ignore-capture="any" title="Anexar"
                                                data-reactid=".0.$main.5.0.2.$conversation-header.0.0">
                                            Anexar
                                        </button>
                                        <span data-reactid=".0.$main.5.0.2.$conversation-header.0.1">
                                        </span>
                                    </div>
                                    <div class="menu-item" data-reactid=".0.$main.5.0.2.$conversation-header.1">
                                        <button class="icon icon-menu" data-ignore-capture="any" title="Menu"
                                                data-reactid=".0.$main.5.0.2.$conversation-header.1.0">
                                            Menu
                                        </button>
                                        <span data-reactid=".0.$main.5.0.2.$conversation-header.1.1">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="pane-body pane-chat-tile-container" data-reactid=".0.$main.5.1">
                            <div class="pane-chat-msgs pane-chat-body lastTabIndex" tabindex="0" data-reactid=".0.$main.5.1.0" id='message_box'>
                                <div class="pane-chat-empty" data-reactid=".0.$main.5.1.0.0">
                                </div>
                                <div class="more" data-reactid=".0.$main.5.1.0.1">
                                    <div class="btn-more" title="Carregar mensagens anteriores" data-reactid=".0.$main.5.1.0.1.0">
                                        <span class="icon icon-refresh" data-reactid=".0.$main.5.1.0.1.0.0">
                                        </span>
                                    </div>
                                </div>
                                <div class="message-list">
                                </div>
                            </div>
                            <div class="pane-chat-tile" data-reactid=".0.$main.5.1.1">
                            </div>
                        </div>
                        <footer class="pane-footer pane-chat-footer" data-reactid=".0.$main.5.2">
                            <span data-reactid=".0.$main.5.2.0">
                            </span>
                            <div class="block-compose" data-reactid=".0.$main.5.2.1">
                                <button class="icon icon-smiley btn-emoji" data-reactid=".0.$main.5.2.1.0">
                                </button>
                                <form style="width: 100%;" onsubmit="return false;">
                                    <input type="hidden" name="codpessoa1" id="codpessoa1" value='<?= $_SESSION['codpessoa'] ?>'/><!--de quem-->
                                    <input type="hidden" name="codpessoa2" id="codpessoa2" value=''/><!--para quem-->
                                    <input type="hidden" name="passo" id="passo" value='1'/><!--para quem-->
                                    <input type="hidden" name="statusConexao" id="statusConexao" value='online'/><!--para quem-->
                                    <input type="hidden" name="name" id="name" value='<?= $_SESSION["nome"] ?>'/>
                                    <img src="/sistema/visao/recursos/img/carregando.gif" alt="Imagem carregando" title="Conectando ao envio de msg, por favor espere" id="img_carregando"/>
                                    <input type='text' name="message" id="message" disabled placeholder="Digite uma mensagem" style="width: 100%;border: 0px;padding: 10px; display: none" value="<?= $_POST["message"] ?>"/>
                                    <div id="offline" style="display: none; cursor: pointer" title="Clique para deixar conectar">Offline</div>
                                </form>
                                <div class="ptt-container" data-reactid=".0.$main.5.2.1.$ptt">
                                    <span data-reactid=".0.$main.5.2.1.$ptt.0">
                                        <button class="icon btn-icon icon-ptt" data-reactid=".0.$main.5.2.1.$ptt.0.$=1$button">
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
            <span dir="auto" style="opacity: 0; position: absolute;">
            </span>
        </body>
        <script type="text/javascript" src="/sistema/visao/recursos/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="/sistema/visao/recursos/js/sweet-alert.min.js"></script>
        <script type="text/javascript" src="/sistema/visao/recursos/js/fancywebsocket.js"></script>
        <script type="text/javascript" src="../sistema/visao/recursos/js/chat.js"></script>
    </html>
    <?php
    $_GET["trocaPessoa"] = (int) $_GET["trocaPessoa"];
    if (isset($_GET["trocaPessoa"]) && $_GET["trocaPessoa"] != NULL && $_GET["trocaPessoa"] != "") {
        echo '<script>trocaPessoaFalando(', $_GET["trocaPessoa"], ')</script>';
    }
    $html = ob_get_clean();
    echo preg_replace('/\s+/', ' ', str_replace("> <", "><", $html));

    function diferencaHora($horainicio, $horafim) {
        $horaInicio = explode(':', $horainicio);
        $horaFim = explode(':', $horafim);

        $difHoras = $horaFim[0] - $horaInicio[0];
        $difMin = $horaFim[1] - $horaInicio[1];
        $difFInal = $difMin + ($difHoras * 60);
        return $difFInal;
    }
    