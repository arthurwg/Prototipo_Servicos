<?php $diretorioDestino = 'C:\xampp\htdocs\Projeto_Integrado';
if (is_writable($diretorioDestino)) {
    echo "O diretório é gravável.";
} else {
    echo "O diretório NÃO é gravável.";
}

?>