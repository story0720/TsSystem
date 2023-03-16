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
    data: 'useDate',
    title: '領取日期'
  }, {
    data: 'userName',
    title: '領取人'
  }, {
    data: 'name',
    title: '耗材名稱'
  }, {
    data: 'spec',
    title: '耗材規格'
  }, {
    data: 'useAmount',
    title: '領取數量'
  }, {
    data: 'memo',
    title: '備註'
  }]
});
