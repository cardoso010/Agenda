
$("#cpf").mask("999.999.999-99");
$("#telefone").mask("(99) 9999-9999");
$("#cep").mask("99999-999");
$("#identidade").mask('99.999.999-9'); 


$('#cep').on('blur', () =>{
    let cep = $('#cep').val().split('-').join('');
    $.get(`https://viacep.com.br/ws/${cep}/json/`, (dados)=>{
        $('#bairro').val(dados.bairro);
        $('#endereco').val(dados.logradouro);
        $('#cidade').val(dados.localidade);
        $('#uf').val(dados.uf);
    });
});


$('#cpf').on('blur', () =>{
    let valido = validarCPF($('#cpf').val());
    if(valido){
        $.notify({
            message: "CPF valido !"
        },{
            type: 'success',
            timer: 4000
        });
    }else{
        $.notify({
            message: "CPF invalido !"
        },{
            type: 'danger',
            timer: 4000
        });
    }
});



validarCPF = (cpf) =>{
    cpf = cpf.replace(/\D/g, '');
    if(cpf.toString().length != 11 || /^(\d)\1{10}$/.test(cpf)) return false;
    var result = true;
    [9,10].forEach(function(j){
        var soma = 0, r;
        cpf.split(/(?=)/).splice(0,j).forEach(function(e, i){
            soma += parseInt(e) * ((j+2)-(i+1));
        });
        r = soma % 11;
        r = (r <2)?0:11-r;
        if(r != cpf.substring(j, j+1)) result = false;
    });
    return result;
}