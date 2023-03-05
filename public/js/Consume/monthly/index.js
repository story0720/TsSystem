$('#listtable').DataTable({
    order: [
      [0, 'asc']
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
  