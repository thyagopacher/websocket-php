<?php
    $comando = "/home/admin/web/gestccon.com.br/public_html/chat3/arquivo.sh 2>&1";
    echo "Testando matar processo:<br>";
    
    $ls = shell_exec($comando);

    echo "$ls";
   