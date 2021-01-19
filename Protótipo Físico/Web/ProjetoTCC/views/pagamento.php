<?php
echo "<br><br>";
$pedido = $_SESSION['pedido'];
$nome = "Ola ".$_SESSION['nome']."<br>";
$saida = "Seu pedido é o código: ".$_SESSION['pedido']."<br>";
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
$rua = "Logradouro: ".$encon_endereco['logradouro']."<br>";
$num =  "Número: ".$encon_endereco['numero']."<br>";
$bai = "Bairro: ".$encon_endereco['bairro']."<br>";
$cep = "CEP: ".$encon_endereco['cep']."<br>";
$muni = "Município: ".$encon_endereco['municipio']."<br>";
$estado = "Estado: ".$encon_endereco['uf']."<br>";
$pesquisa = $conexao -> prepare("SELECT * FROM pedidos where cod_pedido= ?");
$pesquisa -> bindParam(1,$pedido);
$pesquisa -> execute();

?>
<div style="height: 100%; display: flex; justify-content: center; align-items: center;">
<div>
<h2 class="text-center"><?=$nome?></h2><br>
<p class="text-center"><?=$saida?></p><br>
<div class="modal fade" id="staticBackdrop_local" data-backdrop="static" data-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-dark">
                <h5 class="text-white text-center">Localização</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <table class="table table-striped table-dark" style="box-shadow: -10px 10px 10px rgba(0, 0, 0, 0.2);">
    
                <tbody>
                    <tr>
                    <th scope="col"><?=$rua?></th>
                    </tr>
                    <tr>
                    <th scope="col"><?=$num?></th>
                    </tr>
                    <tr>
                    <th scope="col"><?=$bai?></th>
                    </tr>
                    <tr>
                    <th scope="col"><?=$cep?></th>
                    </tr>
                    <tr>
                    <th scope="col"><?=$muni?></th>
                    </tr>
                    <tr>
                    <th scope="col"><?=$estado?></th>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-dismiss="modal"
                  style=" padding: 6px 16px; border-radius: 20px;">Fechar</button>
                  <button type="button" class="btn btn-secondary text-white" data-dismiss="modal"
                  style=" padding: 6px 16px; border-radius: 20px;"><img style="width: 80px; height: 60px" src="https://img2.gratispng.com/20180913/bjf/kisspng-market-font-product-logo-5b9a7529cd1118.92678997153684919384.jpg" alt="W3Schools.com"></button>
              </div>
          </div>
        </div>
        </div>
        <table class="table table-striped table-dark">
                <thead>
                    <tr>
                    <td>Produto</th>
                    <td>Qtde</th>
                    <td>Preço</th>
                    </tr>
                </thead>
                <tbody>
                 <?php 
                  $total_geral = 0;
                 while ($encontrado = $pesquisa->fetch()) {
                 ?>
                     <tr>
                     <?php
                         $ver_produto =  $conexao -> prepare("SELECT * FROM produtos  where id= ?");
                         $ver_produto  -> bindParam(1,$encontrado['id_produto']);
                         $ver_produto  -> execute();
                         $enproduto = $ver_produto ->fetch();

                     ?>
                     <td><?php echo $enproduto['nome'] ?></th>
                    <td><?php echo $encontrado['quantidade']  ?></th>
                    <?php  $valor_preco= number_format($encontrado['preco'], 2, ',', '.') ?>
                    <td><?php echo "R$ ".$valor_preco?></td>
                    </tr>
                    <tr>
                    <td>Valor da Compra</th>
                    <?php  $preco_total= number_format($encontrado['total'], 2, ',', '.') ;
                      $preco1 = $encontrado['total'];
                      $total_geral = $total_geral + $preco1;
                    ?>
                    <td colspan="2"><?php echo "R$ ".$preco_total?></td>
                    </tr>
                 <?php } ?>
                  <tr> <td colspan="3">Valor Total da Compra<strong><?php echo "   R$ ".number_format($total_geral,2,',','.')?></td></tr>
                </tbody>
                </table>
<div style= "display: flex; justify-content: center; align-items: center; ">
<a href="#" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop_local">Localização</a>
</div>
</div>
</div>
</div>
 
