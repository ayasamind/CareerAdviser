$(function() {
    //formバリデーション
    var requiredMess = '※ 入力してください。';
    var requiredMessCheck = '※ 同意してください。';

    $.validator.addMethod("phone", function(value, element) {
        return this.optional(element) || /^[\d,-]+$/.test(value);
    }, "※ 電話番号を入力してください。");

    $.validator.addMethod("email", function(value, element) {
        return this.optional(element) ||  /([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+/.test(value);
    }, "※ メールアドレスを入力してください。");


    $("form").validate({
        rules: {
            "data[company]" :{
                required: true
            },
            "data[name]" :{
                required: true
            },
            "data[email]" :{
                required: true,
                email: true
            },
            "data[tel]" :{
                required: true,
                phone: true
            },
            "data[body]" :{
                required: true
            }
        },
        messages: {
            "data[company]":{
                required: requiredMess
            },
            "data[name]":{
                required: requiredMess
            },
            "data[email]":{
                required: requiredMess
            },
            "data[tel]":{
                required: requiredMess
            },
            "data[body]":{
                required: requiredMess
            },
        },
        errorClass: "validationMessage",
        errorElement: "div",
        errorPlacement: function(error, element) {
            var nextElement = element.next();
            var nextId = nextElement.attr("id");
            if (nextId == 'defalutMess') {
                $(nextElement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
            AWS.config.region = "ap-northeast-1";
            AWS.config.credentials = new AWS.CognitoIdentityCredentials({IdentityPoolId: "ap-northeast-1:9b3092de-2903-45ff-ab77-2949ea114775"});
            var bucket = 'ca-com-contact';
            var s3 = new AWS.S3({
                params: {
                    Bucket: bucket
                }
            });

            var now = new Date();
            var obj = {
                "問い合わせ時間" : now.toLocaleString(),
                "会社名・所属機関名" : $("#input_company").val(),
                "お名前" : $("#input_name").val(),
                "メールアドレス" : $("#input_email").val(),
                "電話番号" : $("#input_tel").val(),
                "お問い合わせ内容" : $("#input_message").val(),
            };

            console.log(obj)
            var blob = new Blob([JSON.stringify(obj, null, 2)], {type:'text/plain'});

            s3.putObject({Key: now.getTime()+".txt", ContentType: "text/plain", Body: blob},
            function(err, data){
                if(data !== null){
                    alert("お問い合わせありがとうございました。後日担当者よりご連絡させていただきます。");
                    location.href = '/';
                }
                else{
                    alert("お問い合わせ送信に失敗しました。お手数ですが再度ご入力をお願いします。");
                }
            });
        }
    });
});
