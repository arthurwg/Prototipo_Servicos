<?php


header('content-type: application/json');
require_once "includes/logica/conecta.php";




$query = $conexao->prepare("select * from tipo_servico");

if($query->execute()) {
    $categorias = $query->fetchAll(PDO::FETCH_ASSOC); //coloca os dados num array $categorias
    if ($categorias) {

        $jsonResultado = json_encode($categorias);

        
    }

    echo $jsonResultado;
} else {
    echo json_encode(['erro' => 'Erro na execução da consulta.']);
}

?>
