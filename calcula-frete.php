<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Calculando Frete dos Correios</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">


    </head>
    <body>

        <form>
            Cep destino = <input id="cep_destino" type="text" value="" maxlength="8"/> <br><br>

            Valor do Produto = <input id="valor_pro" type="text" value="22,20"/> <br><br>

            Valor do Frete = <input id="valor_frete" type="text" value=""/> <br><br>
            
            
             Valor do Prod + Frete = <input id="valor_prodfrete" type="text" value="" /> <br><br>

            <button type="button" onclick="LoadFrete();">Calcular Frete</button>

        </form>



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="frete.js"></script>
    </body>
</html>
