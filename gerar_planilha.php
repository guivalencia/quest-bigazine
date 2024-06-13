<!--**
 * @author Cesar Szpak - Celke -   cesar@celke.com.br
 * @pagina desenvolvida usando framework bootstrap,
 * o código é aberto e o uso é free,
 * porém lembre -se de conceder os créditos ao desenvolvedor.
 *-->
 <?php require_once("../conexao/conexao.php"); ?>

 <?php
	session_start();
	if(!isset($_SESSION["user_portal"])){
        header("location:../index.php");
      }
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Contato</title>
	<head>
	<body>
		<?php
		if(isset($_GET["codigo"])){
			$filtro = $_GET["codigo"];
			$de = $_GET["de"];
			$ate = $_GET["ate"];
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'msgcontatos.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		// $html .= '<tr>';
		// $html .= '<td colspan="8">Planilha Mensagem de Contatos</tr>';
		// $html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Salão</b></td>';
		$html .= '<td><b>Variedade de Produtos</b></td>';
		$html .= '<td><b>Frente de Caixa</b></td>';
		$html .= '<td><b>Limpeza</b></td>';
		$html .= '<td><b>Vendedores</b></td>';
		$html .= '<td><b>Loja</b></td>';
		$html .= '<td><b>Data</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$result_msg_contatos = "SELECT `avalia_tb`.`avalia_id`,
		`avalia_tb`.`pergunta1`,
		`avalia_tb`.`pergunta2`,
		`avalia_tb`.`pergunta3`,
		`avalia_tb`.`pergunta4`,
		`avalia_tb`.`pergunta5`,
		`avalia_tb`.`comentario`,
		`avalia_tb`.`loja`,
		`avalia_tb`.`data_criacao`
	FROM `quest`.`avalia_tb` WHERE loja like '%$filtro%' and data_criacao >= '$de' and data_criacao <='$ate' order by avalia_id desc;";
		$resultado_msg_contatos = mysqli_query($conecta , $result_msg_contatos);
		
		while($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)){
			$html .= '<tr>';
			$html .= '<td>'.$row_msg_contatos["avalia_id"].'</td>';
			$html .= '<td>'.$row_msg_contatos["pergunta1"].'</td>';
			$html .= '<td>'.$row_msg_contatos["pergunta2"].'</td>';
			$html .= '<td>'.$row_msg_contatos["pergunta3"].'</td>';
			$html .= '<td>'.$row_msg_contatos["pergunta4"].'</td>';
			$html .= '<td>'.$row_msg_contatos["pergunta5"].'</td>';
			$html .= '<td>'.$row_msg_contatos["loja"].'</td>';
			$data = date('d/m/Y',strtotime($row_msg_contatos["data_criacao"]));
			$html .= '<td>'.$data.'</td>';
			$html .= '</tr>';
			;
		}
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; }?>
	</body>
</html>