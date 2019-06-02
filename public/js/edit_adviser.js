$(document).on('click', '#addCareer', function () {
    var length = $('#career-form > .form-count').length
    var deleteData = length
    var hr = '<div class="row form'+ length +'"><div class="col-md-3"></div><hr class="col-md-6"/></div>'
    var deleteButton = '<div class="row"><div class="col-md-10"></div> <button type="button" data-delete="' + deleteData + '" class="btn btn-danger col-md-1 float-right deleteCareer">x</button></div>'
    var divstart = '<div class="form'+ length +' form-count">'
    var divend = '</div>'
    var dom1 = '<div class="form-group row"><label for="introduce" class="col-md-3 col-form-label text-md-right"></label> <label for="introduce" class="col-md-2 col-form-label text-md-right">年度</label> <div class="col-md-3"><input id="year" required="required" name="AdviserCareer['+length+'][year]" type="text" class="form-control "></div></div>'
    var dom2 = '<div class="form-group row"><label for="introduce" class="col-md-3 col-form-label text-md-right"></label> <label for="introduce" class="col-md-2 col-form-label text-md-right">略歴</label> <div class="col-md-5"><input id="career" required="required" name="AdviserCareer['+length+'][career]" type="text" class="form-control "></div></div>'
    $("#career-form").append(deleteButton + divstart + dom1 + dom2 + divend + hr)
})

$(document).on('click', '.deleteCareer', function () {
    var count = $('.deleteCareer').length
    if (count > 1) {
        var number = $(this).data('delete')
        $(".form" + number).remove()
        $(this).parent().remove()
    } else {
        alert('略歴は一つ以上入力してください')
    }
})
