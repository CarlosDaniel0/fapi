<?php
  include('admin/conexao.php');
  include('var/variaveis.php');
?>

<!doctype html>
<html lang="pt_BR">
  <head>
    <title>FAPI - Clubes Filiados</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/lightslider.css">
    <script>
      var pagina = 'clubes-filiados';
    </script>
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

    <!-- Menu -->
    <hr/>
    <!-- Menu -->
    <nav class="navbar navbar-expand-xl navbar-light bg-white container container-fluid">
        <button class="navbar-toggler d-xl-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index">INÍCIO<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">FAPI</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="pagina?nome=estatuto">ESTATUTO</a>
                <a class="dropdown-item" href="pagina?nome=diretoria">DIRETORIA</a>
                <a class="dropdown-item" href="pagina?nome=historia">HISTÓRIA</a>
                <a class="dropdown-item" href="pagina?nome=regimento-de-taxas">REGIMENTO DE TAXAS</a>
                <a class="dropdown-item" href="pagina?nome=comissao-cientifica">COMISSÃO CIENTÍFICA</a>
                <a class="dropdown-item" href="pagina?nome=transparencia">TRANSPARÊNCIA</a>
              </div>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CLUBES</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item active" href="clubes-filiados">CLUBES FILIADOS</a>
                <a class="dropdown-item" href="pagina?nome=filie-se">FILIE-SE</a>
                <a class="dropdown-item" href="http://www.cbat.org.br/formularios/default.asp">CADRASTRO CBAT</a>
                <a class="dropdown-item" href="treinadores">TREINADORES</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ATLETAS</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="atletas-filiados">ATLETAS AFILIADOS</a>
                <a class="dropdown-item" href="http://www.cbat.org.br/formularios/default.asp">REGISTRO DE ATLETAS (CBAT)</a>
                <a class="dropdown-item" href="http://cbat.org.br/formularios/renovacao_atleta.asp">RENOVAÇÃO DE INSCRIÇÃO</a>
                <a class="dropdown-item" href="http://www.cbat.org.br/formularios/">GUIA DE TRANSFERÊNCIA</a>
                <a class="dropdown-item" href="http://www.cbat.org.br/formularios/">CANCELAMENTO DE INSCRIÇÃO</a>
                <a class="dropdown-item" href="http://www.cbat.org.br/formularios/">TRANSFERÊNCIA ESTADUAL</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ARBITRAGEM</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="arbitros-filiados">ÁRBITROS FILIADOS</a>
                <a class="dropdown-item" href="pagina?nome=regras-de-arbitragem">REGRAS DE ARBITRAGEM</a>
                <a class="dropdown-item" href="pagina?nome=documentos-gerais">DOCUMENTOS GERAIS</a>
                <a class="dropdown-item" href="http://www.cbat.org.br/formularios/">CADRASTRO CBAT</a>
                <a class="dropdown-item" href="http://www.cbat.org.br/formularios/renovacao_arbitro.aspx">RENOVAÇÃO CADRATRO CBAT</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ESTATÍSTICAS</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="ranking">RANKING</a>
                <a class="dropdown-item" href="recordes">RECORDES</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">COMPETIÇÕES</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="competicoes-oficiais">LISTA DE COMPETIÇÕES</a>
                <a class="dropdown-item" href="resultados-de-campeonatos">RESULTADOS OFICIAIS</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="notas-oficiais">NOTAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="noticias">NOTÍCIAS</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CORRIDA DE RUA</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="corredores-oficiais">LISTA DE CORREDORES</a>
                <a class="dropdown-item" href="solicitar-permit">SOLICITAÇÃO DE PERMIT</a>
                <a class="dropdown-item" href="pagina?nome=documentos">DOCUMENTOS</a>
                <hr>
                <div align="center"><b>INSCRIÇÃO CBAT</b></div>
                <a class="dropdown-item" href="http://www.cbat.org.br/formularios/">ACESSAR FORMULÁRIOS</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contato">CONTATO</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <!-- Fim do menu -->

    <!-- Conteúdo principal -->
    <section>
      <div class="container">
          <div class="col-md-12">
            <h2 style="text-align: center">Clubes Filiados</h2>
            <!-- <div class="form-group col-md-4">
              <label for="exampleFormControlSelect1">Cidade</label>
              <select class="form-control filtrar" id="exampleFormControlSelect1">
                  <?php
                  // foreach($conexao->query("SELECT cidade FROM clubes") as $estab)
                  // echo '<option value="'.$estab['cidade'].'">'. $estab['cidade'] .'</option>';
                  ?>
              </select>
            </div> -->
            <table id="show_table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                  <th>CBAt</th>
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th>Cidade</th>
                </thead>
              </table>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Datatable script -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="js/datatable-script.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  </body>
</html>