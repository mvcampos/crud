/* MENSAGEM DE RETORNO */
function msg(tipo, texto) {
    var msg;
    if (tipo == 'success') {
        msg = '<div class="alert alert-success alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                '<h4> <i class="icon fa fa-check"> </i>Sucesso!</h4>'
                + texto +
                '</div>';
    } else {
        msg = '<div class="alert alert-danger alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                '<h4><i class="icon fa fa-ban"></i> Erro!</h4>'
                + texto +
                '</div>';
    }
    $('.msg').html(msg);
}

if ($('#data-table').length === 1) {
    $('#data-table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
}

if ($('#editor').length === 1) {
    CKEDITOR.replace('editro');
}

//Api para busca de endreço por cep
$('#cep').on('change', function () {
    var cep = $(this).val();
    $.get('http://api.postmon.com.br/v1/cep/' + cep, function (data) {
        $('#logradouro').val(data.logradouro);
        $('#bairro').val(data.bairro);
        $('#cidade').val(data.cidade);
        $('#estado').val(data.estado);
    }, 'json');
});

if ($('.data').length === 1) {
    $('.data').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        language: 'pt-BR'
    });
}

