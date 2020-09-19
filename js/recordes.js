$(function() {
    $(function() {
        var show;
    
        function gerarRecordes(dado) {
            mostrar = [];
            for(var i in dado) {
                var tipo = '';
                if (dado[i]['tipo'] == 'Estaduais') {
                    tipo = 'success'
                } else if (dado[i]['tipo'] == 'Fesporte') {
                    tipo = 'warning'
                } else if (dado[i]['tipo'] == 'Absoluto') {
                    tipo = 'danger'
                }
                var card = `<div class="col-lg-4 mt-4 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                  <div class="card-img-top d-flex justify-content-center mt-4">
                    <i style="font-size: 11rem; color: orange;" class="fas fa-trophy"></i>
                  </div>
                  <div class="card-body">
                    <div class="col">
                      <h4>${ dado[i]['nome'] }</h4>
                      <h5><span class="badge badge-${ tipo }">${ dado[i]['tipo'] }</span></h5>
                      <br/>
                      <a class="btn btn-primary col-12" href="files/documents/${ dado[i]['documento'] }">abrir</a>
                      <div class="mt-2 row d-flex justify-content-between">
                        Atualizado em: 
                        <small>${ dado[i]['data'] }</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>`
              mostrar.push(card);
            }
            return mostrar;
        }
    
        $.ajax({
            url: "vendor/scripts/recordes.php",
            type: 'POST',
            data: "ano=" + ano + "&tabela=" + tabela,
            datatype: 'html',
            success: function(resposta) {
                dados = JSON.parse(resposta);
                console.log(dados)
                show = gerarRecordes(dados);
                $('#conteudoRecordes').html(show);
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
                    url: "vendor/scripts/recordes.php",
                    type: 'POST',
                    data: "ano=" + ano + "&tabela=" + tabela,
                    datatype: 'html',
                    success: function(resposta) {
                        dados = JSON.parse(resposta);
                        show = gerarRecordes(dados);
                        $('#conteudoRecordes').html(show);
                    }
                });
            }
        );
    });
});