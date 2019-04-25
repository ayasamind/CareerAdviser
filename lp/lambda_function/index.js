console.log('Loading event');

var aws = require('aws-sdk');
var s3 = new aws.S3({apiVersion: '2006-03-01'});
var request = require('request');

exports.handler = function(event, context) {
    console.log('Received event:' + Date.now());
    console.log(JSON.stringify(event, null, '  '));

    var bucket = event.Records[0].s3.bucket.name;
    var key = event.Records[0].s3.object.key;
    s3.getObject({Bucket:bucket, Key:key}, function(err, data) {
        if (err) {
            console.log(err)
            console.log('error getting object ' + key + ' from bucket ' + bucket +
                        '. Make sure they exist and your bucket is in the same region as this function.');
            context.done('error','error getting file'+err);
            return;
        }
        var contentType = data.ContentType;
        var body = data.Body.toString("utf-8");

        var options = {
            uri: 'https://hooks.slack.com/services/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',
            json: true
        };

        options['form'] = {
            payload: JSON.stringify({
                'text': 'ホームページからお問い合わせがありました。 s3://' + bucket + '/' + key
                + '\r\n' + body,
            })
        };

        request.post(options, function(err, response, body) {
            if(!err && response.statusCode == 200) {
                console.log('success');
            } else {
                console.log('error: ' + response.statusCode);
            }
            context.done(null, '');
        });

        console.log('posted');
    });
};
