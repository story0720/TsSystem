$(function () {
    // 新增規格按鈕
    $('button[control="add-specification"]').click(function () {
        // 規格
        let $specification = $('input[data-type="specification"]').val();
        // console.log($specification);
        // 價格
        let $price = $('input[data-type="price"]').val();
        // console.log($price);
        // 被新增的項目結構
        let $item = $(`<div class="material-specification-item alert alert-info d-inline-flex mb-0 p-0">
            <button type="button" class="close text-white pl-2" data-dismiss="alert"
                aria-hidden="true" style="opacity: 1;">&times;</button>
            <div class="pl-2 pr-1 py-1" style="font-size: 1.05rem;">
                <span class="material-specification">${$specification}</span>
                <div class="ml-1 badge badge-light" style="font-size: 1.05rem;">
                    <span class="material-price">$${$price}</span>
                </div>
            </div>
        </div>`);
        $("#material-specification-list").append($item);
    });
    // 送出按鈕
    $('button[type="submit"]').click(function () {
        let materialList = [];

        let $main = $('input[data-type="main"]').val();
        materialList.push($main);

        let $list = $("#material-specification-list").find('.material-specification-item');
        let arrList = [];
        $list.each(function () {
            let $specification = $(this).find('.material-specification').text();
            let $price = $(this).find('.material-price').text().replace("$", "");
            let $item = {
                'specification': $specification,
                'price': $price
            };
            arrList.push($item);
        });
        materialList.push(arrList);

        let $memo = $('textarea[data-type="memo"]').val();
        materialList.push($memo);

        $('input[name="materialCreate"]').attr("value", materialList);
    });
});