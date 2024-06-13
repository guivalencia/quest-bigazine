<?php
  require_once("../conexao/conexao.php");
?>

<?php
  //INSERINDO NO BANCO
  if(isset($_POST["loja"])){

    $select = preg_replace("/[\"'%()@$.!&?_: #\/-]/",' ',$_POST["select"]);
    $select2 = preg_replace("/[\"'%()@$.!&?_: #\/-]/",' ',$_POST["select2"]);
    $select3 = preg_replace("/[\"'%()@$.!&?_: #\/-]/",' ',$_POST["select3"]);
    $select4 = preg_replace("/[\"'%()@$.!&?_: #\/-]/",' ',$_POST["select4"]);
    $select5 = preg_replace("/[\"'%()@$.!&?_: #\/-]/",' ',$_POST["select5"]);
    $select6 = preg_replace("/[\"'%()@$.!&?_: #\/-]/",' ',$_POST["select6"]);
    $comentario = preg_replace("/[\"'%()@$.!&?_: #\/-]/",' ',$_POST["comentario"]);
    $comentario1 = preg_replace("/[\"'%()@$.!&?_: #\/-]/",' ',$_POST["comentario1"]);
    $nome = preg_replace("/[\"'%()@$.!&?_: #\/-]/",' ',$_POST["nome"]);
    $telefone = preg_replace("/[\"'%()@$.!&?_: #\/-]/",' ',$_POST["telefone"]);
    $loja = preg_replace("/[\"'%()@$.!&?_: #\/-]/",' ',$_POST["loja"]);
    date_default_timezone_set( 'America/Manaus' );
    $data_criacao = date('Y-m-d');

    $inserir = "INSERT INTO `quest`.`avalia_tb`
    (
    `pergunta1`,
    `pergunta2`,
    `pergunta3`,
    `pergunta4`,
    `pergunta5`,
    `pergunta6`,
    `comentario`,
    `comentario1`,
    `nome`,
    `telefone`,
    `loja`,
    `data_criacao`
    )
    VALUES
    (
    '$select',
    '$select2',
    '$select3',
    '$select4',
    '$select5',
    '$select6',
    '$comentario',
    '$comentario1',
    '$nome',
    '$telefone',
    '$loja',
    '$data_criacao'
    );";

    $operacao_inserir = mysqli_query($conecta, $inserir);
    if(!$operacao_inserir){
      die("Erro no bancob");
    }else{  
    header('Location: http://bigtrading.ddns.net/sistemas/quest/main/main.php');
    }
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BIGAZINE | PESQUISA DE SATISFAÇÃO</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <link rel="stylesheet" href="celular.css" media="screen and (min-width:320px) and (max-width:960px)"> -->
    <script src="https://kit.fontawesome.com/5bc494016d.js" crossorigin="anonymous"></script>
    
  </head>
  <body>
    <div class="container col-12">
      <div class="logo"></div>
      <header style="color:#ffbb00;">Pesquisa de Satisfação</header>
      <!-- <header style="color:#ffbb00;">BIGAZINE</header>  -->
      <div class="progress-bar">
        <div class="step">
          <p style="color:#ffbb00;">Etapa</p>
          <div class="bullet">
            <span>1</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p style="color:#ffbb00;">Etapa</p>
          <div class="bullet">
            <span>2</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p style="color:#ffbb00;">Etapa</p>
          <div class="bullet">
            <span>3</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p style="color:#ffbb00;">Etapa</p>
          <div class="bullet">
            <span>4</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p style="color:#ffbb00;">Etapa</p>
          <div class="bullet">
            <span>5</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p style="color:#ffbb00;">Etapa</p>
          <div class="bullet">
            <span>6</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p style="color:#ffbb00;">Etapa</p>
          <div class="bullet">
            <span>7</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p style="color:#ffbb00;">Etapa</p>
          <div class="bullet">
            <span>8</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
      </div>
      <div class="form-outer">
        <form action="main.php" method="post">
          <div class="page slide-page">
            <div class="wrapper">
              <div id="error"></div>
              <div class="title">Selecione a loja a ser avaliada:</div>
              <select id="loja" class="form-select" style="height:60px;width:100%;" aria-label="Default select example" name="loja"  onclick="myFunction1()">
              <option value="">Selecione a Loja</option>
              <option value="Paraiba">Bigazine Paraíba</option>
              <option value="Max Teixeira">Bigazine Max Teixeira</option>
              <option value="Grande Circular">Bigazine Grande Circular</option>
              <option value="Av Brasil">Bigazine Av Brasil</option>
              <option value="Boa Vista">Bigazine Boa Vista</option>
              <option value="Porto Velho">Bigazine  Porto Velho</option>
            </select>
              </div>
            <div class="field">
              <button id="myDIV1" class="firstNext next" style="display:none;">Avançar</button>
            </div>
            <h3>Obs: Marque as opções antes de avançar!</h3>
          </div>

          <div class="page">
            <div class="wrapper">
              <div class="title">Atendimento no salão da loja?</div>
              <div class="box">
                <input type="radio" name="select" id="option-1" value="Muito Satisfeito" onclick="myFunction2()">
                <input type="radio" name="select" id="option-2" value="Satisfeito"onclick="myFunction2()">
                <input type="radio" name="select" id="option-3" value="Insatisfeito"onclick="myFunction2()">
                <input type="radio" name="select" id="option-4" value="Muito Insatisfeito"onclick="myFunction2()">
                <label for="option-1" class="option-1">
                  <div class="dot"><img src="../face-grin-beam-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Muito Satisfeito</div>
                </label>
                <label for="option-2" class="option-2">
                <div class="dot"><img src="../face-grin-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Satisfeito</div>
                </label>
                <label for="option-3" class="option-3">
                <div class="dot"><img src="../face-frown-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Insatisfeito</div>
                </label>
                <label for="option-4" class="option-4">
                <div class="dot"><img src="../face-sad-cry-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Muito Insatisfeito</div>
                </label>
              </div>
            </div>
            <div class="field btns">
              <button class="prev-1 prev">Voltar</button>
              <button id="myDIV2" class="next-1 next" style="display:none;">Avançar</button>
            </div>
          </div>

          <div class="page">
            <div class="wrapper">
              <div class="title">Qualidade e Variedade dos produtos da loja?</div>
              <div class="box">
                <input type="radio" name="select2" id="option-5" value="Muito Satisfeito" onclick="myFunction3()">
                <input type="radio" name="select2" id="option-6" value="Satisfeito" onclick="myFunction3()">
                <input type="radio" name="select2" id="option-7" value="Insatisfeito" onclick="myFunction3()">
                <input type="radio" name="select2" id="option-8" value="Muito Insatisfeito" onclick="myFunction3()">
                <label for="option-5" class="option-5">
                <div class="dot"><img src="../face-grin-beam-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Muito Satisfeito</div>
                </label>
                <label for="option-6" class="option-6">
                <div class="dot"><img src="../face-grin-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Satisfeito</div>
                </label>
                <label for="option-7" class="option-7">
                <div class="dot"><img src="../face-frown-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Insatisfeito</div>
                </label>
                <label for="option-8" class="option-8">
                <div class="dot"><img src="../face-sad-cry-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Muito Insatisfeito</div>
                </label>
              </div>
            </div>
            <div class="field btns">
              <button class="prev-2 prev">Voltar</button>
              <button id="myDIV3" class="next-2 next" style="display:none;">Avançar</button>
            </div>
          </div>

          <div class="page">
            <div class="wrapper">
              <div class="title">Fila e frente de caixa da loja?</div>
              <div class="box">
                <input type="radio" name="select3" id="option-9" value="Muito Satisfeito" onclick="myFunction4()">
                <input type="radio" name="select3" id="option-10" value="Satisfeito" onclick="myFunction4()">
                <input type="radio" name="select3" id="option-11" value="Insatisfeito" onclick="myFunction4()">
                <input type="radio" name="select3" id="option-12" value="Muito Insatisfeito" onclick="myFunction4()">
                <label for="option-9" class="option-9">
                <div class="dot"><img src="../face-grin-beam-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Muito Satisfeito</div>
                </label>
                <label for="option-10" class="option-10">
                <div class="dot"><img src="../face-grin-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Satisfeito</div>
                </label>
                <label for="option-11" class="option-11">
                <div class="dot"><img src="../face-frown-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Insatisfeito</div>
                </label>
                <label for="option-12" class="option-12">
                <div class="dot"><img src="../face-sad-cry-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Muito Insatisfeito</div>
                </label>
              </div>
            </div>
            <div class="field btns">
              <button class="prev-3 prev">Voltar</button>
              <button id="myDIV4" class="next-3 next" style="display:none;">Avançar</button>
            </div>
          </div>

          <div class="page">
            <div class="wrapper">
              <div class="title">Limpeza e organização da loja?</div>
              <div class="box">
                <input type="radio" name="select4" id="option-13" value="Muito Satisfeito" onclick="myFunction5()">
                <input type="radio" name="select4" id="option-14" value="Satisfeito" onclick="myFunction5()">
                <input type="radio" name="select4" id="option-15" value="Insatisfeito" onclick="myFunction5()">
                <input type="radio" name="select4" id="option-16" value="Muito Insatisfeito" onclick="myFunction5()">
                <label for="option-13" class="option-13">
                <div class="dot"><img src="../face-grin-beam-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Muito Satisfeito</div>
                </label>
                <label for="option-14" class="option-14">
                <div class="dot"><img src="../face-grin-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Satisfeito</div>
                </label>
                <label for="option-15" class="option-15">
                <div class="dot"><img src="../face-frown-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Insatisfeito</div>
                </label>
                <label for="option-16" class="option-16">
                <div class="dot"><img src="../face-sad-cry-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Muito Insatisfeito</div>
                </label>
              </div>
            </div>
            <div class="field btns">
              <button class="prev-4 prev">Voltar</button>
              <button id="myDIV5" class="next-4 next" style="display:none;">Avançar</button>
            </div>
          </div>
          <div class="page">
            <div class="wrapper">
              <div class="title">Atendimento dos vendedores(as)?</div>
              <div class="box">
                <input type="radio" name="select5" id="option-17" value="Muito Satisfeito" onclick="myFunction6()">
                <input type="radio" name="select5" id="option-18" value="Satisfeito" onclick="myFunction6()">
                <input type="radio" name="select5" id="option-19" value="Insatisfeito" onclick="myFunction6()">
                <input type="radio" name="select5" id="option-20" value="Muito Insatisfeito" onclick="myFunction6()">
                <label for="option-17" class="option-17">
                <div class="dot"><img src="../face-grin-beam-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Muito Satisfeito</div>
                </label>
                <label for="option-18" class="option-18">
                <div class="dot"><img src="../face-grin-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Satisfeito</div>
                </label>
                <label for="option-19" class="option-19">
                <div class="dot"><img src="../face-frown-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Insatisfeito</div>
                </label>
                <label for="option-20" class="option-20">
                <div class="dot"><img src="../face-sad-cry-regular.svg" style="height: 20px;width: 20px;"/></div>
                  <div class="text">Muito Insatisfeito</div>
                </label>
              </div>
            </div>
            <div class="field btns">
              <button class="prev-5 prev">Voltar</button>
              <button id="myDIV6" class="next-5 next" style="display:none;">Avançar</button>
            </div>
          </div>
          <div class="page">
            <div class="wrapper">
              <div class="title">Como conheceu nossa loja?</div>
              <div class="box">
                <input type="radio" name="select6" id="option-21" value="tv" onclick="myFunction7()">
                <input type="radio" name="select6" id="option-22" value="radio" onclick="myFunction7()">
                <input type="radio" name="select6" id="option-23" value="rede social" onclick="myFunction7()">
                <input type="radio" name="select6" id="option-24" value="indicacao" onclick="myFunction7()">
                <input type="radio" name="select6" id="option-25" value="passando" onclick="myFunction7()">
                <input type="radio" name="select6" id="option-26" value="cliente" onclick="myFunction7()">
                <input type="radio" name="select6" id="option-27" value="encarte" onclick="myFunction7()">
                <label for="option-21" class="option-21">
                <div class="dot"><img src="../tv-solid.svg" style="height: 18px;width: 18px;"/></div>
                  <div class="text">TV</div>
                </label>
                <label for="option-22" class="option-22">
                <div class="dot"><img src="../radio-solid.svg" style="height: 18px;width: 18px;"/></div>
                  <div class="text">Rádio</div>
                </label>
                <label for="option-23" class="option-23">
                <div class="dot"><img src="../hashtag-solid.svg" style="height: 18px;width: 18px;"/></div>
                  <div class="text">Rede Sociais</div>
                </label>
                <label for="option-24" class="option-24">
                <div class="dot"><img src="../handshake-simple-solid.svg" style="height: 18px;width: 18px;"/></div>
                  <div class="text">Indicicação</div>
                </label>
                <label for="option-25" class="option-25">
                <div class="dot"><img src="../book-open-solid.svg" style="height: 18px;width: 18px;border-radius: 50%;"/></div>
                  <div class="text">Encarte Promocional</div>
                </label>
                <label for="option-26" class="option-26">
                <div class="dot"><img src="../person-walking-solid.svg" style="height: 18px;width: 18px;"/></div>
                  <div class="text">Estava passando na frente e viu</div>
                </label>
                <label for="option-27" class="option-27">
                <div class="dot"><img src="//d3ugyf2ht6aenh.cloudfront.net/stores/001/517/589/themes/common/logo-602181780-1623288178-c441acff08f291ebff190bce6ea3225f1623288178.ico?0" style="height: 18px;width: 18px;border-radius: 50%;"/></div>
                  <div class="text">Já sou cliente</div>
                </label>
              </div>
            </div>
            <div class="field btns">
              <button class="prev-6 prev">Voltar</button>
              <button id="myDIV7" class="next-6 next" style="display:none;">Avançar</button>
            </div>
          </div>
          <div class="page">
            <div class="wrapper">
              <div class="title">Gostaria de deixar uma contribuição para nossa análise e providências ?</div>
              <textarea type="text" class="form-control" id="floatingTextarea2" style="height:80px;width:100%;border:none;" placeholder="Sua Resposta" name="comentario"></textarea>
            </div>
            <div class="wrapper">
              <div class="title">Qual setor você acha que deve ter no Bigazine?</div>
              <textarea type="text" class="form-control" id="floatingTextarea2" style="height:80px;width:100%;border:none;" placeholder="Sua Resposta" name="comentario1"></textarea>
            </div>
            <div class="page">
            <div class="wrapper">
              <div class="title">Informe seu nome/número:</div>
              <textarea type="text" class="form-control" id="nome" size="20" maxlength="45" placeholder="Seu Nome" name="nome"></textarea>
              <textarea type="text" class="form-control" id="telefone" size="20" maxlength="14" placeholder="Seu Número" name="telefone" onclick="maskarak()"></textarea>
            </div>
            <div class="field btns">
              <button class="prev-7 prev">Voltar</button>
              <button onclick="validation()" class="submit">Enviar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    

  </body>
  <script src="script.js"></script>
  <script type="text/javascript">
    function maskarak(){
      document.getElementById("telefone").mask = "(00)00000-0000";
    }
    function myFunction1() {
      document.getElementById("myDIV1").style.display = "block";
    }
    function myFunction2() {
      document.getElementById("myDIV2").style.display = "block";
    }
    function myFunction3() {
      document.getElementById("myDIV3").style.display = "block";
    }
    function myFunction4() {
      document.getElementById("myDIV4").style.display = "block";
    }
    function myFunction5() {
      document.getElementById("myDIV5").style.display = "block";
    }
    function myFunction6() {
      document.getElementById("myDIV6").style.display = "block";
    }
    function myFunction7() {
      document.getElementById("myDIV7").style.display = "block";
    }

    function validation(){
      // swal("Muito Obrigado!", "Sua opnião foi enviada com sucesso", "success");
      alert('OBRIGADO PELA SUA CONTRIBUIÇÃO VOLTE SEMPRE!');
    }
  </script>
</html>
