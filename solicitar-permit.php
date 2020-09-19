<?php
  include('admin/conexao.php');
  include('var/variaveis.php');
  session_start();
?>

<!doctype html>
<html lang="pt_BR">
  <head>
    <title>FAPI - Solicitar Pérmit</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/pagina.css">
    <link rel="stylesheet" href="css/lightslider.css">
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
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CORRIDA DE RUA</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="corredores-oficiais">LISTA DE CORREDORES</a>
                <a class="dropdown-item active" href="solicitar-permit">SOLICITAÇÃO DE PERMIT</a>
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
      <div class="container" id="container">
          <div class="col-md-12">
            <h2 style="text-align: center">Solicitar Pérmit</h2>
            <?php 
              if (isset($_SESSION['success'])) {
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sua solicitação foi efetuada com sucesso!</strong> Aguarde o retorno por e-mail.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php
              }
              unset($_SESSION['success']);
            ?>

            <!-- Calendário de Corridas -->
            <div class="card">
              <div class="card-body">
                         
              <p>
              Todos os organizadores de corridas de rua devem preencher este documento para que a análise do evento e das taxas a serem cobradas para a emissão do permit FAPI sejam devidamente efetuadas pela diretoria da entidade. O prazo para envio deste formulário é de 30 dias antes da realização da corrida de rua.
              </p>
              <div class="callout callout-danger">
                <h4>Atenção</h4>
                * Campos Obrigatórios
              </div>
              <!-- Inicio Formulário -->
              <form name="permit" id="permit" action="vendor/scripts/permit" method="POST" enctype="multipart/form-data">
                <!-- Nome do Evento -->
                <div class="form-group">
                  <label for="nome_evento">Nome do Evento: *</label>
                  <input type="text" name="nome_evento" class="form-control" id="nome_evento" required>
                </div>

                <!-- Linha -->
                <div class="form-row">
                  <!-- Data -->
                  <div class="col">
                    <label for="data">Data de realização do evento: *</label>
                    <input id="data" name="data_realizacao" type="date" class="form-control" required>
                  </div>
                  <!-- Cidade -->
                  <div class="col-md-9">
                    <label for="cidade">Cidade</label>
                    <select name="cidade"class="form-control" id="cidade" required>
                      <option value="">Selecione...</option>
                    </select>
                  </div>
                </div>
                <!-- Fim de Linha -->

                <!-- Tipo de Pérmit -->
                <div class="form-group">
                  <label for="">Tipo de Pérmit</label>
                  <div class="custom-control custom-radio">
                    <input type="radio" value="B" id="customRadio1" name="classe" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">CLASSE B (com resultados reconhecidos pela FAPI e CBAt) - Obrigatório ter medição oficial e arbitragem</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" value="C" id="customRadio2" name="classe" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">CLASSE C (apenas para cumprimento do CTB)</label>
                  </div>
                </div>
                <!-- Fim de Tipo de Pérmit -->

                <!-- Linha -->
                <div class="form-row">
                  <!-- Hora -->
                  <div class="col">
                    <label for="hora">Hora da Largada: *</label>
                    <input required id="hora" name="hora" type="time" class="form-control">
                  </div>

                  <!-- Endereço -->
                  <div class="col-md-9">
                    <label for="endereco">Endereço do local da largada: *</label>
                    <input required type="text" name="endereco" id="endereco" class="form-control">
                  </div>
                </div>
                <!-- Fim Linha -->

                <!-- Início Distâncias -->
                <div class="form-group">
                  <div class="col-sm-10">Distâncias que serão oferecidas no evento: *</div>
                  <div class="col-sm-10">
                    <div class="form-check">
                        <div class="custom-control custom-checkbox">
                          <input name="distancia[]" value="1" type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">5 KM</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="distancia[]" value="2" type="checkbox" class="custom-control-input" id="customCheck2">
                          <label class="custom-control-label" for="customCheck2">10 KM</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="distancia[]" value="3" type="checkbox" class="custom-control-input" id="customCheck3">
                          <label class="custom-control-label" for="customCheck3">15 KM</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="distancia[]" value="4" type="checkbox" class="custom-control-input" id="customCheck4">
                          <label class="custom-control-label" for="customCheck4">20 Km</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="distancia[]" value="5" type="checkbox" class="custom-control-input" id="customCheck5">
                          <label class="custom-control-label" for="customCheck5">MEIA MARATONA</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="distancia[]" value="6" type="checkbox" class="custom-control-input" id="customCheck6">
                          <label class="custom-control-label" for="customCheck6">25 KM</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="distancia[]" value="7" type="checkbox" class="custom-control-input" id="customCheck7">
                          <label class="custom-control-label" for="customCheck7">30 KM</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="distancia[]" value="8" type="checkbox" class="custom-control-input" id="customCheck8">
                          <label class="custom-control-label" for="customCheck8">MARATONA (42.195m)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="distancia[]" value="9" type="checkbox" class="custom-control-input" id="customCheck9">
                          <label class="custom-control-label" for="customCheck9">100 KM</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="distancia[]" value="10" type="checkbox" class="custom-control-input" id="customCheck10">
                          <label class="custom-control-label" for="customCheck10">ULTRA MARATONA DE 24HS</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="distancia[]" value="11" type="checkbox" class="custom-control-input" id="customCheck11">
                          <label class="custom-control-label" for="customCheck11">MARATONA DE REVEZAMENTO</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input value="" type="checkbox" class="custom-control-input" id="outro">
                          <label class="custom-control-label" for="outro">OUTRO</label>
                        </div>
                        <input id="input_outro" name="outro" value="" class="form-control" type="text" readonly>
                    </div>
                  </div>
                </div>
                <!-- Fim Distâncias  -->

                <div class="form-group">
                  <div class="col-md-4">
                    <label for="numero">Número de Atletas na Corrida: *</label>
                    <input type="number" class="form-control" name="numero_atletas" id="numero" required>
                  </div>
                </div>

                <!-- Linha -->
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="entidade">Nome da entidade promotora do evento: *</label>
                    <input id="entidade" type="text" name="nome_entidade" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label for="cnpj">Número do Cadastro Nacional de Pessoa Jurídica (CNPJ): *</label>
                    <input type="text" id="cnpj" class="form-control" name="cnpj" placeholder="cnpj" required>
                  </div>
                </div>
                <!-- Fim Linha -->

                <div class="form-group">
                  <label for="nome_entidade">Nome do responsável da entidade promotora do evento: *</label>
                  <input type="text" class="form-control" name="nome_responsavel" id="nome_entidade" required>
                </div>

                <!-- Linha -->
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="telefone">Telefone do responsável da entidade promotora do evento: *</label>
                    <input id="telefone" type="tel" name="telefone" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label for="email_responsavel">E-mail do responsável da entidade promotora do evento: *</label>
                    <input type="text" id="email_responsavel" name="email_responsavel" class="form-control" placeholder="Email" required> 
                  </div>
                </div>
                <div class="form-group">
                  <label for="data_vigor">Se o percurso foi medido oficialmente, Informar o ano da medição em vigor:</label>
                  <input id="data_vigor" name="data_vigor" type="date" name="ano_medicao" class="form-control">
                </div>
                <!-- Fim Linha -->

                <!-- Área de Upload de Arquivos -->
                <div class="form-group">
                  <h5>Anexo de Documentos: </h5>
                  <ul>
                    <li>Cópia do Regulamento da prova: <br/>
                      <div class="custom-file">
                        <input type="file" name="arquivo[]" class="custom-file-input" id="arquivo1">
                        <label class="custom-file-label" for="arquivo1">Escolher Arquivo...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                      </div>
                    </li>
                    <li>Croqui do percurso: <br/>
                      <div class="custom-file">
                        <input type="file" name="arquivo[]" class="custom-file-input" id="arquivo2">
                        <label class="custom-file-label" for="arquivo2">Escolher Arquivo...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                      </div>
                    </li>
                    <li>Cópia das apólices/contrato de seguro: <br/>
                      <div class="custom-file">
                        <input type="file" name="arquivo[]" class="custom-file-input" id="arquivo3">
                        <label class="custom-file-label" for="arquivo3">Escolher Arquivo...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                      </div>
                    </li>
                    <li>Cópia do Certificado de Medição (se for o caso): <br/>
                      <div class="custom-file">
                        <input type="file" name="arquivo[]" class="custom-file-input" id="arquivo4">
                        <label class="custom-file-label" for="arquivo4">Escolher Arquivo...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                      </div>
                    </li>
                    <li>Cópia contrato atendimento de emergência: <br/>
                      <div class="custom-file">
                        <input type="file" name="arquivo[]" class="custom-file-input" id="arquivo5">
                        <label class="custom-file-label" id="arquivo5" for="arquivo5">Escolher Arquivo...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                      </div>
                    </li>
                  </ul>
                </div>
                <!-- Fim de área de upload de arquivos -->

                <div class="form-group">
                  <label for="email_responsavel">Nome do responsável pelo preenchimento deste formulário: *</label>
                  <input name="nome_responsavel_formulario"type="text" class="form-control" id="email_responsavel" required>
                </div>
              <!-- Fim Formulário -->
              </div>
              <div class="card-footer d-flex justify-content-center">
                <button type="submit" id="enviar" class="btn btn-primary">Enviar</button>
                </form>
              </div>
            </div>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="js/api_ibge_cidades.js"></script>
    <script>
      $('#outro').click(function() {
        if (this.checked) {
          $('#input_outro').removeAttr('readonly')
        } else {
          $('#input_outro').attr('readonly', '')
        }
      });

      $(document).on('change', '.custom-file-input', function (event) {
          $(this).next('.custom-file-label').html(event.target.files[0].name);
      });

      $("input#telefone")
        .mask("(99) 99999-9999")
        .focusout(function (event) {  
            element.unmask();  
        });

      $("input#cnpj")
      .mask("99.999.999/9999-99")
      .focusout(function (event) {  
          element.unmask();  
      });
    </script>
  </body>
</html>