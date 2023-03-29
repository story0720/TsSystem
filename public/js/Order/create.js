function count() {
    var Estimatedquantity = $("input[name='Estimatedquantity']").val();
    var Unitprice = $("input[name='Unitprice']").val();
    $('#Count').val(Estimatedquantity * Unitprice);
}

// 20230325 增加
$(function () {
    $('select[name="TradeType"]').on('change', function () {
        if ($(this).val() !== "") {
            $('div[data-type="TradeNameFake"]').addClass('d-none');
            $('select[name="TradeName"]').removeClass('d-none');
        } else {
            $('div[data-type="TradeNameFake"]').removeClass('d-none');
            $('select[name="TradeName"]').addClass('d-none');
        }
    });
    $('select[name="CategoryName"]').on('change', function () {
        if ($(this).val() !== "") {
            $('div[data-type="specificationFake"]').addClass('d-none');
            $('select[data-type="specificationTrue"]').removeClass('d-none');
        } else {
            $('div[data-type="specificationFake"]').removeClass('d-none');
            $('select[data-type="specificationTrue"]').addClass('d-none');
        }
    });
    $('select[name="drillingType"]').on('change', function () {
        if ($(this).val() == "1") {
            $('div[data-type="drillingAmountFake"]').removeClass('d-none');
            $('input[data-type="drillingAmountTrue"]').addClass('d-none');
            $('div[data-type="drillingPriceFake"]').addClass('d-none');
            $('input[data-type="drillingPriceTrue"]').removeClass('d-none');
        } else if ($(this).val() == "2") {
            $('div[data-type="drillingAmountFake"]').addClass('d-none');
            $('input[data-type="drillingAmountTrue"]').removeClass('d-none');
            $('div[data-type="drillingPriceFake"]').addClass('d-none');
            $('input[data-type="drillingPriceTrue"]').removeClass('d-none');
        } else {
            $('div[data-type="drillingAmountFake"]').removeClass('d-none');
            $('input[data-type="drillingAmountTrue"]').addClass('d-none');
            $('div[data-type="drillingPriceFake"]').removeClass('d-none');
            $('input[data-type="drillingPriceTrue"]').addClass('d-none');
        }
    });
    $('select[name="groove"]').on('change', function () {
        if ($(this).val() !== "1") {
            $('div[data-type="groovePriceFake"]').addClass('d-none');
            $('input[data-type="groovePriceTrue"]').removeClass('d-none');
        } else {
            $('div[data-type="groovePriceFake"]').removeClass('d-none');
            $('input[data-type="groovePriceTrue"]').addClass('d-none');
        }
    });
});
// 20230325 增加