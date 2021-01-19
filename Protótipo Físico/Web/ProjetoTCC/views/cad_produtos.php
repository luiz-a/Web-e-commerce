<?php
$conexao = require_once "./conexao.php";
$url= $_SESSION['url'];
$extensoes_validas=array(".doc",".pdf",".zip",".rar",".docx",".txt",".php",".ttf",".jpg",".JPG",".PNG",".png",".alg",".ALG");
$nome_arquivo=$_FILES['foto']['name'];
$tamanho_arquivo=$_FILES['foto']['size'];
$temporario_arquivo=$_FILES['foto']['tmp_name'];
$nome=$_POST['nome'];
$categoria=$_POST['categoria'];
$valor=$_POST['valor'];
$quantidade = $_POST['quantidade'];
$numero=Rand(1,200);
$novo_arquivo = $numero.$nome_arquivo;
//echo $ext = strrchr($nome_arquivo,'.');
$novo_arquivo = preg_replace('[\s+]','', $novo_arquivo);
if(move_uploaded_file($temporario_arquivo,"./img/$novo_arquivo")){
    $sql = "INSERT INTO produtos (nome,categoria,preco,quantidade,imagem)  VALUES(:nome,:categoria,:valor,:quantidade,:imagem)";
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':nome', $nome);
    $stm->bindValue(':categoria', $categoria);
    $stm->bindValue(':valor', $valor); 
    $stm->bindValue(':quantidade', $quantidade); 
    $stm->bindValue(':imagem', $novo_arquivo); 
    $retorno = $stm->execute();

if ($retorno){
  echo "<br><br><br><div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
 echo "<meta http-equiv=refresh content='3;URL=?pagina=$url'>";
}else{
 echo "<br><br><br><div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
 echo "<meta http-equiv=refresh content='3;URL=?pagina=$url'>";
}
}