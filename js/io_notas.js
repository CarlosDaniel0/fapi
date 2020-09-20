$(function() {
    $(document).on('submit', '#cadastro_tabela', function(e) {
        e.preventDefault();
        var dados = $(this).serialize();
        
        $.ajax({
            method: 'POST',
            url: '../vendor/admin/script_notas.php',
            data: dados,
            success: function(data) {
                console.log(data);
                response = JSON.parse(data);
                var url = 'editor-notas?id=' + response['last_id'];
                window.location.assign(url);
            }
        })
    });

    $('').on('click', function() {

    });
})