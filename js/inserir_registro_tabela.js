// Função genéria de inserção de registro em tabelas dinamicas
$(function() {
    $(document).on('submit','#cadastro_tabela', function(e) {
        // Recebe os dados necessários
        e.preventDefault();
        dados = $('#cadastro_tabela').serialize();
        console.log(dados);
        console.log();

        // Caso exista arquivo, que foi enviado por upload_file.js,
        // pega o nome para adicionar na tabela. 
        if(typeof arquivo !== 'undefined') {
            dados += '&' + coluna + '=' + arquivo;
        }

        // Requisição AJAX
        console.log(dados + '&tabela=' + tabela)
        $.ajax({
            url: "../vendor/admin/cadastro_tabela.php",
            type: 'POST',
            data: dados+ '&tabela=' + tabela,
            datatype: 'html',
            success: function(resposta) {
                console.log(resposta)
                window.location.reload(1);
            }
        });
    });
});