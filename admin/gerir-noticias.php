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
?>

<!DOCTYPE html>
<html lang="pt_BR">

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

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
        <div class="sidebar-brand-icon">
          
        </div>
        <p>FAPI</p>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
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
        <div class="mt-4 mb-4">
          <h3 class="text-gray-900" style="text-align: center;">Notícias</h3>
        </div>
        <?php 
          if(isset($_SESSION['sucesso'])):
        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Notícia apagada com sucesso!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
          endif;
          unset($_SESSION['sucesso']);
        ?>
        <?php 
          if(isset($_SESSION['falha'])):
        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Notícia apagada com sucesso!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
          endif;
          unset($_SESSION['falha']);
        ?>
        <?php 
          if(isset($_SESSION['erro'])):
        ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Selecione a notícia que deseja apagar.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
          endif;
          unset($_SESSION['erro']);
        ?>
        <?php 
          if(isset($_SESSION['noticia_invalida'])):
        ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Selecione uma notícia para ediar!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
          endif;
          unset($_SESSION['noticia_invalida']);
        ?>
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col" style="text-align: center;">Notícia</th>
              <th scope="col">Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              // Receber o número da página
              $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT) == 0 ? 1 : filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
              $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

              //setar itens por página
              $quantidade_resultados = 15;

              //Calcular início da vizualização
              $inicio = ($quantidade_resultados * $pagina) - $quantidade_resultados;

              $result_noticia = "SELECT * FROM noticia LIMIT $inicio, $quantidade_resultados";
              $resultado_noticias = mysqli_query($conexao, $result_noticia);

              while($row_noticia = mysqli_fetch_assoc($resultado_noticias)):
            ?>
            <tr>
              <th scope="row"><?php echo $row_noticia['id']?></th>
              <td><?php echo $row_noticia['titulo']?></td>
              <td>
                <div class="row">
                  <a href="<?php echo "../noticia?id=" . $row_noticia['id'] ?>"class="btn btn-primary mr-2">Vizualizar</a>
                  <a href="<?php echo "editor?noticia=" . $row_noticia['id'] ?>" class="btn btn-warning mr-2">Editar</a>
                  <a href="<?php echo "../vendor/admin/apagar_noticia?id=" . $row_noticia['id'] ?>" class="btn btn-danger">Apagar</a>
                </div>
              </td>
            </tr>
            <?php
              endwhile;
            ?>
          </tbody>
        </table>

        <?php 
          $result_pg = "SELECT COUNT(id) AS num_result FROM noticia";
          $resultado_pg = mysqli_query($conexao, $result_pg);
          $row_pg = mysqli_fetch_assoc($resultado_pg);
          
          // Quantidade de páginas
          $quantidade_paginas = ceil($row_pg['num_result'] / $quantidade_resultados);

          // Limitar os links antes e depois
          $maximo_links = 2;
          for($pag_ant = $pagina - $maximo_links; $pag_ant <= $pagina - 1; $pag_ant++):   
            if ($pag_ant >= 1) :
        ?>
            <a class='mr-2 btn btn-primary' href='<?php echo "dashboard.php?pagina=$pag_ant" ?>'><?php echo "$pag_ant" ?></a>
        <?php 
            endif;
          endfor;

          if ($pagina_atual >= 1):  
        ?>
            <div class='mr-2 btn btn-primary active' style="cursor: default"><?php echo "$pagina_atual" ?></div>
        <?php 
          endif;

          for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $maximo_links; $pag_dep++):
            if ($pag_dep <= $quantidade_paginas) :
        ?>
            <a class='btn btn-primary' href='<?php echo "dashboard.php?pagina=$pag_dep" ?>'><?php echo "$pag_dep" ?></a>
        <?php 
            endif;
          endfor;
        ?>

        </br>
        <a href="editor.php" class="mt-4 btn btn-success">Criar</a>
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
</body>

</html>
