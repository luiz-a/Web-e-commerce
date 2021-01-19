<?php 

require_once "./functions/ControleProdutos.php";
$pdoConnection = require_once "./conexao.php";
$products = getProducts($pdoConnection);
$total_registros = pegaTotal($pdoConnection);
$_SESSION['url'] = arrumaUrl($_SERVER["REQUEST_URI"]);

/*************************   Configurações Para Paginação  ****************************************************************/
/* Recebe o número da página via parâmetro na URL */  
$pagina_atual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;  
//$categoria = (isset($_GET['categ']) && is_numeric($_GET['categ'])) ? $_GET['categ'] : 0;  
if(!isset($_GET['categ'])){
    $_GET['categ'] =0;
    $categoria=0;
} else {
    $categoria=$_GET['categ'];
}
/* Calcula a linha inicial da consulta */  
$linha_inicial = ($pagina_atual -1) * QTDE_REGISTROS;  
$dados = CarregapProdutos($pdoConnection,$linha_inicial,$categoria);
$range_inicial =1;  
/* Idêntifica a primeira página */  
$primeira_pagina = 1; 
/* Cálcula qual será a última página */  
$ultima_pagina  = ceil($total_registros / QTDE_REGISTROS);   
/* Cálcula qual será a página anterior em relação a página atual em exibição */   
$pagina_anterior = ($pagina_atual > 1) ? $pagina_atual -1 :   
/* Cálcula qual será a pŕoxima página em relação a página atual em exibição */   
$proxima_pagina = ($pagina_atual < $ultima_pagina) ? $pagina_atual +1 : 
/* Cálcula qual será a página inicial do nosso range */    
$range_inicial  = (($pagina_atual - RANGE_PAGINAS) >= 1) ? $pagina_atual - RANGE_PAGINAS : 1 ;   
/* Cálcula qual será a página final do nosso range */    
$range_final   = (($pagina_atual + RANGE_PAGINAS) <= $ultima_pagina ) ? $pagina_atual + RANGE_PAGINAS : $ultima_pagina ;
/****************************************************************************************************************** */
?>   
   <style>
        .titulo {
            font-family: Orkney;
            font-style: normal;
            font-weight: 500;
            font-size: 24px;
            line-height: 150%;

            text-align: center;
            letter-spacing: 0.055em;

            color: #EAC52F;

            margin-top: 120px;
        }

        .row [class*="col"] {
            padding: 1rem;
            background-color: #F4EEEE;
            color: #fff;
            text-align: center;
            box-shadow: -10px 10px 10px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
        }

        .img {
            width: 200px;
            height: 160px;
        }
    </style>

</head>
    <h2 class="titulo">Ofertas</h2>
    <div style="display: flex; justify-content: center; align-items: center;">
        <ul class="nav justify-content-between nav-tabs mt-5" style="width: 80%; ">
            <li class="nav-item">
                <a class="nav-link active" href="?pagina=produtos&page=1&&categ=0" style="color: #17202a;">Todos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?pagina=produtos&page=1&&categ=4" style="color:#17202a ; font-weight: lighter;">Hortifruti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?pagina=produtos&page=1&&categ=1" style="color:#17202a; font-weight: lighter;">Carne</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?pagina=produtos&page=1&&categ=2" style="color:#17202a; font-weight: lighter;">Frios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"href="?pagina=produtos&page=1&&categ=3" style="color:#17202a ; font-weight: lighter;">Bebidas</a>
            </li>
        </ul>
    </div>
    <div class="container-md">
        <div class="row">
    
        <?php if (!empty($dados)): ?>  
    <?php //************************* Mostra a lista de Produtos ******************************************************* */ ?>
        
       <?php 
        $cont = 0;
       foreach($dados as $produto):
          $cont++;
        ?>  
          
            <div class="col-sm m-5 p-3">
                <img src="./img/<?=$produto['imagem'] ?>" class="img-responsive img" alt="Responsive image">
                <br>
                <label for="" class="text-dark font-weight-bold"><?=$produto['nome']?></label><br>
                <label for="" class="font-weight-bold h5" style="color: #15355a;"><span
                 class="font-weight-normal h5">R$ </span><?=number_format($produto['preco'], 2, ',', '.') ?></label><br>
                
                 <a href="?pagina=carrinho&acao=add&id=<?=$produto['id']?>"> <button class="btn w-100 btn btn-success mt-3 rounded-pill">Comprar</button></a>
            </div>
            <?php endforeach;
            $cont;
            if(($cont < 6) && ($cont>3)){
              $total = 6 - $cont;
            for($i = 1;$i <=$total;$i++) { 
           echo "<div class='col-sm m-5 p-3'>";
           echo "</div>";  
            }  } ?>
          
    <?php //***************************************************************************************************************** */ ?>
          </div>
    </div>

    <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
       <?php for ($i=$range_inicial; $i <= $range_final; $i++){ ?>
	   <div class="btn-group mr-2" role="group">
       <a href="?pagina=produtos&&page=<?=$i?>&&categ=<?=$_GET['categ']?>"><button type="button" class="btn btn-secondary" style="background: #1F618D ; border: none;"><?php echo $i ?></button></a>
       </div>
       <?php } ?>  
     <?php endif ?>
	  </div>
  
</body>

</html>