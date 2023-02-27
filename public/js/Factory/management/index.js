
$('#listtable').DataTable({
    order: [
        [0, 'asc']
    ], // 將第一列按照升序排序
    language: {
        url: "//cdn.datatables.net/plug-ins/1.13.2/i18n/zh-HANT.json"
    },
    searching: true,
    columns: [{
        data: 'id', title: '編號'
    }, { data: 'ca_name', title: '種類' },
    { data: 'name', title: '廠商名稱' },
    { data: 'Contact', title: '聯絡人' },
    { data: 'Tel1', title: '主要電話' },
    { data: 'office', title: '功能' },]
});

function test() {
    let id = $(this).attr("flag");
    var token = $(this).attr("token");
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ Route('management.delete', $item-> mn_id) }}",
        data: {
            "id": 7,
            "_method": 'DELETE',
            "_token": "{{ csrf_token() }}"
        },
        dataType: 'JSON',
        success: function (result) {
            console.log(result);
        },
        error: function (xhr) {
            console.log(xhr);
        }
    });
    Swal.fire({
        title: '錯誤!',
        text: '此項目可能有與其他資料關聯導致無法刪除',
        icon: 'error',
        confirmButtonText: 'Cool'
    });
}
