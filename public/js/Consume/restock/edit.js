function countall() {
    var Quantity = $("input[name='quantity']").val();
    var UnitPrice = $("input[name='unitprice']").val();
    $('#count').val(Quantity * UnitPrice);
}
$(function () {
    $('select[data-type="name"]').on('change', function () {
        if ($(this).val() !== "") {
            $('div[data-type="specificationFake"]').addClass('d-none');
            $('select[data-type="specificationTrue"]').removeClass('d-none');
        } else {
            $('div[data-type="specificationFake"]').removeClass('d-none');
            $('select[data-type="specificationTrue"]').addClass('d-none');
        }
        GetSpecification();
    });

    function GetSpecification() {
        let coname = $('select[name="coname"]').val();
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/restock/Gettag",
            data: {
                id: coname,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                var select = $('#specification');
                select.empty();
                select.append('<option>請選擇耗材規格</option>');
                for (var i = 0; i < result.length; i++) {
                    var option = $('<option>', {
                        value: result[i].id,
                        text: result[i].name
                    });
                    select.append(option);
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    }

    $("#caname").change(function () {
        var selectValue = $(this).val();

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/restock/GetFactoryname',
            data: {
                id: selectValue,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                let Factoryname = $('select[name="Factoryname"]');
                Factoryname.empty();
                Factoryname.append('<option>請選擇耗材廠商名稱</option>');
                for (var i = 0; i < result.length; i++) {
                    var option = $('<option>', {
                        value: result[i].ca_id,
                        text: result[i].mn_Name
                    });
                    Factoryname.append(option);
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });


    });

    function callFactoryData() {
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/restock/GetFactoryname',
            data: {
                id: 1,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                let Factoryname = $('select[name="Factoryname"]');
                Factoryname.empty();
                Factoryname.append('<option>請選擇耗材廠商名稱</option>');
                for (var i = 0; i < result.length; i++) {
                    var option = $('<option>', {
                        value: result[i].mn_id,
                        text: result[i].mn_Name
                    });
                    Factoryname.append(option);
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    }
    callFactoryData()
});