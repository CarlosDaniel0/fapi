function uploadFile() {
    let drop_ = document.querySelector('.area-upload, #upload-file');
    drop_.addEventListener('dragenter', function() {
        document.querySelector('.area-upload .label-upload').classList.add('highlight');
    });
    drop_.addEventListener('dragleave', function() {
        document.querySelector('.area-upload .label-upload').classList.remove('highlight');
    });
    drop_.addEventListener('drop', function() {
        document.querySelector('.area-upload .label-upload').classList.remove('higlight');
    });

arquivo = "";

function validarArquivo(file) {
    console.log(file);
    // Tipos permitidos
    var mime_types = ['application/pdf', 'image/jpeg', 'image/png']

    // Validar Tipos
    if (mime_types.indexOf(file.type) == -1) {
        return {"error" : "O arquivo " + file.name + "não é permitido"};
    }

    if (file.size > 20*1024*1024) {
        return {"error" : file.name + "ultrapassou o limite de 20MB"};
    }

    return {"success" : "Enviando: " +  file.name}
}

function enviarArquivo(indice, barra) {
    var data = new FormData();
    var request = new XMLHttpRequest();

    // Adicionar arquivo
    data.append('file', document.querySelector('#upload-file').files[indice]);

    // AJAX request finished
    request.addEventListener('load', function(e) {
        if(request.response.status == "success") {
            // Pega o nome para adicinar na tabela *Ver arquivo inserir_registro_tabela.js
            arquivo = request.response.name;
            barra.querySelector('.text').innerHTML = "<a href=\"" + request.response.path + "\"" + "target=\"_blank\">" + request.response.name + "</a> <i class=\"fas fa-check\"></i>"
            barra.classList.add("complete");
        } else {
            barra.querySelector(".text").innerHTML = "Erro ao enviar" + request.response.name;
            barra.classList.add("error");
        }
    });

    // Calcular e mostrar progresso
    request.upload.addEventListener('progress', function(e) {
        var percent_complete = (e.loaded / e.total) * 100;

        barra.querySelector(".fill").style.minWidth = percent_complete + "%";
    });

    // Resposta em JSON
    request.responseType = 'json';
    request.open('post', '../vendor/admin/upload_file.php');
    request.send(data);
    }

    // Início de upload
    document.querySelector("#upload-file").addEventListener('change', function() {
        var files = this.files;
        for (var i = 0; i < files.length; i++) {
            var info = validarArquivo(files[i]);

            // Cria barras a serem usadas posteriormente
            var barra = document.createElement("div");
            var fill = document.createElement("div");
            var text = document.createElement("div");
            barra.appendChild(fill);
            barra.appendChild(text);

            // Adiciona barras de acordo com o CSS uplod.css
            barra.classList.add("barra");
            fill.classList.add("fill");
            text.classList.add("text");

            // Apresenta resultado do envio de arquivos
            if (info.error == undefined) {
                text.innerHTML = info.success;
                enviarArquivo(i, barra);
            } else {
                text.innerHTML = info.error;
                barra.classList.add("error");
            }

            //Adicionar barra
            document.querySelector('.lista-uploads').appendChild(barra);
        }
    });
}