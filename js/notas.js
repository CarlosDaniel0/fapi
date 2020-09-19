$(function() {
    var show;

    function gerarNotas(notas) {
        mostrar = [];
        for (var i in notas) {
            var documentos = '';
            var quantidade_itens = 0;

            for (var f in notas[i]['documentos']) {
                documentos += `<a href="files/documents/${ notas[i]['documentos'][f]['arquivo'] }" class="list-group-item text-dark btn-primary">
                    <div class="row">
                        <i class="fas fa-file-pdf mr-2 ml-2" style="color: red; font-size: 1.5rem;"></i>
                        ${ notas[i]['documentos'][f]['nome'] }
                    </div>
                </a>`;
                quantidade_itens += 1;
            }
            
            var corpo = `<div class="card">
            <div class="card-header" id="heading${ i }">
                    <h2 class="mb-0">
                        <button data-id="${ i }" class="btn btn-link btn-block text-left button_show" type="button" data-toggle="collapse" data-target="#collapse${ i }" aria-expanded="true" aria-controls="collapse${ i }">
                          ${ notas[i]['nota'] } <span class="badge badge-success" id="badge${i}">${ quantidade_itens }</span>
                        </button>
                    </h2>
                </div>

                <div id="collapse${ i }" class="collapse${ i == '0' ? ' show' : '' }" aria-labelledby="heading${ i }" data-parent="#conteudoNotas">
                    <div class="card-body">
                        <h5 align="center">${ notas[i]['titulo'] }</h5>
                        <div class="list-group">
                            ${ documentos }
                        </div>
                    </div>
                </div>
            </div>`;
            mostrar.push(corpo)
        }
        return mostrar;
    }

    $.ajax({
        url: "vendor/scripts/notas.php",
        type: 'POST',
        data: "ano=" + ano + "&tabela=" + tabela,
        datatype: 'html',
        success: function(resposta) {
            notas = JSON.parse(resposta);
            show = gerarNotas(notas);
            $('#conteudoNotas').html(show);
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
                url: "vendor/scripts/notas.php",
                type: 'POST',
                data: "ano=" + ano + "&tabela=" + tabela,
                datatype: 'html',
                success: function(resposta) {
                    notas = JSON.parse(resposta);
                    show = gerarNotas(notas);
                    $('#conteudoNotas').html(show);
                }
            });
        }
    );
});