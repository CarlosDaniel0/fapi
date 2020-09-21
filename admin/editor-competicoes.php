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
    $query = "SELECT * FROM competicoes WHERE id = $id";
    $result = mysqli_query($conexao, $query);
    $pagina = mysqli_fetch_assoc($result);
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

  <title>Administrativo FAPI - Competiçoes</title>

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
        formulario.action = "../vendor/admin/script_competicoes.php"+ parsGet;
        
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
            if(isset($_SESSION['campos'])):
          ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Preencha os campos antes de enviar!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php 
            endif;
            unset($_SESSION['campos']);
          ?>
          <?php 
            if(isset($_SESSION['erro'])):
          ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Erro não for possível concluír a operação!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php 
            endif;
            unset($_SESSION['erro']);
          ?>
          <?php 
            if(isset($_SESSION['sucesso_update'])):
          ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              <strong>Página Atualizada com sucesso!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php 
            endif;
            unset($_SESSION['sucesso_update']);
          ?>
          <?php 
            if(isset($_SESSION['sucesso_insert'])):
          ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Competição cadastrada com sucesso!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php 
            endif;
            unset($_SESSION['sucesso_insert']);
          ?>
          <?php 
            if(isset($_SESSION['delete_doc'])):
          ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Documento apagada com sucesso!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php 
            endif;
            unset($_SESSION['delete_doc']);
          ?>
          <form method="POST" id="editor" action="../vendor/admin/script_competicoes.php" enctype="multipart/form-data">
            <h3 class="text-gray-900" style="text-align: center;"><?php echo $titulo ?></h3>
            <div class="form-group">
              <label for="">Competição</label>
              <input type="text" name="competicao" value="<?php if (isset($pagina['competicao'])) echo $pagina['competicao']?>"
                class="form-control" id="" aria-describedby="helpId" placeholder="">
            </div>
            Período da Competição
            <div class="form-row mt-2">
              <div class="col-md-6">
                <input type="date" name="periodo_de" class="form-control" id="" value="<?php if (isset($pagina['periodo_de'])) echo $pagina['periodo_de'] ?>">
              </div>
              <div class="col">
                <input type="date" name="periodo_ate" class="form-control" id="" value="<?php if (isset($pagina['periodo_ate'])) echo $pagina['periodo_ate'] ?>">
              </div>
            </div>
            Período de inscrição
            <div class="form-row mt-2">
              <div class="col-md-6">
                <input type="date" name="inscricoes_de" class="form-control" id="" value="<?php if (isset($pagina['inscricoes_de'])) echo $pagina['inscricoes_de'] ?>">
              </div>
              <div class="col">
                <input type="date" name="inscricoes_ate" class="form-control" id="" value="<?php if (isset($pagina['inscricoes_ate'])) echo $pagina['inscricoes_ate'] ?>">
              </div>
            </div>
            <input type="hidden" name="ano" value="<?php echo date('Y') ?>">
            <label for="cidade">Cidade</label>
            <select name="cidade"class="form-control" id="cidade">
            </select>
            <label for="">Resultado</label>
            <?php 
            // Abertura if de documento
            if (empty($pagina['documento'])) {  
            ?>
            <div class="custom-file">
              <input type="file" name="arquivo" class="custom-file-input" id="arquivo">
              <label class="custom-file-label" id="arquivo" for="arquivo">Escolher Arquivo...</label>
              <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
            <?php } else { ?>
              <div class="card">
                <div class="card-body">
                  <div class="col d-flex justify-content-center" style="width: 7rem;">
                    <a href="<?php echo "../files/documents/" . $pagina['documento'] ?>">
                      <div class="card-body">
                        <i class="fas fa-file-pdf" style="color: red; font-size: 6.5rem;"></i>
                        <p>Resultados</p>
                        <a href="<?php echo "../vendor/admin/script_competicoes?documento=" . $pagina['documento'] . "&id=" . $pagina['id'] ?>" class="btn btn-danger">Apagar</a>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            <?php } //Fechamento If de documento ?>

            <?php 
                if ($id == 0){
                  echo '<button type="submit" class="btn btn-success mt-4">Cadastrar</button>';
                }
                else{
                  echo "<button type='submit' onClick='doEnviar()' class='btn btn-primary mt-4'>Atualizar</button>";
                }
              ?>
          </form>
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
  <script>
      $(document).on('change', '.custom-file-input', function (event) {
        $(this).next('.custom-file-label').html(event.target.files[0].name);
      });

      $(function() {
        var atual = "<?php if(isset($pagina)) echo $pagina['cidade'] ?>";
        $.ajax({
            method: 'GET',
            url: 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/pi/distritos',
            success: function(data) {
                var resultado = '<option value="">Selecione...</option>';
                // Recece os dados da api e transforma em option
                data.forEach(cidade => {
                  if(cidade['nome'] + ' - PI' == atual) {
                    resultado += `<option value="${cidade['nome']} - PI" selected>${cidade['nome']} - PI</option>`
                  }
                  resultado += `<option value="${cidade['nome']} - PI">${cidade['nome']} - PI</option>`
                });
                $('#cidade').html(resultado);
            }
        });
    });
  </script>
</body>

</html>
