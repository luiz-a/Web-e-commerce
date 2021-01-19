<?php

echo "<br><br><br><br><br><br>";
$pedido = $_SESSION['pedido'];
echo  "Ola ".$_SESSION['nome']."<br>";
echo "Seu pedido é o código: ".$_SESSION['pedido']."<br>";
$id_usuario = $_SESSION['id'];
$conexao = new PDO('mysql:host=localhost;dbname=lwds',"root","");
$ver_id_endereco = $conexao -> prepare("SELECT id_endereco FROM usuarios where id= ?");
$ver_id_endereco  -> bindParam(1,$id_usuario);
$ver_id_endereco  -> execute();
$encontrado = $ver_id_endereco ->fetch();
$id_endereco = $encontrado['id_endereco'];

$ver_endereco =  $conexao -> prepare("SELECT * FROM endereco where id_endereco= ?");
$ver_endereco  -> bindParam(1,$id_endereco);
$ver_endereco  -> execute();
$encon_endereco = $ver_endereco ->fetch();
echo "Logradouro :".$encon_endereco['logradouro']."<br>";
echo "Número :".$encon_endereco['numero']."<br>";
echo "Bairro :".$encon_endereco['bairro']."<br>";
echo "CEP :".$encon_endereco['cep']."<br>";
echo "Município :".$encon_endereco['municipio']."<br>";
echo "Estado :".$encon_endereco['uf']."<br>";



$pesquisa = $conexao -> prepare("SELECT * FROM pedidos where cod_pedido= ?");
$pesquisa -> bindParam(1,$pedido);
$pesquisa -> execute();
while ($encontrado = $pesquisa->fetch()) {
    echo $encontrado['quantidade']."    ";
    echo $encontrado['preco']."   ";
    echo $encontrado['total']."  ";
    echo "<br>";
}