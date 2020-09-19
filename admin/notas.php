<?php
    session_start();
    // Verifica se o usuário está logado
    include('verifica_login.php');
    include('conexao.php');
    include('../var/variaveis.php');
  
    //Identifica o usuário logado de acordo com a base de dados.
    $query = "SELECT nome, sobrenome FROM usuario WHERE usuario = '{$_SESSION['usuario']}'";
  
    $resultado = mysqli_query($conexao, $query);
  
    $nome = mysqli_fetch_assoc($resultado);
    
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

  <title>Administrativo FAPI - Notas</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <script>
    var tabela = "arquivos_notas";
    var coluna_origem = "id_nota";
    var tabela_relacionada = "notas_has_arquivos";
    var id_origem = "<?php echo $_GET['id'] ?>";
    var campos_relacionamento = ['id_nota', 'id_arquivo'];
    var all = '';
    var coluna_id = "id_arquivo";

  </script>
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

      <li class="nav-item active">
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
        <?php 
          $query_notas = "SELECT * FROM notas";
          $result_notas = mysqli_query($conexao, $query_notas);

          $query_documentos_notas = "";
        ?>
        <div class="container-fluid">
        <div class="mt-4 mb-4">
          <h3 class="text-gray-900" style="text-align: center;">Notas Oficiais</h3>
        </div>
        <?php 
          if(isset($_SESSION['sucesso'])):
        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Nota apagada com sucesso!</strong>
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
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Falha ao apagar nota!</strong>
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
            <strong>Selecione a nota que deseja apagar.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
          endif;
          unset($_SESSION['erro']);
        ?>
        <?php 
          if(isset($_SESSION['nota_invalida'])):
        ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Selecione uma nota para ediar!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
          endif;
          unset($_SESSION['nota_invalida']);
        ?>
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col" style="text-align: center;">Nota</th>
              <th scope="col">Título</th>
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

              $result_nota = "SELECT * FROM notas LIMIT $inicio, $quantidade_resultados";
              $resultado_notas = mysqli_query($conexao, $result_nota);

              while($row_nota = mysqli_fetch_assoc($resultado_notas)):
            ?>
            <tr>
              <th scope="row"><?php echo $row_nota['id_nota']?></th>
              <td><?php echo $row_nota['nota']?></td>
              <td><?php echo $row_nota['titulo']?></td>
              <td>
                <div class="row">
                  <a href="<?php echo "../notas-oficiais" ?>"class="btn btn-primary mr-2">Vizualizar</a>
                  <a href="<?php echo "editor-notas?id=" . $row_nota['id_nota'] ?>" class="btn btn-warning mr-2">Editar</a>
                  <a href="<?php echo "apagar_nota?id=" . $row_nota['id_nota'] ?>" class="btn btn-danger">Apagar</a>
                </div>
              </td>
            </tr>
            <?php
              endwhile;
            ?>
          </tbody>
        </table>
        
        <!-- Início Paginação -->
        <div class="row mt-4 d-flex justify-content-center">
          <nav aria-label="Navegação de página exemplo">
            <ul class="pagination">
        <?php 
          $result_pg = "SELECT COUNT(id_nota) AS num_result FROM notas";
          $resultado_pg = mysqli_query($conexao, $result_pg);
          $row_pg = mysqli_fetch_assoc($resultado_pg);
          
          // Quantidade de páginas
          $quantidade_paginas = ceil($row_pg['num_result'] / $quantidade_resultados);

          // Limitar os links antes e depois
          $maximo_links = 2;
          for($pag_ant = $pagina - $maximo_links; $pag_ant <= $pagina - 1; $pag_ant++):   
            if ($pag_ant >= 1) :
        ?>
            <li class="page-item"><a class='page-link' href='<?php echo "notas?pagina=$pag_ant" ?>'><?php echo "$pag_ant" ?></a></li>
        <?php 
            endif;
          endfor;

          if ($pagina_atual >= 1):  
        ?>
            <li class="page-item active"><a class='page-link' style="cursor: default"><?php echo "$pagina_atual" ?></a></li>
        <?php 
          endif;

          for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $maximo_links; $pag_dep++):
            if ($pag_dep <= $quantidade_paginas) :
        ?>
            <li class="page-item"><a class='page-link' href='<?php echo "notas?pagina=$pag_dep" ?>'><?php echo "$pag_dep" ?></a></li>
        <?php 
            endif;
          endfor;
        ?>
            </ul>
          </nav>
        </div>
        <!-- Fim Paginação -->

        </br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModal">
          Cadastrar
        </button>
        </div>
        </br>
        <!-- <a href="tabelas?id=" class="mt-4 btn btn-success">Criar</a> -->
        <!-- Button trigger modal -->
        </div>
      <!-- End of Main Content -->

      <!-- Modal de Cadasrtro-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="tabelas/cadastro_tabela" id="cadastro_tabela" method="post">
                  <div class="col-md-8" style="margin: auto;">
                    <div class="col">
                      Nota
                      <input class="col" name="nota" type="text" placeholder="Nota">
                    </div>
                    <div class="col">
                      Título
                      <input class="col" name="titulo" type="text" placeholder="Título">
                    </div>
                    <input class="col" name="ano" type="hidden" value="<?php echo date('Y') ?>">
                  </div>
              </div>
              <div class="modal-footer">
                <a type="button" href="#" class="btn btn-primary" data-dismiss="modal">Fechar</a>
                <button type="submit" href="#" id="cadastrar" class="btn btn-success">Avançar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Fim de modal de Cadastro -->

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
  <script src="../js/io_notas.js"></script>
  <script src="../js/apagar_arquivo_relacionado.js"></script>
</body>

</html>
