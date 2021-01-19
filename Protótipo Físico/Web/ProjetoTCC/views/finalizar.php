<?php
$letra1= chr(rand(65,90));
$letra2= chr(rand(65,90));
$numero1 = rand(1,10);
$numero2 = rand(10,30);
$numero3 = rand(30,60);
$num_pedido = $letra1.$letra2.$numero1.$numero2.$numero3;
$id_usuario= $_SESSION['id'];
foreach($_SESSION['dados'] as $produtos){
  $conexao = new PDO('mysql:host=localhost;dbname=lwds',"root","");
  $insert = $conexao -> prepare("INSERT INTO pedidos () VALUES(NULL,?,?,?,?,?,?)");
  $insert -> bindParam(1,$id_usuario);
  $insert -> bindParam(2,$num_pedido);
  $insert -> bindParam(3,$produtos['id_produto']);
  $insert -> bindParam(4,$produtos['quantidade']);
  $insert -> bindParam(5,$produtos['preco']);
  $total = $produtos['quantidade'] * $produtos['preco'];
  $insert -> bindParam(6,$total);
  $insert -> execute();
}
$_SESSION['pedido'] = $num_pedido;
echo "<meta http-equiv=refresh content='0;URL=?pagina=pagamento'>";
?>