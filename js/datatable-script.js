// Função genéria para Datatable
$(document).ready( function () {
    $('.filtrar').change(function() {
        var valor = $(this).val();
        console.log(valor);
    });

    $('#show_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax" : {
            "url": "vendor/scripts/" + pagina + ".php",
            "type": "POST",
        },
        // Tradução para datatable https://www.guj.com.br/t/jquery-datatable-traducao/301039/5
        "language": {
            "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
        },
        "responsive": true
    });
} );