function confirmacao(event){
var  aux = 1;

if($("#email").val() === ""){
aux = 0;
$("#emailObrigatorio").text("Campo obrigatório.")
} else{
    $("#emailObrigatorio").text("")
}

if($("#nome").val() === ""){
    aux = 0;
    $("#nomeObrigatorio").text("Campo obrigatório.")
    } else{
        $("#nomeObrigatorio").text("")
    }

if($("#senha").val() === ""){
    aux = 0;
    $("#senhaObrigatorio").text("Campo obrigatório.")
    } else{
        $("#senhaObrigatorio").text("")
    }

    if($("#confirmaSenha").val() === ""){
        aux = 0;
        $("#confirmaObrigatorio").text("Campo obrigatório.")
        } else{
            $("#senhaObrigatorio").text("")
        }

if($("#cpf").val() === ""){
    aux = 0;
    $("#cpfObrigatorio").text("Campo obrigatório.")
    } else{
        $("#cpfObrigatorio").text("")
    }  

if($("#cep").val() === ""){
    aux = 0;
    $("#cepObrigatorio").text("Campo obrigatório.")
        } else{
            $("#cepObrigatorio").text("")
        }

if($("#celular").val() === ""){
    aux = 0;
    $("#celularObrigatorio").text("Campo obrigatório.")
    } else{
        $("#celularObrigatorio").text("")
    }

    if($("#senha").val() != $("#confirmaSenha").val()){

        $("#senhaObrigatorio").text("Campo deve ser igual a confirmação.")
        $("#confirmaObrigatorio").text("Campo deve ser igual a senha.")
        aux = 0;
    }


 
if(aux == 1){
    alert("Um link de confirmação foi enviado para o seu Email.");
    
} else{
    event.preventDefault();
}
    
   
}