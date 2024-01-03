<?php

header('content-type: application/json');
require_once "includes/logica/conecta.php";

$categoria =  $_GET['categoria'];
$listagem = 0;
if(isset($_GET['nome'])){
    $listagem = $_GET['nome'];
}


if($listagem === "nome") {

    $query = $conexao->prepare("select nome,prestadores_servico.cod_prestador, 
    prestadores_servico.nome_profissional,
    prestadores_servico.cep,prestadores_servico.celular, 
    prestadores_servico.cidade,
    prestadores_servico.bairro,prestadores_servico.email,
    prestadores_servico.foto_perfil,
    round(avg(servicos_realizados.nota),1) as 'media' from prestadores_servico
    left join servicos_realizados 
    ON servicos_realizados.cd_prestador = prestadores_servico.cod_prestador
    where prestadores_servico.cod_prestador in (select realiza_tipo.cod_prestador 
    from realiza_tipo where realiza_tipo.cod_tipo = ?) 
    GROUP BY prestadores_servico.cod_prestador order by prestadores_servico.nome_profissional DESC");

$query->bindParam(1, $categoria, PDO::PARAM_STR); // especifica a categoria que deve ser listada;
if($query->execute()){;
$resultado = $query->fetchALL(PDO::FETCH_ASSOC);

foreach ($resultado as &$linha) {
    if ($linha['media'] === null) {
        $linha['media'] = "Não avaliado";
    }
}

$jsonResultado = json_encode($resultado);

echo $jsonResultado;
} else {
    echo json_encode(['erro' => 'Erro na execução da consulta.']);
}



}else if ($listagem === "avaliacao"){

    
    $query = $conexao->prepare("select nome,prestadores_servico.cod_prestador, 
    prestadores_servico.nome_profissional,
    prestadores_servico.cep,prestadores_servico.celular, 
    prestadores_servico.cidade,
    prestadores_servico.bairro,prestadores_servico.email,
    prestadores_servico.foto_perfil,
    round(avg(servicos_realizados.nota),1)  as 'media' from prestadores_servico
    left join servicos_realizados 
    ON servicos_realizados.cd_prestador = prestadores_servico.cod_prestador
    where prestadores_servico.cod_prestador in (select realiza_tipo.cod_prestador 
    from realiza_tipo where realiza_tipo.cod_tipo = ?) 
    GROUP BY prestadores_servico.cod_prestador order by media DESC");

$query->bindParam(1, $categoria, PDO::PARAM_STR); // especifica a categoria que deve ser listada;
if($query->execute()){
$resultado = $query->fetchALL(PDO::FETCH_ASSOC);
foreach ($resultado as &$linha) {
    if ($linha['media'] === null) {
        $linha['media'] = "Não avaliado";
    }
}
$jsonResultado = json_encode($resultado);

echo $jsonResultado;
} else {
    echo json_encode(['erro' => 'Erro na execução da consulta.']);
}

} else {

    $query = $conexao->prepare("select nome,prestadores_servico.cod_prestador, 
    prestadores_servico.nome_profissional,
    prestadores_servico.cep,prestadores_servico.celular, 
    prestadores_servico.cidade,
    prestadores_servico.bairro,prestadores_servico.email,
    prestadores_servico.foto_perfil,
    round(avg(servicos_realizados.nota),1)  as 'media' from prestadores_servico
    left join servicos_realizados 
    ON servicos_realizados.cd_prestador = prestadores_servico.cod_prestador
    where prestadores_servico.cod_prestador in (select realiza_tipo.cod_prestador 
    from realiza_tipo where realiza_tipo.cod_tipo = ?) 
    GROUP BY prestadores_servico.cod_prestador order by servicos_realizados.nota DESC");

    $query->bindParam(1, $categoria, PDO::PARAM_STR); // especifica a categoria que deve ser listada;
    if($query->execute()){;
    $resultado = $query->fetchALL(PDO::FETCH_ASSOC);

    foreach ($resultado as &$linha) {
        if ($linha['media'] === null) {
            $linha['media'] = "Não avaliado";
        }
    }

    $jsonResultado = json_encode($resultado);

    echo $jsonResultado;
    } else {
        echo json_encode(['erro' => 'Erro na execução da consulta.']);
    }

}
?>