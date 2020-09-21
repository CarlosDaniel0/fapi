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

  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
  if ($id != 0) {
    $query = "SELECT * FROM evento WHERE id_evento = $id";
    $result = mysqli_query($conexao, $query);
    $evento = mysqli_fetch_assoc($result);

    $query_distancias = "SELECT d.nome FROM distancia AS d
      INNER JOIN evento_has_distancia AS e ON (d.id_distancia = e.id_distancia)
      WHERE e.id_evento = 1";
  }

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

  <title>Administrativo FAPI - Visualizar Pérmit</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
        formulario.action = "../vendor/admin/cadastro_pagina.php"+ parsGet;
        
        //envia o formulário
        formulario.submit();
    }
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
          <h3 class="text-gray-900" style="text-align: center;">Visualizar</h3>

          <div class="card">
            <!-- Corpo -->
            <div class="card-body">
              <!-- Título -->
              <h4 class="text-dark">Evento</h4>
              <div class="col">
                <div class="row text-dark">
                  <b>Nome do Evento:</b>
                  <?php echo $evento['nome_evento'] ?>
                </div>
              </div>

              <!-- Cidade e data de realização -->
              <div class="row text-dark">
                <div class="col-md-7">
                  <b>Cidade:</b>
                  <?php echo $evento['cidade'] ?>
                </div>
                <div class="col">
                  <b>Data de realização:</b>
                  <?php echo data($evento['data_realizacao']) ?>
                </div>
              </div>
          
              <!-- Tipo de pérmit -->
              <div class="col">
                <div class="row text-dark">
                  <b>Tipo de Pérmit:</b>
                  <?php if($evento['classe'] == 'B') {
                    echo " CLASSE B (com resultados reconhecidos pela FAPI e CBAt)";
                  } else if ($evento['classe'] == 'C') {
                    echo " CLASSE C (apenas para cumprimento do CTB)";
                  } ?>
                </div>
              </div>

              <!-- Hora e Endereço -->
              <div class="row text-dark">
                <div class="col-md-7">
                  <b>Endereço do Local da Largada:</b>
                  <?php echo $evento['endereco'] ?>
                </div>
                <div class="col">
                  <b>Hora da Largada:</b>
                  <?php echo data($evento['hora']) ?>
                </div>
              </div>

               <!-- Número de atletas -->
               <div class="col text-dark">
                <div class="row">
                  <b>Número de Atletas:</b> 
                  <?php echo $evento['numero_atletas'] ?>
                </div>
              </div>

              <hr>

              <!-- Nome da Entidade e Número de atletas -->
              <h4 class="text-dark">Entidade</h4>
              <div class="row text-dark">
                <div class="col-md-7">
                  <b>Nome da entidade:</b>
                  <?php echo $evento['nome_entidade'] ?>
                </div>
                <div class="col">
                  <b>CNPJ:</b>
                  <?php echo $evento['cnpj'] ?>
                </div>
              </div>

              <!-- Nome e Telefone do Responsável pela entidade-->
              <div class="row text-dark">
                <div class="col-md-7">
                  <b>Nome do Responsável:</b>
                  <?php echo $evento['nome_responsavel'] ?>
                </div>
                <div class="col">
                  <b>Telefone:</b>
                  <?php echo $evento['telefone'] ?>
                </div>
              </div>
              
              <!-- Email do Responsável -->
              <div class="col text-dark">
                <div class="row">
                  <b>E-mail do responsável:</b> 
                  <?php echo $evento['email_responsavel'] ?>
                </div>
              </div>

              <hr>

              <!-- Nome do Responsável do Formulário -->
              <h4 class="text-dark">Responsável</h4>
              <div class="col text-dark">
                <div class="row">
                  <b>Nome do Responsável pelo Formulário:</b>
                  <?php echo $evento['nome_responsavel_formulario'] ?>
                </div>
              </div>
            </div>
            <!-- Footer -->
            <div class="card-footer">
              <h4 class="card-header text-dark">Arquivos</h4>
              <div class="row">
                <?php 
                $query_documentos = "SELECT a.nome FROM arquivos_eventos AS a
                INNER JOIN evento_has_arquivos AS e ON (a.id_arquivo = e.id_arquivo)
                WHERE e.id_evento = $id";
                $result_docs = mysqli_query($conexao, $query_documentos);

                while ($documento = mysqli_fetch_assoc($result_docs)) {
                if(isset($documento['nome'])) {
                ?>

                <div class="col-md-2">
                  <div class="card-body">
                    <i class="fas fa-file-pdf" style="color: red; font-size: 6.5rem;"></i>
                    <p><?php echo $documento['nome'] ?></p>
                    <a class="btn btn-primary" href="<?php echo "../files/uploads/" . $documento['nome'] ?>" download>Baixar</a>
                  </div>
                 </div>

                <?php 
                  } }
                ?>
              </div>
            </div>
          </div>
          <!-- <a href="#" class="btn btn-success mt-4">Enviar E-mail</a> -->
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
          <a class="btn btn-primary" href="logout.php">Sair</a>
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
  <script src="https://cdn.tiny.cloud/1/3k5ggk1wq314sjxtshxanxii7pm9kky1h8taepkvhvnhjvuy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="../js/tinymce-init.js"></script>
  <script>
        $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
  </script>
</body>

</html>
