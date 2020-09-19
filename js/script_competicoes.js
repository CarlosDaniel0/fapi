$(function(){
    var show;

    function gerarNotas(dados) {
        function gerarCards(titulo, conteudo) {
            card = 
            `<div class="card mt-4" style="width: 23rem">
                <div class="card-header bg-info">
                    <h4 class="text-white" style="text-align: center">${ titulo }</h4>
                </div>
                <div class="card-body">
                    <h5 style="text-align: center">${ conteudo }</h5>
                </div>
            </div>`
            return card
        }

        mostrar = [];
        for (var i in dados) {
            cards = '';
            cards += gerarCards("Período da competição", "De " + dados[i]['periodo']['de'] + " até " + dados[i]['periodo']['ate']);
            cards += gerarCards("Local",dados[i]['cidade']);
            if ((dados[i]['inscricoes']['de'] != null) && (dados[i]['inscricoes']['ate'] != null)) {
                cards += gerarCards("Período das Inscrições", "De " + dados[i]['inscricoes']['de'] + " até " + dados[i]['inscricoes']['ate']);
            }

            documento = '';
            if (dados[i]['documento'] != '') {
                documento = 
                `<hr/>
                 <div class="col-md-4 d-flex justify-content-center">
                    <a href="files/documents/${ dados[i]['documento'] }">
                        <div class="card-body">
                        <i class="fas fa-file-pdf" style="color: red; font-size: 6.5rem;"></i>
                        <p>Resultados</p>
                        </div>
                    </a>
                 </div>`
            }


            var corpo = `<div class="card">
            <div class="card-header" id="heading${ i }">
                    <h2 class="mb-0">
                        <button data-id="${ i }" class="btn btn-link btn-block text-left button_show" type="button" data-toggle="collapse" data-target="#collapse${ i }" aria-expanded="true" aria-controls="collapse${ i }">
                          ${ dados[i]['competicao'] }
                        </button>
                    </h2>
                </div>

                <div id="collapse${ i }" class="collapse${ i == '0' ? ' show' : '' }" aria-labelledby="heading${ i }" data-parent="#conteudoNotas">
                    <div class="card-body">
                        <div class="row mb-4 d-flex justify-content-center">
                            ${ cards }
                        </div>
                        ${ documento }
                    </div>
                </div>
            </div>`;
            mostrar.push(corpo)
        }
        return mostrar;
    }

    $.ajax({
        url: "vendor/scripts/competicoes.php",
        type: 'POST',
        data: "ano=" + ano,
        datatype: 'html',
        success: function(resposta) {
            dados = JSON.parse(resposta);
            show = gerarNotas(dados);
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
                url: "vendor/scripts/competicoes.php",
                type: 'POST',
                data: "ano=" + ano,
                datatype: 'html',
                success: function(resposta) {
                    dados = JSON.parse(resposta);
                    show = gerarNotas(dados);
                    $('#conteudoNotas').html(show);
                }
            });
        }
    );
});