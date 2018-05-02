<?php
$dados_previos_request = $_REQUEST;
//Retira o num_pedido do array
unset($dados_previos_request['num_pedido']);

//Sempre setar o ID da venda correto
$dados_previos_request['id_venda']=$venda['id_venda'];
//print_r($dados_previos_request);

$dados_previo = smartSQL($_SERVER['REQUEST_METHOD'],$dados_previos_request ,'dado_previo','id_venda');
//print_r($dados_previo[0]);
$smarty->assign("dados_previo", $dados_previo[0]);


 ?>
