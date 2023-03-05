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
      data: 'id', title: '編號'
    }, {
      data: 'categoryname', title: '加工方法'
    }, {
      data: 'price', title: '單價'
    }, {
      data: 'memo', title: '備註'
    }, {
      data: 'office', title: '功能'
    }]
});
