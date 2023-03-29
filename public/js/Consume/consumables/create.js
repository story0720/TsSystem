$(function () {
    function getConsumablesSpec() {
        let $list = $("#consumables-specification-list").find('.consumables-specification-item');
        let arrList = [];
        $list.each(function () {
            let $specification = $(this).find('.consumables-specification').text();
            arrList.push($specification);
        });
        $('input[name="specification"]').attr("value", arrList);
    }
    getConsumablesSpec();
    // 新增規格按鈕
    $('button[control="add-specification"]').click(function () {
        // 規格
        let $specification = $('input[data-type="specification"]').val();
        // 被新增的項目結構
        let $item = $(`<div class="consumables-specification-item alert alert-info d-inline-flex mb-0 mr-1 p-0">
                        <button type="button" class="close text-white pl-2" style="opacity: 1;">&times;</button>
                        <div class="pl-2 pr-1 py-1" style="font-size: 1.05rem;">
                            <span class="consumables-specification">${$specification}</span>
                        </div>
                    </div>`);
        $("#consumables-specification-list").append($item);
        // 清空
        $('input[data-type="specification"]').val(null);

        getConsumablesSpec();
    });
    // 叉叉按鈕
    $("#consumables-specification-list").on('click', '.close', function () {
        $(this).parent('.consumables-specification-item').remove();
        getConsumablesSpec();
    });
    // 送出按鈕
    $('button[type="submit"]').click(function () {
        getConsumablesSpec();
    });
});