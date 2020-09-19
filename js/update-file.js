function updateFile(id) {
    console.log(id);
    $('#atualizar-arquivo').click(function() {
        $.ajax({
            url: "tabelas/update_tabela.php",
            type: 'POST',
            data: "coluna=" + coluna + "&conteudo=" + arquivo + "&tabela=" + tabela + "&id=" + id + "&coluna_id=" + coluna_id,
            datatype: 'html',
            success: function(resposta) {
                console.log(resposta);
                window.location.reload(1);
            }
        });
    });
}