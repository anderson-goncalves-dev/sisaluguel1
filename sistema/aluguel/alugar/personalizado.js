$(document).ready(function () {
    $("input[name='cpf']").blur(function () {
        var $nome = $("input[name='nome']");
        var $id_cliente = $("input[name='id_cliente']");
        var cpf = $(this).val();
        $.getJSON('proc_pesq_user.php', {cpf},
            function(retorno){
                $nome.val(retorno.nome);
                $id_cliente.val(retorno.id_cliente);
            }
        );        
    });
    
});


