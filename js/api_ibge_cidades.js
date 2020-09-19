// Requisição de cidades API IBGE
$(function() {
    $.ajax({
        method: 'GET',
        url: 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/pi/distritos',
        success: function(data) {
            // Recece os dados da api e transforma em option
            data.forEach(cidade => {
                $('#cidade').append(`<option value="${cidade['nome']} - PI">${cidade['nome']} - PI</option>`);
            });
        }
    });
})