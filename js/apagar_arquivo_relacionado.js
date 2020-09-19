$(function(){
    $('.unset-file').on('click', function(){
        id = $(this).attr('data-id');
        documento = $(this).attr('data-arquivo');

        // Gerar array de campos da tabela de relacionamento
        var c = 'campos[]'
        var campos = '';
        for (var i in campos_relacionamento) {
            if (campos != '') {
                campos += '&';
            }
            campos += c + '=' + campos_relacionamento[i]
        }
        //

        console.log('id_arquivo=' + id + '&id_origem=' + id_origem + '&tabela=' + tabela + '&relacionamento=' + tabela_relacionada + '&' + campos + '&documento=' + documento + '&coluna_id=' + coluna_id + '&coluna_origem=' + coluna_origem + '&all=' + all);

        $.ajax({
            method: 'POST',
            url: 'tabelas/delete_file_relacionado.php',
            data: 'id_arquivo=' + id + '&id_origem=' + id_origem + '&tabela=' + tabela + '&relacionamento=' + tabela_relacionada + '&' + campos + '&documento=' + documento + '&coluna_id=' + coluna_id + '&coluna_origem=' + coluna_origem + '&all=' + all,
            success: function(response) {
                console.log(response);
                window.location.reload(1);
            },
        });
    });
});