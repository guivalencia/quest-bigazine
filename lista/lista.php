<?php require_once("../conexao/conexao.php"); ?>
<?php
 date_default_timezone_set( 'America/Manaus' );
 $data_atual = date('Y-m-d');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bigazine - Magazine</title>
    <link href="//d3ugyf2ht6aenh.cloudfront.net/stores/001/517/589/themes/common/logo-602181780-1623288178-c441acff08f291ebff190bce6ea3225f1623288178.ico?0" rel="shortcut icon" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </head>
  <body>
  <div class="contact-section">
    <!-- <form class="contact-form" action="main.php" method="post">
      <h3>Filtro:</h3>
        <input type="text" class="contact-form-text contact-form-up" name="filtro" placeholder="Buscar cliente">
        <input type="submit" class="contact-form-btn" value="Buscar">
    </form> -->
    <div id="visulUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="visulUsuarioModalLabel">Detalhes da Avaliação</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<span id="visul_usuario"></span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>

    <form action="lista.php" method="GET">
        <!-- <div class="d-grid gap-2 col-6 mx-auto">
            <input type="text" class="form-control" placeholder="Pesquisar Loja" aria-label="Pesquisar cpf" aria-describedby="button-addon1"  name="filtro">
            <button class="btn btn-outline-warning" type="submit" id="button-addon1">Pesquisar</button>
        </div> -->
        <div class="d-grid gap-2 col-6 mx-auto">
        <h3 style="color:#ffbb00">Filtro:</h3>
            <select id="loja" class="form-select" style="height:50px;width:100%;" aria-label="Default select example" name="filtro"  onclick="myFunction1()">
              <option value="">Selecione a Loja</option>
              <option value="Paraíba" <?= isset($_GET['filtro']) == true ? ($_GET['filtro'] == 'Paraíba' ? 'selected':'') : '' ?>>Bigazine Paraíba</option>
              <option value="Max Teixeira" <?= isset($_GET['filtro']) == true ? ($_GET['filtro'] == 'Max Teixeira' ? 'selected':'') : '' ?>>Bigazine Max Teixeira</option>
              <option value="Grande Circular" <?= isset($_GET['filtro']) == true ? ($_GET['filtro'] == 'Grande Circular' ? 'selected':'') : '' ?>>Bigazine Grande Circular</option>
              <option value="Av Brasil" <?= isset($_GET['filtro']) == true ? ($_GET['filtro'] == 'Av Brasil' ? 'selected':'') : '' ?>>Bigazine Av Brasil</option>
              <option value="Boa Vista" <?= isset($_GET['filtro']) == true ? ($_GET['filtro'] == 'Boa Vista' ? 'selected':'') : '' ?>>Bigazine Boa Vista</option>
              <option value="Porto Velho" <?= isset($_GET['filtro']) == true ? ($_GET['filtro'] == 'Porto Velho' ? 'selected':'') : '' ?>>Bigazine Porto Velho</option>
            </select>
            <input type="date" class="form-control" name="de" value="<?= isset($_GET['de']) == true ? $_GET['de']:$data_atual ?>">
            <input type="date" class="form-control" name="ate" value="<?= isset($_GET['ate']) == true ? $_GET['ate']:$data_atual ?>">
            <button class="btn btn-outline-warning" type="submit" id="button-addon1">Pesquisar</button>
        </div>
    </form>
    
    
    </div>
  </div>
  <section class="lower-div">
    <?php 
    if(isset($_GET["filtro"])){
      $filtro = $_GET["filtro"];
      $de = $_GET["de"];
      $ate = $_GET["ate"];
      
      //FILTRA CHAMADOS
      // $fil = "SELECT * FROM `nesql`.`chamado_tb` WHERE nome_cliente like '%$filtro%' order by data_entrega DESC";
      $fil = "SELECT avalia_id,
      pergunta1,
      pergunta2,
      pergunta3,
      pergunta4,
      pergunta5,
      comentario,
      comentario1,
      loja,
      nome,
      telefone,
      comentario,
      data_criacao
      FROM `quest`.`avalia_tb` WHERE loja like '%$filtro%' and data_criacao >= '$de' and data_criacao <='$ate' order by avalia_id desc";
$fil_con = mysqli_query($conecta, $fil);
if(!$fil_con){
die("Falha no banco chamado");
}

      $query = mysqli_query($conecta, "SELECT * from `quest`.`avalia_tb` WHERE loja like '%$filtro%' and data_criacao between '$de' and '$ate'");
      $total = mysqli_num_rows($query);

      $query = mysqli_query($conecta, "SELECT * FROM `quest`.`avalia_tb` WHERE (pergunta1 = 'Satisfeito' or pergunta1 = 'Muito Satisfeito') and loja like '%$filtro%' and data_criacao between '$de' and '$ate'");
      $p1 = mysqli_num_rows($query);
      $query = mysqli_query($conecta, "SELECT * FROM `quest`.`avalia_tb` WHERE (pergunta2 = 'Satisfeito' or pergunta2 = 'Muito Satisfeito') and loja like '%$filtro%' and data_criacao between '$de' and '$ate'");
      $p2 = mysqli_num_rows($query);
      $query = mysqli_query($conecta, "SELECT * FROM `quest`.`avalia_tb` WHERE (pergunta3 = 'Satisfeito' or pergunta3 = 'Muito Satisfeito') and loja like '%$filtro%' and data_criacao between '$de' and '$ate'");
      $p3 = mysqli_num_rows($query);
      $query = mysqli_query($conecta, "SELECT * FROM `quest`.`avalia_tb` WHERE (pergunta4 = 'Satisfeito' or pergunta4 = 'Muito Satisfeito') and loja like '%$filtro%' and data_criacao between '$de' and '$ate'");
      $p4 = mysqli_num_rows($query);
      $query = mysqli_query($conecta, "SELECT * FROM `quest`.`avalia_tb` WHERE (pergunta5 = 'Satisfeito' or pergunta5 = 'Muito Satisfeito') and loja like '%$filtro%' and data_criacao between '$de' and '$ate'");
      $p5 = mysqli_num_rows($query);
      $query = mysqli_query($conecta, "SELECT * FROM `quest`.`avalia_tb` WHERE (pergunta6 = 'tv') and loja like '%$filtro%' and data_criacao between '$de' and '$ate'");
      $p6 = mysqli_num_rows($query);
      $query = mysqli_query($conecta, "SELECT * FROM `quest`.`avalia_tb` WHERE (pergunta6 = 'radio') and loja like '%$filtro%' and data_criacao between '$de' and '$ate'");
      $p7 = mysqli_num_rows($query);
      $query = mysqli_query($conecta, "SELECT * FROM `quest`.`avalia_tb` WHERE (pergunta6 = 'rede social') and loja like '%$filtro%' and data_criacao between '$de' and '$ate'");
      $p8 = mysqli_num_rows($query);
      $query = mysqli_query($conecta, "SELECT * FROM `quest`.`avalia_tb` WHERE (pergunta6 = 'indicacao') and loja like '%$filtro%' and data_criacao between '$de' and '$ate'");
      $p9 = mysqli_num_rows($query);
      $query = mysqli_query($conecta, "SELECT * FROM `quest`.`avalia_tb` WHERE (pergunta6 = 'passando') and loja like '%$filtro%' and data_criacao between '$de' and '$ate'");
      $p10 = mysqli_num_rows($query);
      $query = mysqli_query($conecta, "SELECT * FROM `quest`.`avalia_tb` WHERE (pergunta6 = 'cliente') and loja like '%$filtro%' and data_criacao between '$de' and '$ate'");
      $p11 = mysqli_num_rows($query);
      $query = mysqli_query($conecta, "SELECT * FROM `quest`.`avalia_tb` WHERE (pergunta6 = 'encarte') and loja like '%$filtro%' and data_criacao between '$de' and '$ate'");
      $p12 = mysqli_num_rows($query);
      if($total!=0){
        $percent1 = ($p1/$total)*100;
        $percent2 = ($p2/$total)*100;
        $percent3 = ($p3/$total)*100;
        $percent4 = ($p4/$total)*100;
        $percent5 = ($p5/$total)*100;
        $percent6 = ($p6/$total)*100;
        $percent7 = ($p7/$total)*100;
        $percent8 = ($p8/$total)*100;
        $percent9 = ($p9/$total)*100;
        $percent10 = ($p10/$total)*100;
        $percent11 = ($p11/$total)*100;
        $percent12 = ($p12/$total)*100;
      ?>
      <?php
        if($filtro!=null){
      ?>
      <div class="d-grid gap-2 col-6 mx-auto" style="margin-top:10px;">
        <div class="row">
          <h2 class="col-6">Loja: <?php echo $filtro; ?></h2>
          <h2 class="col-6">Avaliações: <?php echo $total; ?></h2>
        </div>
      </div>
      <?php
        }else{
      ?>
      <div class="d-grid gap-2 col-6 mx-auto" style="margin-top:10px;">
        <div class="row">
          <h2 class="col-6">Loja: Todas</h2>
          <h2 class="col-6">Avaliações: <?php echo $total; ?></h2>
        </div>
      </div>
      <?php
        }
      ?>
      <div class="d-grid gap-2 col-6 mx-auto" style="margin-top:10px;">
      <h3>Grau de Satisfação do Salão:</h3>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent1."%";?>" aria-valuemin="0" aria-valuemax="100"><?php echo (round($percent1, 2))."%";?></div>
      </div>
      <h3>Grau de Satisfação da Variedade de Produtos:</h3>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent2."%";?>" aria-valuemin="0" aria-valuemax="100"><?php echo (round($percent2, 2))."%";?></div>
      </div>
      <h3>Grau de Satisfação de Frente de Caixa:</h3>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent3."%";?>" aria-valuemin="0" aria-valuemax="100"><?php echo (round($percent3, 2))."%";?></div>
      </div>
      <h3>Grau de Satisfação da Limpeza:</h3>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent4."%";?>" aria-valuemin="0" aria-valuemax="100"><?php echo (round($percent4, 2))."%";?></div>
      </div>
      <h3>Grau de Satisfação dos Vendedores:</h3>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent5."%";?>" aria-valuemin="0" aria-valuemax="100"><?php echo (round($percent5, 2))."%";?></div>
      </div>
      <div class="" style="margin-top:10px;">
        <div class="row">
          <h2 class="col" style="text-align:center;">Captura de Clientes</h2>
        </div>
      </div>
      </div>
      <div class="d-grid gap-2 col-6 mx-auto" style="margin-top:10px;">
      <h3>Pela TV:</h3>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent6."%";?>" aria-valuemin="0" aria-valuemax="100"><?php echo (round($percent6, 2))."%";?></div>
      </div>
      <h3>Pela Rádio:</h3>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent7."%";?>" aria-valuemin="0" aria-valuemax="100"><?php echo (round($percent7, 2))."%";?></div>
      </div>
      <h3>Por Rede Social:</h3>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent8."%";?>" aria-valuemin="0" aria-valuemax="100"><?php echo (round($percent8, 2))."%";?></div>
      </div>
      <h3>Por Indicação:</h3>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent9."%";?>" aria-valuemin="0" aria-valuemax="100"><?php echo (round($percent9, 2))."%";?></div>
      </div>
      <h3>Encarte Promocional:</h3>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent12."%";?>" aria-valuemin="0" aria-valuemax="100"><?php echo (round($percent12, 2))."%";?></div>
      </div>
      <h3>Por ter passado em frente:</h3>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent10."%";?>" aria-valuemin="0" aria-valuemax="100"><?php echo (round($percent10, 2))."%";?></div>
      </div>
      <h3>Já é cliente:</h3>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent11."%";?>" aria-valuemin="0" aria-valuemax="100"><?php echo (round($percent11, 2))."%";?></div>
      </div>
      </div>
      <?php } ?>
    
      <div class="container theme-showcase" style="margin-top: 20px;" role="main">
      <!-- <div class="page-header">
				<h1>Listar Cursos</h1>
			</div> -->
      
      <div class="row">
        <div class="container">
			<h2 style="text-align: center">Lista de Avaliações</h2>
      <div style="display:flex;justify-content:right;">
      <a href="gerar_planilha.php?codigo=<?php echo $filtro ?>&&de=<?php echo $de ?>&&ate=<?php echo $ate ?>"><button type='button' class='btn btn-sm btn-success'>Gerar Excel</button></a>
    </div>
			<span id="msg"></span>
            <span id="conteudo"></span><br>
		</div>
				<div class="col-12">
    <table class="table table-warning table-hover" style="border: 1px solid">
    <thead>
    <tr style="text-align:center;">
      <th>ID</th>
      <th>Salão</th>
      <th>Variedade de Produtos</th>
      <th>Frente de Caixa</th>
      <th>Limpeza</th>
      <th>Vendedores</th>
      <th>Loja</th>
      <th>Nome Cliente</th>
      <th>Telefone Cliente</th>
      <th>Comentário</th>
      <th>Setor</th>
      <th>Data</th>
      <th>Ação</th>
    </tr>
  </thead>
    <?php
      while($lista = mysqli_fetch_assoc($fil_con)){
    ?>
    <!-- <div class="card-container">    
      <div class="lower-container">
        <div>
          <h3><?php echo $lista["nome_cliente"]; ?></h3>
          <p>Data Entrega: <?php echo implode('/',array_reverse(explode('-',$lista["data_entrega"]))); ?></p>
          <h4>Endereço: <?php echo $lista["endereco"]; ?></h4>
        </div>
        <div>
          <p>Produto: <?php echo $lista["produto"]; ?></p>
        </div>
        <div>
          <p>Valor: <?php echo $lista["valor"]; ?></p>
        </div>
        <div>
          <a href="../detalhe/detalhe.php?codigo=<?php echo $lista["chamado_id"] ?>" class="btn">Detalhes</a>
        </div>
      </div>
    </div> -->
  <tbody>
  <tr style="text-align:center;">
      <th><?php echo $lista["avalia_id"]; ?></th>
      <td><?php echo $lista["pergunta1"]; ?></td>
      <td><?php echo $lista["pergunta2"]; ?></td>
      <td><?php echo $lista["pergunta3"]; ?></td>
      <td><?php echo $lista["pergunta4"]; ?></td>
      <td><?php echo $lista["pergunta5"]; ?></td>
      <td><?php echo $lista["loja"]; ?></td>
      <td><?php echo $lista["nome"]; ?></td>
      <td><?php echo $lista["telefone"]; ?></td>
      <td><?php echo $lista["comentario"]; ?></td>
      <td><?php echo $lista["comentario1"]; ?></td>
      <td><?php echo $lista["data_criacao"]; ?></td>
      <td>
        <button type="button" class="btn btn-outline-warning view_data" id="<?php echo $lista["avalia_id"]; ?>">Visualizar</button>
      </td>
    </tr>
  
    <?php
        }
          }
    ?>

  </section>
    <!-- <section></section> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
  <script type="text/javascript">
    $(document).ready(function(){
				$(document).on('click','.view_data', function(){
					var user_id = $(this).attr("id");
					//alert(user_id);
					//Verificar se há valor na variável "user_id".
					if(user_id !== ''){
						var dados = {
							user_id: user_id
						};
						$.post('visualizar.php', dados, function(retorna){
							//Carregar o conteúdo para o usuário
							$("#visul_usuario").html(retorna);
							$('#visulUsuarioModal').modal('show'); 
						});
					}
				});
				$(document).on('click','.status', function(){
					var status_id = $(this).attr("id");
					//alert(user_id);
					//Verificar se há valor na variável "user_id".
					if(status_id !== ''){
						var status = {
							status_id: status_id
						};
						$.post('cadastrar.php', status, function(retorna){
							//Carregar o conteúdo para o usuário
							$("#msg").html('<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso!</div>');
              
              $('#visulUsuarioModal').modal('hide');
						});
					}
				});
        $(document).on('click','.excel', function(){
					var excel_id = $(this).attr("id");
					//alert(user_id);
					//Verificar se há valor na variável "user_id".
					if(excel_id !== ''){
						var dados = {
							excel_id: excel_id
						};
						$.post('gerar_planilha.php', dados, function(retorna){
							//Carregar o conteúdo para o usuário
							// $("#visul_usuario").html(retorna);
							// $('#visulUsuarioModal').modal('show'); 
						});
					}
				});
			});
  </script>
</html>
