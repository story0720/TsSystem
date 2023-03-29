
$(function () {
    function getNowProcessingSpec() {
        // 加工規格
        let $list = $("#processing-specification-list").find('.processing-specification-item');
        let arrList = [];
        $list.each(function () {
            let $specification = $(this).find('.processing-specification').text();
            let $price = $(this).find('.processing-price').text().replace("$", "");
            arrList.push($specification + "-" + $price);
        });
        // console.log(arrList);
        $('input[name="processingCreate"]').attr("value", arrList);
        // console.log($('input[name="processingCreate"]').val());
    }
    getNowProcessingSpec();
    // 新增規格按鈕
    $('button[control="add-specification"]').click(function () {
        // 規格
        let $specification = $('input[data-type="specification"]').val();
        // 價格
        let $price = $('input[data-type="price"]').val();
        // 被新增的項目結構
        let $item = $(`<div class="processing-specification-item alert alert-info d-inline-flex mb-0 mr-1 p-0">
                            <button type="button" class="close text-white pl-2" style="opacity: 1;">&times;</button>
                            <div class="pl-2 pr-1 py-1" style="font-size: 1.05rem;">
                                <span class="processing-specification">${$specification}</span>
                                <div class="ml-1 badge badge-light" style="font-size: 1.05rem;">
                                    <span class="processing-price">$${$price}</span>
                                </div>
                            </div>
                        </div>`);
        $("#processing-specification-list").append($item);
        // 清空
        $('input[data-type="specification"]').val(null);
        $('input[data-type="price"]').val(null);
        getNowProcessingSpec()
    });
    // 叉叉按鈕
    $("#processing-specification-list").on('click', '.close', function () {
        $(this).parent('.processing-specification-item').remove();
        getNowProcessingSpec()
    });
    // 送出按鈕
    $('.processingForm').on('click', 'button[type="submit"]', function () {
        getNowProcessingSpec()
    });
});