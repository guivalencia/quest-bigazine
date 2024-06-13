<?php require_once("../conexao/conexao.php"); ?>
<?php
if(isset($_POST["user_id"])){
	
	$resultado = '';
	
	$query_user = "SELECT `avalia_tb`.`avalia_id`,
						  `avalia_tb`.`pergunta1`,
						  `avalia_tb`.`pergunta2`,
						  `avalia_tb`.`pergunta3`,
						  `avalia_tb`.`pergunta4`,
						  `avalia_tb`.`pergunta5`,
						  `avalia_tb`.`pergunta6`,
						  `avalia_tb`.`comentario`,
						  `avalia_tb`.`loja`,
						  `avalia_tb`.`nome`,
						  `avalia_tb`.`telefone`,
						  `avalia_tb`.`comentario`,
						  `avalia_tb`.`comentario1`,
						  `avalia_tb`.`data_criacao` 
					FROM `quest`.`avalia_tb` WHERE avalia_id = '" . $_POST["user_id"] . "' LIMIT 1";
	$resultado_user = mysqli_query($conecta, $query_user);
	$row_user = mysqli_fetch_assoc($resultado_user);
	
	$resultado .= '<dl class="row">';
	
	$resultado .= '<dt class="col-5">ID</dt>';
	$resultado .= '<dd class="col-4">'.$row_user['avalia_id'].'</dd>';
	
	$resultado .= '<dt class="col-5">Salão</dt>';
	$resultado .= '<dd class="col-4">'.$row_user['pergunta1'].'</dd>';

	$resultado .= '<dt class="col-5">Variedade de Produtos</dt>';
	$resultado .= '<dd class="col-4">'.$row_user['pergunta2'].'</dd>';

	$resultado .= '<dt class="col-5">Frente de Caixa</dt>';
	$resultado .= '<dd class="col-4">'.$row_user['pergunta3'].'</dd>';

	$resultado .= '<dt class="col-md-5">Limpeza</dt>';
	$resultado .= '<dd class="col-md-4">'.$row_user['pergunta4'].'</dd>';

	$resultado .= '<dt class="col-md-5">Vendedores</dt>';
	$resultado .= '<dd class="col-md-4">'.$row_user['pergunta5'].'</dd>';

	$resultado .= '<dt class="col-md-5">Conheceu a loja</dt>';
	$resultado .= '<dd class="col-md-4">'.$row_user['pergunta6'].'</dd>';

	$resultado .= '<dt class="col-md-5">Loja</dt>';
	$resultado .= '<dd class="col-md-4">'.$row_user['loja'].'</dd>';

	$resultado .= '<dt class="col-md-5">Nome Cliente:</dt>';
	$resultado .= '<dd class="col-md-4">'.$row_user['nome'].'</dd>';

	$resultado .= '<dt class="col-md-5">Telefone Cliente:</dt>';
	$resultado .= '<dd class="col-md-4">'.$row_user['telefone'].'</dd>';

	$resultado .= '<dt class="col-md-5">Observação:</dt>';
	$resultado .= '<dd class="col-md-4">'.$row_user['comentario'].'</dd>';
		
	$resultado .= '<dt class="col-md-5">Observação sobre Setor:</dt>';
	$resultado .= '<dd class="col-md-4">'.$row_user['comentario1'].'</dd>';
		
	$resultado .= '</dl>';
	
	echo $resultado;
}