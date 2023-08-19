$(function () {

    $('#listtable').DataTable({
        // 排序
        order: [
            [0, 'desc'] // 第一列,降序
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.2/i18n/zh-HANT.json"
        },
        searching: true,
        columns: [
            { data: 'id', title: 'No.' },
            { data: 'name', title: '廠商名稱' },
            { data: 'processing_number', title: '加工編號' },
            { data: 'processing', title: '加工方法&規格' },
            { data: 'processing_price', title: '單價' },
            { data: 'due_quantity', title: '應交數量' },
            { data: 'due_date', title: '應交日期' },
            { data: 'status_issue', title: '發料狀態' },
            { data: 'status_delivery', title: '交貨狀態' },
            { data: 'status_lumpSum', title: '總額' },
            { data: 'status', title: '狀態' },
            { data: 'function', title: '功能' }
        ]
        // 欄寬
        , "columnDefs": [
            { "width": "1rem", "targets": 0 }, // No.
            { "width": "8rem", "targets": 11 } // 功能
        ]
    });


});