<?php

//Capital social
if(isset($_POST['alt-capital-social']))
{
//  print_r($_REQUEST);
  foreach ($_REQUEST as $key => $value) {
    //Se o parâmetro for um campo capital social, deverá realizar o ajuste dos dados no banco de dados
    if(strpos($key, "capital_social_")===0){
      $id_vinculo = substr($key, 15);
      //Dados para atualizar
      $updade = array(
          "id_vinculo"=>$id_vinculo,
          "capital_social"=>$value,
          "alt"=>""
      );

      smartSQL("POST",$updade ,'dados_vinculo_previo','id_vinculo');
      //header("location: {$gConfig['site_url']}minhaconta/formulario?num_pedido={$_REQUEST['num_pedido']}");
      postPHP("{$gConfig['site_url']}minhaconta/formulario",array('num_pedido' => $_REQUEST['num_pedido'],'tab' => 'tab-capital-social'));

    }
  }
}

  $capitalSocialList = smartSQL("GET",['id_venda'=>$venda['id_venda']] ,'dados_vinculo_previo','id_venda',null," and (nat_vinculo like 'socios-adminitrador' OR nat_vinculo like 'socio')");

  $total_percentual = 0;

  //Somar o total percentual dos sócios
  foreach ($capitalSocialList as $item)
  {
    $total_percentual += $item["capital_social"];
  }

  //Calculando o percentual já atribuído
  if($dados_previo[0]["capital_social"]==0){
    $total_percentual = 0;
  }else{
    $total_percentual = number_format(($total_percentual/$dados_previo[0]["capital_social"])*100,2);
  }


  //  print_r($socios);
  $smarty->assign("total_percentual", $total_percentual);

  $smarty->assign("capitalSocialList", $capitalSocialList);



?>
