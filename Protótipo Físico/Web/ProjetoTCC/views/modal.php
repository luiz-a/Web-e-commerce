<head>

</head>
<div class="container">
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop_cadastro" data-backdrop="static" data-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background: #F4D03F;">
                <h5 class="text-white">Cadastre-se</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="?pagina=cad_usuario">
                  <div class="form-group">
                  <label for="formGroupExampleInput" style="font-family: Roboto; color: #969696; font-size: 14px;">Nome</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" name="nome">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2"
                      style="font-family: Roboto; color: #969696; font-size: 14px;">Email</label>
                    <input type="email" class="form-control" id="formGroupExampleInput2" name="email">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput"
                      style="font-family: Roboto; color: #969696; font-size: 14px;">Senha</label>
                    <input type="password" class="form-control" id="formGroupExampleInput" minlength="6" name="senha">
                  </div>
                  <input type=hidden name=acao value=1>
                  <div class="form-group">
                    <label for="formGroupExampleInput"
                      style="font-family: Roboto; color: #969696; font-size: 14px;">Confirme sua Senha</label>
                    <input type="password" class="form-control" id="formGroupExampleInput" name="senha_confirma">
                  </div>
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-dismiss="modal"
                  style=" padding: 6px 16px; border-radius: 20px;">Fechar</button>
                <button type="submit" class="btn text-white"
                  style="background: #1C5F85; padding: 6px 16px; border-radius: 20px;">Cadastrar</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade" id="staticBackdrop_login" data-backdrop="static" data-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background:#1B2631 ;">
                <h5 class="text-white">Login</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="post" action="?pagina=cad_usuario">
                  <div class="form-group">
                    <label for="formGroupExampleInput"
                      style="font-family: Roboto; color: #969696; font-size: 14px;">Email</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="email">
                  </div>
                  <input type=hidden name=acao value=2>
                  <div class="form-group">
                    <label for="formGroupExampleInput2"
                      style="font-family: Roboto; color: #969696; font-size: 14px;">Senha</label>
                    <input type="password" class="form-control" id="formGroupExampleInput2" name="senha">
                   </div>
                 </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-dismiss="modal"
                  style=" padding: 6px 16px; border-radius: 20px;">Fechar</button>
                <button type="submit" class="btn text-white"
                  style="background: #1C5F85; padding: 6px 16px; border-radius: 20px;">Logar</button>
              </div>
              </div>
              </form>
          </div>
         </div>
        <div class="modal fade" id="staticBackdrop_produto" data-backdrop="static" data-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background: #1A5276 ;">
                <h5 class="text-white">Cadastre Produto</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="post" action="?pagina=cad_produtos" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="formGroupExampleInput"
                      style="font-family: Roboto; color: #969696; font-size: 14px;">Nome</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="nome">
                  </div>
                  <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div class="mt-2" style="border: .6px solid #e3e3e3; border-radius: 20px; padding: 20px;">
                      <div class="input-group-prepend">
                        <div>
                          <input type="radio" id="horti" name="categoria" aria-label="" value="4">
                          <label for="horti">Hortifruti</label>
                        </div>
                      </div>
                      <div class="input-group-prepend">
                        <div>
                          <input type="radio" id="carne" name="categoria" aria-label="" checked value="1">
                          <label for="carne">Carne</label>
                        </div>
                      </div>
                      <div class="input-group-prepend">
                        <div>
                          <input type="radio" id="frios" name="categoria" aria-label="" value="2">
                          <label for="frios">Frios</label>
                        </div>
                      </div>
                      <div class="input-group-prepend">
                        <div>
                          <input type="radio" id="bebidas" name="categoria" aria-label="" value="3">
                          <label for="bebidas">Bebidas</label>
                        </div>
                      </div>
                    </div>
                    <div class="boxs">
                      <div class="input-group flex-nowrap mt-4 mr-3" style="width: 80%;">
                        <div>
                          <span class="input-group-text" id="addon-wrapping">R$</span>
                        </div>
                        <input type="text" class="form-control text-center"  aria-label="Username"
                          aria-describedby="addon-wrapping" name="valor">
                      </div>
                      <div class="input-group flex-nowrap mt-4 mr-3" style="width: 80%;">
                        <div>
                          <span class="input-group-text" id="addon-wrapping">Qtde:</span>
                        </div>
                        <input type="text" class="form-control text-center"  aria-label="Username"
                          aria-describedby="addon-wrapping" name="quantidade">
                      </div>
                    </div>
                  </div>   

                    <div class="file-field mt-4" style="display: flex; justify-content: center; align-items: center;">
                      <div class="btn btn-dark btn-sm float-left rounded-pill p-2">
                        <input type="file" name="foto">
                      </div>
                    </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-dismiss="modal"
                  style=" padding: 6px 16px; border-radius: 20px;">Fechar</button>
                <button type="submit" class="btn text-white"
                  style="background: #1C5F85; padding: 6px 16px; border-radius: 20px;">Cadastrar</button>
              </div>
            </div>
            </form>
          </div>
        </div>
      
  <div class="modal fade" id="staticBackdrop_compra" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background:#1B2631 ;">
          <h5 class="text-white">Endereço</h5>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="?pagina=cad_usuario">
            <div class="form-group">
                <label for="formGroupExampleInput2"
                  style="font-family: Roboto; color: #969696; font-size: 14px;">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep"  onblur="pesquisacep(this.value);">
              </div>
            <div class="form-group">
              <label for="formGroupExampleInput"
                style="font-family: Roboto; color: #969696; font-size: 14px;">Logradouro</label>
              <input type="text" class="form-control" id="rua" name="rua">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput"
                style="font-family: Roboto; color: #969696; font-size: 14px;">Número</label>
              <input type="text" class="form-control" id="numero" name="numero">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2"
                style="font-family: Roboto; color: #969696; font-size: 14px;">Bairro</label>
              <input type="text" class="form-control" id="bairro" name="bairro">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2"
                  style="font-family: Roboto; color: #969696; font-size: 14px;">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2"
                  style="font-family: Roboto; color: #969696; font-size: 14px;">Estado</label>
                <input type="text" class="form-control" id="uf" name="uf">
                <input type="hidden" name="acao" value="3">
              </div>
             
           </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary text-white" data-dismiss="modal"
            style=" padding: 6px 16px; border-radius: 20px;">Voltar</button>
          <button type="submit" class="btn text-white"
            style="background: #1C5F85; padding: 6px 16px; border-radius: 20px;">Finalizar</button>
        </div>
      </div>
    </div>
    </form>
  </div>
  <script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            //document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
           // document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
              //  document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
  </div>
 