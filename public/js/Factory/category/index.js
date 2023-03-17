$(function () {
  $('#listtable').DataTable({
    order: [
      [0, 'desc']
    ], // 將第一列按照升序排序
    language: {
      url: "//cdn.datatables.net/plug-ins/1.13.2/i18n/zh-HANT.json"
    },
    searching: true,
    columns: [{
      data: 'id',
      title: '編號'
    }, {
      data: 'name',
      title: '廠商種類'
    },
    {
      data: 'position',
      title: '備註'
    }, {
      data: 'office',
      title: '功能'
    }
    ]
  });

  $('#sub-btn').on('click', function () {
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
  });
});