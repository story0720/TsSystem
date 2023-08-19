// 小計
function count() {
    var Estimatedquantity = $("input[name='Estimatedquantity']").val();
    var Unitprice = $("input[name='Unitprice']").val();
    $('#Count').val(Estimatedquantity * Unitprice);
}

$(function () {

    // // 頁面加載時加載加工方法
    // $.get('/api/categorynames', function(data) {
    //     data.forEach(category => {
    //         console.log(data);
    //         console.log(category.id);
    //         console.log(category.pr_categoryname);
    //         $('#categoryNames').append($('<option>', {
    //             value: category.id,
    //             text: category.pr_categoryname
    //         }));
    //     });
    // }).fail(function() {
    //     alert('Error fetching data.');
    // });

    $.get('/api/categorynames', function(data) {
        data.forEach(categoryName => {
            console.log(categoryName); // 應該打印出你的categoryName
    
            $('#categoryNames').append($('<option>', {
                value: categoryName, // 假設你想使用categoryName作為value
                text: categoryName  // 用categoryName作為option的文本
            }));
        });
    }).fail(function() {
        alert('Error fetching data.');
    });
    

    // // 監聽加工方法的變化以更新標準
    // $('#categoryNames').on('change', function() {
    //     const categoryName = $(this).val();
    //     $.get(`/api/standards/${categoryName}`, function(data) {
    //         $('#standards').empty().append('<option value="">請選擇標準...</option>');
    //         data.forEach(standard => {
    //             $('#standards').append($('<option>', {
    //                 value: standard.id,
    //                 text: standard.pr_standard
    //             }));
    //         });
    //     });
    // });

    $('#categoryNames').on('change', function() {
        const categoryName = $(this).val();
        console.log(categoryName);
        $.get(`/api/standards/${categoryName}`, function(data) {
            $('#standards').empty().append('<option value="">請選擇標準...</option>');
            data.forEach(standard => {
                $('#standards').append($('<option>', {
                    value: standard,  // 使用 standard 字符串作為value
                    text: standard    // 使用 standard 字符串作為文本
                }));
            });
        });
    });
    

    // // 監聽標準的變化以更新價格
    // $('#standards').on('change', function() {
    //     const standard = $(this).val();
    //     $.get(`/api/price/${standard}`, function(data) {
    //         $('#price').val(data.price);
    //     });
    // });

    // // 加工編號
    // $('select[name="SerialNumberType"]').on('change', function () {
    //     if ($(this).val() == "0") { // 新
    //         $('select[name="SerialNumberOld"]').addClass('d-none');
    //         $('input[name="SerialNumber"]').removeClass('d-none');
    //     } else { // 舊
    //         $('select[name="SerialNumberOld"]').removeClass('d-none');
    //         $('input[name="SerialNumber"]').addClass('d-none');
    //     }
    // });

    // 廠商種類
    // $('select[name="TradeType"]').on('change', function () {
    //     if ($(this).val() !== "") {
    //         $('div[data-type="TradeNameFake"]').addClass('d-none');
    //         $('select[name="TradeName"]').removeClass('d-none');
    //     } else {
    //         $('div[data-type="TradeNameFake"]').removeClass('d-none');
    //         $('select[name="TradeName"]').addClass('d-none');
    //     }
    // });

    //加工方法
    // $('select[name="CategoryName"]').on('change', function () {
    //     if ($(this).val() !== "") {
    //         $('div[data-type="specificationFake"]').addClass('d-none');
    //         $('select[data-type="specificationTrue"]').removeClass('d-none');
    //     } else {
    //         $('div[data-type="specificationFake"]').removeClass('d-none');
    //         $('select[data-type="specificationTrue"]').addClass('d-none');
    //     }
    // });

    // 鑽孔
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

    // 凹槽
    $('select[name="groove"]').on('change', function () {
        if ($(this).val() !== "1") {
            $('div[data-type="groovePriceFake"]').addClass('d-none');
            $('input[data-type="groovePriceTrue"]').removeClass('d-none');
        } else {
            $('div[data-type="groovePriceFake"]').removeClass('d-none');
            $('input[data-type="groovePriceTrue"]').addClass('d-none');
        }
    });

    // 送出按鈕
    $('.orderForm').on('click', 'button[type="button"]', function() {
        if ($('select[name="SerialNumberType"]').val() == "0") { // 新
            $('select[name="SerialNumberOld"]').val("");
        } else { // 舊
            $('input[name="SerialNumber"]').val("");
        }
        //
        console.log($('input[name="TradeName"]').val());
        console.log($('select').val());
    });
});


