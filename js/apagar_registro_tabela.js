$(function () {
    $(".apagar-registro").click(function() {
        var name_file = $(this).attr('data-arquivo');
        var id = $(this).attr('data-id');

        if(name_file != '') {
            console.log(name_file);
            $.ajax({
                url: "tabelas/delete_file.php",
                type: 'POST',
                data: "name=" + name_file,
                datatype: 'html',
                success: function(resposta) {
                    console.log(resposta);
                    window.location.reload(1);
                }
            });
        }

        $.ajax({
            url: "tabelas/apagar_registro.php",
            type: 'POST',
            data: "tabela=" + tabela + "&id=" + id,
            datatype: 'html',
            success: function(resposta) {
                console.log(resposta);
                window.location.reload(1);
            }
        });
        
    });
});