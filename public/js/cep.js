
$("#cpf").mask("999.999.999-99");
$("#cpf-at").mask("999.999.999-99");
$("#telefone").mask("(99) 99999-9999");
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


$('.busca-cpf').on('blur', () =>{
    let cpf = $('#cpf').val();
    
    if(cpf.length != 14 && validarCPF(cpf)){
        alert("Digite um cpf valido")
        return false;
    };

    
    if(validarCPF(cpf)){
        let paciente = pacientes.find(paciente => paciente.cpf === cpf);
        if(!paciente){
            document.location = `/paciente/create?cpf=${cpf}`;
        }else{
            let atendimento = atendimentos.filter(atendimento => atendimento.paciente_id === paciente.id);
            if(atendimento){

                $('.modal').remove()
                $('body').append(`
                <div class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Paciente : ${paciente.nome.toUpperCase()}</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                ${atendimento.map((atendimento) =>`
                                <li>
                                    <h4 style="margin:3px 0px;line-height: 18px;">ID atendimento : ${atendimento.id}</h4>
                                    <h4 style="margin:3px 0px;line-height: 18px;">Hospital : ${atendimento.hospital}</h4>
                                    <h4 style="margin:3px 0px;line-height: 18px;">Data atendimento : ${
                                        new Date(atendimento.data_solucao).toLocaleString() 
                                    }</h4>
                                    <a href="/atendimento/${atendimento.id}/edit?paciente=${paciente.id}" class="btn btn-primary btn-sm">Consultar Atendimento</a>
                                    <hr/>
                                </li>
                                `).join('')}
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <a href="/atendimento/create?paciente=${paciente.id}" class="btn btn-secondary">Novo Atendimento</a>
                            </div>
                        </div>
                    </div>
                </div>`)
                $('.modal').modal('toggle')
            }else{
                document.location = `/atendimento/create?paciente=${paciente.id}`;
            }
        }
    }
});




try{
    var url_atual = window.location.href.split("?");
    if(url_atual.length > 0){
        let cpf = url_atual[1].split("cpf=")[1];
        $("#cpf").val(cpf);
    }
}catch(e){};

