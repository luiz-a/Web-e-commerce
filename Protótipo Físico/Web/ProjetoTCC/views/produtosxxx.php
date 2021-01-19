<?php 
 /* Constantes de configuração */  
 define('QTDE_REGISTROS', 8);   
 define('RANGE_PAGINAS', 1);   
   
 /* Recebe o número da página via parâmetro na URL */  
 $pagina_atual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;   
   
 /* Calcula a linha inicial da consulta */  
 $linha_inicial = ($pagina_atual -1) * QTDE_REGISTROS;  
   
 /* Cria uma conexão PDO com MySQL */  
 $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');  
 $pdo = new PDO("mysql:host=localhost; dbname=lwds", "root", "", $opcoes);  
   
 /* Instrução de consulta para paginação com MySQL */  
 $sql = "SELECT * FROM produto LIMIT {$linha_inicial}, " . QTDE_REGISTROS;  
 $stm = $pdo->prepare($sql);   
 $stm->execute();   
 $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
 /* Conta quantos registos existem na tabela */  
 $sqlContador = "SELECT COUNT(*) AS total_registros FROM produto";   
 $stm = $pdo->prepare($sqlContador);   
 $stm->execute();   
 $valor = $stm->fetch(PDO::FETCH_OBJ);   
 $range_inicial =1;  
 /* Idêntifica a primeira página */  
 $primeira_pagina = 1;   

 /* Cálcula qual será a última página */  
 $ultima_pagina  = ceil($valor->total_registros / QTDE_REGISTROS);   
   
 /* Cálcula qual será a página anterior em relação a página atual em exibição */   
 $pagina_anterior = ($pagina_atual > 1) ? $pagina_atual -1 :    
   
 /* Cálcula qual será a pŕoxima página em relação a página atual em exibição */   
 $proxima_pagina = ($pagina_atual < $ultima_pagina) ? $pagina_atual +1 :    
 //print_r($pagina_atual);  
 /* Cálcula qual será a página inicial do nosso range */    
 $range_inicial  = (($pagina_atual - RANGE_PAGINAS) >= 1) ? $pagina_atual - RANGE_PAGINAS : 1 ;   
 
 /* Cálcula qual será a página final do nosso range */    
$range_final   = (($pagina_atual + RANGE_PAGINAS) <= $ultima_pagina ) ? $pagina_atual + RANGE_PAGINAS : $ultima_pagina ;   
   
 /* Verifica se vai exibir o botão "Primeiro" e "Pŕoximo" */   
 $exibir_botao_inicio = ($range_inicial < $pagina_atual) ? 'mostrar' : 'esconder'; 
   
 /* Verifica se vai exibir o botão "Anterior" e "Último" */   
 $exibir_botao_final = ($range_final > $pagina_atual) ? 'mostrar' : 'esconder';  
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
            <button id="tds" onclick="tds()">Todos</button>
            <button id="carnes" onclick="carnes()">Carnes</button>
            <button id="frios" onclick="frios()">Frios</button>
            <button id="bebidas" onclick="bebidas()">Bebidas</button>
            <button id="horti" onclick="horti()">Hortifruti</button>
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
                        <img src="img/<?=$produto->foto?>" alt="">
                        <label for="nome" class="prod_name"><?=$produto ->nome?></label><br>
                        <label for="valor" class="prod_value"><span style="font-size: 18px; color:#273746 ; font-weight: 200;">R$</span><?= $produto ->valor ?><span style="font-size: 16px; font-weight: 100; color:#273746 ;">kg</span></label>
                        <button class="contador" id="cont1"><?= $produto ->quantidade ?></button>
                    </div>
                <div class="min" onclick="Subtrair1()">&#8722;</div>
               </div>
            <?php endforeach;?>   
        </div>
         </div>
        <div align=center>    
        <a  href="?pagina=produtos&&page=<?=$primeira_pagina?>" title="Primeira Página">Primeira</a>  
       <?php  
      /* Loop para montar a páginação central com os números */   
      for ($i=$range_inicial; $i <= $range_final; $i++):   
        $destaque = ($i == $pagina_atual) ? 'destaque' : '' ;  
        ?>  
      <a href="?pagina=produtos&&page=<?=$i?>"><?php echo $i ?></a>  
      
      <?php endfor; ?>    
      <a href="?pagina=produtos&&page=<?=$ultima_pagina?>">Última</a>   
     </div>   
        <?php endif ?>
    <script src="./js/pg_produtos.js"></script>
    <script src="./js/modal.js"></script>
</body>

</html>