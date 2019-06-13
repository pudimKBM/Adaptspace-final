
// var countDownDate
// var valueSelect = $("#tshirttype").val();
// var priceSelected = false;
// var dateSelected = false;
// var dataInicio = document.getElementById("dataInicio");
// var dataFinal = document.getElementById("dataFinal");
// var dataFinal1 = document.getElementById("dataFinal1");
// var dataFinal2 = document.getElementById("dataFinal2");
// var dataFinal3 = document.getElementById("dataFinal3");
// var dataf = document.getElementById("expdatef");
// var event = new Event("focusout");
// dataInicio.dispatchEvent(event);
// dataInicio.addEventListener("focusout", function (event) {
// var offset = new Date().getTimezoneOffset();
// var data = new Date(dataInicio.value);
// var data2 = new Date(dataInicio.value);
// var data3 = new Date(dataInicio.value);
// data.setMinutes(data.getMinutes() + offset);
// data2.setMinutes(data.getMinutes() + offset);
// data3.setMinutes(data.getMinutes() + offset);
// data.setDate(data.getDate() + 8);
// data2.setDate(data2.getDate() + 15);
// data3.setDate(data3.getDate() + 22);
// dataFinal.value = data.toISOString().substring(0, 10);
// dataFinal1.value = data2.toISOString().substring(0, 10);
// dataFinal2.value = data3.toISOString().substring(0, 10);





$(document).ready(function () {
    $('#np').on('change', function () {
        var nome = $('#np').val();
        $('#n').text(nome);
        $('#namef').val(nome);
    });

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
        $("#prevFinish").show();
        $('#canvas-area').removeClass("border border-dark");

        html2canvas($('#shirtDiv').get(0)).then(function (canvas) {
            setTimeout(function () {
                var data = canvas.toDataURL();
                $('#canvas-area').addClass("border border-dark");

                $("#shirtFinish").attr('src', data);
                $("#imagef1").val(data);
                canvas = document.getElementById("canvas");
                var img_no_shirt = canvas.toDataURL();
                $("#imagef2").val(img_no_shirt);
            }, 200);
            $("#carouselExampleControls").carousel('next');
        });
    });

    $("#prevFinish").click(function () {
        $("#nextShirt").show();
        $(this).hide();
    });
});
