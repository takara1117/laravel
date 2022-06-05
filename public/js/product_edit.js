$(function () {
    $(document).on("click", "#addText", function () {
        let html =
            '<div class="border px-4 py-2 border-gray-300">' +
            '<div class="text-xl">' +
            '<label for="">種類</label>' +
            "<div>" +
            '<input type="text" id="variant" name="variant[{{ $variant->id }}][variant]" class="border-solid border-2 border-gray-500">' +
            "</div>" +
            "</div>" +
            '<div class="text-xl">' +
            '<label for="">種類名</label>' +
            "<div>" +
            '<input type="text" id="value" name="variant[{{ $variant->id }}][value]" class="border-solid border-2 border-gray-500">' +
            "</div>" +
            "</div>" +
            '<div class="text-xl">' +
            '<label for="">価格</label>' +
            "<div>" +
            '<input type="text" id="price" name="variant[{{ $variant->id }}][price]" class="border-solid border-2 border-gray-500">' +
            "</div>" +
            "</div>" +
            '<div class="text-xl">' +
            '<label for="">在庫</label>' +
            "<div>" +
            '<input type="text" id="stock" name="variant[{{ $variant->id }}][stock]" class="border-solid border-2 border-gray-500">' +
            "</div>" +
            "</div>" +
            '<div class="text-xl">' +
            '<label for="">画像</label>' +
            "<div>" +
            '<input type="file" id="subimage" name="variant[{{ $variant->id }}][subimage]">' +
            "</div>" +
            "</div>" +
            '<div class="text-xl">' +
            '<label for="">ステータス</label>' +
            "</div>" +
            '<select name="variant[{{ $variant->id }}][available]" id="available" required class="border-solid border-2 border-gray-500 block">' +
            '<option value="">選択してください</option>' +
            '<option value="0">販売停止中</option>' +
            '<option value="1">販売中</option>' +
            "<div class='pt-3'>" +
            '<input type="button" value="variant削除" id="deleteText"class="bg-red-700 text-white font-bold py-2 px-4 rounded">' +
            "</div>" +
            "</div>";

        $("#variants").after(html);
    });

    $(document).on("click", "#deleteText", function () {
        $(this).closest("div").remove();
    });
});
