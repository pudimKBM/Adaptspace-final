<?php
  
  
header("access-control-allow-origin: https://pagseguro.uol.com.br");
header("Content-Type: text/html; charset=UTF-8",true);
date_default_timezone_set('America/Sao_Paulo');
include '../db.php';
require_once("PagSeguro.class.php");
$PagSeguro = new PagSeguro();
$queryusers = "SELECT*
FROM product, command
WHERE statut='ordered' AND id_user = 8 GROUP BY command.id";
    $resultusers = $connection->query($queryusers);
    
    if ($resultusers->num_rows > 0) {
		$x = 1;
     while ($rowitens = $resultusers->fetch_assoc()) {
            $id = $rowitens['id_produit'];
            $nome = $rowitens['name'];
            $quantidade = $rowitens['quantity'];
			$price = $rowitens['price'];
			$x ++;
     }
}
//EFETUAR PAGAMENTO	
$venda = array("codigo"=>"E105F5A60F4B4B23B388570BF17DCC26",
			   "valor"=>0.01,
			   "descricao"=>"VENDA DE NONONONONONO",
			   "nome"=>"",
			   "email"=>"",
			   "telefone"=>"11986964243",
			   "rua"=>"comndeador",
			   "numero"=>"444",
			   "bairro"=>"cax",
			   "cidade"=>"SP",
			   "estado"=>"SP", //2 LETRAS MAIÚSCULAS
			   "cep"=>"05516000",
			   "codigo_pagseguro"=>"");
			   
$PagSeguro->executeCheckout($venda,"http://adaptspace.com.br/pedido/".$_GET['codigo']);

//----------------------------------------------------------------------------


//RECEBER RETORNO
if( isset($_GET['transaction_id']) ){
	$pagamento = $PagSeguro->getStatusByReference($_GET['codigo']);
	
	$pagamento->codigo_pagseguro = $_GET['transaction_id'];
	if($pagamento->status==3 || $pagamento->status==4){
		//ATUALIZAR DADOS DA VENDA, COMO DATA DO PAGAMENTO E STATUS DO PAGAMENTO
		
	}else{
		//ATUALIZAR NA BASE DE DADOS
	}
}

?>