$(function(){
    var tabela = 'campeonatos';

    function gerarResultados(dados, valor){
        mostrar = [];
        for (var i in dados[valor]) {
            if (dados[valor][i]['documento'] != '') {
                var item = `<a href="files/documents/${ dados[valor][i]['documento']}" class="list-group-item text-dark btn-primary">${ dados[valor][i]['nome']}</a>`;
                mostrar.push(item);
            } 
        }
        return mostrar
    }

    $.ajax({
        url: "vendor/scripts/campeonatos.php",
        type: 'POST',
        data: "ano=" + ano + "&tabela=" + tabela,
        datatype: 'html',
        success: function(response) {
            var dados = JSON.parse(response)
            $('#estaduais').html(gerarResultados(dados, 'ESTADUAIS'));
            $('#festivais').html(gerarResultados(dados, 'FESTIVAIS'));
            $('#marcha_atletica').html(gerarResultados(dados, 'MARCHA ATLÉTICA'));
        }
    })

    $('#select_ano').on('change', function() {
        ano = $(this).val();
        $.ajax({
            url: "vendor/scripts/campeonatos.php",
            type: 'POST',
            data: "ano=" + ano + "&tabela=" + tabela,
            datatype: 'html',
            success: function(response) {
                var dados = JSON.parse(response)
                $('#estaduais').html(gerarResultados(dados, 'ESTADUAIS'));
                $('#festivais').html(gerarResultados(dados, 'FESTIVAIS'));
                $('#marcha_atletica').html(gerarResultados(dados, 'MARCHA ATLÉTICA'));
            }
        })
    })
});