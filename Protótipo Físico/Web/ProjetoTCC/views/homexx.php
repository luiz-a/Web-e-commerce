<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="formCadastro.css">
    <title>SuperMercados LWDS</title>
</head>
<script src="https://kit.fontawesome.com/c08786e8e8.js" crossorigin="anonymous"></script>

<body>
    <div class="pelicula">
        <div>
            <h3 class="txt_capa">Encontre seu produto aqui com as</br>Melhores Ofertas.</h3>
            <p class="sub_titulo">Com o Lwds você pode aproveitar nossas ofertas e compartilhar suas ofertas com nossos
                clientes.</p>
            <button class="btn_pg cli" id="btn_cli" onclick="Cadastro_prod00()">Cliente</button>
            <button class="btn_pg mer" id="btn_mec" onclick="Cadastro_prod01()">Mercado</button>
            <a href="?pagina=produtos1"><i class="fas fa-angle-double-right"></i></a>
        </div>
        <h2>L
            <span>W</span>DS
        </h2>
        <div class="box" id="form_user">
            <div class="cadastro">
                <h3>Olá, Bem-vindo</h3>
                <label for="">Cadastre-se agora e curta nossas ofertas!! </label>
                <div class="pg_select">
                    <button class=" btn btn_cad">Cadastro<span></span></button>
                    <button class=" btn btn_log">Login<span></span></button>
                </div>
                <form action="/users" class="form" method="POST">
                    <div class="box_user" id="tela_user">
                        <div class="txt">
                            <input type="text" name="name" autocomplete="off" required />
                            <label for="name" class="label-name">
                                <span class="content-name">Name</span></label>
                            </label>
                        </div>
                        <div class="txt txt1">
                            <input class="txt_cpf" type="text" name="cpf" oninput="mascara(this, 'cpf')"
                                autocomplete="off" required />
                            <label for="cpf" class="label-name">
                                <span class="content-name">CPF</span></label>
                            </label>
                        </div>
                        <div class="txt txt1">
                            <input type="email" name="email" autocomplete="off" required />
                            <label for="email" class="label-name">
                                <span class="content-name">Email</span></label>
                            </label>
                        </div>
                        <div class="txt txt1">
                            <input type="password" name="senha" autocomplete="off" required />
                            <label for="senha" class="label-name">
                                <span class="content-name">Senha</span></label>
                            </label>
                        </div>
                    </div>
                    <button class="next" onclick="next()">Próximo</button>
                    <input class="submit" type="submit" placeholder="Enviar">
            </div>
        </div>
        <div class="box box_produtos" id="form_prod">
            <div class="cadastro">
                <h3>Olá, Bem-vindo</h3>
                <label for="">Faça o cadastro do seu produto agora!! Não perca tempo</label>
                <form action="??????" class="form" method="POST">
                    <div class="box_prod" id="tela_prod" style="margin-top: 30px;">
                        <div class="txt">
                            <input type="text" name="name" autocomplete="off" required />
                            <label for="name" class="label-name">
                                <span class="content-name">Nome Produto</span></label>
                            </label>
                        </div>
                        <div class="box_cat">
                            <h4 class="titulo_cat">Categoria:</h4>
                            <div class="meio">
                                <div class="cat">
                                    <div>
                                        <input type="radio" name="Categoria" id="mercearia" value="mercearia">
                                        <label for="mercearia">Hortifruti</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="Categoria" id="carnes" value="carnes">
                                        <label for="carnes">Carnes</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="Categoria" id="frios" value="frios">
                                        <label for="frios">Frios</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="Categoria" id="bebidas" value="bebidas">
                                        <label for="bebidas">Bebidas</label>
                                    </div>
                                </div>
                                <div class="preco_prod">
                                    <label for="preco">Valor de Mercado</label>
                                    <input type="text" name="valor" id="sigla_preco" placeholder="R$" disabled>
                                    <input name="valor" id="preco" placeholder="00,00" onkeypress="mascara(this,mreais)"
                                        size="7" min="10,00" max="1.064,00"
                                        style="width: 50%; text-align: right; font-size: 14px; font-family: Arial, Helvetica, sans-serif; color: #2c6d92;">
                                    <input type="text" name="valor" id="sigla_desc" placeholder="%" disabled>
                                    <input type="text" name="valor" id="desc" placeholder="Desconto" maxlength="2"
                                        style=" width: 50%; text-align: right; font-size: 14px; font-family: Arial, Helvetica, sans-serif; margin-top: 8px;">
                                </div>
                            </div>
                            <div class="add_img" style="padding: 10px;">
                                <label for="">Imagem do Produto</label>
                                <div class="img_prod">
                                    <img src="./img/images-solid (1).svg" id="img_preview" alt="Image_Icon">
                                    <div id="msg" style="padding-top: 30px; color: #f00;"></div>
                                    <label for="fileUploaded" class="fileUploaded">+</label>
                                    <input type="file" id="fileUploaded"></input>
                                </div>
                            </div>
                            <button class="confirm_prod">Concluir</button>
                        </div>

                    </div>
            </div>
        </div>
    </div>
    </form>
    <script src="./js/axios.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        function ImagePreview(input) {

            if (input.files && input.files[0]) {

                var r = new FileReader();

                r.onload = function (e) {
                    $("#img_preview").show();
                    $("#img_preview").attr("src", e.target.result);
                }

                r.readAsDataURL(input.files[0]);

            }
        }

        $().ready(function () {

            hide_empty_image = false;
            set_blank_to_empty_image = false;
            set_image_border = true;

            if (hide_empty_image)
                $("#img_preview").hide();

            if (set_blank_to_empty_image)
                $("#img_preview").attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=");


            $("#img_preview").css("width", "100px");
            $("#img_preview").css("height", "100px");
            $("#img_preview").css("border-radius", "20px");

            $("#fileUploaded").change(function () {
                ImagePreview(this);
            });

        });
    </script>
    <script>
        function mascara(i, t) {

            var v = i.value;

            if (isNaN(v[v.length - 1])) {
                i.value = v.substring(0, v.length - 1);
                return;
            }

            if (t == "cpf") {
                i.setAttribute("maxlength", "14");
                if (v.length == 3 || v.length == 7) i.value += ".";
                if (v.length == 11) i.value += "-";
            }


        }
    </script>
    <script type="text/javascript">
        function mascara(o, f) {
            v_obj = o
            v_fun = f
            setTimeout("execmascara()", 1)
        }

        function execmascara() {
            v_obj.value = v_fun(v_obj.value)
        }

        function mreais(v) {
            v = v.replace(/\D/g, "") //Remove tudo o que não é dígito
            v = v.replace(/(\d{2})$/, ",$1") //Coloca a virgula
            v = v.replace(/(\d+)(\d{3},\d{2})$/g, "$1.$2") //Coloca o primeiro ponto
            return v
        }
    </script>
</body>

</html