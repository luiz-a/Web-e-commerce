
<?php
session_start();


require_once "./functions/ControleProdutos.php";
if(isset($_SESSION['logado'])){
  $logado = 1;
  $usuario = $_SESSION['nome'];
  $id_usuario=$_SESSION['id'];
 } else {
   $logado= 0;
}
?>

<script >
function confirmacao(){
     var resposta = confirm("Todas as informações serão apagadas.Deseja Continuar?");
     if (resposta == true) {
          window.location.href = "?pagina=logout";
     }
}
</script>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SuperMercado LWDS</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <style>
    .logo {
      margin: 0px 60px;
      font-family: Orkney;
      font-style: normal;
      font-weight: 300;
      font-size: 18px;
      line-height: 150%;
      display: flex;
      align-items: center;
      letter-spacing: 0.055em;
      color: #fff;
      mix-blend-mode: normal;
    }

    .logo>span {
      font-family: Orkney;
      font-style: normal;
      font-weight: 300;
      font-size: 18px;
      line-height: 150%;
      display: flex;
      align-items: center;
      letter-spacing: 0.055em;
      color: #F4D03F;
      mix-blend-mode: normal;
    }
  </style>
</head>


<nav class="navbar navbar-expand-sm navbar-dark fixed-top shadow" style="background:#17202a;">
        <a href="?pagina=home" class="navbar-brand logo">L<span>W</span>DS</a>
        <button class="navbar-toggler " data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                    <a href="#" class="nav-link btn mr-4 text-white" data-toggle="modal"
                        data-target="#staticBackdrop_produto">Produtos</a>
                </li>
                <?php if($logado == 1){ ?>
                <li class="nav-item ">
                    <a href="#" class="nav-link btn mr-4 text-white" onclick="confirmacao()" 
                        >Logout</a>
                </li>
                <?php }  ?>
                <?php if($logado == 0){ ?>
                <li class="nav-item ">
                    <a href="#" class="nav-link btn mr-4 text-white" data-toggle="modal"
                        data-target="#staticBackdrop_login">Login</a>
                </li>
                <?php } ?>
                <?php 
                    if($logado){ ?>
                    <a class="nav-link btn mr-4 text-white text-uppercase font-weight-bold"><?= $usuario ?></a>
                    <?php } else { ?>
                          <li class="nav-item ">
                          <a href="#" class="nav-link btn mr-4 text-white" data-toggle="modal"
                              data-target="#staticBackdrop_cadastro">Cadastro</a>
                      </li>

                      <?php } ?>
              </ul>
         </div>
    </nav>
<conteudo>
<?php
include_once("views/modal.php");
if(!isset($_GET['pagina'])){
  include_once ("views/home.php");
  } else {
    $pagina=$_GET['pagina'];
    if($pagina=="produtos"){
    include_once("views/produtos.php");
   }elseif ($pagina=="carrinho"){
    include_once("views/carrinho.php");
   }elseif($pagina =="cad_usuario"){
    include("views/cad_usuario.php");
   }elseif($pagina=="logout"){
    include_once("views/logout.php");
   }elseif($pagina=="cad_produtos") {
    include_once("views/cad_produtos.php");
   }elseif($pagina=="finalizar") {
    include_once("views/finalizar.php");
   }elseif($pagina=="pagamento") {
    include_once("views/pagamento.php");
   }
   else{
    include_once ("views/home.php");
    $_SESSION['url']="?pagina=home";
   }
   }
  
?>
</conteudo>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
</body>

</html>