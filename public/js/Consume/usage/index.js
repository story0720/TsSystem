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
      data: 'id',
      title: '編號'
    }, {
      data: 'getdate',
      title: '領取日期'
    }, {
      data: 'receiver',
      title: '領取人'
    }, {
      data: 'office',
      title: '耗材名稱'
    }, {
      data: 'quantity',
      title: '耗材規格'
    }, {
      data: 'quantity',
      title: '領取數量'
    }, {
      data: 'memo',
      title: '備註'
    }, {
      data: 'memo',
      title: '備註'
    }
  ]
});
