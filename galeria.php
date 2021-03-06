<?php
  include('vendor/admin/conexao.php');
  include('var/variaveis.php');

  function data($data) {
    return date("d/m/Y", strtotime($data));
  }
?>

<!doctype html>
<html lang="pt_BR">
  <head>
    <title>FAPI - Galeria</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/lightslider.js"></script>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.css">
    <link rel="stylesheet" href="css/lightslider.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/inicio.css">
  </head>
  <body>
    <header class="container">
      <div class="card mt-4">
        <div class="card-body">
          <div class="row d-flex align-items-center">
            <div class="col-6 col-md-3">
              <a href="index">
                <img class="logo" id="fapi" src="<?php echo $dir . $imagens["logo"] ?>"/>
              </a>
            </div>
            <div class="col-6 col-md-3">
              <a href="http://www.cbat.org.br/novo/">
                <img class="logo imagens" id="cbat" src="<?php echo $dir . $imagens["cbat"] ?>"/>
              </a>
            </div>
            <div class="col-6 col-md-3">
              <a href="http://www.caixa.gov.br/Paginas/home-caixa.aspx">
                <img class="logo imagens" id="caixa" src="<?php echo  $dir . $imagens["caixa"] ?>"/>
              </a>
            </div>
            <div class="col-6 col-md-3">
              <a href="https://www.gov.br/pt-br">
                <img class="logo imagens" id="governo" src="<?php echo $dir . $imagens["governo"] ?>"/>
              </a>
            </div>
        </div>
        </div>
      </div>
    </header>

    <hr/>
      <nav class="navbar navbar-expand-xl navbar-light bg-white container container-fluid">
        <button class="navbar-toggler d-xl-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="inicio">INÍCIO<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">FPI</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="pagina?nome=estatuto">ESTATUTO</a>
                <a class="dropdown-item" href="pagina?nome=diretoria">DIRETORIA</a>
                <a class="dropdown-item" href="pagina?nome=historia">HISTÓRIA</a>
                <a class="dropdown-item" href="pagina?nome=regimento-de-taxas">REGIMENTO DE TAXAS</a>
                <a class="dropdown-item" href="pagina?nome=comissao-cientifica">COMISSÃO CIENTÍFICA</a>
                <a class="dropdown-item" href="pagina?nome=transparencia">TRANSPARÊNCIA</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CLUBES</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="clubes_filiados.html">CLUBES FILIADOS</a>
                <a class="dropdown-item" href="#">FILIE-SE</a>
                <a class="dropdown-item" href="#">CADRASTRO CBAT</a>
                <a class="dropdown-item" href="#">TREINADORES</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ATLETAS</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="#">ATLETAS AFILIADOS</a>
                <a class="dropdown-item" href="#">REGISTRO DE ATLETAS (CBAT)</a>
                <a class="dropdown-item" href="#">RENOVAÇÃO DE INSCRIÇÃO</a>
                <a class="dropdown-item" href="#">GUIA DE TRANSFERÊNCIA</a>
                <a class="dropdown-item" href="#">CANCELAMENTO DE INSCRIÇÃO</a>
                <a class="dropdown-item" href="#">TRANSFERÊNCIA ESTADUAL</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ARBITRAGEM</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="#">ÁRBITROS FILIADOS</a>
                <a class="dropdown-item" href="#">REGRAS DE ARBITRAGEM</a>
                <a class="dropdown-item" href="#">DOCUMENTOS GERAIS</a>
                <a class="dropdown-item" href="#">CADRASTRO CBAT</a>
                <a class="dropdown-item" href="#">RENOVAÇÃO CADRATRO CBAT</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ESTATÍSTICAS</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="#">RANKING</a>
                <a class="dropdown-item" href="#">RECORDES</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">COMPETIÇÕES</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="#">LISTA DE COMPETIÇÕES</a>
                <a class="dropdown-item" href="#">RESULTADOS OFICIAIS</a>
                <a class="dropdown-item" href="#">PROGRAMA HORÁRIO</a>
                <a class="dropdown-item" href="#">REGULAMENTOS</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">NOTAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">NOTÍCIAS</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CORRIDA DE RUA</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="#">CALENDÁRIO DE CORRIDAS</a>
                <hr>
                <a class="dropdown-item" href="#">LISTA DE CORREDORES</a>
                <a class="dropdown-item" href="#">SOLICITAÇÃO DE PERMIT</a>
                <a class="dropdown-item" href="#">DOCUMENTOS</a>
                <hr>
                <a class="dropdown-item" href="#">INSCRIÇÃO CBAT</a>
                <a class="dropdown-item" href="#">CORREDOR DE RUA</a>
                <a class="dropdown-item" href="#">CORREDOR DE MONTANHA</a>
                <a class="dropdown-item" href="#">CORREDOR DE TRILHA</a>
                <a class="dropdown-item" href="#">CORREDOR DE CROSS COUNTRY</a>
                <hr>
                <a class="dropdown-item" href="#">RENOVAÇÃO</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contato">CONTATO</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    
    <!-- Conteúdo principal -->
    <section>
      <div class="container container-fluid mt-4">
        <div class="col-md-12">
          <h1>Galeria</h1>

          <?php echo "Teste" ?>
        </div>
      </div>
    </section>

    <!-- Rodapé -->
    <footer>
      <div class="rodape bg-light text-dark">
        <div class="col-12">
          <div class="row">
              <div class="col-md">
                <div class="card-body">
                  <a href="index">
                    <img class="logo" id="fapi" src="img/logo.png" style="width: 18rem"/>
                  </a>
                </div>
              </div>
              <div class="col-md">
                <div class="card-body">
                  <p>
                    <?php echo $rua . "<br/>" . $cidade; ?> 
                  </p>
                </div>
              </div>
              <div class="col-md">
                <div class="card-body">
                  <div class="row d-flex justify-content-center">
                      <a class="btn btn-secundary"target="_blank" href="https://www.instagram.com/fapi_atletismopiaui/"><i style="font-size: 2rem;" class="fab fa-instagram"></i></a>
                      <a class="btn btn-secundary" target="_blank" href="https://www.facebook.com/Federa%C3%A7%C3%A3o-de-Atletismo-do-Piau%C3%AD-100306194946636"><i style="font-size: 2rem;" class="fab fa-facebook-f"></i></a>
                  </div>
                  <div class="row d-flex justify-content-center">
                    <a class="btn btn-primary col-5" href="contato">Contato</a>
                  </div>
                  <hr>
                  <div class="col">
                    <div>
                      Desenvolvido por:
                    </div>
                    <div>
                      <a href="<?php echo $url_developer ?>"><i style="font-size: 1.5rem;" class="fab fa-github"></i> Carlos Daniel</a>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="p-3 bg-dark text-white copyright" align="center"><?php echo $copyright ?></div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
</html>