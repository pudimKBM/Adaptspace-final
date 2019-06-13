<?php

$cep_destino = trim($_POST['cep_destino']);


$cep_qtd = $_POST['cep_qtd'];

function calcula_frete($cep_origem, $cep_destino, $peso, $valor, $tipo_frete, $altura = 2, $largura = 11, $comprimento = 16) {

    $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
    $url .= "&nCdEmpresa=";
    $url .= "&sDsSenha=";
    $url .= "&nCdServico=" . $tipo_frete;
    $url .= "&sCepOrigem=" . $cep_origem;
    $url .= "&sCepDestino=" . $cep_destino;
    $url .= "&nVlPeso=" . $peso;
    $url .= "&nCdFormato=1";
    $url .= "&nVlComprimento=" . $comprimento;
    $url .= "&nVlAltura=" . $altura;
    $url .= "&nVlLargura=" . $largura;
    $url .= "&nVlDiametro=0";
    $url .= "&sCdMaoPropria=N";
    $url .= "&nVlValorDeclarado=" . $valor;
    $url .= "&sCdAvisoRecebimento=N";
    $url .= "&StrRetorno=xml";
    $url .= "&nIndicaCalculo=3";

    $xml = simplexml_load_file($url);

    return $xml->cServico;
}
//   echo '<pre>';
//   print_r(calcula_frete('05516000', $cep_destino, 5, 2000, '04510'));
//      echo '</pre>'; 
$dados = calcula_frete('01307012', $cep_destino, 0.31 * $cep_qtd , 0, '04510');

echo $dados->Valor;
