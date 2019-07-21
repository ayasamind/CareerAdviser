#!/bin/sh

echo "CREATE DATABASE IF NOT EXISTS \`cadotcom_testing\` ;" | "${mysql[@]}"
echo "GRANT ALL ON \`cadotcom_testing\`.* TO '"$MYSQL_USER"'@'%' ;" | "${mysql[@]}"
echo 'FLUSH PRIVILEGES ;' | "${mysql[@]}"

"${mysql[@]}" < /docker-entrypoint-initdb.d/test_db.sql_
