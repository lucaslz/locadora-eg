/**
 * Funcao para controle de genero
 */
function controleGenero() {
    $('#idSelectGenero').on('change', function() {
        var tipo = $(this).val();

        if (tipo == 1) {
            $('#divDeletar').css('display', 'none');
            $('#divCadastrar').css('display', 'block');
        } else if (tipo == 2) {
            $('#divCadastrar').css('display', 'none');
            $('#divDeletar').css('display', 'block');
        } else {
            $('#divDeletar').css('display', 'none');
            $('#divCadastrar').css('display', 'none');
        }
    });
}

/**
 * Funcao para controle de preco
 */
function controlePreco() {
    $('#idSelectPreco').on('change', function() {
        var tipo = parseInt($(this).val());

        switch (tipo) {
            case 1:
                $('#divAlterarDesconto').css('display', 'none');
                $('#divAlterarPreco').css('display', 'block');
                break;
            case 2:
                $('#divAlterarDesconto').css('display', 'block');
                $('#divAlterarPreco').css('display', 'none');
                break;
            default:
                $('#divAlterarDesconto').css('display', 'none');
                $('#divAlterarPreco').css('display', 'none');
                break;
        }
    });
}


/**
 * Configuracao do datatables
 */
function dataTablesConfig() {
    $(document).ready(function() {
        $('#locausers').DataTable({
            "language": {
                "Processing": "A processar...",
                "lengthMenu": "Mostrar _MENU_ registos",
                "zeroRecords": "Não foram encontrados resultados",
                "info": "Mostrando de _START_ até _END_ de _TOTAL_ registos",
                "infoEmpty": "Mostrando de 0 até 0 de 0 registos",
                "infoFiltered": "(filtrado de _MAX_ registos no total)",
                "InfoPostFix": "",
                "sSearch": "Procurar:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext": "Seguinte",
                    "sLast": "Último"
                }
            }
        });
    });
}

/**
 * Configurar mascaras de input
 */
function configInputMask() {
    $(function() {
        $('.cpf').mask('000.000.000-00', {
            reverse: true
        });
        $('.telefone').mask('(00) 0 0000-0000');
        $('.cep').mask('00000-000');
        $('.precoControle').mask('0.00');
        $('.descontoControle').mask('00');
        $('#inputValor').mask('00.00');
        $('#inputPreco').mask('00.00');
        $('#inputDesconto').mask('00');
    });
}

/**
 * Funcao para enviar o formulario de preco
 */
function enviaFormularioPreco() {
    var form = $("#controlePreco");
    form.submit();
}

/**
 * Funcao principal para inicializar os scripts
 */
$(document).ready(function(){
    controleGenero();
    controlePreco();
    dataTablesConfig();
    configInputMask();
});

