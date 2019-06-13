<?php
session_start();
 

require_once "../../../../autoload.php";
require_once "../../../../../../db.php";
require_once "../Configuration/dynamicConfiguration.php";
\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");
$payment = new \PagSeguro\Domains\Requests\Payment();
$querysel=("SELECT product.name as 'name' , 
product.price as price ,
product.id as productid,
command.quantity as quantity,
command.id as cid
  
FROM `command`, product
where product.id = command.id_produit and command.statut = 'ordered' and id_user = {$_SESSION['id']}");


$name = trim($_POST['nome']);
$name2 = trim($_POST['nome2']);
$nasc = $_POST['nasc'];
$sex =  $_POST['sex'];
$email = trim( $_SESSION['email']);
$fone = trim($_POST['tel1']);
$cpf = trim($_POST['cpf']);
$rua = trim($_POST['rua']);
$numero = trim($_POST['numero']);
$bairo = trim($_POST['bairro']);
$cep = trim($_POST['cep']);
$cid =trim($_POST['cidade']);
$est = trim($_POST['est']);

$comp2 = trim($_POST['comp2']);
$comp = trim($_POST['comp']);
$pais = 'Brasil';
$fone2 =trim($_POST['tel2']);
$qins =  "INSERT INTO `pedidos`(`nome`, `sobrenome`, `nasc`, `sex`, `cpf`, `fone`, `fone2`,
`rua`, `numero_c`, `bairro`, `complemento`, `cid`, `est`, `pais`, `cep`, `id_usr`)
 VALUES ('$name','$name2','$nasc','$sex',$cpf,$fone,$fone2,'$rua',
$numero,'$bairo','$comp','$cid','$est','$pais','$cep','{$_SESSION['id']}')";
try{
    $connection->query($qins);

}catch(Exception $e){
   echo $e->getMessage();
   
}

$payment->setSender()->setName("$name $name2");
/**
 * Nome completo do comprador. Especifica o nome completo do comprador que está realizando o pagamento. Este campo é
 * opcional e você pode enviá-lo caso já tenha capturado os dados do comprador em seu sistema e queira evitar que ele
 * preencha esses dados novamente no PagSeguro.
 *
 * Presença: Opcional.
 * Tipo: Texto.
 * Formato: No mínimo duas sequências de caracteres, com o limite total de 50 caracteres.
 *
 * @var string $senderName
 * 
 */
$qccc = "SELECT * FROM pedidos where id_usr = {$_SESSION['id']} ORDER BY id_ped ASC LIMIT 1";
$rsqcc=  $connection->query($qccc);
if($rsqcc->num_rows >0 ){
    while ($qrsccR = $rsqcc->fetch_assoc()) {
        $id_ped = $qrsccR['id_ped'];
    }
}
$result = $connection->query($querysel);
if($result->num_rows >0 ){
    while($qsel = $result->fetch_assoc()){
        $name  =  $qsel['name'];
        $price  = $qsel['price'];
        $quantity = $qsel['quantity'];
        $pid = $qsel['productid'];
        $cid = $qsel['cid'];       
        $payment->addItems()->withParameters(
            "$pid",
            "$name",
            "$quantity",
            $price
        );
    $query =  "UPDATE command SET id_ped = $id_ped WHERE id= $cid";
   
}
}


/**
 * E-mail do comprador. Especifica o e-mail do comprador que está realizando o pagamento. Este campo é opcional e você
 * pode enviá-lo caso já tenha capturado os dados do comprador em seu sistema e queira evitar que ele preencha esses
 * dados novamente no PagSeguro.
 *
 * Presença: Opcional.
 * Tipo: Texto.
 * Formato: um e-mail válido (p.e., usuario@site.com.br), com no máximo 60 caracteres.
 *
 * @var string $senderEmail
 */
$payment->setSender()->setEmail("$email");
$ddd = substr($fone, 0,2);
$tel = substr($fone, 2,11);
/** @var \PagSeguro\Domains\Phone $phone */
$payment->setSender()->setPhone()->withParameters(
    $ddd,
    $tel
);

/** @var \PagSeguro\Domains\Document $document */
$payment->setSender()->setDocument()->withParameters(
    'CPF',
    $cpf
);

/** @var \PagSeguro\Domains\Address $address */
$payment->setShipping()->setAddress()->withParameters(
    "$rua",
    "$numero",
    "$bairo",
    "$cep",
    "$cid",
    strtoupper("$est"),
    'BRA',
    "$comp"
);

/** @var \PagSeguro\Domains\ShippingCost $shippingCost */

//   echo '<pre>';
//   print_r(calcula_frete('05516000', $cep_destino, 5, 2000, '04510'));
//      echo '</pre>'; 



$payment->setShipping()->setCost()->withParameters( $comp2);

/** @var \PagSeguro\Domains\ShippingType $shippingType */
$payment->setShipping()->setType()->withParameters(\PagSeguro\Enum\Shipping\Type::SEDEX);

/**
 * Lista de itens contidos na transação. O número de itens sob este elemento corresponde ao valor de itemCount.
 *
 * @var \PagSeguro\Domains\Item $item
 * @var array $items
 */


//$payment->setItems('caminhao azul');

/**
 * Moeda utilizada. Indica a moeda na qual o pagamento será feito. No momento, a única opção disponível é BRL (Real).
 *
 * Presença: Obrigatória.
 * Tipo: Texto.
 * Formato: Case sensitive. Somente o valor BRL é aceito.
 *
 * @var string $currency
 */
$payment->setCurrency('BRL');

/**
 * Valor extra. Especifica um valor extra que deve ser adicionado ou subtraído ao valor total do pagamento. Esse valor
 * pode representar uma taxa extra a ser cobrada no pagamento ou um desconto a ser concedido, caso o valor seja
 * negativo.
 *
 * Presença: Opcional.
 * Tipo: Número.
 * Formato: Decimal (positivo ou negativo), com duas casas decimais separadas por ponto (p.e., 1234.56 ou -1234.56),
 * maior ou igual a -9999999.00 e menor ou igual a 9999999.00. Quando negativo, este valor não pode ser maior ou igual
 * à soma dos valores dos produtos.
 *
 * @var string $extraAmount
 */


/**
 * Código de referência. Define um código para fazer referência ao pagamento. Este código fica associado à transação
 * criada pelo pagamento e é útil para vincular as transações do PagSeguro às vendas registradas no seu sistema.
 *
 * Presença: Opcional.
 * Tipo: Texto.
 * Formato: Livre, com o limite de 200 caracteres.
 *
 * @var string $reference
 */

$payment->setReference("$id_ped");

/**
 * URL de redirecionamento após o pagamento. Determina a URL para a qual o comprador será redirecionado após o final do
 * fluxo de pagamento. Este parâmetro permite que seja informado um endereço de específico para cada pagamento
 * realizado.
 *
 * Presença: Opcional.
 * Tipo: Texto.
 * Formato: Uma URL válida, com limite de 255 caracteres.
 *
 * @var string $redirectUrl
 */
//$payment->setRedirectUrl($redirectUrl);

/**
 * URL para envio de notificações sobre o pagamento. Determina a URL para a qual o PagSeguro enviará os códigos de
 * notificação relacionados ao pagamento. Toda vez que houver uma mudança no status da transação e que demandar sua
 * atenção, uma nova notificação será enviada para este endereço.
 *
 * Presença: Opcional.
 * Tipo: Texto.
 * Formato: Uma URL válida, com limite de 255 caracteres.
 *
 * @var string $notificationUrl
 */
//$payment->setNotificationUrl($notificationUrl);

/*
 * ???
 * Custom info
 */
//
//$payment->addParameter()->withParameters('itemId', "aaaaa")->index(3);
//$payment->addParameter()->withParameters('itemDescription', "aaaaa")->index(3);
//$payment->addParameter()->withParameters('itemQuantity', "3")->index(3);
//$payment->addParameter()->withParameters('itemAmount', "200.00")->index(3);
/*
 * ???
 * Exclude accepted payments methods group
 */


    
try {
    /** @var \PagSeguro\Domains\Requests\Payment $payment */
    $response = $payment->register(
        /** @var \PagSeguro\Domains\AccountCredentials | \PagSeguro\Domains\ApplicationCredentials $credential */
        \PagSeguro\Configuration\Configure::getAccountCredentials(),
        true
    );
} catch (Exception $e) {
    die($e->getMessage());
}

?>
<!DOCTYPE html>
<html>
<head>
    <script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:790770,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
<script src="https://unpkg.com/blip-chat-widget" type="text/javascript">
</script>
<script>
    (function () {
        window.onload = function () {
            new BlipChat()
            .withAppKey('YWRhcHRzcGFjZTpiZTk4M2QxZS0zY2VlLTQ4YTYtYmMwZS01ZGRiZjU1MDAwNzY=')
            .withButton({"color":"#6bd68e"})
            .build();
        }
    })();
</script>
<?php if (\PagSeguro\Configuration\Configure::getEnvironment()->getEnvironment() == "sandbox") {
    ?>
        <!--Para integração em ambiente de testes no Sandbox use este link-->
        <script type="text/javascript"
                src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js">
        </script>
<?php
} else {



?>
        
        <!--Para integração em ambiente de produção use este link-->
        <script type="text/javascript"
                src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js">
        </script>
<?php
} ?>
</head>
<body>
<!-- A irá exibir o modal para pagamento -->
<script>PagSeguroLightbox('<?= $response->getCode() ?>');</script>
</body>
</html>
