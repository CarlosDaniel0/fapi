// Função de apagar aquivo em tabela
$(function () {
    $(".unset-file").click(function() {
        var name_file = $(this).attr('data-arquivo');
        var id = $(this).attr('data-id');

        $.ajax({
            url: "../vendor/admin/delete_file.php",
            type: 'POST',
            data: "name=" + name_file + "&tabela=" + tabela + "&coluna=" + coluna + "&id=" + id,
            datatype: 'html',
            success: function(resposta) {
                console.log(resposta);
            window.location.reload(1);
            }
        });
    });
});