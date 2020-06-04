<?php
    session_start();
    
    // Autoload de arquivos
    require_once 'inc/autoload.inc.php';

    // Handler dos erros
    require_once 'inc/errorHandler.inc.php';
    
    // Configuração do Banco
    require_once 'inc/config.inc.php';
    
    // Mensagens pré-definidas
    require_once 'inc/mensagens.inc.php';

    // Execução
    require_once 'inc/exec.inc.php';

?>
