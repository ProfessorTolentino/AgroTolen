<?php

$contratoDB = smartSQL("GET",['id_contrato'=>'1'],'contrato','id_contrato');

//Substituir o nome do usuário no contrato
$contrato = str_replace("[[user]]", $_SESSION['userfullname'], $contratoDB[0]['texto_contrato']);

$contrato = str_replace("[[endereco_usuario]]", " Rua cobre, 200 - Belo Horizonte", $contrato);

$smarty->assign("contrato", $contrato);

 ?>
