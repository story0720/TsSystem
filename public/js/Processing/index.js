$(function () {
  $('#listtable').DataTable({
    order: [
      [0, 'asc']
    ], // 將第一列按照升序排序
    language: {
      url: "//cdn.datatables.net/plug-ins/1.13.2/i18n/zh-HANT.json"
    },
    searching: true,
    columns: [
      {
        data: 'id', title: '#'
      }, {
        data: 'material', title: '加工方法'
      }, {
        data: 'specificationAndPrice', title: '加工規格&單價'
      }
      // , {
      //   data: 'price', title: '單價'
      // }
      // , {
      //   data: 'memo', title: '備註'
      // }
      , {
        data: 'office', title: '功能'
      }
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
          url: '/processing/' + dataId + '/delete',
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
