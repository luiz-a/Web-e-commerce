<?php 
session_start();
require_once "./functions/ControleProdutos.php";
$pdoConnection = require_once "./conexao.php";
$products = getProducts($pdoConnection);
$total_registros = pegaTotal($pdoConnection);
//$_SESSION['url'] =  $_SERVER["REQUEST_URI"];
$_SESSION['url'] = arrumaUrl($_SERVER["REQUEST_URI"]);


/*************************   Configurações Para Paginação  ****************************************************************/
/* Recebe o número da página via parâmetro na URL */  
$pagina_atual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;  
$categoria = (isset($_GET['categ']) && is_numeric($_GET['categ'])) ? $_GET['categ'] : 1;  
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
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_products.css">
    <title>SuperMercados LWDS</title>
</head>
<script src="https://kit.fontawesome.com/c08786e8e8.js" crossorigin="anonymous"></script>

<body>
    <h2>L
        <span>W</span>DS
    </h2>
    <div class="prf">
        <div id="user" class="profile">
            <i class="fas fa-user-circle"></i>
            <div class="modal" id="modal">
                <div class="option" id="option">
                    <div class="close" id="btn_close">&times;</div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="firt">
        <div class="titulo">
            <h3>Ofertas</h3>
        </div>
        <div class="filtro">
            <button class="btn_filtro"><i class="fas fa-filter" style="margin-right: 10px; color: #fff;"></i>
                Filtro</button>
        </div>
    </div>
    <div class="second">
        <div class="barra_categoria">
        <a href="?pagina=produtos1&categ=1"><button id="tds" onclick="tds()">Todos</button></a>
        <a href="?pagina=produtos1&page=1&categ=2"><button id="carnes" onclick="carnes()">Carnes</button></a>
        <a href="?pagina=produtos1&page=1&categ=3"><button id="frios" onclick="frios()">Frios</button></a>
        <a href="?pagina=produtos1&page=1&categ=4"><button id="bebidas" onclick="bebidas()">Bebidas</button></a>
        <a href="?pagina=produtos1&page=1&categ=5"><button id="horti" onclick="horti()">Hortifruti</button></a>
            <input type="text" placeholder="Search" maxlength="30">
        </div>
    </div>
    <div class="third">
         <div class="container">
         <?php if (!empty($dados)): ?>  
         <?php foreach($dados as $produto):?>   
            <div class="prod">
                <div class="add" id="add" onclick="Adicionar1()">&#43;</div>
                    <div class="p prod01">
                        <img src="img/<?=$produto['foto']?>" alt="">
                        <label for="nome" class="prod_name"><?=$produto['nome']?></label><br>
                        <label for="valor" class="prod_value"><span style="font-size: 18px; color:#273746 ; font-weight: 200;">R$</span><?= $produto['valor'] ?><span style="font-size: 16px; font-weight: 100; color:#273746 ;">kg</span></label>
                        <button class="contador" id="cont1"><?= $produto['quantidade'] ?></button>
                    </div>
                <a href="?pagina=carrinho&acao=add&id=<?= $produto['id']?>"><div class="min">Comprar</div></a>
               </div>
            <?php endforeach;?>   
        </div>
         </div>
        <div align=center>    
        <a  href="?pagina=produtos1&&page=<?=$primeira_pagina?>" title="Primeira Página">Primeira</a>  
       <?php  
      /* Loop para montar a páginação central com os números */   
      for ($i=$range_inicial; $i <= $range_final; $i++):   
        $destaque = ($i == $pagina_atual) ? 'destaque' : '' ;  
        ?>  
      <a href="?pagina=produtos1&&page=<?=$i?>"><?php echo $i ?></a>  
      
      <?php endfor; ?>    
      <a href="?pagina=produtos1&&page=<?=$ultima_pagina?>">Última</a>   
     </div>   
        <?php endif ?>
    <script src="./js/pg_produtos.js"></script>
    <script src="./js/modal.js"></script>
</body>

</html>