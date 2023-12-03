<?php
include "cabecalho.php";

$categoria = $_GET['cat'];
$cod_prestador = $_GET['cod'];

$query = $conexao->prepare("select nome,prestadores_servico.cod_prestador,nome_profissional,cep,celular,
cidade,bairro,email,foto_perfil
from prestadores_servico where
 prestadores_servico.cod_prestador = ?");

$query->bindParam(1, $cod_prestador, PDO::PARAM_STR); // especifica a categoria que deve ser listada;
$query->execute();
$resultado = $query->fetch(PDO::FETCH_ASSOC);
$foto_perfil = $resultado['foto_perfil'];

echo "<div class='container-perfil-prestador'>
<div class='itens-perfil-prestador'>
</div>
<div class='itens-perfil-prestador'>
<img class='imagem-redonda' src='imagens/fotos_perfil_prestador/$foto_perfil'>
</div>
<div class='itens-perfil-prestador'>
</div>
</div>";
?>

