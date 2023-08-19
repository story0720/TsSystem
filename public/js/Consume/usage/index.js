$(function () {

    $('#listtable').DataTable({
        // 排序
        order: [
            [0, 'desc'] // 第一列,降序
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.2/i18n/zh-HANT.json"
        },
        searching: true,
        columns: [
            { data: 'id', title: 'No.' },
            { data: 'use_date', title: '領取日期' },
            { data: 'user_name', title: '領取人' },
            { data: 'restock_number', title: '進貨單號' },
            { data: 'consumables_name', title: '耗材名稱' },
            { data: 'consumables_spec', title: '耗材規格' },
            { data: 'use_amount', title: '領取數量' },
            { data: 'function', title: '功能' }
        ]
        // 欄寬
        , "columnDefs": [
            { "width": "1rem", "targets": 0 }, // No.
            { "width": "4rem", "targets": 7 } // 功能
        ]
    });
    // $("select[name='order_number']").on('change', function () {
    //   var selectedValue = $(this).val();
    //   console.log(selectedValue);
    //   // $.ajax({
    //   //   type: 'POST',
    //   //   headers: {
    //   //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //   //   },
    //   //   url: "/usage/GeData/" + selectedValue,
    //   //   data: {
    //   //     id: selectedValue,
    //   //     _token: $('meta[name="csrf-token"]').attr('content')
    //   //   },
    //   //   success: function (result) {
    //   //     console.log(result);
    //   //     // var select = $('#specification');
    //   //     // select.empty();
    //   //     // select.append('<option>請選擇耗材規格</option>');
    //   //     // for (var i = 0; i < result.length; i++) {
    //   //     //   var option = $('<option>', {
    //   //     //     value: result[i].id,
    //   //     //     text: result[i].name
    //   //     //   });
    //   //     //   select.append(option);
    //   //     // }
    //   //   },
    //   //   error: function (xhr) {
    //   //     // console.log(xhr.responseText);
    //   //   }
    //   // });
    // });
});

$('[id="sub-btn"]').on('click', function () {
    Swal.fire({
        title: '您確定要刪除?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '確定',
        cancelButtonText: "取消"
    }).then((result) => {
        if (result.isConfirmed) {
            var dataId = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/usage/' + dataId,
                type: 'DELETE',
                data: {
                    id: dataId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (result) {
                    if (result.icon == 'success') {
                        Swal.fire({
                            title: result.title,
                            text: result.text,
                            icon: result.icon,
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: result.title,
                            text: result.text,
                            icon: result.icon,
                        });
                    }
                },
                error: function (xhr) {
                    Swal.fire({
                        title: result.title,
                        text: result.text,
                        icon: result.icon,
                    });
                }
            });
        }
    });
});