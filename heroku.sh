#!/bin/bash
heroku config:set --app ca-com DB_CONNECTION=pgsql \
APP_ENV=staging \
LOCALE=ja \
TIMEZONE="Asia/Tokyo" \
DB_HOST=ec2-174-129-208-118.compute-1.amazonaws.com \
DB_PORT=5432 \
DB_DATABASE=dhchh9tl5r8ns \
DB_USERNAME=wnkajnbimdalhc \
DB_PASSWORD=962150f86ec003121a746df661f1d5fca363d04ed38c531be0a96381f0e1aad4 \
AWS_ACCESS_KEY_ID=AKIA4DAYXXHRD6G3TJOC \
AWS_SECRET_ACCESS_KEY=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 \
AWS_REGION=ap-northeast-1 \
AWS_BUCKET=career-adviser-staging \
APP_URL=https://ca-com.herokuapp.com/ \
MAIL_DRIVER=smtp \
MAIL_HOST=smtp.googlemail.com \
MAIL_PORT=465 \
MAIL_USERNAME=masayaliketennis@gmail.com \
MAIL_PASSWORD=ayiuxnzyxecdoqee \
MAIL_ENCRYPTION=ssl \
MAIL_FROM_ADDRESS=masayaliketennis@gmail.com \
MAIL_FROM_NAME=キャリアアドバイザー.com \
AWS_ACCESS_KEY_ID=AKIA4DAYXXHRD6G3TJOC \
AWS_SECRET_ACCESS_KEY=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 \
AWS_REGION=ap-northeast-1 \
AWS_BUCKET=career-adviser-staging