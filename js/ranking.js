$(function() {
    $(function() {
        var show;
    
        function gerarRanking(dado) {
            mostrar = [];
            for(var i in dado) {
                if (dado[i]['nome'] == "Estadual Masculino") {
                    var masculino = `<div class="card col-md-5 mt-4" style="width: 18rem; margin: auto;">
                    <div class="row mt-4 mb-2">
                    <i style="font-size: 8rem; margin: auto; color: rgb(25, 95, 170);" class="col-12 fas fa-running"></i>
                    </div>
                    <div class="card-body">
                        <div class="col" style="text-align: center;">
                        <h2>Estadual Masculino ${ dado[i]['ano'] }</h2>
                        <a class="btn col-12 btn-outline-primary" href="files/documents/${ dado[i]['documento'] }">Abrir</a>
                        <small>${ dado[i]['data'] }</small>
                        </div>
                    </div>
                </div>`;
                mostrar.push(masculino);
                } else if (dado[i]['nome'] == "Estadual Feminino") {
                    var feminino = `<div class="card col-md-5 mt-4" style="width: 18rem; margin: auto;">
                    <div class="row mt-4 mb-2">
                    <i style="font-size: 8rem; margin: auto; color: #dc3545;" class="col-12 fas fa-running"></i>
                    </div>
                    <div class="card-body">
                        <div class="col" style="text-align: center;">
                        <h2>Estadual Feminino ${ dado[i]['ano'] }</h2>
                        <a class="btn col-12 btn-outline-danger" href="files/documents/${ dado[i]['documento'] }">Abrir</a>
                        <small>${ dado[i]['data'] }</small>
                        </div>
                    </div>
                </div>`;
                mostrar.push(feminino);
                }
            }
            return mostrar;
        }
    
        $.ajax({
            url: "vendor/scripts/ranking.php",
            type: 'POST',
            data: "ano=" + ano + "&tabela=" + tabela,
            datatype: 'html',
            success: function(resposta) {
                dados = JSON.parse(resposta);
                console.log(dados)
                show = gerarRanking(dados);
                $('#conteudoRanking').html(show);
            }
        });
    
        // $(document).on('click', '.button_show', function() {
        //     var id = $(this).attr('data-id');
        //     $('#badge' + id).remove();
        //     console.log('teste' + id);
        // })
    
        $('.filtrar').change(
            function() {
                ano = $(this).val();
    
                // Buscar Notas em 
                $.ajax({
                    url: "vendor/scripts/ranking.php",
                    type: 'POST',
                    data: "ano=" + ano + "&tabela=" + tabela,
                    datatype: 'html',
                    success: function(resposta) {
                        dados = JSON.parse(resposta);
                        show = gerarRanking(dados);
                        $('#conteudoRanking').html(show);
                    }
                });
            }
        );
    });
});