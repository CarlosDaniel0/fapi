$(function() {
    $("td").dblclick(function() {
        // Pegar valores, do campo e de referência da tabela
        var conteudoOriginal = $(this).text();
        var nomeColuna = $(this).attr('data-col');
        var id = $(this).attr('data-id');

        // Adiciona input para edição
        $(this).addClass("celulaEmEdicao");
        $(this).html("<input type='text' value='" + conteudoOriginal + "' />");
        $(this).children().first().focus();

        // Recebe a tecla pressionada pelo usuário
        $(this).children().first().keypress( function (e) {
            // Verifica se é o "Enter";
            if (e.which == 13) {
                var novoConteudo = $(this).val();
                $(this).parent().text(novoConteudo);
                $(this).parent().removeClass("celulaEmEdicao");

                var request = $.ajax({
                    url: "../vendor/admin/update_tabela.php",
                    type: 'POST',
                    data: "coluna=" + nomeColuna + "&conteudo=" + novoConteudo + "&tabela=" + tabela + "&id=" + id + "&coluna_id=" + coluna_id,
                    datatype: 'html'
                });

                request.done(function(resposta) {
                    console.log(resposta)
                }); 

                request.fail(function(jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus)
                });

                request.always(function() {
                    console.log("completou");
                });
            }
        });

        // apresenta conteúdo dentro de td novamente
        $(this).children().first().blur(function () {
            $(this).parent().text(conteudoOriginal);
            $(this).parent().removeClass("celulaEmEdicao");
        });
    });
});