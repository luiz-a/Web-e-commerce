<?php
$conexao = require_once "./conexao.php";
$url= $_SESSION['url'];
echo "<br><br><br>";
  echo "<br><br><br>";
  echo "<br><br><br>";
  echo $acao = $_POST['acao'];
if(isset($_POST['acao'])){
echo $acao = $_POST['acao'];

if($acao == 1 ){
$nome=$_POST['nome'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$senha_Confirma = $_POST['senha_confirma'];
  if ($senha == $senha_Confirma) {
  $sql = 'INSERT INTO usuarios (nome, email, senha)VALUES(:nome, :email, :senha)';
  $stm = $conexao->prepare($sql);
  $stm->bindValue(':nome', $nome);
  $stm->bindValue(':email', $email);
  $stm->bindValue(':senha', $senha);
  $retorno = $stm->execute();
  if ($retorno){ ?>
    <div class="jumbotron jumbotron-fluid"> 
    <div class="container">
      <h1 class="display-4 text-center">Cadastro com Êxito</h1>
      <p class="lead text-center">Aguarde Redirecionando !!!</p>
    </div>
  </div>
  <?php
    } else {
      echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
    }
    echo "<meta http-equiv=refresh content='3;URL=?pagina=home'>";

} elseif ($senha_Confirma == "") {
  echo"<div class='alert alert-danger text-center h2' role='alert'>Confirme sua senha</div>";
} else {
   echo "<div class='alert alert-danger text-center h2' role='alert'> As senhas não conferem!</div>";
}
}
echo "<meta http-equiv=refresh content='3;URL=?pagina=home'>";


if($acao == 2 ){
   
  $email=$_POST['email'];
  $senha=$_POST['senha'];
  $sql = "SELECT id,nome FROM usuarios WHERE email = :email AND senha = :senha" ;
  $stm = $conexao->prepare($sql);
  $stm->bindValue(':email', $email);
  $stm->bindValue(':senha', $senha);
  $stm->execute();
  $contagem = $stm ->fetchColumn();
  if($contagem > 0 ){
    $stm->execute();
    $dados = $stm -> fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['logado'] = 1;
     foreach($dados as $dado):
      $_SESSION['id']= $dado['id'];
      $_SESSION['nome']= $dado['nome'];
     endforeach;
  ?>
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4" align=center>Login com Êxito</h1>
    <p class="lead" align=center>Aguarde Redirecionando !!!</p>
  </div>
</div>
<?php
 echo "<meta http-equiv=refresh content='2;URL=$url'>";
  } else { 
    $_SESSION['id']= " ";?>
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4" align=center>ERRO DE LOGIN</h1>
    <p class="lead" align=center>Aguarde Redirecionando !!!</p>
  </div>
</div>
<?php
 echo "<meta http-equiv=refresh content='3;URL=$url'>";
}
}

if($acao == 3 ){
$uf= $_POST['uf'];
$municipio = $_POST['cidade'];
$bairro = $_POST['bairro'];
$logradouro = $_POST['rua'];
$numero = $_POST['numero'];
$cep=$_POST['cep'];
$sql = 'INSERT INTO endereco (cep, logradouro, numero, bairro, municipio, uf) VALUES (:cep,:logradouro, :numero, :bairro, :municipio, :uf)';

$stm = $conexao->prepare($sql);
$stm->bindValue(':cep', $cep);
$stm->bindValue(':logradouro', $logradouro);
$stm->bindValue(':numero', $numero);
$stm->bindValue(':bairro', $bairro);
$stm->bindValue(':municipio', $municipio);
$stm->bindValue(':uf', $uf);
$retorno = $stm->execute();
$ultimo = $conexao -> lastInsertId();
$id_usuario = $_SESSION['id'];
$sql1= 'UPDATE usuarios SET id_endereco = :id_endereco  where id= :id_usuario ';
$stm1 = $conexao->prepare($sql1);
$stm1->bindValue(':id_endereco', $ultimo);
$stm1->bindValue(':id_usuario', $id_usuario);
$retorno1 = $stm1->execute();
if (($retorno) && ($retorno1)){ ?>
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 text-center">Atualização com Êxito</h1>
    <p class="lead text-center">Aguarde Redirecionando !!!</p>
  </div>
</div>
<?php
}else{ ?>
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 text-center">Erro na Atualização</h1>
    <p class="lead text-center">Aguarde Redirecionando !!!</p>
  </div>
</div>
<?php
}
$url = "carrinho";
echo "<meta http-equiv=refresh content='3;URL=?pagina=$url'>";
}
} 
?>