$(document).on('change', '.many_select', function () {
    var id = $(this).attr('id');
    var column = id.split('many_select_')[1];
    $("." + column).val($(this).val());
})

$(document).on('click', '.confirm', function () {
    var result = window.confirm("入力内容は保存されませんがよろしいですか？")
    if (!result) {
        return false;
    }
})
