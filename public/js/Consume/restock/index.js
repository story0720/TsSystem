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
    data: 'consumablesName',
    title: '耗材名稱'
  }, {
    data: 'consumablesSpec',
    title: '耗材規格'
  }, {
    data: 'supplier',
    title: '耗材廠商'
  }, {
    data: 're_date',
    title: '進貨日期'
  }, {
    data: 're_quantity',
    title: '進貨單價'
  }, {
    data: 're_unitprice',
    title: '進貨數量'
  }, {
    data: 're_count',
    title: '小計'
  }, {
    data: 'memo',
    title: '備註'
  }, {
    data: 'function',
    title: '功能'
  }]
});