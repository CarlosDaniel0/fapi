$(function() {
    // Modal de atualização
    $(document).on('click', '#update', function() {
        var id_documento = $(this).attr('data-id');

        // Verifica ID
        if (id_documento !== '') {
            // Adiciona valores ao modal correspondente
            $('#modal-cadastro-titulo').html(tituloUpdate);
            $('#modal-cadastro-body').html(bodyUpdate)
            $('#modal-cadastro-footer').html(footerUpdate);
            // Chama funções após modificar o DOM da página
            uploadFile();
            updateFile(id_documento);
            // Apresenda o modal
            $('#modalCadastro').modal('show');
        } 
    });

        // Requisição feita diretamente em modal *Conferir Função em cadastro_tabela.js
        $(document).on('click', '#cadastro', function() {
            // Gera o modal de cadastro
            $('#modal-cadastro-titulo').html(tituloUpdate);
            $('#modal-cadastro-body').html(bodyCadastro)
            $('#modal-cadastro-footer').html(footerCadastro);
            // Chama função responsável por enviar arquivos
            uploadFile();
    
            // Após o usuário clicar em cadastrar, pega os dados do formulãrio e envia a requisição
            // AJAX
            $('#cadastrar').click(function() {
                idOrigem = $(this).attr('data-origem');
                dados = $('#cadastro_tabela').serialize();
                console.log(dados);

                // Caso exista arquivo, pega o nome para adicionar na tabela
                if(typeof arquivo !== 'undefined') {
                    dados += '&arquivo=' + arquivo;
                }
        
        
                console.log(dados);
                $.ajax({
                    url: "tabelas/cadastro_com_relacionamento.php",
                    type: 'POST',
                    data: dados,
                    datatype: 'html',
                    success: function(resposta) {
                        console.log(resposta)
                        window.location.reload(1);
                    }
                });
            });
    
            $('#modalCadastro').modal('show');
        });
});