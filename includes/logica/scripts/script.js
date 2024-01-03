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
        <div class='row'>
         <div class='col-md-6'>  
            <label class='form-label' for='email'>Email:</label>
            <input class='form-control' type='text' id='email' name='email'>
            <p id='emailObrigatorio' style='color: red;'></p>
         </div>
         <div class='col-md-6'>  
            <label class='form-label' for='nome'>Nome:</label>
            <input class='form-control' type='text' id='nome' name='nome'>
            <p id='nomeObrigatorio' style='color: red;'></p>
        </div>
        </div>
        
        <div class='row'>
            <div class='col-md-6'>  
            <label class='form-label' for='senha'>Senha:</label>
            <input class='form-control' type='password' id='senha' name='senha'>
            <p id='senhaObrigatorio' style='color: red;'></p>
        </div> 
        <div class='col-md-6'>     
            <label class='form-label' for='confirmaSenha'>Confirmação de senha:</label>
            <input class='form-control' type='password' id='confirmaSenha' name='confirmaSenha'>
            <p id='confirmaObrigatorio' style='color: red;'></p>
        </div>  
        </div> 
        <div class='row'> 
         <div class='col-md-6'>    
            <label class='form-label' for='cpf'>CPF:</label>
            <input class='form-control' type='text' id='cpf' name='cpf' maxlength='11'>
            <p id='cpfObrigatorio' style='color: red;'></p>
        </div> 
        <div class='col-md-6'>      
            <label class='form-label' for='cep'>CEP:</label>
            <input class='form-control' type='text' id='cep' name='cep' maxlength='8'>
            <p id='cepObrigatorio' style='color: red;'></p>
        </div>    
        </div>   
        <div class='row'> 
        <div class='col-md-6'>  
            <label class='form-label' for='celular'>Celular:</label>
            <input class='form-control' type='text' id='celular' name='celular' maxlength='11'>
            <p id='celularObrigatorio' style='color: red;'></p>
        </div>  
        <div class='col-md-6'>  
            <label class='form-label' for='uf'>Estado:</label>
            <input class='form-control' type='text' id='uf' name='estado' readonly>
            <p id='estadoObrigatorio' style='color: red;'></p>
        </div>
        </div>
        <div class='row'>  
        <div class='col-md-6'>          
            <label class='form-label' for='cidade'>Cidade:</label>
            <input class='form-control' type='text' id='cidade' name='cidade' readonly>
            <p id='cidadeObrigatorio' style='color: red;'></p>
        </div>
        <div class='col-md-6'> 
            <label class='form-label' for='bairro'>Bairro:</label>
            <input class='form-control' type='text' id='bairro' name='bairro' readonly>
            <p id='bairroObrigatorio' style='color: red;'></p>
            </div>
            <div class='row'>
            <div class='col-md-6'>   
            <input type='text' name='tipoCadastro' id='tipoCadastro' value='usuario' style='display:none;'> 
            <input type='submit' name='cadastrar' id='cadastrar' value='enviar' style='display:none;'> 
            <input type='button' class='btn btn-secondary' name='cadastrar2' id='cadastrar2' value='Enviar' onclick='confirmacao(event)'>
            </div>
            </div>
        </form> `

        $("#formularioCadastro").html(formulario)
        viacep()
    } else {

        var formulario = `<a href='logar.php'>Voltar</a>
        <form action='includes/logica/logica_pessoa.php' id='cadastro' method='post' enctype='multipart/form-data'>
           <div class='row'>
                <div class='col-md-4'> 
                    <label class='form-label' for='email'>Email:</label>
                    <input class="form-control" type='text' id='email' name='email'>
                     <p id='emailObrigatorio' style='color: red;'></p>
                </div> 
                <div class='col-md-4'> 
                    <label class='form-label' for='nome'>Nome:</label>
                    <input class='form-control' type='text' id='nome' name='nome'>
                    <p id='nomeObrigatorio' style='color: red;'></p>
                </div>
               <div class='col-md-4'> 
                <label class='form-label' for='nomeProfissional'>Nome Profissional:</label>
                <input class='form-control' type='text' id='nomeProfissional' name='nomeProfissional'>
                <p id='nomeProObrigatorio' style='color: red;'></p>
              </div>
              </div>
            <div class='row'>
              <div class='col-md-4'> 
                <label class='form-label' for="opcoes">Escolha uma opção:</label>
                <select class='form-select' id="opcoes" name="opcao_servico">
                <option value="Pedreiro">Pedreiro</option>
                <option value="Eletrecista">Eletrecista</option>
                <option value="Jardineiro">Jardineiro</option>
                <option value="Mecanico">Mecânico</option>
                <option value="Encanador">Encanador</option>
                <option value="Borracheiro">Borracheiro</option>
                <option value="Pintor">Pintor</option>
                <option value="Limpeza Residencial">Limpeza Residencial</option>
                <option value="Técnico de Informática">Técnico de Informática</option>
                <option value="Ar Condicionado e Aquecimento">Ar Condicionado e Aquecimento</option>
                <option value="Fotógrafo/Videomaker">Fotóggrafo/Videomaker</option>
                <option value="Babá">Babá</option>
                <option value="Montador de Móveis">Montador de Móveis</option>
                </select><br>
                </div>
                <div class='col-md-4'> 
                    <label class='form-label' for='senha'>Senha:</label>
                    <input class='form-control' type='password' id='senha' name='senha'>
                    <p id='senhaObrigatorio' style='color: red;'></p>
                </div> 
                <div class='col-md-4'> 
                    <label class='form-label' for='confirmaSenha'>Confirmação de senha:</label>
                    <input class='form-control' type='password' id='confirmaSenha' name='confirmaSenha'>
                    <p id='confirmaObrigatorio' style='color: red;'></p>
                </div> 
            </div>
            <div class='row'> 
                <div class='col-md-4'> 
                    <label class='form-label' for='cpf'>CPF:</label>
                    <input class='form-control' type='text' id='cpf' name='cpf' maxlength='11'>
                    <p id='cpfObrigatorio' style='color: red;'></p>
                </div>     
                <div class='col-md-4'>     
                    <label class='form-label' for='cnpj'>CNPJ(se possuir):</label>
                    <input class='form-control' type='text' id='cnpj' name='cnpj'>
                    <p id='cnpjObrigatorio' style='color: red;'></p>
                </div>    
                <div class='col-md-4'> 
                    <label class='form-label' for='cep'>CEP:</label>
                    <input class='form-control' type='text' id='cep' name='cep' maxlength='8'>
                    <p id='cepObrigatorio' style='color: red;'></p>
                </div>   
            </div> 
            <div class='row'> 
                <div class='col-md-4'> 
                    <label class='form-label' for='celular'>Celular:</label>
                    <input class='form-control' type='text' id='celular' name='celular' maxlength='11'>
                    <p id='celularObrigatorio' style='color: red;'></p>
                </div>    
           
                <div class='col-md-4'> 
                    <label class='form-label' for='uf'>Estado:</label>
                    <input class='form-control' type='text' id='uf' name='estado' readonly>
                    <p id='estadoObrigatorio' style='color: red;'></p>
                </div>  
                <div class='col-md-4'>   
                    <label class='form-label' for='cidade'>Cidade:</label>
                    <input class='form-control' type='text' id='cidade' name='cidade' readonly>
                    <p id='cidadeObrigatorio' style='color: red;'></p>
                </div> 
            </div>
            <div class='row'> 
            <div class='col-md-6'>   
                    <label class='form-label' for='bairro'>Bairro:</label>
                    <input class='form-control' type='text' id='bairro' name='bairro' readonly>
                    <p id='bairroObrigatorio' style='color: red;'></p>
                    </div>
                    <div class='col-md-6'>      
                    <label class='form-label'   for='imagemPerfil'>Imagem de Perfil(Opcional)</label>
                    <input class='form-control' type='file' name='imagemPerfil' id='imagemPerfil'>
                    </div>
            </div>
            <input type='text' name='tipoCadastro' id='tipoCadastro' value='prestador' style='display:none;'> 
            <input type='submit' name='cadastrar' value='enviar' id='cadastrar' style='display:none;'> 
            <input class='btn btn-secondary' type='button' name='cadastrar2' id='cadastrar2' value='Enviar' onclick='confirmacao(event)'>
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
};

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

    };

   

   




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
    
    
                    
                    var listagemPrestadores = '';
                    var barraAtributos = '<div class="grid-listagem-barra" id="listagem-barra"><a href="#" id="voltar">Voltar</a><a class="barra" data-categoria="'+ idCategoria +'" data-valor="nome" href="#">Nome</a><a>Cidade</a><a>Bairro</a><a>Email</a><a>Celular</a><a class="barra" data-categoria="'+ idCategoria +'" data-valor="avaliacao" href="#">Avaliacao</a></div> ';
                    data.forEach(function (linha) {
                        let cod_prestador = linha.cod_prestador;
                        listagemPrestadores += '<div class="grid-listagem-prestador"><div class="grid-prestador-items"><a href="perfil_prestador.php?cat='+idCategoria+'&cod='+cod_prestador+'"><img class="imagem-prestador imagem-redonda" src="imagens/fotos_perfil_prestador/' + linha.foto_perfil + ' "></a></div><div class="grid-prestador-items"><h5>' + linha.nome_profissional + '</h5></div><div class="grid-prestador-items"><h5>' + linha.cidade + '</h5></div><div class="grid-prestador-items"><h5>' + linha.bairro + '</h5></div><div class="grid-prestador-items"><h5>' + linha.email + '</h5></div><div class="grid-prestador-items"><h5>' + linha.celular + '</h5></div><div class="grid-prestador-items"><h5>' + linha.media + '</h5></div></div>'
    
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
                var barraAtributos = '<div class="grid-listagem-barra" id="listagem-barra"><a  href="#" id="voltar">Voltar</a><a class="barra" data-valor="nome" data-categoria='+ idCategoria +' href="#">Nome</a><a>Cidade</a><a>Bairro</a><a>Email</a><a>Celular</a><a  class="barra" data-categoria="'+ idCategoria +'" data-valor="avaliacao" href="#">Avaliação</a></div> ';
                data.forEach(function (linha) {
                    let cod_prestador = linha.cod_prestador;
                    listagemPrestadores += '<div class="grid-listagem-prestador"><div class="grid-prestador-items"><a href="perfil_prestador.php?cat='+idCategoria+'&cod='+cod_prestador+'"><img class="imagem-prestador imagem-redonda" src="imagens/fotos_perfil_prestador/' + linha.foto_perfil + ' "></a></div><div class="grid-prestador-items"><h5>' + linha.nome_profissional + '</h5></div><div class="grid-prestador-items"><h5>' + linha.cidade + '</h5></div><div class="grid-prestador-items"><h5>' + linha.bairro + '</h5></div><div class="grid-prestador-items"><h5>' + linha.email + '</h5></div><div class="grid-prestador-items"><h5>' + linha.celular + '</h5></div><div class="grid-prestador-items"><h5>' + linha.media + '</h5></div></div>'

                })

                document.getElementById('listagens-index').innerHTML = barraAtributos + listagemPrestadores;
                fixaBarra();
                bloqueiaLink();

            })

            .catch(function (error) {
                console.error('Erro na solicitação Fetch:', error);
            })
    }

    };
 


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
    };




function bloqueiaLink2(){
    document.querySelectorAll('.categoria').forEach(function (elemento) {
        elemento.addEventListener('click', function (evento) {
            evento.preventDefault();
            
            var idCategoria = this.getAttribute('data-id');
            solicitacaoFetch(idCategoria);
})
})

};

function bloqueiaLinkBarra(){
    document.querySelectorAll('.barra').forEach(function (elemento) {
        elemento.addEventListener('click', function (evento) {
            evento.preventDefault();
            
            var idCategoria = this.getAttribute('data-id');
            solicitacaoFetch(idCategoria);
})
})

};

function checaLogin(){

    

    fetch('includes/logica/verificaLogin.php?agendar=true', {
        method: 'GET'
    })
        .then(function (response) {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            console.log('Resposta do servidor:', response);
            return response.json();
        })
        .then(function (data) {
            
            console.log('Dados recebidos:', data);

          if(data.status === 'logado'){
                console.log('Deu certo');
                mostraFormulario();
          } else {
            window.location.replace('logar.php');
          }

           

        })

        .catch(function (error) {
            console.error('Erro na solicitação Fetch:', error);
        })

};

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.bloqueado').addEventListener('click', function (evento) {
        evento.preventDefault();
        checaLogin();
    });
});

function mostraFormulario2(){
    document.getElementById('overlayAvaliacao').style.display = 'flex';
    

}

function mostraFormulario(){
    document.getElementById('overlay').style.display = 'flex';
    viacep();

}

function fecharFormulario(event) {
    event.preventDefault();
    document.getElementById('overlay').style.display = 'none';
  }

  function fecharAvaliacao(event) {
    event.preventDefault();
    document.getElementById('overlayAvaliacao').style.display = 'none';
  }



  function enviaAvaliacao(event) {
    event.preventDefault();
    var formulario = new FormData(document.getElementById('avaliacaoForm'));

    fetch('processa_avaliacao.php', {

        method: 'POST',
        body:formulario

    })

    .then(response => response.text())

    .then(data => {
        
        console.log('Dados recebidos:', data);

        

        document.getElementById('overlayAvaliacao').style.display = 'none';
        $("#Aceita").click();
    })
    .catch(error => console.error('Erro:', error));


   
  }


  function enviaFormulario(event) {
    event.preventDefault();
    var formulario = new FormData(document.getElementById('agendamento'));

    fetch('solicitacao.php', {

        method: 'POST',
        body:formulario

    })

    .then(response => response.text())

    .then(data => {
        
        console.log('Dados recebidos:', data);

        if(data === 'sucesso'){
              console.log('Deu certo');
              alert("Solicitação enviada com sucesso.");
        } else {
            console.log('Deu errado');
        }

        document.getElementById('overlay').style.display = 'none';
    })
    .catch(error => console.error('Erro:', error));


   
  }

  

$(document).ready(function() {
    var click = 0;

        $(".menu-burger-click").click(function() {
            if (click === 0) {
            $(".dropDown").css("display", "block");
            $(".alinha-dropdown").css("align-items", "end");
            $(".alinha-dropdown").css("align-self", "flex-start"); 
            click = 1;
            } else {
                $(".dropDown").css("display", "none");
            click = 0;
            }
        });


});
var click2 = 0;
function toggle(){
    if(click2 === 0){
        
    $(".dropDown2").css("display", "block");
    $(".dropDown2").html("<table><tr><td><h5><a>Meu Perfil</a></h5></td></tr><tr><td><h5><a href='listagem_solicitacoes.php'>Minhas Solicitações</h5></a></td></tr><tr><td><h5><a href='includes/logica/logica_pessoa.php?sair=true'>Sair</h5></a></td></tr></table>");
    click2 = 1;
} else {
    $(".dropDown2").css("display", "none");
    click2 = 0;
}
}

$(document).ready(function() {
    var tipo_usuario = $("#usuario_tipo").val();
    $(".solicitacoes").on("click",function lista_solicitacoes() {
        var situacao = $(this).data('status');
        if(situacao == "pendente"){
        console.log("pendente");

        fetch('processa_solicitacao.php?status=pendente', {

            method: 'get',
    
        })
    
        .then(response => response.json())
    
        .then(data => {
            
            console.log('Dados recebidos:', data);
            var listagemSolicitacao = '';
            if(tipo_usuario == "usuario"){
            data.forEach(function (linha) {
                let cod_prestador = linha.cod_prestador;
                listagemSolicitacao += '<tr>' +
                '<td><h5>' + linha.status + '</h5></td>' +
                '<td><h5>' + linha.cidade + '</h5></td>' +
                '<td><h5>' + linha.rua + '</h5></td>' +
                '<td><h5>' + linha.numero + '/'+ linha.complemento +'</h5></td>' +
                '<td><h5>' + linha.DataRegistro + '</h5></td>' +
                '<td><h5>' + linha.data_agendamento + '</h5></td>' +
                '<td><h5>' + linha.descricao + '</h5></td>' +
                '<td><h5>'+ linha.tipo_servico +'</h5></td>' +
                '<td><a data-alternativa="deleta" data-status="'+ linha.status +'" data-solicitacao="'+linha.id_solicitacao+'" href="#" class="deleta" onclick="respondeSolicitacao(event)" ><img src="imagens/icones/delete.png"></a></td>' +
                '</tr>';
            

            })
            }else{

                data.forEach(function (linha) {
                    let cod_prestador = linha.cod_prestador;
                    listagemSolicitacao += '<tr>' +
                    '<td><h5>' + linha.status + '</h5></td>' +
                    '<td><h5>' + linha.cidade + '</h5></td>' +
                    '<td><h5>' + linha.rua + '</h5></td>' +
                    '<td><h5>' + linha.numero + '/'+ linha.complemento +'</h5></td>' +
                    '<td><h5>' + linha.DataRegistro + '</h5></td>' +
                    '<td><h5>' + linha.data_agendamento + '</h5></td>' +
                    '<td><h5>' + linha.descricao + '</h5></td>' +
                    '<td><h5>'+ linha.tipo_servico +'</h5></td>' +
                    '<td><a data-alternativa="deleta" data-status="'+ linha.status +'" data-solicitacao="'+linha.id_solicitacao+'" href="#" class="deleta" onclick="respondeSolicitacao(event)" ><img src="imagens/icones/delete.png"></a><a data-alternativa="aceita"  data-status="'+ linha.status +'" data-solicitacao="'+linha.id_solicitacao+'" href="#" class="aceita" onclick="respondeSolicitacao(event)" ><img  src="imagens/icones/aceita.png"></a></td>' +
                    '</tr>';
                
    
                })

            }
            $(".listagem-solicitacoes").html(listagemSolicitacao);
        })
        .catch(error => console.error('Erro:', error));
    




        }else if(situacao == "aceita"){
            console.log("aceita");

            fetch('processa_solicitacao.php?status=aceita', {

                method: 'get',
        
            })
        
            .then(response => response.json())
        
            .then(data => {
                
                console.log('Dados recebidos:', data);
                var listagemSolicitacao = '';
                if(tipo_usuario == "usuario"){
                data.forEach(function (linha) {
                    let cod_prestador = linha.cod_prestador;
                    listagemSolicitacao += '<tr>' +
                    '<td><h5>' + linha.status + '</h5></td>' +
                    '<td><h5>' + linha.cidade + '</h5></td>' +
                    '<td><h5>' + linha.rua + '</h5></td>' +
                    '<td><h5>' + linha.numero + '/'+ linha.complemento +'</h5></td>' +
                    '<td><h5>' + linha.DataRegistro + '</h5></td>' +
                    '<td><h5>' + linha.data_agendamento + '</h5></td>' +
                    '<td><h5>' + linha.descricao + '</h5></td>' +
                    '<td><h5>'+ linha.tipo_servico +'</h5></td>' +
                    '<td><a data-alternativa="deleta" data-status="'+ linha.status +'" data-solicitacao="'+linha.id_solicitacao+'" href="#" class="deleta" onclick="respondeSolicitacao(event)" ><img src="imagens/icones/delete.png"></a><a data-alternativa="aceita"  data-status="'+ linha.status +'" data-solicitacao="'+linha.id_solicitacao+'" href="#" class="aceita avaliacao"><img  src="imagens/icones/aceita.png"></a></td>' +
                    '</tr>';
                  
    
                })
            } else {

                data.forEach(function (linha) {
                    let cod_prestador = linha.cod_prestador;
                    listagemSolicitacao += '<tr>' +
                    '<td><h5>' + linha.status + '</h5></td>' +
                    '<td><h5>' + linha.cidade + '</h5></td>' +
                    '<td><h5>' + linha.rua + '</h5></td>' +
                    '<td><h5>' + linha.numero + '/'+ linha.complemento +'</h5></td>' +
                    '<td><h5>' + linha.DataRegistro + '</h5></td>' +
                    '<td><h5>' + linha.data_agendamento + '</h5></td>' +
                    '<td><h5>' + linha.descricao + '</h5></td>' +
                    '<td><h5>'+ linha.tipo_servico +'</h5></td>' +
                    '<td><a data-alternativa="deleta" data-status="'+ linha.status +'" data-solicitacao="'+linha.id_solicitacao+'" href="#" class="deleta" onclick="respondeSolicitacao(event)" ><img src="imagens/icones/delete.png"></a></td>' +
                    '</tr>';
                
    
                })

            }
                $(".listagem-solicitacoes").html(listagemSolicitacao);
                document.querySelectorAll('.avaliacao').forEach(function(element) {
                    element.addEventListener('click', function() {
                        var idSolicitacao = $(this).data('solicitacao');
                        $('#idHidden').val(idSolicitacao);
                        mostraFormulario2();
                    });
                });
            })
            .catch(error => console.error('Erro:', error));
        
    
    
    
    

        }else if (situacao == "recusada"){
            console.log("recusada");

            fetch('processa_solicitacao.php?status=recusada', {

                method: 'get',
        
            })
        
            .then(response => response.json())
        
            .then(data => {
                if(tipo_usuario == "usuario"){

                    var listagemSolicitacao = '';
                data.forEach(function (linha) {
                    let cod_prestador = linha.cod_prestador;
                    listagemSolicitacao += '<tr>' +
                    '<td><h5>' + linha.status + '</h5></td>' +
                    '<td><h5>' + linha.cidade + '</h5></td>' +
                    '<td><h5>' + linha.rua + '</h5></td>' +
                    '<td><h5>' + linha.numero + '/'+ linha.complemento +'</h5></td>' +
                    '<td><h5>' + linha.DataRegistro + '</h5></td>' +
                    '<td><h5>' + linha.data_agendamento + '</h5></td>' +
                    '<td><h5>' + linha.descricao + '</h5></td>' +
                    '<td><h5>'+ linha.tipo_servico +'</h5></td>' +
                    '</tr>';
                    
    
                })

                } else { console.log('Dados recebidos:', data);
                var listagemSolicitacao = '';
                data.forEach(function (linha) {
                    let cod_prestador = linha.cod_prestador;
                    listagemSolicitacao += '<tr>' +
                    '<td><h5>' + linha.status + '</h5></td>' +
                    '<td><h5>' + linha.cidade + '</h5></td>' +
                    '<td><h5>' + linha.rua + '</h5></td>' +
                    '<td><h5>' + linha.numero + '/'+ linha.complemento +'</h5></td>' +
                    '<td><h5>' + linha.DataRegistro + '</h5></td>' +
                    '<td><h5>' + linha.data_agendamento + '</h5></td>' +
                    '<td><h5>' + linha.descricao + '</h5></td>' +
                    '<td><h5>'+ linha.tipo_servico +'</h5></td>' +
                    '</tr>';
                    
    
                })
            }
                $(".listagem-solicitacoes").html(listagemSolicitacao);
            })
            .catch(error => console.error('Erro:', error));
        
        
    
    

            }
   
    })

});


function respondeSolicitacao(event){
    var solicitacao = $(event.currentTarget).data('solicitacao');
    var alternativa =  $(event.currentTarget).data('alternativa');
    var situacao =  $(event.currentTarget).data('status');
    fetch('respostaSolicitacao.php?solicitacao='+solicitacao+'&alternativa='+alternativa, {

        method: 'GET',
        

    })

    .then(response => response.text())

    .then(data => {
        
        console.log('Dados recebidos:', data);

        if(data === 'aceita'){
              console.log('Deu certo');
              alert("Solicitação aceita.");
              if(situacao == 'Aceita'){
                $("#Aceita").click();
              }else if(situacao == 'Deletada'){
                $("#Deletada").click();
              }else{
                $("#Pendente").click();
              }
        } else if (data === 'deletada'){
            console.log('Solicitacao Deletada');
            alert("Solicitação deletada.");
            if(situacao == 'Aceita'){
                $("#Aceita").click();
              }else if(situacao == 'Deletada'){
                $("#Deletada").click();
              }else{
                $("#Pendente").click();
              }
            
        }

        
    })
    .catch(error => console.error('Erro:', error));



}

$(document).ready(function(){
    $(".pesquisar").on("click", function(event) {
        pesquisar(event);
    })
});
function pesquisar(event){
    event.preventDefault();
    var pesquisa = $("#pesquisar").val();
    var categoria = $("#categoriasIndex").val();
        fetch('pesquisa.php?categoria='+categoria+'&pesquisa='+pesquisa, {
            method: 'GET'
        
        })
            .then(function (response) {
                console.log('Resposta do servidor:', response);
                return response.json();
            })
            .then(function (data) {
                console.log('Dados recebidos:', data);


                
                var listagemPrestadores = '';
                var barraAtributos = '<div class="grid-listagem-barra" id="listagem-barra"><a href="#" id="voltar">Voltar</a><a class="barra" data-categoria="'+ categoria +'" data-valor="nome" href="#">Nome</a><a>Cidade</a><a>Bairro</a><a>Email</a><a>Celular</a><a class="barra" data-categoria="'+ categoria +'" data-valor="avaliacao" href="#">Avaliacao</a></div> ';
                data.forEach(function (linha) {
                    let cod_prestador = linha.cod_prestador;
                    listagemPrestadores += '<div class="grid-listagem-prestador"><div class="grid-prestador-items"><a href="perfil_prestador.php?cat='+categoria+'&cod='+cod_prestador+'"><img class="imagem-prestador imagem-redonda" src="imagens/fotos_perfil_prestador/' + linha.foto_perfil + ' "></a></div><div class="grid-prestador-items"><h5>' + linha.nome_profissional + '</h5></div><div class="grid-prestador-items"><h5>' + linha.cidade + '</h5></div><div class="grid-prestador-items"><h5>' + linha.bairro + '</h5></div><div class="grid-prestador-items"><h5>' + linha.email + '</h5></div><div class="grid-prestador-items"><h5>' + linha.celular + '</h5></div><div class="grid-prestador-items"><h5>' + linha.media + '</h5></div></div>'

                })

                document.getElementById('listagens-index').innerHTML = barraAtributos + listagemPrestadores;
                fixaBarra();
                bloqueiaLink();
                valor = 0;
                

            })

            .catch(function (error) {
                console.error('Erro na solicitação Fetch:', error);
            })

}
