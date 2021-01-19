<?php
$_SESSION['url'];
if(!isset($_SESSION['url'])){
 $_SESSION['url'] ="?pagina=home";
}else{
$_SESSION['url'] = arrumaUrl($_SERVER["REQUEST_URI"]);
}

?>
  <!--Mask-->

  <div id="intro" class="view">
    <div class="film" style="height: 100%; display: flex; justify-content: center; align-items: center;">
      <div class="jumbotron" style="background: none;">
        <div class="mask text-white">
          <div>
            <h3 class="text-center">Encontre seu produto aqui com as Melhores Ofertas</h3>
            <p class="text-center">Com o Lwds você pode aproveitar nossas ofertas e compartilhar suas ofertas com nossos
              clientes.</p>
          </div>
        </div>
        <div style="display: flex; justify-content: center; align-items: center;">
          <a class="btn btn-primary btn-lg mt-5 rounded-pill font-weight-light"
            style="background:#1B2631 ; box-shadow: -10px 10px 10px rgba(0, 0, 0, 0.2);  border: none; padding: 6px 18px;" href="?pagina=produtos"
            role="button">Ofertas</a>
        </div>
      </div>
     
    </div>
  </div>
  <!--/.Mask-->

 