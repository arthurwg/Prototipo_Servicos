valor = 0;
function confirmacao(event) {
    var aux = 1;

    if ($("#email").val() === "") {
        aux = 0;
        $("#emailObrigatorio").text("Campo obrigatório.")
    } else {
        $("#emailObrigatorio").text("")
    }

    if ($("#nome").val() === "") {
        aux = 0;
        $("#nomeObrigatorio").text("Campo obrigatório.")
    } else {
        $("#nomeObrigatorio").text("")
    }

    if ($("#senha").val() === "") {
        aux = 0;
        $("#senhaObrigatorio").text("Campo obrigatório.")
    } else {
        $("#senhaObrigatorio").text("")
    }

    if ($("#confirmaSenha").val() === "") {
        aux = 0;
        $("#confirmaObrigatorio").text("Campo obrigatório.")
    } else {
        $("#senhaObrigatorio").text("")
    }





    if ($("#cpf").val() === "") {
        aux = 0;
        $("#cpfObrigatorio").text("Campo obrigatório.");
    } else {
        $("#cpfObrigatorio").text("")

        if ($("#cpf").val().length !== 11) {
            aux = 0
            $("#cpfObrigatorio").text("Cpf deve ter 11 dígitos.");
        } else {
            $("#cpfObrigatorio").text("");
        }

    }

    /*if($("#cnpj").length > 0) {
        if($("#cnpj").val() == ""){
            aux = o;
            $("#cnpjObrigatorio").text("Campo Obrigatório");
        } else {
            $("#cnpjObrigatorio").text("");
        }
    
        if($("#cnpj").val().length < 14){
           $("#cnpjObrigatorio").text("Formato incorreto");
        
        } else{
            $("#cnpjObrigatorio").text("");
        }  
    
    }
    */


    if ($("#nomeProfissional").length > 0) {
        if ($("#nomeProfissional").val() == "") {
            aux = 0;
            $("#nomeProObrigatorio").text("Campo Obrigatório.")
        } else {
            $("#nomeProObrigatorio").text("")
        }
    }




    if ($("#cep").val() === "") {
        aux = 0;
        $("#cepObrigatorio").text("Campo obrigatório.")
    } else {
        $("#cepObrigatorio").text("")
    }

    if ($("#celular").val() === "") {
        aux = 0;
        $("#celularObrigatorio").text("Campo obrigatório.")
    } else {
        $("#celularObrigatorio").text("")
    }

    if ($("#senha").val() != $("#confirmaSenha").val()) {

        $("#senhaObrigatorio").text("Campo deve ser igual a confirmação.")
        $("#confirmaObrigatorio").text("Campo deve ser igual a senha.")
        aux = 0;
    } else {
        $("#confirmaObrigatorio").text("")
    }





    if (aux == 1) {
        alert("Um link de confirmação foi enviado para o seu Email.");
        $("#cadastrar").click();

    } else {
        event.preventDefault();
    }




}

function tipoCadastro(tipo) {
    if (tipo == 1) {

        var formulario = `<a href='logar.php'>Voltar</a>
        <form action='includes/logica/logica_pessoa.php' id='cadastro' method='post'>
            <label for='email'>Email:</label>
            <input type='text' id='email' name='email'>
            <p id='emailObrigatorio' style='color: red;'></p>
            <label for='nome'>Nome:</label>
            <input type='text' id='nome' name='nome'>
            <p id='nomeObrigatorio' style='color: red;'></p>
            <label for='senha'>Senha:</label>
            <input type='password' id='senha' name='senha'>
            <p id='senhaObrigatorio' style='color: red;'></p>
            <label for='confirmaSenha'>Confirmação de senha:</label>
            <input type='password' id='confirmaSenha' name='confirmaSenha'>
            <p id='confirmaObrigatorio' style='color: red;'></p>
            <label for='cpf'>CPF:</label>
            <input type='text' id='cpf' name='cpf' maxlength='11'>
            <p id='cpfObrigatorio' style='color: red;'></p>
            <label for='cep'>CEP:</label>
            <input type='text' id='cep' name='cep' maxlength='8'>
            <p id='cepObrigatorio' style='color: red;'></p>
            <label for='celular'>Celular:</label>
            <input type='text' id='celular' name='celular' maxlength='11'>
            <p id='celularObrigatorio' style='color: red;'></p>
            <label for='estado'>Estado:</label>
            <input type='text' id='estado' name='estado' readonly>
            <p id='estadoObrigatorio' style='color: red;'></p>
            <label for='cidade'>Cidade:</label>
            <input type='text' id='cidade' name='cidade' readonly>
            <p id='cidadeObrigatorio' style='color: red;'></p>
            <label for='bairro'>Bairro:</label>
            <input type='text' id='bairro' name='bairro' readonly>
            <p id='bairroObrigatorio' style='color: red;'></p>
            <input type='text' name='tipoCadastro' id='tipoCadastro' value='usuario' style='display:none;'> 
            <input type='submit' name='cadastrar' id='cadastrar' value='enviar' style='display:none;'> 
            <input type='button' name='cadastrar2' id='cadastrar2' value='enviar' onclick='confirmacao(event)'>
        </form> `

        $("#formularioCadastro").html(formulario)
        viacep()
    } else {

        var formulario = `<a href='logar.php'>Voltar</a>
        <form action='includes/logica/logica_pessoa.php' id='cadastro' method='post' enctype='multipart/form-data'>
            <label for='email'>Email:</label>
            <input type='text' id='email' name='email'>
            <p id='emailObrigatorio' style='color: red;'></p>
            <label for='nome'>Nome:</label>
            <input type='text' id='nome' name='nome'>
            <p id='nomeObrigatorio' style='color: red;'></p>
            <label for='nomeProfissional'>Nome Profissional:</label>
            <input type='text' id='nomeProfissional' name='nomeProfissional'>
            <p id='nomeProObrigatorio' style='color: red;'></p>
            <label for='senha'>Senha:</label>
            <input type='password' id='senha' name='senha'>
            <p id='senhaObrigatorio' style='color: red;'></p>
            <label for='confirmaSenha'>Confirmação de senha:</label>
            <input type='password' id='confirmaSenha' name='confirmaSenha'>
            <p id='confirmaObrigatorio' style='color: red;'></p>
            <label for='cpf'>CPF:</label>
            <input type='text' id='cpf' name='cpf' maxlength='11'>
            <p id='cpfObrigatorio' style='color: red;'></p>
            <label for='cnpj'>CNPJ(se possuir):</label>
            <input type='text' id='cnpj' name='cnpj'>
            <p id='cnpjObrigatorio' style='color: red;'></p>
            <label for='cep'>CEP:</label>
            <input type='text' id='cep' name='cep' maxlength='8'>
            <p id='cepObrigatorio' style='color: red;'></p>
            <label for='celular'>Celular:</label>
            <input type='text' id='celular' name='celular' maxlength='11'>
            <p id='celularObrigatorio' style='color: red;'></p>
            <label for='estado'>Estado:</label>
            <input type='text' id='estado' name='estado' readonly>
            <p id='estadoObrigatorio' style='color: red;'></p>
            <label for='cidade'>Cidade:</label>
            <input type='text' id='cidade' name='cidade' readonly>
            <p id='cidadeObrigatorio' style='color: red;'></p>
            <label for='bairro'>Bairro:</label>
            <input type='text' id='bairro' name='bairro' readonly>
            <p id='bairroObrigatorio' style='color: red;'></p>
            <label for='imagemPerfil'>Imagem de Perfil(Opcional)</label>
            <input type='file' name='imagemPerfil' id='imagemPerfil'>
            <input type='text' name='tipoCadastro' id='tipoCadastro' value='prestador' style='display:none;'> 
            <input type='submit' name='cadastrar' value='enviar' id='cadastrar' style='display:none;'> 
            <input type='button' name='cadastrar2' id='cadastrar2' value='enviar' onclick='confirmacao(event)'>
        </form> `

        $("#formularioCadastro").html(formulario)
        viacep()

    }

}


function escolheTipo(escolha) {
    if (escolha == 'usuario') {

        $("#inputEscolha").html("<input type='text' id='escolha' name='escolha' value='usuario' style='display:none;'>")
        $("#escolhaUsuario").css("color", "green");
        $("#escolhaPrestador").css("color", "");
    } else if (escolha == 'prestador') {
        $("#inputEscolha").html("<input type='text' id='escolha' name='escolha' value='prestador' style='display:none;'>")
        $("#escolhaPrestador").css("color", "green");
        $("#escolhaUsuario").css("color", "");
    }
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.categoria').forEach(function (elemento) {
        elemento.addEventListener('click', function (evento) {
            evento.preventDefault();

            var idCategoria = this.getAttribute('data-id');
            solicitacaoFetch(idCategoria);


        })
    })


})
    function bloqueiaLink() {

        $("#voltar").click(function (event) {

            event.preventDefault();     
            solicitacaoFetch2();


        })

        $(".barra").click(function(event) {
            event.preventDefault();
             valor = this.getAttribute('data-valor');
             var categoriaID = this.getAttribute('data-categoria');
            solicitacaoFetch(categoriaID);
        })

    }

   

   




    function solicitacaoFetch(idCategoria) {
        if (valor == 'nome'){

            fetch('categorias.php?categoria=' + idCategoria +'&nome=' + valor, {
                method: 'GET'
            
            })
                .then(function (response) {
                    console.log('Resposta do servidor:', response);
                    return response.json();
                })
                .then(function (data) {
                    console.log('Dados recebidos:', data);
    
    
                    // Manipula os dados recebidos, por exemplo, exibindo na div com ID "resultado"
                    var listagemPrestadores = '';
                    var barraAtributos = '<div class="grid-listagem-barra" id="listagem-barra"><a href="#" id="voltar">Voltar</a><a class="barra" data-categoria="'+ idCategoria +'" data-valor="nome" href="#">Nome</a><a>Cidade</a><a>Bairro</a><a>Email</a><a>Celular</a><a>Detalhes</a></div> ';
                    data.forEach(function (linha) {
                        let cod_prestador = linha.cod_prestador;
                        listagemPrestadores += '<div class="grid-listagem-prestador"><div class="grid-prestador-items"><a href="perfil_prestador.php?cat='+idCategoria+'&cod='+cod_prestador+'"><img class="imagem-prestador" src="imagens/fotos_perfil_prestador/' + linha.foto_perfil + ' "></a></div><div class="grid-prestador-items"><h4>' + linha.nome_profissional + '</h4></div><div class="grid-prestador-items"><h4>' + linha.cidade + '</h4></div><div class="grid-prestador-items"><h4>' + linha.bairro + '</h4></div><div class="grid-prestador-items"><h4>' + linha.email + '</h4></div><div class="grid-prestador-items"><h4>' + linha.celular + '</h4></div></div>'
    
                    })
    
                    document.getElementById('listagens-index').innerHTML = barraAtributos + listagemPrestadores;
                    fixaBarra();
                    bloqueiaLink();
                    valor = 0;
                    
    
                })
    
                .catch(function (error) {
                    console.error('Erro na solicitação Fetch:', error);
                })
        } else {
        fetch('categorias.php?categoria=' + idCategoria, {
            method: 'GET'
        
        })
            .then(function (response) {
                console.log('Resposta do servidor:', response);
                return response.json();
            })
            .then(function (data) {
                console.log('Dados recebidos:', data);


                // Manipula os dados recebidos, por exemplo, exibindo na div com ID "resultado"
                var listagemPrestadores = '';
                var barraAtributos = '<div class="grid-listagem-barra" id="listagem-barra"><a  href="#" id="voltar">Voltar</a><a class="barra" data-valor="nome" data-categoria='+ idCategoria +' href="#">Nome</a><a>Cidade</a><a>Bairro</a><a>Email</a><a>Celular</a><a>Detalhes</a></div> ';
                data.forEach(function (linha) {
                    let cod_prestador = linha.cod_prestador;
                    listagemPrestadores += '<div class="grid-listagem-prestador"><div class="grid-prestador-items"><a href="perfil_prestador.php?cat='+idCategoria+'&cod='+cod_prestador+'"><img class="imagem-prestador" src="imagens/fotos_perfil_prestador/' + linha.foto_perfil + ' "></div> </a><div class="grid-prestador-items"><h4>' + linha.nome_profissional + '</h4></div><div class="grid-prestador-items"><h4>' + linha.cidade + '</h4></div><div class="grid-prestador-items"><h4>' + linha.bairro + '</h4></div><div class="grid-prestador-items"><h4>' + linha.email + '</h4></div><div class="grid-prestador-items"><h4>' + linha.celular + '</h4></div></div>'

                })

                document.getElementById('listagens-index').innerHTML = barraAtributos + listagemPrestadores;
                fixaBarra();
                bloqueiaLink();

            })

            .catch(function (error) {
                console.error('Erro na solicitação Fetch:', error);
            })
    }

    }
 


    function solicitacaoFetch2() {

        fetch('categoriasindex.php', {
            method: 'GET'
        })
            .then(function (response) {
                console.log('Resposta do servidor:', response);
                return response.json();
            })
            .then(function (data) {
                console.log('Dados recebidos:', data);

                // Manipula os dados recebidos, por exemplo, exibindo na div com ID "resultado"
                var listagemCategorias = '';
                data.forEach(function (linha) {

                    
                    
                    var nomeCategoria = linha.descricao;
                    var imagem_fundo = linha.foto;
                    var cod_servico = linha.cod;
                    listagemCategorias += "<a href='categorias.php?categoria=" + nomeCategoria + "' class='grid-categoria-items categoria' data-id='" + cod_servico + "'  style='background-image: url(imagens/categorias/" + imagem_fundo + ");'><h2><span class='categoria' data-id='" + cod_servico + "'>" + nomeCategoria + "</span></h2></a>";


                })

                document.getElementById('listagens-index').innerHTML = "<div class='grid-categorias'>" + listagemCategorias + "</div>";
               bloqueiaLink2();

            })

            .catch(function (error) {
                console.error('Erro na solicitação Fetch:', error);
            })
    }




function bloqueiaLink2(){
    document.querySelectorAll('.categoria').forEach(function (elemento) {
        elemento.addEventListener('click', function (evento) {
            evento.preventDefault();
            
            var idCategoria = this.getAttribute('data-id');
            solicitacaoFetch(idCategoria);
});
})

}

function bloqueiaLinkBarra(){
    document.querySelectorAll('.barra').forEach(function (elemento) {
        elemento.addEventListener('click', function (evento) {
            evento.preventDefault();
            
            var idCategoria = this.getAttribute('data-id');
            solicitacaoFetch(idCategoria);
});
})

}





