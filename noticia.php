<?php
  include('vendor/admin/conexao.php');
  include('var/variaveis.php');
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) == 0 ? 1 : filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

  $query = "SELECT * FROM noticia WHERE id = $id";
  $result = mysqli_query($conexao, $query);
  $noticia = mysqli_fetch_assoc($result);

  function data($data) {
    return date("d/m/Y", strtotime($data));
  }

  // Verifica se existe algum titulo de página na URL
  // Caso não exista retorna para a página inicial
  $titulo = filter_input(INPUT_GET, 'titulo', FILTER_SANITIZE_STRING);

  if ($id != $noticia['id'] || empty($titulo)) {
    header("Location: index");
  }

  function limita_caracteres($texto, $limite, $quebra = true) {
    $tamanho = strlen($texto);
    // Verifica se o tamanho do texto é menor ou igual ao limite
    if ($tamanho <= $limite) {
        $novo_texto = $texto;
    // Se o tamanho do texto for maior que o limite
    } else {
        // Verifica a opção de quebrar o texto
        if ($quebra == true) {
            $novo_texto = trim(substr($texto, 0, $limite)).'...';
        // Se não, corta $texto na última palavra antes do limite
        } else {
            // Localiza o útlimo espaço antes de $limite
            $ultimo_espaco = strrpos(substr($texto, 0, $limite), ' ');
            // Corta o $texto até a posição localizada
            $novo_texto = trim(substr($texto, 0, $ultimo_espaco)).'...';
        }
    }

  //Retorna o valor formatado
  return $novo_texto;
  }
?>

<!doctype html>
<html lang="pt_BR">
  <head>
    <title><?php echo $noticia['titulo'] ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:url"           content="<?php echo "fapi2020.000webhostapp.com/noticia?titulo=" . $titulo . "&id=" . $id ?>" />
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="<?php echo $noticia['titulo'] ?>" />
    <meta property="og:image"         content="<?php echo "fapi2020.000webhostapp.com/files/images/" . $noticia['imagem'] ?>" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/noticia.css">
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

    <!-- Conteúdo principal -->
    <main>

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
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CLUBES</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="clubes-filiados">CLUBES FILIADOS</a>
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

    <!-- Conteúdo Principal -->
    <section class="container">
      <div class="row">
        <div style="margin: auto;" id="conteudo" class="col-md-10">
            <?php if ($noticia['id'] == $id): ?>
              <h1 class="titulo"><?php echo $noticia['titulo'] ?></h1>
              <p class="informacao"><?php echo $noticia['autor'] . " <i class='far fa-clock'></i> " . data($noticia['criado_em'])?></p>
              
              <div class="row">
                <!-- Your share button code -->
                <div class="fb-share-button" 
                  data-href="https://www.your-domain.com/your-page.html"
                  data-size="large"
                  data-layout="button_count">
                </div>
              </div>
            <?php endif; ?>
            <img class="img-fluid img mt-4" width="100%" src="<?php echo "files/images/" . $noticia['imagem'];?>" alt="">
            <br>
            <br>
          <?php
            echo $noticia['corpo_noticia'];
          ?>          
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
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v8.0" nonce="DiI1Tt2J"></script>
    <div id="fb-root"></div>
    <script>
    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
  </body>
</html>