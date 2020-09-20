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

  $titulo = empty($_GET['noticia']) ? "Inserir" : "Editar";
  $id = filter_input(INPUT_GET, 'noticia', FILTER_SANITIZE_NUMBER_INT);
    
  if ($id != 0) {
    $query = "SELECT * FROM noticia WHERE id = $id";
    $result = mysqli_query($conexao, $query);
    $noticia = mysqli_fetch_assoc($result);

    
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
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
        formulario.action = "../vendor/admin/cadastro_noticia.php"+ parsGet;
        
        //envia o formulário
        formulario.submit();
    }
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
              <strong>Notícia Atualizada com sucesso!</strong>
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
              <strong>Notícia cadastrada com sucesso!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php 
            endif;
            unset($_SESSION['sucesso_insert']);
          ?>
          <?php 
            if(isset($_SESSION['img_apagada'])):
          ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Imagem apagada com sucesso!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php 
            endif;
            unset($_SESSION['img_apagada']);
          ?>
          <form method="POST" id="editor" enctype="multipart/form-data" action="../vendor/admin/cadastro_noticia.php">
            <h3 class="text-gray-900" style="text-align: center;"><?php echo $titulo ?></h3>
            <div class="form-group">
              <label for="">Título</label>
              <input type="text" name="titulo" value="<?php if (isset($noticia['titulo'])) echo $noticia['titulo']?>"
                class="form-control" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Autor</label>
              <input type="text" name="autor" value="<?php if (isset($noticia['autor'])) echo $noticia['autor']?>"
                class="form-control" id="" aria-describedby="helpId" placeholder="">
            </div>
            <!-- <label for="" class="mt-2">Imagem</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Enviar</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="imagem" id="inputGroupFile01"
                  aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01"></label>
              </div>
            </div> -->
            <?php 
            if (isset($noticia['imagem'])):
              if ($noticia['imagem'] != ''):
                $imagem = "../files/images/" . $noticia['imagem'];
            ?>
              <!-- Show Image -->
              <label for="">Imagem</label>
              <div class="row">
                <button type="button" class="ml-2 btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">
                  Apagar Imagem
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Deseja apagar a imagem?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Não é possível reverter essa operação
                      </div>
                      <div class="modal-footer">
                        <a href="<?php echo "../vendor/admin/cadastro_noticia.php?imagem=" . $noticia['imagem'] . "&id=" . $noticia['id']?>" class="ml-3 btn btn-danger">Sim</a>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <img class="mt-2 img img-fluid" src="<?php echo "../files/images/". $noticia['imagem']?>" alt=""><br/>
            <?php 
              else:
            ?>
              <label for="">Imagem</label>
              <div class="custom-file">
                <input type="file" name="imagem" class="custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile">Selecione uma imagem</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
            <?php
              endif;
            else:
            ?>
              <label for="" >Imagem</label>
              <div class="custom-file">
                <input type="file" name="imagem" class="custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile">Selecione uma imagem</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
            <?php 
              endif;
            ?>
            <label for="texto" class="mt-4">Conteúdo</label></br>
            <textarea name="texto" id="texto">
              <?php if(isset($noticia['corpo_noticia'])) echo $noticia['corpo_noticia'];?>
            </textarea><br/>

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
