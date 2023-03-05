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
    title: '廠商名稱'
  },
  {
    data: 'serialnumber',
    title: '加工編號'
  },
  {
    data: 'categoryname',
    title: '加工成品(種類&規格)'
  },
  {
    data: 'unitprice',
    title: '單價'
  },
  {
    data: 'estimatedquantity',
    title: '應交數量'
  },
  {
    data: 'shipdate',
    title: '應出貨日期'
  },
  {
    data: 'status',
    title: '發料狀態'
  },
  {
    data: 'status',
    title: '交貨日期'
  },
  {
    data: 'status',
    title: '實交數量'
  },
  {
    data: 'status',
    title: '總額'
  },
  {
    data: 'status',
    title: '狀態'
  }, {
    data: 'office',
    title: '功能'
  }
  ]
});
