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

  <title>Administrativo FAPI - Treinadores Filiados</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <script>
    function doEnviar() { //inicio da funcao
        //pega o formulário como elemento
        // var formulario = document.getElementById('cadastro_tabela');
        // formulario.submit();
    }

    var tabela = "treinadores";
    var coluna_id = "id"
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

      <li class="nav-item active">
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
            <a class="collapse-item active" href="treinadores">Treinadores</a>
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
          <h3 class="text-gray-900" style="text-align: center;">Treinadores Filiados</h3>
        </div>
        <?php 
          if(isset($_SESSION['sucesso_delet'])):
        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registro apagado com sucesso!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
          endif;
          unset($_SESSION['sucesso_delet']);
        ?>
        <?php 
          if(isset($_SESSION['falha_delet'])):
        ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Não foi possivel apagar o registro!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
          endif;
          unset($_SESSION['falha_delet']);
        ?>
        <?php 
          if(isset($_SESSION['erro_delet'])):
        ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Selecione um registro que deseja apagar.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
          endif;
          unset($_SESSION['erro_delet']);
        ?>
        <?php 
          if(isset($_SESSION['sucesso_insert'])):
        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registro cadastrado com sucesso!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
          endif;
          unset($_SESSION['sucesso_insert']);
        ?>
                <?php 
          if(isset($_SESSION['falha_insert'])):
        ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Não foi possível realizar o registro, tente novamente</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
          endif;
          unset($_SESSION['falha_insert']);
        ?>
        <table class="table tabela-editavel">
          <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">CBAt</th>
              <th scope="col" style="text-align: center;">Nome</th>
              <th scope="col">Categoria</th>
              <th scope="col">Entidade</th>
              <th scope="col">Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              // Receber o número da página
              $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT) == 0 ? 1 : filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
              $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

              //setar itens por página
              $quantidade_resultados = 10;

              //Calcular início da vizualização
              $inicio = ($quantidade_resultados * $pagina) - $quantidade_resultados;

              $result_tabela = "SELECT * FROM treinadores LIMIT $inicio, $quantidade_resultados";
              $resultado_tabelas = mysqli_query($conexao, $result_tabela);

              while($row_tabela = mysqli_fetch_assoc($resultado_tabelas)):
            ?>
            <tr>
              <th scope="row"><?php echo $row_tabela['id']?></th>
              <td <?php echo "data-id=". $row_tabela['id'] . " data-col=cbat" ?>><?php echo $row_tabela['cbat']?></td>
              <td <?php echo "data-id=". $row_tabela['id'] . " data-col=nome" ?>><?php echo $row_tabela['nome']?></td>
              <td <?php echo "data-id=". $row_tabela['id'] . " data-col=data_registro" ?>><?php echo data($row_tabela['data_registro']) ?></td>
              <td <?php echo "data-id=". $row_tabela['id'] . " data-col=entidade" ?>><?php echo $row_tabela['entidade']?></td>
              <th>
                <div class="row">
                  <a href="#" data-id="<?php echo $row_tabela['id'] ?>" class="btn btn-danger apagar-registro">Apagar</a>
                </div>
              </th>
            </tr>
            <?php
              endwhile;
            ?>
          </tbody>
        </table>

        <!-- Início da Paginação -->
        <div class="row mt-4 d-flex justify-content-center">
          <nav aria-label="Navegação de página exemplo">
            <ul class="pagination">
        <?php 
          $result_pg = "SELECT COUNT(id) AS num_result FROM treinadores";
          $resultado_pg = mysqli_query($conexao, $result_pg);
          $row_pg = mysqli_fetch_assoc($resultado_pg);
          
          // Quantidade de páginas
          $quantidade_paginas = ceil($row_pg['num_result'] / $quantidade_resultados);

          // Limitar os links antes e depois
          $maximo_links = 2;
          for($pag_ant = $pagina - $maximo_links; $pag_ant <= $pagina - 1; $pag_ant++):   
            if ($pag_ant >= 1) :
        ?>
            <li class="page-item"><a class='page-link' href='<?php echo "treinadores?pagina=$pag_ant" ?>'><?php echo "$pag_ant" ?></a></li>
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
            <li class="page-item"><a class='page-link' href='<?php echo "treinadores?pagina=$pag_dep" ?>'><?php echo "$pag_dep" ?></a></li>
        <?php 
            endif;
          endfor;
        ?>
            </ul>
          </nav>
        </div>
        <!-- Fim da Paginação -->

        </br>
        <!-- <a href="tabelas?id=" class="mt-4 btn btn-success">Criar</a> -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModal">
          Cadastrar
        </button>

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
                <form action="../vendor/admin/cadastro_tabela" id="cadastro_tabela" method="post">
                  <div class="col-md-8" style="margin: auto;">
                    <div class="col">
                      CBAt
                      <input class="col" name="cbat" type="text" placeholder="CBAt">
                    </div>
                    <div class="col">
                      Nome
                      <input class="col" name="nome" type="text"  placeholder="Nome">
                    </div>
                    <div class="col">
                      Data
                      <input class="col" name="data_registro" type="date">
                    </div>
                    <div class="col">
                      Entidade
                      <input class="col" name="entidade" type="text" placeholder="Entidade">
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <a type="button" href="#" class="btn btn-primary" data-dismiss="modal">Fechar</a>
                <button type="submit" href="#" id="cadastrar" class="btn btn-success">Cadastrar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
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
  <script src="../js/tabela-editavel.js"></script>
  <script src="../js/apagar_registro_tabela.js"></script>
  <script src="../js/inserir_registro_tabela.js"></script>
</body>

</html>
