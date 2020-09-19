// Função para administrar modais dinâmicos
$(function() {
    $(document).on('click', '.view-document', function() {
        // Pega valores necessários
        var id = $(this).attr('data-id');
        var documento = $(this).attr('data-documento');
        // Veridicar id
        if (id !== '') {
            // Adiciona valores ao modal correspondente
            $('#show-document-title').html(documento);
            $('#show-new-page').attr('href', 'upload/' + documento)
            $('#show-document').attr('src', "../files/documents/" + documento);
            $('#show-document-modal').modal('show');
        }
    });

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
        $('#modal-cadastro-titulo').html(tituloCadastro);
        $('#modal-cadastro-body').html(bodyCadastro)
        $('#modal-cadastro-footer').html(footerCadastro);
        // Chama função responsável por enviar arquivos
        uploadFile();

        // Após o usuário clicar em cadastrar, pega os dados do formulãrio e envia a requisição
        // AJAX
        $('#cadastrar').on('click', function() {
            // Recebe os dados necessários
            //e.preventDefault();
            dados = $('#cadastro_tabela').serialize();
    
            // Caso exista arquivo, que foi enviado por upload_file.js,
            // pega o nome para adicionar na tabela. 
            if(typeof arquivo !== 'undefined') {
                dados += '&' + coluna + '=' + arquivo;
            }
    
            // Requisição AJAX
            console.log(dados + '&tabela=' + tabela)
            $.ajax({
                url: "tabelas/cadastro_tabela.php",
                type: 'POST',
                data: dados+ '&tabela=' + tabela,
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
