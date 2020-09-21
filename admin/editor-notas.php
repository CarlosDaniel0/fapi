<?php
  session_start();
  // Verifica se o usuário está logado
  include('../vendor/admin/verifica_login.php');
  include('../vendor/admin/conexao.php');
  include('../var/variaveis.php');

  //Identifica o usuário logado de acordo com a base de dados.
  $query = "SELECT nome, sobrenome FROM usuario WHERE usuario = '{$_SESSION['usuario']}'";

  $resultado = mysqli_query($conexao, $query);

  $nome = mysqli_fetch_assoc($resultado);

  $titulo = empty($_GET['id']) ? "Inserir" : "Editar";
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
  if ($id != 0) {
    $query = "SELECT * FROM notas WHERE id_nota = $id";
    $result = mysqli_query($conexao, $query);
    $nota = mysqli_fetch_assoc($result);

    $query_documentos = "SELECT a.id_arquivo, a.nome, a.arquivo, a.data  FROM arquivos_notas AS a 
    INNER JOIN notas_has_arquivos AS n on (a.id_arquivo = n.id_arquivo) 
    WHERE n.id_nota = $id ";
    /*
     * SELECT com relacionamento entre notas e arquivos
     *  ** Consultar modelo de entiade e relacionamento
     *  Relaciona os ids de notas e arquivos em notas_arquivos com o id 
     *  da tabela notas com o id da tabela arquivos_notas
     */
  
    $result_documentos = mysqli_query($conexao, $query_documentos);
}

  $hoje = date('Y');
  function data($data) {
    return date("d/m/Y", strtotime($data));
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Administrativo FAPI - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="../css/upload.css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <script>
    function doEnviar() { //inicio da funcao
    
        //pega o formulário como elemento
        var formulario = document.getElementById('editor');
        
        //monta os parametros de get
        var parsGet = '?id=<?php echo $id;?>';
        // parsGet = parsGet + '&titulo=' + document.getElementById('titulo').value + '&autor=' + document.getElementById('autor').value + '&texto=' + document.getElementById('texto').value;
        
        //muda o parâmetro action do formulário com os parmetros get
        formulario.action = "../vendor/admin/cadastro_nota.php"+ parsGet;
        
        //envia o formulário
        formulario.submit();
    }

    var tabela = "arquivos_notas";
    var coluna_origem = "id_nota";
    var tabela_relacionada = "notas_has_arquivos";
    var id_origem = "<?php echo $_GET['id'] ?>";
    var campos_relacionamento = ['id_nota', 'id_arquivo'];
    var all = '';
    var coluna_id = "id_arquivo";

    var tituloUpdate = 'Inserir Arquivo';

    var bodyUpdate =
      `<div class="col">
          PDF
          <div class="area-upload">
            <label for="upload-file" class="label-upload">
              <i class="fas fa-upload"></i>
              <div class="texto">Clique ou arraste o arquivo</div>
            </label>
            <input type="file" id="upload-file" accept="image/jpg,image/png,application/pdf" multiple/>
            <div class="lista-uploads"></div>
          </div>
        </div>
      </div>`;
    
    var bodyCadastro = 
    `<form action="../vendor/admin/cadastro_tabela" id="cadastro_tabela" method="post">
      <div class="col-md-12" style="margin: auto;">
        <div class="col">
          Documento
          <input class="col" name="nome" type="text" placeholder="Documento">
        </div>
          <input type="hidden" name="data" value="<?php echo date('Y-m-d') ?>">
          <input type="hidden" name="idOrigem" value="<?php echo $_GET['id'] ?>">
        ${bodyUpdate}
      </div>
    </form>`;

    var footerCadastro = 
    `<a type="button" href="#" class="btn btn-primary" data-dismiss="modal">Fechar</a>
     <a id="cadastrar" href="#" data-origem="<?php echo $_GET['id'] ?>" class="btn btn-success">Cadastrar</a>`;

    var footerUpdate = 
    `<a href="#" class="btn btn-success" id="atualizar-arquivo">Enviar</a>`;
  </script> 
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark  toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
        <div class="sidebar-brand-icon">
          
        </div>
        <p>FAPI</p>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-newspaper"></i>
          <span>Gerir Notícias</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gerir-paginas.php">
          <i class="far fa-file"></i>
          <span>Gerir Páginas</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Gerir Tabelas</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tabelas:</h6>
            <a class="collapse-item" href="clubes-filiados">Clubes Filiados</a>
            <a class="collapse-item" href="atletas-filiados">Atletas Filiados</a>
            <a class="collapse-item" href="arbitros-filiados">Árbitros Filiados</a>
            <a class="collapse-item" href="ranking">Ranking</a>
            <a class="collapse-item" href="recordes">Recordes</a>
            <a class="collapse-item" href="campeonatos">Campeonatos</a>
            <a class="collapse-item" href="competicoes">Lista de Competições</a>
            <a class="collapse-item" href="treinadores">Treinadores</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="notas">
          <i class="fas fa-sticky-note"></i>
          <span>Notas</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="envio-de-arquivos">
          <i class="fas fa-upload"></i>
          <span>Envio de Arquivos</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="solicitacoes">
        <i class="fas fa-star"></i>
          <span>Solicitações</span></a>
      </li>
      <!-- End Menu -->


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nome['nome'] . ' '. $nome['sobrenome'];?></span>
                <img class="img-profile rounded-circle" src="../img/admin.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php 
            if(isset($_SESSION['sucesso_update'])):
          ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              <strong>Nota Atualizada com sucesso!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php 
            endif;
            unset($_SESSION['sucesso_update']);
          ?>
          <form method="POST" id="editor" action="../vendor/admin/cadastro_nota.php">
            <h3 class="text-gray-900" style="text-align: center;"><?php echo $titulo ?></h3>
            <div class="form-group">
              <label for="">Nota</label>
              <input type="text" name="nota" value="<?php if (isset($nota['nota'])) echo $nota['nota']?>"
                class="form-control" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Título</label>
              <input type="text" name="titulo" value="<?php if (isset($nota['titulo'])) echo $nota['titulo']?>"
                class="form-control" id="" aria-describedby="helpId" placeholder="">
            </div>
            <input type="hidden" name="ano" value="<?php echo date('Y') ?>">

          <!-- Documentos -->
            <div class="mt-4 mb-4">
              <h5 class="text-gray-900" style="text-align: center;">Documentos</h5>
            </div>
            <table class="table tabela-editavel">
              <thead class="thead-light">
                <tr>
                  <th scope="col" style="text-align: center; width: 50vw;">Arquivo</th>
                  <th scope="col">Data</th>
                  <th scope="col">PDF</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if (isset($result_documentos)) {
                  while($documentos = mysqli_fetch_assoc($result_documentos)):
                ?>
                <tr>
                  <td <?php echo "data-id='". $documentos['id_arquivo'] . "' data-col='nome'" ?>><?php echo $documentos['nome'] ?></td>
                  <td <?php echo "data-id='". $documentos['id_arquivo'] . "' data-col='data'" ?>><?php echo data($documentos['data']) ?></td>
                  <th>
                  <?php ;
                  if (isset($documentos['arquivo'])): 
                    if($documentos['arquivo'] != ''):
                      $documento = "../files/documents/" . $documentos['arquivo'];
                  ?>
                      <a class="btn btn-primary view-document" href="<?php echo "../files/documents/" . $documentos['arquivo'] ?>"><i class="fas fa-file-pdf"></i></a>
                      <a class="btn btn-danger unset-file" <?php echo "data-arquivo='" . $documentos['arquivo'] . "' data-id='" .  $documentos['id_arquivo'] . "'" ?> href="#">Excluir</a>
                  <?php else:; ?>
                  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" id="update" <?php echo "data-id='" . $row_tabela['id'] ."'" ?> data-toggle="modal" data-target="#modalCadastro">
                      Abrir
                    </button>
                  <?php endif; endif; ?>
                  </th>
                </tr>
                <?php
                  endwhile;
                  }
                ?>
              </tbody>
            </table>

        <!-- Modal de cadastro de arquivos -->
        <button type="button" class="btn btn-success mt-4" id="cadastro" data-toggle="modal" data-target="#modalCadastro">
          Inserir Arquivo
        </button>

        <div class="row d-flex justify-content-center">
          <button type="submit" onClick="doEnviar()" class="btn btn-primary">Atualizar</button>
        </div>
        
        </form>
        <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modal-cadastro-titulo"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body" id="modal-cadastro-body">

              </div>
              <div class="modal-footer" id="modal-cadastro-footer">

              </div>
            </div>
          </div>
        </div>
        <!-- Fim de Modal de Cadastro de arquivos -->

        </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span><?php echo $copyright ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Preparado para sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Sair" abaixo se você está preparado para finalizar essa sessão.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../vendor/admin/logout.php">Sair</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!--script src="../js/ckeditor/ckeditor.js"></script-->
  <!--script src="../js/ckfinder/ckfinder.js"></script-->
  <script src="../js/modal_dinamico_notas.js"></script>
  <script src="../js/tabela-editavel.js"></script>
  <script src="../js/apagar_arquivo_relacionado.js"></script>
  <script src="../js/upload_file.js"></script>
</body>

</html>
