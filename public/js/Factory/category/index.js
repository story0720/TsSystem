$(function () {

    $('#listtable').DataTable({
        // 排序
        order: [
            [0, 'asc'] // 第一列,升序
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.2/i18n/zh-HANT.json"
        },
        searching: true,
        columns: [
            { data: 'id', title: 'No.' },
            { data: 'type', title: '種類' },
            { data: 'memo', title: '備註' },
            { data: 'function', title: '功能' }
        ]
        // 欄寬
        , "columnDefs": [
            { "width": "1rem", "targets": 0 }, // No.
            { "width": "8rem", "targets": 3 } // 功能
        ]
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
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/category/' + dataId + '/delete',
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
});