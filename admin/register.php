<?php
  session_start();
  include('../vendor/admin/conexao.php');
  include('../vendor/admin/verifica_login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cadastro - FAPI</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crie uma Conta!</h1>
              </div>
              <?php 
                if(isset($_SESSION['status_cadastro'])):
              ?>
              <!-- Mensagem de sucesso -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Usuário cadastrado com sucesso!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php 
                endif;
                unset($_SESSION['status_cadastro']);
              ?>
              <?php 
                if(isset($_SESSION['campos'])):
              ?>
              <!-- Mensagem de alerta -->
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Preencha todos os campos antes de prossegir!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php 
                endif;
                unset($_SESSION['campos']);
              ?>
              <?php 
                if(isset($_SESSION['usuario_existe'])):
              ?>
              <!-- Menagem de Erro -->
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong>Usuário já cadastrado!</strong> Tente novamente com outro endereço de email.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php 
                endif;
                unset($_SESSION['usuario_existe']);
              ?>
              <form class="user" method="POST" id="cadastro" action="cadastro.php">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="nome" name="nome" placeholder="Nome">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="sobrenome" name="sobrenome" placeholder="Sobrenome">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Endereço de E-mail">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" required class="form-control form-control-user" id="senha" name="senha" placeholder="Senha">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="senharepetida" placeholder="Repita a senha">
                  </div>
                </div>
                <a href="login.html" onClick="document.getElementById('cadastro').submit(); return false;" class="btn btn-primary btn-user btn-block">
                  Registrar Conta
                </a>
                
                <!-- <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Esqueceu a senha?</a>
              </div>
              <div class="text-center">
                <a class="small" href="index.php">Já possui uma conta? Entre!</a>
              </div>
            </div>
          </div>
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
