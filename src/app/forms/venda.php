<?php

$venda = mysql_fetch_assoc(mysql_query("SELECT venda.*,status_venda.desc_status, produto.nome_produto, produto.botao_pagseguro FROM `venda`
	                                         LEFT JOIN status_venda on venda.id_status = status_venda.id_status
                                           LEFT JOIN produto on venda.id_produto = produto.id_produto
                                          WHERE `id_cliente` = ".mysql_real_escape_string($_SESSION['userID'])." and num_pedido=".mysql_real_escape_string($_GET['num_pedido'])));

//Verifica se o pedido pertence ao usuário logado
if(empty($venda))
{
 header("location: {$gConfig['site_url']}minhaconta");
 die();
}
$smarty->assign("venda", $venda);


 ?>
