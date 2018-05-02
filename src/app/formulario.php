<?php

include("../include_php/minhaconta_init.php");

$smarty->assign("site_title",  t("DASH|ALL|Painel-Admin")." :: Formulários");
$smarty->assign("page_header_text",  $gConfig['site_title'].'Formulários');

//Verifica se tem pedido selecionado
if(!isset($_REQUEST['num_pedido']))
{
  header("location: {$gConfig['site_url']}minhaconta");
  die();
}

//Informar qual é a aba selecionada
if(isset($_REQUEST['tab']))
{
  $smarty->assign("tab", $_REQUEST['tab']);
  unset($_REQUEST['tab']);
}else{
  $smarty->assign("tab", "denominacao");

}


//Carregar informação da Venda
include("forms/venda.php");

//Carregar dados prévio da empresa
include("forms/dados-previo.php");

//Carregar a minuta do contrato
include("forms/contrato.php");

//Carregar a minuta do contrato
include("forms/socio-administrador.php");

//Capital social
include("forms/capital-social.php");

$smarty->assign("num_pedido", $_REQUEST['num_pedido']);

$smarty->display('formulario.tpl');
?>
