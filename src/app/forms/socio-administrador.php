<?php

$socios_request = $_REQUEST;
//Retira o num_pedido do array
unset($socios_request['num_pedido']);

//Sempre setar o ID da venda correto
$socios_request['id_venda']=$venda['id_venda'];

if(isset($_POST['add-socio']))
{
  //Retira add do array
  unset($socios_request['add-socio']);
  //Inserir add no array
  $socios_request['add']='';
  //Inserir
  smartSQL($_SERVER['REQUEST_METHOD'],$socios_request ,'dados_vinculo_previo','id_vinculo');
}else if(isset($_POST['alt-socio'])){
  //Retira add do array
  unset($socios_request['alt-socio']);
  //Inserir add no array
  $socios_request['alt']='';
  //Inserir
  smartSQL($_SERVER['REQUEST_METHOD'],$socios_request ,'dados_vinculo_previo','id_vinculo');
}else if(isset($_POST['del-socio'])){
  //Retira add do array
  unset($socios_request['del-socio']);
  //Inserir add no array
  $socios_request['del']='';
  //Inserir
  smartSQL($_SERVER['REQUEST_METHOD'],$socios_request ,'dados_vinculo_previo','id_vinculo');
}


$socios = smartSQL("GET",$socios_request ,'dados_vinculo_previo','id_venda','nome_vinculado');

$smarty->assign("socioList", $socios);
?>
