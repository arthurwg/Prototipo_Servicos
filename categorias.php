<?php

header('content-type: application/json');
require_once "includes/logica/conecta.php";

$categoria =  $_GET['categoria'];



if(isset($_GET['nome'])) {

    $query = $conexao->prepare("select nome,prestadores_servico.cod_prestador,nome_profissional,cep,celular,
cidade,bairro,email,foto_perfil
from prestadores_servico where
 prestadores_servico.cod_prestador in
(select realiza_tipo.cod_prestador from realiza_tipo where realiza_tipo.cod_tipo = ?)
order by nome_profissional asc");

$query->bindParam(1, $categoria, PDO::PARAM_STR); // especifica a categoria que deve ser listada;
if($query->execute()){;
$resultado = $query->fetchALL(PDO::FETCH_ASSOC);

$jsonResultado = json_encode($resultado);

echo $jsonResultado;
} else {
    echo json_encode(['erro' => 'Erro na execução da consulta.']);
}



} else {

    $query = $conexao->prepare("select nome,prestadores_servico.cod_prestador,nome_profissional,cep,celular,
    cidade,bairro,email,foto_perfil
    from prestadores_servico where
    prestadores_servico.cod_prestador in
    (select realiza_tipo.cod_prestador from realiza_tipo where realiza_tipo.cod_tipo = ?)
    order by cidade asc");

    $query->bindParam(1, $categoria, PDO::PARAM_STR); // especifica a categoria que deve ser listada;
    if($query->execute()){;
    $resultado = $query->fetchALL(PDO::FETCH_ASSOC);

    $jsonResultado = json_encode($resultado);

    echo $jsonResultado;
    } else {
        echo json_encode(['erro' => 'Erro na execução da consulta.']);
    }

}
?>