$(function () {
    $('select[data-type="name"]').on('change', function () {
        if ($(this).val() !== "") {
            $('div[data-type="specificationFake"]').addClass('d-none');
            $('select[data-type="specificationTrue"]').removeClass('d-none');
        } else {
            $('div[data-type="specificationFake"]').removeClass('d-none');
            $('select[data-type="specificationTrue"]').addClass('d-none');
        }
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
    });
});