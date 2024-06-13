<?php require_once("../conexao/conexao.php"); ?>
<?php

if(isset($_POST["status_id"])){

	$stat = "UPDATE `nesql`.`chamado_tb` SET `ch_status_id` = 5 WHERE chamado_id = '". $_POST["status_id"] ."'";
	$stat_con = mysqli_query($conecta, $stat);
	if(!$stat_con){
        die("Falha no banco status");
    }
	echo true;
}