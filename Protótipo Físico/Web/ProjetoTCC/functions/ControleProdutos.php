<?php 

define('QTDE_REGISTROS', 6);   
define('RANGE_PAGINAS', 2); 

function getProducts($pdo){
	$sql = "SELECT *  FROM produtos ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductsByIds($pdo, $ids) {
	$sql = "SELECT * FROM produtos WHERE id IN (".$ids.")";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function CarregapProdutos($pdo,$linha_inicial,$categoria){
	if($categoria == 0 ){
	$sql = "SELECT * FROM produtos LIMIT {$linha_inicial}, " . QTDE_REGISTROS;
    } else {
	$sql = "SELECT * FROM produtos where categoria = $categoria LIMIT {$linha_inicial}, " . QTDE_REGISTROS;
	}
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

function pegaTotal($pdo){
	$sql = "SELECT COUNT(*) AS total_registros FROM produtos"; 
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$count = $stmt->fetchColumn();
	return $count;
}

function arrumaUrl($url){
	$tamanho = strlen($url);
	$url = substr($url,12,$tamanho);
	return $url;
	   
}
if(isset($_SESSION['id'])){
  function EncontraEndereco($id_usuario,$pdo){
  $sql = "SELECT id_endereco FROM usuarios where id = $id_usuario";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $count = $stmt->fetchColumn();
  if($count == 0){
	$resultado = false;
  }else {
	$resultado = true;
  }
  return $resultado;
}
}