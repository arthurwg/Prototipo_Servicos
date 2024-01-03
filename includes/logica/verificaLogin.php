<?php
header('Content-Type: application/json');
session_start();
$json = new stdClass();

if (isset($_GET['agendar'])) {
  

    if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
        $json->status = "logado";
    } else {
        $json->status = "deslogado";
        $_SESSION['msglogin'] = "Faça login para agendar";
    }

    $jsonResultado = json_encode($json);

    echo $jsonResultado;
    
}else{

    
    $json->status = "bugado";
    $jsonResultado = json_encode($json);
    echo $jsonResultado;

}
?>