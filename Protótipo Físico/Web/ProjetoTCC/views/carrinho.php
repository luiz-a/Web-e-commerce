<?php 
	require_once "./functions/ControleProdutos.php";
	require_once "./functions/cart.php";
	echo "<br><br><br>";
	$pdoConnection = require_once "conexao.php";
	$gmtDate = gmdate("D, d M Y H:i:s"); 

	
	$url = $_SESSION['url'];
	//$passagem = 0;
	if(isset($_GET['acao']) && in_array($_GET['acao'], array('add', 'del', 'up'))) {
		
		if($_GET['acao'] == 'add' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])){ 
			addCart($_GET['id'], 1);
           	
		}

		if($_GET['acao'] == 'del' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])){ 
			deleteCart($_GET['id']);
		}
		

		if($_GET['acao'] == 'up'){ 
			if(isset($_POST['prod']) && is_array($_POST['prod'])){ 
				foreach($_POST['prod'] as $id => $qtd){
						updateCart($id, $qtd);
				}
			
		}


			
		}
			
	}

	$resultsCarts = getContentCart($pdoConnection);
	$totalCarts  = getTotalCart($pdoConnection);


?>
	<div class="container">
		<h2>Pedidos  </h2>
		<?php 
		if($resultsCarts) : ?>
			<form action="?pagina=carrinho&acao=up" method="post">
			<table class="table table-strip">
				<thead>
					<tr>
						<th>Produto</th>
						<th>Quantidade</th>
						<th>Preço</th>
						<th>Subtotal</th>
						<th>Ação</th>

					</tr>				
				</thead>
				<tbody>
			 <?php	$_SESSION['dados']=array(); ?>
				  <?php foreach($resultsCarts as $result) : ?>
					<tr>
						
						<td><?php echo $result['name']?></td>
						<td>
							<input type="text" name="prod[<?php echo $result['id']?>]" value="<?php echo $result['quantity']?>" size="1" />
														
							</td>
						<td>R$<?php echo number_format($result['price'], 2, ',', '.')?></td>
						<td>R$<?php echo number_format($result['subtotal'], 2, ',', '.')?></td>
					    <td><a href="?pagina=carrinho&acao=del&id=<?php echo $result['id']?>" class="btn btn-danger">Remover</a></td>
						
					</tr>
					<?php
					array_push(
					  $_SESSION['dados'],
					  array(
						  'id_produto' => $result['id'],
						  'quantidade' => $result['quantity'],
						  'preco' => $result['price'],
						  )	
					);
				?>
				<?php endforeach;?>
				 <tr>
					 <td colspan="3" class="text-right"><b>Total: </b></td>
					 <td>R$ <?php echo number_format($totalCarts, 2, ',', '.')?></td>
					 <?php $valor_total= number_format($totalCarts, 2, ',', '.')?>
				   
							
				 	<td></td>
				 </tr>
				</tbody>
				
			</table>

			 <a class="btn btn-info" href=<?= $url ?>>Continuar Comprando</a>&nbsp;&nbsp;
			 <button class="btn btn-primary" type="submit">Atualizar Carrinho</button></a>
			 <br><br>
			 <?php
			 if(isset($id_usuario)){
			  if(EncontraEndereco($id_usuario,$pdoConnection)){?>
			 <a class="btn btn-success" href="?pagina=finalizar">Finalizar Compra</a>
			 <?php } else { ?>
			 <a class="btn btn-success" data-toggle="modal"
                        data-target="#staticBackdrop_compra">Favor Cadastrar Endereço p/ Finalizar</a>
			 <?php }} ?>
           
              
			</form>
	<?php endif?>
	
	</div>
	

