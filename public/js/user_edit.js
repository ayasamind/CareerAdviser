$(document).ready(function() {
    $('#main_profile_section .profile_edit_btn,#main_profile_section .profile_save_btn').click(function(){
        $('#main_profile_section .profile_form').addClass('edit_mode');
    });

    $('#main_profile_section .profile_cancel_btn').click(function(){
        $('#main_profile_section .profile_form').removeClass('edit_mode');
    });

    $('#basic_profile_section .profile_edit_btn,#basic_profile_section .profile_save_btn').click(function(){
        $('#basic_profile_section .profile_form').addClass('edit_mode');
    });

    $('#basic_profile_section .profile_cancel_btn').click(function(){
        $('#basic_profile_section .profile_form').removeClass('edit_mode');
    });

    $('#situation_profile_section .profile_edit_btn,#situation_profile_section .profile_save_btn').click(function(){
        $('#situation_profile_section .profile_form').addClass('edit_mode');
    });

    $('#situation_profile_section .profile_cancel_btn').click(function(){
        $('#situation_profile_section .profile_form').removeClass('edit_mode');
    });

    $('#company_preference_profile_section .profile_edit_btn,#company_preference_profile_section .profile_save_btn').click(function(){
        $('#company_preference_profile_section .profile_form').addClass('edit_mode');
    });

    $('#company_preference_profile_section .profile_cancel_btn').click(function(){
        $('#company_preference_profile_section .profile_form').removeClass('edit_mode');
    });
});

$(document).on("click", ".cant_edit1", function() {
    alert("プロフィールの編集には、メール認証が必要です。")
    $('#main_profile_section .profile_form').toggleClass('edit_mode');
})
$(document).on("click", ".cant_edit2", function() {
    alert("プロフィールの編集には、メール認証が必要です。")
    $('#basic_profile_section .profile_form').toggleClass('edit_mode');
})
$(document).on("click", ".cant_edit3", function() {
    alert("プロフィールの編集には、メール認証が必要です。")
    $('#situation_profile_section .profile_form').toggleClass('edit_mode');
})
$(document).on("click", ".cant_edit4", function() {
    alert("プロフィールの編集には、メール認証が必要です。")
    $('#company_preference_profile_section .profile_form').toggleClass('edit_mode');
})

$(document).on("click", "#save_names", function() {
    $("#server-success").addClass('hide')
    $("#server-error").addClass('hide')
    $("#validate-name").text('')
    $("#validate-gender").text('')
    $("#validate-prefecture").text('')
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var name = $("#name")
    var gender  = $("input.gender_select:checked")
    var prefecture = $("#prefecture option:selected")
    var data = {
        _token: CSRF_TOKEN,
        name: name.val(),
        gender: gender.val(),
        prefecture: prefecture.val(),
        photo_url: $(".preview").data('url')
    }
    $.ajax({
        url: url+'/users/updateUserName',
        type: 'post',
        data: data,
        dataType: 'json',
        beforeSend: function(){
            $('#fade').removeClass('hide');
            $('#ajax-message-success').addClass('hide');
            $('#ajax-message-error').addClass('hide');
        }
    }).done(
        function (response) {
            $('#fade').addClass('hide');
            if (response.status === 'error') {
                $('#ajax-message-error').removeClass('hide');
                $('#ajax-message-error').text(response.message);
                Object.keys(response.validate).forEach(value => {
                    $("#validate-" + value).text(response.validate[value])
                })
            } else {
                $('#ajax-message-success').removeClass('hide');
                $('#ajax-message-success').text(response.message);
                $('#main_profile_section .profile_form').toggleClass('edit_mode');
                $(".person_name").text(name.val())
                if (gender.val() == 1) {
                    $("#gender_area").html("<img class='gender_icon' src='../../img/service/man.svg'>男性")
                } else if (gender.val() == 2) {
                    $("#gender_area").html("<img class='gender_icon' src='../../img/service/woman.svg'>女性")
                }
                $("#prefecture_area").html("<img id='prefecture_area' class='area_icon' src='../../img/service/map.svg'>" + prefecture.text())
            }
        },
    ).fail(
        function (e) {
            console.log(e)
        }
    )
})

$(document).on('click', '#save_universities', function () {
    $("#server-success").addClass('hide')
    $("#server-error").addClass('hide')
    $("#validate-university").text('')
    $("#validate-graduate_year").text('')
    $("#validate-birthday").text('')
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var university = $("#university")
    var graduate_year  = $("#graduate_year")
    var birthday = null
    if ($("#day option:selected").val() && $("#month option:selected").val() && $("#year option:selected").val()) {
        birthday = $("#day option:selected").val() + '/' + $("#month option:selected").val() + '/' + $("#year option:selected").val()
    }
    var data = {
        _token: CSRF_TOKEN,
        university: university.val(),
        graduate_year: graduate_year.val(),
        birthday: birthday
    }
    $.ajax({
        url: url+'/users/updateUniversity',
        type: 'post',
        data: data,
        dataType: 'json',
        beforeSend: function(){
            $('#fade').removeClass('hide');
            $('#ajax-message-success').addClass('hide');
            $('#ajax-message-error').addClass('hide');
        }
    }).done(
        function (response) {
            $('#fade').addClass('hide');
            if (response.status === 'error') {
                $('#ajax-message-error').removeClass('hide');
                $('#ajax-message-error').text(response.message);
                Object.keys(response.validate).forEach(value => {
                    $("#validate-" + value).text(response.validate[value])
                })
            } else {
                $('#ajax-message-success').removeClass('hide');
                $('#ajax-message-success').text(response.message);
                $('#basic_profile_section .profile_form').toggleClass('edit_mode');
                $("#university-label").text(university.val())
                $("#graduate_year-label").text(graduate_year.val() + '年度')
                $("#birthday-label").text($("#year option:selected").val() + '年' + $("#month option:selected").val() + '月' + $("#day option:selected").val() + '日')
            }
        },
    ).fail(
        function (e) {
            console.log(e)
        }
    )
})

$(document).on('click', '#save_informal_decision', function () {
    $("#server-success").addClass('hide')
    $("#server-error").addClass('hide')
    $("#validate-informal_decision").text('')
    $("#validate-situation").text('')
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var informal_decision = $("#informal_decision option:selected")
    var situation  = $("#situation")
    var data = {
        _token: CSRF_TOKEN,
        informal_decision: informal_decision.val(),
        situation: situation.val()
    }
    $.ajax({
        url: url+'/users/updateInformalDecision',
        type: 'post',
        data: data,
        dataType: 'json',
        beforeSend: function(){
            $('#fade').removeClass('hide');
            $('#ajax-message-success').addClass('hide');
            $('#ajax-message-error').addClass('hide');
        }
    }).done(
        function (response) {
            $('#fade').addClass('hide');
            if (response.status === 'error') {
                $('#ajax-message-error').removeClass('hide');
                $('#ajax-message-error').text(response.message);
                Object.keys(response.validate).forEach(value => {
                    $("#validate-" + value).text(response.validate[value])
                })
            } else {
                $('#ajax-message-success').removeClass('hide');
                $('#ajax-message-success').text(response.message);
                $('#situation_profile_section .profile_form').toggleClass('edit_mode');
                $("#informal_decision-label").text(informal_decision.text())
                $("#situation-label").text(situation.val())
            }
        },
    ).fail(
        function (e) {
            console.log(e)
        }
    )
})

$(document).on('click', '#save_companies', function () {
    $("#server-success").addClass('hide')
    $("#server-error").addClass('hide')
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var axis_reason = $('#axis_reason').val()
    var desire = [];
    $(".desire:checked").each(function() {
        desire.push($(this).val());
    });
    var data = {
        axis_reason,
        desire,
        _token: CSRF_TOKEN,
    }
    $.ajax({
        url: url+'/users/updateDesire',
        type: 'post',
        data: data,
        dataType: 'json',
        beforeSend: function(){
            $('#fade').removeClass('hide');
            $('#ajax-message-success').addClass('hide');
            $('#ajax-message-error').addClass('hide');
        }
    }).done(
        function (response) {
            $('#fade').addClass('hide');
            if (response.status === 'error') {
                $('#ajax-message-error').removeClass('hide');
                $('#ajax-message-error').text(response.message);
                Object.keys(response.validate).forEach(value => {
                    $("#validate-" + value).text(response.validate[value])
                })
            } else {
                $('#ajax-message-success').removeClass('hide');
                $('#ajax-message-success').text(response.message);
                $('#company_preference_profile_section .profile_form').toggleClass('edit_mode');
                var axis = ''
                $(".axis-check:checked").each(function(index) {
                    if (index == 0) {
                        axis = $(this).data('label')
                    } else  {
                        axis = axis + ', ' + $(this).data('label')
                    }
                })
                $("#axis-label").text(getDesireLabel('.axis-check:checked'))
                $("#axis-reason-label").text(axis_reason)
                $("#industry-label").text(getDesireLabel('.industry-check:checked'))
                $("#job-label").text(getDesireLabel('.job-check:checked'))
                $("#desire-prefecture-label").text(getDesireLabel('.prefecture-check:checked'))
                $("#company-type-label").text(getDesireLabel('.company-type-check:checked'))
            }
        },
    ).fail(
        function (e) {
            console.log(e)
        }
    )
})


function getDesireLabel($dom)
{
    var label = ''
    $($dom).each(function(index) {
        if (index == 0) {
            label = $(this).data('label')
        } else  {
            label = label + ', ' + $(this).data('label')
        }
    })
    return label
}

$(document).on('change', 'input[type="file"]', function(e) {
    var file = e.target.files[0],
        reader = new FileReader(),
        $preview = $(".preview");
        t = this;
    // 画像ファイル以外の場合は何もしない
    if(file.type.indexOf("image") < 0){
        $("#validate-photo_url").text('画像ファイルを選択してください')
        return false;
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var formData = new FormData();
    formData.append('photo', file);

    $.ajax({
        url: url+'/users/uploadPhoto',
        type: 'post',
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        beforeSend: function(){
            $('#fade').removeClass('hide');
            $('#ajax-message-success').addClass('hide');
            $('#ajax-message-error').addClass('hide');
        }
    }).done(
        function (response) {
            $('#fade').addClass('hide');
            if (response.status === 'error') {
                Object.keys(response.validate).forEach(value => {
                    $("#validate-" + value).text(response.validate[value])
                })
            } else {
               $(".preview").data('url', response.url)
               console.log($(".preview").data('url'))
            }
        },
    ).fail(
        function (e) {
            console.log(e)
        }
    )

    // ファイル読み込みが完了した際のイベント登録
    reader.onload = (function(file) {
    return function(e) {
        //既存のプレビューを削除
        $preview.empty();
        // .prevewの領域の中にロードした画像を表示するimageタグを追加
        $preview.append($('<img>').attr({
                src: e.target.result,
                width: "150px",
                class: "preview",
                title: file.name
            }));
    };
    })(file);

    reader.readAsDataURL(file);
});
