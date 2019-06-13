function LoadFrete() {

    var cep_destino = $('#cep_destino').val();
    var cep_qtd = 0;
    $(".qtd_input").each((i, item) => {
        cep_qtd += parseInt($(item).val());
    });
    console.log(cep_qtd);

    $.ajax({
        url: 'a_frete.php',
        type: 'POST',
        dataType: 'html',
        cache: false,
        data: { cep_destino: cep_destino, cep_qtd: cep_qtd },
        success: function (data) {

            console.log('Valor = ' + data);

            data = data.replace(',', '.');
            $('#valor_frete').val(data);
            $('#val').attr('value', data);
            $('#valor_frete').text(data);
            $('#val').text(data);

            $("#totalcheckout").attr('value', parseFloat($("#subtotal").text()) + parseFloat(data));
            $("#totalcheckout").val(parseFloat($("#subtotal").text()) + parseFloat(data));

            //var total = parseFloat(data) + parseFloat(val_prod);





        }, beforeSend: function () {

        }, error: function (jqXHR, textStatus, errorThrown) {
            console.log('Erro');

        }
    });
}


function updateCart(input) {
    var qtd = input.val();
    var command = input.data("idcommand");
    var id_product = input.data("idproduct");
    console.log(qtd);
    console.log(command);
    console.log(id_product);
    $.ajax({
        url: 'includes/update-cart.php',
        type: 'POST',
        dataType: 'html',
        cache: false,
        data: { command: command, id_product: id_product, qtd: qtd },
        success: function (data) {
            console.log(data);

        }, beforeSend: function () {

        }, error: function (errorThrown) {
            console.log(errorThrown);

        }
    });

    LoadFrete();
}

function recalcTotal() {
    total = 0;
    $(".qtd_input").each((i, item) => {
        total += parseInt($(item).val()) * parseFloat($(item).data("price"));
    });
    $("#subtotal").text(total.toFixed(2));
    $("#totalcheckout").attr('value', (total + parseFloat($('#valor_frete').val())).toFixed(2));
}
