
var countDownDate
var valueSelect = $("#tshirttype").val();
var priceSelected = false;
var dateSelected = false;
var dataInicio = document.getElementById("dataInicio");
var dataFinal = document.getElementById("dataFinal");
var dataFinal1 = document.getElementById("dataFinal1");
var dataFinal2 = document.getElementById("dataFinal2");
var dataFinal3 = document.getElementById("dataFinal3");
var dataf = document.getElementById("expdatef");
// var event = new Event("focusout");
// dataInicio.dispatchEvent(event);
// dataInicio.addEventListener("focusout", function (event) {
var offset = new Date().getTimezoneOffset();
var data = new Date(dataInicio.value);
var data2 = new Date(dataInicio.value);
var data3 = new Date(dataInicio.value);
data.setMinutes(data.getMinutes() + offset);
data2.setMinutes(data.getMinutes() + offset);
data3.setMinutes(data.getMinutes() + offset);
data.setDate(data.getDate() + 8);
data2.setDate(data2.getDate() + 15);
data3.setDate(data3.getDate() + 22);
dataFinal.value = data.toISOString().substring(0, 10);
dataFinal1.value = data2.toISOString().substring(0, 10);
dataFinal2.value = data3.toISOString().substring(0, 10);

// });

$(document).ready(function () {

    $('#d7').on('click', function () {

        $("#expdatef").val($("#dataFinal").val());
        dateSelected = true;

    });
    $('#d14').on('click', function () {

        $("#expdatef").val($("#dataFinal1").val());
        dateSelected = true;
    });
    $('#d21').on('click', function () {
        $("#expdatef").val($("#dataFinal2").val());
        dateSelected = true;
    });

});




$(document).ready(function () {
    $("#Prc").on('change', function () {

        if ($("#Prc").val() < 45) {
            $(this).val(45);
            //soltar warning
        }
        priceSelected = true;
        var price = $(this).val();
        var price = parseFloat(price);

        //x = valor fixo ou de custo
        var x = 45.00;

        var profit = parseFloat(price) - x;

        $('#prcf').val(profit);
        $('#prcf2').val(price);
        $("#val").text("R$" + profit);
        //var value = profit;
        var c = parseFloat(profit).toFixed(2);
        $("#val").text("R$" + c);
        var d = parseFloat((profit * 0.03) + profit).toFixed(2);
        var e = parseFloat((profit * 0.06) + profit).toFixed(2);
        var f = parseFloat((profit * 0.09) + profit).toFixed(2);
        var g = parseFloat((profit * 0.12) + profit).toFixed(2);
        var h = parseFloat((profit * 0.15) + profit).toFixed(2);
        var i = parseFloat((profit * 0.18) + profit).toFixed(2);
        var j = parseFloat((profit * 0.21) + profit).toFixed(2);
        var k = parseFloat((profit * 0.24) + profit).toFixed(2);
        var l = parseFloat((profit * 0.27) + profit).toFixed(2);
        var m = parseFloat((profit * 0.30) + profit).toFixed(2);
        var c1 = FormatMoney(parseFloat(c * 50).toFixed(2), '', '', '.', ',', 0, 2);
        var d1 = FormatMoney(parseFloat(d * 100).toFixed(2), '', '', '.', ',', 0, 2);
        var e1 = FormatMoney(parseFloat(e * 150).toFixed(2), '', '', '.', ',', 0, 2);
        var f1 = FormatMoney(parseFloat(f * 200).toFixed(2), '', '', '.', ',', 0, 2);
        var g1 = FormatMoney(parseFloat(g * 250).toFixed(2), '', '', '.', ',', 0, 2);
        var h1 = FormatMoney(parseFloat(h * 300).toFixed(2), '', '', '.', ',', 0, 2);
        var i1 = FormatMoney(parseFloat(i * 350).toFixed(2), '', '', '.', ',', 0, 2);
        var j1 = FormatMoney(parseFloat(j * 400).toFixed(2), '', '', '.', ',', 0, 2);
        var k1 = FormatMoney(parseFloat(k * 450).toFixed(2), '', '', '.', ',', 0, 2);
        var l1 = FormatMoney(parseFloat(l * 500).toFixed(2), '', '', '.', ',', 0, 2);
        var m1 = FormatMoney(parseFloat(m * 502).toFixed(2), '', '', '.', ',', 0, 2);
        $("#c").text("R$" + c);
        $("#d").text("R$" + d);
        $("#e").text("R$" + e);
        $("#f").text("R$" + f);
        $("#g").text("R$" + g);
        $("#h").text("R$" + h);
        $("#i").text("R$" + i);
        $("#j").text("R$" + j);
        $("#k").text("R$" + k);
        $("#l").text("R$" + l);
        $("#m").text("R$" + m);

        //area dos totais

        $("#c2").text("R$" + c1);
        $("#d2").text("R$" + d1);
        $("#e2").text("R$" + e1);
        $("#f2").text("R$" + f1);
        $("#g2").text("R$" + g1);
        $("#h2").text("R$" + h1);
        $("#i2").text("R$" + i1);
        $("#j2").text("R$" + j1);
        $("#k2").text("R$" + k1);
        $("#l2").text("R$" + l1);
        $("#m2").text("Infinito e além");
        $("#prc").text("R$" + $('#Prc').val());
        $("#preço").text("R$" + parseFloat($('#Prc').val()).toFixed(2));

    })
})

$(document).ready(function () {
    $('#np').on('change', function () {
        var nome = $('#np').val();
        $('#n').text(nome);
        $('#namef').val(nome);
    })
    $('#dp').on('change', function () {
        var desc = $('#dp').val();
        $('#desc').text(desc);
        $('#descf').val(desc);
    })



})

$(document).ready(() => {

    $(function () {
        $('#color-picker').colorpicker({
            useHashPrefix: false
        });
    });
    $('#m-color').click(function () {
        $('#myModal').modal('show');
    });

    $("#nextShirt").click(function () {
        $(this).hide();
        $("#nextProfit").show();
        $("#prevProfit").show();
        $('#canvas-area').removeClass("border border-dark");
        html2canvas($('#shirtDiv').get(0)).then(function (canvas) {
            var data = canvas.toDataURL();
            $('#canvas-area').addClass("border border-dark");
            $("#shirtfinished").attr('src', data);
            $("#shirtFinish").attr('src', data);
            $("#imagef1").val(data);
            canvas = document.getElementById("canvas");
            var img_no_shirt = canvas.toDataURL();
            $("#imagef2").val(img_no_shirt);
        });
    });
    $("#nextProfit").click(function () {
        if (priceSelected && dateSelected) {
            $("#carouselExampleControls").carousel('next');
            $(this).hide();
            $("#prevProfit").hide();
            $("#prevFinish").show();
        } else {
            alert("Escolha uma duração para a campanha e um valor de venda.")
        }

    });

    $("#prevFinish").click(function () {
        $("#nextProfit").show();
        $(this).hide();
        $("#prevProfit").show();

    });
    $("#prevProfit").click(function () {
        $(this).hide();
        $("#nextProfit").hide();
        $("#nextShirt").show();
    });
    $("#finishBtn").click(function () {
        alert("Existe um periodo de 48 horas para a aprovação da campanha, a data de finalização da campanha será de acordo com a data de aprovação. =)")
    })
});
